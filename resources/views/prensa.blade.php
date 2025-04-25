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
  <section class="bg-white py-12 overflow-hidden">
    <div class="container mx-auto px-4">
      <h2 class="text-3xl md:text-4xl font-bold text-[#030D55] mb-8 text-left font-playfair">Noticias destacadas</h2>
      
      <!-- Contenedor del carrusel con estilos personalizados -->
      <div class="carousel-container max-w-[1200px] mx-auto">
        {!! do_shortcode('[simple_carousel]') !!}
      </div>

      <style>
        /* Estilos personalizados para el contenedor del carrusel */
        .carousel-container .simple-carousel {
          max-width: 100%;
          margin: 0 auto;
          box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
          border-radius: 8px;
          overflow: hidden;
        }

        /* Ajustes para los slides de video */
        .carousel-container .video-slide {
          background: #000;
        }

        /* Mejoras para las flechas de navegación */
        .carousel-container .simple-carousel-prev,
        .carousel-container .simple-carousel-next {
          background: rgba(54, 39, 102, 0.7);
          border-radius: 50%;
          width: 40px;
          height: 40px;
          display: flex;
          align-items: center;
          justify-content: center;
          transition: all 0.3s ease;
        }

        .carousel-container .simple-carousel-prev:hover,
        .carousel-container .simple-carousel-next:hover {
          background: rgba(54, 39, 102, 0.9);
          transform: scale(1.1);
        }

        /* Mejoras para los títulos */
        .carousel-container .simple-carousel-caption {
          background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);
          padding: 20px;
        }

        .carousel-container .simple-carousel-caption h3 {
          font-family: 'Playfair Display', serif;
          font-size: 1.5rem;
          margin-bottom: 0.5rem;
        }
      </style>
    </div>
  </section>

  <!-- Sección 2: Todas las noticias -->
  <section class="bg-gray-50 py-12">
    <div class="container mx-auto">
      <h2 class="text-3xl md:text-4xl font-bold text-[#030D55] mb-8 text-left font-playfair px-4">Todas las noticias</h2>
      
      <!-- Grid de noticias -->
      <div class="news-grid-container">
        {!! do_shortcode('[simple_carousel_grid items_per_page="9" orderby="date" order="DESC"]') !!}
      </div>
    </div>
  </section>
</div>
@endsection
