<?php
if (!defined('WPINC')) die;

class Simple_Carousel_Grid {
    public function __construct() {
        // Solo registrar el menú si no estamos usando la nueva clase de admin
        if (!class_exists('Simple_Carousel_Admin') || !defined('SIMPLE_CAROUSEL_ADMIN_LOADED')) {
            add_action('admin_menu', [$this, 'add_admin_menu']);
        }
        
        add_shortcode('simple_carousel_grid', [$this, 'render_grid']);
    }

    // Renderiza el grid usando template
    public function render_grid($atts) {
        $atts = shortcode_atts([
            'items_per_page' => 9,
            'orderby' => 'date',
            'order' => 'DESC',
        ], $atts);

        $args = [
            'post_type' => 'carousel_item',
            'posts_per_page' => $atts['items_per_page'],
            'orderby' => $atts['orderby'],
            'order' => $atts['order']
        ];
        $items = get_posts($args);
        $total_items = wp_count_posts('carousel_item')->publish;
        ob_start();
        include SIMPLE_CAROUSEL_PATH . 'templates/grid-item.php';
        return ob_get_clean();
    }
}
