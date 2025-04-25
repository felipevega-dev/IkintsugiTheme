<?php
/**
 * Admin class.
 *
 * @package    Simple_Carousel
 * @subpackage Simple_Carousel/admin
 */

class Simple_Carousel_Admin {
    
    public function __construct() {
    }

    public function init() {
        // Add admin menu
        add_action('admin_menu', array($this, 'add_admin_menu'));

        // Enqueue admin scripts and styles
        add_action('admin_enqueue_scripts', array($this, 'enqueue_scripts'));
        
        // Register settings
        add_action('admin_init', array($this, 'register_settings'));
        
        // Add meta boxes
        add_action('add_meta_boxes', array($this, 'add_meta_boxes'));
        
        // Save post meta
        add_action('save_post', array($this, 'save_meta_boxes'));

        // Adjust current admin menu
        add_action('admin_menu', array($this, 'adjust_current_admin_menu'), 999);
    }

    public function add_admin_menu() {
        // Add main menu
        add_menu_page(
            __('Simple Carousel', 'simple-carousel'),
            __('Simple Carousel', 'simple-carousel'),
            'manage_options',
            'simple-carousel',
            array($this, 'display_admin_page'),
            'dashicons-images-alt2',
            25
        );

        // Add "Overview" as first submenu
        add_submenu_page(
            'simple-carousel',
            __('Resumen', 'simple-carousel'),
            __('Resumen', 'simple-carousel'),
            'manage_options',
            'simple-carousel',
            array($this, 'display_admin_page')
        );

        // Add Items submenu
        add_submenu_page(
            'simple-carousel',
            __('Todos los Items', 'simple-carousel'),
            __('Todos los Items', 'simple-carousel'),
            'manage_options',
            'edit.php?post_type=carousel_item',
            null
        );
        
        // Add New Item submenu
        add_submenu_page(
            'simple-carousel',
            __('Añadir Nuevo Item', 'simple-carousel'),
            __('Añadir Nuevo', 'simple-carousel'),
            'manage_options',
            'post-new.php?post_type=carousel_item',
            null
        );
        
        // Add Settings page
        add_submenu_page(
            'simple-carousel',
            __('Configuración', 'simple-carousel'),
            __('Configuración', 'simple-carousel'),
            'manage_options',
            'simple-carousel-settings',
            array($this, 'display_settings_page')
        );
    }

    public function adjust_current_admin_menu() {
        global $parent_file, $submenu_file, $post_type, $pagenow;
        
        if ($post_type === 'carousel_item') {
            $parent_file = 'simple-carousel';
            
            if ($pagenow === 'post.php' && isset($_GET['post'])) {
                $submenu_file = 'edit.php?post_type=carousel_item';
            } else if ($pagenow === 'post-new.php') {
                $submenu_file = 'post-new.php?post_type=carousel_item';
            } else {
                $submenu_file = 'edit.php?post_type=carousel_item';
            }
        }
    }

    public function enqueue_scripts($hook) {
        global $post_type;
        
        $screen = get_current_screen();
        if ($hook === 'toplevel_page_simple-carousel' || 
            $hook === 'simple-carousel_page_simple-carousel-settings' ||
            $post_type === 'carousel_item') {
            
            // Styles
            wp_enqueue_style(
                'simple-carousel-admin',
                plugin_dir_url(__FILE__) . 'css/admin.css',
                array(),
                '1.0.0'
            );
            
            // Scripts
            wp_enqueue_script(
                'simple-carousel-admin',
                plugin_dir_url(__FILE__) . 'js/admin.js',
                array('jquery', 'jquery-ui-sortable'),
                '1.0.0',
                true
            );
            
            // Inline styles
            wp_add_inline_style('simple-carousel-admin', '
                /* Menu activo */
                #adminmenu li.menu-top.toplevel_page_simple-carousel.current,
                #adminmenu li.menu-top.toplevel_page_simple-carousel.wp-has-current-submenu {
                    background: linear-gradient(90deg, #362766 0%, #030D55 100%) !important;
                }
                
                /* Estilos para las páginas de edición */
                .post-type-carousel_item #titlediv .inside,
                .post-type-carousel_item #postexcerpt {
                    border-left: 4px solid #362766;
                    padding-left: 12px;
                }
                
                .post-type-carousel_item .postbox.simple-carousel-metabox {
                    border-top: 3px solid #030D55;
                }
                
                /* Estilos para la interfaz de administración */
                .toplevel_page_simple-carousel #wpcontent,
                .simple-carousel_page_simple-carousel-settings #wpcontent {
                    padding-left: 0;
                }
                
                .simple-carousel-admin-header {
                    background: linear-gradient(90deg, #362766 0%, #030D55 100%);
                    padding: 30px 20px;
                    margin-bottom: 30px;
                    color: white;
                }
                
                .simple-carousel-admin-header h1 {
                    color: white;
                    font-size: 24px;
                    margin: 0;
                }
                
                .simple-carousel-admin-header p {
                    margin: 5px 0 0 0;
                    opacity: 0.9;
                    font-size: 14px;
                }
                
                .simple-carousel-admin-content {
                    padding: 0 20px;
                }
                
                .simple-carousel-admin-card {
                    background: white;
                    border-radius: 8px;
                    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
                    padding: 20px;
                    margin-bottom: 20px;
                }
            ');
        }
    }

    public function display_admin_page() {
        include plugin_dir_path(__FILE__) . 'partials/admin-display.php';
    }

    public function display_settings_page() {
        include plugin_dir_path(__FILE__) . 'partials/settings-display.php';
    }

    public function register_settings() {
        register_setting(
            'simple_carousel_settings',
            'simple_carousel_options',
            array($this, 'sanitize_settings')
        );
    }

    public function sanitize_settings($input) {
        $sanitized = array();
        
        if (isset($input['autoplay'])) {
            $sanitized['autoplay'] = (bool) $input['autoplay'];
        }
        
        if (isset($input['autoplay_speed'])) {
            $sanitized['autoplay_speed'] = absint($input['autoplay_speed']);
        }
        
        if (isset($input['transition_speed'])) {
            $sanitized['transition_speed'] = absint($input['transition_speed']);
        }
        
        return $sanitized;
    }

    public function add_meta_boxes() {
        add_meta_box(
            'carousel_item_details',
            __('Detalles del Item', 'simple-carousel'),
            array($this, 'render_item_meta_box'),
            'carousel_item',
            'normal',
            'high'
        );
    }

    public function render_item_meta_box($post) {
        wp_nonce_field('carousel_meta_box', 'carousel_meta_box_nonce');
        
        $type = get_post_meta($post->ID, '_carousel_item_type', true);
        $video_url = get_post_meta($post->ID, '_video_url', true);
        $link_url = get_post_meta($post->ID, '_link_url', true);
        
        include plugin_dir_path(__FILE__) . 'partials/meta-box-display.php';
    }

    public function save_meta_boxes($post_id) {
        if (!isset($_POST['carousel_meta_box_nonce'])) {
            return;
        }

        if (!wp_verify_nonce($_POST['carousel_meta_box_nonce'], 'carousel_meta_box')) {
            return;
        }

        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return;
        }

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
} 