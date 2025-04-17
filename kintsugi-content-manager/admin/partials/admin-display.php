<?php
/**
 * Admin page display template.
 *
 * @link       https://ikintsugi.com
 * @since      1.0.0
 *
 * @package    Kintsugi_Content_Manager
 * @subpackage Kintsugi_Content_Manager/admin/partials
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

// Obtener estadísticas
$total_noticias = wp_count_posts('noticia')->publish;
$total_videos = get_posts(array(
    'post_type' => 'noticia',
    'meta_key' => '_tipo_noticia',
    'meta_value' => 'video',
    'posts_per_page' => -1,
    'fields' => 'ids'
));
$total_videos = count($total_videos);
$total_articulos = $total_noticias - $total_videos;

// Obtener noticias en carrusel
$carousel_settings = get_option('kintsugi_carousel_noticias', array());
$total_carousel = isset($carousel_settings['noticias_ids']) ? count($carousel_settings['noticias_ids']) : 0;
?>

<div class="wrap">
    <div class="kintsugi-admin-header">
        <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
        <p><?php _e('Administra las noticias del sitio de manera sencilla. Comparte tus mejores contenidos con tus visitantes.', 'kintsugi-content-manager'); ?></p>
    </div>

    <div class="kintsugi-admin-content">
        <!-- Dashboard con estadísticas -->
        <div class="kintsugi-dashboard">
            <div class="kintsugi-dashboard-item">
                <h3><?php _e('Total de Noticias', 'kintsugi-content-manager'); ?></h3>
                <div class="kintsugi-dashboard-value"><?php echo $total_noticias; ?></div>
                <div class="kintsugi-dashboard-description"><?php _e('Noticias publicadas en el sitio', 'kintsugi-content-manager'); ?></div>
            </div>
            
            <div class="kintsugi-dashboard-item">
                <h3><?php _e('Artículos', 'kintsugi-content-manager'); ?></h3>
                <div class="kintsugi-dashboard-value"><?php echo $total_articulos; ?></div>
                <div class="kintsugi-dashboard-description"><?php _e('Artículos publicados', 'kintsugi-content-manager'); ?></div>
            </div>
            
            <div class="kintsugi-dashboard-item">
                <h3><?php _e('Videos', 'kintsugi-content-manager'); ?></h3>
                <div class="kintsugi-dashboard-value"><?php echo $total_videos; ?></div>
                <div class="kintsugi-dashboard-description"><?php _e('Videos publicados', 'kintsugi-content-manager'); ?></div>
            </div>
            
            <div class="kintsugi-dashboard-item">
                <h3><?php _e('En Carrusel', 'kintsugi-content-manager'); ?></h3>
                <div class="kintsugi-dashboard-value"><?php echo $total_carousel; ?></div>
                <div class="kintsugi-dashboard-description"><?php _e('Noticias mostradas en carrusel', 'kintsugi-content-manager'); ?></div>
            </div>
        </div>
        
        <!-- Acciones rápidas -->
        <div class="kintsugi-quick-actions">
            <a href="<?php echo admin_url('post-new.php?post_type=noticia'); ?>" class="kintsugi-btn">
                <span class="dashicons dashicons-plus-alt" style="margin-right: 5px;"></span>
                <?php _e('Añadir Noticia', 'kintsugi-content-manager'); ?>
            </a>
            
            <a href="<?php echo admin_url('admin.php?page=kintsugi-carousel-settings'); ?>" class="kintsugi-btn kintsugi-btn-secondary">
                <span class="dashicons dashicons-images-alt" style="margin-right: 5px;"></span>
                <?php _e('Configurar Carrusel', 'kintsugi-content-manager'); ?>
            </a>
        </div>

        <div class="kintsugi-admin-card">
            <h2><?php _e('Últimas Noticias', 'kintsugi-content-manager'); ?></h2>
            
            <?php
            $recent_noticias = get_posts(array(
                'post_type' => 'noticia',
                'posts_per_page' => 5,
                'orderby' => 'date',
                'order' => 'DESC'
            ));
            
            if ($recent_noticias) : 
            ?>
                <table class="widefat" style="border-collapse: collapse; width: 100%;">
                    <thead>
                        <tr>
                            <th><?php _e('Título', 'kintsugi-content-manager'); ?></th>
                            <th style="width: 15%;"><?php _e('Tipo', 'kintsugi-content-manager'); ?></th>
                            <th style="width: 15%;"><?php _e('Fecha', 'kintsugi-content-manager'); ?></th>
                            <th style="width: 15%;"><?php _e('Acciones', 'kintsugi-content-manager'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($recent_noticias as $noticia) : 
                            $tipo = get_post_meta($noticia->ID, '_tipo_noticia', true);
                        ?>
                            <tr>
                                <td><strong><?php echo esc_html($noticia->post_title); ?></strong></td>
                                <td>
                                    <?php if ($tipo === 'video') : ?>
                                        <span style="color: #D93280;"><?php _e('Video', 'kintsugi-content-manager'); ?></span>
                                    <?php else : ?>
                                        <span style="color: #030D55;"><?php _e('Artículo', 'kintsugi-content-manager'); ?></span>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo get_the_date('', $noticia->ID); ?></td>
                                <td>
                                    <a href="<?php echo get_edit_post_link($noticia->ID); ?>" class="button button-small">
                                        <?php _e('Editar', 'kintsugi-content-manager'); ?>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                
                <p style="margin-top: 15px;">
                    <a href="<?php echo admin_url('edit.php?post_type=noticia'); ?>" class="button">
                        <?php _e('Ver todas las noticias', 'kintsugi-content-manager'); ?>
                    </a>
                </p>
            <?php else : ?>
                <p><?php _e('No hay noticias publicadas todavía.', 'kintsugi-content-manager'); ?></p>
            <?php endif; ?>
        </div>

        <div class="kintsugi-admin-card">
            <h2><?php _e('Instrucciones de Uso', 'kintsugi-content-manager'); ?></h2>
            
            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 20px;">
                <div style="background: #f9f9f9; padding: 20px; border-radius: 8px;">
                    <h3 style="margin-top: 0;"><?php _e('Listado de Noticias', 'kintsugi-content-manager'); ?></h3>
                    <p><?php _e('Para mostrar el listado completo de noticias en cualquier página:', 'kintsugi-content-manager'); ?></p>
                    <code style="display: block; margin: 10px 0;">[administracion_noticias]</code>
                    <p><?php _e('Puedes especificar cuántas noticias mostrar por página:', 'kintsugi-content-manager'); ?></p>
                    <code style="display: block; margin: 10px 0;">[administracion_noticias per_page="6"]</code>
                </div>
                
                <div style="background: #f9f9f9; padding: 20px; border-radius: 8px;">
                    <h3 style="margin-top: 0;"><?php _e('Carrusel de Noticias', 'kintsugi-content-manager'); ?></h3>
                    <p><?php _e('Para mostrar un carrusel con las noticias seleccionadas:', 'kintsugi-content-manager'); ?></p>
                    <code style="display: block; margin: 10px 0;">[administracion_noticias_carrousel]</code>
                    <p><?php _e('Especificar cantidad de noticias a mostrar:', 'kintsugi-content-manager'); ?></p>
                    <code style="display: block; margin: 10px 0;">[administracion_noticias_carrousel count="6"]</code>
                </div>
                
                <div style="background: #f9f9f9; padding: 20px; border-radius: 8px;">
                    <h3 style="margin-top: 0;"><?php _e('Noticias Recientes', 'kintsugi-content-manager'); ?></h3>
                    <p><?php _e('Para mostrar solo noticias recientes:', 'kintsugi-content-manager'); ?></p>
                    <code style="display: block; margin: 10px 0;">[administracion_noticias_recientes count="3"]</code>
                </div>
            </div>
            
            <p style="margin-top: 20px;"><?php _e('Para más información sobre cómo personalizar estos shortcodes, contacta con el equipo de Ikintsugi.', 'kintsugi-content-manager'); ?></p>
        </div>
        
        <div style="text-align: right; font-size: 12px; color: #666; margin-top: 10px;">
            <?php _e('Versión del plugin:', 'kintsugi-content-manager'); ?> <strong><?php echo KINTSUGI_CONTENT_MANAGER_VERSION; ?></strong>
        </div>
    </div>
</div> 