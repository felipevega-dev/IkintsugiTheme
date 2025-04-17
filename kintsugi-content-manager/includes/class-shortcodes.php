<?php
/**
 * Shortcodes class.
 *
 * @link       https://ikintsugi.com
 * @since      1.0.0
 *
 * @package    Kintsugi_Content_Manager
 * @subpackage Kintsugi_Content_Manager/includes
 */

/**
 * Shortcodes class.
 *
 * Handles registering custom shortcodes for displaying content.
 *
 * @package    Kintsugi_Content_Manager
 * @subpackage Kintsugi_Content_Manager/includes
 * @author     Ikintsugi
 */
class Kintsugi_Content_Manager_Shortcodes {

    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     */
    public function __construct() {
    }

    /**
     * Initialize hooks.
     *
     * @since    1.0.0
     */
    public function init() {
        // Register shortcodes
        add_shortcode('administracion_noticias', array($this, 'render_administracion_noticias'));
        add_shortcode('administracion_noticias_carrousel', array($this, 'render_administracion_noticias_carrousel'));
        add_shortcode('administracion_noticias_recientes', array($this, 'render_administracion_noticias_recientes'));
        
        // Enqueue scripts and styles for frontend
        add_action('wp_enqueue_scripts', array($this, 'enqueue_scripts'));
    }

    /**
     * Enqueue scripts and styles.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts() {
        // Only enqueue on pages where shortcodes are used
        global $post;
        if (is_a($post, 'WP_Post') && (
            has_shortcode($post->post_content, 'administracion_noticias') || 
            has_shortcode($post->post_content, 'administracion_noticias_carrousel') ||
            has_shortcode($post->post_content, 'administracion_noticias_recientes'))) {
            
            // Check if we're using a Sage theme with Vite
            $is_sage_theme = function_exists('kintsugi_detect_sage_theme') ? kintsugi_detect_sage_theme() : false;
            
            if (!$is_sage_theme) {
                // Regular WordPress themes - standard enqueuing
                // Styles
                wp_enqueue_style(
                    'kintsugi-content-manager-public',
                    KINTSUGI_CONTENT_MANAGER_PLUGIN_URL . 'public/css/public.css',
                    array(),
                    KINTSUGI_CONTENT_MANAGER_VERSION
                );
                
                // Scripts
                wp_enqueue_script(
                    'kintsugi-content-manager-public',
                    KINTSUGI_CONTENT_MANAGER_PLUGIN_URL . 'public/js/public.js',
                    array('jquery'),
                    KINTSUGI_CONTENT_MANAGER_VERSION,
                    true
                );
            } else {
                // Direct output for Sage themes
                add_action('wp_head', array($this, 'output_direct_styles'));
                add_action('wp_footer', array($this, 'output_direct_scripts'));
            }
            
            // Add Swiper.js for carousel (only if carousel shortcode is used)
            if (has_shortcode($post->post_content, 'administracion_noticias_carrousel')) {
                // Primero verificamos si Swiper ya está registrado (por el tema u otro plugin)
                $swiper_registered = wp_script_is('swiper', 'registered') || wp_script_is('swiper-js', 'registered');
                
                if (!$swiper_registered) {
                    if (!$is_sage_theme) {
                        wp_enqueue_style(
                            'swiper-css',
                            'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css',
                            array(),
                            '8.0.0'
                        );
                        
                        wp_enqueue_script(
                            'swiper-js',
                            'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js',
                            array(),
                            '8.0.0',
                            true
                        );
                    } else {
                        // We'll handle Swiper in the direct output functions
                    }
                }
                
                if (!$is_sage_theme) {
                    wp_enqueue_script(
                        'kintsugi-carousel',
                        KINTSUGI_CONTENT_MANAGER_PLUGIN_URL . 'public/js/carousel.js',
                        array('jquery', 'swiper-js'),
                        KINTSUGI_CONTENT_MANAGER_VERSION,
                        true
                    );
                }
                
                // Agregar estilos específicos del carrusel con mayor prioridad
                if (!$is_sage_theme) {
                    wp_add_inline_style('kintsugi-content-manager-public', $this->get_carousel_inline_styles());
                }
            }
        }
    }
    
    /**
     * Get carousel inline styles
     * 
     * @return string Inline CSS
     * @since 1.0.1
     */
    private function get_carousel_inline_styles() {
        return '
            .kintsugi-carousel-container {
                overflow: hidden;
                border-radius: 8px;
            }
            .kintsugi-carousel-slide {
                height: 400px !important;
            }
            .kintsugi-carousel-image img {
                width: 100% !important;
                height: 100% !important;
                object-fit: cover !important;
            }
            @media (max-width: 767px) {
                .kintsugi-carousel-slide {
                    height: 350px !important;
                }
            }
            .kintsugi-carousel-play {
                z-index: 5 !important;
            }
            .kintsugi-video-popup {
                z-index: 9999 !important;
            }
            
            /* Fixed Video Popup Styles */
            body.kintsugi-popup-open {
                overflow: hidden;
            }
            .kintsugi-video-popup {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.9);
                z-index: 9999;
                display: none;
                align-items: center;
                justify-content: center;
            }
            .kintsugi-video-popup.active {
                display: flex !important;
            }
            .kintsugi-video-popup-inner {
                position: relative;
                width: 90%;
                max-width: 900px;
            }
            .kintsugi-video-popup-content {
                position: relative;
                padding-top: 56.25%;
                overflow: hidden;
                border-radius: 8px;
            }
            .kintsugi-video-popup-content iframe {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                border: 0;
            }
            .kintsugi-video-popup-close {
                position: absolute;
                top: -40px;
                right: 0;
                width: 30px;
                height: 30px;
                color: white;
                font-size: 30px;
                line-height: 30px;
                text-align: center;
                cursor: pointer;
                z-index: 10;
            }
        ';
    }
    
    /**
     * Output direct styles for Sage themes
     * 
     * @since 1.0.1
     */
    public function output_direct_styles() {
        global $post;
        $use_swiper = is_a($post, 'WP_Post') && has_shortcode($post->post_content, 'administracion_noticias_carrousel');
        
        // Main plugin styles
        echo '<style id="kintsugi-content-manager-styles">';
        readfile(KINTSUGI_CONTENT_MANAGER_PLUGIN_DIR . 'public/css/public.css');
        
        // Carousel-specific styles
        if ($use_swiper) {
            echo $this->get_carousel_inline_styles();
        }
        echo '</style>';
        
        // Swiper CSS if needed
        if ($use_swiper) {
            echo '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css">';
        }
    }
    
    /**
     * Output direct scripts for Sage themes
     * 
     * @since 1.0.1
     */
    public function output_direct_scripts() {
        global $post;
        $use_swiper = is_a($post, 'WP_Post') && has_shortcode($post->post_content, 'administracion_noticias_carrousel');
        
        // jQuery dependency check
        echo '<script>
            if (typeof jQuery === "undefined") {
                console.error("Kintsugi Content Manager requires jQuery. Please make sure jQuery is loaded before the plugin scripts.");
                document.write(\'<script src="https://code.jquery.com/jquery-3.6.0.min.js"><\\/script>\');
            }
        </script>';
        
        // Swiper JS if needed
        if ($use_swiper) {
            echo '<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>';
        }
        
        // Main plugin script
        echo '<script id="kintsugi-content-manager-script">';
        readfile(KINTSUGI_CONTENT_MANAGER_PLUGIN_DIR . 'public/js/public.js');
        echo '</script>';
        
        // Carousel script if needed
        if ($use_swiper) {
            echo '<script id="kintsugi-carousel-script">';
            readfile(KINTSUGI_CONTENT_MANAGER_PLUGIN_DIR . 'public/js/carousel.js');
            echo '</script>';
        }
        
        // Initialization script - this ensures scripts run after being injected into the page
        echo '<script>
            jQuery(document).ready(function($) {
                if (typeof window.initKintsugiPublic === "function") {
                    window.initKintsugiPublic();
                }
                if (typeof window.initKintsugiCarousel === "function" && ' . ($use_swiper ? 'true' : 'false') . ') {
                    window.initKintsugiCarousel();
                }
            });
        </script>';
    }

    /**
     * Render the administracion_noticias shortcode.
     *
     * @param array $atts Shortcode attributes.
     * @return string Shortcode HTML output.
     * @since    1.0.0
     */
    public function render_administracion_noticias($atts) {
        // Extract shortcode attributes
        $atts = shortcode_atts(
            array(
                'per_page' => 6,
            ),
            $atts,
            'administracion_noticias'
        );
        
        // Get current page for pagination
        $paged = get_query_var('paged') ? get_query_var('paged') : 1;
        
        // Get search query if any
        $search_query = isset($_GET['search_noticias']) ? sanitize_text_field($_GET['search_noticias']) : '';
        
        // Setup the query arguments
        $args = array(
            'post_type'      => 'noticia',
            'posts_per_page' => intval($atts['per_page']),
            'paged'          => $paged,
            'post_status'    => 'publish',
            'orderby'        => 'date',
            'order'          => 'DESC',
        );
        
        // Add search if provided
        if (!empty($search_query)) {
            $args['s'] = $search_query;
        }
        
        // Execute the query
        $query = new WP_Query($args);
        
        // Start output buffering
        ob_start();
        
        // Include the template
        include KINTSUGI_CONTENT_MANAGER_PLUGIN_DIR . 'public/partials/noticias-list.php';
        
        // Get the buffered content
        $output = ob_get_clean();
        
        return $output;
    }

    /**
     * Render the administracion_noticias_carrousel shortcode.
     *
     * @param array $atts Shortcode attributes.
     * @return string Shortcode HTML output.
     * @since    1.0.0
     */
    public function render_administracion_noticias_carrousel($atts) {
        // Extract shortcode attributes
        $atts = shortcode_atts(
            array(
                'count' => 6,
                'ids' => '', // Comma-separated list of noticia IDs
            ),
            $atts,
            'administracion_noticias_carrousel'
        );
        
        // Make sure count is one of the allowed values
        $allowed_counts = array(4, 5, 6, 8, 10);
        $count = intval($atts['count']);
        if (!in_array($count, $allowed_counts)) {
            $count = 6; // Default
        }
        
        // Setup the query arguments
        $args = array(
            'post_type'      => 'noticia',
            'posts_per_page' => $count,
            'post_status'    => 'publish',
            'orderby'        => 'date',
            'order'          => 'DESC',
        );
        
        // If specific IDs are provided in the shortcode, use them
        if (!empty($atts['ids'])) {
            $ids = explode(',', $atts['ids']);
            $ids = array_map('trim', $ids);
            $args['post__in'] = $ids;
            $args['orderby'] = 'post__in'; // Preserve the order of IDs
        } 
        // Otherwise, use IDs from carousel settings if available
        else {
            $carousel_settings = get_option('kintsugi_carousel_noticias', array());
            if (!empty($carousel_settings['noticias_ids'])) {
                $args['post__in'] = $carousel_settings['noticias_ids'];
                $args['orderby'] = 'post__in'; // Preserve the order of IDs
                // If we have a specific number of IDs, don't limit by count
                if (count($carousel_settings['noticias_ids']) <= $count) {
                    $args['posts_per_page'] = -1;
                }
            } else {
                // If no IDs are specified in shortcode or settings, fallback to
                // posts that have the _show_in_carousel meta value set to '1'
                $args['meta_query'] = array(
                    array(
                        'key'     => '_show_in_carousel',
                        'value'   => '1',
                        'compare' => '=',
                    ),
                );
            }
        }
        
        // Execute the query
        $query = new WP_Query($args);
        
        // Start output buffering
        ob_start();
        
        // Include the carousel template
        include KINTSUGI_CONTENT_MANAGER_PLUGIN_DIR . 'public/partials/noticias-carousel.php';
        
        // Get the buffered content
        $output = ob_get_clean();
        
        return $output;
    }

    /**
     * Render the administracion_noticias_recientes shortcode.
     *
     * @param array $atts Shortcode attributes.
     * @return string Shortcode HTML output.
     * @since    1.0.0
     */
    public function render_administracion_noticias_recientes($atts) {
        // Extract shortcode attributes
        $atts = shortcode_atts(
            array(
                'count' => 3,
            ),
            $atts,
            'administracion_noticias_recientes'
        );
        
        // Setup the query arguments
        $args = array(
            'post_type'      => 'noticia',
            'posts_per_page' => intval($atts['count']),
            'post_status'    => 'publish',
            'orderby'        => 'date',
            'order'          => 'DESC',
        );
        
        // Execute the query
        $query = new WP_Query($args);
        
        // Start output buffering
        ob_start();
        
        // Include the recientes template
        include KINTSUGI_CONTENT_MANAGER_PLUGIN_DIR . 'public/partials/noticias-recientes.php';
        
        // Get the buffered content
        $output = ob_get_clean();
        
        return $output;
    }
}