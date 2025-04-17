{{--
  Template Name: Prensa
--}}

@extends('layouts.app')

@section('content')
<!-- Cargar jQuery primero -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

<!-- Cargar hoja de estilos de Swiper desde CDN -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css">

<!-- Estilos específicos de la página -->
<style>
/* Swiper Carousel Basic Styles */
.swiper-container {
  margin-left: auto !important;
  margin-right: auto !important;
  position: relative !important;
  overflow: hidden !important;
  list-style: none !important;
  padding: 0 !important;
  z-index: 1 !important;
}

.swiper-wrapper {
  position: relative !important;
  width: 100% !important;
  height: 100% !important;
  z-index: 1 !important;
  display: flex !important;
  transition-property: transform !important;
  box-sizing: content-box !important;
}

.swiper-slide {
  flex-shrink: 0 !important;
  width: 100% !important;
  height: 100% !important;
  position: relative !important;
  transition-property: transform !important;
}

.swiper-pagination {
  position: absolute;
  text-align: center;
  transition: 300ms opacity;
  transform: translate3d(0, 0, 0);
  z-index: 10;
}

.swiper-pagination-bullet {
  width: 8px;
  height: 8px;
  display: inline-block;
  border-radius: 100%;
  background: #000;
  opacity: 0.2;
  margin: 0 4px;
}

.swiper-pagination-bullet-active {
  opacity: 1;
  background: #007aff;
}

/**
 * Theme-specific styles for the Prensa page
 */

/* Enhance the appearance of news items to match the ikintsugi theme */
.kintsugi-noticia-item,
.kintsugi-noticia-reciente-item,
.kintsugi-carousel-slide {
  border: 1px solid rgba(54, 39, 102, 0.1);
  transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
}

.kintsugi-noticia-item:hover,
.kintsugi-noticia-reciente-item:hover,
.kintsugi-carousel-slide:hover {
  border-color: rgba(54, 39, 102, 0.3);
}

/* Make titles match the theme's typography */
.kintsugi-noticia-title,
.kintsugi-carousel-title {
  font-family: 'Playfair Display', serif;
  color: #030D55;
}

/* Custom styling for the filters section */
.kintsugi-filters-container {
  background-color: #f8f6ff;
  padding: 20px;
  border-radius: 8px;
  margin-bottom: 30px;
}

.kintsugi-filters-container input,
.kintsugi-filters-container select {
  border-color: #ddd;
  border-radius: 6px;
  padding: 10px 15px;
}

.kintsugi-filters-container input:focus,
.kintsugi-filters-container select:focus {
  border-color: #362766;
  box-shadow: 0 0 0 3px rgba(54, 39, 102, 0.15);
}

/* Custom styling for search container */
.search-container {
  position: relative;
}

/* Custom styles for the carousel section */
.kintsugi-carousel-wrapper {
  padding: 30px 0;
}

.kintsugi-carousel-container {
  box-shadow: 0 10px 30px rgba(3, 13, 85, 0.1);
}

/* Enhance swipe indicators */
.swipe-indicator {
  padding: 5px 10px;
  background-color: #f5f5f5;
  border-radius: 20px;
}

/* Enhance the video popup for better UX */
.kintsugi-video-popup-inner {
  box-shadow: 0 10px 40px rgba(0, 0, 0, 0.4);
}

.kintsugi-video-popup-close {
  background-color: rgba(54, 39, 102, 0.8);
  width: 40px;
  height: 40px;
  line-height: 40px;
  border-radius: 50%;
  top: -50px;
  right: -10px;
  transition: background-color 0.3s, transform 0.3s;
}

.kintsugi-video-popup-close:hover {
  background-color: rgba(54, 39, 102, 1);
}

/* Adjust pagination to match theme style */
.kintsugi-noticias-pagination .page-numbers {
  font-weight: 500;
}

.kintsugi-noticias-pagination .page-numbers.current {
  background-color: #030D55;
  border-color: #030D55;
}

/* Add responsive adjustments */
@media (max-width: 767px) {
  .kintsugi-filters-container .flex-wrap {
    flex-direction: column;
    gap: 15px;
  }
  
  .kintsugi-filters-container .search-container,
  .kintsugi-filters-container .filter-container,
  .kintsugi-filters-container .sort-container {
    width: 100%;
  }
  
  .kintsugi-noticia-title,
  .kintsugi-carousel-title {
    font-size: 16px;
  }
}

/* Enhanced animation for video play buttons */
@keyframes pulse {
  0% {
    box-shadow: 0 0 0 0 rgba(54, 39, 102, 0.7);
    transform: translate(-50%, -50%) scale(1);
  }
  70% {
    box-shadow: 0 0 0 15px rgba(54, 39, 102, 0);
    transform: translate(-50%, -50%) scale(1.1);
  }
  100% {
    box-shadow: 0 0 0 0 rgba(54, 39, 102, 0);
    transform: translate(-50%, -50%) scale(1);
  }
}

.kintsugi-noticia-video-play,
.kintsugi-carousel-play {
  animation: pulse 2s infinite;
}

/* Fix for the mobile view of the grid */
@media (max-width: 639px) {
  .kintsugi-noticias-grid,
  .kintsugi-noticias-recientes-grid {
    display: flex;
    flex-direction: column;
    gap: 20px;
  }
}

/* Loading state styles */
.kintsugi-noticias-ajax-container.loading {
  min-height: 300px;
  position: relative;
  opacity: 0.7;
}

.kintsugi-loading {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
  z-index: 10;
}

.kintsugi-loading .spinner {
  display: inline-block;
  width: 50px;
  height: 50px;
  border: 3px solid rgba(54, 39, 102, 0.3);
  border-radius: 50%;
  border-top-color: #362766;
  animation: spin 1s ease-in-out infinite;
  margin-bottom: 10px;
}

@keyframes spin {
  to { transform: rotate(360deg); }
}

.kintsugi-loading p {
  color: #362766;
  font-weight: 500;
}

/* Error message styling */
.kintsugi-error {
  background-color: #fff1f1;
  border-left: 4px solid #e53e3e;
  color: #c53030;
  padding: 12px 15px;
  margin-bottom: 20px;
  border-radius: 4px;
}

/* No results styling */
.kintsugi-noticias-no-results {
  background-color: #f8f9fa;
  padding: 30px;
  text-align: center;
  border-radius: 8px;
  color: #4a4a4a;
}

.kintsugi-noticias-no-results p {
  font-size: 18px;
  margin: 0;
}
</style>

<!-- Hero Section -->
<section class="relative bg-[#362766] overflow-hidden pt-20 md:pt-32">
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
  <div class="container mx-auto px-4 relative z-10 min-h-[500px] md:min-h-[110vh] flex flex-col justify-center items-center">
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
    <div id="kintsugi-carousel-main" class="swiper-container-custom kintsugi-carousel-container swiper">
      <div class="swiper-wrapper">
        <?php
        // Obtener las noticias marcadas para el carrusel
        $carousel_settings = get_option('kintsugi_carousel_noticias', array());
        $carousel_ids = isset($carousel_settings['noticias_ids']) ? $carousel_settings['noticias_ids'] : array();
        
        if (!empty($carousel_ids)) {
          // Si hay noticias seleccionadas, mostrar el carrusel con esas noticias específicas
          echo do_shortcode('[administracion_noticias_carrousel ids="' . implode(',', $carousel_ids) . '" count="6"]');
        } else {
          // Si no hay noticias seleccionadas, mostrar el carrusel normal con las más recientes
          echo do_shortcode('[administracion_noticias_carrousel count="6"]');
        }
        ?>
      </div>
      <!-- Añadimos manualmente los elementos de navegación y paginación -->
      <div class="swiper-pagination"></div>
      <div class="kintsugi-carousel-nav-prev"></div>
      <div class="kintsugi-carousel-nav-next"></div>
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
    <div class="kintsugi-filters-container mb-8">
      <div class="flex flex-wrap items-center gap-4">
        <div class="search-container flex-grow">
          <label for="kintsugi-search-input" class="block mb-1 text-sm font-medium text-gray-700 md:hidden">Buscar</label>
          <div class="relative">
            <input type="text" id="kintsugi-search-input" placeholder="Buscar noticias..." class="w-full px-4 py-2 pl-10 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#362766]">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
              </svg>
            </div>
          </div>
        </div>
        
        <div class="filter-container">
          <label for="kintsugi-year-filter" class="block mb-1 text-sm font-medium text-gray-700 md:hidden">Año</label>
          <select id="kintsugi-year-filter" class="px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#362766]">
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
          <select id="kintsugi-sort-filter" class="px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#362766]">
            <option value="date-desc">Más recientes primero</option>
            <option value="date-asc">Más antiguos primero</option>
            <option value="title-asc">Título (A-Z)</option>
            <option value="title-desc">Título (Z-A)</option>
          </select>
        </div>
      </div>
    </div>
        
    <!-- Contenedor para el contenido AJAX -->
    <div id="kintsugi-noticias-ajax-container">
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
(function($) {
    'use strict';
    
    $(document).ready(function() {
        initKintsugiCarousel();
    });
    
    function initKintsugiCarousel() {
        // También buscar div[class*="kintsugi-carousel"] para capturar todas las posibles variaciones
        if ($('[class*="kintsugi-carousel"]').length) {
            var swiperInstances = [];
            
            // Seleccionar cualquier div que pueda actuar como contenedor de carrusel
            $('[id*="kintsugi-carousel"], .kintsugi-carousel-container, .swiper, .swiper-container').each(function(index) {
                // Verificar si ya tiene un ID, de lo contrario asignarle uno
                var $container = $(this);
                var carouselId = $container.attr('id');
                if (!carouselId) {
                    carouselId = 'kintsugi-carousel-' + index;
                    $container.attr('id', carouselId);
                }
                
                // Check if this carousel is already initialized
                if ($container.hasClass('carousel-initialized')) {
                    return;
                }
                
                console.log('Inicializando carrusel con ID:', carouselId);
                
                // Verificar si hay un contenedor secundario de Swiper dentro
                var $swiperContainer = $container.find('.swiper-container');
                if ($swiperContainer.length > 0) {
                    console.log('Encontrado contenedor Swiper interno, usando éste para inicializar');
                    $container = $swiperContainer;
                    $container.attr('id', carouselId + '-inner');
                    carouselId = carouselId + '-inner';
                }
                
                // Verificar si ya tiene los elementos necesarios
                if ($container.find('.swiper-wrapper').length === 0) {
                    console.log('No se encontró .swiper-wrapper, creando estructura');
                    // Envolver el contenido en un wrapper si no existe
                    $container.wrapInner('<div class="swiper-wrapper"></div>');
                }
                
                // Verificar si hay slides
                var $slides = $container.find('.swiper-wrapper').children();
                if (!$slides.hasClass('swiper-slide')) {
                    console.log('Convirtiendo elementos en slides de Swiper');
                    $slides.addClass('swiper-slide');
                }
                
                // Añadir paginación y navegación si no existen
                if ($container.find('.swiper-pagination').length === 0) {
                    $container.append('<div class="swiper-pagination"></div>');
                }
                
                if ($container.find('.kintsugi-carousel-nav-prev').length === 0) {
                    $container.append('<div class="kintsugi-carousel-nav-prev"></div>');
                }
                
                if ($container.find('.kintsugi-carousel-nav-next').length === 0) {
                    $container.append('<div class="kintsugi-carousel-nav-next"></div>');
                }
                
                // Inicializar Swiper con opciones adaptadas
                var swiper = new Swiper('#' + carouselId, {
                    slidesPerView: 1,
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
                    breakpoints: {
                        768: {
                            slidesPerView: 2,
                            spaceBetween: 20,
                        },
                        992: {
                            slidesPerView: 3,
                            spaceBetween: 30,
                        },
                    },
                    on: {
                        init: function() {
                            $('#' + carouselId).addClass('carousel-initialized');
                            
                            // Garantizar que todas las imágenes tengan altura uniforme
                            $('.kintsugi-carousel-slide').css('height', '400px');
                            
                            // Garantizar que todas las imágenes se muestren correctamente
                            $('.kintsugi-carousel-image img').css({
                                'width': '100%',
                                'height': '100%',
                                'object-fit': 'cover'
                            });
                        }
                    }
                });
                
                swiperInstances.push(swiper);
            });
            
            // Guardar referencia global de instancias de Swiper
            window.kintsugiSwiperInstances = swiperInstances;
        }
        
        // Inicializar handlers de video
        $(document).on('click', '.kintsugi-carousel-video-link, .kintsugi-noticia-video-link', function(e) {
            e.preventDefault();
            
            var videoUrl = $(this).data('video-url');
            if (videoUrl) {
                openVideoPopup(videoUrl);
                
                // Pausar autoplay cuando se abre un video
                if (window.kintsugiSwiperInstances && window.kintsugiSwiperInstances.length) {
                    window.kintsugiSwiperInstances.forEach(function(swiper) {
                        if (swiper && swiper.autoplay) {
                            swiper.autoplay.stop();
                        }
                    });
                }
            }
            return false;
        });
        
        // Cerrar popup al hacer click en el botón o fondo
        $(document).on('click', '.kintsugi-video-popup-close, .kintsugi-video-popup', function(e) {
            if ($(e.target).is('.kintsugi-video-popup-close') || $(e.target).is('.kintsugi-video-popup')) {
                closeVideoPopup();
            }
        });
        
        // Cerrar popup con tecla Escape
        $(document).on('keyup', function(e) {
            if (e.key === 'Escape') {
                closeVideoPopup();
            }
        });
    }
    
    // Función para abrir el popup de video
    function openVideoPopup(videoUrl) {
        // Extraer ID de YouTube
        var videoId = extractYouTubeId(videoUrl);
        
        if (videoId) {
            // Crear URL para embeber
            var embedUrl = 'https://www.youtube.com/embed/' + videoId + '?autoplay=1&rel=0&modestbranding=1';
            
            // Establecer src del iframe
            $('.kintsugi-video-popup-content iframe').attr('src', embedUrl);
            
            // Mostrar popup
            $('.kintsugi-video-popup').addClass('active').fadeIn(300);
            
            // Agregar clase al body para prevenir scroll
            $('body').addClass('kintsugi-popup-open');
        }
    }
    
    // Función para extraer ID de YouTube
    function extractYouTubeId(url) {
        var regExp = /^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#&?]*).*/;
        var match = url.match(regExp);
        return (match && match[7].length === 11) ? match[7] : false;
    }
    
    // Función para cerrar el popup de video
    function closeVideoPopup() {
        // Limpiar src del iframe para detener el video
        $('.kintsugi-video-popup-content iframe').attr('src', '');
        
        // Ocultar popup
        $('.kintsugi-video-popup').removeClass('active').fadeOut(300);
        
        // Quitar clase del body
        $('body').removeClass('kintsugi-popup-open');
        
        // Reanudar autoplay de los carruseles
        if (window.kintsugiSwiperInstances && window.kintsugiSwiperInstances.length) {
            window.kintsugiSwiperInstances.forEach(function(swiper) {
                if (swiper && swiper.autoplay) {
                    swiper.autoplay.start();
                }
            });
        }
    }
})(jQuery);
</script>
@endsection