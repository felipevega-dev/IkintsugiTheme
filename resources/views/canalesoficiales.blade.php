{{--
  Template Name: Canales Oficiales
--}}

@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="relative bg-[#362766] overflow-hidden pt-24 md:pt-32">
  <!-- Imagen de fondo con overlay -->
  <div class="absolute inset-0 z-0">
    <div class="absolute inset-0 bg-[#362766] opacity-70 z-10"></div>
    <img 
      src="{{ get_theme_file_uri('resources/images/canales.jpg') }}" 
      alt="Conéctate con nosotros" 
      class="absolute inset-0 w-full h-full object-cover object-top" 
    >
  </div>
        
  <!-- Contenido del hero -->
  <div class="container mx-auto px-4 relative z-10 min-h-[500px] md:min-h-[110vh] flex flex-col justify-center items-center">
    <div class="max-w-4xl mx-auto text-center text-white py-32 md:py-32">
      <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold mb-8 font-playfair" style="font-family: 'Playfair Display', serif;">Conéctate con nosotros donde quieras</h1>
      <p class="text-xl md:text-2xl font-500 mb-2">Encuentra contenido exclusivo, episodios de nuestro podcast, videos, reflexiones y más en nuestras plataformas. ¡Acompáñanos en este camino de bienestar y transformación!</p>
    </div>
  </div>

  <!-- Curvatura inferior -->
  <div class="absolute bottom-0 left-0 right-0 z-10 translate-y-1">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120" fill="#ffffff" preserveAspectRatio="none">
      <path d="M0,64L80,69.3C160,75,320,85,480,80C640,75,800,53,960,48C1120,43,1280,53,1360,58.7L1440,64L1440,120L1360,120C1280,120,1120,120,960,120C800,120,640,120,480,120C320,120,160,120,80,120L0,120Z"></path>
    </svg>
  </div>
</section>

  <!-- Sección 1: Explora nuestros canales -->
  <section class="bg-white py-16 overflow-hidden">
    <div class="container mx-auto px-4">
      <h2 class="text-4xl font-bold text-[#030D55] mb-12 text-center" style="font-family: 'Playfair Display', serif;">
        Explora nuestros canales
      </h2>

      <!-- Spotify -->
      <div class="flex flex-col md:flex-row items-center justify-between gap-10 mb-16">
        <!-- Texto a la izquierda -->
        <div class="md:w-1/2">
          <h3 class="text-2xl font-bold text-[#D93280] mb-6">Spotify</h3>
          <p class="text-base text-[#030D55] mb-4">
            Descubre nuestro canal de psicología en Spotify! Encuentra episodios y playlists con herramientas y consejos para mejorar tu bienestar psicológico, relaciones personales e inteligencia emocional. Acompáñanos en tu camino hacia una vida más equilibrada. Sintoniza, ahora y comienza tu viaje hacia el crecimiento personal!
          </p>
        </div>
        
        <!-- Contenido de Spotify desde el plugin de administración -->
        <div class="md:w-1/2 relative flex justify-center">
          <div class="w-full admin-spotify-container">
            @php
              // Intentar ejecutar el shortcode
              $spotify_content = do_shortcode('[administracion_spotify]');
              
              // Verificar si el shortcode se ejecutó o no (si no cambió, el plugin no está activo)
              $spotify_plugin_active = ($spotify_content !== '[administracion_spotify]');
            @endphp
            
            @if($spotify_plugin_active)
              {!! $spotify_content !!}
            @else
              <!-- Fallback: Imagen estática de Spotify cuando el plugin no está activo -->
              <img 
                src="{{ get_theme_file_uri('resources/images/spotify-preview.png') }}" 
                alt="Spotify Emisor Kintsugi" 
                class="w-auto max-w-full h-auto rounded-lg shadow-lg"
              >
            @endif
          </div>
        </div>
      </div>

      <!-- YouTube -->
      <div class="flex flex-col-reverse md:flex-row items-center justify-between gap-10">
        <!-- Contenido de YouTube desde el plugin de administración -->
        <div class="md:w-1/2 relative flex justify-center">
          <div class="w-full admin-youtube-container">
            @php
              // Intentar ejecutar el shortcode
              $youtube_content = do_shortcode('[administracion_youtube]');
              
              // Verificar si el shortcode se ejecutó o no (si no cambió, el plugin no está activo)
              $youtube_plugin_active = ($youtube_content !== '[administracion_youtube]');
            @endphp
            
            @if($youtube_plugin_active)
              {!! $youtube_content !!}
            @else
              <!-- Fallback: Imagen estática de YouTube cuando el plugin no está activo -->
              <img 
                src="{{ get_theme_file_uri('resources/images/youtube-preview.png') }}" 
                alt="YouTube Kintsugi" 
                class="w-auto max-w-full h-auto rounded-lg shadow-lg"
              >
            @endif
          </div>
        </div>

        <!-- Texto a la derecha -->
        <div class="md:w-1/2">
          <h3 class="text-2xl font-bold text-[#D93280] mb-6">Youtube</h3>
          <p class="text-base text-[#030D55] mb-4">
            ¡Visita nuestro canal de psicología en YouTube para encontrar contenido que te ayuda a mejorar tu bienestar emocional! Suscríbete para acceder a consejos prácticos y técnicas útiles elaboradas por psicólogos expertos. ¿Conoces la transformación que puede experimentar tu vida?
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- Sección 2: Síguenos en redes sociales -->
  <section class="bg-white py-16 relative">
    <div class="container mx-auto px-4 relative">
      <!-- Contenido centrado -->
      <div class="max-w-5xl mx-auto text-center relative">
        <h2 class="text-4xl font-bold text-[#030D55] mb-16" style="font-family: 'Playfair Display', serif;">
          Síguenos en nuestras redes sociales
        </h2>
        
        @php
          // Intentar ejecutar el shortcode para perfiles gestionados por el plugin
          $perfiles_content = do_shortcode('[administracion_perfiles]');
          
          // Verificar si el shortcode se ejecutó correctamente
          $perfiles_plugin_active = ($perfiles_content !== '[administracion_perfiles]');
        @endphp
        
        @if($perfiles_plugin_active)
          {!! $perfiles_content !!}
        @else
          <!-- Fallback: Diseño estático de perfiles cuando el plugin no está activo -->
          <!-- Perfiles de Instagram -->
          <div class="flex flex-col md:flex-row items-center justify-center gap-12 md:gap-24">
            <!-- Perfil de Julio César -->
            <div class="text-center">
              <div class="w-48 h-48 rounded-full bg-[#8961C440] p-1 mx-auto mb-4">
                <img 
                  src="{{ get_theme_file_uri('resources/images/julio.png') }}" 
                  alt="Julio César" 
                  class="w-full h-full object-cover rounded-full"
                >
              </div>
              <p class="text-[#030D55] font-semibold mb-3">@psicologo_juliocesar</p>
              
              <!-- Iconos de redes sociales -->
              <div class="flex justify-center gap-2">
                <a href="#" class="w-8 h-8 bg-[#D93280] rounded-md flex items-center justify-center text-white">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                </a>
                <a href="#" class="w-8 h-8 bg-[#D93280] rounded-md flex items-center justify-center text-white">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M22.675 0h-21.35c-.732 0-1.325.593-1.325 1.325v21.351c0 .731.593 1.324 1.325 1.324h11.495v-9.294h-3.128v-3.622h3.128v-2.671c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.313h3.587l-.467 3.622h-3.12v9.293h6.116c.73 0 1.323-.593 1.323-1.325v-21.35c0-.732-.593-1.325-1.325-1.325z"/></svg>
                </a>
                <a href="#" class="w-8 h-8 bg-[#D93280] rounded-md flex items-center justify-center text-white">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"/></svg>
                </a>
                <a href="#" class="w-8 h-8 bg-[#D93280] rounded-md flex items-center justify-center text-white">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg>
                </a>
              </div>
            </div>
            
            <!-- Perfil de Shenhui -->
            <div class="text-center">
              <div class="w-48 h-48 rounded-full bg-[#F5B3F380] p-1 mx-auto mb-4">
                <img 
                  src="{{ get_theme_file_uri('resources/images/shenhui.png') }}" 
                  alt="Shenhui" 
                  class="w-full h-full object-cover rounded-full"
                >
              </div>
              <p class="text-[#030D55] font-semibold mb-3">@psicologa_shenhui</p>
              
              <!-- Iconos de redes sociales -->
              <div class="flex justify-center gap-2">
                <a href="#" class="w-8 h-8 bg-[#D93280] rounded-md flex items-center justify-center text-white">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                </a>
                <a href="#" class="w-8 h-8 bg-[#D93280] rounded-md flex items-center justify-center text-white">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M22.675 0h-21.35c-.732 0-1.325.593-1.325 1.325v21.351c0 .731.593 1.324 1.325 1.324h11.495v-9.294h-3.128v-3.622h3.128v-2.671c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.313h3.587l-.467 3.622h-3.12v9.293h6.116c.73 0 1.323-.593 1.323-1.325v-21.35c0-.732-.593-1.325-1.325-1.325z"/></svg>
                </a>
                <a href="#" class="w-8 h-8 bg-[#D93280] rounded-md flex items-center justify-center text-white">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"/></svg>
                </a>
                <a href="#" class="w-8 h-8 bg-[#D93280] rounded-md flex items-center justify-center text-white">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg>
                </a>
              </div>
            </div>
          </div>
        @endif
      </div>
    </div>
  </section>
@endsection
