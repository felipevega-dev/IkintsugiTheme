<?php
/**
 * Plugin Name: Carrousel Noticias
 * Description: Carrusel de noticias hecho para Ikintsugi
 * Version: 1.2.4
 * Author: Felipe Vega
 */

if (!defined('WPINC')) die;

define('SIMPLE_CAROUSEL_PATH', plugin_dir_path(__FILE__));
define('SIMPLE_CAROUSEL_URL', plugin_dir_url(__FILE__));

// Incluir primero la clase admin para marcar que está cargada
require_once SIMPLE_CAROUSEL_PATH . 'admin/class-admin.php';

// Resto de includes
require_once SIMPLE_CAROUSEL_PATH . 'includes/class-simple-carousel.php';
require_once SIMPLE_CAROUSEL_PATH . 'includes/class-simple-carousel-grid.php';
require_once SIMPLE_CAROUSEL_PATH . 'includes/ajax-handlers.php';
require_once SIMPLE_CAROUSEL_PATH . 'includes/template-functions.php';

// Hooks globales
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('simple-carousel-style', SIMPLE_CAROUSEL_URL . 'css/carousel.css');
    wp_enqueue_script('simple-carousel-script', SIMPLE_CAROUSEL_URL . 'js/carousel.js', array('jquery'), null, true);

    wp_enqueue_style('simple-carousel-grid-style', SIMPLE_CAROUSEL_URL . 'css/grid.css');
    wp_enqueue_script('simple-carousel-grid-script', SIMPLE_CAROUSEL_URL . 'js/grid.js', array('jquery'), null, true);

    wp_enqueue_style('simple-carousel-global-style', SIMPLE_CAROUSEL_URL . 'css/global.css');
    wp_enqueue_script('simple-carousel-global-script', SIMPLE_CAROUSEL_URL . 'js/global.js', array('jquery'), null, true);

    wp_localize_script('simple-carousel-grid-script', 'simpleCarouselGrid', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('simple-carousel-grid-nonce')
    ));
});

add_action('admin_enqueue_scripts', function($hook) {
    if ('post.php' === $hook || 'post-new.php' === $hook) {
        wp_enqueue_media();
        wp_enqueue_style('simple-carousel-admin-style', SIMPLE_CAROUSEL_URL . 'css/admin.css');
        wp_enqueue_script('simple-carousel-admin-script', SIMPLE_CAROUSEL_URL . 'js/admin.js', array('jquery'), null, true);
    }
});

// Inicializar admin primero
$simple_carousel_admin = new Simple_Carousel_Admin();
$simple_carousel_admin->init();

// Inicialización de clases de frontend
new Simple_Carousel();
new Simple_Carousel_Grid();
