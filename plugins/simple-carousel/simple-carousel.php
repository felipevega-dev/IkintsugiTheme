<?php
/**
 * Plugin Name: Simple Carousel Test
 * Description: Un carrusel simple para probar compatibilidad con Sage
 * Version: 1.0.0
 * Author: Test
 */

if (!defined('WPINC')) {
    die;
}

class Simple_Carousel {
    private $version = '1.0.0';
    private $plugin_name = 'simple-carousel';

    public function __construct() {
        add_action('init', array($this, 'init'));
        add_action('admin_menu', array($this, 'add_admin_menu'));
        add_action('wp_enqueue_scripts', array($this, 'enqueue_assets'));
        add_action('admin_enqueue_scripts', array($this, 'enqueue_admin_assets'));
        // AJAX Grid Search para frontend
        add_action('wp_ajax_nopriv_simple_carousel_grid_search', array($this, 'ajax_carousel_grid_search'));
        add_action('wp_ajax_simple_carousel_grid_search', array($this, 'ajax_carousel_grid_search'));
    }

    public function init() {
        $this->register_carousel_post_type();
        add_shortcode('simple_carousel', array($this, 'render_carousel'));
        add_shortcode('simple_carousel_grid', array($this, 'render_grid'));
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

        add_action('add_meta_boxes', array($this, 'add_carousel_meta_boxes'));
        add_action('save_post_carousel_item', array($this, 'save_carousel_meta'));
    }

    public function add_carousel_meta_boxes() {
        add_meta_box(
            'carousel_item_details',
            __('Item Details'),
            array($this, 'render_item_details_meta_box'),
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

        // Guardar tipo de item
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

    public function enqueue_admin_assets($hook) {
        if ('post.php' === $hook || 'post-new.php' === $hook) {
            wp_enqueue_media();
            wp_enqueue_style('simple-carousel-admin-style', plugins_url('css/admin.css', __FILE__));
            wp_enqueue_script('simple-carousel-admin-script', plugins_url('js/admin.js', __FILE__), array('jquery'), null, true);
        }
    }

    public function enqueue_assets() {
        wp_enqueue_style('simple-carousel-style', plugins_url('css/carousel.css', __FILE__));
        wp_enqueue_script('simple-carousel-script', plugins_url('js/carousel.js', __FILE__), array('jquery'), null, true);

        wp_enqueue_style('simple-carousel-grid-style', plugins_url('css/grid.css', __FILE__));
        wp_enqueue_script('simple-carousel-grid-script', plugins_url('js/grid.js', __FILE__), array('jquery'), null, true);

        wp_enqueue_style('simple-carousel-global-style', plugins_url('css/global.css', __FILE__));
        wp_enqueue_script('simple-carousel-global-script', plugins_url('js/global.js', __FILE__), array('jquery'), null, true);

        wp_localize_script('simple-carousel-grid-script', 'simpleCarouselGrid', array(
            'ajaxurl' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('simple-carousel-grid-nonce')
        ));
    }

    public function add_admin_menu() {
        add_menu_page(
            __('Carousel Manager'),
            __('Carousel'),
            'manage_options',
            'simple-carousel',
            array($this, 'display_admin_page'),
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
            array($this, 'display_settings_page')
        );
    }

    public function display_admin_page() {
        include plugin_dir_path(__FILE__) . 'admin/partials/admin-display.php';
    }

    public function display_settings_page() {
        include plugin_dir_path(__FILE__) . 'admin/partials/settings-display.php';
    }

    public function render_carousel($atts) {
        wp_enqueue_style('simple-carousel-style');
        wp_enqueue_script('simple-carousel-script');
        $args = array(
            'post_type' => 'carousel_item',
            'posts_per_page' => -1,
            'orderby' => 'menu_order',
            'order' => 'ASC'
        );
        $items = get_posts($args);
        ob_start();
        ?>
        <div class="simple-carousel">
            <div class="simple-carousel-wrapper">
                <?php foreach ($items as $item): 
                    $type = get_post_meta($item->ID, '_carousel_item_type', true);
                    $type = $type ?: 'image';
                    if ($type === 'video') {
                        $video_url = get_post_meta($item->ID, '_video_url', true);
                        $video_id = '';
                        $thumbnail_url = '';
                        $embed_url = '';
                        if (strpos($video_url, 'youtube.com') !== false || strpos($video_url, 'youtu.be') !== false) {
                            preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/', $video_url, $matches);
                            if (isset($matches[1])) {
                                $video_id = $matches[1];
                                $embed_url = "https://www.youtube.com/embed/{$video_id}?autoplay=1";
                                $thumbnail_url = "https://img.youtube.com/vi/{$video_id}/maxresdefault.jpg";
                            }
                        } elseif (strpos($video_url, 'vimeo.com') !== false) {
                            preg_match('/vimeo\.com\/([0-9]+)/', $video_url, $matches);
                            if (isset($matches[1])) {
                                $video_id = $matches[1];
                                $embed_url = "https://player.vimeo.com/video/{$video_id}?autoplay=1";
                                $vimeo_data = @file_get_contents("https://vimeo.com/api/v2/video/{$video_id}.json");
                                if ($vimeo_data) {
                                    $vimeo_data = json_decode($vimeo_data);
                                    $thumbnail_url = $vimeo_data[0]->thumbnail_large;
                                }
                            }
                        }
                    ?>
                    <div class="simple-carousel-slide video-slide">
                        <?php if ($video_id && $thumbnail_url): ?>
                            <div class="thumb" style="background:#000;position:relative;cursor:pointer;">
                                <img src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php echo esc_attr($item->post_title); ?>">
                                <div class="video-play-btn" data-video-url="<?php echo esc_url($embed_url); ?>" style="position:absolute;left:50%;top:50%;transform:translate(-50%,-50%);width:56px;height:56px;background:rgba(54,39,102,0.85);border-radius:50%;display:flex;align-items:center;justify-content:center;cursor:pointer;">
                                    <svg width="32" height="32" viewBox="0 0 24 24" fill="#fff"><polygon points="5,3 19,12 5,21"></polygon></svg>
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="simple-carousel-caption">
                            <h3><?php echo esc_html($item->post_title); ?></h3>
                            <?php if (!empty($item->post_content)): ?>
                                <p><?php echo esc_html($item->post_content); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php } else {
                    $image_url = get_the_post_thumbnail_url($item->ID, 'full');
                    $link_url = get_post_meta($item->ID, '_link_url', true);
                    if (!$image_url) continue;
                ?>
                    <div class="simple-carousel-slide image-slide">
                        <?php if ($link_url): ?>
                            <a href="<?php echo esc_url($link_url); ?>" target="_blank">
                        <?php endif; ?>
                            <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($item->post_title); ?>">
                        <?php if ($link_url): ?>
                            </a>
                        <?php endif; ?>
                        <div class="simple-carousel-caption">
                            <h3><?php echo esc_html($item->post_title); ?></h3>
                            <?php if (!empty($item->post_content)): ?>
                                <p><?php echo esc_html($item->post_content); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php } ?>
                <?php endforeach; ?>
            </div>
            <button class="simple-carousel-prev">←</button>
            <button class="simple-carousel-next">→</button>
        </div>
        <?php
        return ob_get_clean();
    }

    public function render_grid($atts) {
        $atts = shortcode_atts(array(
            'items_per_page' => 9,
            'orderby' => 'date',
            'order' => 'DESC',
        ), $atts);

        wp_enqueue_style('simple-carousel-grid-style');
        wp_enqueue_script('simple-carousel-grid-script');

        $args = array(
            'post_type' => 'carousel_item',
            'posts_per_page' => $atts['items_per_page'],
            'orderby' => $atts['orderby'],
            'order' => $atts['order']
        );
        $items = get_posts($args);
        $total_items = wp_count_posts('carousel_item')->publish;

        ob_start();
        ?>
        <div class="carousel-filters">
            <div class="carousel-search">
                <input type="text" id="carousel-search" placeholder="Buscar noticias...">
            </div>
            <div class="carousel-select">
                <select id="carousel-year">
                    <option value="">Todos los años</option>
                    <?php 
                    $current_year = date('Y');
                    for ($i = 0; $i <= 4; $i++) {
                        $year = $current_year - $i;
                        echo '<option value="' . $year . '">' . $year . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="carousel-select">
                <select id="carousel-sort">
                    <option value="date-desc">Más recientes</option>
                    <option value="date-asc">Más antiguos</option>
                    <option value="title-asc">A-Z</option>
                    <option value="title-desc">Z-A</option>
                </select>
            </div>
        </div>

        <div class="carousel-grid">
            <?php foreach ($items as $item): 
                $type = get_post_meta($item->ID, '_carousel_item_type', true);
                $type = $type ?: 'image';
                if ($type === 'video'):
                    $video_url = get_post_meta($item->ID, '_video_url', true);
                    $video_id = '';
                    $embed_url = '';
                    $thumbnail_url = '';
                    if (strpos($video_url, 'youtube.com') !== false || strpos($video_url, 'youtu.be') !== false) {
                        preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/', $video_url, $matches);
                        if (isset($matches[1])) {
                            $video_id = $matches[1];
                            $embed_url = "https://www.youtube.com/embed/{$video_id}?autoplay=1";
                            $thumbnail_url = "https://img.youtube.com/vi/{$video_id}/maxresdefault.jpg";
                        }
                    } elseif (strpos($video_url, 'vimeo.com') !== false) {
                        preg_match('/vimeo\.com\/([0-9]+)/', $video_url, $matches);
                        if (isset($matches[1])) {
                            $video_id = $matches[1];
                            $embed_url = "https://player.vimeo.com/video/{$video_id}?autoplay=1";
                            $vimeo_data = @file_get_contents("https://vimeo.com/api/v2/video/{$video_id}.json");
                            if ($vimeo_data) {
                                $vimeo_data = json_decode($vimeo_data);
                                $thumbnail_url = $vimeo_data[0]->thumbnail_large;
                            }
                        }
                    }
            ?>
                <div class="carousel-grid-item video-item">
                    <?php if ($video_id && $thumbnail_url): ?>
                        <div class="video-thumbnail" data-video-url="<?php echo esc_url($embed_url); ?>" style="position:relative;cursor:pointer;">
                            <img src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php echo esc_attr($item->post_title); ?>">
                            <div class="video-play-btn" style="position:absolute;left:50%;top:50%;transform:translate(-50%,-50%);width:56px;height:56px;background:rgba(54,39,102,0.85);border-radius:50%;display:flex;align-items:center;justify-content:center;">
                                <svg width="32" height="32" viewBox="0 0 24 24" fill="#fff"><polygon points="5,3 19,12 5,21"></polygon></svg>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="carousel-grid-caption">
                        <h3><?php echo esc_html($item->post_title); ?></h3>
                        <?php if (!empty($item->post_content)): ?>
                            <p><?php echo wp_trim_words($item->post_content, 15); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            <?php else:
                $image_url = get_the_post_thumbnail_url($item->ID, 'large');
                $link_url = get_post_meta($item->ID, '_link_url', true);
                if (!$image_url) continue;
            ?>
                <div class="carousel-grid-item image-item">
                    <?php if ($link_url): ?>
                        <a href="<?php echo esc_url($link_url); ?>" target="_blank">
                    <?php endif; ?>
                        <img data-src="<?php echo esc_url($image_url); ?>" 
                             src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7"
                             alt="<?php echo esc_attr($item->post_title); ?>">
                    <?php if ($link_url): ?>
                        </a>
                    <?php endif; ?>
                    <div class="carousel-grid-caption">
                        <h3><?php echo esc_html($item->post_title); ?></h3>
                        <?php if (!empty($item->post_content)): ?>
                            <p><?php echo wp_trim_words($item->post_content, 15); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
            <?php endforeach; ?>
        </div>

        <?php if ($total_items > count($items)): ?>
        <div class="carousel-load-more">
            <button id="carousel-load-more">Cargar más</button>
        </div>
        <?php endif; ?>
        <?php
        return ob_get_clean();
    }

    // AJAX Grid Search handler
    public function ajax_carousel_grid_search() {
        check_ajax_referer('simple-carousel-grid-nonce', 'nonce');
        $search = sanitize_text_field($_POST['search'] ?? '');
        $year = sanitize_text_field($_POST['year'] ?? '');
        $sort = sanitize_text_field($_POST['sort'] ?? '');
        $page = max(1, intval($_POST['page'] ?? 1));
        $per_page = 9;

        $args = array(
            'post_type' => 'carousel_item',
            'posts_per_page' => $per_page,
            'paged' => $page,
            'orderby' => 'date',
            'order' => 'DESC',
        );
        if ($search) $args['s'] = $search;
        if ($year) $args['date_query'] = array(array('year' => $year));
        if ($sort) {
            switch ($sort) {
                case 'date-desc': $args['orderby'] = 'date'; $args['order'] = 'DESC'; break;
                case 'date-asc': $args['orderby'] = 'date'; $args['order'] = 'ASC'; break;
                case 'title-asc': $args['orderby'] = 'title'; $args['order'] = 'ASC'; break;
                case 'title-desc': $args['orderby'] = 'title'; $args['order'] = 'DESC'; break;
            }
        }
        $query = new WP_Query($args);
        $items_html = '';
        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
                $items_html .= $this->get_grid_item_html(get_post());
            }
            wp_reset_postdata();
        }
        wp_send_json_success(array(
            'items' => $items_html,
            'has_more' => ($query->found_posts > $per_page * $page)
        ));
    }

    // Helper para renderizar un item del grid (video o imagen)
    private function get_grid_item_html($item) {
        $type = get_post_meta($item->ID, '_carousel_item_type', true);
        $type = $type ?: 'image';
        ob_start();
        if ($type === 'video') {
            $video_url = get_post_meta($item->ID, '_video_url', true);
            $video_id = '';
            $embed_url = '';
            $thumbnail_url = '';
            if (strpos($video_url, 'youtube.com') !== false || strpos($video_url, 'youtu.be') !== false) {
                preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/', $video_url, $matches);
                if (isset($matches[1])) {
                    $video_id = $matches[1];
                    $embed_url = "https://www.youtube.com/embed/{$video_id}?autoplay=1";
                    $thumbnail_url = "https://img.youtube.com/vi/{$video_id}/maxresdefault.jpg";
                }
            } elseif (strpos($video_url, 'vimeo.com') !== false) {
                preg_match('/vimeo\.com\/([0-9]+)/', $video_url, $matches);
                if (isset($matches[1])) {
                    $video_id = $matches[1];
                    $embed_url = "https://player.vimeo.com/video/{$video_id}?autoplay=1";
                    $vimeo_data = @file_get_contents("https://vimeo.com/api/v2/video/{$video_id}.json");
                    if ($vimeo_data) {
                        $vimeo_data = json_decode($vimeo_data);
                        $thumbnail_url = $vimeo_data[0]->thumbnail_large;
                    }
                }
            }
            ?>
            <div class="carousel-grid-item video-item">
                <?php if ($video_id && $thumbnail_url): ?>
                    <div class="video-thumbnail" data-video-url="<?php echo esc_url($embed_url); ?>" style="position:relative;cursor:pointer;">
                        <img src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php echo esc_attr($item->post_title); ?>">
                        <div class="video-play-btn" style="position:absolute;left:50%;top:50%;transform:translate(-50%,-50%);width:56px;height:56px;background:rgba(54,39,102,0.85);border-radius:50%;display:flex;align-items:center;justify-content:center;">
                            <svg width="32" height="32" viewBox="0 0 24 24" fill="#fff"><polygon points="5,3 19,12 5,21"></polygon></svg>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="carousel-grid-caption">
                    <h3><?php echo esc_html($item->post_title); ?></h3>
                    <?php if (!empty($item->post_content)): ?>
                        <p><?php echo wp_trim_words($item->post_content, 15); ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <?php
        } else {
            $image_url = get_the_post_thumbnail_url($item->ID, 'large');
            $link_url = get_post_meta($item->ID, '_link_url', true);
            if ($image_url):
                ?>
                <div class="carousel-grid-item image-item">
                    <?php if ($link_url): ?>
                        <a href="<?php echo esc_url($link_url); ?>" target="_blank">
                    <?php endif; ?>
                    <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($item->post_title); ?>">
                    <?php if ($link_url): ?></a><?php endif; ?>
                    <div class="carousel-grid-caption">
                        <h3><?php echo esc_html($item->post_title); ?></h3>
                        <?php if (!empty($item->post_content)): ?>
                            <p><?php echo wp_trim_words($item->post_content, 15); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
                <?php
            endif;
        }
        return ob_get_clean();
    }
}

new Simple_Carousel();
