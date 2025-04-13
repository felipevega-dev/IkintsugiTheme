<?php
/**
 * Post Types class.
 *
 * @link       https://ikintsugi.com
 * @since      1.0.0
 *
 * @package    Kintsugi_Content_Manager
 * @subpackage Kintsugi_Content_Manager/includes
 */

/**
 * Post Types class.
 *
 * Handles registering custom post types and taxonomies.
 *
 * @package    Kintsugi_Content_Manager
 * @subpackage Kintsugi_Content_Manager/includes
 * @author     Ikintsugi
 */
class Kintsugi_Content_Manager_Post_Types {

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
        // Register post types
        add_action('init', array($this, 'register_post_types'));
        
        // Register meta boxes
        add_action('add_meta_boxes', array($this, 'register_meta_boxes'));
        
        // Save post meta
        add_action('save_post', array($this, 'save_post_meta'));
    }

    /**
     * Register custom post types.
     *
     * @since    1.0.0
     */
    public function register_post_types() {
        // Register the 'noticia' post type
        $labels = array(
            'name'               => _x('Noticias', 'post type general name', 'kintsugi-content-manager'),
            'singular_name'      => _x('Noticia', 'post type singular name', 'kintsugi-content-manager'),
            'menu_name'          => _x('Noticias', 'admin menu', 'kintsugi-content-manager'),
            'name_admin_bar'     => _x('Noticia', 'add new on admin bar', 'kintsugi-content-manager'),
            'add_new'            => _x('Añadir Nueva', 'noticia', 'kintsugi-content-manager'),
            'add_new_item'       => __('Añadir Nueva Noticia', 'kintsugi-content-manager'),
            'new_item'           => __('Nueva Noticia', 'kintsugi-content-manager'),
            'edit_item'          => __('Editar Noticia', 'kintsugi-content-manager'),
            'view_item'          => __('Ver Noticia', 'kintsugi-content-manager'),
            'all_items'          => __('Todas las Noticias', 'kintsugi-content-manager'),
            'search_items'       => __('Buscar Noticias', 'kintsugi-content-manager'),
            'parent_item_colon'  => __('Noticias Padre:', 'kintsugi-content-manager'),
            'not_found'          => __('No se encontraron noticias.', 'kintsugi-content-manager'),
            'not_found_in_trash' => __('No se encontraron noticias en la papelera.', 'kintsugi-content-manager')
        );

        $args = array(
            'labels'             => $labels,
            'description'        => __('Noticias para el sitio web', 'kintsugi-content-manager'),
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => false, // Ocultar del menú principal para mostrarlo como submenu de Kintsugi Content
            'menu_icon'          => 'dashicons-format-aside',
            'query_var'          => true,
            'rewrite'            => array('slug' => 'noticias'),
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => 5,
            'supports'           => array('title', 'editor', 'author', 'thumbnail', 'excerpt'),
            'show_in_rest'       => true,
        );

        register_post_type('noticia', $args);
    }

    /**
     * Register meta boxes.
     *
     * @since    1.0.0
     */
    public function register_meta_boxes() {
        add_meta_box(
            'noticia_details',
            __('Detalles de la Noticia', 'kintsugi-content-manager'),
            array($this, 'render_noticia_details_meta_box'),
            'noticia',
            'normal',
            'high'
        );
    }

    /**
     * Render the noticia details meta box.
     *
     * @param WP_Post $post The post object.
     * @since    1.0.0
     */
    public function render_noticia_details_meta_box($post) {
        // Add nonce for security
        wp_nonce_field('noticia_details_meta_box', 'noticia_details_meta_box_nonce');
        
        // Retrieve existing values
        $tipo_noticia = get_post_meta($post->ID, '_tipo_noticia', true);
        $enlace_externo = get_post_meta($post->ID, '_enlace_externo', true);
        $youtube_url = get_post_meta($post->ID, '_youtube_url', true);
        
        ?>
        <div class="noticia-meta-box">
            <p>
                <label for="tipo_noticia"><?php _e('Tipo de Noticia:', 'kintsugi-content-manager'); ?></label>
                <select id="tipo_noticia" name="tipo_noticia" class="widefat">
                    <option value="articulo" <?php selected($tipo_noticia, 'articulo'); ?>><?php _e('Artículo', 'kintsugi-content-manager'); ?></option>
                    <option value="video" <?php selected($tipo_noticia, 'video'); ?>><?php _e('Video', 'kintsugi-content-manager'); ?></option>
                </select>
            </p>
            
            <div id="articulo_fields" style="<?php echo ($tipo_noticia === 'video') ? 'display:none;' : ''; ?>">
                <p>
                    <label for="enlace_externo"><?php _e('Enlace Externo:', 'kintsugi-content-manager'); ?></label>
                    <input type="url" id="enlace_externo" name="enlace_externo" class="widefat" value="<?php echo esc_url($enlace_externo); ?>" placeholder="https://ejemplo.com">
                    <span class="description"><?php _e('URL completa del artículo externo', 'kintsugi-content-manager'); ?></span>
                </p>
            </div>
            
            <div id="video_fields" style="<?php echo ($tipo_noticia !== 'video') ? 'display:none;' : ''; ?>">
                <p>
                    <label for="youtube_url"><?php _e('URL de YouTube:', 'kintsugi-content-manager'); ?></label>
                    <input type="url" id="youtube_url" name="youtube_url" class="widefat" value="<?php echo esc_url($youtube_url); ?>" placeholder="https://www.youtube.com/watch?v=XXXXXXXXXXX">
                    <span class="description"><?php _e('URL completa del video de YouTube', 'kintsugi-content-manager'); ?></span>
                </p>
            </div>
        </div>
        
        <script type="text/javascript">
            jQuery(document).ready(function($) {
                // Show/hide fields based on selection
                $('#tipo_noticia').on('change', function() {
                    var selectedType = $(this).val();
                    if (selectedType === 'articulo') {
                        $('#articulo_fields').show();
                        $('#video_fields').hide();
                    } else {
                        $('#articulo_fields').hide();
                        $('#video_fields').show();
                    }
                });
            });
        </script>
        <?php
    }

    /**
     * Save post meta.
     *
     * @param int $post_id The post ID.
     * @since    1.0.0
     */
    public function save_post_meta($post_id) {
        // Check if our nonce is set
        if (!isset($_POST['noticia_details_meta_box_nonce'])) {
            return $post_id;
        }

        // Verify the nonce
        if (!wp_verify_nonce($_POST['noticia_details_meta_box_nonce'], 'noticia_details_meta_box')) {
            return $post_id;
        }

        // Check if this is an autosave
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return $post_id;
        }

        // Check the post type
        if ('noticia' !== $_POST['post_type']) {
            return $post_id;
        }

        // Check permissions
        if (!current_user_can('edit_post', $post_id)) {
            return $post_id;
        }

        // Save the meta fields
        if (isset($_POST['tipo_noticia'])) {
            update_post_meta($post_id, '_tipo_noticia', sanitize_text_field($_POST['tipo_noticia']));
        }

        if (isset($_POST['enlace_externo'])) {
            update_post_meta($post_id, '_enlace_externo', esc_url_raw($_POST['enlace_externo']));
        }

        if (isset($_POST['youtube_url'])) {
            update_post_meta($post_id, '_youtube_url', esc_url_raw($_POST['youtube_url']));
        }
    }
}
