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
    // Cargar Swiper si es necesario en la página de prensa
    if (is_page_template('resources/views/prensa.blade.php')) {
        wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css', [], '8.0.0');
        wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js', [], '8.0.0', true);
        
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
                    setTimeout(function() {
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
                    }, 500); // Retraso para asegurar que todo esté cargado
                }
            });
        ";
        
        wp_add_inline_script('swiper-js', $init_script);
    }
}, 100);

// Registrar la directiva @vite para Blade
add_filter('blade.compiler', function ($compiler) {
    $compiler->directive('vite', function ($expression) {
        return '<?php /* Vite is handled by sage_vite_assets() in functions.php */ ?>';
    });
    
    return $compiler;
});

// Personalizar la configuración del carrusel para 5 columnas
function ikintsugi_customize_carousel() {
    // Solo ejecutar en páginas con el carrusel
    if (!is_admin() && is_page_template('resources/views/prensa.blade.php')) {
        wp_add_inline_script('swiper-js', "
            // Sobrescribir la inicialización del carrusel
            jQuery(document).ready(function($) {
                // Eliminar inicializaciones previas
                if (window.kintsugiSwiperInstances && window.kintsugiSwiperInstances.length) {
                    window.kintsugiSwiperInstances.forEach(function(swiper) {
                        if (swiper && swiper.destroy) {
                            swiper.destroy(true, true);
                        }
                    });
                }
                
                // Asegurar un item por slide
                $('.kintsugi-carousel-container .swiper-wrapper').each(function() {
                    var $wrapper = $(this);
                    
                    // Si hay varios items anidados en un slide, reorganizarlos
                    $wrapper.find('.swiper-slide').each(function() {
                        var $slide = $(this);
                        
                        // Si este slide contiene múltiples items
                        if ($slide.find('.kintsugi-carousel-item').length > 1) {
                            var $items = $slide.find('.kintsugi-carousel-item');
                            
                            // Tomar cada item y crear un nuevo slide para él
                            $items.each(function(index) {
                                if (index > 0) { // El primer item se queda en el slide original
                                    var $item = $(this);
                                    var $newSlide = $('<div class=\"swiper-slide kintsugi-carousel-slide\"></div>');
                                    $item.appendTo($newSlide);
                                    $newSlide.insertAfter($slide);
                                }
                            });
                        }
                    });
                });
                
                // Nueva inicialización del carrusel con 5 columnas
                var swiperInstances = [];
                
                $('.kintsugi-carousel-container').each(function(index) {
                    var $container = $(this);
                    var carouselId = $container.attr('id');
                    
                    if (!carouselId) {
                        carouselId = 'kintsugi-carousel-' + index;
                        $container.attr('id', carouselId);
                    }
                    
                    // Forzar 5 columnas en todos los breakpoints
                    var swiper = new Swiper('#' + carouselId, {
                        slidesPerView: 1, // Default para móvil muy pequeño
                        spaceBetween: 20,
                        loop: true,
                        grabCursor: true,
                        effect: 'slide',
                        speed: 800,
                        autoplay: {
                            delay: 5000,
                            disableOnInteraction: false,
                            pauseOnMouseEnter: true,
                        },
                        pagination: {
                            el: '#' + carouselId + ' .swiper-pagination',
                            clickable: true,
                            dynamicBullets: true,
                        },
                        navigation: {
                            nextEl: '#' + carouselId + ' .kintsugi-carousel-nav-next',
                            prevEl: '#' + carouselId + ' .kintsugi-carousel-nav-prev',
                        },
                        // Configuración para diversos tamaños de pantalla
                        breakpoints: {
                            480: {
                                slidesPerView: 2,
                                spaceBetween: 10,
                            },
                            640: {
                                slidesPerView: 3,
                                spaceBetween: 15,
                            },
                            992: {
                                slidesPerView: 4,
                                spaceBetween: 20,
                            },
                            1200: {
                                slidesPerView: 5,
                                spaceBetween: 20,
                            }
                        },
                        on: {
                            init: function() {
                                console.log('Swiper initialized with ' + this.params.slidesPerView + ' slides per view');
                                // Aplicar clase para distinguir este carrusel
                                $('#' + carouselId).addClass('carousel-initialized custom-carousel-5col');
                            },
                            breakpoint: function(swiper) {
                                console.log('Swiper breakpoint changed to ' + swiper.params.slidesPerView + ' slides per view');
                            }
                        }
                    });
                    
                    swiperInstances.push(swiper);
                    $container.addClass('carousel-initialized');
                });
                
                // Guardar referencia global de instancias de Swiper
                window.kintsugiSwiperInstances = swiperInstances;
            });
        ", 'after');
    }
}
add_action('wp_enqueue_scripts', 'ikintsugi_customize_carousel', 101); // Mayor prioridad que el script original