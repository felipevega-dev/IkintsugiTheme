<?php
if (!defined('ABSPATH')) exit;

$options = get_option('simple_carousel_options', array(
    'autoplay' => true,
    'autoplay_speed' => 7000,
    'transition_speed' => 500
));
?>

<div class="wrap">
    <div class="simple-carousel-admin-header">
        <h1><?php _e('Configuración del Carrusel', 'simple-carousel'); ?></h1>
        <p><?php _e('Personaliza el comportamiento y apariencia de tus carruseles', 'simple-carousel'); ?></p>
    </div>

    <div class="simple-carousel-admin-content">
        <div class="simple-carousel-admin-card">
            <form method="post" action="options.php">
                <?php settings_fields('simple_carousel_settings'); ?>
                
                <table class="form-table">
                    <tr>
                        <th scope="row">
                            <label for="autoplay"><?php _e('Reproducción Automática', 'simple-carousel'); ?></label>
                        </th>
                        <td>
                            <label>
                                <input type="checkbox" 
                                       name="simple_carousel_options[autoplay]" 
                                       id="autoplay"
                                       value="1" 
                                       <?php checked(1, $options['autoplay']); ?>>
                                <?php _e('Activar reproducción automática', 'simple-carousel'); ?>
                            </label>
                        </td>
                    </tr>

                    <tr>
                        <th scope="row">
                            <label for="autoplay_speed"><?php _e('Velocidad de Reproducción', 'simple-carousel'); ?></label>
                        </th>
                        <td>
                            <input type="number" 
                                   name="simple_carousel_options[autoplay_speed]" 
                                   id="autoplay_speed"
                                   value="<?php echo esc_attr($options['autoplay_speed']); ?>"
                                   min="1000"
                                   step="500"
                                   class="small-text">
                            <p class="description"><?php _e('Tiempo en milisegundos entre cada transición (1000ms = 1 segundo)', 'simple-carousel'); ?></p>
                        </td>
                    </tr>

                    <tr>
                        <th scope="row">
                            <label for="transition_speed"><?php _e('Velocidad de Transición', 'simple-carousel'); ?></label>
                        </th>
                        <td>
                            <input type="number" 
                                   name="simple_carousel_options[transition_speed]" 
                                   id="transition_speed"
                                   value="<?php echo esc_attr($options['transition_speed']); ?>"
                                   min="100"
                                   step="100"
                                   class="small-text">
                            <p class="description"><?php _e('Duración de la animación de transición en milisegundos', 'simple-carousel'); ?></p>
                        </td>
                    </tr>
                </table>

                <?php submit_button(); ?>
            </form>
        </div>
    </div>
</div>

<style>
.form-table th {
    width: 200px;
}

.form-table input[type="number"] {
    width: 100px;
}

.form-table .description {
    margin-top: 5px;
    color: #666;
}
</style> 