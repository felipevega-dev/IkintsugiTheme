<?php
if (!defined('WPINC')) die;

// AJAX Grid Search handler (usa helpers)
add_action('wp_ajax_nopriv_simple_carousel_grid_search', 'simple_carousel_ajax_grid_search');
add_action('wp_ajax_simple_carousel_grid_search', 'simple_carousel_ajax_grid_search');

function simple_carousel_ajax_grid_search() {
    check_ajax_referer('simple-carousel-grid-nonce', 'nonce');
    $search = sanitize_text_field($_POST['search'] ?? '');
    $year = sanitize_text_field($_POST['year'] ?? '');
    $sort = sanitize_text_field($_POST['sort'] ?? '');
    $page = max(1, intval($_POST['page'] ?? 1));
    $per_page = 9;

    $args = [
        'post_type' => 'carousel_item',
        'posts_per_page' => $per_page,
        'paged' => $page,
        'orderby' => 'date',
        'order' => 'DESC',
    ];
    if ($search) $args['s'] = $search;
    if ($year) $args['date_query'] = [ ['year' => $year] ];
    if ($sort) {
        switch ($sort) {
            case 'date-desc': $args['orderby'] = 'date'; $args['order'] = 'DESC'; break;
            case 'date-asc': $args['orderby'] = 'date'; $args['order'] = 'ASC'; break;
            case 'title-asc': $args['orderby'] = 'title'; $args['order'] = 'ASC'; break;
            case 'title-desc': $args['orderby'] = 'title'; $args['order'] = 'DESC'; break;
        }
    }
    $query = new WP_Query($args);
    $items_html = '';
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $items_html .= simple_carousel_get_grid_item_html(get_post());
        }
        wp_reset_postdata();
    }
    wp_send_json_success([
        'items' => $items_html,
        'has_more' => ($query->found_posts > $per_page * $page)
    ]);
}
