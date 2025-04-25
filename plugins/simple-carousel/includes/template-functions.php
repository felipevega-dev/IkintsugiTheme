<?php
if (!defined('WPINC')) die;

// Helper para renderizar un item del grid (video o imagen)
function simple_carousel_get_grid_item_html($item) {
    $type = get_post_meta($item->ID, '_carousel_item_type', true);
    $type = $type ?: 'image';
    ob_start();
    if ($type === 'video') {
        $video_url = get_post_meta($item->ID, '_video_url', true);
        $video_id = '';
        $embed_url = '';
        $thumbnail_url = '';
        if (strpos($video_url, 'youtube.com') !== false || strpos($video_url, 'youtu.be') !== false) {
            preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/', $video_url, $matches);
            if (isset($matches[1])) {
                $video_id = $matches[1];
                $embed_url = "https://www.youtube.com/embed/{$video_id}?autoplay=1";
                $thumbnail_url = "https://img.youtube.com/vi/{$video_id}/maxresdefault.jpg";
            }
        } elseif (strpos($video_url, 'vimeo.com') !== false) {
            preg_match('/vimeo\.com\/([0-9]+)/', $video_url, $matches);
            if (isset($matches[1])) {
                $video_id = $matches[1];
                $embed_url = "https://player.vimeo.com/video/{$video_id}?autoplay=1";
                $vimeo_data = @file_get_contents("https://vimeo.com/api/v2/video/{$video_id}.json");
                if ($vimeo_data) {
                    $vimeo_data = json_decode($vimeo_data);
                    $thumbnail_url = $vimeo_data[0]->thumbnail_large;
                }
            }
        }
        ?>
        <div class="carousel-grid-item video-item">
            <?php if ($video_id && $thumbnail_url): ?>
                <div class="video-thumbnail" data-video-url="<?php echo esc_url($embed_url); ?>" style="position:relative;cursor:pointer;">
                    <img src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php echo esc_attr($item->post_title); ?>">
                    <div class="video-play-btn" style="position:absolute;left:50%;top:50%;transform:translate(-50%,-50%);width:56px;height:56px;background:rgba(54,39,102,0.85);border-radius:50%;display:flex;align-items:center;justify-content:center;">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="#fff"><polygon points="5,3 19,12 5,21"></polygon></svg>
                    </div>
                </div>
            <?php endif; ?>
            <div class="carousel-grid-caption">
                <h3><?php echo esc_html($item->post_title); ?></h3>
                <?php if (!empty($item->post_content)): ?>
                    <p><?php echo wp_trim_words($item->post_content, 15); ?></p>
                <?php endif; ?>
            </div>
        </div>
        <?php
    } else {
        $image_url = get_the_post_thumbnail_url($item->ID, 'large');
        $link_url = get_post_meta($item->ID, '_link_url', true);
        if ($image_url):
            ?>
            <div class="carousel-grid-item image-item">
                <?php if ($link_url): ?>
                    <a href="<?php echo esc_url($link_url); ?>" target="_blank">
                <?php endif; ?>
                <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($item->post_title); ?>">
                <?php if ($link_url): ?></a><?php endif; ?>
                <div class="carousel-grid-caption">
                    <h3><?php echo esc_html($item->post_title); ?></h3>
                    <?php if (!empty($item->post_content)): ?>
                        <p><?php echo wp_trim_words($item->post_content, 15); ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <?php
        endif;
    }
    return ob_get_clean();
}
