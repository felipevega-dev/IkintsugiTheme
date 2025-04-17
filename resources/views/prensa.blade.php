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
/* Contenedor principal para aumentar especificidad */
.kintsugi-theme-wrapper {
  /* Este contenedor no aplica estilos propios pero aumenta la especificidad */
}

/* Swiper Carousel Basic Styles - más específicos para superar Tailwind */
.kintsugi-theme-wrapper .swiper-container,
.kintsugi-theme-wrapper .swiper {
  margin-left: auto !important;
  margin-right: auto !important;
  position: relative !important;
  overflow: hidden !important;
  list-style: none !important;
  padding: 0 !important;
  z-index: 1 !important;
  width: 100% !important;
}

.kintsugi-theme-wrapper .swiper-wrapper {
  position: relative !important;
  width: 100% !important;
  height: 100% !important;
  z-index: 1 !important;
  display: flex !important;
  transition-property: transform !important;
  box-sizing: content-box !important;
}

.kintsugi-theme-wrapper .swiper-slide {
  flex-shrink: 0 !important;
  width: 100% !important;
  height: 100% !important;
  position: relative !important;
  transition-property: transform !important;
}

/* Estilos altamente específicos para asegurar que se aplican */
.kintsugi-theme-wrapper .swiper-pagination {
  position: absolute !important;
  text-align: center !important;
  transition: 300ms opacity !important;
  transform: translate3d(0, 0, 0) !important;
  z-index: 10 !important;
  bottom: 10px !important;
  left: 0 !important;
  right: 0 !important;
}

.kintsugi-theme-wrapper .swiper-pagination-bullet {
  width: 12px !important;
  height: 12px !important;
  display: inline-block !important;
  border-radius: 50% !important;
  background: rgba(54, 39, 102, 0.5) !important;
  opacity: 1 !important;
  margin: 0 4px !important;
}

.kintsugi-theme-wrapper .swiper-pagination-bullet-active {
  opacity: 1 !important;
  background: #362766 !important;
}

/**
 * Theme-specific styles for the Prensa page
 */

/* Enhance the appearance of news items to match the ikintsugi theme */
.kintsugi-theme-wrapper .kintsugi-noticia-item,
.kintsugi-theme-wrapper .kintsugi-noticia-reciente-item,
.kintsugi-theme-wrapper .kintsugi-carousel-slide {
  position: relative !important;
  border-radius: 8px !important;
  overflow: hidden !important;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1) !important;
  transition: transform 0.3s, box-shadow 0.3s !important;
  background-color: #fff !important;
  height: 100% !important;
  border: 1px solid rgba(54, 39, 102, 0.1) !important;
}

.kintsugi-theme-wrapper .kintsugi-noticia-item:hover,
.kintsugi-theme-wrapper .kintsugi-noticia-reciente-item:hover,
.kintsugi-theme-wrapper .kintsugi-carousel-slide:hover {
  transform: translateY(-5px) !important;
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15) !important;
  border-color: rgba(54, 39, 102, 0.3) !important;
}

.kintsugi-theme-wrapper .kintsugi-noticia-date,
.kintsugi-theme-wrapper .kintsugi-carousel-date {
  position: absolute !important;
  top: 10px !important;
  right: 10px !important;
  background: rgba(54, 39, 102, 0.8) !important;
  color: #fff !important;
  padding: 4px 8px !important;
  border-radius: 4px !important;
  font-size: 12px !important;
  z-index: 5 !important;
}

.kintsugi-theme-wrapper .kintsugi-noticia-overlay,
.kintsugi-theme-wrapper .kintsugi-carousel-overlay {
  position: absolute !important;
  inset: 0 !important;
  background: linear-gradient(to bottom, rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, 0.7) 100%) !important;
  z-index: 1 !important;
}

.kintsugi-theme-wrapper .kintsugi-noticia-image,
.kintsugi-theme-wrapper .kintsugi-noticia-video,
.kintsugi-theme-wrapper .kintsugi-carousel-image {
  height: 200px !important;
  overflow: hidden !important;
}

.kintsugi-theme-wrapper .kintsugi-noticia-img,
.kintsugi-theme-wrapper .kintsugi-carousel-image img {
  width: 100% !important;
  height: 100% !important;
  object-fit: cover !important;
  transition: transform 0.5s !important;
}

.kintsugi-theme-wrapper .kintsugi-noticia-item:hover .kintsugi-noticia-img,
.kintsugi-theme-wrapper .kintsugi-carousel-slide:hover .kintsugi-carousel-image img {
  transform: scale(1.05) !important;
}

.kintsugi-theme-wrapper .kintsugi-noticia-content,
.kintsugi-theme-wrapper .kintsugi-carousel-content {
  padding: 15px !important;
  position: relative !important;
  z-index: 2 !important;
}

.kintsugi-theme-wrapper .kintsugi-noticia-title,
.kintsugi-theme-wrapper .kintsugi-carousel-title {
  margin: 0 0 8px !important;
  font-size: 18px !important;
  font-weight: 700 !important;
  color: #030D55 !important;
  line-height: 1.3 !important;
  font-family: 'Playfair Display', serif !important;
}

.kintsugi-theme-wrapper .kintsugi-noticia-excerpt,
.kintsugi-theme-wrapper .kintsugi-carousel-excerpt {
  font-size: 14px !important;
  color: #4a4a4a !important;
  line-height: 1.5 !important;
}

/* Video Styles */
.kintsugi-theme-wrapper .kintsugi-noticia-video-play,
.kintsugi-theme-wrapper .kintsugi-carousel-play {
  position: absolute !important;
  top: 50% !important;
  left: 50% !important;
  transform: translate(-50%, -50%) !important;
  width: 60px !important;
  height: 60px !important;
  background-color: rgba(54, 39, 102, 0.8) !important;
  border-radius: 50% !important;
  display: flex !important;
  align-items: center !important;
  justify-content: center !important;
  z-index: 3 !important;
  cursor: pointer !important;
  transition: background-color 0.3s !important;
  animation: pulse 2s infinite !important;
}

.kintsugi-theme-wrapper .kintsugi-noticia-video-play:hover,
.kintsugi-theme-wrapper .kintsugi-carousel-play:hover {
  background-color: rgba(54, 39, 102, 1) !important;
}

.kintsugi-theme-wrapper .kintsugi-noticia-video-play::after,
.kintsugi-theme-wrapper .kintsugi-carousel-play::after {
  content: '' !important;
  width: 0 !important;
  height: 0 !important;
  border-top: 12px solid white !important;
  border-bottom: 12px solid white !important;
  border-left: 18px solid white !important;
  margin-left: 5px !important;
}

/* Custom styling for the filters section */
.kintsugi-theme-wrapper .kintsugi-filters-container {
  background-color: #f8f6ff !important;
  padding: 20px !important;
  border-radius: 8px !important;
  margin-bottom: 30px !important;
}

.kintsugi-theme-wrapper .kintsugi-filters-container input,
.kintsugi-theme-wrapper .kintsugi-filters-container select {
  border-color: #ddd !important;
  border-radius: 6px !important;
  padding: 10px 15px !important;
}

.kintsugi-theme-wrapper .kintsugi-filters-container input:focus,
.kintsugi-theme-wrapper .kintsugi-filters-container select:focus {
  border-color: #362766 !important;
  box-shadow: 0 0 0 3px rgba(54, 39, 102, 0.15) !important;
}

/* Custom styles for the carousel section */
.kintsugi-theme-wrapper .kintsugi-carousel-wrapper {
  position: relative !important;
  margin-bottom: 40px !important;
  padding: 30px 0 !important;
}

.kintsugi-theme-wrapper .kintsugi-carousel-container,
.kintsugi-theme-wrapper .swiper-container-custom {
  overflow: hidden !important;
  border-radius: 8px !important;
  padding-bottom: 30px !important;
  box-shadow: 0 10px 30px rgba(3, 13, 85, 0.1) !important;
}

.kintsugi-theme-wrapper .kintsugi-carousel-slide {
  height: 400px !important;
}

@media (max-width: 767px) {
  .kintsugi-theme-wrapper .kintsugi-carousel-slide {
    height: 350px !important;
  }
}

.kintsugi-theme-wrapper .kintsugi-carousel-nav-prev,
.kintsugi-theme-wrapper .kintsugi-carousel-nav-next {
  position: absolute !important;
  top: 50% !important;
  width: 40px !important;
  height: 40px !important;
  background: rgba(54, 39, 102, 0.7) !important;
  border-radius: 50% !important;
  display: flex !important;
  align-items: center !important;
  justify-content: center !important;
  cursor: pointer !important;
  z-index: 10 !important;
  transform: translateY(-50%) !important;
  transition: background 0.3s !important;
}

.kintsugi-theme-wrapper .kintsugi-carousel-nav-prev:hover,
.kintsugi-theme-wrapper .kintsugi-carousel-nav-next:hover {
  background: rgba(54, 39, 102, 1) !important;
}

.kintsugi-theme-wrapper .kintsugi-carousel-nav-prev {
  left: 10px !important;
}

.kintsugi-theme-wrapper .kintsugi-carousel-nav-next {
  right: 10px !important;
}

.kintsugi-theme-wrapper .kintsugi-carousel-nav-prev::after,
.kintsugi-theme-wrapper .kintsugi-carousel-nav-next::after {
  content: '' !important;
  display: block !important;
  width: 12px !important;
  height: 12px !important;
  border-top: 2px solid white !important;
  border-right: 2px solid white !important;
}

.kintsugi-theme-wrapper .kintsugi-carousel-nav-prev::after {
  transform: rotate(-135deg) !important;
  margin-left: 5px !important;
}

.kintsugi-theme-wrapper .kintsugi-carousel-nav-next::after {
  transform: rotate(45deg) !important;
  margin-right: 5px !important;
}

/* Loading state styles */
.kintsugi-theme-wrapper .kintsugi-noticias-ajax-container.loading {
  min-height: 300px !important;
  position: relative !important;
  opacity: 0.7 !important;
}

.kintsugi-theme-wrapper .kintsugi-loading {
  position: absolute !important;
  top: 50% !important;
  left: 50% !important;
  transform: translate(-50%, -50%) !important;
  text-align: center !important;
  z-index: 10 !important;
}

.kintsugi-theme-wrapper .kintsugi-loading .spinner {
  display: inline-block !important;
  width: 50px !important;
  height: 50px !important;
  border: 3px solid rgba(54, 39, 102, 0.3) !important;
  border-radius: 50% !important;
  border-top-color: #362766 !important;
  animation: spin 1s ease-in-out infinite !important;
  margin-bottom: 10px !important;
}

@keyframes spin {
  to { transform: rotate(360deg); }
}

.kintsugi-theme-wrapper .kintsugi-loading p {
  color: #362766 !important;
  font-weight: 500 !important;
}

/* Video popup - super specific */
body.kintsugi-popup-open {
  overflow: hidden !important;
}

.kintsugi-video-popup {
  position: fixed !important;
  top: 0 !important;
  left: 0 !important;
  width: 100% !important;
  height: 100% !important;
  background: rgba(0, 0, 0, 0.9) !important;
  z-index: 9999 !important;
  display: none !important;
  align-items: center !important;
  justify-content: center !important;
}

.kintsugi-video-popup.active {
  display: flex !important;
}

.kintsugi-video-popup-inner {
  position: relative !important;
  width: 90% !important;
  max-width: 900px !important;
  box-shadow: 0 10px 40px rgba(0, 0, 0, 0.4) !important;
}

.kintsugi-video-popup-content {
  position: relative !important;
  padding-top: 56.25% !important;
  overflow: hidden !important;
  border-radius: 8px !important;
}

.kintsugi-video-popup-content iframe {
  position: absolute !important;
  top: 0 !important;
  left: 0 !important;
  width: 100% !important;
  height: 100% !important;
  border: 0 !important;
}

.kintsugi-video-popup-close {
  position: absolute !important;
  top: -50px !important;
  right: -10px !important;
  width: 40px !important;
  height: 40px !important;
  color: white !important;
  font-size: 30px !important;
  line-height: 40px !important;
  text-align: center !important;
  cursor: pointer !important;
  z-index: 10 !important;
  transition: transform 0.3s, background-color 0.3s !important;
  background-color: rgba(54, 39, 102, 0.8) !important;
  border-radius: 50% !important;
}

.kintsugi-video-popup-close:hover {
  transform: scale(1.2) !important;
  background-color: rgba(54, 39, 102, 1) !important;
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

/* Swipe indicators */
.kintsugi-theme-wrapper .swipe-indicator {
  display: flex !important;
  align-items: center !important;
  opacity: 0.6 !important;
  padding: 5px 10px !important;
  background-color: #f5f5f5 !important;
  border-radius: 20px !important;
}

.kintsugi-theme-wrapper .swipe-indicator-dot {
  width: 8px !important;
  height: 8px !important;
  background-color: #362766 !important;
  border-radius: 50% !important;
  position: relative !important;
  animation: swipePulse 1.5s infinite !important;
}

.kintsugi-theme-wrapper .left-indicator .swipe-indicator-dot::before,
.kintsugi-theme-wrapper .right-indicator .swipe-indicator-dot::after {
  content: '' !important;
  position: absolute !important;
  top: 0 !important;
  width: 8px !important;
  height: 8px !important;
  background-color: #362766 !important;
  border-radius: 50% !important;
  opacity: 0.5 !important;
}

.kintsugi-theme-wrapper .left-indicator .swipe-indicator-dot::before {
  right: 12px !important;
}

.kintsugi-theme-wrapper .right-indicator .swipe-indicator-dot::after {
  left: 12px !important;
}

@keyframes swipePulse {
  0%, 100% { transform: scale(1); }
  50% { transform: scale(1.3); }
}

/* Estilos para la paginación */
.kintsugi-theme-wrapper .kintsugi-noticias-pagination {
  display: flex !important;
  justify-content: center !important;
  margin-top: 30px !important;
}

.kintsugi-theme-wrapper .kintsugi-noticias-pagination .page-numbers {
  display: inline-flex !important;
  align-items: center !important;
  justify-content: center !important;
  width: 36px !important;
  height: 36px !important;
  margin: 0 3px !important;
  border-radius: 4px !important;
  border: 1px solid #ddd !important;
  color: #4a4a4a !important;
  text-decoration: none !important;
  transition: all 0.3s !important;
  font-weight: 500 !important;
}

.kintsugi-theme-wrapper .kintsugi-noticias-pagination .page-numbers.current {
  background-color: #030D55 !important;
  border-color: #030D55 !important;
  color: white !important;
}

.kintsugi-theme-wrapper .kintsugi-noticias-pagination .page-numbers:hover:not(.current) {
  background-color: #f5f5f5 !important;
  border-color: #bbb !important;
}

.kintsugi-theme-wrapper .kintsugi-noticias-pagination .prev,
.kintsugi-theme-wrapper .kintsugi-noticias-pagination .next {
  width: auto !important;
  padding: 0 12px !important;
}
</style>

<!-- Wrapper para aumentar especificidad -->
<div class="kintsugi-theme-wrapper">
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
    <div id="kintsugi-carousel-main" class="swiper-container-custom kintsugi-carousel-container swiper" style="position: relative !important; overflow: hidden !important; margin-left: auto !important; margin-right: auto !important; padding-bottom: 40px !important; border-radius: 8px !important; box-shadow: 0 10px 30px rgba(3, 13, 85, 0.1) !important;">
      <div class="swiper-wrapper" style="display: flex !important; width: 100% !important; height: 100% !important; position: relative !important; z-index: 1 !important; box-sizing: content-box !important; transition-property: transform !important;">
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
      <div class="swiper-pagination" style="position: absolute !important; bottom: 10px !important; left: 0 !important; right: 0 !important; text-align: center !important; z-index: 10 !important;"></div>
      <div class="kintsugi-carousel-nav-prev" style="position: absolute !important; top: 50% !important; transform: translateY(-50%) !important; left: 10px !important; z-index: 10 !important; width: 40px !important; height: 40px !important; background: rgba(54, 39, 102, 0.7) !important; border-radius: 50% !important; display: flex !important; align-items: center !important; justify-content: center !important; cursor: pointer !important;"></div>
      <div class="kintsugi-carousel-nav-next" style="position: absolute !important; top: 50% !important; transform: translateY(-50%) !important; right: 10px !important; z-index: 10 !important; width: 40px !important; height: 40px !important; background: rgba(54, 39, 102, 0.7) !important; border-radius: 50% !important; display: flex !important; align-items: center !important; justify-content: center !important; cursor: pointer !important;"></div>
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
        applyInlineStyles(); // Función para aplicar estilos inline
    });
    
    // Función para aplicar estilos inline a elementos generados dinámicamente
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
    }
    
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