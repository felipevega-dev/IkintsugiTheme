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

