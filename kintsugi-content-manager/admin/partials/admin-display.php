<?php
/**
 * Admin page display template.
 *
 * @link       https://ikintsugi.com
 * @since      1.0.0
 *
 * @package    Kintsugi_Content_Manager
 * @subpackage Kintsugi_Content_Manager/admin/partials
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}
?>

<div class="wrap">
    <div class="kintsugi-admin-header">
        <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
        <p><?php _e('Administra las noticias del sitio web de manera sencilla.', 'kintsugi-content-manager'); ?></p>
    </div>

    <div class="kintsugi-admin-content">
        <div class="kintsugi-admin-card">
            <h2><?php _e('Gestión de Noticias', 'kintsugi-content-manager'); ?></h2>
            <p><?php _e('Desde aquí puedes administrar las noticias de tu sitio web.', 'kintsugi-content-manager'); ?></p>
            <a href="<?php echo admin_url('edit.php?post_type=noticia'); ?>" class="button button-primary">
                <?php _e('Administrar Noticias', 'kintsugi-content-manager'); ?>
            </a>
        </div>

        <div class="kintsugi-admin-card">
            <h2><?php _e('Instrucciones de Uso', 'kintsugi-content-manager'); ?></h2>
            <p><?php _e('Para mostrar el listado de noticias en cualquier página o entrada, utiliza el siguiente shortcode:', 'kintsugi-content-manager'); ?></p>
            <code>[administracion_noticias]</code>
            
            <p><?php _e('Para mostrar un carrusel con las noticias más recientes, utiliza:', 'kintsugi-content-manager'); ?></p>
            <code>[administracion_noticias_carrousel count="6"]</code>
            <p><small><?php _e('Puedes especificar "count" con valores: 4, 5, 6, 8 o 10', 'kintsugi-content-manager'); ?></small></p>
        </div>

        <div class="kintsugi-admin-card">
            <h2><?php _e('Tipos de Noticia', 'kintsugi-content-manager'); ?></h2>
            <ul>
                <li><strong><?php _e('Artículo:', 'kintsugi-content-manager'); ?></strong> <?php _e('Requiere título, imagen destacada, descripción corta y enlace externo.', 'kintsugi-content-manager'); ?></li>
                <li><strong><?php _e('Video:', 'kintsugi-content-manager'); ?></strong> <?php _e('Requiere título, enlace de YouTube y descripción corta.', 'kintsugi-content-manager'); ?></li>
            </ul>
        </div>
        
        <div class="kintsugi-admin-card">
            <h2><?php _e('Configuración Avanzada', 'kintsugi-content-manager'); ?></h2>
            <form method="post" action="options.php">
                <?php
                settings_fields('kintsugi-advanced-settings');
                do_settings_sections('kintsugi-content-manager');
                submit_button(__('Guardar Configuración', 'kintsugi-content-manager'));
                ?>
                
                <p class="description">
                    <?php _e('Versión del plugin:', 'kintsugi-content-manager'); ?> <strong><?php echo KINTSUGI_CONTENT_MANAGER_VERSION; ?></strong>
                </p>
            </form>
        </div>
    </div>
</div> 