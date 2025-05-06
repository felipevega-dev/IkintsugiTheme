<?php
/**
 * Admin class.
 *
 * @package    Simple_Carousel
 * @subpackage Simple_Carousel/admin
 */

class Simple_Carousel_Admin {
    
    public function __construct() {
        // Marcar que la clase admin está inicializada
        if (!defined('SIMPLE_CAROUSEL_ADMIN_LOADED')) {
            define('SIMPLE_CAROUSEL_ADMIN_LOADED', true);
        }
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

        // Add AJAX handler
        add_action('wp_ajax_update_carousel_order', array($this, 'ajax_update_carousel_order'));
        
        // Verificar y crear directorios de imágenes
        $this->check_image_directory();
    }

    public function add_admin_menu() {
        // Add main menu
        add_menu_page(
            __('Carrousel Noticias', 'simple-carousel'),
            __('Carousel', 'simple-carousel'),
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
        
        // Debug info
        error_log("Hook: $hook, Screen ID: " . ($screen ? $screen->id : 'null'));
        
        // Scripts for specific screens
        if (strpos($hook, 'simple-carousel') !== false || 
            $post_type === 'carousel_item' || 
            $hook === 'toplevel_page_simple-carousel') {
            
            // Primero jQuery Core
            wp_enqueue_script('jquery');
            
            // Después jQuery UI Core y componentes
            wp_enqueue_script('jquery-ui-core');
            wp_enqueue_script('jquery-ui-sortable');
            wp_enqueue_script('jquery-effects-core');
            wp_enqueue_script('jquery-effects-highlight');
            
            // CSS del plugin
            wp_enqueue_style(
                'simple-carousel-admin',
                plugin_dir_url(__FILE__) . 'css/admin.css',
                array(),
                '1.0.3'
            );
            
            // JavaScript del plugin (depende de jQuery UI)
            wp_enqueue_script(
                'simple-carousel-admin',
                plugin_dir_url(__FILE__) . 'js/admin.js',
                array('jquery', 'jquery-ui-sortable', 'jquery-effects-highlight'),
                '1.0.4',
                true
            );
            
            // Localización para AJAX
            wp_localize_script('simple-carousel-admin', 'simpleCarouselAdmin', array(
                'ajaxurl' => admin_url('admin-ajax.php'),
                'nonce' => wp_create_nonce('simple-carousel-admin')
            ));
            
            // Inline styles
            wp_add_inline_style('simple-carousel-admin', '
                /* Menu activo */
                #adminmenu li.menu-top.toplevel_page_simple-carousel.current,
                #adminmenu li.menu-top.toplevel_page_simple-carousel.wp-has-current-submenu {
                    background: linear-gradient(90deg, #362766 0%, #030D55 100%) !important;
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

    public function ajax_update_carousel_order() {
        // Verificación de seguridad
        check_ajax_referer('simple-carousel-admin', 'nonce');
        
        // Verificación de permisos
        if (!current_user_can('edit_posts')) {
            wp_send_json_error(array(
                'message' => 'No tienes permisos para realizar esta acción.',
                'code' => 'insufficient_permissions'
            ));
            return;
        }
        
        // Recibir y validar datos
        $items = isset($_POST['items']) ? $_POST['items'] : [];
        
        error_log('Recibidos items: ' . print_r($items, true));
        
        if (empty($items)) {
            wp_send_json_error(array(
                'message' => 'No se recibieron datos válidos.',
                'code' => 'invalid_data'
            ));
            return;
        }
        
        // Asegurar que items es un array
        if (!is_array($items)) {
            wp_send_json_error(array(
                'message' => 'Formato de datos incorrecto.',
                'code' => 'invalid_data_format'
            ));
            return;
        }
        
        $updated = array();
        
        // Procesar los items
        foreach ($items as $item) {
            $id = isset($item['id']) ? intval($item['id']) : 0;
            $position = isset($item['position']) ? intval($item['position']) : 0;
            
            if ($id > 0) {
                wp_update_post(array(
                    'ID' => $id,
                    'menu_order' => $position
                ));
                $updated[] = $id;
            }
        }
        
        // Devolver éxito
        wp_send_json_success(array(
            'message' => 'Orden actualizado correctamente.',
            'items_updated' => $updated,
            'items_count' => count($updated)
        ));
    }

    /**
     * Verifica y crea el directorio de imágenes si no existe
     */
    public function check_image_directory() {
        $images_dir = SIMPLE_CAROUSEL_PATH . 'images';
        if (!file_exists($images_dir)) {
            mkdir($images_dir, 0755, true);
        }
        
        // Crear placeholders si no existen
        $placeholders = array(
            'image-placeholder.jpg' => 'https://via.placeholder.com/150x100/eeeeee/888888?text=Imagen',
            'video-placeholder.jpg' => 'https://via.placeholder.com/150x100/111111/ffffff?text=Video'
        );
        
        foreach ($placeholders as $name => $url) {
            $file_path = $images_dir . '/' . $name;
            if (!file_exists($file_path)) {
                $image_data = @file_get_contents($url);
                if ($image_data) {
                    file_put_contents($file_path, $image_data);
                }
            }
        }
    }
} 