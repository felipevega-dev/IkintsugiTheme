<?php
/**
 * Template for displaying the news list.
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

// Get current search query if any
$search_query = isset($_GET['search_noticias']) ? sanitize_text_field($_GET['search_noticias']) : '';
?>

<div class="kintsugi-noticias-container">
    <!-- Search form -->
    <div class="kintsugi-noticias-search">
        <form method="get" action="<?php echo esc_url(get_permalink()); ?>">
            <input type="text" name="search_noticias" placeholder="<?php esc_attr_e('Buscar noticias...', 'kintsugi-content-manager'); ?>" value="<?php echo esc_attr($search_query); ?>">
            <button type="submit"><?php _e('Buscar', 'kintsugi-content-manager'); ?></button>
        </form>
    </div>
    
    <?php if ($query->have_posts()) : ?>
    
    <!-- News grid -->
    <div class="kintsugi-noticias-grid">
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

            // Get post date formatted
            $post_date = get_the_date();
        ?>
        
        <div class="kintsugi-noticia-item">
            <?php if ($tipo_noticia === 'video') : ?>
                <!-- Video noticia -->
                <a href="#" class="kintsugi-noticia-video-link" data-video-url="<?php echo esc_url($youtube_url); ?>">
                    <div class="kintsugi-noticia-date"><?php echo esc_html($post_date); ?></div>
                    <div class="kintsugi-noticia-overlay"></div>
                    <div class="kintsugi-noticia-video">
                        <?php 
                        // Extract YouTube video ID
                        $video_id = '';
                        $pattern = '/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/i';
                        if (preg_match($pattern, $youtube_url, $matches)) {
                            $video_id = $matches[1];
                        }
                        
                        if (!empty($video_id)) :
                        ?>
                            <div class="kintsugi-noticia-video-preview" data-video-id="<?php echo esc_attr($video_id); ?>">
                                <img src="<?php echo esc_url('https://img.youtube.com/vi/' . $video_id . '/maxresdefault.jpg'); ?>" alt="<?php the_title_attribute(); ?>" class="kintsugi-noticia-img">
                                <div class="kintsugi-noticia-video-play"></div>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="kintsugi-noticia-content">
                        <h3 class="kintsugi-noticia-title"><?php the_title(); ?></h3>
                        <div class="kintsugi-noticia-excerpt">
                            <?php echo wp_trim_words(get_the_excerpt(), 15); ?>
                        </div>
                    </div>
                </a>
            <?php else : ?>
                <!-- Article noticia -->
                <a href="<?php echo esc_url($enlace_externo); ?>" <?php echo $link_target; ?>>
                    <div class="kintsugi-noticia-date"><?php echo esc_html($post_date); ?></div>
                    <div class="kintsugi-noticia-overlay"></div>
                    <div class="kintsugi-noticia-image">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('large', array('class' => 'kintsugi-noticia-img')); ?>
                        <?php else : ?>
                            <img src="<?php echo KINTSUGI_CONTENT_MANAGER_PLUGIN_URL . 'public/images/placeholder.svg'; ?>" alt="<?php the_title_attribute(); ?>" class="kintsugi-noticia-img">
                        <?php endif; ?>
                    </div>
                    <div class="kintsugi-noticia-content">
                        <h3 class="kintsugi-noticia-title"><?php the_title(); ?></h3>
                        <div class="kintsugi-noticia-excerpt">
                            <?php echo wp_trim_words(get_the_excerpt(), 15); ?>
                        </div>
                    </div>
                </a>
            <?php endif; ?>
        </div>
        
        <?php endwhile; wp_reset_postdata(); ?>
    </div>
    
    <!-- Pagination -->
    <div class="kintsugi-noticias-pagination">
        <?php 
        echo paginate_links(array(
            'base'         => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
            'total'        => $query->max_num_pages,
            'current'      => max(1, get_query_var('paged')),
            'format'       => '?paged=%#%',
            'show_all'     => false,
            'prev_next'    => true,
            'prev_text'    => '&laquo; ' . __('Anterior', 'kintsugi-content-manager'),
            'next_text'    => __('Siguiente', 'kintsugi-content-manager') . ' &raquo;',
        ));
        ?>
    </div>
    
    <?php else : ?>
    
    <!-- No results message -->
    <div class="kintsugi-noticias-no-results">
        <p><?php _e('No se encontraron noticias.', 'kintsugi-content-manager'); ?></p>
    </div>
    
    <?php endif; ?>
</div>

<!-- Video popup (shared across all instances) -->
<div class="kintsugi-video-popup">
    <div class="kintsugi-video-popup-inner">
        <div class="kintsugi-video-popup-content">
            <iframe src="" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
        <div class="kintsugi-video-popup-close">&times;</div>
    </div>
</div> 