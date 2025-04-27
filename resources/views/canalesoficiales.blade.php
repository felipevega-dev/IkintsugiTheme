{{--
  Template Name: Canales Oficiales
--}}

@extends('layouts.app')

@section('content')
<style>
  .page-template-canalesoficiales {
    padding-top: 0 !important;
  }
</style>

<!-- Estilos específicos para esta página -->
<style>
  /* Corrige problemas de iframes y líneas negras en móvil */
  .iframe-container {
    position: relative;
    width: 100%;
    overflow: hidden;
    max-width: 100%;
  }
  
  iframe {
    border: none !important;
    max-width: 100% !important;
  }
  
  /* Asegura que los reproductores de video no generen líneas negras */
  .admin-youtube-container, 
  .video_player_container, 
  .fluid_video_wrapper {
    max-width: 100% !important;
    overflow: hidden !important;
  }
  
  /* Corrige líneas negras en móvil */
  @media (max-width: 767px) {
    .admin-youtube-container,
    .video_player_container,
    .fluid_video_wrapper {
      width: 100% !important;
      height: auto !important;
      min-height: 250px !important;
    }
    
    .fluid_video_wrapper video {
      background: transparent !important;
    }
    
    /* Corregir mensaje de DRM */
    .fluid_nonLinear_top {
      display: none !important;
    }
    
    /* Ocultar advertencias de consola en móvil */
    .fluid_video_wrapper .fp_logo {
      display: none !important;
    }
    
    /* Eliminar líneas negras superiores e inferiores */
    .fluid_controls_container {
      background-color: transparent !important;
    }
    
    .admin-youtube-wrapper {
      padding: 0 !important;
      margin: 0 !important;
    }
  }
</style>

<!-- Hero Section -->
<section class="relative bg-[#362766] overflow-hidden pt-24 md:pt-32">
  <!-- Imagen de fondo con overlay -->
  <div class="absolute inset-0 z-0">
    <div class="absolute inset-0 bg-[#362766] opacity-70 z-10"></div>
    <img 
      src="{{ get_theme_file_uri('resources/images/canales.jpg') }}" 
      alt="Conéctate con nosotros" 
      class="absolute inset-0 w-full h-full object-cover object-[center_05%] md:object-[center_05%] sm:object-[center_20%]" 
    >
  </div>
        
  <!-- Contenido del hero -->
  <div class="container mx-auto px-4 relative z-10 min-h-[400px] sm:min-h-[450px] md:min-h-[80vh] flex flex-col justify-center items-center">
    <div class="max-w-4xl mx-auto text-center text-white py-12 sm:py-16 md:py-32">
      <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-bold mb-4 sm:mb-8 font-paytone" data-aos="fade-up" data-aos-duration="1200">Conéctate con nosotros donde quieras</h1>
      <p class="text-lg sm:text-xl md:text-2xl font-roboto mb-8 px-4" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">Encuentra contenido exclusivo, episodios de nuestro podcast, videos, reflexiones y más en nuestras plataformas. ¡Acompáñanos en este camino de bienestar y transformación!</p>
    </div>
  </div>

  <!-- Curvatura inferior -->
  <div class="absolute bottom-0 left-0 right-0 z-10 translate-y-1">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120" fill="#ffffff" preserveAspectRatio="none" class="w-full h-8 sm:h-12 md:h-16">
      <path d="M0,64L80,69.3C160,75,320,85,480,80C640,75,800,53,960,48C1120,43,1280,53,1360,58.7L1440,64L1440,120L1360,120C1280,120,1120,120,960,120C800,120,640,120,480,120C320,120,160,120,80,120L0,120Z"></path>
    </svg>
  </div>
</section>

<!-- Sección de Canales -->
<section class="bg-white py-12 md:py-24 overflow-hidden">
  <div class="container mx-auto px-4">
    <h2 class="text-3xl sm:text-4xl font-bold text-[#030D55] mb-12 md:mb-16 text-center font-paytone" data-aos="fade-up" data-aos-duration="1000">
      Explora nuestros canales
    </h2>

    <!-- YouTube -->
    <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-8 md:gap-12 mb-16 md:mb-24">
      <div class="w-full md:w-1/2" data-aos="fade-right" data-aos-duration="1000">
        <div class="flex items-center gap-3 sm:gap-4 mb-4 sm:mb-6">
          <svg class="w-6 h-6 sm:w-8 sm:h-8 text-[#FF0000]" fill="currentColor" viewBox="0 0 24 24">
            <path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"/>
          </svg>
          <h3 class="text-xl sm:text-2xl font-bold text-[#D93280] font-paytone">Canal de YouTube</h3>
        </div>
        <p class="text-base sm:text-lg text-[#030D55] mb-6 font-roboto">
          Descubre contenido valioso sobre salud mental, desarrollo personal y bienestar emocional. Nuestros videos te ayudarán a:
        </p>
        <ul class="space-y-3 text-[#030D55] font-roboto mb-6 sm:mb-8">
          <li class="flex items-center gap-2">
            <svg class="w-5 h-5 text-[#D93280] flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
            </svg>
            <span>Comprender mejor tus emociones</span>
          </li>
          <li class="flex items-center gap-2">
            <svg class="w-5 h-5 text-[#D93280] flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
            </svg>
            <span>Desarrollar herramientas para el manejo del estrés</span>
          </li>
          <li class="flex items-center gap-2">
            <svg class="w-5 h-5 text-[#D93280] flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
            </svg>
            <span>Mejorar tus relaciones interpersonales</span>
          </li>
        </ul>
        <a href="https://www.youtube.com/@emisorkintsugi" target="_blank" class="inline-flex items-center gap-2 bg-[#D93280] text-white px-4 sm:px-6 py-2 sm:py-3 rounded-full transition-transform hover:scale-105 font-roboto text-sm sm:text-base">
          Suscríbete a nuestro canal
          <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
          </svg>
        </a>
      </div>
      
      <!-- YouTube Video Container -->
      <div class="w-full md:w-1/2" data-aos="fade-left" data-aos-duration="1000">
        <div class="relative w-full aspect-video rounded-xl sm:rounded-2xl overflow-hidden shadow-xl">
          <iframe 
            class="absolute top-0 left-0 w-full h-full"
            src="https://www.youtube.com/embed/MWUOwbLgzuU" 
            title="Video Kintsugi"
            frameborder="0" 
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
            allowfullscreen>
          </iframe>
        </div>
      </div>
    </div>

    <!-- Spotify -->
    <div class="flex flex-col-reverse md:flex-row items-start md:items-center justify-between gap-8 md:gap-12">
      <div class="w-full md:w-1/2" data-aos="fade-right" data-aos-duration="1000">
        <div class="relative w-full rounded-xl sm:rounded-2xl overflow-hidden shadow-xl" style="min-height: 300px sm:min-height: 400px;">
          <iframe 
            style="border-radius:12px;" 
            src="https://open.spotify.com/embed/show/08J06mjqK1UxNgXPTVlMkJ?utm_source=generator&theme=0" 
            width="100%" 
            height="400" 
            frameBorder="0" 
            allowfullscreen="" 
            allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" 
            loading="lazy">
          </iframe>
        </div>
      </div>

      <div class="w-full md:w-1/2" data-aos="fade-left" data-aos-duration="1000">
        <div class="flex items-center gap-3 sm:gap-4 mb-4 sm:mb-6">
          <svg class="w-6 h-6 sm:w-8 sm:h-8 text-[#1DB954]" fill="currentColor" viewBox="0 0 24 24">
            <path d="M12 0C5.4 0 0 5.4 0 12s5.4 12 12 12 12-5.4 12-12S18.66 0 12 0zm5.521 17.34c-.24.359-.66.48-1.021.24-2.82-1.74-6.36-2.101-10.561-1.141-.418.122-.779-.179-.899-.539-.12-.421.18-.78.54-.9 4.56-1.021 8.52-.6 11.64 1.32.42.18.479.659.301 1.02zm1.44-3.3c-.301.42-.841.6-1.262.3-3.239-1.98-8.159-2.58-11.939-1.38-.479.12-1.02-.12-1.14-.6-.12-.48.12-1.021.6-1.141C9.6 9.9 15 10.561 18.72 12.84c.361.181.54.78.241 1.2zm.12-3.36C15.24 8.4 8.82 8.16 5.16 9.301c-.6.179-1.2-.181-1.38-.721-.18-.601.18-1.2.72-1.381 4.26-1.26 11.28-1.02 15.721 1.621.539.3.719 1.02.419 1.56-.299.421-1.02.599-1.559.3z"/>
          </svg>
          <h3 class="text-xl sm:text-2xl font-bold text-[#D93280] font-paytone">Podcast en Spotify</h3>
        </div>
        <p class="text-base sm:text-lg text-[#030D55] mb-6 font-roboto">
          Escucha nuestro podcast donde compartimos:
        </p>
        <ul class="space-y-3 text-[#030D55] font-roboto mb-6 sm:mb-8">
          <li class="flex items-center gap-2">
            <svg class="w-5 h-5 text-[#D93280] flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
            </svg>
            <span>Conversaciones profundas sobre salud mental</span>
          </li>
          <li class="flex items-center gap-2">
            <svg class="w-5 h-5 text-[#D93280] flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
            </svg>
            <span>Entrevistas con expertos</span>
          </li>
          <li class="flex items-center gap-2">
            <svg class="w-5 h-5 text-[#D93280] flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
            </svg>
            <span>Consejos prácticos para tu día a día</span>
          </li>
        </ul>
        <a href="https://open.spotify.com/show/08J06mjqK1UxNgXPTVlMkJ" target="_blank" class="inline-flex items-center gap-2 bg-[#D93280] text-white px-4 sm:px-6 py-2 sm:py-3 rounded-full transition-transform hover:scale-105 font-roboto text-sm sm:text-base">
          Escúchanos en Spotify
          <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
          </svg>
        </a>
      </div>
    </div>
  </div>
</section>

<!-- Sección de Redes Sociales -->
<section class="bg-gray-50 py-12 sm:py-16 md:py-24 relative">
  <div class="container mx-auto px-4">
    <h2 class="text-3xl sm:text-4xl font-bold text-[#030D55] mb-8 sm:mb-12 md:mb-16 text-center font-paytone" data-aos="fade-up" data-aos-duration="1000">
      Síguenos en redes sociales
    </h2>

    <div class="grid md:grid-cols-2 gap-8 sm:gap-12 max-w-5xl mx-auto">
      <!-- Perfil de Julio César -->
      <div class="bg-white rounded-xl sm:rounded-2xl p-6 sm:p-8 shadow-lg transform transition-all duration-300 hover:-translate-y-2" data-aos="fade-up" data-aos-duration="800">
        <div class="flex flex-col sm:flex-row items-center sm:items-start gap-4 sm:gap-8">
          <div class="w-24 h-24 sm:w-32 sm:h-32 flex-shrink-0">
            <div class="w-full h-full rounded-full bg-[#8961C440] p-1">
              <img 
                src="{{ get_theme_file_uri('resources/images/julio.png') }}" 
                alt="Julio César" 
                class="w-full h-full object-cover rounded-full"
              >
            </div>
          </div>
          <div class="flex flex-col items-center sm:items-start gap-4 sm:gap-6">
            <div class="text-center sm:text-left">
              <h3 class="text-xl sm:text-2xl font-bold text-[#030D55] font-paytone">Julio César</h3>
              <p class="text-[#D93280] font-roboto">@psicologo_juliocesar</p>
            </div>
            <div class="flex gap-4">
              <a href="https://www.instagram.com/psicologo_juliocesar/" target="_blank" class="w-10 h-10 bg-[#D93280] rounded-lg flex items-center justify-center text-white transition-transform hover:scale-110">
                <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
              </a>
              <a href="#" target="_blank" class="w-10 h-10 bg-[#D93280] rounded-lg flex items-center justify-center text-white transition-transform hover:scale-110">
                <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M22.675 0h-21.35c-.732 0-1.325.593-1.325 1.325v21.351c0 .731.593 1.324 1.325 1.324h11.495v-9.294h-3.128v-3.622h3.128v-2.671c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.313h3.587l-.467 3.622h-3.12v9.293h6.116c.73 0 1.323-.593 1.323-1.325v-21.35c0-.732-.593-1.325-1.325-1.325z"/></svg>
              </a>
            </div>
          </div>
        </div>
      </div>

      <!-- Perfil de Shenhui -->
      <div class="bg-white rounded-xl sm:rounded-2xl p-6 sm:p-8 shadow-lg transform transition-all duration-300 hover:-translate-y-2" data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">
        <div class="flex flex-col sm:flex-row items-center sm:items-start gap-4 sm:gap-8">
          <div class="w-24 h-24 sm:w-32 sm:h-32 flex-shrink-0">
            <div class="w-full h-full rounded-full bg-[#F5B3F380] p-1">
              <img 
                src="{{ get_theme_file_uri('resources/images/shenhui.png') }}" 
                alt="Shenhui" 
                class="w-full h-full object-cover rounded-full"
              >
            </div>
          </div>
          <div class="flex flex-col items-center sm:items-start gap-4 sm:gap-6">
            <div class="text-center sm:text-left">
              <h3 class="text-xl sm:text-2xl font-bold text-[#030D55] font-paytone">Shenhui</h3>
              <p class="text-[#D93280] font-roboto">@psicologa_shenhui</p>
            </div>
            <div class="flex gap-4">
              <a href="https://www.instagram.com/psicologa_shenhui/" target="_blank" class="w-10 h-10 bg-[#D93280] rounded-lg flex items-center justify-center text-white transition-transform hover:scale-110">
                <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
              </a>
              <a href="#" target="_blank" class="w-10 h-10 bg-[#D93280] rounded-lg flex items-center justify-center text-white transition-transform hover:scale-110">
                <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M22.675 0h-21.35c-.732 0-1.325.593-1.325 1.325v21.351c0 .731.593 1.324 1.325 1.324h11.495v-9.294h-3.128v-3.622h3.128v-2.671c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.313h3.587l-.467 3.622h-3.12v9.293h6.116c.73 0 1.323-.593 1.323-1.325v-21.35c0-.732-.593-1.325-1.325-1.325z"/></svg>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Script para solucionar errores de consola -->
<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Resolver advertencias de consola
    setTimeout(function() {
      // Ocultar mensajes de advertencia DRM
      const drmMessages = document.querySelectorAll('.fluid_nonLinear_top');
      drmMessages.forEach(function(msg) {
        msg.style.display = 'none';
      });
      
      // Ajustar iframes para evitar errores de allowfullscreen
      const iframes = document.querySelectorAll('iframe');
      iframes.forEach(function(iframe) {
        if (!iframe.getAttribute('allowfullscreen')) {
          iframe.setAttribute('allowfullscreen', '');
        }
      });
      
      // Ajustar contenedores de video
      const videoContainers = document.querySelectorAll('.fluid_video_wrapper');
      videoContainers.forEach(function(container) {
        container.style.maxWidth = '100%';
        container.style.overflow = 'hidden';
      });
    }, 1000);
  });
</script>
@endsection
