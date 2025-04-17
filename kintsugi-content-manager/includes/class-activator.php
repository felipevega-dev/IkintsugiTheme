<?php
/**
 * Activator class.
 *
 * @link       https://ikintsugi.com
 * @since      1.0.0
 *
 * @package    Kintsugi_Content_Manager
 * @subpackage Kintsugi_Content_Manager/includes
 */

/**
 * Activator class.
 *
 * Handles plugin activation tasks.
 *
 * @package    Kintsugi_Content_Manager
 * @subpackage Kintsugi_Content_Manager/includes
 * @author     Ikintsugi
 */
class Kintsugi_Content_Manager_Activator {

    /**
     * Activates the plugin.
     *
     * @since    1.0.0
     */
    public static function activate() {
        // Ensure post types are registered before flushing rewrite rules
        require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-post-types.php';
        $post_types = new Kintsugi_Content_Manager_Post_Types();
        $post_types->register_post_types();
        
        // Flush rewrite rules to add our custom post types
        flush_rewrite_rules();
        
        // Set default options if needed
        $default_options = array(
            'items_per_page' => 6
        );
        
        if (!get_option('kintsugi_content_manager_settings')) {
            add_option('kintsugi_content_manager_settings', $default_options);
        }
    }
} 