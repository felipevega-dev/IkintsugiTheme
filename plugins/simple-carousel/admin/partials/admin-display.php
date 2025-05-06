<?php
if (!defined('ABSPATH')) exit;
?>

<div class="wrap">
    <div class="simple-carousel-admin-header">
        <h1><?php _e('Simple Carousel', 'simple-carousel'); ?></h1>
        <p><?php _e('Administra tus carruseles y grids de contenido fácilmente', 'simple-carousel'); ?></p>
    </div>

    <div class="simple-carousel-admin-content">
        <div class="simple-carousel-admin-card">
            <h2><?php _e('Ordenar Carrusel', 'simple-carousel'); ?></h2>
            <p><?php _e('Arrastra las tarjetas para cambiar el orden de aparición en el carrusel. Haz clic en el título para editar.', 'simple-carousel'); ?></p>
            
            <?php if (isset($_GET['saved']) && $_GET['saved'] == 1): ?>
                <div class="notice notice-success is-dismissible">
                    <p><?php _e('¡Orden del carrusel guardado exitosamente!', 'simple-carousel'); ?></p>
                </div>
            <?php endif; ?>
            
            <ul class="simple-carousel-items-sortable">
            <?php
            $items = get_posts([
                'post_type' => 'carousel_item',
                'posts_per_page' => -1,
                'orderby' => 'menu_order',
                'order' => 'ASC',
            ]);
            if ($items) {
                foreach ($items as $item) {
                    $thumb = get_the_post_thumbnail_url($item->ID, 'medium');
                    $type = get_post_meta($item->ID, '_carousel_item_type', true);
                    $type = $type ?: 'image';
                    $video_url = '';
                    $thumbnail_url = $thumb;
                    
                    // Generar thumbnail para videos
                    if ($type === 'video') {
                        $video_url = get_post_meta($item->ID, '_video_url', true);
                        if (strpos($video_url, 'youtube.com') !== false || strpos($video_url, 'youtu.be') !== false) {
                            preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/', $video_url, $matches);
                            if (isset($matches[1])) {
                                $video_id = $matches[1];
                                $thumbnail_url = "https://img.youtube.com/vi/{$video_id}/mqdefault.jpg";
                            }
                        } elseif (strpos($video_url, 'vimeo.com') !== false) {
                            $thumbnail_url = $thumb ?: plugin_dir_url(__FILE__) . '../../images/video-placeholder.jpg';
                        }
                    }
                    
                    // Si no hay thumbnail, usar placeholder
                    if (!$thumbnail_url) {
                        $thumbnail_url = $type === 'video' 
                            ? plugin_dir_url(__FILE__) . '../../images/video-placeholder.jpg'
                            : plugin_dir_url(__FILE__) . '../../images/image-placeholder.jpg';
                    }
                    
                    echo '<li class="carousel-item ' . esc_attr($type) . '-item" data-id="' . $item->ID . '">
                        <span class="sort-handle">☰</span>
                        <div class="thumb-container">
                            <img src="' . esc_url($thumbnail_url) . '" alt="' . esc_attr($item->post_title) . '">
                        </div>
                        <a href="' . get_edit_post_link($item->ID) . '" class="item-title">' . esc_html($item->post_title) . '</a>
                        <span class="item-type">' . ($type === 'video' ? 'Video' : 'Imagen') . '</span>
                    </li>';
                }
            } else {
                echo '<div class="empty-carousel">
                    <p>' . __('No hay items en el carrusel.', 'simple-carousel') . '</p>
                    <a href="' . admin_url('post-new.php?post_type=carousel_item') . '" class="button button-primary">' . __('Añadir Primer Item', 'simple-carousel') . '</a>
                </div>';
            }
            ?>
            </ul>
            <div id="carousel-order-success"><?php _e('¡Orden guardado exitosamente!', 'simple-carousel'); ?></div>
            
            <?php if (!empty($items)): ?>
                <div class="simple-carousel-actions">
                    <a href="<?php echo admin_url('post-new.php?post_type=carousel_item'); ?>" class="button">
                        <?php _e('Añadir Nuevo Item', 'simple-carousel'); ?>
                    </a>
                    <button type="button" id="save-carousel-order" class="button button-primary">
                        <?php _e('Guardar Orden', 'simple-carousel'); ?>
                    </button>
                </div>
            <?php endif; ?>
        </div>

        <div class="simple-carousel-admin-card">
            <h2><?php _e('Shortcodes Disponibles', 'simple-carousel'); ?></h2>
            <p><?php _e('Usa estos shortcodes para mostrar el carrusel o grid en cualquier página:', 'simple-carousel'); ?></p>
            
            <div class="simple-carousel-shortcodes">
                <div class="shortcode-item">
                    <code>[simple_carousel]</code>
                    <p><?php _e('Muestra un carrusel con los items seleccionados', 'simple-carousel'); ?></p>
                </div>
                <div class="shortcode-item">
                    <code>[simple_carousel_grid]</code>
                    <p><?php _e('Muestra un grid con los items seleccionados', 'simple-carousel'); ?></p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.simple-carousel-stats {
    display: flex;
    gap: 20px;
    margin: 20px 0;
}

.stat-item {
    background: #f8f9fa;
    padding: 20px;
    border-radius: 8px;
    text-align: center;
    min-width: 150px;
}

.stat-item h3 {
    margin: 0;
    font-size: 24px;
    color: #362766;
}

.stat-item p {
    margin: 5px 0 0;
    color: #666;
}

.simple-carousel-actions {
    margin: 20px 0;
}

.simple-carousel-actions .button {
    margin-right: 10px;
}

.simple-carousel-shortcodes {
    margin-top: 20px;
}

.shortcode-item {
    background: #f8f9fa;
    padding: 15px;
    border-radius: 6px;
    margin-bottom: 10px;
}

.shortcode-item code {
    display: inline-block;
    background: #fff;
    padding: 8px 12px;
    border-radius: 4px;
    border: 1px solid #ddd;
    font-size: 14px;
}

.shortcode-item p {
    margin: 10px 0 0;
    color: #666;
}
</style> 