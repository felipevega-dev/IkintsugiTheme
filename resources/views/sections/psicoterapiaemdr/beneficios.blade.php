{{--
  Template Name: Beneficios EMDR
--}}

@extends('layouts.app')

@section('content')
  <!-- Hero Section con fondo blanco y figura morada alrededor de la foto -->
  <section class="relative bg-white overflow-x-hidden">
    <!-- Contenido del hero -->
    <div class="container mx-auto px-4 py-12 lg:py-28 relative z-10">
      <div class="flex flex-col lg:flex-row items-center">
        <!-- Columna de texto -->
        <div class="lg:w-1/2 mb-8 lg:mb-12" data-aos="fade-right" data-aos-duration="600">
          <span class="text-[#AB277A] text-sm md:text-base uppercase tracking-wider font-medium mb-2 block">¿Cómo me puede ayudar EMDR?          </span>
          <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-[#030D55] mb-4 md:mb-8 leading-none transition-all duration-500 hover:text-[#AB277A] font-paytone" style="line-height: 1.1;">
          Reconoce, sana y avanza con EMDR
          </h1>
          <p class="text-2xl md:text-4xl text-[#AB277A] transition-all duration-300 hover:translate-x-2" style="font-family: 'Hugamour', sans-serif;">
            #El trauma se puede superar
          </p>

          <!-- Iconos de redes sociales -->
          <div class="flex items-center gap-3 mt-5">
            <p class="text-sm md:text-base text-[#AB277A] font-medium">Síguenos:</p>
            <div class="flex gap-4">
              <a href="https://www.instagram.com/instituto_kintsugi/" target="_blank" class="text-[#AB277A] hover:text-[#030D55] transition-all duration-300 transform hover:scale-110">
                <svg class="h-6 w-6 md:h-7 md:w-7" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                  <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/>
                </svg>
              </a>
              <a href="https://www.facebook.com/Ikintsugi/" target="_blank" class="text-[#AB277A] hover:text-[#030D55] transition-all duration-300 transform hover:scale-110">
                <svg class="h-6 w-6 md:h-7 md:w-7" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                  <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd"></path>
                </svg>
              </a>
              <a href="https://www.youtube.com/@emisorkintsugi" target="_blank" class="text-[#AB277A] hover:text-[#030D55] transition-all duration-300 transform hover:scale-110">
                <svg class="h-6 w-6 md:h-7 md:w-7" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                  <path fill-rule="evenodd" d="M19.812 5.418c.861.23 1.538.907 1.768 1.768C21.998 8.746 22 12 22 12s0 3.255-.418 4.814a2.504 2.504 0 0 1-1.768 1.768c-1.56.419-7.814.419-7.814.419s-6.255 0-7.814-.419a2.505 2.505 0 0 1-1.768-1.768C2 15.255 2 12 2 12s0-3.255.417-4.814a2.507 2.507 0 0 1 1.768-1.768C5.744 5 11.998 5 11.998 5s6.255 0 7.814.418ZM15.194 12 10 15V9l5.194 3Z" clip-rule="evenodd" />
                </svg>
              </a>
              <a href="https://open.spotify.com/show/08J06mjqK1UxNgXPTVlMkJ?nd=1&dlsi=74d83d61fb964b4a" target="_blank" class="text-[#AB277A] hover:text-[#030D55] transition-all duration-300 transform hover:scale-110">
                <svg class="h-6 w-6 md:h-7 md:w-7" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                  <path d="M12 0C5.4 0 0 5.4 0 12s5.4 12 12 12 12-5.4 12-12S18.66 0 12 0zm5.521 17.34c-.24.359-.66.48-1.021.24-2.82-1.74-6.36-2.101-10.561-1.141-.418.122-.779-.179-.899-.539-.12-.421.18-.78.54-.9 4.56-1.021 8.52-.6 11.64 1.32.42.18.479.659.301 1.02zm1.44-3.3c-.301.42-.841.6-1.262.3-3.239-1.98-8.159-2.58-11.939-1.38-.479.12-1.02-.12-1.14-.6-.12-.48.12-1.021.6-1.141C9.6 9.9 15 10.561 18.72 12.84c.361.181.54.78.241 1.2zm.12-3.36C15.24 8.4 8.82 8.16 5.16 9.301c-.6.179-1.2-.181-1.38-.721-.18-.601.18-1.2.72-1.381 4.26-1.26 11.28-1.02 15.721 1.621.539.3.719 1.02.419 1.56-.299.421-1.02.599-1.559.3z"/>
                </svg>
              </a>
            </div>
          </div>
        </div>
        
        <!-- Imagen a la derecha con fondo morado -->
        <div class="lg:w-1/2 flex justify-center lg:justify-end relative lg:mt-10" data-aos="fade-left" data-aos-duration="600">
          <div class="relative w-full max-w-[800px] mx-auto">
            <div class="relative">
              <!-- Imagen actual -->
              <img 
                src="{{ get_theme_file_uri('resources/images/beneficiosfull.png') }}" 
                alt="Persona en sesión de terapia" 
                class="relative z-10 w-full h-auto transition-transform duration-500 hover:scale-105"
              >
            </div>
          </div>
        </div>
      </div>
      
      <!-- Botón Reservar Cita solo en mobile -->
      <div class="md:hidden flex justify-center mt-6 mb-2">
        <a href="{{ home_url('/reservar-cita') }}" 
           class="bg-gradient-to-r from-pink-500 to-purple-600 hover:from-pink-600 hover:to-purple-700 
                  text-white px-6 py-2 rounded-full font-medium transition-all 
                  duration-300 transform hover:scale-105 shadow-md hover:shadow-lg 
                  text-base font-roboto">
          Reservar Cita
        </a>
      </div>
    </div>

  </section>

  
  <!-- MISIÓN Y VALORES SECTION (antes en mision-valores.blade.php) -->
  <section class="py-16 md:py-24 relative overflow-x-hidden" style="background-color: #030D550D;">
    <!-- Fondo con imagen vectorial y efecto de degradado -->
    <div class="absolute top-0 left-0 w-full h-full z-0">
      <img src="{{ get_theme_file_uri('resources/images/vector1.png') }}" alt="Fondo" class="w-full h-full object-cover">
      <div class="absolute top-0 left-0 w-full h-full" style="background: linear-gradient(180deg, rgba(171, 39, 122, 0.4) 0%, rgba(3, 13, 85, 0.4) 61%);"></div>
      <div class="absolute top-0 left-0 w-full h-full">
        <img src="{{ get_theme_file_uri('resources/images/vector2.png') }}" alt="Efecto sombra" class="w-full h-full object-cover opacity-70 mix-blend-multiply">
      </div>
      
      <!-- Curva superior integrada en el fondo -->
      <div class="absolute top-0 left-0 right-0 w-full z-10">
        <svg width="100%" height="70" viewBox="0 0 1440 70" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M0,35 C240,0 480,0 720,35 C960,70 1200,70 1440,35 L1440,0 L0,0 Z" fill="white"></path>
        </svg>
      </div>
    </div>
    
    <!-- Contenido -->
    <div class="container mx-auto px-4 relative z-20">
      <!-- Título principal con animación -->
      <div class="text-center mb-12 md:mb-16" data-aos="fade-up" data-aos-duration="800">
        <h2 class="text-3xl md:text-5xl font-bold text-white mb-4 font-paytone">
          ¿Cómo me puede ayudar el EMDR?
        </h2>
        <div class="w-24 h-1 bg-gradient-to-r from-[#FF3382] to-[#8961C4] mx-auto mt-2 animate-pulse"></div>
      </div>

      <!-- Tarjetas con efecto toggle -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-8 relative">
        
        <!-- Tarjeta 1: Vivencias dolorosas -->
        <div class="bg-white/90 rounded-xl shadow-lg overflow-hidden transition-all duration-500 hover:shadow-xl hover:translate-y-[-8px] group" data-aos="fade-up" data-aos-duration="600" data-aos-delay="100">
          <div class="relative">
            <!-- Decoración superior -->
            <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-[#AB277A] to-[#8961C4]"></div>
            
            <div class="pt-8 pb-4 px-6">
              <h3 class="text-xl font-bold text-[#030D55] text-center mb-4 transition-all duration-300 hover:text-[#AB277A] font-paytone">
                Vivencias dolorosas
              </h3>
              
              <!-- Lista simplificada -->
              <ul class="space-y-2 mb-4">
                <li class="flex items-start">
                  <span class="text-[#AB277A] mr-2">•</span>
                  <span class="text-sm">Trauma por maltrato, abuso o violencia</span>
                </li>
                <li class="flex items-start">
                  <span class="text-[#AB277A] mr-2">•</span>
                  <span class="text-sm">Experiencias de bullying o acoso</span>
                </li>
                <li class="flex items-start">
                  <span class="text-[#AB277A] mr-2">•</span>
                  <span class="text-sm">Pesadillas y flashbacks recurrentes</span>
                </li>
                <li class="flex items-start">
                  <span class="text-[#AB277A] mr-2">•</span>
                  <span class="text-sm">Recuerdos dolorosos persistentes</span>
                </li>
              </ul>
              
              <!-- Botón de expansión -->
              <div class="text-center">
                <button class="toggle-content text-sm font-medium text-[#FF3382] hover:text-[#030D55] transition-colors duration-300 flex items-center justify-center mx-auto" data-target="content-1">
                  <span class="show-more">Leer más</span>
                  <span class="show-less hidden">Leer menos</span>
                  <svg class="h-4 w-4 ml-1 arrow-down transition-transform duration-300" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                  </svg>
                </button>
              </div>
            </div>
          </div>
          
          <!-- Contenido expandible -->
          <div id="content-1" class="hidden-content hidden px-6 pb-6 max-h-0 overflow-hidden transition-all duration-500 ease-in-out opacity-0" style="transition: max-height 0.5s ease, opacity 0.5s ease;">
            <p class="text-sm text-gray-700 mt-2">
              Si has experimentado situaciones negativas que han dejado una marca profunda en tu vida, es posible que, a pesar de haber transcurrido años, continúen afectándote. EMDR te ofrece la posibilidad de reprocesar estos recuerdos dolorosos, disminuyendo su carga emocional y permitiéndote avanzar hacia una vida más tranquila y plena.
            </p>
            <div class="mt-4 bg-[#F9F5FF] rounded-lg p-3">
              <p class="text-xs italic text-[#030D55]">
                "EMDR permite que los recuerdos traumáticos pierdan su intensidad emocional, transformándose en recuerdos neutrales que ya no perturban tu presente."
              </p>
            </div>
          </div>
        </div>
        
        <!-- Tarjeta 2: Trastornos -->
        <div class="bg-white/90 rounded-xl shadow-lg overflow-hidden transition-all duration-500 hover:shadow-xl hover:translate-y-[-8px] group" data-aos="fade-up" data-aos-duration="600" data-aos-delay="200">
          <div class="relative">
            <!-- Decoración superior -->
            <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-[#AB277A] to-[#8961C4]"></div>
            
            <div class="pt-8 pb-4 px-6">
              <h3 class="text-xl font-bold text-[#030D55] text-center mb-4 transition-all duration-300 hover:text-[#AB277A] font-paytone">
                Trastornos
              </h3>
              
              <!-- Lista simplificada -->
              <ul class="space-y-2 mb-4">
                <li class="flex items-start">
                  <span class="text-[#AB277A] mr-2">•</span>
                  <span class="text-sm">Trastorno de estrés postraumático</span>
                </li>
                <li class="flex items-start">
                  <span class="text-[#AB277A] mr-2">•</span>
                  <span class="text-sm">Ansiedad y crisis de pánico</span>
                </li>
                <li class="flex items-start">
                  <span class="text-[#AB277A] mr-2">•</span>
                  <span class="text-sm">Depresión y estados de ánimo</span>
                </li>
                <li class="flex items-start">
                  <span class="text-[#AB277A] mr-2">•</span>
                  <span class="text-sm">TOC y trastornos alimentarios</span>
                </li>
              </ul>
              
              <!-- Botón de expansión -->
              <div class="text-center">
                <button class="toggle-content text-sm font-medium text-[#FF3382] hover:text-[#030D55] transition-colors duration-300 flex items-center justify-center mx-auto" data-target="content-2">
                  <span class="show-more">Leer más</span>
                  <span class="show-less hidden">Leer menos</span>
                  <svg class="h-4 w-4 ml-1 arrow-down transition-transform duration-300" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                  </svg>
                </button>
              </div>
            </div>
          </div>
          
          <!-- Contenido expandible -->
          <div id="content-2" class="hidden-content hidden px-6 pb-6 max-h-0 overflow-hidden transition-all duration-500 ease-in-out opacity-0" style="transition: max-height 0.5s ease, opacity 0.5s ease;">
            <p class="text-sm text-gray-700 mt-2">
              Si padeces síntomas como angustia, tristeza, ira o pensamientos negativos debido a condiciones psiquiátricas, la psicoterapia EMDR puede ser una herramienta efectiva en tu proceso de recuperación. EMDR puede ayudarte a procesar las experiencias subyacentes que alimentan estos trastornos.
            </p>
            <div class="mt-4 bg-[#F9F5FF] rounded-lg p-3">
              <p class="text-xs italic text-[#030D55]">
                "EMDR trabaja directamente con las redes de memoria donde se almacenan las experiencias que contribuyen a los síntomas actuales, permitiendo una transformación profunda."
              </p>
            </div>
          </div>
        </div>
        
        <!-- Tarjeta 3: Malestares emocionales -->
        <div class="bg-white/90 rounded-xl shadow-lg overflow-hidden transition-all duration-500 hover:shadow-xl hover:translate-y-[-8px] group" data-aos="fade-up" data-aos-duration="600" data-aos-delay="300">
          <div class="relative">
            <!-- Decoración superior -->
            <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-[#AB277A] to-[#8961C4]"></div>
            
            <div class="pt-8 pb-4 px-6">
              <h3 class="text-xl font-bold text-[#030D55] text-center mb-4 transition-all duration-300 hover:text-[#AB277A] font-paytone">
                Malestares emocionales
              </h3>
              
              <!-- Lista simplificada -->
              <ul class="space-y-2 mb-4">
                <li class="flex items-start">
                  <span class="text-[#AB277A] mr-2">•</span>
                  <span class="text-sm">Baja autoestima e inseguridad</span>
                </li>
                <li class="flex items-start">
                  <span class="text-[#AB277A] mr-2">•</span>
                  <span class="text-sm">Dificultad para tomar decisiones</span>
                </li>
                <li class="flex items-start">
                  <span class="text-[#AB277A] mr-2">•</span>
                  <span class="text-sm">Creencias negativas limitantes</span>
                </li>
                <li class="flex items-start">
                  <span class="text-[#AB277A] mr-2">•</span>
                  <span class="text-sm">Culpa y auto-exigencia excesivas</span>
                </li>
              </ul>
              
              <!-- Botón de expansión -->
              <div class="text-center">
                <button class="toggle-content text-sm font-medium text-[#FF3382] hover:text-[#030D55] transition-colors duration-300 flex items-center justify-center mx-auto" data-target="content-3">
                  <span class="show-more">Leer más</span>
                  <span class="show-less hidden">Leer menos</span>
                  <svg class="h-4 w-4 ml-1 arrow-down transition-transform duration-300" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                  </svg>
                </button>
              </div>
            </div>
          </div>
          
          <!-- Contenido expandible -->
          <div id="content-3" class="hidden-content hidden px-6 pb-6 max-h-0 overflow-hidden transition-all duration-500 ease-in-out opacity-0" style="transition: max-height 0.5s ease, opacity 0.5s ease;">
            <p class="text-sm text-gray-700 mt-2">
              Si sufres de malestares psicológicos como baja autoestima, inseguridad o creencias negativas y limitantes, EMDR puede ayudarte a identificar y transformar las experiencias de vida que alimentan estas percepciones, permitiéndote vivir con mayor libertad emocional.
            </p>
            <div class="mt-4 bg-[#F9F5FF] rounded-lg p-3">
              <p class="text-xs italic text-[#030D55]">
                "EMDR facilita la integración de nuevas perspectivas más saludables sobre ti mismo/a y los demás, generando cambios profundos en cómo te relacionas contigo y con el mundo."
              </p>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Llamado a la acción -->
      <div class="mt-16 text-center" data-aos="fade-up" data-aos-duration="600" data-aos-delay="400">
        <a href="/reservar-cita" class="inline-flex items-center justify-center py-3 px-8 text-white rounded-full font-medium bg-gradient-to-r from-[#FF3382] to-[#5A0989] hover:opacity-90 transition-all duration-300 transform hover:scale-105 shadow-lg">
          <span>Agenda una consulta</span>
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
          </svg>
        </a>
      </div>
    </div>
  </section>
  
  <!-- Segunda sección con fondo blanco-->
  <section class="bg-white py-10 lg:py-16 overflow-x-hidden">
    <div class="container mx-auto px-4 max-w-8xl">
      <div class="flex flex-col lg:flex-row items-center gap-4">
        <!-- Imagen a la izquierda -->
        <div class="lg:w-1/2 flex justify-center lg:justify-start relative order-2 lg:order-1" data-aos="fade-right" data-aos-duration="600">
          
          <img 
            src="{{ get_theme_file_uri('resources/images/beneficios2.png') }}" 
            alt="Qué nos inspira" 
            class="max-w-full h-auto rounded-lg relative z-10 transition-transform duration-500 hover:scale-105 w-[90%] md:w-[95%] lg:w-auto"
            style="max-width: 543px;"
          >
        </div>
        
        <!-- Texto explicativo -->
        <div class="lg:w-1/2 mb-8 lg:mb-0 pr-0 lg:pr-6 order-1 lg:order-2" data-aos="fade-left" data-aos-duration="600">
          <h2 class="text-2xl md:text-4xl lg:text-4xl font-bold text-[#030D55] mb-8 transition-all duration-500 hover:text-[#AB277A] font-paytone">
            ¿Qué haremos con la psicoterapia EMDR?
          </h2>
          
          <div class="prose prose-lg">
            <p class="font-normal text-base leading-7 transition-all duration-300 hover:translate-y-[-2px]">
            Nuestro trabajo en conjunto se basa en tu compromiso, paciencia, constancia y participación hacia una vida mejor. El proceso terapéutico incluye:
            </p>
            
            <ul class="mt-4 space-y-3">
              <li class="font-normal text-base leading-7 transition-all duration-300 hover:translate-x-1" data-aos="fade-up" data-aos-duration="400" data-aos-delay="100">
                <strong>Identificación:</strong> Analizaremos los síntomas y los disparadores o gatillantes que afectan tu bienestar.
              </li>
              <li class="font-normal text-base leading-7 transition-all duration-300 hover:translate-x-1" data-aos="fade-up" data-aos-duration="400" data-aos-delay="150">
                <strong>Exploración de causas:</strong> Investigaremos las raíces de estos problemas, que a menudo se originan en la infancia o juventud.
              </li>
              <li class="font-normal text-base leading-7 transition-all duration-300 hover:translate-x-1" data-aos="fade-up" data-aos-duration="400" data-aos-delay="200">
                <strong>Plan de intervención:</strong> Diseñaremos un plan personalizado que aborde tanto recuerdos explícitos como implícitos responsables de tu malestar actual.
              </li>
              <li class="font-normal text-base leading-7 transition-all duration-300 hover:translate-x-1" data-aos="fade-up" data-aos-duration="400" data-aos-delay="250">
                <strong>Desarrollo de recursos:</strong> Evaluaremos tus mecanismos de regulación emocional, tus relaciones interpersonales y estrategias de defensa, para implementar herramientas y recursos que te permitan vivir de manera más equilibrada y satisfactoria.
              </li>
              <li class="font-normal text-base leading-7 transition-all duration-300 hover:translate-x-1" data-aos="fade-up" data-aos-duration="400" data-aos-delay="250">
                <strong>Meta terapéutica:</strong> A través del re-procesamiento adaptativo de las memorias traumáticas, buscamos disminuir la intensidad de los síntomas (ansiedad, pesadillas, evitación, hipervigilancia) y promover la integración cognitiva, emocional y corporal de tus experiencias. El objetivo es que recuperes el control de tu vida, fortalezcas tu resiliencia y alcances una calidad de vida plena, con mayor seguridad interna y capacidad de disfrutar de tus relaciones y actividades cotidianas.

              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <!-- Script para el toggle -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const toggleButtons = document.querySelectorAll('.toggle-content');
      const contentDivs = document.querySelectorAll('.hidden-content');
      const isMobile = window.innerWidth < 768;
      
      // Función para cerrar todos los contenidos expandidos
      function closeAllContents() {
        contentDivs.forEach(div => {
          // Solo procesar los que están abiertos
          if (!div.classList.contains('hidden')) {
            // Ocultar el contenido
            div.style.maxHeight = '0';
            div.style.opacity = '0';
            
            // Después de la transición, añadir clase hidden
            setTimeout(() => {
              div.classList.add('hidden');
            }, 500);
            
            // Actualizar el botón asociado
            const buttonId = div.id.replace('content-', '');
            const button = document.querySelector(`[data-target="content-${buttonId}"]`);
            if (button) {
              const showMore = button.querySelector('.show-more');
              const showLess = button.querySelector('.show-less');
              const arrow = button.querySelector('.arrow-down');
              
              showMore.classList.remove('hidden');
              showLess.classList.add('hidden');
              arrow.classList.remove('rotate-180');
            }
          }
        });
      }
      
      // Función para abrir un contenido específico
      function openContent(contentDiv, button) {
        // Primero muestra el elemento, pero con altura 0
        contentDiv.classList.remove('hidden');
        
        // Necesitamos un pequeño retraso para que la transición funcione
        setTimeout(() => {
          // Establecer max-height a un valor grande para que la animación funcione
          contentDiv.style.maxHeight = contentDiv.scrollHeight + 'px';
          contentDiv.style.opacity = '1';
        }, 10);
        
        // Actualizar botón
        const showMore = button.querySelector('.show-more');
        const showLess = button.querySelector('.show-less');
        const arrow = button.querySelector('.arrow-down');
        
        showMore.classList.add('hidden');
        showLess.classList.remove('hidden');
        arrow.classList.add('rotate-180');
      }
      
      // Función para abrir todos los contenidos en desktop
      function openAllContents() {
        contentDivs.forEach((div, index) => {
          const button = toggleButtons[index];
          openContent(div, button);
        });
      }
      
      // Manejar el evento resize para actualizar isMobile
      window.addEventListener('resize', function() {
        const wasDesktop = !isMobile;
        const newIsMobile = window.innerWidth < 768;
        
        // Si cambiamos de desktop a mobile, cerramos todos los contenidos
        if (wasDesktop && newIsMobile) {
          closeAllContents();
        }
      });
      
      toggleButtons.forEach(button => {
        button.addEventListener('click', function() {
          const targetId = this.getAttribute('data-target');
          const contentDiv = document.getElementById(targetId);
          const isMobileNow = window.innerWidth < 768;
          
          // Alternar el estado actual
          const isHidden = contentDiv.classList.contains('hidden');
          
          if (isHidden) {
            // En móvil, cierra todos y luego abre el seleccionado
            // En desktop, abre todos los contenidos
            if (isMobileNow) {
              // Comportamiento móvil
              closeAllContents();
              
              // Abrir el contenido actual con un pequeño retraso
              setTimeout(() => {
                openContent(contentDiv, this);
              }, 50);
            } else {
              // Comportamiento desktop - abrir todos los contenidos
              openAllContents();
            }
          } else {
            // Ocultar con animación
            if (isMobileNow) {
              // En móvil, solo cierra el actual
              contentDiv.style.maxHeight = '0';
              contentDiv.style.opacity = '0';
              
              // Después de la transición, añadir clase hidden
              setTimeout(() => {
                contentDiv.classList.add('hidden');
              }, 500); // Debe coincidir con la duración de la transición
              
              // Actualizar botón
              const showMore = this.querySelector('.show-more');
              const showLess = this.querySelector('.show-less');
              const arrow = this.querySelector('.arrow-down');
              
              showMore.classList.remove('hidden');
              showLess.classList.add('hidden');
              arrow.classList.remove('rotate-180');
            } else {
              // En desktop, cerrar todos
              closeAllContents();
            }
          }
        });
      });
    });
  </script>
@endsection
