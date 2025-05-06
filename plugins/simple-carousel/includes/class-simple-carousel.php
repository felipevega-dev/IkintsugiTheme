<?php
if (!defined('WPINC')) die;

class Simple_Carousel {
    public function __construct() {
        add_action('init', [$this, 'init']);
        
        // Solo registrar el menú si no estamos usando la nueva clase de admin
        if (!class_exists('Simple_Carousel_Admin') || !defined('SIMPLE_CAROUSEL_ADMIN_LOADED')) {
            add_action('admin_menu', [$this, 'add_admin_menu']);
        }
    }

    public function init() {
        $this->register_carousel_post_type();
        add_shortcode('simple_carousel', [$this, 'render_carousel']);
    }

    public function register_carousel_post_type() {
        register_post_type('carousel_item', array(
            'labels' => array(
                'name' => __('Carousel Items'),
                'singular_name' => __('Carousel Item'),
                'add_new' => __('Add New'),
                'add_new_item' => __('Add New Item'),
                'edit_item' => __('Edit Item'),
                'new_item' => __('New Item'),
                'view_item' => __('View Item'),
                'search_items' => __('Search Items'),
                'not_found' => __('No items found'),
                'not_found_in_trash' => __('No items found in Trash')
            ),
            'public' => true,
            'show_in_menu' => false,
            'supports' => array('title', 'editor', 'thumbnail'),
            'menu_position' => 20,
            'has_archive' => false
        ));

        add_action('add_meta_boxes', [$this, 'add_carousel_meta_boxes']);
        add_action('save_post_carousel_item', [$this, 'save_carousel_meta']);
    }

    public function add_admin_menu() {
        add_menu_page(
            __('Carousel Manager'),
            __('Carousel'),
            'manage_options',
            'simple-carousel',
            [$this, 'display_admin_page'],
            'dashicons-images-alt2',
            20
        );
        add_submenu_page(
            'simple-carousel',
            __('Add New Item'),
            __('Add New Item'),
            'manage_options',
            'post-new.php?post_type=carousel_item'
        );
        add_submenu_page(
            'simple-carousel',
            __('Settings'),
            __('Settings'),
            'manage_options',
            'simple-carousel-settings',
            [$this, 'display_settings_page']
        );
    }

    public function display_admin_page() {
        include SIMPLE_CAROUSEL_PATH . 'admin/partials/admin-display.php';
    }
    public function display_settings_page() {
        include SIMPLE_CAROUSEL_PATH . 'admin/partials/settings-display.php';
    }

    // Meta Box
    public function add_carousel_meta_boxes() {
        add_meta_box(
            'carousel_item_details',
            __('Item Details'),
            [$this, 'render_item_details_meta_box'],
            'carousel_item',
            'normal',
            'high'
        );
    }

    public function render_item_details_meta_box($post) {
        wp_nonce_field('carousel_meta_box', 'carousel_meta_box_nonce');
        $type = get_post_meta($post->ID, '_carousel_item_type', true);
        $video_url = get_post_meta($post->ID, '_video_url', true);
        $link_url = get_post_meta($post->ID, '_link_url', true);
        ?>
        <style>
            .carousel-meta-box { padding: 10px 0; }
            .carousel-meta-box label { display: block; margin-bottom: 5px; font-weight: bold; }
            .carousel-meta-box input[type="text"] { width: 100%; margin-bottom: 15px; }
            .carousel-meta-box .type-fields { margin-top: 15px; }
        </style>
        <div class="carousel-meta-box">
            <label>
                <input type="radio" name="carousel_item_type" value="image" <?php checked($type, 'image'); ?> <?php checked($type, ''); ?>>
                <?php _e('Image with Link'); ?>
            </label>
            <label>
                <input type="radio" name="carousel_item_type" value="video" <?php checked($type, 'video'); ?>>
                <?php _e('Video'); ?>
            </label>
            <div class="type-fields" id="video-fields" style="display: <?php echo ($type === 'video' ? 'block' : 'none'); ?>">
                <label for="video_url"><?php _e('Video URL (YouTube or Vimeo)'); ?></label>
                <input type="text" id="video_url" name="video_url" value="<?php echo esc_attr($video_url); ?>">
            </div>
            <div class="type-fields" id="link-fields" style="display: <?php echo ($type !== 'video' ? 'block' : 'none'); ?>">
                <label for="link_url"><?php _e('Link URL'); ?></label>
                <input type="text" id="link_url" name="link_url" value="<?php echo esc_attr($link_url); ?>">
            </div>
        </div>
        <script>
            jQuery(document).ready(function($) {
                $('input[name="carousel_item_type"]').on('change', function() {
                    const type = $(this).val();
                    $('#video-fields').toggle(type === 'video');
                    $('#link-fields').toggle(type === 'image');
                });
            });
        </script>
        <?php
    }

    public function save_carousel_meta($post_id) {
        if (!isset($_POST['carousel_meta_box_nonce'])) return;
        if (!wp_verify_nonce($_POST['carousel_meta_box_nonce'], 'carousel_meta_box')) return;
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
        if (isset($_POST['carousel_item_type'])) {
            update_post_meta($post_id, '_carousel_item_type', sanitize_text_field($_POST['carousel_item_type']));
        }
        if (isset($_POST['video_url'])) {
            update_post_meta($post_id, '_video_url', esc_url_raw($_POST['video_url']));
        }
        if (isset($_POST['link_url'])) {
            update_post_meta($post_id, '_link_url', esc_url_raw($_POST['link_url']));
        }
    }

    // Render Shortcode Carrusel (se delega a template)
    public function render_carousel($atts) {
        $args = array(
            'post_type' => 'carousel_item',
            'posts_per_page' => -1,
            'orderby' => 'menu_order',
            'order' => 'ASC'
        );
        $items = get_posts($args);
        ob_start();
        include SIMPLE_CAROUSEL_PATH . 'templates/carousel-item.php';
        return ob_get_clean();
    }
}
