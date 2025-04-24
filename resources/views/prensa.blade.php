{{--
Template Name: Prensa Template
--}}
@extends('layouts.app')
@section('content')
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
        <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold mb-8 font-playfair">¡Mereces una vida mejor!</h1>
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
      <h2 class="text-3xl md:text-4xl font-bold text-[#030D55] mb-8 text-left font-playfair">Noticias destacadas</h2>
      <!-- Indicador visual de deslizamiento -->
      <div class="flex items-center justify-center mb-4">
        <div class="swipe-indicator left-indicator"><div class="swipe-indicator-dot"></div></div>
        <span class="text-sm text-gray-500 mx-4">Desliza para ver más noticias</span>
        <div class="swipe-indicator right-indicator"><div class="swipe-indicator-dot"></div></div>
      </div>
      <!-- Carrusel principal -->
      <div id="kintsugi-carousel-main" class="swiper kintsugi-carousel-container">
        <div class="swiper-wrapper">
          <?php
            $carousel_ids = get_option('kintsugi_carousel_noticias', []);
            if (!empty($carousel_ids['noticias_ids'] ?? [])) {
              echo do_shortcode('[administracion_noticias_carrousel ids="' . implode(',', $carousel_ids['noticias_ids']) . '" count="8"]');
            } else {
              echo do_shortcode('[administracion_noticias_carrousel count="5"]');
            }
          ?>
        </div>
        <div class="swiper-pagination"></div>
      </div>
    </div>
  </section>

  <!-- Sección 2: Todas las noticias -->
  <section class="bg-gray-50 py-4">
    <div class="container mx-auto px-4">
      <h2 class="text-3xl md:text-4xl font-bold text-[#030D55] mb-8 text-left font-playfair">Todas las noticias</h2>
      <!-- Filtros y búsqueda AJAX -->
      <div class="kintsugi-filters-container mb-8">
        <div class="flex flex-wrap items-center gap-4">
          <!-- Búsqueda -->
          <div class="search-container flex-grow">
            <label for="kintsugi-search-input" class="block mb-1 text-sm font-medium text-gray-700 md:hidden">Buscar</label>
            <div class="relative">
              <input id="kintsugi-search-input" type="text" placeholder="Buscar noticias..." class="w-full px-4 py-2 pl-10 border rounded-md focus:ring-2 focus:ring-[#362766]">
              <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <!-- Icono de búsqueda -->
              </div>
            </div>
          </div>
          <!-- Filtros de año y orden -->
          <select id="kintsugi-year-filter" class="px-4 py-2 border rounded-md focus:ring-2 focus:ring-[#362766]">
            <option value="all">Todos los años</option>
            <?php for ($i = 0; $i <= 4; $i++): $year = date('Y') - $i; ?>
            <option value="<?= $year; ?>"><?= $year; ?></option>
            <?php endfor; ?>
          </select>
          <select id="kintsugi-sort-filter" class="px-4 py-2 border rounded-md focus:ring-2 focus:ring-[#362766]">
            <option value="date-desc">Más recientes primero</option>
            <option value="date-asc">Más antiguos primero</option>
            <option value="title-asc">Título (A-Z)</option>
            <option value="title-desc">Título (Z-A)</option>
          </select>
        </div>
      </div>
      <div id="kintsugi-noticias-ajax-container">
        {!! do_shortcode('[administracion_noticias per_page="4"]') !!}
      </div>
    </div>
  </section>

  <!-- Elementor content -->
  <section class="elementor-section">
    <div class="elementor-container">@php the_content(); @endphp</div>
  </section>

  <!-- Popup de video -->
  <div class="kintsugi-video-popup">
    <div class="kintsugi-video-popup-inner">
      <div class="kintsugi-video-popup-container">
        <div class="kintsugi-video-popup-content"></div>
      </div>
      <button class="kintsugi-video-popup-close">×</button>
    </div>
  </div>
</div>
@endsection
