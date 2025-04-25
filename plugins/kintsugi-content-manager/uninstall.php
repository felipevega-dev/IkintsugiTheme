<?php
/**
 * Fired when the plugin is uninstalled.
 *
 * @link       https://ikintsugi.com
 * @since      1.0.0
 *
 * @package    Kintsugi_Content_Manager
 */

// If uninstall not called from WordPress, then exit.
if (!defined('WP_UNINSTALL_PLUGIN')) {
    exit;
}

// Define the custom post type
$post_type = 'noticia';

// Delete all the posts of custom post type
$posts = get_posts(
    array(
        'numberposts' => -1,
        'post_type'   => $post_type,
        'post_status' => 'any',
    )
);

foreach ($posts as $post) {
    wp_delete_post($post->ID, true);
}

// Delete custom post type data
delete_option($post_type . '_rewrite_rules');

// Delete any options the plugin may have stored
delete_option('kintsugi_content_manager_settings');

// Clear any cached data that has been removed
wp_cache_flush();
