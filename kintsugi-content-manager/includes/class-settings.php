<?php
/**
 * Settings class.
 *
 * @link       https://ikintsugi.com
 * @since      1.0.0
 *
 * @package    Kintsugi_Content_Manager
 * @subpackage Kintsugi_Content_Manager/includes
 */

/**
 * Settings class.
 *
 * Handles plugin settings and options.
 *
 * @package    Kintsugi_Content_Manager
 * @subpackage Kintsugi_Content_Manager/includes
 * @author     Ikintsugi
 */
class Kintsugi_Content_Manager_Settings {

    /**
     * The options name to be used in this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $option_name    Option name of this plugin.
     */
    private $option_name = 'kintsugi_content_manager_settings';

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
        // Register settings and sections
        add_action('admin_init', array($this, 'register_settings'));
        
        // Add settings page if needed
        add_action('admin_menu', array($this, 'add_settings_page'));
    }

    /**
     * Register plugin settings, sections, and fields.
     *
     * @since    1.0.0
     */
    public function register_settings() {
        // Register settings
        register_setting(
            $this->option_name,
            $this->option_name,
            array($this, 'validate_settings')
        );

        // Register settings section
        add_settings_section(
            $this->option_name . '_general',
            __('Configuración General', 'kintsugi-content-manager'),
            array($this, 'settings_section_callback'),
            $this->option_name
        );

        // Define settings fields (add as needed)
        add_settings_field(
            'items_per_page',
            __('Noticias por página', 'kintsugi-content-manager'),
            array($this, 'items_per_page_callback'),
            $this->option_name,
            $this->option_name . '_general',
            array(
                'label_for' => 'items_per_page',
                'class'     => 'kintsugi-content-manager-row',
            )
        );

        // Registrar la configuración del carrusel
        register_setting('kintsugi_settings', 'kintsugi_carousel_noticias');
        
        // Registrar opción para forzar la carga estándar de scripts/estilos
        register_setting('kintsugi_settings', 'kintsugi_force_standard_loading', array(
            'type' => 'boolean',
            'default' => false,
            'sanitize_callback' => 'rest_sanitize_boolean'
        ));
    }

    /**
     * Settings section callback.
     *
     * @since    1.0.0
     */
    public function settings_section_callback() {
        echo '<p>' . esc_html__('Configuración para el plugin Kintsugi Content Manager.', 'kintsugi-content-manager') . '</p>';
    }

    /**
     * Items per page field callback.
     *
     * @since    1.0.0
     */
    public function items_per_page_callback() {
        $options = get_option($this->option_name);
        $value = isset($options['items_per_page']) ? $options['items_per_page'] : 6;
        ?>
        <select name="<?php echo esc_attr($this->option_name) . '[items_per_page]'; ?>" id="items_per_page">
            <option value="3" <?php selected($value, 3); ?>>3</option>
            <option value="6" <?php selected($value, 6); ?>>6</option>
            <option value="9" <?php selected($value, 9); ?>>9</option>
            <option value="12" <?php selected($value, 12); ?>>12</option>
        </select>
        <p class="description">
            <?php esc_html_e('Número de noticias a mostrar por página en el listado.', 'kintsugi-content-manager'); ?>
        </p>
        <?php
    }

    /**
     * Validate settings.
     *
     * @param array $input The value inputted in the field.
     * @return array Sanitized input.
     * @since    1.0.0
     */
    public function validate_settings($input) {
        $output = array();
        
        // Sanitize items_per_page
        if (isset($input['items_per_page'])) {
            $output['items_per_page'] = absint($input['items_per_page']);
        }
        
        return $output;
    }

    /**
     * Get a specific option value.
     *
     * @param string $key The option key.
     * @param mixed $default Default value if option not found.
     * @return mixed The option value.
     * @since    1.0.0
     */
    public function get_option($key, $default = '') {
        $options = get_option($this->option_name);
        return isset($options[$key]) ? $options[$key] : $default;
    }

    /**
     * Add settings submenu page under main menu.
     *
     * @since    1.0.0
     */
    public function add_settings_page() {
        // Añadir página de configuración como submenú de Kintsugi Content
        add_submenu_page(
            'kintsugi-content-manager',
            __('Configuración General', 'kintsugi-content-manager'),
            __('Configuración General', 'kintsugi-content-manager'),
            'manage_options',
            'kintsugi-settings',
            array($this, 'display_settings_page')
        );
    }

    /**
     * Display settings page.
     *
     * @since    1.0.0
     */
    public function display_settings_page() {
        // Obtener opción actual
        $force_standard = get_option('kintsugi_force_standard_loading', false);
        ?>
        <div class="wrap">
            <h1><?php _e('Configuración General de Kintsugi Content Manager', 'kintsugi-content-manager'); ?></h1>
            
            <form method="post" action="options.php">
                <?php
                settings_fields('kintsugi_settings');
                do_settings_sections('kintsugi_settings');
                ?>
                
                <div class="kintsugi-admin-card">
                    <h2><?php _e('Configuración de Carga de Scripts', 'kintsugi-content-manager'); ?></h2>
                    <p><?php _e('Si estás experimentando problemas con la carga de estilos o scripts en tu tema, puedes probar cambiando esta configuración.', 'kintsugi-content-manager'); ?></p>
                    
                    <table class="form-table">
                        <tr>
                            <th scope="row"><?php _e('Método de Carga', 'kintsugi-content-manager'); ?></th>
                            <td>
                                <label for="kintsugi_force_standard_loading">
                                    <input type="checkbox" id="kintsugi_force_standard_loading" name="kintsugi_force_standard_loading" value="1" <?php checked(true, $force_standard); ?>>
                                    <?php _e('Forzar carga estándar (WordPress tradicional)', 'kintsugi-content-manager'); ?>
                                </label>
                                <p class="description">
                                    <?php _e('Activa esta opción si los estilos y scripts no se están cargando correctamente en tu tema. Esto forzará el uso del método estándar de WordPress para cargar recursos, en lugar del método específico para temas Sage/Laravel.', 'kintsugi-content-manager'); ?>
                                </p>
                            </td>
                        </tr>
                    </table>
                </div>
                
                <?php submit_button(); ?>
            </form>
        </div>
        <?php
    }
}
