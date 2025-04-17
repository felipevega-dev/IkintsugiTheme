<?php

use Roots\Acorn\Application;

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our theme. We will simply require it into the script here so that we
| don't have to worry about manually loading any of our classes later on.
|
*/

if (! file_exists($composer = __DIR__.'/vendor/autoload.php')) {
    wp_die(__('Error locating autoloader. Please run <code>composer install</code>.', 'sage'));
}

require $composer;

/*
|--------------------------------------------------------------------------
| Register The Bootloader
|--------------------------------------------------------------------------
|
| The first thing we will do is schedule a new Acorn application container
| to boot when WordPress is finished loading the theme. The application
| serves as the "glue" for all the components of Laravel and is
| the IoC container for the system binding all of the various parts.
|
*/

Application::configure()
    ->withProviders([
        App\Providers\ThemeServiceProvider::class,
    ])
    ->boot();

/*
|--------------------------------------------------------------------------
| Register Sage Theme Files
|--------------------------------------------------------------------------
|
| Out of the box, Sage ships with categorically named theme files
| containing common functionality and setup to be bootstrapped with your
| theme. Simply add (or remove) files from the array below to change what
| is registered alongside Sage.
|
*/

collect(['setup', 'filters'])
    ->each(function ($file) {
        if (! locate_template($file = "app/{$file}.php", true, true)) {
            wp_die(
                /* translators: %s is replaced with the relative file path */
                sprintf(__('Error locating <code>%s</code> for inclusion.', 'sage'), $file)
            );
        }
    });

/**
 * Vite assets.
 */
if (!function_exists('sage_vite_assets')) {
    function sage_vite_assets() {
        // Comprueba si está en modo desarrollo
        if (wp_get_environment_type() !== 'production' && file_exists(get_theme_file_path('public/hot'))) {
            // Modo desarrollo - HMR activo
            $url = rtrim(file_get_contents(get_theme_file_path('public/hot')));
            
            // Ajustar URL si es necesario
            if (strpos($url, '127.0.0.1') !== false || strpos($url, 'localhost') !== false) {
                wp_enqueue_script('vite-client', $url . '/@vite/client', [], null, true);
                wp_enqueue_script('vite-app', $url . '/resources/js/app.js', [], null, true);
                
                // Si ves errores CORS, podrías necesitar más ajustes aquí
            }
        } else {
            // Modo producción - usar manifest
            if (file_exists($manifest = get_theme_file_path('public/build/manifest.json'))) {
                $manifest = json_decode(file_get_contents($manifest), true);
                
                // Enqueue CSS files
                if (isset($manifest['resources/css/app.css'])) {
                    if (isset($manifest['resources/css/app.css']['css'])) {
                        foreach ($manifest['resources/css/app.css']['css'] as $css) {
                            wp_enqueue_style('sage/css-' . md5($css), get_theme_file_uri('public/build/' . $css), false, null);
                        }
                    } else if (isset($manifest['resources/css/app.css']['file'])) {
                        wp_enqueue_style('sage/css', get_theme_file_uri('public/build/' . $manifest['resources/css/app.css']['file']), false, null);
                    }
                }
                
                // Enqueue JS files
                if (isset($manifest['resources/js/app.js'])) {
                    wp_enqueue_script('sage/js', get_theme_file_uri('public/build/' . $manifest['resources/js/app.js']['file']), [], null, true);
                }
            }
        }
    }
}

// Enganchar la función a WordPress
add_action('wp_enqueue_scripts', 'sage_vite_assets');
add_action('wp_enqueue_scripts', function() {
    // Encontrar la ruta al plugin y cargar sus estilos
    $plugin_path = 'kintsugi-content-manager';
    
    // CSS principal del plugin
    $css_url = get_site_url() . '/wp-content/themes/ikintsugi-theme/' . $plugin_path . '/public/css/custom-theme.css';
    $public_css_url = get_site_url() . '/wp-content/themes/ikintsugi-theme/' . $plugin_path . '/public/css/public.css';
    
    // Forzar la versión con timestamp para evitar cache
    $css_file_path = WP_CONTENT_DIR . '/themes/ikintsugi-theme/' . $plugin_path . '/public/css/custom-theme.css';
    $public_css_file_path = WP_CONTENT_DIR . '/themes/ikintsugi-theme/' . $plugin_path . '/public/css/public.css';
    
    $version = file_exists($css_file_path) ? filemtime($css_file_path) : time();
    $public_version = file_exists($public_css_file_path) ? filemtime($public_css_file_path) : time();
    
    // Registrar y encolar los estilos
    wp_register_style('kintsugi-public-base-css', $public_css_url, [], $public_version);
    wp_register_style('kintsugi-public-css', $css_url, ['kintsugi-public-base-css'], $version);
    wp_enqueue_style('kintsugi-public-base-css');
    wp_enqueue_style('kintsugi-public-css');
    
    // Estilos adicionales para arreglar problemas visuales
    $additional_styles = "
        .kintsugi-noticias-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            grid-gap: 30px;
        }
        
        @media (max-width: 768px) {
            .kintsugi-noticias-grid {
                grid-template-columns: 1fr;
            }
        }
        
        .kintsugi-noticia-item {
            background-color: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            display: flex;
            flex-direction: column;
            height: 100%;
        }
        
        .kintsugi-noticia-image,
        .kintsugi-noticia-video {
            position: relative;
            height: 0;
            padding-bottom: 56.25%;
            overflow: hidden;
        }
        
        .kintsugi-noticia-image img,
        .kintsugi-noticia-video img,
        .kintsugi-noticia-video-preview img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .kintsugi-noticia-content {
            padding: 20px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }
        
        .kintsugi-noticia-title {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 10px;
            color: #030D55;
        }
        
        .kintsugi-noticia-date {
            position: absolute;
            top: 15px;
            left: 15px;
            background-color: rgba(217, 50, 128, 0.8);
            color: white;
            padding: 5px 10px;
            border-radius: 4px;
            font-size: 12px;
            z-index: 5;
        }
        
        .kintsugi-noticia-excerpt {
            color: #555;
            font-size: 14px;
            margin-top: 10px;
        }
        
        .kintsugi-carousel-container {
            border-radius: 12px;
            overflow: hidden;
            background: #f9f9f9;
            position: relative;
        }
        
        .kintsugi-carousel-slide {
            height: 400px;
        }
        
        .kintsugi-carousel-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .kintsugi-carousel-content {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 20px;
            background: linear-gradient(to top, rgba(0,0,0,0.7), rgba(0,0,0,0));
            color: white;
        }
        
        .kintsugi-carousel-title {
            font-size: 22px;
            font-weight: 600;
            margin-bottom: 10px;
        }
        
        .kintsugi-carousel-excerpt {
            font-size: 14px;
            opacity: 0.9;
        }
        
        .kintsugi-noticia-video-play {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 60px;
            height: 60px;
            background-color: rgba(217, 50, 128, 0.8);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 5;
        }
        
        .kintsugi-noticia-video-play:after {
            content: '';
            width: 0;
            height: 0;
            border-top: 12px solid transparent;
            border-bottom: 12px solid transparent;
            border-left: 20px solid white;
            margin-left: 5px;
        }
        
        .kintsugi-video-popup {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.9);
            z-index: 9999;
            display: none;
            align-items: center;
            justify-content: center;
        }
        
        .kintsugi-video-popup.active {
            display: flex !important;
        }
        
        .kintsugi-video-popup-inner {
            position: relative;
            width: 90%;
            max-width: 900px;
        }
        
        .kintsugi-video-popup-content {
            position: relative;
            padding-top: 56.25%;
            overflow: hidden;
            border-radius: 8px;
        }
        
        .kintsugi-video-popup-content iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: 0;
        }
        
        .kintsugi-video-popup-close {
            position: absolute;
            top: -40px;
            right: 0;
            width: 30px;
            height: 30px;
            color: white;
            font-size: 30px;
            line-height: 30px;
            text-align: center;
            cursor: pointer;
            z-index: 10;
        }
        
        .kintsugi-noticias-pagination {
            display: flex;
            justify-content: center;
            margin-top: 30px;
        }
        
        .kintsugi-noticias-pagination .page-numbers {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 40px;
            height: 40px;
            padding: 0 12px;
            margin: 0 5px;
            border-radius: 4px;
            background-color: #f5f5f5;
            color: #333;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        
        .kintsugi-noticias-pagination .page-numbers.current {
            background-color: #362766;
            color: #fff;
        }
    ";
    wp_add_inline_style('kintsugi-public-css', $additional_styles);
    
    // Cargar Swiper si es necesario (siempre cargar para la página de prensa)
    if (is_page_template('resources/views/prensa.blade.php')) {
        wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css', [], '8.0.0');
        wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js', [], '8.0.0', true);
        
        // Scripts del plugin
        $carousel_js_url = get_site_url() . '/wp-content/themes/ikintsugi-theme/' . $plugin_path . '/public/js/carousel.js';
        $public_js_url = get_site_url() . '/wp-content/themes/ikintsugi-theme/' . $plugin_path . '/public/js/public.js';
        
        wp_enqueue_script('kintsugi-public-js', $public_js_url, ['jquery'], $version, true);
        wp_enqueue_script('kintsugi-carousel-js', $carousel_js_url, ['jquery', 'swiper-js'], $version, true);
        
        // Script de inicialización específico para el carrusel
        $init_script = "
            jQuery(document).ready(function($) {
                // Inicializar video popup
                $('.kintsugi-noticia-video-link, .kintsugi-carousel-video-link').on('click', function(e) {
                    e.preventDefault();
                    var videoUrl = $(this).data('video-url');
                    if (videoUrl) {
                        // Convertir URL de YouTube a URL de embed
                        videoUrl = videoUrl.replace('watch?v=', 'embed/');
                        videoUrl = videoUrl.replace('youtu.be/', 'youtube.com/embed/');
                        
                        // Añadir parámetros de autoplay y otras opciones
                        if (videoUrl.indexOf('?') > 0) {
                            videoUrl += '&autoplay=1&rel=0';
                        } else {
                            videoUrl += '?autoplay=1&rel=0';
                        }
                        
                        // Cargar la URL en el iframe
                        $('.kintsugi-video-popup iframe').attr('src', videoUrl);
                        $('.kintsugi-video-popup').addClass('active');
                        $('body').addClass('kintsugi-popup-open');
                    }
                });
                
                // Cerrar popup
                $('.kintsugi-video-popup-close').on('click', function() {
                    $('.kintsugi-video-popup iframe').attr('src', '');
                    $('.kintsugi-video-popup').removeClass('active');
                    $('body').removeClass('kintsugi-popup-open');
                });
                
                // Inicializar swiper
                if (typeof Swiper !== 'undefined') {
                    $('.kintsugi-carousel-container').each(function() {
                        var swiper = new Swiper(this, {
                            slidesPerView: 1,
                            spaceBetween: 30,
                            loop: true,
                            autoplay: {
                                delay: 5000,
                            },
                            pagination: {
                                el: '.swiper-pagination',
                                clickable: true,
                            },
                            navigation: {
                                nextEl: '.kintsugi-carousel-nav-next',
                                prevEl: '.kintsugi-carousel-nav-prev',
                            },
                            breakpoints: {
                                768: {
                                    slidesPerView: 1,
                                },
                                1024: {
                                    slidesPerView: 1,
                                },
                            }
                        });
                    });
                }
            });
        ";
        
        wp_add_inline_script('kintsugi-carousel-js', $init_script);
    }
}, 100);

// Registrar la directiva @vite para Blade
add_filter('blade.compiler', function ($compiler) {
    $compiler->directive('vite', function ($expression) {
        return '<?php /* Vite is handled by sage_vite_assets() in functions.php */ ?>';
    });
    
    return $compiler;
});