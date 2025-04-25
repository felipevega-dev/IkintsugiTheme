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
            <h2><?php _e('Resumen', 'simple-carousel'); ?></h2>
            
            <?php
            $items_count = wp_count_posts('carousel_item');
            $published_count = $items_count->publish;
            ?>
            
            <div class="simple-carousel-stats">
                <div class="stat-item">
                    <h3><?php echo $published_count; ?></h3>
                    <p><?php _e('Items Publicados', 'simple-carousel'); ?></p>
                </div>
            </div>

            <div class="simple-carousel-actions">
                <a href="<?php echo admin_url('post-new.php?post_type=carousel_item'); ?>" class="button button-primary">
                    <?php _e('Añadir Nuevo Item', 'simple-carousel'); ?>
                </a>
                <a href="<?php echo admin_url('edit.php?post_type=carousel_item'); ?>" class="button">
                    <?php _e('Ver Todos los Items', 'simple-carousel'); ?>
                </a>
            </div>
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