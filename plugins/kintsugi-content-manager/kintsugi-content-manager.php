<?php
/**
 * The plugin bootstrap file
 *
 * @link              https://ikintsugi.com
 * @since             1.0.0
 * @package           Kintsugi_Content_Manager
 *
 * @wordpress-plugin
 * Plugin Name:       Kintsugi Content Manager
 * Plugin URI:        https://ikintsugi.com
 * Description:       Administra el contenido de noticias para el sitio de Kintsugi.
 * Version:           1.0.5
 * Author:            Ikintsugi
 * Author URI:        https://ikintsugi.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       kintsugi-content-manager
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

// Plugin version
define('KINTSUGI_CONTENT_MANAGER_VERSION', '1.0.3');

// Plugin folder URL.
define('KINTSUGI_CONTENT_MANAGER_PLUGIN_URL', plugin_dir_url(__FILE__));

// Plugin folder path.
define('KINTSUGI_CONTENT_MANAGER_PLUGIN_DIR', plugin_dir_path(__FILE__));

/**
 * Detect if we're using a Sage theme
 *
 * @return bool Whether a Sage theme is active
 */
function kintsugi_detect_sage_theme() {
    $is_sage = false;
    
    // Método 1: Detectar por las funciones de Sage
    if (function_exists('sage') || (function_exists('app') && method_exists(app(), 'sage'))) {
        $is_sage = true;
    }
    
    // Método 2: Detectar por la estructura de archivos
    if (!$is_sage) {
        $theme_dir = get_template_directory();
        if (file_exists($theme_dir . '/resources/views') || file_exists($theme_dir . '/resources/assets')) {
            $is_sage = true;
        }
    }
    
    // Método 3: Detectar por nombre del tema
    $theme = wp_get_theme();
    $theme_name = $theme->get('Name');
    if (strpos(strtolower($theme_name), 'sage') !== false || strpos(strtolower($theme_name), 'ikintsugi') !== false) {
        $is_sage = true;
    }
    
    // Check if we're forcing standard loading
    $force_standard = get_option('kintsugi_force_standard_loading', false);
    
    // If we're forcing standard loading, return false regardless of theme
    if ($force_standard) {
        return false;
    }
    
    // Recomendado para depuración
    error_log('Kintsugi: Sage theme detected: ' . ($is_sage ? 'Yes' : 'No'));
    
    // Allow forcing standard WP script loading via filter
    return apply_filters('kintsugi_is_sage_theme', $is_sage);
}

// Add a filter to force standard WordPress script loading
add_filter('kintsugi_is_sage_theme', function($is_sage) {
    // Check if a query param is present to force standard loading for testing
    if (isset($_GET['kintsugi_standard_loading']) && $_GET['kintsugi_standard_loading'] === '1') {
        return false;
    }
    return $is_sage;
});

/**
 * The code that runs during plugin activation.
 */
function activate_kintsugi_content_manager() {
    require_once KINTSUGI_CONTENT_MANAGER_PLUGIN_DIR . 'includes/class-activator.php';
    Kintsugi_Content_Manager_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 */
function deactivate_kintsugi_content_manager() {
    // Flush rewrite rules on deactivation
    flush_rewrite_rules();
}

register_activation_hook(__FILE__, 'activate_kintsugi_content_manager');
register_deactivation_hook(__FILE__, 'deactivate_kintsugi_content_manager');

/**
 * Load the required dependencies for this plugin.
 */
require_once KINTSUGI_CONTENT_MANAGER_PLUGIN_DIR . 'includes/class-post-types.php';
require_once KINTSUGI_CONTENT_MANAGER_PLUGIN_DIR . 'includes/class-shortcodes.php';
require_once KINTSUGI_CONTENT_MANAGER_PLUGIN_DIR . 'includes/class-settings.php';

// Admin functionality
if (is_admin()) {
    require_once KINTSUGI_CONTENT_MANAGER_PLUGIN_DIR . 'admin/class-admin.php';
    $kintsugi_admin = new Kintsugi_Content_Manager_Admin();
    $kintsugi_admin->init();
}

// Initialize post types
$kintsugi_post_types = new Kintsugi_Content_Manager_Post_Types();
$kintsugi_post_types->init();

// Initialize shortcodes
$kintsugi_shortcodes = new Kintsugi_Content_Manager_Shortcodes();
$kintsugi_shortcodes->init();

// Initialize settings if needed
$kintsugi_settings = new Kintsugi_Content_Manager_Settings();
$kintsugi_settings->init();
