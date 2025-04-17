{{--
  Template Name: Prensa
--}}

@extends('layouts.app')

@section('content')
<style>
  /* Importar archivo de estilos específicos de prensa */
  @import url("{{ get_theme_file_uri('resources/styles/prensa.css') }}");
  
  /* Override para forzar 5 columnas (sobreescribe reglas del plugin) */
  @media (min-width: 1200px) {
    .kintsugi-noticias-grid {
      grid-template-columns: repeat(5, 1fr) !important;
      grid-gap: 20px !important;
    }
  }
  
  @media (min-width: 992px) and (max-width: 1199px) {
    .kintsugi-noticias-grid {
      grid-template-columns: repeat(4, 1fr) !important;
      grid-gap: 20px !important;
    }
  }
  
  @media (min-width: 768px) and (max-width: 991px) {
    .kintsugi-noticias-grid {
      grid-template-columns: repeat(3, 1fr) !important;
      grid-gap: 15px !important;
    }
  }
  
  @media (min-width: 576px) and (max-width: 767px) {
    .kintsugi-noticias-grid {
      grid-template-columns: repeat(2, 1fr) !important;
      grid-gap: 15px !important;
    }
  }
  
  @media (max-width: 575px) {
    .kintsugi-noticias-grid {
      grid-template-columns: repeat(1, 1fr) !important;
    }
  }
  
  /* Ajustes para las tarjetas de noticia */
  .kintsugi-noticia-item {
    max-width: 100% !important;
    height: auto !important;
  }
  
  .kintsugi-noticia-image,
  .kintsugi-noticia-video {
    height: 0 !important;
    padding-bottom: 75% !important; /* Proporción 4:3 para mejor visualización en grid pequeño */
    position: relative !important;
    overflow: hidden !important;
  }
  
  .kintsugi-noticia-content {
    padding: 15px !important;
  }
  
  .kintsugi-noticia-title {
    font-size: 16px !important;
    font-weight: 600 !important;
    margin-bottom: 8px !important;
    line-height: 1.3 !important;
    display: -webkit-box !important;
    -webkit-line-clamp: 2 !important;
    -webkit-box-orient: vertical !important;
    overflow: hidden !important;
  }
  
  .kintsugi-noticia-excerpt {
    font-size: 13px !important;
    margin-top: 8px !important;
    display: -webkit-box !important;
    -webkit-line-clamp: 2 !important;
    -webkit-box-orient: vertical !important;
    overflow: hidden !important;
  }
  
  /* Estilos adicionales específicos para esta página */
  .kintsugi-carousel-container {
    border: none !important;
    overflow: visible !important;
  }
  
  .kintsugi-carousel-date {
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
  
  .swiper-pagination {
    bottom: -30px !important;
  }
  
  /* Estilos para evitar conflictos con el tema */
  .kintsugi-noticia-item a:hover {
    text-decoration: none !important;
  }
  
  .kintsugi-noticia-item img,
  .kintsugi-carousel-slide img {
    margin: 0 !important;
    padding: 0 !important;
  }
  
  /* Ajustes adicionales para el carrusel de 5 columnas */
  /* Forzar estilos para sobreescribir plugins */
  body .swiper-container-custom,
  body .kintsugi-carousel-container,
  body .swiper-slide {
    transition: all 0.3s ease !important;
  }
  
  body .kintsugi-carousel-slide {
    height: auto !important;
    min-height: 280px !important;
    width: 100% !important; /* Asegurar que el slide se ajuste al ancho de su slot */
  }
  
  /* Asegurar que la configuración de Swiper tenga prioridad */
  body .swiper[id^="kintsugi-carousel"] .swiper-wrapper {
    display: flex !important;
  }
  
  /* Forzar ancho de slides según breakpoints */
  @media (min-width: 1200px) {
    body .swiper-container-custom .swiper-slide {
      width: 20% !important;
      box-sizing: border-box !important;
    }
  }
  
  @media (min-width: 992px) and (max-width: 1199px) {
    body .swiper-container-custom .swiper-slide {
      width: 25% !important;
      box-sizing: border-box !important;
    }
  }
  
  @media (min-width: 640px) and (max-width: 991px) {
    body .swiper-container-custom .swiper-slide {
      width: 33.333% !important;
      box-sizing: border-box !important;
    }
  }
  
  @media (min-width: 480px) and (max-width: 639px) {
    body .swiper-container-custom .swiper-slide {
      width: 50% !important;
      box-sizing: border-box !important;
    }
  }
  
  @media (max-width: 479px) {
    body .swiper-container-custom .swiper-slide {
      width: 100% !important;
      box-sizing: border-box !important;
    }
  }
  
  /* Evitar que los slides se deformen */
  body .swiper-container-custom {
    overflow: visible !important;
  }
  
  /* Mejoras de apariencia para el carrusel */
  .swiper-container-custom {
    padding: 0 !important;
    margin-bottom: 40px !important;
  }
  
  .swiper-pagination {
    position: absolute !important;
    bottom: -30px !important;
    left: 0 !important;
    right: 0 !important;
    z-index: 20 !important;
  }
  
  .swiper-pagination-bullet {
    width: 10px !important;
    height: 10px !important;
    background: rgba(54, 39, 102, 0.5) !important;
    opacity: 1 !important;
  }
  
  .swiper-pagination-bullet-active {
    background: #362766 !important;
    transform: scale(1.2) !important;
  }
  
  /* Mejorar navegación */
  .kintsugi-carousel-nav-prev,
  .kintsugi-carousel-nav-next {
    background-color: rgba(54, 39, 102, 0.7) !important;
    color: white !important;
    width: 40px !important;
    height: 40px !important;
    border-radius: 50% !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    z-index: 10 !important;
    position: absolute !important;
    top: 50% !important;
    transform: translateY(-50%) !important;
    cursor: pointer !important;
    opacity: 0 !important;
    transition: opacity 0.3s ease !important;
  }
  
  .kintsugi-carousel-nav-prev {
    left: -15px !important;
  }
  
  .kintsugi-carousel-nav-next {
    right: -15px !important;
  }
  
  .kintsugi-carousel-container:hover .kintsugi-carousel-nav-prev,
  .kintsugi-carousel-container:hover .kintsugi-carousel-nav-next {
    opacity: 0.8 !important;
  }
  
  .kintsugi-carousel-nav-prev:hover,
  .kintsugi-carousel-nav-next:hover {
    opacity: 1 !important;
    background-color: rgba(54, 39, 102, 0.9) !important;
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
    <h2 class="text-3xl md:text-4xl font-bold text-center mb-8"
        style="font-family: 'Playfair Display', serif; font-weight: 800; font-size: 24px; line-height: 100%; letter-spacing: 0%; color: #AB277A;">
      Las más recientes
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

    <!-- Contenedor mejorado del carrusel -->
    <div class="carousel-outer-wrapper shadow-lg rounded-xl overflow-hidden mb-8" style="background: linear-gradient(180deg, rgba(171, 39, 122, 0.4) 0%, rgba(3, 13, 85, 0.4) 61%);">
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
  </div>
</section>

<!-- Sección 2: Todas las noticias -->
<section class="bg-gray-50 py-4 relative">
  <div class="container mx-auto px-4 relative">
    <div class="flex flex-wrap justify-between items-start mb-8">
      <div class="max-w-3xl mb-4 md:mb-0">
        <h2 class="text-center md:text-left"
            style="font-family: 'Playfair Display', serif; font-weight: 800; font-size: 48px; line-height: 100%; letter-spacing: 0%; color: #030D55;">
          Artículos y notas en prensa
        </h2>
        <p class="text-lg text-gray-600 mb-2 text-center md:text-left">
          Explora nuestra colección completa de apariciones en medios, artículos, entrevistas y videos sobre psicología, EMDR y tratamiento del trauma. Utiliza los filtros para encontrar exactamente lo que buscas.
        </p>
      </div>

      <!-- Contenedor para filtros a la derecha -->
      <div class="kintsugi-filters-right-container flex flex-col sm:flex-row gap-4 items-start w-full md:w-auto">
        <div class="filter-container w-full sm:w-auto">
          <label for="kintsugi-year-filter" class="block mb-2 text-sm font-medium text-gray-700">Filtrar por año</label>
          <select id="kintsugi-year-filter" class="w-full sm:w-auto px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#362766]">
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

        <div class="sort-container w-full sm:w-auto">
          <label for="kintsugi-sort-filter" class="block mb-2 text-sm font-medium text-gray-700">Ordenar resultados</label>
          <select id="kintsugi-sort-filter" class="w-full sm:w-auto px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#362766]">
            <option value="date-desc">Más recientes primero</option>
            <option value="date-asc">Más antiguos primero</option>
            <option value="title-asc">Título (A-Z)</option>
            <option value="title-desc">Título (Z-A)</option>
          </select>
        </div>
      </div>
    </div>

    <!-- Filtros y Búsqueda AJAX (Solo búsqueda ahora) -->
    <div class="kintsugi-filters-container mb-8">
      <div class="flex flex-wrap items-start gap-4">
        <div class="search-container flex-grow">
          <label for="kintsugi-search-input" class="block mb-2 text-sm font-medium text-gray-700">Buscar por palabra clave</label>
          <div class="relative">
            <input type="text" id="kintsugi-search-input" placeholder="Escribe aquí para buscar noticias..." class="w-full px-4 py-2 pl-10 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#362766]">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
              </svg>
            </div>
          </div>
        </div>
      </div>
      <div class="mt-3 text-sm text-gray-500 italic">La búsqueda se actualiza automáticamente mientras escribes.</div>
    </div>

    <!-- Contenedor para el contenido AJAX -->
    <div id="kintsugi-noticias-ajax-container">
      <!-- Shortcode para todas las noticias con buscador y paginación - mostrando 10 por página (5x2) -->
      {!! do_shortcode('[administracion_noticias per_page="10"]') !!}
    </div>
  </div>
</section>

<!-- Sección para contenido de Elementor -->
<section class="elementor-section">
  <div class="elementor-container">
    @php the_content(); @endphp
  </div>
</section>
@endsection