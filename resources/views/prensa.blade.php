{{--
  Template Name: Prensa
--}}

@extends('layouts.app')

@section('content')
<?php
// Desregistrar los estilos y scripts del plugin para usar solo los del tema
add_action('wp_print_styles', function() {
    wp_deregister_style('kintsugi-content-manager-public');
}, 100);

add_action('wp_print_scripts', function() {
    wp_deregister_script('kintsugi-content-manager-carousel');
    wp_deregister_script('kintsugi-content-manager-public');
}, 100);
?>

<!-- Cargar jQuery primero -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

<!-- Cargar hoja de estilos de Swiper desde CDN -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css">

<!-- Cargar nuestros scripts personalizados para el funcionamiento del carrusel y videos -->
<script src="{{ get_theme_file_uri('resources/scripts/kintsugi-carousel.js') }}" defer></script>
<script src="{{ get_theme_file_uri('resources/scripts/kintsugi-public.js') }}" defer></script>

<!-- Estilos específicos de la página -->
<style>
  /* Basic Swiper setup */
  .kintsugi-theme-wrapper .swiper-container,
  .kintsugi-theme-wrapper .swiper {
    margin: 0 auto !important;
    position: relative !important;
    overflow: hidden !important;
    list-style: none !important;
    padding: 0 !important;
    width: 100% !important;
    z-index: 1 !important;
  }

  .kintsugi-theme-wrapper .swiper-wrapper {
    display: flex !important;
    position: relative !important;
    width: 100% !important;
    box-sizing: content-box !important;
    transition-property: transform !important;
  }

  .kintsugi-theme-wrapper .swiper-slide {
    flex-shrink: 0 !important;
    position: relative !important;
    transition-property: transform !important;
    /* quitamos width/height forzados */
  }

  /* Media queries para controlar cuántas slides se muestran */
  @media (min-width: 992px) {
    .kintsugi-theme-wrapper .swiper-slide {
      width: calc(33.333% - 20px) !important;
      margin-right: 20px !important;
    }
  }
  @media (min-width: 640px) and (max-width: 991px) {
    .kintsugi-theme-wrapper .swiper-slide {
      width: calc(50% - 15px) !important;
      margin-right: 15px !important;
    }
  }
  @media (max-width: 639px) {
    .kintsugi-theme-wrapper .swiper-slide {
      width: 100% !important;
      margin-right: 0 !important;
    }
  }

  /* Pagination bullets */
  .kintsugi-theme-wrapper .swiper-pagination {
    position: absolute !important;
    bottom: 10px !important;
    left: 0 !important;
    right: 0 !important;
    text-align: center !important;
    z-index: 10 !important;
  }
  .kintsugi-theme-wrapper .swiper-pagination-bullet {
    width: 12px !important;
    height: 12px !important;
    background: rgba(54,39,102,0.5) !important;
    opacity: 1 !important;
    margin: 0 4px !important;
    border-radius: 50% !important;
  }
  .kintsugi-theme-wrapper .swiper-pagination-bullet-active {
    background: rgba(54,39,102,1) !important;
  }
</style>


<!-- Wrapper para aumentar especificidad -->
<div class="kintsugi-theme-wrapper">
<!-- Hero Section -->
<section class="relative bg-[#362766] overflow-hidden pt-10 md:pt-22">
  <!-- Imagen de fondo con overlay -->
  <div class="absolute inset-0 z-0">
    <div class="absolute inset-0 bg-[#362766] opacity-70 z-10"></div>
    <img 
      src="{{ get_theme_file_uri('resources/images/prensa.png') }}" 
      alt="Conéctate con nosotros" 
      class="absolute inset-0 w-full h-full object-cover object-top" 
    >
  </div>
        
  <!-- Contenido del hero -->
  <div class="container mx-auto px-4 relative z-10 min-h-[400px] md:min-h-[90vh] flex flex-col justify-center items-center">
    <div class="max-w-4xl mx-auto text-center text-white py-32 md:py-32">
      <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold mb-8 font-playfair" style="font-family: 'Playfair Display', serif;">¡Mereces una vida mejor!</h1>
      <p class="text-xl md:text-2xl font-500 mb-2">Descubre nuestras intervenciones en medios, donde abordamos temas de EMDR, el tratamiento del trauma, psicología y felicidad</p>
    </div>
  </div>

  <!-- Curvatura inferior -->
  <div class="absolute bottom-0 left-0 right-0 z-10 translate-y-1">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120" fill="#ffffff" preserveAspectRatio="none">
      <path d="M0,64L80,69.3C160,75,320,85,480,80C640,75,800,53,960,48C1120,43,1280,53,1360,58.7L1440,64L1440,120L1360,120C1280,120,1120,120,960,120C800,120,640,120,480,120C320,120,160,120,80,120L0,120Z"></path>
    </svg>
  </div>
</section>

<!-- Sección 1: Noticias destacadas en el carrusel -->
<section class="bg-white py-4 overflow-hidden">
  <div class="container mx-auto px-4">
    <h2 class="text-3xl md:text-4xl font-bold text-[#030D55] mb-8 text-left" style="font-family: 'Playfair Display', serif;">
      Noticias destacadas
    </h2>

    <!-- Indicador visual de deslizamiento -->
    <div class="flex items-center justify-center mb-4">
      <div class="swipe-indicator left-indicator">
        <div class="swipe-indicator-dot"></div>
      </div>
      <span class="text-sm text-gray-500 mx-4">Desliza para ver más noticias</span>
      <div class="swipe-indicator right-indicator">
        <div class="swipe-indicator-dot"></div>
      </div>
    </div>

    <!-- Shortcode para el carrusel con noticias seleccionadas específicamente -->
    <div id="kintsugi-carousel-main" class="swiper-container-custom kintsugi-carousel-container swiper" style="position: relative !important; overflow: hidden !important; margin-left: auto !important; margin-right: auto !important; padding-bottom: 40px !important; border-radius: 8px !important; box-shadow: 0 10px 30px rgba(3, 13, 85, 0.1) !important;">
      <div class="swiper-wrapper" style="display: flex !important; width: 100% !important; height: 100% !important; position: relative !important; z-index: 1 !important; box-sizing: content-box !important; transition-property: transform !important;">
        <?php
        // Obtener las noticias marcadas para el carrusel
        $carousel_settings = get_option('kintsugi_carousel_noticias', array());
        $carousel_ids = isset($carousel_settings['noticias_ids']) ? $carousel_settings['noticias_ids'] : array();
        
        if (!empty($carousel_ids)) {
          // Si hay noticias seleccionadas, mostrar el carrusel con esas noticias específicas
          echo do_shortcode('[administracion_noticias_carrousel ids="' . implode(',', $carousel_ids) . '" count="8"]');
        } else {
          // Si no hay noticias seleccionadas, mostrar el carrusel normal con las más recientes
          echo do_shortcode('[administracion_noticias_carrousel count="8"]');
        }
        ?>
      </div>
    </div>
  </div>
</section>

<!-- Sección 2: Todas las noticias -->
<section class="bg-gray-50 py-4 relative">
  <div class="container mx-auto px-4 relative">
    <h2 class="text-3xl md:text-4xl font-bold text-[#030D55] mb-8 text-left" style="font-family: 'Playfair Display', serif;">
      Todas las noticias
    </h2>
    
    <!-- Filtros y Búsqueda AJAX -->
    <div class="kintsugi-filters-container mb-8" style="background-color: #f8f6ff !important; padding: 20px !important; border-radius: 8px !important; margin-bottom: 30px !important;">
      <div class="flex flex-wrap items-center gap-4">
        <div class="search-container flex-grow" style="position: relative !important;">
          <label for="kintsugi-search-input" class="block mb-1 text-sm font-medium text-gray-700 md:hidden">Buscar</label>
          <div class="relative">
            <input type="text" id="kintsugi-search-input" placeholder="Buscar noticias..." class="w-full px-4 py-2 pl-10 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#362766]" style="border-color: #ddd !important; border-radius: 6px !important; padding: 10px 15px 10px 40px !important;">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
              </svg>
            </div>
          </div>
        </div>
        
        <div class="filter-container">
          <label for="kintsugi-year-filter" class="block mb-1 text-sm font-medium text-gray-700 md:hidden">Año</label>
          <select id="kintsugi-year-filter" class="px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#362766]" style="border-color: #ddd !important; border-radius: 6px !important; padding: 10px 15px !important;">
            <option value="all">Todos los años</option>
            <?php 
              // Generar opciones para los últimos 5 años
              $currentYear = date('Y');
              for ($i = 0; $i <= 4; $i++) {
                $year = $currentYear - $i;
                echo '<option value="' . $year . '">' . $year . '</option>';
              }
            ?>
          </select>
        </div>
        
        <div class="sort-container">
          <label for="kintsugi-sort-filter" class="block mb-1 text-sm font-medium text-gray-700 md:hidden">Ordenar por</label>
          <select id="kintsugi-sort-filter" class="px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#362766]" style="border-color: #ddd !important; border-radius: 6px !important; padding: 10px 15px !important;">
            <option value="date-desc">Más recientes primero</option>
            <option value="date-asc">Más antiguos primero</option>
            <option value="title-asc">Título (A-Z)</option>
            <option value="title-desc">Título (Z-A)</option>
          </select>
        </div>
      </div>
    </div>
        
    <!-- Contenedor para el contenido AJAX -->
    <div id="kintsugi-noticias-ajax-container" style="position: relative;">
      <!-- Añadimos estilos inline para forzar dos columnas -->
      <style>
        .kintsugi-noticias-grid {
          display: grid !important;
          grid-template-columns: repeat(1, 1fr) !important;
          gap: 20px !important;
          margin-bottom: 30px !important;
        }

        @media (min-width: 640px) {
          .kintsugi-noticias-grid {
            grid-template-columns: repeat(2, 1fr) !important;
          }
        }

        .kintsugi-noticia-item {
          position: relative !important;
          border-radius: 8px !important;
          overflow: hidden !important;
          box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1) !important;
          height: 100% !important;
          background-color: #fff !important;
          border: 1px solid rgba(54, 39, 102, 0.1) !important;
          transition: transform 0.3s, box-shadow 0.3s !important;
          margin-bottom: 0 !important; /* Anulamos el margen inferior para que grid-gap maneje el espaciado */
        }
        
        .kintsugi-noticia-image, .kintsugi-noticia-video {
          height: 200px !important;
          overflow: hidden !important;
        }
        
        .kintsugi-noticia-content {
          padding: 15px !important;
          position: relative !important;
          z-index: 2 !important;
        }
      </style>
      
      <!-- Shortcode para todas las noticias con buscador y paginación - mostrando 4 por página (2x2) -->
      {!! do_shortcode('[administracion_noticias per_page="4"]') !!}
    </div>
  </div>
</section>

<!-- Sección para contenido de Elementor -->
<section class="elementor-section">
  <div class="elementor-container">
    @php the_content(); @endphp
  </div>
</section>

</div>

<!-- Cargar Swiper JS desde CDN -->
<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

<!-- JavaScript para depuración y verificación -->
<script>
// Verificar la disponibilidad de jQuery
document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM cargado. Verificando jQuery...');
    if (typeof jQuery === 'undefined') {
        console.error('jQuery NO está disponible');
    } else {
        console.log('jQuery está disponible. Versión:', jQuery.fn.jquery);
        
        // Verificar la estructura del carrusel
        var $carouselContainer = jQuery('[class*="kintsugi-carousel"]');
        console.log('Contenedores de carrusel encontrados:', $carouselContainer.length);
        $carouselContainer.each(function(i) {
            console.log('Estructura del carrusel #' + i + ':', jQuery(this).attr('class'));
            console.log('ID del carrusel #' + i + ':', jQuery(this).attr('id'));
            console.log('Slides encontrados en carrusel #' + i + ':', jQuery(this).find('.swiper-slide, [class*="carousel-slide"]').length);
        });
    }
});
</script>

<!-- JavaScript para AJAX de filtrado -->
<script>
// Pass AJAX parameters to our script
var kintsugi_ajax = {
  ajax_url: '<?php echo admin_url('admin-ajax.php'); ?>',
  nonce: '<?php echo wp_create_nonce('kintsugi_ajax_nonce'); ?>'
};

/**
 * Custom JavaScript for Prensa page
 * Handles AJAX search, filtering, and sorting of news items
 */
(function($) {
    'use strict';

    // Initialize when document is ready
    $(document).ready(function() {
        initNoticiasFilters();
        initKintsugiCarousel();
        
        // Eliminar popups de video duplicados
        if ($('.kintsugi-video-popup').length > 1) {
            $('.kintsugi-video-popup:not(:first)').remove();
        }
        
        // Nueva función para aplicar estilos inline a elementos del plugin
        function applyInlineStyles() {
            console.log('Aplicando estilos inline a elementos generados dinámicamente');
            
            // Aplicar estilos a elementos del carrusel
            $('.kintsugi-carousel-slide').attr('style', 'position: relative !important; border-radius: 8px !important; overflow: hidden !important; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1) !important; height: 400px !important; transition: transform 0.3s, box-shadow 0.3s !important; background-color: #fff !important; border: 1px solid rgba(54, 39, 102, 0.1) !important;');
            
            $('.kintsugi-carousel-image').attr('style', 'height: 200px !important; overflow: hidden !important;');
            $('.kintsugi-carousel-image img').attr('style', 'width: 100% !important; height: 100% !important; object-fit: cover !important; transition: transform 0.5s !important;');
            
            $('.kintsugi-carousel-content').attr('style', 'padding: 15px !important; position: relative !important; z-index: 2 !important;');
            $('.kintsugi-carousel-title').attr('style', 'margin: 0 0 8px !important; font-size: 18px !important; font-weight: 700 !important; color: #030D55 !important; line-height: 1.3 !important; font-family: "Playfair Display", serif !important;');
            $('.kintsugi-carousel-excerpt').attr('style', 'font-size: 14px !important; color: #4a4a4a !important; line-height: 1.5 !important;');
            
            $('.kintsugi-carousel-date').attr('style', 'position: absolute !important; top: 10px !important; right: 10px !important; background: rgba(54, 39, 102, 0.8) !important; color: #fff !important; padding: 4px 8px !important; border-radius: 4px !important; font-size: 12px !important; z-index: 5 !important;');
            $('.kintsugi-carousel-overlay').attr('style', 'position: absolute !important; inset: 0 !important; background: linear-gradient(to bottom, rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, 0.7) 100%) !important; z-index: 1 !important;');
            
            // Aplicar estilos a los botones de reproducción de video
            $('.kintsugi-carousel-play, .kintsugi-noticia-video-play').attr('style', 'position: absolute !important; top: 50% !important; left: 50% !important; transform: translate(-50%, -50%) !important; width: 60px !important; height: 60px !important; background-color: rgba(54, 39, 102, 0.8) !important; border-radius: 50% !important; display: flex !important; align-items: center !important; justify-content: center !important; z-index: 3 !important; cursor: pointer !important;');
            
            // Crear triángulo de reproducción
            $('.kintsugi-carousel-play, .kintsugi-noticia-video-play').each(function() {
                if (!$(this).find('.play-triangle').length) {
                    $(this).html('<div class="play-triangle" style="width: 0 !important; height: 0 !important; border-top: 12px solid transparent !important; border-bottom: 12px solid transparent !important; border-left: 18px solid white !important; margin-left: 5px !important;"></div>');
                }
            });
            
            // Aplicar estilos a elementos de noticias
            $('.kintsugi-noticia-item').attr('style', 'position: relative !important; border-radius: 8px !important; overflow: hidden !important; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1) !important; height: 100% !important; background-color: #fff !important; border: 1px solid rgba(54, 39, 102, 0.1) !important; transition: transform 0.3s, box-shadow 0.3s !important; margin-bottom: 20px !important;');
            
            $('.kintsugi-noticia-image, .kintsugi-noticia-video').attr('style', 'height: 200px !important; overflow: hidden !important;');
            $('.kintsugi-noticia-img').attr('style', 'width: 100% !important; height: 100% !important; object-fit: cover !important; transition: transform 0.5s !important;');
            
            $('.kintsugi-noticia-content').attr('style', 'padding: 15px !important; position: relative !important; z-index: 2 !important;');
            $('.kintsugi-noticia-title').attr('style', 'margin: 0 0 8px !important; font-size: 18px !important; font-weight: 700 !important; color: #030D55 !important; line-height: 1.3 !important; font-family: "Playfair Display", serif !important;');
            $('.kintsugi-noticia-excerpt').attr('style', 'font-size: 14px !important; color: #4a4a4a !important; line-height: 1.5 !important;');
            
            $('.kintsugi-noticia-date').attr('style', 'position: absolute !important; top: 10px !important; right: 10px !important; background: rgba(54, 39, 102, 0.8) !important; color: #fff !important; padding: 4px 8px !important; border-radius: 4px !important; font-size: 12px !important; z-index: 5 !important;');
            $('.kintsugi-noticia-overlay').attr('style', 'position: absolute !important; inset: 0 !important; background: linear-gradient(to bottom, rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, 0.7) 100%) !important; z-index: 1 !important;');
            
            // Aplicar estilos a la paginación
            $('.kintsugi-noticias-pagination').attr('style', 'display: flex !important; justify-content: center !important; margin-top: 30px !important;');
            $('.kintsugi-noticias-pagination .page-numbers').attr('style', 'display: inline-flex !important; align-items: center !important; justify-content: center !important; width: 36px !important; height: 36px !important; margin: 0 3px !important; border-radius: 4px !important; border: 1px solid #ddd !important; color: #4a4a4a !important; text-decoration: none !important; transition: all 0.3s !important; font-weight: 500 !important;');
            $('.kintsugi-noticias-pagination .page-numbers.current').attr('style', 'background-color: #030D55 !important; border-color: #030D55 !important; color: white !important; display: inline-flex !important; align-items: center !important; justify-content: center !important; width: 36px !important; height: 36px !important; margin: 0 3px !important; border-radius: 4px !important;');
            $('.kintsugi-noticias-pagination .prev, .kintsugi-noticias-pagination .next').attr('style', 'width: auto !important; padding: 0 12px !important; display: inline-flex !important; align-items: center !important; justify-content: center !important; height: 36px !important; margin: 0 3px !important; border-radius: 4px !important; border: 1px solid #ddd !important; color: #4a4a4a !important; text-decoration: none !important; transition: all 0.3s !important;');
        }
        
        // Aplicar estilos ahora y después de cada carga de AJAX
        applyInlineStyles();
        
        // Monitorear cambios en el DOM para aplicar estilos a nuevos elementos
        const observer = new MutationObserver(function(mutations) {
            mutations.forEach(function(mutation) {
                if (mutation.addedNodes.length) {
                    // Aplicar estilos nuevamente
                    setTimeout(applyInlineStyles, 100);
                }
            });
        });
        
        // Configurar el observador para observar cambios en el contenedor AJAX
        observer.observe(document.getElementById('kintsugi-noticias-ajax-container'), {
            childList: true,
            subtree: true
        });
    });

    function initNoticiasFilters() {
        // DOM elements
        const $searchInput = $('#kintsugi-search-input');
        const $yearFilter = $('#kintsugi-year-filter');
        const $sortFilter = $('#kintsugi-sort-filter');
        const $container = $('#kintsugi-noticias-ajax-container');
        
        // Debounce function to limit how often the search is executed
        function debounce(func, wait) {
            let timeout;
            return function() {
                const context = this;
                const args = arguments;
                clearTimeout(timeout);
                timeout = setTimeout(() => {
                    func.apply(context, args);
                }, wait);
            };
        }
        
        // Function to load filtered content
        function loadFilteredContent() {
            // Get current filter values
            const searchQuery = $searchInput.val().trim();
            const yearFilter = $yearFilter.val();
            const sortOrder = $sortFilter.val();
            
            // Show loading state
            $container.addClass('loading');
            $container.append('<div class="kintsugi-loading"><div class="spinner"></div><p>Cargando noticias...</p></div>');
            
            // Make AJAX request
            $.ajax({
                url: kintsugi_ajax.ajax_url,
                type: 'POST',
                data: {
                    action: 'kintsugi_filter_noticias',
                    search: searchQuery,
                    year: yearFilter,
                    sort: sortOrder,
                    nonce: kintsugi_ajax.nonce
                },
                success: function(response) {
                    // Replace content with AJAX response
                    $container.html(response);
                    
                    // Initialize any video links in the new content
                    if (typeof window.initKintsugiPublic === 'function') {
                        window.initKintsugiPublic();
                    }
                    
                    // Scroll to container top with offset
                    $('html, body').animate({
                        scrollTop: $container.offset().top - 100
                    }, 300);
                },
                error: function() {
                    $container.html('<div class="kintsugi-error">Hubo un error al cargar las noticias. Por favor intenta de nuevo.</div>');
                },
                complete: function() {
                    $container.removeClass('loading');
                    $('.kintsugi-loading').remove();
                }
            });
        }
        
        // Debounced search function (300ms delay)
        const debouncedSearch = debounce(loadFilteredContent, 300);
        
        // Event listeners
        $searchInput.on('input', debouncedSearch);
        $yearFilter.on('change', loadFilteredContent);
        $sortFilter.on('change', loadFilteredContent);
        
        // Handle pagination clicks
        $(document).on('click', '.kintsugi-noticias-pagination a.page-numbers', function(e) {
            e.preventDefault();
            
            // Extract page number from URL
            const href = $(this).attr('href');
            const page = href.match(/page\/(\d+)/) || href.match(/paged=(\d+)/);
            const pageNum = page ? page[1] : 1;
            
            // Get current filter values
            const searchQuery = $searchInput.val().trim();
            const yearFilter = $yearFilter.val();
            const sortOrder = $sortFilter.val();
            
            // Show loading state
            $container.addClass('loading');
            $container.append('<div class="kintsugi-loading"><div class="spinner"></div><p>Cargando noticias...</p></div>');
            
            // Make AJAX request for pagination
            $.ajax({
                url: kintsugi_ajax.ajax_url,
                type: 'POST',
                data: {
                    action: 'kintsugi_filter_noticias',
                    search: searchQuery,
                    year: yearFilter,
                    sort: sortOrder,
                    paged: pageNum,
                    nonce: kintsugi_ajax.nonce
                },
                success: function(response) {
                    $container.html(response);
                    
                    // Initialize any video links in the new content
                    if (typeof window.initKintsugiPublic === 'function') {
                        window.initKintsugiPublic();
                    }
                    
                    // Scroll to container top with offset
                    $('html, body').animate({
                        scrollTop: $container.offset().top - 100
                    }, 300);
                },
                error: function() {
                    $container.html('<div class="kintsugi-error">Hubo un error al cargar las noticias. Por favor intenta de nuevo.</div>');
                },
                complete: function() {
                    $container.removeClass('loading');
                    $('.kintsugi-loading').remove();
                }
            });
        });
    }
})(jQuery);
</script>

<!-- Script para inicializar el carrusel -->
<script>
document.addEventListener('DOMContentLoaded', function() {
  // Forzar la actualización del carrusel después de que el contenido esté cargado
  setTimeout(function() {
    if (typeof window.initKintsugiCarousel === 'function') {
      console.log('Inicializando kintsugi-carousel tras carga completa');
      window.initKintsugiCarousel();
      
      // Forzar comportamiento de múltiples slides
      var swiperElement = document.querySelector('#kintsugi-carousel-main');
      if (swiperElement && swiperElement.swiper) {
        swiperElement.swiper.params.slidesPerView = window.innerWidth >= 992 ? 3 : (window.innerWidth >= 640 ? 2 : 1);
        swiperElement.swiper.update();
        console.log('Carrusel actualizado: slidesPerView =', swiperElement.swiper.params.slidesPerView);
      }
    }
  }, 1000);
});
</script>

<!-- Estilos adicionales para mejorar la apariencia del carrusel -->
<style>
  /* Mejoras al carrusel */
  .kintsugi-carousel-container {
    overflow: visible !important;
    padding-bottom: 60px !important;
  }
  
  .kintsugi-carousel-slide {
    transition: all 0.3s ease !important;
    border-radius: 12px !important;
    overflow: hidden !important;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08) !important;
    height: 420px !important;
  }
  
  .kintsugi-carousel-slide:hover {
    transform: translateY(-10px) !important;
    box-shadow: 0 15px 30px rgba(54, 39, 102, 0.15) !important;
  }
  
  .kintsugi-carousel-image {
    height: 220px !important;
    position: relative !important;
    overflow: hidden !important;
  }
  
  .kintsugi-carousel-image img {
    transition: transform 0.5s ease !important;
  }
  
  .kintsugi-carousel-slide:hover .kintsugi-carousel-image img {
    transform: scale(1.05) !important;
  }
  
  .kintsugi-carousel-play, .kintsugi-noticia-video-play {
    background-color: rgba(54, 39, 102, 0.9) !important;
    width: 70px !important;
    height: 70px !important;
    border-radius: 50% !important;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.2) !important;
    transition: transform 0.3s ease, background-color 0.3s ease !important;
  }
  
  .kintsugi-carousel-play:hover, .kintsugi-noticia-video-play:hover {
    transform: translate(-50%, -50%) scale(1.1) !important;
    background-color: #362766 !important;
  }
  
  /* Mejoras a la paginación */
  .swiper-pagination-bullet {
    width: 14px !important;
    height: 14px !important;
    opacity: 0.6 !important;
    transition: all 0.3s ease !important;
  }
  
  .swiper-pagination-bullet-active {
    opacity: 1 !important;
    width: 16px !important;
    height: 16px !important;
  }
  
  /* Asegurar que las noticias siempre se muestren en grid correcto, incluso después de búsquedas */
  .kintsugi-noticias-grid {
    display: grid !important;
    grid-template-columns: repeat(1, 1fr) !important;
    gap: 20px !important;
    margin-bottom: 30px !important;
    width: 100% !important;
  }

  @media (min-width: 640px) {
    .kintsugi-noticias-grid {
      grid-template-columns: repeat(2, 1fr) !important;
    }
  }
  
  /* Corregir cualquier margen que pueda causar desalineación */
  .container {
    padding-left: 1rem !important;
    padding-right: 1rem !important;
    max-width: 1280px !important;
    margin-left: auto !important;
    margin-right: auto !important;
    width: 100% !important;
  }
  
  /* Asegurar que el contenido esté centrado */
  #kintsugi-noticias-ajax-container {
    display: flex !important;
    flex-direction: column !important;
    align-items: center !important;
    width: 100% !important;
  }
  
  /* Estilos específicos para el modo de búsqueda */
  .kintsugi-noticia-item {
    width: 100% !important;
    margin-bottom: 20px !important;
  }
  
  /* Asegurar que el video popup funcione correctamente */
  .kintsugi-video-popup {
    display: none !important; /* Oculto por defecto */
    position: fixed !important;
    top: 0 !important;
    left: 0 !important;
    right: 0 !important;
    bottom: 0 !important;
    background-color: rgba(0, 0, 0, 0.9) !important;
    z-index: 999999 !important;
    justify-content: center !important;
    align-items: center !important;
  }
  
  .kintsugi-video-popup.active {
    display: flex !important;
  }
  
  .kintsugi-video-popup-container {
    position: relative !important;
    width: 90% !important;
    max-width: 900px !important;
    max-height: 80vh !important;
    background: #000 !important;
    border-radius: 8px !important;
    overflow: hidden !important;
    box-shadow: 0 0 30px rgba(0, 0, 0, 0.5) !important;
  }
  
  .kintsugi-video-popup-content {
    position: relative !important;
    padding-bottom: 56.25% !important;
    height: 0 !important;
    overflow: hidden !important;
  }
  
  .kintsugi-video-popup iframe {
    position: absolute !important;
    top: 0 !important;
    left: 0 !important;
    width: 100% !important;
    height: 100% !important;
    border: none !important;
  }
  
  /* Mejorar la visibilidad del botón de cierre */
  .kintsugi-video-popup-close {
    position: absolute !important;
    top: 10px !important;
    right: 10px !important;
    background: rgba(0, 0, 0, 0.7) !important;
    color: white !important;
    font-size: 24px !important;
    font-weight: bold !important;
    width: 40px !important;
    height: 40px !important;
    border: none !important;
    border-radius: 50% !important;
    cursor: pointer !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    z-index: 1000001 !important;
    transition: transform 0.3s ease, background-color 0.3s ease !important;
  }
  
  .kintsugi-video-popup-close:hover {
    background-color: rgba(255, 0, 0, 0.7) !important;
    transform: rotate(90deg) !important;
  }
</style>

<!-- JavaScript para garantizar grid de dos columnas incluso después de AJAX -->
<script>
document.addEventListener('DOMContentLoaded', function() {
  // Observer para monitorear cambios en el contenedor AJAX
  const observer = new MutationObserver(function(mutations) {
    mutations.forEach(function(mutation) {
      if (mutation.addedNodes.length) {
        enforceGridLayout();
      }
    });
  });
  
  // Función para forzar el layout de grid
  function enforceGridLayout() {
    const container = document.getElementById('kintsugi-noticias-ajax-container');
    if (!container) return;
    
    // Asegurarse de que las noticias estén en un contenedor grid
    const noticiasGrids = container.querySelectorAll('.kintsugi-noticias-grid');
    if (noticiasGrids.length === 0) {
      // Si no hay grid, envolver las noticias en uno
      const noticiaItems = container.querySelectorAll('.kintsugi-noticia-item');
      if (noticiaItems.length > 0) {
        const gridContainer = document.createElement('div');
        gridContainer.className = 'kintsugi-noticias-grid';
        
        // Rodear cada noticia con el div grid
        noticiaItems.forEach(item => {
          const parent = item.parentNode;
          if (parent !== gridContainer) {
            gridContainer.appendChild(item);
          }
        });
        
        // Limpiar el contenedor y agregar el nuevo grid
        while (container.firstChild) {
          container.removeChild(container.firstChild);
        }
        container.appendChild(gridContainer);
        
        // Agregar la paginación si existía
        const pagination = document.querySelector('.kintsugi-noticias-pagination');
        if (pagination) {
          container.appendChild(pagination);
        }
      }
    }
    
    // Aplicar estilos inline a cada elemento para forzar el layout
    const allGrids = document.querySelectorAll('.kintsugi-noticias-grid');
    allGrids.forEach(grid => {
      grid.setAttribute('style', 'display: grid !important; grid-template-columns: repeat(1, 1fr) !important; gap: 20px !important; width: 100% !important;');
      
      // Aplicar media query manualmente
      if (window.innerWidth >= 640) {
        grid.setAttribute('style', 'display: grid !important; grid-template-columns: repeat(2, 1fr) !important; gap: 20px !important; width: 100% !important;');
      }
    });
  }
  
  // Inicial check
  enforceGridLayout();
  
  // Configurar el observer
  const container = document.getElementById('kintsugi-noticias-ajax-container');
  if (container) {
    observer.observe(container, {
      childList: true,
      subtree: true
    });
  }
  
  // También ejecutar cuando cambie el tamaño de la ventana
  window.addEventListener('resize', enforceGridLayout);
});
</script>
@endsection