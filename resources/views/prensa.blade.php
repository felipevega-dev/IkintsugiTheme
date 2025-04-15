{{--
  Template Name: Prensa
--}}

@extends('layouts.app')

@section('content')
<!-- Agregar estilos CSS para el plugin Kintsugi Content Manager -->
<link rel="stylesheet" href="{{ site_url('/wp-content/plugins/kintsugi-content-manager/public/css/public.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css">

<!-- Estilos personalizados para ajustar el grid -->
<style>
  /* Asegurar que las noticias se muestran en 2 columnas en lugar de 3 */
  @media (min-width: 768px) {
    .kintsugi-noticias-grid {
      grid-template-columns: repeat(2, 1fr) !important;
      grid-gap: 30px !important;
    }
    
    /* Hacer que las noticias sean más anchas/horizontales */
    .kintsugi-noticia-item {
      max-width: 100% !important;
      display: flex !important;
      flex-direction: column !important;
      height: 100% !important;
      border-radius: 12px !important;
      overflow: hidden !important;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08) !important;
      transition: transform 0.3s ease, box-shadow 0.3s ease !important;
    }
    
    .kintsugi-noticia-item:hover {
      transform: translateY(-5px) !important;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12) !important;
    }
    
    .kintsugi-noticia-image,
    .kintsugi-noticia-video {
      height: 0 !important;
      padding-bottom: 56.25% !important; /* Proporción 16:9 para un aspecto más horizontal */
      position: relative !important;
      overflow: hidden !important;
    }
    
    .kintsugi-noticia-image img,
    .kintsugi-noticia-video img,
    .kintsugi-noticia-video-preview img {
      position: absolute !important;
      top: 0 !important;
      left: 0 !important;
      width: 100% !important;
      height: 100% !important;
      object-fit: cover !important;
      object-position: center !important; /* Centrar la imagen */
    }
    
    /* Ajustar el tamaño del contenedor del carrusel */
    .swiper-container-custom .swiper-slide {
      height: auto !important;
    }
    
    /* Mejorar la apariencia del carrusel para que se vea como unidad */
    .kintsugi-carousel-container {
      border: none !important;
      border-radius: 12px !important;
      padding: 15px !important;
      background: #f9f9f9 !important;
      box-shadow: 0 5px 15px rgba(0,0,0,0.05) !important;
      position: relative !important;
    }
    
    /* Añadir borde con gradiente */
    .kintsugi-carousel-container::before {
      content: "" !important;
      position: absolute !important;
      top: 0 !important;
      left: 0 !important;
      right: 0 !important;
      bottom: 0 !important;
      border-radius: 12px !important;
      padding: 2px !important; /* Grosor del borde */
      background: linear-gradient(180deg, rgba(171, 39, 122, 0.48) 0%, rgba(3, 13, 85, 0.48) 61%) !important;
      -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0) !important;
      -webkit-mask-composite: xor !important;
      mask-composite: exclude !important;
      pointer-events: none !important; /* Asegura que los eventos pasen a través del borde */
    }
    
    /* Añadir indicadores visuales para el carrusel */
    .kintsugi-carousel-nav-prev,
    .kintsugi-carousel-nav-next {
      background-color: rgba(54, 39, 102, 0.7) !important;
      color: white !important;
      width: 50px !important;
      height: 50px !important;
      border-radius: 50% !important;
      display: flex !important;
      align-items: center !important;
      justify-content: center !important;
      font-size: 24px !important;
      z-index: 10 !important;
      opacity: 0 !important;
      transition: opacity 0.3s ease !important;
      cursor: pointer !important;
      position: absolute !important;
    }
    
    .kintsugi-carousel-nav-prev:after {
      content: "\2039" !important;
      font-size: 30px !important;
    }
    
    .kintsugi-carousel-nav-next:after {
      content: "\203A" !important;
      font-size: 30px !important;
    }
    
    .kintsugi-carousel-container:hover .kintsugi-carousel-nav-prev,
    .kintsugi-carousel-container:hover .kintsugi-carousel-nav-next {
      opacity: 1 !important;
    }
    
    /* Mejorar la paginación */
    .swiper-pagination-bullet {
      width: 12px !important;
      height: 12px !important;
      background: #362766 !important;
      opacity: 0.5 !important;
      transition: all 0.3s ease !important;
    }
    
    .swiper-pagination-bullet-active {
      opacity: 1 !important;
      width: 30px !important;
      border-radius: 6px !important;
    }
    
    /* Pequeña animación para los slides */
    .swiper-slide-active {
      transform: scale(1.02) !important;
      transition: transform 0.5s ease !important;
      z-index: 2 !important;
    }
  }
  
  /* Animación del indicador de deslizamiento */
  .swipe-indicator {
    width: 40px;
    height: 20px;
    position: relative;
    overflow: hidden;
  }
  
  .left-indicator .swipe-indicator-dot {
    width: 6px;
    height: 6px;
    background-color: #362766;
    border-radius: 50%;
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    animation: swipeAnimationLeft 1.5s infinite ease-in-out;
  }
  
  .right-indicator .swipe-indicator-dot {
    width: 6px;
    height: 6px;
    background-color: #362766;
    border-radius: 50%;
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    animation: swipeAnimationRight 1.5s infinite ease-in-out;
  }
  
  @keyframes swipeAnimationLeft {
    0% {
      right: 0;
      opacity: 0;
    }
    20% {
      opacity: 1;
    }
    80% {
      opacity: 1;
    }
    100% {
      right: 100%;
      opacity: 0;
    }
  }
  
  @keyframes swipeAnimationRight {
    0% {
      left: 0;
      opacity: 0;
    }
    20% {
      opacity: 1;
    }
    80% {
      opacity: 1;
    }
    100% {
      left: 100%;
      opacity: 0;
    }
  }
  
  /* Fix para mostrar miniaturas de video en la cuadrícula 2x2 */
  .kintsugi-noticia-video-preview {
    position: relative !important;
    width: 100% !important;
    height: 100% !important;
    display: block !important;
    position: absolute !important;
    top: 0 !important;
    left: 0 !important;
    right: 0 !important;
    bottom: 0 !important;
  }
  
  /* Arreglar problema específico con los videos */
  .kintsugi-noticia-item a[data-video-url] .kintsugi-noticia-video {
    position: relative !important;
    height: 0 !important;
    padding-bottom: 56.25% !important;
    overflow: hidden !important;
    display: block !important;
  }
  
  .kintsugi-noticia-item a[data-video-url] .kintsugi-noticia-video .kintsugi-noticia-video-preview img {
    position: absolute !important;
    width: 100% !important;
    height: 100% !important;
    object-fit: cover !important;
    top: 0 !important;
    left: 0 !important;
  }
  
  .kintsugi-noticia-video-preview[data-video-id] {
    background-size: cover !important;
    background-position: center center !important;
  }
  
  .kintsugi-noticia-video-play {
    position: absolute !important;
    top: 50% !important;
    left: 50% !important;
    transform: translate(-50%, -50%) !important;
    width: 60px !important;
    height: 60px !important;
    background-color: rgba(54, 39, 102, 0.7) !important;
    border-radius: 50% !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    z-index: 5 !important;
  }
  
  .kintsugi-noticia-video-play:after {
    content: '' !important;
    width: 0 !important; 
    height: 0 !important;
    border-top: 12px solid transparent !important;
    border-bottom: 12px solid transparent !important;
    border-left: 20px solid white !important;
    margin-left: 5px !important;
  }
  
  /* Mejorar la responsividad en móvil */
  @media (max-width: 767px) {
    .kintsugi-noticias-grid {
      grid-template-columns: 1fr !important;
      grid-gap: 20px !important;
    }
    
    /* Asegurar que todas las noticias tengan la misma altura en móvil */
    .kintsugi-noticia-item {
      margin-bottom: 20px !important;
      max-width: 100% !important;
      display: flex !important;
      flex-direction: column !important;
      height: 100% !important;
      border-radius: 12px !important;
      overflow: hidden !important;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08) !important;
    }
    
    /* Forzar resolución horizontal para imágenes en móvil */
    .kintsugi-noticia-image,
    .kintsugi-noticia-video {
      height: 0 !important;
      padding-bottom: 56.25% !important; /* Proporción 16:9 para un aspecto más horizontal */
      position: relative !important;
      overflow: hidden !important;
      width: 100% !important;
    }
    
    .kintsugi-noticia-image img,
    .kintsugi-noticia-video img,
    .kintsugi-noticia-video-preview img {
      position: absolute !important;
      top: 0 !important;
      left: 0 !important;
      width: 100% !important;
      height: 100% !important;
      object-fit: cover !important;
      object-position: center !important;
    }
    
    /* Mejorar filtros en móvil */
    .kintsugi-filters-container {
      background: #f5f7fa !important;
      padding: 15px !important;
      border-radius: 10px !important;
      margin-bottom: 20px !important;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05) !important;
    }
    
    .kintsugi-filters-container .flex {
      flex-direction: column !important;
      gap: 10px !important;
    }
    
    .kintsugi-filters-container .search-container,
    .kintsugi-filters-container .filter-container,
    .kintsugi-filters-container .sort-container {
      width: 100% !important;
      margin-bottom: 10px !important;
    }
    
    .kintsugi-filters-container input,
    .kintsugi-filters-container select {
      width: 100% !important;
      padding: 12px !important;
      border-radius: 8px !important;
      border: 1px solid #e0e0e0 !important;
      font-size: 16px !important; /* Increase font size for mobile */
      -webkit-appearance: none !important; /* Fix for iOS */
    }
    
    .kintsugi-filters-container select {
      background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%23333' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E") !important;
      background-repeat: no-repeat !important;
      background-position: right 10px center !important;
      padding-right: 30px !important;
    }
    
    .kintsugi-carousel-container {
      padding: 10px !important;
      border-radius: 8px !important;
    }
    
    .kintsugi-carousel-slide {
      height: 350px !important;
    }
    
    .kintsugi-carousel-nav-prev,
    .kintsugi-carousel-nav-next {
      width: 40px !important;
      height: 40px !important;
      opacity: 0.7 !important;
    }
    
    .kintsugi-carousel-title {
      font-size: 16px !important;
    }
    
    .kintsugi-carousel-excerpt {
      font-size: 13px !important;
      -webkit-line-clamp: 2 !important;
      display: -webkit-box !important;
      -webkit-box-orient: vertical !important;
      overflow: hidden !important;
    }
    
    .swipe-indicator {
      width: 30px !important;
    }
    
    .swiper-pagination-bullet {
      width: 8px !important;
      height: 8px !important;
    }
    
    .swiper-pagination-bullet-active {
      width: 20px !important;
    }
    
    .kintsugi-noticia-content {
      padding: 15px !important;
    }
    
    .kintsugi-noticia-title {
      font-size: 16px !important;
      margin-bottom: 8px !important;
    }
    
    .kintsugi-noticia-date {
      font-size: 12px !important;
    }
    
    .kintsugi-noticia-excerpt {
      font-size: 13px !important;
      -webkit-line-clamp: 3 !important;
      display: -webkit-box !important;
      -webkit-box-orient: vertical !important;
      overflow: hidden !important;
    }
    
    .min-h-[500px] {
      min-height: 400px !important;
    }
    
    .text-5xl {
      font-size: 2.25rem !important; /* 36px */
      line-height: 2.5rem !important; /* 40px */
    }
    
    .text-xl {
      font-size: 1.125rem !important; /* 18px */
      line-height: 1.5rem !important; /* 24px */
    }
    
    .py-32 {
      padding-top: 4rem !important; /* 64px */
      padding-bottom: 4rem !important; /* 64px */
    }
  }
  
  /* Arreglar bug en Safari con tamaño de imágenes */
  .kintsugi-noticia-image,
  .kintsugi-noticia-video,
  .kintsugi-carousel-image {
    -webkit-transform: translateZ(0);
    transform: translateZ(0);
  }
  
  /* Fallback para videos cuando no carga la imagen */
  .kintsugi-noticia-item a[data-video-url] {
    position: relative !important;
    display: block !important;
    height: 100% !important;
    width: 100% !important;
  }
  
  .kintsugi-noticia-item a[data-video-url]::before {
    content: "" !important;
    display: block !important;
    position: absolute !important;
    top: 0 !important;
    left: 0 !important;
    width: 100% !important;
    height: 56.25% !important; /* Maintain 16:9 ratio */
    background-color: #362766 !important;
    z-index: 0 !important;
  }
  
  .kintsugi-noticia-item a[data-video-url] .kintsugi-noticia-video-preview {
    z-index: 1 !important;
  }
  
  .kintsugi-noticia-item a[data-video-url] .kintsugi-noticia-video-play {
    z-index: 2 !important;
  }

  /* Enfoque simple para el borde gradiente que funciona en todos los navegadores */
  .swiper-container-custom {
    padding: 0 !important;
    border-radius: 14px !important;
    background: linear-gradient(180deg, rgba(171, 39, 122, 0.48) 0%, rgba(3, 13, 85, 0.48) 61%) !important;
    position: relative !important;
  }

  .kintsugi-carousel-container {
    border: none !important;
    border-radius: 12px !important;  /* Ligeramente menor que el contenedor padre */
    margin: 2px !important;  /* Esto crea el "borde" de 2px */
    padding: 15px !important;
    background: #f9f9f9 !important;
    box-shadow: none !important; /* Quitar sombra para que no se sobreponga al borde */
    position: relative !important;
  }

  /* Borde con gradiente para móviles */
  @media (max-width: 767px) {
    .swiper-container-custom {
      padding: 0 !important;
      border-radius: 10px !important;
    }
    
    .kintsugi-carousel-container {
      border-radius: 8px !important;
      margin: 2px !important;
      padding: 10px !important;
    }
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
    <div class="swiper-container-custom">
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

<!-- Cargar scripts al final para mejor rendimiento -->
<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
<script src="{{ site_url('/wp-content/plugins/kintsugi-content-manager/public/js/public.js') }}"></script>
<script src="{{ site_url('/wp-content/plugins/kintsugi-content-manager/public/js/carousel.js') }}"></script>
<script>
  // Inicializar el carrusel manualmente después de que la página se haya cargado completamente
  jQuery(document).ready(function($) {
    // Fix para el video popup duplicado
    if ($('.kintsugi-video-popup').length > 1) {
      $('.kintsugi-video-popup:gt(0)').remove();
    }
    
    // Fix para asegurar que los thumbnails de videos se carguen correctamente
    $('.kintsugi-noticia-video-preview').each(function() {
      var $this = $(this);
      var videoId = $this.data('video-id');
      
      if (videoId) {
        // Intentar cargar imagen HD primero
        var hdImg = new Image();
        hdImg.onload = function() {
          $this.find('img').attr('src', this.src);
        };
        hdImg.onerror = function() {
          // Si falla, cargar imagen estándar
          $this.find('img').attr('src', 'https://img.youtube.com/vi/' + videoId + '/0.jpg');
        };
        hdImg.src = 'https://img.youtube.com/vi/' + videoId + '/maxresdefault.jpg';
        
        // Establece también un fondo de respaldo por si la imagen no carga
        $this.css('background-image', 'url(https://img.youtube.com/vi/' + videoId + '/0.jpg)');
      }
    });
    
    // Inicializar las funciones principales si existen
    if (typeof window.initKintsugiPublic === 'function') {
      window.initKintsugiPublic();
    }
    
    // Inicializar el carrusel con un pequeño retraso para asegurarse de que todos los elementos estén cargados
    setTimeout(function() {
      if (typeof window.initKintsugiCarousel === 'function') {
        // Reemplazar la inicialización estándar por una personalizada
        $('.kintsugi-carousel-container').each(function(index) {
          var $container = $(this);
          var carouselId = $container.attr('id');
          if (!carouselId) {
            carouselId = 'kintsugi-carousel-' + index;
            $container.attr('id', carouselId);
          }
          
          // Personalización específica para este sitio
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
                slidesPerView: 3, // Asegurar 3 slides en PC
                spaceBetween: 30,
              },
            }
          });
          
          // Guardar referencia global
          window.kintsugiSwiperInstances = window.kintsugiSwiperInstances || [];
          window.kintsugiSwiperInstances.push(swiper);
        });
      }
    }, 100);
    
    // Fix para asegurar que los puntos de navegación se muestren correctamente
    setTimeout(function() {
      $('.swiper-pagination').css('opacity', '1');
    }, 500);
    
    // AJAX Search & Filtering
    var ajaxUrl = '<?php echo admin_url('admin-ajax.php'); ?>';
    var searchTimer;
    var currentPage = 1;
    
    // Handle search input with debounce
    $('#kintsugi-search-input').on('input', function() {
      clearTimeout(searchTimer);
      searchTimer = setTimeout(function() {
        currentPage = 1;
        fetchFilteredResults();
      }, 500);
    });
    
    // Handle year filter
    $('#kintsugi-year-filter').on('change', function() {
      currentPage = 1;
      fetchFilteredResults();
    });
    
    // Handle sort filter
    $('#kintsugi-sort-filter').on('change', function() {
      currentPage = 1;
      fetchFilteredResults();
    });
    
    // Handle pagination clicks
    $(document).on('click', '.kintsugi-noticias-pagination a.page-numbers', function(e) {
      e.preventDefault();
      var href = $(this).attr('href');
      var page = getParameterByName('paged', href) || 1;
      currentPage = parseInt(page);
      fetchFilteredResults();
      
      // Scroll to top of results
      $('html, body').animate({
        scrollTop: $('#kintsugi-noticias-ajax-container').offset().top - 100
      }, 300);
    });
    
    // Function to get URL parameters
    function getParameterByName(name, url) {
      if (!url) url = window.location.href;
      name = name.replace(/[\[\]]/g, '\\$&');
      var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
          results = regex.exec(url);
      if (!results) return null;
      if (!results[2]) return '';
      return decodeURIComponent(results[2].replace(/\+/g, ' '));
    }
    
    // Function to fetch filtered results
    function fetchFilteredResults() {
      var searchQuery = $('#kintsugi-search-input').val();
      var yearFilter = $('#kintsugi-year-filter').val();
      var sortFilter = $('#kintsugi-sort-filter').val();
      
      // Show loading state
      $('#kintsugi-noticias-ajax-container').html('<div class="text-center py-8"><div class="inline-block animate-spin rounded-full h-8 w-8 border-b-2 border-[#362766]"></div><p class="mt-2 text-gray-600">Cargando...</p></div>');
      
      // Parse sort filter
      var orderby = 'date';
      var order = 'DESC';
      
      if (sortFilter === 'date-asc') {
        orderby = 'date';
        order = 'ASC';
      } else if (sortFilter === 'title-asc') {
        orderby = 'title';
        order = 'ASC';
      } else if (sortFilter === 'title-desc') {
        orderby = 'title';
        order = 'DESC';
      }
      
      // Make AJAX request
      $.ajax({
        url: ajaxUrl,
        type: 'POST',
        data: {
          action: 'kintsugi_filter_noticias',
          search: searchQuery,
          year: yearFilter,
          orderby: orderby,
          order: order,
          paged: currentPage,
          per_page: 4 // Match the shortcode
        },
        success: function(response) {
          $('#kintsugi-noticias-ajax-container').html(response);
          
          // Reinitialize any needed scripts
          if (typeof window.initKintsugiPublic === 'function') {
            window.initKintsugiPublic();
          }
          
          // Highlight the active page in pagination
          $('.kintsugi-noticias-pagination .page-numbers').removeClass('current');
          $('.kintsugi-noticias-pagination .page-numbers').each(function() {
            var pageNum = parseInt($(this).text());
            if (pageNum === currentPage) {
              $(this).addClass('current');
            }
          });
        },
        error: function() {
          $('#kintsugi-noticias-ajax-container').html('<div class="p-4 bg-red-100 text-red-700 rounded">Error al cargar las noticias. Por favor, inténtalo de nuevo.</div>');
        }
      });
    }
  });
</script>

<!-- Estilo adicional para asegurar que la paginación sea visible -->
<style>
  .kintsugi-noticias-pagination {
    display: flex !important;
    justify-content: center !important;
    margin-top: 30px !important;
  }
  
  .kintsugi-noticias-pagination .page-numbers {
    display: inline-flex !important;
    align-items: center !important;
    justify-content: center !important;
    min-width: 40px !important;
    height: 40px !important;
    padding: 0 12px !important;
    margin: 0 5px !important;
    border-radius: 4px !important;
    background-color: #f5f5f5 !important;
    color: #333 !important;
    text-decoration: none !important;
    transition: all 0.3s ease !important;
  }
  
  .kintsugi-noticias-pagination .page-numbers.current {
    background-color: #362766 !important;
    color: #fff !important;
  }
  
  .kintsugi-noticias-pagination .page-numbers:hover:not(.current) {
    background-color: #e0e0e0 !important;
  }
  
  /* Mostrar spinner de carga */
  @keyframes spin {
    from {
      transform: rotate(0deg);
    }
    to {
      transform: rotate(360deg);
    }
  }
  
  .animate-spin {
    animation: spin 1s linear infinite;
  }


<!-- Hero section responsividad -->
@media (max-width: 767px) {
  .min-h-[500px] {
    min-height: 400px !important;
  }
  
  .text-5xl {
    font-size: 2.25rem !important; /* 36px */
    line-height: 2.5rem !important; /* 40px */
  }
  
  .text-xl {
    font-size: 1.125rem !important; /* 18px */
    line-height: 1.5rem !important; /* 24px */
  }
  
  .py-32 {
    padding-top: 4rem !important; /* 64px */
    padding-bottom: 4rem !important; /* 64px */
  }
}

/* Corregir estilos de carrusel en dispositivos móviles */
@media (max-width: 767px) {
  .kintsugi-carousel-container {
    padding: 10px !important;
  }
  
  .kintsugi-carousel-nav-prev,
  .kintsugi-carousel-nav-next {
    width: 40px !important;
    height: 40px !important;
    opacity: 0.7 !important;
  }
  
  .swiper-pagination-bullet {
    width: 8px !important;
    height: 8px !important;
  }
  
  .swiper-pagination-bullet-active {
    width: 20px !important;
  }
}

/* Arreglar bug en Safari con tamaño de imágenes */
.kintsugi-noticia-image,
.kintsugi-noticia-video,
.kintsugi-carousel-image {
  -webkit-transform: translateZ(0);
  transform: translateZ(0);
}
</style>
@endsection