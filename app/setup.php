<?php

/**
 * Theme setup.
 */

namespace App;

use Illuminate\Support\Facades\Vite;

/**
 * Inject styles into the block editor.
 *
 * @return array
 */
add_filter('block_editor_settings_all', function ($settings) {
    $style = Vite::asset('resources/css/editor.css');

    $settings['styles'][] = [
        'css' => "@import url('{$style}')",
    ];

    return $settings;
});

/**
 * Inject scripts into the block editor.
 *
 * @return void
 */
add_filter('admin_head', function () {
    if (! get_current_screen()?->is_block_editor()) {
        return;
    }

    $dependencies = json_decode(Vite::content('editor.deps.json'));

    foreach ($dependencies as $dependency) {
        if (! wp_script_is($dependency)) {
            wp_enqueue_script($dependency);
        }
    }

    echo Vite::withEntryPoints([
        'resources/js/editor.js',
    ])->toHtml();
});

/**
 * Use the generated theme.json file.
 *
 * @return string
 */
add_filter('theme_file_path', function ($path, $file) {
    return $file === 'theme.json'
        ? public_path('build/assets/theme.json')
        : $path;
}, 10, 2);

/**
 * Register ACF Blocks
 * 
 * @return void
 */
add_action('acf/init', function () {
    // Solo registrar bloques si ACF y la función acf_register_block_type están disponibles
    if (function_exists('acf_register_block_type')) {

        // Featured Blog Block
        acf_register_block_type([
            'name'              => 'featured-blog',
            'title'             => __('Blog Destacado', 'sage'),
            'description'       => __('Muestra 3 posts destacados del blog con diseño personalizado.', 'sage'),
            'render_template'   => 'resources/views/blocks/featured-blog.blade.php',
            'category'          => 'formatting',
            'icon'              => 'admin-post',
            'keywords'          => ['blog', 'posts', 'destacado'],
            'mode'              => 'edit',
        ]);
        
        acf_register_block_type([
            'name'              => 'hero-section',
            'title'             => __('Hero Section', 'sage'),
            'description'       => __('Sección hero con título y subtítulo', 'sage'),
            'render_template'   => 'resources/views/blocks/hero-section.blade.php',
            'category'          => 'design',
            'icon'              => 'admin-comments',
            'keywords'          => ['hero', 'banner'],
            'example'           => [
                'attributes' => [
                    'mode' => 'preview',
                    'data' => [
                        'is_preview' => true
                    ]
                ]
            ],
        ]);
        
        // Features Section Block
        acf_register_block_type([
            'name'              => 'features-section',
            'title'             => __('Features Section', 'sage'),
            'description'       => __('Sección para mostrar características o servicios.', 'sage'),
            'render_template'   => 'resources/views/blocks/features-section.blade.php',
            'category'          => 'formatting',
            'icon'              => 'layout',
            'keywords'          => ['features', 'servicios', 'características'],
            'mode'              => 'edit',
        ]);
        
        // Testimonials Block
        acf_register_block_type([
            'name'              => 'testimonials',
            'title'             => __('Testimonials', 'sage'),
            'description'       => __('Sección para mostrar testimonios de clientes.', 'sage'),
            'render_template'   => 'resources/views/blocks/testimonials.blade.php',
            'category'          => 'formatting',
            'icon'              => 'format-quote',
            'keywords'          => ['testimonios', 'clientes', 'opiniones'],
            'mode'              => 'edit',
        ]);
        
        // CTA Section Block
        acf_register_block_type([
            'name'              => 'cta-section',
            'title'             => __('CTA Section', 'sage'),
            'description'       => __('Sección de llamada a la acción.', 'sage'),
            'render_template'   => 'resources/views/blocks/cta-section.blade.php',
            'category'          => 'formatting',
            'icon'              => 'megaphone',
            'keywords'          => ['cta', 'llamada', 'acción'],
            'mode'              => 'edit',
        ]);
    }
});

/**
 * Register the initial theme setup.
 *
 * @return void
 */
add_action('after_setup_theme', function () {
    /**
     * Disable full-site editing support.
     *
     * @link https://wptavern.com/gutenberg-10-5-embeds-pdfs-adds-verse-block-color-options-and-introduces-new-patterns
     */
    remove_theme_support('block-templates');

    /**
     * Register the navigation menus.
     *
     * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
     */
    register_nav_menus([
        'primary_navigation' => __('Primary Navigation', 'sage'),
    ]);

    /**
     * Disable the default block patterns.
     *
     * @link https://developer.wordpress.org/block-editor/developers/themes/theme-support/#disabling-the-default-block-patterns
     */
    remove_theme_support('core-block-patterns');

    /**
     * Enable plugins to manage the document title.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
     */
    add_theme_support('title-tag');

    /**
     * Enable post thumbnail support.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');

    /**
     * Enable responsive embed support.
     *
     * @link https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-support/#responsive-embedded-content
     */
    add_theme_support('responsive-embeds');

    /**
     * Enable HTML5 markup support.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */
    add_theme_support('html5', [
        'caption',
        'comment-form',
        'comment-list',
        'gallery',
        'search-form',
        'script',
        'style',
    ]);

    /**
     * Enable selective refresh for widgets in customizer.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#customize-selective-refresh-widgets
     */
    add_theme_support('customize-selective-refresh-widgets');
}, 20);

/**
 * Register the theme sidebars.
 *
 * @return void
 */
add_action('widgets_init', function () {
    $config = [
        'before_widget' => '<section class="widget %1$s %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ];

    register_sidebar([
        'name' => __('Primary', 'sage'),
        'id' => 'sidebar-primary',
    ] + $config);

    register_sidebar([
        'name' => __('Footer', 'sage'),
        'id' => 'sidebar-footer',
    ] + $config);
});

/**
 * Add AJAX handlers for the Kintsugi Content Manager
 */
add_action('wp_ajax_kintsugi_filter_noticias', 'App\kintsugi_filter_noticias');
add_action('wp_ajax_nopriv_kintsugi_filter_noticias', 'App\kintsugi_filter_noticias');

/**
 * AJAX handler for filtering noticias
 */
function kintsugi_filter_noticias() {
    // Get parameters
    $search = isset($_POST['search']) ? sanitize_text_field($_POST['search']) : '';
    $year = isset($_POST['year']) ? sanitize_text_field($_POST['year']) : 'all';
    $orderby = isset($_POST['orderby']) ? sanitize_text_field($_POST['orderby']) : 'date';
    $order = isset($_POST['order']) ? sanitize_text_field($_POST['order']) : 'DESC';
    $paged = isset($_POST['paged']) ? intval($_POST['paged']) : 1;
    $per_page = isset($_POST['per_page']) ? intval($_POST['per_page']) : 4;
    
    // Setup query args
    $args = [
        'post_type' => 'noticia',
        'posts_per_page' => $per_page,
        'paged' => $paged,
        'post_status' => 'publish',
        'orderby' => $orderby,
        'order' => $order,
    ];
    
    // Add search if provided
    if (!empty($search)) {
        $args['s'] = $search;
    }
    
    // Add year filter if selected
    if ($year !== 'all') {
        $args['date_query'] = [
            [
                'year' => intval($year),
            ]
        ];
    }
    
    // Run the query
    $query = new \WP_Query($args);
    
    // Start output buffer
    ob_start();
    
    // Include the same template that the shortcode uses
    if (file_exists(KINTSUGI_CONTENT_MANAGER_PLUGIN_DIR . 'public/partials/noticias-list.php')) {
        include KINTSUGI_CONTENT_MANAGER_PLUGIN_DIR . 'public/partials/noticias-list.php';
    } else {
        echo '<div class="p-4 bg-red-100 text-red-700 rounded">Error: Template not found.</div>';
    }
    
    // Get buffer content
    $output = ob_get_clean();
    
    // Send response
    echo $output;
    
    // Always exit in AJAX callbacks
    wp_die();
}
