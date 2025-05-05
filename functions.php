<?php

use Roots\Acorn\Application;

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our theme. We will simply require it into the script here so that we
| don't have to worry about manually loading any of our classes later on.
|
*/

if (! file_exists($composer = __DIR__.'/vendor/autoload.php')) {
    wp_die(__('Error locating autoloader. Please run <code>composer install</code>.', 'sage'));
}

require $composer;

/*
|--------------------------------------------------------------------------
| Register The Bootloader
|--------------------------------------------------------------------------
|
| The first thing we will do is schedule a new Acorn application container
| to boot when WordPress is finished loading the theme. The application
| serves as the "glue" for all the components of Laravel and is
| the IoC container for the system binding all of the various parts.
|
*/

Application::configure()
    ->withProviders([
        App\Providers\ThemeServiceProvider::class,
    ])
    ->boot();

/*
|--------------------------------------------------------------------------
| Register Sage Theme Files
|--------------------------------------------------------------------------
|
| Out of the box, Sage ships with categorically named theme files
| containing common functionality and setup to be bootstrapped with your
| theme. Simply add (or remove) files from the array below to change what
| is registered alongside Sage.
|
*/

collect(['setup', 'filters'])
    ->each(function ($file) {
        if (! locate_template($file = "app/{$file}.php", true, true)) {
            wp_die(
                /* translators: %s is replaced with the relative file path */
                sprintf(__('Error locating <code>%s</code> for inclusion.', 'sage'), $file)
            );
        }
    });

/**
 * Vite assets.
 */
if (!function_exists('sage_vite_assets')) {
    function sage_vite_assets() {
        // Comprueba si está en modo desarrollo
        if (wp_get_environment_type() !== 'production' && file_exists(get_theme_file_path('public/hot'))) {
            // Modo desarrollo - HMR activo
            $url = rtrim(file_get_contents(get_theme_file_path('public/hot')));
            
            // Ajustar URL si es necesario
            if (strpos($url, '127.0.0.1') !== false || strpos($url, 'localhost') !== false) {
                wp_enqueue_script('vite-client', $url . '/@vite/client', [], null, true);
                wp_enqueue_script('vite-app', $url . '/resources/js/app.js', [], null, true);
                
                // Si ves errores CORS, podrías necesitar más ajustes aquí
            }
        } else {
            // Modo producción - usar manifest
            if (file_exists($manifest = get_theme_file_path('public/build/manifest.json'))) {
                $manifest = json_decode(file_get_contents($manifest), true);
                
                // Enqueue CSS files
                if (isset($manifest['resources/css/app.css'])) {
                    if (isset($manifest['resources/css/app.css']['css'])) {
                        foreach ($manifest['resources/css/app.css']['css'] as $css) {
                            wp_enqueue_style('sage/css-' . md5($css), get_theme_file_uri('public/build/' . $css), false, null);
                        }
                    } else if (isset($manifest['resources/css/app.css']['file'])) {
                        wp_enqueue_style('sage/css', get_theme_file_uri('public/build/' . $manifest['resources/css/app.css']['file']), false, null);
                    }
                }
                
                // Enqueue JS files
                if (isset($manifest['resources/js/app.js'])) {
                    wp_enqueue_script('sage/js', get_theme_file_uri('public/build/' . $manifest['resources/js/app.js']['file']), [], null, true);
                }
            }
        }
    }
}

// Registrar la directiva @vite para Blade
add_filter('blade.compiler', function ($compiler) {
    $compiler->directive('vite', function ($expression) {
        return '<?php /* Vite is handled by sage_vite_assets() in functions.php */ ?>';
    });
    
    return $compiler;
});

add_action('wp_enqueue_scripts', function() {
    global $template;
    if (basename($template) === 'prensa.blade.php' || is_page('prensa')) {
        // Primero jQuery (asegurarse de que siempre está cargado)
        wp_enqueue_script('jquery');
        
        // Luego Swiper CSS y JS (desde CDN)
        wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css', [], null);
        wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js', ['jquery'], null, true);
        
        // Pasar AJAX params
        wp_localize_script('jquery', 'kintsugi_ajax', [
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('kintsugi_ajax_nonce')
        ]);
    }
}, 20);  // Prioridad 20 para que se ejecute después de otros enqueues

/*
|--------------------------------------------------------------------------
| Sistema de suscripción al blog
|--------------------------------------------------------------------------
|
| Maneja la suscripción de usuarios al blog y el envío automático de emails
| cuando se publica un nuevo post.
|
*/

// Procesar el formulario de suscripción
add_action('admin_post_suscribir_blog', 'procesar_suscripcion_blog');
add_action('admin_post_nopriv_suscribir_blog', 'procesar_suscripcion_blog');

function procesar_suscripcion_blog() {
    // Verificar que tenemos un email
    if (empty($_POST['suscriptor_email']) || !is_email($_POST['suscriptor_email'])) {
        wp_redirect(wp_get_referer() . '?suscrito=error');
        exit;
    }

    // Sanitizar el email
    $email = sanitize_email($_POST['suscriptor_email']);
    
    // Obtener suscriptores actuales
    $suscriptores = get_option('ikintsugi_blog_suscriptores', []);
    
    // Añadir el nuevo email si no existe ya
    if (!in_array($email, $suscriptores)) {
        $suscriptores[] = $email;
        update_option('ikintsugi_blog_suscriptores', $suscriptores);
        
        // Email de confirmación (opcional)
        $sitio = get_bloginfo('name');
        $asunto = "¡Te has suscrito al blog de $sitio!";
        $mensaje = "Gracias por suscribirte al blog de $sitio.\n\n";
        $mensaje .= "Recibirás un email cada vez que publiquemos un nuevo artículo.\n\n";
        $mensaje .= "Saludos,\n";
        $mensaje .= "El equipo de $sitio";
        
        wp_mail($email, $asunto, $mensaje);
    }
    
    // Redireccionar de vuelta con mensaje de éxito
    wp_redirect(wp_get_referer() . '?suscrito=ok');
    exit;
}

// Enviar email a suscriptores cuando se publica un post
add_action('transition_post_status', 'notificar_suscriptores_nuevo_post', 10, 3);

function notificar_suscriptores_nuevo_post($new_status, $old_status, $post) {
    // Solo procesar si es un post que pasa de borrador/pendiente a publicado
    if ($new_status == 'publish' && $old_status != 'publish' && $post->post_type == 'post') {
        
        // Obtener lista de suscriptores
        $suscriptores = get_option('ikintsugi_blog_suscriptores', []);
        
        // Si no hay suscriptores, salir
        if (empty($suscriptores)) {
            return;
        }
        
        // Datos del post
        $titulo = $post->post_title;
        $url = get_permalink($post->ID);
        $excerpt = has_excerpt($post->ID) ? get_the_excerpt($post->ID) : wp_trim_words($post->post_content, 30);
        $imagen = has_post_thumbnail($post->ID) ? get_the_post_thumbnail_url($post->ID, 'medium') : '';
        
        // Preparar email
        $sitio = get_bloginfo('name');
        $asunto = "Nuevo artículo en $sitio: $titulo";
        
        // Mensaje en HTML
        $mensaje_html = '<!DOCTYPE html><html><head><meta charset="UTF-8"></head><body>';
        $mensaje_html .= "<h2>Nuevo artículo en nuestro blog</h2>";
        $mensaje_html .= "<h3><a href='$url'>$titulo</a></h3>";
        
        if ($imagen) {
            $mensaje_html .= "<p><img src='$imagen' style='max-width:100%; height:auto;'></p>";
        }
        
        $mensaje_html .= "<p>$excerpt</p>";
        $mensaje_html .= "<p><a href='$url' style='background:#D93280; color:#fff; padding:10px 15px; text-decoration:none; border-radius:5px;'>Leer artículo completo</a></p>";
        $mensaje_html .= "<p>Recibe este email porque estás suscrito al blog de $sitio.</p>";
        $mensaje_html .= '</body></html>';
        
        // Mensaje en texto plano
        $mensaje_texto = "Nuevo artículo en nuestro blog: $titulo\n\n";
        $mensaje_texto .= "$excerpt\n\n";
        $mensaje_texto .= "Leer artículo completo: $url\n\n";
        $mensaje_texto .= "Recibe este email porque estás suscrito al blog de $sitio.";
        
        // Cabeceras para enviar HTML
        $cabeceras = [
            'Content-Type: text/html; charset=UTF-8',
            'From: ' . get_bloginfo('name') . ' <' . get_bloginfo('admin_email') . '>',
        ];
        
        // Enviar a cada suscriptor (o usar BCC para todos)
        foreach ($suscriptores as $email) {
            wp_mail($email, $asunto, $mensaje_html, $cabeceras);
        }
    }
}

// Añadir página de administración para gestionar suscriptores
add_action('admin_menu', 'agregar_menu_suscriptores_blog');

function agregar_menu_suscriptores_blog() {
    add_submenu_page(
        'edit.php', // Agregar bajo el menú de Posts
        'Suscriptores del Blog',
        'Suscriptores',
        'manage_options',
        'suscriptores-blog',
        'mostrar_pagina_suscriptores_blog'
    );
}

function mostrar_pagina_suscriptores_blog() {
    // Procesamiento de acciones
    if (isset($_POST['action']) && $_POST['action'] == 'eliminar' && isset($_POST['email'])) {
        $email = sanitize_email($_POST['email']);
        $suscriptores = get_option('ikintsugi_blog_suscriptores', []);
        
        // Eliminar email
        if (($key = array_search($email, $suscriptores)) !== false) {
            unset($suscriptores[$key]);
            update_option('ikintsugi_blog_suscriptores', array_values($suscriptores));
            echo '<div class="notice notice-success"><p>Suscriptor eliminado correctamente.</p></div>';
        }
    }

    // Agregar suscriptor manualmente
    if (isset($_POST['action']) && $_POST['action'] == 'agregar' && isset($_POST['nuevo_email'])) {
        $email = sanitize_email($_POST['nuevo_email']);
        if (is_email($email)) {
            $suscriptores = get_option('ikintsugi_blog_suscriptores', []);
            if (!in_array($email, $suscriptores)) {
                $suscriptores[] = $email;
                update_option('ikintsugi_blog_suscriptores', $suscriptores);
                echo '<div class="notice notice-success"><p>Suscriptor agregado correctamente.</p></div>';
            } else {
                echo '<div class="notice notice-warning"><p>Este email ya está en la lista.</p></div>';
            }
        } else {
            echo '<div class="notice notice-error"><p>Por favor, introduce un email válido.</p></div>';
        }
    }
    
    // Obtener lista de suscriptores
    $suscriptores = get_option('ikintsugi_blog_suscriptores', []);
    
    // Mostrar la página
    ?>
    <div class="wrap">
        <h1>Suscriptores del Blog</h1>
        
        <div class="card" style="max-width:600px; margin-bottom:20px; padding:20px;">
            <h2>Agregar suscriptor manualmente</h2>
            <form method="post">
                <input type="hidden" name="action" value="agregar">
                <input type="email" name="nuevo_email" placeholder="Correo electrónico" required style="width:100%; margin-bottom:10px;">
                <button type="submit" class="button button-primary">Agregar suscriptor</button>
            </form>
        </div>
        
        <div class="card" style="max-width:600px; padding:20px;">
            <h2>Lista de suscriptores (<?php echo count($suscriptores); ?>)</h2>
            
            <?php if (empty($suscriptores)) : ?>
                <p>No hay suscriptores todavía.</p>
            <?php else : ?>
                <table class="wp-list-table widefat fixed striped">
                    <thead>
                        <tr>
                            <th>Email</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($suscriptores as $email) : ?>
                            <tr>
                                <td><?php echo esc_html($email); ?></td>
                                <td>
                                    <form method="post" style="display:inline-block;">
                                        <input type="hidden" name="action" value="eliminar">
                                        <input type="hidden" name="email" value="<?php echo esc_attr($email); ?>">
                                        <button type="submit" class="button button-small" onclick="return confirm('¿Estás seguro de querer eliminar este suscriptor?');">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
    </div>
    <?php
}

/**
 * Modify the permalink structure for posts to use blog/post-name instead of /post-name
 */
add_filter('post_link', 'custom_blog_permalink', 10, 3);
add_filter('post_type_link', 'custom_blog_permalink', 10, 3);

function custom_blog_permalink($permalink, $post, $leavename) {
    // Solo afectar a posts del tipo 'post' (entradas de blog)
    if ($post->post_type !== 'post') {
        return $permalink;
    }
    
    // Asegúrate de que la URL comience con /blog/
    if (strpos($permalink, '/blog/') === false) {
        $permalink = str_replace(home_url(), home_url('/blog'), $permalink);
    }
    
    return $permalink;
}

// Asegurar que las URLs /blog/nombre-post se redirijan al post correcto
add_action('init', 'custom_blog_rewrite_rules');

function custom_blog_rewrite_rules() {
    // Aseguramos que /blog/nombre-post se redirija correctamente
    add_rewrite_rule(
        '^blog/([^/]+)/?$',
        'index.php?name=$matches[1]',
        'top'
    );
    
    // Añadir también una regla para la paginación del blog
    add_rewrite_rule(
        '^blog/page/([0-9]+)/?$',
        'index.php?pagename=blog&paged=$matches[1]',
        'top'
    );
}

// Registrar función para flush de reglas en activación del tema
add_action('after_switch_theme', 'ikintsugi_theme_activation');

function ikintsugi_theme_activation() {
    // Registrar las reglas de reescritura
    custom_blog_rewrite_rules();
    
    // Hacer flush de las reglas de reescritura
    flush_rewrite_rules();
}

// También podemos añadir un botón en el panel de administración para forzar el flush
add_action('admin_init', 'ikintsugi_add_rewrite_flush_button');

function ikintsugi_add_rewrite_flush_button() {
    // Solo mostrar para administradores
    if (!current_user_can('manage_options')) {
        return;
    }
    
    // Procesar la acción de flush
    if (isset($_GET['ikintsugi_flush_rewrites']) && $_GET['ikintsugi_flush_rewrites'] == 'do') {
        // Registrar las reglas
        custom_blog_rewrite_rules();
        
        // Hacer flush
        flush_rewrite_rules();
        
        // Redireccionar para evitar problemas con recarga
        wp_redirect(admin_url('options-permalink.php?flushed=true'));
        exit;
    }
    
    // Añadir aviso con botón en la página de permalinks
    if (isset($_GET['page']) && $_GET['page'] == 'options-permalink.php' || isset($_SERVER['PHP_SELF']) && strpos($_SERVER['PHP_SELF'], 'options-permalink.php') !== false) {
        add_action('admin_notices', 'ikintsugi_show_flush_button');
    }
    
    // Mostrar mensaje de éxito si se ha hecho flush
    if (isset($_GET['flushed']) && $_GET['flushed'] == 'true') {
        add_action('admin_notices', 'ikintsugi_show_flush_success');
    }
}

function ikintsugi_show_flush_button() {
    ?>
    <div class="notice notice-info">
        <p>
            <strong>Ikintsugi Theme:</strong> Si tienes problemas con las URLs del blog, puedes 
            <a href="<?php echo admin_url('options-permalink.php?ikintsugi_flush_rewrites=do'); ?>" class="button button-secondary">
                Actualizar reglas de reescritura
            </a>
        </p>
    </div>
    <?php
}

function ikintsugi_show_flush_success() {
    ?>
    <div class="notice notice-success is-dismissible">
        <p><strong>¡Éxito!</strong> Las reglas de reescritura han sido actualizadas.</p>
    </div>
    <?php
}

/**
 * Limitar el número de comentarios por IP
 * Permite solo 3 comentarios por hora por dirección IP
 */
function limitar_comentarios_por_ip() {
    // Solo aplicar cuando no estamos en admin y un comentario está siendo enviado
    if (!is_admin() && isset($_POST['comment_post_ID'])) {
        // Obtener la IP del comentarista
        $commenter_ip = $_SERVER['REMOTE_ADDR'];
        
        // Obtener la hora actual menos 1 hora (3600 segundos)
        $time_frame = current_time('timestamp') - 3600;
        $time_frame_mysql = date('Y-m-d H:i:s', $time_frame);
        
        // Consultar comentarios en la última hora desde esta IP
        global $wpdb;
        $count = $wpdb->get_var(
            $wpdb->prepare(
                "SELECT COUNT(*)
                FROM $wpdb->comments
                WHERE comment_author_IP = %s
                AND comment_date > %s",
                $commenter_ip,
                $time_frame_mysql
            )
        );
        
        // Limitar a 3 comentarios por hora
        if ($count >= 3) {
            // En lugar de wp_die, redirigir con un mensaje de error
            $post_id = intval($_POST['comment_post_ID']);
            $redirect_url = get_permalink($post_id);
            
            // Añadir parámetro para mostrar el error
            $redirect_url = add_query_arg('comment_limit_reached', '1', $redirect_url);
            
            // Guardar un mensaje de error para mostrarlo
            $_SESSION['comment_limit_message'] = 'Has alcanzado el límite de comentarios (3 por hora). Por favor, inténtalo más tarde.';
            
            // Redirigir al usuario de vuelta a la página
            wp_safe_redirect($redirect_url . '#comments');
            exit;
        }
    }
}
add_action('pre_comment_on_post', 'limitar_comentarios_por_ip', 1);

/**
 * Función de administración para reiniciar el límite de comentarios para una IP específica
 * Solo accesible para administradores del sitio por seguridad
 */
function ikintsugi_reset_comment_limit() {
    // Solo procesar si es un administrador
    if (current_user_can('manage_options')) {
        // Verificar si se ha solicitado el reinicio
        if (isset($_GET['reset_comment_limit']) && $_GET['reset_comment_limit'] === 'true') {
            // Nonce de seguridad para proteger la acción
            if (isset($_GET['_wpnonce']) && wp_verify_nonce($_GET['_wpnonce'], 'reset_comment_limit')) {
                global $wpdb;
                $ip = $_SERVER['REMOTE_ADDR'];
                
                // Actualizar la fecha de comentarios recientes a hace más de una hora
                $one_hour_ago = date('Y-m-d H:i:s', current_time('timestamp') - 3600);
                
                $updated = $wpdb->query($wpdb->prepare(
                    "UPDATE $wpdb->comments 
                    SET comment_date = %s, comment_date_gmt = %s 
                    WHERE comment_author_IP = %s 
                    AND comment_date > %s",
                    $one_hour_ago,
                    get_gmt_from_date($one_hour_ago),
                    $ip,
                    $one_hour_ago
                ));
                
                // Añadir un mensaje para mostrar al usuario
                add_action('wp_footer', function() use ($updated) {
                    echo '<div class="comment-reset-notification" style="position:fixed; bottom:20px; right:20px; background:linear-gradient(to right, #D93280, #5A0989); color:white; padding:15px 25px; border-radius:30px; box-shadow:0 4px 15px rgba(0,0,0,0.2); z-index:9999;">
                        <p>Límite de comentarios reiniciado. Puedes comentar de nuevo.</p>
                    </div>';
                    echo '<script>
                        setTimeout(function() {
                            document.querySelector(".comment-reset-notification").style.opacity = "0";
                            setTimeout(function() {
                                document.querySelector(".comment-reset-notification").remove();
                            }, 500);
                        }, 3000);
                    </script>';
                });
                
                // Redirigir a la misma página sin los parámetros
                $redirect_url = remove_query_arg(['reset_comment_limit', '_wpnonce']);
                wp_redirect($redirect_url);
                exit;
            }
        }
    }
}
add_action('template_redirect', 'ikintsugi_reset_comment_limit');

// Mostrar un mensaje para administradores con enlace para reiniciar límite
function ikintsugi_show_reset_link() {
    // Solo para administradores
    if (current_user_can('manage_options') && !is_admin() && comments_open()) {
        $nonce = wp_create_nonce('reset_comment_limit');
        $reset_url = add_query_arg([
            'reset_comment_limit' => 'true',
            '_wpnonce' => $nonce
        ]);
        
        echo '<div class="admin-comment-tools" style="margin:15px 0; padding:10px; background:#f8f8f8; border-left:4px solid #AB277A; border-radius:4px;">
            <p><strong>Herramientas de administrador:</strong></p>
            <a href="' . esc_url($reset_url) . '" class="button" style="display:inline-block; padding:5px 15px; background:linear-gradient(to right, #D93280, #5A0989); color:white; text-decoration:none; border-radius:20px; font-size:12px;">Reiniciar límite de comentarios para mi IP</a>
        </div>';
    }
}
add_action('comment_form_before', 'ikintsugi_show_reset_link');

// Mostrar un modal/popup para el límite de comentarios
function mostrar_modal_limite_comentarios() {
    if (isset($_GET['comment_limit_reached']) && $_GET['comment_limit_reached'] == '1') {
        ?>
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Crear el modal
            var modal = document.createElement('div');
            modal.className = 'comment-limit-modal';
            modal.innerHTML = `
                <div class="comment-limit-modal-content">
                    <div class="comment-limit-modal-header bg-gradient-to-r from-[#D93280] to-[#5A0989]">
                        <h3 class="text-white font-paytone">Límite de comentarios</h3>
                        <button type="button" class="comment-limit-close">&times;</button>
                    </div>
                    <div class="comment-limit-modal-body">
                        <p>Has alcanzado el límite de comentarios (3 por hora).</p>
                        <p>Por favor, inténtalo más tarde.</p>
                    </div>
                    <div class="comment-limit-modal-footer">
                        <button type="button" class="comment-limit-ok bg-gradient-to-r from-[#D93280] to-[#5A0989] text-white">Aceptar</button>
                    </div>
                </div>
            `;
            document.body.appendChild(modal);
            
            // Estilo para el modal
            var style = document.createElement('style');
            style.textContent = `
                .comment-limit-modal {
                    position: fixed;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    background-color: rgba(0,0,0,0.5);
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    z-index: 9999;
                }
                .comment-limit-modal-content {
                    background-color: white;
                    border-radius: 12px;
                    max-width: 400px;
                    width: 100%;
                    overflow: hidden;
                    box-shadow: 0 4px 20px rgba(0,0,0,0.2);
                    animation: modalFadeIn 0.3s;
                }
                @keyframes modalFadeIn {
                    from {opacity: 0; transform: translateY(-20px);}
                    to {opacity: 1; transform: translateY(0);}
                }
                .comment-limit-modal-header {
                    padding: 15px 20px;
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                }
                .comment-limit-modal-header h3 {
                    margin: 0;
                    color: white;
                    font-size: 18px;
                }
                .comment-limit-close {
                    border: none;
                    background: transparent;
                    color: white;
                    font-size: 24px;
                    cursor: pointer;
                }
                .comment-limit-modal-body {
                    padding: 20px;
                    text-align: center;
                }
                .comment-limit-modal-footer {
                    padding: 15px 20px;
                    text-align: center;
                    border-top: 1px solid #eee;
                }
                .comment-limit-ok {
                    padding: 8px 25px;
                    border: none;
                    border-radius: 30px;
                    cursor: pointer;
                    transition: all 0.3s;
                }
                .comment-limit-ok:hover {
                    opacity: 0.9;
                    transform: translateY(-2px);
                    box-shadow: 0 4px 10px rgba(0,0,0,0.15);
                }
            `;
            document.head.appendChild(style);
            
            // Cerrar el modal
            function closeModal() {
                document.body.removeChild(modal);
                // Eliminar el parámetro de la URL
                var url = new URL(window.location);
                url.searchParams.delete('comment_limit_reached');
                history.replaceState({}, document.title, url);
            }
            
            modal.querySelector('.comment-limit-close').addEventListener('click', closeModal);
            modal.querySelector('.comment-limit-ok').addEventListener('click', closeModal);
            
            // Cerrar al hacer clic fuera del modal
            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
                    closeModal();
                }
            });
        });
        </script>
        <?php
    }
}
add_action('wp_footer', 'mostrar_modal_limite_comentarios');

// Asegurar que tenemos sesiones disponibles
function iniciar_sesion_wordpress() {
    if (!session_id()) {
        session_start();
    }
}
add_action('init', 'iniciar_sesion_wordpress');

/**
 * Funciones para permitir a los usuarios editar y eliminar sus propios comentarios
 */
// Añadir el email del comentarista como atributo data
function agregar_email_a_comentarios($comment_text, $comment) {
    $comment_obj = get_comment($comment);
    if ($comment_obj && !is_admin()) {
        // Encontrar el div del comentario para añadir el atributo
        $comment_id = $comment_obj->comment_ID;
        
        // Añadir script inline para añadir el atributo data
        add_action('wp_footer', function() use ($comment_id, $comment_obj) {
            echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    const commentEl = document.getElementById('comment-" . $comment_id . "');
                    if (commentEl) {
                        commentEl.setAttribute('data-comment-email', '" . esc_attr($comment_obj->comment_author_email) . "');
                    }
                });
            </script>";
        }, 99);
    }
    return $comment_text;
}
add_filter('comment_text', 'agregar_email_a_comentarios', 10, 2);

// Función AJAX para eliminar comentarios
function ikintsugi_delete_comment() {
    // Verificar nonce
    check_ajax_referer('delete_comment');
    
    // Obtener ID del comentario
    $comment_id = isset($_POST['comment_id']) ? intval($_POST['comment_id']) : 0;
    
    // Verificar que existe el comentario
    $comment = get_comment($comment_id);
    if (!$comment) {
        wp_send_json_error('Comentario no encontrado');
        wp_die();
    }
    
    // Verificar que el usuario actual es el autor del comentario o un administrador
    $current_user_id = get_current_user_id();
    if (!$current_user_id) {
        wp_send_json_error('Debes iniciar sesión para eliminar comentarios');
        wp_die();
    }
    
    // Verificación de permisos
    if (current_user_can('moderate_comments') || $current_user_id == $comment->user_id) {
        // Eliminar el comentario
        $result = wp_delete_comment($comment_id, true);
        
        if ($result) {
            wp_send_json_success('Comentario eliminado correctamente');
        } else {
            wp_send_json_error('Error al eliminar el comentario');
        }
    } else {
        wp_send_json_error('No tienes permiso para eliminar este comentario');
    }
    
    wp_die();
}
add_action('wp_ajax_ikintsugi_delete_comment', 'ikintsugi_delete_comment');
add_action('wp_ajax_nopriv_ikintsugi_delete_comment', function() {
    wp_send_json_error('Debes iniciar sesión para eliminar comentarios');
    wp_die();
});

// Función AJAX para editar comentarios
function ikintsugi_edit_comment() {
    // Verificar nonce
    check_ajax_referer('edit_comment');
    
    // Obtener datos
    $comment_id = isset($_POST['comment_id']) ? intval($_POST['comment_id']) : 0;
    $comment_content = isset($_POST['comment_content']) ? sanitize_textarea_field($_POST['comment_content']) : '';
    
    // Verificar que existe el comentario
    $comment = get_comment($comment_id);
    if (!$comment) {
        wp_send_json_error(array(
            'message' => 'Comentario no encontrado'
        ));
        wp_die();
    }
    
    // Verificar que el usuario actual es el autor del comentario o un administrador
    $current_user_id = get_current_user_id();
    if (!$current_user_id) {
        wp_send_json_error(array(
            'message' => 'Debes iniciar sesión para editar comentarios'
        ));
        wp_die();
    }
    
    // Verificación de permisos
    if (current_user_can('moderate_comments') || $current_user_id == $comment->user_id) {
        // Actualizar el comentario
        $comment_data = array(
            'comment_ID' => $comment_id,
            'comment_content' => $comment_content
        );
        
        $result = wp_update_comment($comment_data);
        
        if ($result) {
            // Obtener el comentario actualizado para devolver su contenido
            $updated_comment = get_comment($comment_id);
            wp_send_json_success(array(
                'message' => 'Comentario actualizado correctamente',
                'content' => apply_filters('comment_text', $updated_comment->comment_content, $updated_comment)
            ));
        } else {
            wp_send_json_error(array(
                'message' => 'Error al actualizar el comentario'
            ));
        }
    } else {
        wp_send_json_error(array(
            'message' => 'No tienes permiso para editar este comentario'
        ));
    }
    
    wp_die();
}
add_action('wp_ajax_ikintsugi_edit_comment', 'ikintsugi_edit_comment');
add_action('wp_ajax_nopriv_ikintsugi_edit_comment', function() {
    wp_send_json_error(array(
        'message' => 'Debes iniciar sesión para editar comentarios'
    ));
    wp_die();
});

/**
 * Sistema de registro y login para comentarios
 */

// Función para registrar un nuevo usuario
function ikintsugi_register_user() {
    // Verificar nonce
    check_ajax_referer('ikintsugi_register_nonce', 'register_nonce');
    
    // Obtener datos del formulario
    $username = isset($_POST['username']) ? sanitize_user($_POST['username']) : '';
    $email = isset($_POST['email']) ? sanitize_email($_POST['email']) : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $password_confirm = isset($_POST['password_confirm']) ? $_POST['password_confirm'] : '';
    $redirect = isset($_POST['redirect']) ? esc_url_raw($_POST['redirect']) : home_url('/blog');
    
    // Validar datos
    $errors = array();
    
    if (empty($username)) {
        $errors[] = 'El nombre de usuario es obligatorio';
    }
    
    if (empty($email) || !is_email($email)) {
        $errors[] = 'El correo electrónico no es válido';
    }
    
    if (empty($password)) {
        $errors[] = 'La contraseña es obligatoria';
    }
    
    if ($password !== $password_confirm) {
        $errors[] = 'Las contraseñas no coinciden';
    }
    
    // Verificar si el usuario o email ya existen
    if (username_exists($username)) {
        $errors[] = 'Este nombre de usuario ya está en uso';
    }
    
    if (email_exists($email)) {
        $errors[] = 'Este correo electrónico ya está registrado';
    }
    
    // Si hay errores, devolver respuesta de error
    if (!empty($errors)) {
        wp_send_json_error(array(
            'message' => 'Error al registrar usuario',
            'errors' => $errors
        ));
        wp_die();
    }
    
    // Registrar el usuario
    $user_id = wp_create_user($username, $password, $email);
    
    if (is_wp_error($user_id)) {
        wp_send_json_error(array(
            'message' => 'Error al registrar usuario',
            'errors' => array($user_id->get_error_message())
        ));
        wp_die();
    }
    
    // Establecer el rol del usuario
    $user = new WP_User($user_id);
    $user->set_role('subscriber');
    
    // Iniciar sesión automáticamente
    wp_clear_auth_cookie();
    wp_set_current_user($user_id);
    wp_set_auth_cookie($user_id);
    
    // Devolver respuesta exitosa
    wp_send_json_success(array(
        'message' => 'Usuario registrado correctamente',
        'redirect' => $redirect
    ));
    
    wp_die();
}
add_action('wp_ajax_nopriv_ikintsugi_register_user', 'ikintsugi_register_user');

// Función para iniciar sesión
function ikintsugi_login_user() {
    // Verificar nonce
    check_ajax_referer('ikintsugi_login_nonce', 'login_nonce');
    
    // Obtener datos del formulario
    $username = isset($_POST['username']) ? sanitize_user($_POST['username']) : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $remember = isset($_POST['remember']) ? (bool) $_POST['remember'] : false;
    $redirect = isset($_POST['redirect']) ? esc_url_raw($_POST['redirect']) : home_url('/blog');
    
    // Validar datos
    if (empty($username) || empty($password)) {
        wp_send_json_error(array(
            'message' => 'Por favor, ingresa tu nombre de usuario y contraseña'
        ));
        wp_die();
    }
    
    // Intentar iniciar sesión
    $credentials = array(
        'user_login' => $username,
        'user_password' => $password,
        'remember' => $remember
    );
    
    $user = wp_signon($credentials, is_ssl());
    
    if (is_wp_error($user)) {
        wp_send_json_error(array(
            'message' => 'Nombre de usuario o contraseña incorrectos'
        ));
        wp_die();
    }
    
    // Devolver respuesta exitosa
    wp_send_json_success(array(
        'message' => 'Sesión iniciada correctamente',
        'redirect' => $redirect
    ));
    
    wp_die();
}
add_action('wp_ajax_nopriv_ikintsugi_login_user', 'ikintsugi_login_user');

// Función para cerrar sesión
function ikintsugi_logout_user() {
    wp_logout();
    wp_redirect(home_url('/blog'));
    exit;
}
add_action('wp_ajax_ikintsugi_logout_user', 'ikintsugi_logout_user');

// Registrar páginas de login y registro
function ikintsugi_register_login_pages() {
    // Agregar rewrite rules para login y registro
    add_rewrite_rule(
        '^login/?$',
        'index.php?pagename=login',
        'top'
    );
    
    add_rewrite_rule(
        '^registro/?$',
        'index.php?pagename=registro',
        'top'
    );
    
    // Hacer flush de las reglas si es necesario
    if (get_option('ikintsugi_flush_rules', false)) {
        flush_rewrite_rules();
        delete_option('ikintsugi_flush_rules');
    }
}
add_action('init', 'ikintsugi_register_login_pages');

// Activar flag para hacer flush de reglas al activar el tema
function ikintsugi_auth_activation() {
    add_option('ikintsugi_flush_rules', true);
}
add_action('after_switch_theme', 'ikintsugi_auth_activation');

// Forzar flush de reglas para login y registro
function ikintsugi_flush_rules_now() {
    if (!get_option('ikintsugi_flushed_now', false)) {
        flush_rewrite_rules();
        update_option('ikintsugi_flushed_now', true);
    }
}
add_action('init', 'ikintsugi_flush_rules_now', 20);

// Crear páginas de login y registro si no existen
function ikintsugi_create_auth_pages() {
    // Crear página de login si no existe
    $login_page = get_posts([
        'name' => 'login',
        'post_type' => 'page',
        'numberposts' => 1
    ]);
    
    if (empty($login_page)) {
        wp_insert_post(array(
            'post_title'    => 'Iniciar sesión',
            'post_name'     => 'login',
            'post_status'   => 'publish',
            'post_type'     => 'page',
            'post_content'  => '',
            'comment_status' => 'closed'
        ));
    }
    
    // Crear página de registro si no existe
    $register_page = get_posts([
        'name' => 'registro',
        'post_type' => 'page',
        'numberposts' => 1
    ]);
    
    if (empty($register_page)) {
        wp_insert_post(array(
            'post_title'    => 'Registro',
            'post_name'     => 'registro',
            'post_status'   => 'publish',
            'post_type'     => 'page',
            'post_content'  => '',
            'comment_status' => 'closed'
        ));
    }
}
add_action('after_switch_theme', 'ikintsugi_create_auth_pages');
add_action('init', 'ikintsugi_create_auth_pages', 10);

// Redirigir a la página de login si se intenta acceder a páginas restringidas sin sesión
function ikintsugi_restrict_access() {
    // Si estamos en admin y no es un admin, redirigir
    if (is_admin() && !current_user_can('manage_options') && !(defined('DOING_AJAX') && DOING_AJAX)) {
        wp_redirect(home_url('/login'));
        exit;
    }
}
add_action('init', 'ikintsugi_restrict_access');

// Enqueue scripts y localizar datos para comentarios
function ikintsugi_comment_scripts() {
    // Solo necesitamos estos scripts en single posts o páginas con comentarios
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        // Crear nonces para editar/eliminar comentarios
        $edit_nonce = wp_create_nonce('edit_comment');
        $delete_nonce = wp_create_nonce('delete_comment');
        
        // Localizar script para comentarios
        wp_localize_script('jquery', 'ikintsugi_comments', array(
            'ajax_url' => admin_url('admin-ajax.php'),
            'edit_nonce' => $edit_nonce,
            'delete_nonce' => $delete_nonce,
            'nonce' => $delete_nonce // Para compatibilidad con versiones anteriores
        ));
    }
}
add_action('wp_enqueue_scripts', 'ikintsugi_comment_scripts');

// Verificar redirecciones para login y registro
function ikintsugi_template_redirects() {
    global $wp_query;
    
    // Si ya estamos logueados y intentamos acceder a login o registro, redirigir al blog
    if (is_user_logged_in() && (is_page('login') || is_page('registro'))) {
        wp_redirect(home_url('/blog'));
        exit;
    }
}
add_action('template_redirect', 'ikintsugi_template_redirects');

// Agregar template para login y registro
function ikintsugi_page_templates($templates) {
    if (is_page('login')) {
        $new_template = locate_template(['resources/views/auth/login.blade.php']);
        if (!empty($new_template)) {
            return $new_template;
        }
    }
    
    if (is_page('registro')) {
        $new_template = locate_template(['resources/views/auth/register.blade.php']);
        if (!empty($new_template)) {
            return $new_template;
        }
    }
    
    return $templates;
}
add_filter('template_include', 'ikintsugi_page_templates');

// Función AJAX para actualizar el perfil de usuario
function ikintsugi_update_user_profile() {
    // Verificar nonce y permisos
    check_ajax_referer('update_user_profile', 'profile_nonce');
    
    if (!is_user_logged_in()) {
        wp_send_json_error(['message' => 'Debes iniciar sesión']);
        return;
    }
    
    $user_id = get_current_user_id();
    $current_user = get_user_by('id', $user_id);
    
    // Datos básicos de usuario
    $first_name = isset($_POST['first_name']) ? sanitize_text_field($_POST['first_name']) : '';
    $last_name = isset($_POST['last_name']) ? sanitize_text_field($_POST['last_name']) : '';
    $user_email = isset($_POST['email']) ? sanitize_email($_POST['email']) : '';
    $phone = isset($_POST['phone']) ? sanitize_text_field($_POST['phone']) : '';
    $bio = isset($_POST['bio']) ? sanitize_textarea_field($_POST['bio']) : '';
    
    // Verificar que el email no esté en uso por otro usuario
    if ($current_user->user_email !== $user_email && email_exists($user_email)) {
        wp_send_json_error(['message' => 'El email ya está en uso por otro usuario']);
        return;
    }
    
    // Actualizar datos básicos
    $args = [
        'ID' => $user_id,
        'first_name' => $first_name,
        'last_name' => $last_name,
        'display_name' => trim($first_name . ' ' . $last_name)
    ];
    
    // Actualizar email solo si es diferente
    if ($current_user->user_email !== $user_email) {
        $args['user_email'] = $user_email;
    }
    
    // Actualizar usuario
    $user_id = wp_update_user($args);
    
    if (is_wp_error($user_id)) {
        wp_send_json_error(['message' => $user_id->get_error_message()]);
        return;
    }
    
    // Actualizar metadatos adicionales
    update_user_meta($user_id, 'phone', $phone);
    update_user_meta($user_id, 'description', $bio);
    
    // Guardar el teléfono también en otro campo para compatibilidad
    update_user_meta($user_id, 'billing_phone', $phone); // WooCommerce compatible
    
    // Procesar imagen de perfil si se ha subido
    if (!empty($_FILES['profile_image']['name'])) {
        // Verificar que el archivo es una imagen
        $file_type = wp_check_filetype($_FILES['profile_image']['name']);
        $valid_image_types = ['jpg', 'jpeg', 'png', 'gif'];
        
        if (!$file_type['ext'] || !in_array($file_type['ext'], $valid_image_types)) {
            wp_send_json_error(['message' => 'Por favor, sube un archivo de imagen válido (JPG, PNG o GIF)']);
            return;
        }
        
        // Manejar la subida del archivo
        require_once(ABSPATH . 'wp-admin/includes/file.php');
        require_once(ABSPATH . 'wp-admin/includes/image.php');
        
        $upload = wp_handle_upload($_FILES['profile_image'], ['test_form' => false]);
        
        if (isset($upload['error'])) {
            wp_send_json_error(['message' => $upload['error']]);
            return;
        }
        
        if (isset($upload['file'])) {
            $attachment_id = wp_insert_attachment(
                [
                    'post_mime_type' => $upload['type'],
                    'post_title' => sanitize_file_name($_FILES['profile_image']['name']),
                    'post_content' => '',
                    'post_status' => 'inherit'
                ],
                $upload['file']
            );
            
            if (!is_wp_error($attachment_id)) {
                // Generar metadatos para el adjunto
                $attachment_data = wp_generate_attachment_metadata($attachment_id, $upload['file']);
                wp_update_attachment_metadata($attachment_id, $attachment_data);
                
                // Asignar como avatar del usuario
                update_user_meta($user_id, 'wp_user_avatar', $attachment_id);
                
                // Eliminar cualquier avatar temporal
                delete_user_meta($user_id, '_wp_user_avatar_temp');
            }
        }
    }
    
    // Si está integrado con Bookly, actualizar también los datos ahí
    if (function_exists('bookly_customer_save_in_database')) {
        $bookly_customer_id = get_user_meta($user_id, 'bookly_customer_id', true);
        if ($bookly_customer_id) {
            // Actualizar información del cliente en Bookly
            global $wpdb;
            $table_name = $wpdb->prefix . 'bookly_customers';
            
            $wpdb->update(
                $table_name,
                array(
                    'full_name' => trim($first_name . ' ' . $last_name),
                    'first_name' => $first_name,
                    'last_name' => $last_name,
                    'phone' => $phone,
                    'email' => $user_email
                ),
                array('id' => $bookly_customer_id)
            );
        } else {
            // El usuario no tiene cliente Bookly asignado, crear uno nuevo
            global $wpdb;
            $table_name = $wpdb->prefix . 'bookly_customers';
            
            $result = $wpdb->insert(
                $table_name,
                array(
                    'wp_user_id' => $user_id,
                    'full_name' => trim($first_name . ' ' . $last_name),
                    'first_name' => $first_name,
                    'last_name' => $last_name,
                    'phone' => $phone,
                    'email' => $user_email,
                    'created_at' => current_time('mysql')
                )
            );
            
            if ($result) {
                $bookly_customer_id = $wpdb->insert_id;
                update_user_meta($user_id, 'bookly_customer_id', $bookly_customer_id);
            }
        }
    }
    
    wp_send_json_success(['message' => 'Perfil actualizado correctamente']);
}
add_action('wp_ajax_update_user_profile', 'ikintsugi_update_user_profile');

// Función AJAX para actualizar la contraseña de usuario
function ikintsugi_update_user_password() {
    // Verificar nonce y permisos
    check_ajax_referer('update_user_password', 'password_nonce');
    
    if (!is_user_logged_in()) {
        wp_send_json_error(['message' => 'Debes iniciar sesión']);
        return;
    }
    
    $user_id = get_current_user_id();
    $current_user = get_user_by('id', $user_id);
    
    // Obtener datos de formulario
    $current_password = isset($_POST['current_password']) ? $_POST['current_password'] : '';
    $new_password = isset($_POST['new_password']) ? $_POST['new_password'] : '';
    $confirm_password = isset($_POST['confirm_password']) ? $_POST['confirm_password'] : '';
    
    // Verificar que las contraseñas coincidan
    if ($new_password !== $confirm_password) {
        wp_send_json_error(['message' => 'Las contraseñas no coinciden']);
        return;
    }
    
    // Verificar la contraseña actual
    if (!wp_check_password($current_password, $current_user->user_pass, $user_id)) {
        wp_send_json_error(['message' => 'La contraseña actual es incorrecta']);
        return;
    }
    
    // Verificar complejidad de la contraseña
    if (strlen($new_password) < 8) {
        wp_send_json_error(['message' => 'La contraseña debe tener al menos 8 caracteres']);
        return;
    }
    
    // Actualizar contraseña
    wp_set_password($new_password, $user_id);
    
    // Mantener la sesión activa
    wp_set_auth_cookie($user_id, true);
    
    wp_send_json_success(['message' => 'Contraseña actualizada correctamente']);
}
add_action('wp_ajax_update_user_password', 'ikintsugi_update_user_password');
