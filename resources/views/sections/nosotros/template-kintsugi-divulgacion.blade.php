{{--
  Template Name: Divulgación Científica
--}}

@extends('layouts.app')

@section('content')
  <!-- Hero Section con fondo blanco y figura morada alrededor de la foto -->
  <section class="relative bg-white overflow-hidden">
    <!-- Contenido del hero -->
    <div class="container mx-auto px-4 py-20 lg:py-28 relative z-10 mt-15">
      <div class="flex flex-col lg:flex-row items-center">
        <!-- Columna de texto -->
        <div class="lg:w-1/2 mb-12 lg:mb-0" data-aos="fade-right" data-aos-duration="600">
          <span class="text-[#AB277A] text-sm md:text-base uppercase tracking-wider font-medium mb-2 block">Divulgación científica</span>
          <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-[#030D55] mb-8 leading-none transition-all duration-500 hover:text-[#AB277A] font-paytone">
          Conocerte, tu primer paso al bienestar
          </h1>
          <p class="text-4xl mt-14 text-[#AB277A] transition-all duration-300 hover:translate-x-2" style="font-family: 'Hugamour', sans-serif;">
            #Mereces una vida mejor
          </p>
        </div>
        
        <!-- Imagen a la derecha con fondo morado -->
        <div class="lg:w-1/2 flex justify-center lg:justify-end relative" data-aos="fade-left" data-aos-duration="600">
          <!-- Fondo morado orgánico que rodea la imagen con medidas precisas -->
          <div class="absolute inset-0 z-0 transition-transform duration-700 hover:scale-105">
            <svg width="586.48px" height="565.73px" viewBox="0 0 586.48 565.73" fill="none" xmlns="http://www.w3.org/2000/svg" style="position: absolute; top: 0; left: 0;">
              <path d="M140,60 C100,110 20,180 40,280 C60,380 120,420 180,460 C240,500 300,540 400,500 C500,460 580,380 560,280 C540,200 500,160 440,100 C380,40 300,20 220,20 C180,20 180,10 140,60 Z" fill="#8961C4"/>
            </svg>
          </div>
          
          <!-- Elementos gráficos de fondo -->
          <div class="absolute w-16 h-16 rounded-full bg-[#9978d1] opacity-40 top-10 left-5 z-0 animate-pulse"></div>
          <div class="absolute w-12 h-12 rounded-full bg-[#9978d1] opacity-30 bottom-10 right-10 z-0 animate-pulse" style="animation-delay: 1s;"></div>
          <!-- Líneas decorativas -->
          <div class="absolute h-[40%] w-px bg-white opacity-20 top-10 left-1/3 z-0"></div>
          <div class="absolute h-px w-[20%] bg-white opacity-20 top-1/3 right-20 z-0"></div>
          
          <!-- Imagen actual -->
          <img 
            src="{{ get_theme_file_uri('resources/images/divulgacion.png') }}" 
            alt="Divulgación científica" 
            class="max-w-full h-auto rounded-lg relative z-10 transition-transform duration-500 hover:scale-105"
            style="max-width: 580px; position: relative;"
          >
        </div>
      </div>
    </div>
    
    <!-- Curvatura inferior más pronunciada -->
    <div class="absolute bottom-0 left-0 right-0 h-20">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" preserveAspectRatio="none" class="w-full h-full">
        <path fill="#CCA0E00D" fill-opacity="1" d="M0,96L48,112C96,128,192,160,288,186.7C384,213,480,235,576,224C672,213,768,171,864,149.3C960,128,1056,128,1152,149.3C1248,171,1344,213,1392,234.7L1440,256L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
      </svg>
    </div>
  </section>
  
  <!-- Segunda sección con fondo lavanda claro -->
  <section class="bg-[#CCA0E00D] py-10 lg:py-16">
    <div class="container mx-auto px-4">
      <!-- Contenido centrado -->
      <div class="max-w-4xl mx-auto text-center" data-aos="fade-up" data-aos-duration="600">
        <h2 class="text-2xl md:text-4xl lg:text-5xl font-bold text-[#030D55] mb-8 transition-all duration-500 hover:text-[#AB277A] font-paytone">
          Divulgación científica de la salud mental
        </h2>
        
        <div class="prose prose-lg mx-auto">
          <p class="font-normal text-base leading-7 text-center transition-all duration-300 hover:translate-y-[-2px]">
            Como Kintsugi creemos que es necesario acercarnos y familiarizarnos como sociedad a los aspectos esenciales de nuestra constitución humana.
          </p>
          
          <p class="font-normal text-base leading-7 mt-4 text-center transition-all duration-300 hover:translate-y-[-2px]">
            Preguntas fundamentales como ¿quiénes somos?, el sentido de la vida, la identidad, los fenómenos de nuestra subjetividad. Comprender ¿cómo funcionamos respecto de nuestras emociones, pensamientos y relación con el cuerpo? o también comprender ¿cómo nos relacionamos y generamos vínculos?, entre otros aspectos.
          </p>
          
          <p class="font-normal text-base leading-7 mt-4 text-center transition-all duration-300 hover:translate-y-[-2px]">
            De esta forma, intentamos transmitir aspectos de la psicología, felicidad y neurociencia en el ser humano, en lenguaje sencillo, cercano, amoroso. Mediante programas de radio, entrevistas, lives, blogs y podcasts.
          </p>
        </div>
        
        <!-- Sección de redes sociales -->
        <div class="mt-20 mb-10" data-aos="fade-up" data-aos-duration="600" data-aos-delay="100">
          <h3 class="text-xl md:text-2xl font-bold text-[#030D55] mb-6 transition-all duration-500 hover:text-[#AB277A] font-paytone">
            Síguenos en nuestras redes sociales
          </h3>
          
          <div class="flex justify-center items-center gap-8 mt-6">
            <!-- Instagram -->
            <a href="https://www.instagram.com/instituto_kintsugi/" target="_blank" class="text-[#FF3382] hover:text-[#D93280] transition-all duration-300 transform hover:scale-110 border-2 border-[#FF3382] hover:border-[#D93280] rounded-full p-2 hover:shadow-md">
              <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/>
              </svg>
            </a>
            
            <!-- Facebook -->
            <a href="https://www.facebook.com/Ikintsugi/" target="_blank" class="text-[#FF3382] hover:text-[#D93280] transition-all duration-300 transform hover:scale-110 border-2 border-[#FF3382] hover:border-[#D93280] rounded-full p-2 hover:shadow-md">
              <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd"></path>
              </svg>
            </a>
            
            <!-- YouTube -->
            <a href="https://www.youtube.com/@emisorkintsugi" target="_blank" class="text-[#FF3382] hover:text-[#D93280] transition-all duration-300 transform hover:scale-110 border-2 border-[#FF3382] hover:border-[#D93280] rounded-full p-2 hover:shadow-md">
              <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path fill-rule="evenodd" d="M19.812 5.418c.861.23 1.538.907 1.768 1.768C21.998 8.746 22 12 22 12s0 3.255-.418 4.814a2.504 2.504 0 0 1-1.768 1.768c-1.56.419-7.814.419-7.814.419s-6.255 0-7.814-.419a2.505 2.505 0 0 1-1.768-1.768C2 15.255 2 12 2 12s0-3.255.417-4.814a2.507 2.507 0 0 1 1.768-1.768C5.744 5 11.998 5 11.998 5s6.255 0 7.814.418ZM15.194 12 10 15V9l5.194 3Z" clip-rule="evenodd" />
              </svg>
            </a>

            <!-- Spotify -->
             <a href="https://open.spotify.com/show/08J06mjqK1UxNgXPTVlMkJ?nd=1&dlsi=74d83d61fb964b4a" target="_blank" class="text-[#FF3382] hover:text-[#D93280] transition-all duration-300 transform hover:scale-110 border-2 border-[#FF3382] hover:border-[#D93280] rounded-full p-2 hover:shadow-md">
              <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
              <path d="M12 0C5.4 0 0 5.4 0 12s5.4 12 12 12 12-5.4 12-12S18.66 0 12 0zm5.521 17.34c-.24.359-.66.48-1.021.24-2.82-1.74-6.36-2.101-10.561-1.141-.418.122-.779-.179-.899-.539-.12-.421.18-.78.54-.9 4.56-1.021 8.52-.6 11.64 1.32.42.18.479.659.301 1.02zm1.44-3.3c-.301.42-.841.6-1.262.3-3.239-1.98-8.159-2.58-11.939-1.38-.479.12-1.02-.12-1.14-.6-.12-.48.12-1.021.6-1.141C9.6 9.9 15 10.561 18.72 12.84c.361.181.54.78.241 1.2zm.12-3.36C15.24 8.4 8.82 8.16 5.16 9.301c-.6.179-1.2-.181-1.38-.721-.18-.601.18-1.2.72-1.381 4.26-1.26 11.28-1.02 15.721 1.621.539.3.719 1.02.419 1.56-.299.421-1.02.599-1.559.3z"/>
              </svg>
             </a>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection 