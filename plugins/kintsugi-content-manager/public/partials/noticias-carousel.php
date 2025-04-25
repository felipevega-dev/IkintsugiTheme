<?php
/**
 * Template for displaying the news carousel.
 *
 * @link       https://ikintsugi.com
 * @since      1.0.0
 *
 * @package    Kintsugi_Content_Manager
 * @subpackage Kintsugi_Content_Manager/public/partials
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

// Generar un ID único para este carrusel
$carousel_id = 'kintsugi-carousel-' . uniqid();
?>

<div class="kintsugi-carousel-wrapper">
    <?php if ($query->have_posts()) : ?>
    
    <!-- Swiper carousel -->
    <div id="<?php echo esc_attr($carousel_id); ?>" class="kintsugi-carousel-container swiper">
        <div class="swiper-wrapper">
            <?php while ($query->have_posts()) : $query->the_post();
                // Get post meta
                $tipo_noticia = get_post_meta(get_the_ID(), '_tipo_noticia', true);
                $enlace_externo = get_post_meta(get_the_ID(), '_enlace_externo', true);
                $youtube_url = get_post_meta(get_the_ID(), '_youtube_url', true);
                
                // Default to 'articulo' if not set
                if (empty($tipo_noticia)) {
                    $tipo_noticia = 'articulo';
                }
                
                // Set link target
                $link_target = 'target="_blank" rel="noopener noreferrer"';
                
                // Video ID for YouTube videos
                $video_id = '';
                if ($tipo_noticia === 'video' && !empty($youtube_url)) {
                    $pattern = '/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/i';
                    if (preg_match($pattern, $youtube_url, $matches)) {
                        $video_id = $matches[1];
                    }
                }

                // Get post date formatted
                $post_date = get_the_date();
            ?>
            
            <div class="kintsugi-carousel-slide swiper-slide">
                <?php if ($tipo_noticia === 'video' && !empty($video_id)) : ?>
                <!-- Video slide -->
                <a href="javascript:void(0);" class="kintsugi-carousel-video-link" data-video-url="<?php echo esc_url($youtube_url); ?>">
                    <div class="kintsugi-carousel-date"><?php echo esc_html($post_date); ?></div>
                    <div class="kintsugi-carousel-overlay"></div>
                    <div class="kintsugi-carousel-image">
                        <?php 
                        // Usamos la imagen de alta calidad de YouTube
                        $youtube_img_url = 'https://img.youtube.com/vi/' . $video_id . '/maxresdefault.jpg';
                        // Fallback a la imagen de calidad estándar si la HD no está disponible
                        $youtube_img_fallback = 'https://img.youtube.com/vi/' . $video_id . '/0.jpg';
                        ?>
                        <img src="<?php echo esc_url($youtube_img_url); ?>" 
                             onerror="this.onerror=null;this.src='<?php echo esc_url($youtube_img_fallback); ?>';" 
                             alt="<?php the_title_attribute(); ?>">
                        <div class="kintsugi-carousel-play"></div>
                    </div>
                    <div class="kintsugi-carousel-content">
                        <h3 class="kintsugi-carousel-title"><?php the_title(); ?></h3>
                        <div class="kintsugi-carousel-excerpt">
                            <?php echo wp_trim_words(get_the_excerpt(), 15); ?>
                        </div>
                    </div>
                </a>
                <?php else : ?>
                <!-- Article slide -->
                <a href="<?php echo esc_url($enlace_externo); ?>" <?php echo $link_target; ?>>
                    <div class="kintsugi-carousel-date"><?php echo esc_html($post_date); ?></div>
                    <div class="kintsugi-carousel-overlay"></div>
                    <div class="kintsugi-carousel-image">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php 
                            // Obtener la imagen en tamaño grande
                            $thumbnail_id = get_post_thumbnail_id();
                            $image_url = wp_get_attachment_image_src($thumbnail_id, 'large');
                            if ($image_url) :
                            ?>
                                <img src="<?php echo esc_url($image_url[0]); ?>" alt="<?php the_title_attribute(); ?>">
                            <?php else: ?>
                                <?php the_post_thumbnail('large'); ?>
                            <?php endif; ?>
                        <?php else : ?>
                            <img src="<?php echo KINTSUGI_CONTENT_MANAGER_PLUGIN_URL . 'public/images/placeholder.svg'; ?>" alt="<?php the_title_attribute(); ?>">
                        <?php endif; ?>
                    </div>
                    <div class="kintsugi-carousel-content">
                        <h3 class="kintsugi-carousel-title"><?php the_title(); ?></h3>
                        <div class="kintsugi-carousel-excerpt">
                            <?php echo wp_trim_words(get_the_excerpt(), 15); ?>
                        </div>
                    </div>
                </a>
                <?php endif; ?>
            </div>
            
            <?php endwhile; wp_reset_postdata(); ?>
        </div>
        
        <!-- Pagination -->
        <div class="swiper-pagination"></div>
        
        <!-- Navigation buttons -->
        <div class="kintsugi-carousel-nav-prev"></div>
        <div class="kintsugi-carousel-nav-next"></div>
    </div>
    
    <?php else : ?>
    
    <!-- No results message -->
    <div class="kintsugi-carousel-no-results">
        <p><?php _e('No se encontraron noticias para mostrar en el carrusel.', 'kintsugi-content-manager'); ?></p>
    </div>
    
    <?php endif; ?>
</div>

<!-- Video popup (shared across all instances, only included if not already output) -->
<?php if (!isset($GLOBALS['kintsugi_video_popup_included'])) : ?>
<div class="kintsugi-video-popup">
    <div class="kintsugi-video-popup-inner">
        <div class="kintsugi-video-popup-content">
            <iframe src="" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <div class="kintsugi-video-popup-close">&times;</div>
    </div>
</div>
<?php $GLOBALS['kintsugi_video_popup_included'] = true; ?>
<?php endif; ?> 