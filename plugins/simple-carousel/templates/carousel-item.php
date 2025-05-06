<?php
if (!isset($items)) $items = [];
?>
<div class="simple-carousel">
    <div class="simple-carousel-wrapper">
        <?php foreach ($items as $item):
            // Corregir: asegurar objeto siempre
            if (is_array($item)) $item = (object) $item;
            $type = get_post_meta($item->ID, '_carousel_item_type', true);
            $type = $type ?: 'image';
            if ($type === 'video') {
                $video_url = get_post_meta($item->ID, '_video_url', true);
                $video_id = '';
                $thumbnail_url = '';
                $embed_url = '';
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
                <div class="simple-carousel-slide video-slide">
                    <?php if ($video_id && $thumbnail_url): ?>
                        <div class="thumb" style="background:#000;position:relative;cursor:pointer;">
                            <img src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php echo esc_attr($item->post_title); ?>">
                            <div class="video-play-btn" data-video-url="<?php echo esc_url($embed_url); ?>" style="position:absolute;left:50%;top:50%;transform:translate(-50%,-50%);width:56px;height:56px;background:rgba(54,39,102,0.85);border-radius:50%;display:flex;align-items:center;justify-content:center;cursor:pointer;">
                                <svg width="32" height="32" viewBox="0 0 24 24" fill="#fff"><polygon points="5,3 19,12 5,21"></polygon></svg>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="simple-carousel-caption">
                        <h3><?php echo esc_html($item->post_title); ?></h3>
                        <?php if (!empty($item->post_content)): ?>
                            <p><?php echo esc_html($item->post_content); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            <?php } else {
                $image_url = get_the_post_thumbnail_url($item->ID, 'full');
                $link_url = get_post_meta($item->ID, '_link_url', true);
                if (!$image_url) continue;
            ?>
                <div class="simple-carousel-slide image-slide">
                    <?php if ($link_url): ?>
                    <a href="<?php echo esc_url($link_url); ?>" target="_blank" style="display:block;text-decoration:none;color:inherit;">
                    <?php endif; ?>
                        <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($item->post_title); ?>">
                        <div class="simple-carousel-caption">
                            <h3><?php echo esc_html($item->post_title); ?></h3>
                            <?php if (!empty($item->post_content)): ?>
                                <p><?php echo esc_html($item->post_content); ?></p>
                            <?php endif; ?>
                        </div>
                    <?php if ($link_url): ?>
                    </a>
                    <?php endif; ?>
                </div>
            <?php } ?>
        <?php endforeach; ?>
    </div>
    <button class="simple-carousel-prev">←</button>
    <button class="simple-carousel-next">→</button>
</div>
