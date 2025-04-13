<?php
/**
 * Carousel settings page display template.
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

// Get all noticias marked as carousel items
$carousel_noticias = array();
$all_noticias = array();

// Query for all noticias
$args = array(
    'post_type' => 'noticia',
    'posts_per_page' => -1,
    'post_status' => 'publish',
    'orderby' => 'date',
    'order' => 'DESC',
);

$query = new WP_Query($args);

if ($query->have_posts()) {
    while ($query->have_posts()) {
        $query->the_post();
        $noticia_id = get_the_ID();
        $show_in_carousel = get_post_meta($noticia_id, '_show_in_carousel', true);
        
        // Build noticia object with necessary info
        $noticia = array(
            'id' => $noticia_id,
            'title' => get_the_title(),
            'date' => get_the_date(),
            'in_carousel' => !empty($show_in_carousel),
            'tipo' => get_post_meta($noticia_id, '_tipo_noticia', true),
        );
        
        $all_noticias[] = $noticia;
        
        if (!empty($show_in_carousel)) {
            $carousel_noticias[] = $noticia;
        }
    }
    wp_reset_postdata();
}

// Get settings
$carousel_settings = get_option('kintsugi_carousel_noticias', array());

// Generate shortcode preview with selected IDs
$shortcode_preview = '[administracion_noticias_carrousel';
if (!empty($carousel_noticias)) {
    $carousel_ids = array_column($carousel_noticias, 'id');
    $shortcode_preview .= ' ids="' . implode(',', $carousel_ids) . '"';
}
$shortcode_preview .= ' count="' . count($carousel_noticias) . '"]';
?>

<div class="wrap">
    <div class="kintsugi-admin-header">
        <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
        <p><?php _e('Seleccione qué noticias desea mostrar en el carrusel principal.', 'kintsugi-content-manager'); ?></p>
    </div>

    <div class="kintsugi-admin-content">
        <div class="kintsugi-admin-card">
            <h2><?php _e('Noticias en el Carrusel', 'kintsugi-content-manager'); ?></h2>
            <p><?php _e('Aquí puede ver las noticias que actualmente están configuradas para mostrarse en el carrusel.', 'kintsugi-content-manager'); ?></p>
            
            <?php if (empty($carousel_noticias)) : ?>
                <div class="kintsugi-no-carousel-items">
                    <p><?php _e('No hay noticias seleccionadas para el carrusel. Para añadir una noticia al carrusel, edite la noticia y marque la opción "Mostrar esta noticia en el carrusel principal".', 'kintsugi-content-manager'); ?></p>
                </div>
            <?php else : ?>
                <div class="kintsugi-carousel-items">
                    <ul class="kintsugi-carousel-list">
                        <?php foreach ($carousel_noticias as $noticia) : ?>
                            <li>
                                <div class="kintsugi-carousel-item">
                                    <strong><?php echo esc_html($noticia['title']); ?></strong>
                                    <span class="kintsugi-carousel-item-type">(<?php echo $noticia['tipo'] === 'video' ? __('Video', 'kintsugi-content-manager') : __('Artículo', 'kintsugi-content-manager'); ?>)</span>
                                    <span class="kintsugi-carousel-item-date"><?php echo esc_html($noticia['date']); ?></span>
                                    <a href="<?php echo get_edit_post_link($noticia['id']); ?>" class="button button-small"><?php _e('Editar', 'kintsugi-content-manager'); ?></a>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
        </div>

        <div class="kintsugi-admin-card">
            <h2><?php _e('Todas las Noticias', 'kintsugi-content-manager'); ?></h2>
            <p><?php _e('A continuación se muestran todas las noticias. Para añadir o quitar una noticia del carrusel, haga clic en "Editar" y modifique la opción en el panel lateral.', 'kintsugi-content-manager'); ?></p>
            
            <?php if (empty($all_noticias)) : ?>
                <div class="kintsugi-no-noticias">
                    <p><?php _e('No hay noticias disponibles. Cree algunas noticias primero.', 'kintsugi-content-manager'); ?></p>
                    <a href="<?php echo admin_url('post-new.php?post_type=noticia'); ?>" class="button button-primary"><?php _e('Crear Nueva Noticia', 'kintsugi-content-manager'); ?></a>
                </div>
            <?php else : ?>
                <div class="kintsugi-all-noticias">
                    <table class="widefat fixed" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col" class="manage-column column-title column-primary"><?php _e('Título', 'kintsugi-content-manager'); ?></th>
                                <th scope="col" class="manage-column column-type"><?php _e('Tipo', 'kintsugi-content-manager'); ?></th>
                                <th scope="col" class="manage-column column-date"><?php _e('Fecha', 'kintsugi-content-manager'); ?></th>
                                <th scope="col" class="manage-column column-carousel"><?php _e('En Carrusel', 'kintsugi-content-manager'); ?></th>
                                <th scope="col" class="manage-column column-actions"><?php _e('Acciones', 'kintsugi-content-manager'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($all_noticias as $noticia) : ?>
                                <tr>
                                    <td class="column-title column-primary">
                                        <strong><?php echo esc_html($noticia['title']); ?></strong>
                                    </td>
                                    <td class="column-type">
                                        <?php echo $noticia['tipo'] === 'video' ? __('Video', 'kintsugi-content-manager') : __('Artículo', 'kintsugi-content-manager'); ?>
                                    </td>
                                    <td class="column-date">
                                        <?php echo esc_html($noticia['date']); ?>
                                    </td>
                                    <td class="column-carousel">
                                        <?php if ($noticia['in_carousel']) : ?>
                                            <span class="dashicons dashicons-yes-alt" style="color: green;"></span>
                                        <?php else : ?>
                                            <span class="dashicons dashicons-no-alt" style="color: red;"></span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="column-actions">
                                        <a href="<?php echo get_edit_post_link($noticia['id']); ?>" class="button button-small"><?php _e('Editar', 'kintsugi-content-manager'); ?></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </div>

        <div class="kintsugi-admin-card">
            <h2><?php _e('Uso del Carrusel', 'kintsugi-content-manager'); ?></h2>
            <p><?php _e('Utilice el siguiente shortcode para mostrar el carrusel con las noticias seleccionadas:', 'kintsugi-content-manager'); ?></p>
            <div class="kintsugi-shortcode-container">
                <code><?php echo esc_html($shortcode_preview); ?></code>
                <button class="button copy-shortcode" data-clipboard-text="<?php echo esc_attr($shortcode_preview); ?>"><?php _e('Copiar', 'kintsugi-content-manager'); ?></button>
            </div>
            <p class="description"><?php _e('Este shortcode mostrará solo las noticias que ha seleccionado para el carrusel, en lugar de las más recientes.', 'kintsugi-content-manager'); ?></p>
        </div>
    </div>
</div>

<script>
jQuery(document).ready(function($) {
    // Copy shortcode functionality
    $('.copy-shortcode').click(function() {
        var shortcodeText = $(this).data('clipboard-text');
        
        // Create temporary textarea element
        var $temp = $("<textarea>");
        $("body").append($temp);
        $temp.val(shortcodeText).select();
        
        // Execute copy command
        document.execCommand("copy");
        
        // Remove temporary element
        $temp.remove();
        
        // Show copied message
        var $this = $(this);
        var originalText = $this.text();
        $this.text('¡Copiado!');
        
        setTimeout(function() {
            $this.text(originalText);
        }, 2000);
    });
});
</script>

<style>
.kintsugi-carousel-list {
    margin: 0;
    padding: 0;
}

.kintsugi-carousel-list li {
    border-bottom: 1px solid #eee;
    margin: 0;
    padding: 10px 0;
}

.kintsugi-carousel-item {
    display: flex;
    align-items: center;
}

.kintsugi-carousel-item strong {
    flex: 1;
}

.kintsugi-carousel-item-type {
    margin: 0 10px;
    color: #666;
}

.kintsugi-carousel-item-date {
    margin-right: 10px;
    color: #666;
}

.kintsugi-shortcode-container {
    display: flex;
    align-items: center;
    margin: 15px 0;
    background: #f9f9f9;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
}

.kintsugi-shortcode-container code {
    flex: 1;
    padding: 5px 10px;
    background: #fff;
    border: 1px solid #ddd;
    border-radius: 4px;
}

.copy-shortcode {
    margin-left: 10px !important;
}

.kintsugi-all-noticias table {
    margin-top: 15px;
}

.column-type,
.column-date,
.column-carousel {
    width: 15%;
}

.column-actions {
    width: 10%;
    text-align: right;
}
</style> 