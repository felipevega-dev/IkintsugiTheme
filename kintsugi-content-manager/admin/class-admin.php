<?php
/**
 * Admin class.
 *
 * @link       https://ikintsugi.com
 * @since      1.0.0
 *
 * @package    Kintsugi_Content_Manager
 * @subpackage Kintsugi_Content_Manager/admin
 */

/**
 * Admin class.
 *
 * Handles all admin functionality.
 *
 * @package    Kintsugi_Content_Manager
 * @subpackage Kintsugi_Content_Manager/admin
 * @author     Ikintsugi
 */
class Kintsugi_Content_Manager_Admin {

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
        // Add admin menu
        add_action('admin_menu', array($this, 'add_admin_menu'));

        // Enqueue admin scripts and styles
        add_action('admin_enqueue_scripts', array($this, 'enqueue_scripts'));
        
        // Register settings
        add_action('admin_init', array($this, 'register_settings'));
        
        // Add meta box for carousel selection
        add_action('add_meta_boxes', array($this, 'add_meta_boxes'));
        
        // Save carousel selection
        add_action('save_post', array($this, 'save_carousel_selection'));

        // Adjust current admin menu
        add_action('admin_menu', array($this, 'adjust_current_admin_menu'), 999);
        
        // Añadir mensaje informativo en las páginas de edición de noticias
        add_action('admin_notices', array($this, 'add_kintsugi_branding_notice'));
    }

    /**
     * Add admin menu items.
     *
     * @since    1.0.0
     */
    public function add_admin_menu() {
        // Add main menu
        add_menu_page(
            __('Kintsugi Content', 'kintsugi-content-manager'),
            __('Kintsugi Content', 'kintsugi-content-manager'),
            'manage_options',
            'kintsugi-content-manager',
            array($this, 'display_admin_page'),
            'dashicons-format-aside',
            25
        );

        // Add "Overview" as first submenu to match the parent menu item
        add_submenu_page(
            'kintsugi-content-manager',
            __('Resumen', 'kintsugi-content-manager'),
            __('Resumen', 'kintsugi-content-manager'),
            'manage_options',
            'kintsugi-content-manager',
            array($this, 'display_admin_page')
        );

        // Add Noticias submenu - using custom post type link
        add_submenu_page(
            'kintsugi-content-manager',
            __('Todas las Noticias', 'kintsugi-content-manager'),
            __('Todas las Noticias', 'kintsugi-content-manager'),
            'manage_options',
            'edit.php?post_type=noticia',
            null
        );
        
        // Add Nueva Noticia submenu
        add_submenu_page(
            'kintsugi-content-manager',
            __('Añadir Nueva Noticia', 'kintsugi-content-manager'),
            __('Añadir Nueva', 'kintsugi-content-manager'),
            'manage_options',
            'post-new.php?post_type=noticia',
            null
        );
        
        // Add Carousel Settings page
        add_submenu_page(
            'kintsugi-content-manager',
            __('Configuración del Carrusel', 'kintsugi-content-manager'),
            __('Configuración del Carrusel', 'kintsugi-content-manager'),
            'manage_options',
            'kintsugi-carousel-settings',
            array($this, 'display_carousel_settings_page')
        );
    }

    /**
     * Adjusts the current admin menu to highlight the correct parent menu
     * when on the custom post type screens.
     */
    public function adjust_current_admin_menu() {
        global $parent_file, $submenu_file, $post_type, $pagenow;
        
        // Check if we're on the noticia custom post type admin page
        if ($post_type === 'noticia') {
            // Set the parent file to highlight Kintsugi Content menu
            $parent_file = 'kintsugi-content-manager';
            
            // Set the correct submenu item as active
            if ($pagenow === 'post.php' && isset($_GET['post'])) {
                $submenu_file = 'edit.php?post_type=noticia';
            } else if ($pagenow === 'post-new.php') {
                $submenu_file = 'post-new.php?post_type=noticia';
            } else {
                $submenu_file = 'edit.php?post_type=noticia';
            }
        }
    }

    /**
     * Enqueue admin scripts and styles.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts($hook) {
        global $post_type;
        
        // Only enqueue on our admin pages or edit pages for our post type
        $screen = get_current_screen();
        if ($hook === 'toplevel_page_kintsugi-content-manager' || 
            $hook === 'kintsugi-content_page_kintsugi-carousel-settings' ||
            $post_type === 'noticia') {
            
            // Styles
            wp_enqueue_style(
                'kintsugi-content-manager-admin',
                KINTSUGI_CONTENT_MANAGER_PLUGIN_URL . 'admin/css/admin.css',
                array(),
                KINTSUGI_CONTENT_MANAGER_VERSION
            );
            
            // Scripts
            wp_enqueue_script(
                'kintsugi-content-manager-admin',
                KINTSUGI_CONTENT_MANAGER_PLUGIN_URL . 'admin/js/admin.js',
                array('jquery', 'jquery-ui-sortable'),
                KINTSUGI_CONTENT_MANAGER_VERSION,
                true
            );
            
            // Añadir estilos inline para mejorar la apariencia
            wp_add_inline_style('kintsugi-content-manager-admin', '
                /* Estilos para resaltar el menú de Kintsugi cuando está activo */
                #adminmenu li.menu-top.toplevel_page_kintsugi-content-manager.current,
                #adminmenu li.menu-top.toplevel_page_kintsugi-content-manager.wp-has-current-submenu {
                    background: linear-gradient(90deg, #D93280 0%, #030D55 100%) !important;
                }
                
                /* Estilos para las páginas de edición de noticias */
                .post-type-noticia #titlediv .inside,
                .post-type-noticia #postexcerpt {
                    border-left: 4px solid #D93280;
                    padding-left: 12px;
                }
                
                .post-type-noticia .postbox.kintsugi-metabox {
                    border-top: 3px solid #030D55;
                }
                
                .post-type-noticia #major-publishing-actions {
                    background: linear-gradient(90deg, rgba(250,242,248,1) 0%, rgba(255,255,255,1) 100%);
                }
                
                /* Estilos para los botones de volver y editar */
                .wrap h1.wp-heading-inline + a.page-title-action,
                .wrap h1.wp-heading-inline + a.page-title-action:hover {
                    background: #D93280;
                    color: white;
                    border-color: #D93280;
                }
                
                /* Estilos para las pantallas de administración de Kintsugi */
                .toplevel_page_kintsugi-content-manager #wpcontent,
                .kintsugi-content_page_kintsugi-carousel-settings #wpcontent {
                    padding-left: 0;
                }
                
                .kintsugi-admin-header {
                    background: linear-gradient(90deg, #D93280 0%, #030D55 100%);
                    padding: 30px 20px;
                    margin-bottom: 30px;
                    color: white;
                }
                
                .kintsugi-admin-header h1 {
                    color: white;
                    font-size: 24px;
                    margin: 0;
                }
                
                .kintsugi-admin-header p {
                    margin: 5px 0 0 0;
                    opacity: 0.9;
                    font-size: 14px;
                }
                
                .kintsugi-admin-content {
                    padding: 0 20px;
                }
                
                .kintsugi-admin-card {
                    background: white;
                    border-radius: 8px;
                    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
                    padding: 20px;
                    margin-bottom: 20px;
                }
                
                /* Estilos para el meta box de carousel */
                #kintsugi_noticia_carousel {
                    border-top: 3px solid #D93280;
                }
                
                #kintsugi_noticia_carousel .postbox-header {
                    background: linear-gradient(90deg, rgba(250,242,248,0.5) 0%, rgba(255,255,255,1) 100%);
                }
                
                #kintsugi_noticia_carousel .inside label {
                    font-weight: 600;
                    color: #030D55;
                }
            ');
        }
    }

    /**
     * Display the admin page.
     *
     * @since    1.0.0
     */
    public function display_admin_page() {
        // Include admin page template
        include KINTSUGI_CONTENT_MANAGER_PLUGIN_DIR . 'admin/partials/admin-display.php';
    }
    
    /**
     * Display the carousel settings page.
     *
     * @since    1.0.0
     */
    public function display_carousel_settings_page() {
        // Include carousel settings template
        include KINTSUGI_CONTENT_MANAGER_PLUGIN_DIR . 'admin/partials/carousel-settings.php';
    }
    
    /**
     * Register settings for the plugin.
     *
     * @since    1.0.0
     */
    public function register_settings() {
        // Carousel settings
        register_setting(
            'kintsugi-carousel-settings',
            'kintsugi_carousel_noticias',
            array(
                'sanitize_callback' => array($this, 'sanitize_carousel_settings'),
                'default'           => array(),
            )
        );
        
        // Registrar acción AJAX para actualizar el estado del carrusel
        add_action('wp_ajax_update_carousel_status', array($this, 'update_carousel_status_ajax'));
    }
    
    /**
     * Actualizar estado del carrusel vía AJAX
     * 
     * @since 1.0.3
     */
    public function update_carousel_status_ajax() {
        // Verificar nonce
        if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'update_carousel_status')) {
            wp_send_json_error(array('message' => 'Error de seguridad. Por favor, recarga la página.'));
        }
        
        // Verificar permisos
        if (!current_user_can('manage_options')) {
            wp_send_json_error(array('message' => 'No tienes permiso para realizar esta acción.'));
        }
        
        // Obtener datos
        $noticia_id = isset($_POST['noticia_id']) ? intval($_POST['noticia_id']) : 0;
        $in_carousel = isset($_POST['in_carousel']) ? intval($_POST['in_carousel']) : 0;
        
        if (!$noticia_id) {
            wp_send_json_error(array('message' => 'ID de noticia inválido.'));
        }
        
        // Actualizar meta
        update_post_meta($noticia_id, '_show_in_carousel', $in_carousel ? '1' : '0');
        
        // Actualizar configuración global del carrusel
        $carousel_settings = get_option('kintsugi_carousel_noticias', array());
        $noticias_ids = isset($carousel_settings['noticias_ids']) ? $carousel_settings['noticias_ids'] : array();
        
        if ($in_carousel && !in_array($noticia_id, $noticias_ids)) {
            $noticias_ids[] = $noticia_id;
            $carousel_settings['noticias_ids'] = $noticias_ids;
            update_option('kintsugi_carousel_noticias', $carousel_settings);
        } elseif (!$in_carousel && in_array($noticia_id, $noticias_ids)) {
            $noticias_ids = array_diff($noticias_ids, array($noticia_id));
            $carousel_settings['noticias_ids'] = $noticias_ids;
            update_option('kintsugi_carousel_noticias', $carousel_settings);
        }
        
        wp_send_json_success(array('message' => 'Estado del carrusel actualizado.'));
    }
    
    /**
     * Sanitize carousel settings.
     *
     * @param array $input The value to sanitize.
     * @return array The sanitized value.
     * @since    1.0.0
     */
    public function sanitize_carousel_settings($input) {
        $sanitized_input = array();
        
        if (isset($input['noticias_ids']) && is_array($input['noticias_ids'])) {
            $sanitized_input['noticias_ids'] = array_map('absint', $input['noticias_ids']);
        }
        
        if (isset($input['shortcode_code']) && !empty($input['shortcode_code'])) {
            $sanitized_input['shortcode_code'] = sanitize_text_field($input['shortcode_code']);
        }
        
        return $sanitized_input;
    }
    
    /**
     * Add meta boxes to the post edit screen.
     *
     * @since    1.0.0
     */
    public function add_meta_boxes() {
        add_meta_box(
            'kintsugi_noticia_carousel',
            __('Opciones de Carrusel', 'kintsugi-content-manager'),
            array($this, 'render_carousel_metabox'),
            'noticia',
            'side',
            'default',
            array('className' => 'kintsugi-metabox')
        );
    }
    
    /**
     * Render the carousel meta box.
     *
     * @param WP_Post $post The post object.
     * @since    1.0.0
     */
    public function render_carousel_metabox($post) {
        // Add nonce for security
        wp_nonce_field('kintsugi_carousel_metabox', 'kintsugi_carousel_metabox_nonce');
        
        // Get current value
        $show_in_carousel = get_post_meta($post->ID, '_show_in_carousel', true);
        ?>
        <div class="kintsugi-carousel-metabox">
            <p>
                <label>
                    <input type="checkbox" name="show_in_carousel" id="show_in_carousel" value="1" <?php checked($show_in_carousel, '1'); ?>>
                    <?php _e('Mostrar esta noticia en el carrusel principal', 'kintsugi-content-manager'); ?>
                </label>
            </p>
            <p class="description">
                <?php _e('Marque esta casilla para incluir esta noticia en el carrusel principal de la página. Puede gestionar todas las noticias del carrusel desde la página "Configuración del Carrusel".', 'kintsugi-content-manager'); ?>
            </p>
        </div>
        <?php
    }
    
    /**
     * Save carousel selection.
     *
     * @param int $post_id The post ID.
     * @since    1.0.0
     */
    public function save_carousel_selection($post_id) {
        // Check if our nonce is set
        if (!isset($_POST['kintsugi_carousel_metabox_nonce'])) {
            return $post_id;
        }
        
        // Verify the nonce
        if (!wp_verify_nonce($_POST['kintsugi_carousel_metabox_nonce'], 'kintsugi_carousel_metabox')) {
            return $post_id;
        }
        
        // Check if this is an autosave
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return $post_id;
        }
        
        // Check the user's permissions
        if ('noticia' == $_POST['post_type']) {
            if (!current_user_can('edit_page', $post_id)) {
                return $post_id;
            }
        } else {
            if (!current_user_can('edit_post', $post_id)) {
                return $post_id;
            }
        }
        
        // Update the meta field in the database
        $show_in_carousel = isset($_POST['show_in_carousel']) ? '1' : '0';
        update_post_meta($post_id, '_show_in_carousel', $show_in_carousel);
        
        // Update carousel settings if needed
        $carousel_settings = get_option('kintsugi_carousel_noticias', array());
        $noticias_ids = isset($carousel_settings['noticias_ids']) ? $carousel_settings['noticias_ids'] : array();
        
        if ($show_in_carousel === '1' && !in_array($post_id, $noticias_ids)) {
            $noticias_ids[] = $post_id;
            $carousel_settings['noticias_ids'] = $noticias_ids;
            update_option('kintsugi_carousel_noticias', $carousel_settings);
        } elseif ($show_in_carousel === '0' && in_array($post_id, $noticias_ids)) {
            $noticias_ids = array_diff($noticias_ids, array($post_id));
            $carousel_settings['noticias_ids'] = $noticias_ids;
            update_option('kintsugi_carousel_noticias', $carousel_settings);
        }
    }

    /**
     * Add a branding notice to make it clear the user is editing Kintsugi Content
     */
    public function add_kintsugi_branding_notice() {
        global $post_type, $pagenow;
        
        // Solo mostrar en pantallas relacionadas con noticias
        if ($post_type !== 'noticia') {
            return;
        }
        
        // Pantallas donde mostrar el banner
        $valid_pages = array('edit.php', 'post.php', 'post-new.php');
        
        if (!in_array($pagenow, $valid_pages)) {
            return;
        }
        
        // Preparar el título de la página actual
        $page_title = '';
        if ($pagenow === 'edit.php') {
            $page_title = __('Gestión de Noticias', 'kintsugi-content-manager');
        } else if ($pagenow === 'post-new.php') {
            $page_title = __('Añadir Nueva Noticia', 'kintsugi-content-manager');
        } else if ($pagenow === 'post.php') {
            $page_title = __('Editar Noticia', 'kintsugi-content-manager');
        }
        
        // Mostrar el banner
        ?>
        <div class="notice notice-info kintsugi-branding-notice">
            <style>
                .kintsugi-branding-notice {
                    border-left-color: #D93280 !important;
                    padding: 15px !important;
                    display: flex !important;
                    align-items: center !important;
                    justify-content: space-between !important;
                    margin: 15px 0 15px 0 !important;
                    background: linear-gradient(90deg, rgba(250,242,248,1) 0%, rgba(255,255,255,1) 100%) !important;
                }
                
                .kintsugi-branding-notice h2 {
                    margin: 0 !important;
                    color: #030D55 !important;
                    font-weight: 600 !important;
                }
                
                .kintsugi-branding-notice p {
                    margin: 5px 0 0 0 !important;
                    color: #555 !important;
                }
                
                .kintsugi-branding-buttons {
                    display: flex !important;
                    gap: 10px !important;
                }
            </style>
            
            <div>
                <h2><?php echo esc_html($page_title); ?> - Kintsugi Content</h2>
                <p><?php _e('Estás gestionando el contenido de noticias para Kintsugi. Estas noticias se mostrarán en el carrusel y listado de la página.', 'kintsugi-content-manager'); ?></p>
            </div>
            
            <div class="kintsugi-branding-buttons">
                <a href="<?php echo admin_url('admin.php?page=kintsugi-content-manager'); ?>" class="button"><?php _e('Volver al Resumen', 'kintsugi-content-manager'); ?></a>
                <a href="<?php echo admin_url('admin.php?page=kintsugi-carousel-settings'); ?>" class="button button-primary"><?php _e('Configurar Carrusel', 'kintsugi-content-manager'); ?></a>
            </div>
        </div>
        <?php
    }
}
