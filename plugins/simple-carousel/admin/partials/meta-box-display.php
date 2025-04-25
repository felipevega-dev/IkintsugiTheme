<?php if (!defined('ABSPATH')) exit; ?>

<div class="simple-carousel-meta-box">
    <style>
        .simple-carousel-meta-box {
            padding: 12px;
        }
        .simple-carousel-meta-box .field-group {
            margin-bottom: 20px;
        }
        .simple-carousel-meta-box label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #030D55;
        }
        .simple-carousel-meta-box input[type="text"],
        .simple-carousel-meta-box input[type="url"] {
            width: 100%;
            max-width: 400px;
        }
        .simple-carousel-meta-box .type-fields {
            margin-top: 15px;
            padding: 15px;
            background: #f8f9fa;
            border-radius: 6px;
        }
        .simple-carousel-meta-box .radio-group {
            margin-bottom: 15px;
        }
        .simple-carousel-meta-box .radio-group label {
            display: inline-block;
            margin-right: 20px;
            font-weight: normal;
        }
        .simple-carousel-meta-box .description {
            margin-top: 5px;
            color: #666;
            font-style: italic;
        }
    </style>

    <div class="field-group">
        <div class="radio-group">
            <label>
                <input type="radio" 
                       name="carousel_item_type" 
                       value="image" 
                       <?php checked($type, 'image'); ?> 
                       <?php checked($type, ''); ?>>
                <?php _e('Imagen con Enlace', 'simple-carousel'); ?>
            </label>
            <label>
                <input type="radio" 
                       name="carousel_item_type" 
                       value="video" 
                       <?php checked($type, 'video'); ?>>
                <?php _e('Video', 'simple-carousel'); ?>
            </label>
        </div>
    </div>

    <div class="type-fields" id="video-fields" style="display: <?php echo ($type === 'video' ? 'block' : 'none'); ?>">
        <div class="field-group">
            <label for="video_url"><?php _e('URL del Video (YouTube o Vimeo)', 'simple-carousel'); ?></label>
            <input type="url" 
                   id="video_url" 
                   name="video_url" 
                   value="<?php echo esc_url($video_url); ?>"
                   placeholder="https://www.youtube.com/watch?v=...">
            <p class="description"><?php _e('Pega aquí la URL del video de YouTube o Vimeo', 'simple-carousel'); ?></p>
        </div>
    </div>

    <div class="type-fields" id="link-fields" style="display: <?php echo ($type !== 'video' ? 'block' : 'none'); ?>">
        <div class="field-group">
            <label for="link_url"><?php _e('URL del Enlace', 'simple-carousel'); ?></label>
            <input type="url" 
                   id="link_url" 
                   name="link_url" 
                   value="<?php echo esc_url($link_url); ?>"
                   placeholder="https://...">
            <p class="description"><?php _e('URL a la que se redirigirá al hacer clic en la imagen', 'simple-carousel'); ?></p>
        </div>
    </div>
</div>

<script>
jQuery(document).ready(function($) {
    $('input[name="carousel_item_type"]').on('change', function() {
        const type = $(this).val();
        $('#video-fields').toggle(type === 'video');
        $('#link-fields').toggle(type === 'image');
    });
});
</script> 