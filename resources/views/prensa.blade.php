{{--
  Template Name: Prensa
--}}

@extends('layouts.app')

@section('content')
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
@endsection