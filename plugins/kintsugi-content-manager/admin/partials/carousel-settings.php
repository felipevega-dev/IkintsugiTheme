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
        
        // Get featured image
        $thumbnail = get_the_post_thumbnail_url($noticia_id, 'thumbnail') ?: '';
        
        // Build noticia object with necessary info
        $noticia = array(
            'id' => $noticia_id,
            'title' => get_the_title(),
            'date' => get_the_date(),
            'in_carousel' => !empty($show_in_carousel),
            'tipo' => get_post_meta($noticia_id, '_tipo_noticia', true),
            'thumbnail' => $thumbnail,
            'excerpt' => get_the_excerpt()
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
        <p><?php _e('Personaliza qué noticias quieres destacar en el carrusel principal de tu sitio web.', 'kintsugi-content-manager'); ?></p>
    </div>

    <div class="kintsugi-admin-content">
        <div class="kintsugi-quick-actions">
            <a href="<?php echo admin_url('post-new.php?post_type=noticia'); ?>" class="kintsugi-btn">
                <span class="dashicons dashicons-plus-alt" style="margin-right: 5px;"></span>
                <?php _e('Añadir Nueva Noticia', 'kintsugi-content-manager'); ?>
            </a>
            
            <a href="<?php echo admin_url('admin.php?page=kintsugi-content-manager'); ?>" class="button">
                <span class="dashicons dashicons-dashboard" style="margin-right: 5px;"></span>
                <?php _e('Volver al Resumen', 'kintsugi-content-manager'); ?>
            </a>
        </div>

        <!-- Vista previa del carrusel -->
        <div class="kintsugi-admin-card">
            <h2><?php _e('Vista Previa del Carrusel', 'kintsugi-content-manager'); ?></h2>
            
            <?php if (empty($carousel_noticias)) : ?>
                <div class="kintsugi-no-carousel-items" style="background: #f9f9f9; padding: 20px; border-radius: 8px; text-align: center;">
                    <div style="margin-bottom: 15px; font-size: 36px; color: #ccc;">
                        <span class="dashicons dashicons-images-alt"></span>
                    </div>
                    <p style="margin-bottom: 0; font-size: 15px;"><?php _e('No hay noticias seleccionadas para el carrusel. Para añadir noticias al carrusel, ve a la lista de noticias y marca la casilla "Mostrar en carrusel" al editar cada noticia.', 'kintsugi-content-manager'); ?></p>
                </div>
            <?php else : ?>
                <div style="display: flex; overflow-x: auto; gap: 15px; padding: 10px 0;">
                    <?php foreach ($carousel_noticias as $noticia) : ?>
                        <div style="min-width: 250px; max-width: 300px; background: white; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); overflow: hidden;">
                            <div style="height: 150px; background-color: #f0f0f0; background-image: url('<?php echo esc_url($noticia['thumbnail']); ?>'); background-size: cover; background-position: center;"></div>
                            <div style="padding: 15px;">
                                <h3 style="margin: 0 0 5px 0; font-size: 16px;"><?php echo esc_html($noticia['title']); ?></h3>
                                <div style="display: flex; align-items: center; margin-bottom: 10px;">
                                    <span style="font-size: 12px; color: #666;"><?php echo esc_html($noticia['date']); ?></span>
                                    <span style="margin-left: 10px; font-size: 12px; padding: 2px 6px; border-radius: 4px; background: <?php echo $noticia['tipo'] === 'video' ? '#ffecf5' : '#eef5ff'; ?>; color: <?php echo $noticia['tipo'] === 'video' ? '#D93280' : '#030D55'; ?>;">
                                        <?php echo $noticia['tipo'] === 'video' ? __('Video', 'kintsugi-content-manager') : __('Artículo', 'kintsugi-content-manager'); ?>
                                    </span>
                                </div>
                                <div style="display: flex; gap: 5px;">
                                    <a href="<?php echo get_edit_post_link($noticia['id']); ?>" class="button button-small" title="<?php _e('Editar noticia', 'kintsugi-content-manager'); ?>">
                                        <span class="dashicons dashicons-edit" style="font-size: 16px; height: 16px; width: 16px;"></span>
                                    </a>
                                    <button type="button" class="button button-small remove-from-carousel" data-id="<?php echo $noticia['id']; ?>" title="<?php _e('Quitar del carrusel', 'kintsugi-content-manager'); ?>">
                                        <span class="dashicons dashicons-no" style="font-size: 16px; height: 16px; width: 16px; color: #c33;"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>

        <!-- Shortcode para usar el carrusel -->
        <div class="kintsugi-admin-card">
            <h2><?php _e('Uso del Carrusel', 'kintsugi-content-manager'); ?></h2>
            <p><?php _e('Copia este shortcode para mostrar el carrusel con las noticias seleccionadas en cualquier página de tu sitio:', 'kintsugi-content-manager'); ?></p>
            <div class="kintsugi-shortcode-container">
                <code><?php echo esc_html($shortcode_preview); ?></code>
                <button class="button copy-shortcode" data-clipboard-text="<?php echo esc_attr($shortcode_preview); ?>"><?php _e('Copiar', 'kintsugi-content-manager'); ?></button>
            </div>
            
            <p class="description" style="margin-top: 15px;"><?php _e('Recuerda que puedes seleccionar qué noticias aparecen en el carrusel marcando la casilla "Mostrar esta noticia en el carrusel principal" al editar cada noticia.', 'kintsugi-content-manager'); ?></p>
        </div>

        <!-- Todas las noticias -->
        <div class="kintsugi-admin-card">
            <h2><?php _e('Administrar Noticias del Carrusel', 'kintsugi-content-manager'); ?></h2>
            <p><?php _e('Selecciona las noticias que quieres mostrar en el carrusel principal. Puedes buscar por título o filtrar por tipo.', 'kintsugi-content-manager'); ?></p>
            
            <div style="display: flex; gap: 10px; margin-bottom: 15px; align-items: center;">
                <div style="flex-grow: 1;">
                    <input type="text" id="search-noticias" placeholder="<?php _e('Buscar noticias...', 'kintsugi-content-manager'); ?>" class="widefat" style="padding: 8px;">
                </div>
                <div>
                    <select id="filter-tipo" style="padding: 8px; min-width: 150px;">
                        <option value=""><?php _e('Todos los tipos', 'kintsugi-content-manager'); ?></option>
                        <option value="articulo"><?php _e('Solo artículos', 'kintsugi-content-manager'); ?></option>
                        <option value="video"><?php _e('Solo videos', 'kintsugi-content-manager'); ?></option>
                    </select>
                </div>
                <div>
                    <select id="filter-carrusel" style="padding: 8px; min-width: 150px;">
                        <option value=""><?php _e('Todos', 'kintsugi-content-manager'); ?></option>
                        <option value="in"><?php _e('En carrusel', 'kintsugi-content-manager'); ?></option>
                        <option value="out"><?php _e('No en carrusel', 'kintsugi-content-manager'); ?></option>
                    </select>
                </div>
            </div>
            
            <?php if (empty($all_noticias)) : ?>
                <div class="kintsugi-no-noticias" style="background: #f9f9f9; padding: 20px; border-radius: 8px; text-align: center;">
                    <p><?php _e('No hay noticias disponibles. Crea algunas noticias primero.', 'kintsugi-content-manager'); ?></p>
                    <a href="<?php echo admin_url('post-new.php?post_type=noticia'); ?>" class="kintsugi-btn">
                        <?php _e('Crear Nueva Noticia', 'kintsugi-content-manager'); ?>
                    </a>
                </div>
            <?php else : ?>
                <div class="kintsugi-all-noticias">
                    <table class="widefat" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col" class="manage-column column-title column-primary"><?php _e('Título', 'kintsugi-content-manager'); ?></th>
                                <th scope="col" class="manage-column column-type"><?php _e('Tipo', 'kintsugi-content-manager'); ?></th>
                                <th scope="col" class="manage-column column-date"><?php _e('Fecha', 'kintsugi-content-manager'); ?></th>
                                <th scope="col" class="manage-column column-carousel"><?php _e('En Carrusel', 'kintsugi-content-manager'); ?></th>
                                <th scope="col" class="manage-column column-actions"><?php _e('Acciones', 'kintsugi-content-manager'); ?></th>
                            </tr>
                        </thead>
                        <tbody id="noticias-list">
                            <?php foreach ($all_noticias as $noticia) : ?>
                                <tr class="noticia-item" data-id="<?php echo $noticia['id']; ?>" data-title="<?php echo strtolower(esc_attr($noticia['title'])); ?>" data-tipo="<?php echo esc_attr($noticia['tipo']); ?>" data-in-carousel="<?php echo $noticia['in_carousel'] ? 'yes' : 'no'; ?>">
                                    <td class="column-title column-primary">
                                        <strong><?php echo esc_html($noticia['title']); ?></strong>
                                    </td>
                                    <td class="column-type">
                                        <span style="padding: 3px 8px; border-radius: 4px; background: <?php echo $noticia['tipo'] === 'video' ? '#ffecf5' : '#eef5ff'; ?>; color: <?php echo $noticia['tipo'] === 'video' ? '#D93280' : '#030D55'; ?>; font-size: 12px;">
                                            <?php echo $noticia['tipo'] === 'video' ? __('Video', 'kintsugi-content-manager') : __('Artículo', 'kintsugi-content-manager'); ?>
                                        </span>
                                    </td>
                                    <td class="column-date">
                                        <?php echo esc_html($noticia['date']); ?>
                                    </td>
                                    <td class="column-carousel">
                                        <label class="kintsugi-switch">
                                            <input type="checkbox" class="carousel-toggle" data-id="<?php echo $noticia['id']; ?>" <?php checked($noticia['in_carousel'], true); ?>>
                                            <span class="kintsugi-slider"></span>
                                        </label>
                                    </td>
                                    <td class="column-actions">
                                        <a href="<?php echo get_edit_post_link($noticia['id']); ?>" class="button button-small">
                                            <?php _e('Editar', 'kintsugi-content-manager'); ?>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    
                    <div id="no-results-message" style="display: none; background: #f9f9f9; padding: 20px; text-align: center; margin-top: 15px; border-radius: 8px;">
                        <p><?php _e('No se encontraron noticias con los filtros seleccionados.', 'kintsugi-content-manager'); ?></p>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<style>
/* Estilos para interruptor (Switch) */
.kintsugi-switch {
    position: relative;
    display: inline-block;
    width: 50px;
    height: 24px;
}

.kintsugi-switch input {
    opacity: 0;
    width: 0;
    height: 0;
}

.kintsugi-slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    transition: .4s;
    border-radius: 24px;
}

.kintsugi-slider:before {
    position: absolute;
    content: "";
    height: 16px;
    width: 16px;
    left: 4px;
    bottom: 4px;
    background-color: white;
    transition: .4s;
    border-radius: 50%;
}

input:checked + .kintsugi-slider {
    background-color: #D93280;
}

input:focus + .kintsugi-slider {
    box-shadow: 0 0 1px #D93280;
}

input:checked + .kintsugi-slider:before {
    transform: translateX(26px);
}
</style>

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
    
    // Toggle carousel status with AJAX
    $('.carousel-toggle').on('change', function() {
        var noticia_id = $(this).data('id');
        var is_checked = $(this).prop('checked');
        
        // Show loading indicator
        $(this).closest('tr').css('opacity', '0.7');
        
        // AJAX request to update post meta
        $.ajax({
            url: ajaxurl,
            type: 'POST',
            data: {
                action: 'update_carousel_status',
                noticia_id: noticia_id,
                in_carousel: is_checked ? 1 : 0,
                nonce: '<?php echo wp_create_nonce('update_carousel_status'); ?>'
            },
            success: function(response) {
                // Update UI based on response
                if (response.success) {
                    // Reload page to update the carousel preview
                    location.reload();
                } else {
                    alert('Error: ' + response.data.message);
                    // Restore original state
                    $(this).prop('checked', !is_checked);
                }
            },
            error: function() {
                alert('Error al actualizar. Inténtelo de nuevo.');
                // Restore original state
                $(this).prop('checked', !is_checked);
            },
            complete: function() {
                // Remove loading indicator
                $('.carousel-toggle[data-id="' + noticia_id + '"]').closest('tr').css('opacity', '1');
            }
        });
    });
    
    // Search and filter functionality
    $('#search-noticias, #filter-tipo, #filter-carrusel').on('input change', function() {
        var searchTerm = $('#search-noticias').val().toLowerCase();
        var tipoFilter = $('#filter-tipo').val();
        var carruselFilter = $('#filter-carrusel').val();
        var noResults = true;
        
        $('.noticia-item').each(function() {
            var $this = $(this);
            var title = $this.data('title');
            var tipo = $this.data('tipo');
            var inCarousel = $this.data('in-carousel');
            
            var showBySearch = !searchTerm || title.indexOf(searchTerm) !== -1;
            var showByTipo = !tipoFilter || tipo === tipoFilter;
            var showByCarrusel = !carruselFilter || 
                                 (carruselFilter === 'in' && inCarousel === 'yes') || 
                                 (carruselFilter === 'out' && inCarousel === 'no');
            
            if (showBySearch && showByTipo && showByCarrusel) {
                $this.show();
                noResults = false;
            } else {
                $this.hide();
            }
        });
        
        // Show or hide "no results" message
        if (noResults) {
            $('#no-results-message').show();
        } else {
            $('#no-results-message').hide();
        }
    });
    
    // Remove from carousel button
    $('.remove-from-carousel').on('click', function() {
        var noticia_id = $(this).data('id');
        
        // Find and uncheck the corresponding toggle
        $('.carousel-toggle[data-id="' + noticia_id + '"]').prop('checked', false).trigger('change');
    });
});
</script> 