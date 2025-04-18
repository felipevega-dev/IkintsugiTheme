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

// Registrar la directiva @vite para Blade
add_filter('blade.compiler', function ($compiler) {
    $compiler->directive('vite', function ($expression) {
        return '<?php /* Vite is handled by sage_vite_assets() in functions.php */ ?>';
    });
    
    return $compiler;
});

add_action('wp_enqueue_scripts', function() {
    global $template;
    if (basename($template) === 'prensa.blade.php' || is_page('prensa')) {
        // Primero jQuery
        wp_enqueue_script('jquery');
        
        // Luego Swiper CSS y JS
        wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css');
        wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js', ['jquery'], null, true);
        
        // Nuestros estilos y scripts propios
        wp_enqueue_style('prensa-styles', plugins_url('/kintsugi-content-manager/public/css/prensa.css'), ['swiper-css'], null);
        wp_enqueue_script('prensa-scripts', plugins_url('/kintsugi-content-manager/public/js/prensa.js'), ['jquery', 'swiper-js'], null, true);
        
        // Pasar AJAX params
        wp_localize_script('prensa-scripts', 'kintsugi_ajax', [
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('kintsugi_ajax_nonce')
        ]);
    }
}, 20);

