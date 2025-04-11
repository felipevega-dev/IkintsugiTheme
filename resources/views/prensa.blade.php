{{--
  Template Name: Prensa
--}}

@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="relative bg-[#362766] overflow-hidden pt-24 md:pt-32">
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

  <!-- Sección 1: Las noticias más recientes -->
  <section class="bg-white py-16 overflow-hidden">
    <div class="container mx-auto px-4">
      <h2 class="text-3xl md:text-4xl font-bold text-[#030D55] mb-8 text-left" style="font-family: 'Playfair Display', serif;">
        Las más recientes
      </h2>

      <!-- Contenedor para las 2 noticias más recientes -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8">
        @php
          // Intentar ejecutar el shortcode para las noticias más recientes
          $recientes_content = do_shortcode('[prensa_recientes]');
              
          // Verificar si el shortcode se ejecutó correctamente
          $recientes_plugin_active = ($recientes_content !== '[prensa_recientes]');
            @endphp
            
        @if($recientes_plugin_active)
          {!! $recientes_content !!}
            @else
          <!-- Noticia 1 (plantilla estática) -->
          <div class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-lg transition-all duration-300">
            <div class="relative">
              <span class="absolute top-3 left-3 bg-[#D93280] text-white text-xs px-3 py-1 rounded-full">30 de marzo de 2023</span>
              <img 
                src="{{ get_theme_file_uri('resources/images/noticia1.png') }}" 
                alt="EMDR puede tratar el estrés postraumático" 
                class="w-full h-[220px] object-cover"
              >
              <div class="p-6">
                <h3 class="text-lg md:text-xl font-bold text-[#030D55] mb-3 line-clamp-2">EMDR puede tratar el estrés postraumático en víctimas de bullying</h3>
                <p class="text-sm text-gray-600 line-clamp-3 mb-4">El psicólogo Julio César de Instituto Kintsugi explica cómo la terapia EMDR ha demostrado gran efectividad en el tratamiento del estrés postraumático causado por situaciones de acoso escolar...</p>
                <a href="#" class="text-[#D93280] text-sm font-medium hover:underline">Leer más</a>
          </div>
        </div>
      </div>

          <!-- Noticia 2 (plantilla estática) -->
          <div class="bg-white rounded-xl overflow-hidden shadow-md hover:shadow-lg transition-all duration-300">
            <div class="relative">
              <span class="absolute top-3 left-3 bg-[#D93280] text-white text-xs px-3 py-1 rounded-full">14 de febrero de 2023</span>
              <img 
                src="{{ get_theme_file_uri('resources/images/noticia2.png') }}" 
                alt="Cómo superar una ruptura amorosa" 
                class="w-full h-[220px] object-cover"
              >
              <div class="p-6">
                <h3 class="text-lg md:text-xl font-bold text-[#030D55] mb-3 line-clamp-2">Cómo superar una ruptura amorosa con ayuda de la terapia</h3>
                <p class="text-sm text-gray-600 line-clamp-3 mb-4">La psicóloga Shenhui de Instituto Kintsugi explica en una entrevista para Radio Biobío cómo las rupturas amorosas pueden convertirse en experiencias de crecimiento personal si se abordan adecuadamente...</p>
                <a href="#" class="text-[#D93280] text-sm font-medium hover:underline">Leer más</a>
          </div>
        </div>
        </div>
        @endif
      </div>
    </div>
  </section>

  <!-- Sección 2: Todas las noticias con filtros -->
  <section class="bg-gray-50 py-16 relative">
    <div class="container mx-auto px-4 relative">
      <h2 class="text-3xl md:text-4xl font-bold text-[#030D55] mb-8 text-left" style="font-family: 'Playfair Display', serif;">
        Otras notas de prensa
        </h2>
        
      <!-- Filtros por año -->
      <div class="flex flex-wrap justify-start gap-2 mb-8">
        <button class="px-4 py-2 bg-[#D93280] text-white rounded-lg text-sm font-medium">Todas</button>
        <button class="px-4 py-2 bg-white text-[#030D55] rounded-lg text-sm font-medium border border-gray-200 hover:bg-gray-100">2023</button>
        <button class="px-4 py-2 bg-white text-[#030D55] rounded-lg text-sm font-medium border border-gray-200 hover:bg-gray-100">2022</button>
        <button class="px-4 py-2 bg-white text-[#030D55] rounded-lg text-sm font-medium border border-gray-200 hover:bg-gray-100">2021</button>
      </div>
      
      @php
        // Intentar ejecutar el shortcode para todas las noticias
        $todas_noticias_content = do_shortcode('[prensa_todas]');
          
          // Verificar si el shortcode se ejecutó correctamente
        $todas_noticias_plugin_active = ($todas_noticias_content !== '[prensa_todas]');
        @endphp
        
      @if($todas_noticias_plugin_active)
        {!! $todas_noticias_content !!}
        @else
        <!-- Grid de noticias (plantilla estática) -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
          <!-- Noticia 1 -->
          <div class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-all duration-300">
            <div class="relative">
              <span class="absolute top-3 left-3 bg-[#030D55] bg-opacity-70 text-white text-xs px-3 py-1 rounded-full">21 de enero de 2023</span>
              <img 
                src="{{ get_theme_file_uri('resources/images/prensa3.jpg') }}" 
                alt="La importancia del autocuidado" 
                class="w-full h-[180px] object-cover"
              >
              <div class="p-5">
                <h3 class="text-base font-bold text-[#030D55] mb-2 line-clamp-2">La importancia del autocuidado para profesionales de la salud</h3>
                <p class="text-xs text-gray-600 line-clamp-3 mb-3">El equipo de Instituto Kintsugi participó en un webinar dirigido a profesionales de la salud sobre estrategias de autocuidado...</p>
                <a href="#" class="text-[#D93280] text-xs font-medium hover:underline">Leer más</a>
              </div>
            </div>
          </div>
          
          <!-- Noticia 2 -->
          <div class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-all duration-300">
            <div class="relative">
              <span class="absolute top-3 left-3 bg-[#030D55] bg-opacity-70 text-white text-xs px-3 py-1 rounded-full">15 de diciembre de 2022</span>
              <img 
                src="{{ get_theme_file_uri('resources/images/prensa4.jpg') }}" 
                alt="Cómo afrontar las fiestas" 
                class="w-full h-[180px] object-cover"
              >
              <div class="p-5">
                <h3 class="text-base font-bold text-[#030D55] mb-2 line-clamp-2">Cómo afrontar las fiestas de fin de año tras una pérdida</h3>
                <p class="text-xs text-gray-600 line-clamp-3 mb-3">La psicóloga Shenhui de Instituto Kintsugi comparte recomendaciones para sobrellevar las festividades cuando se ha perdido a un ser querido...</p>
                <a href="#" class="text-[#D93280] text-xs font-medium hover:underline">Leer más</a>
              </div>
            </div>
          </div>
          
          <!-- Noticia 3 -->
          <div class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-all duration-300">
            <div class="relative">
              <span class="absolute top-3 left-3 bg-[#030D55] bg-opacity-70 text-white text-xs px-3 py-1 rounded-full">3 de noviembre de 2022</span>
                <img 
                src="{{ get_theme_file_uri('resources/images/prensa5.jpg') }}" 
                alt="Técnicas de manejo del estrés" 
                class="w-full h-[180px] object-cover"
              >
              <div class="p-5">
                <h3 class="text-base font-bold text-[#030D55] mb-2 line-clamp-2">Técnicas de manejo del estrés y ansiedad para estudiantes</h3>
                <p class="text-xs text-gray-600 line-clamp-3 mb-3">El psicólogo Julio César de Instituto Kintsugi presentó una charla en la Universidad de Santiago sobre cómo manejar el estrés durante períodos de exámenes...</p>
                <a href="#" class="text-[#D93280] text-xs font-medium hover:underline">Leer más</a>
              </div>
            </div>
          </div>
              
          <!-- Noticia 4 -->
          <div class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-all duration-300">
            <div class="relative">
              <span class="absolute top-3 left-3 bg-[#030D55] bg-opacity-70 text-white text-xs px-3 py-1 rounded-full">18 de octubre de 2022</span>
              <img 
                src="{{ get_theme_file_uri('resources/images/prensa6.jpg') }}" 
                alt="Burnout en tiempos de pandemia" 
                class="w-full h-[180px] object-cover"
              >
              <div class="p-5">
                <h3 class="text-base font-bold text-[#030D55] mb-2 line-clamp-2">Burnout en tiempos de pandemia: cómo identificarlo y tratarlo</h3>
                <p class="text-xs text-gray-600 line-clamp-3 mb-3">Instituto Kintsugi participó en un reportaje especial sobre el síndrome de burnout, que ha aumentado considerablemente durante la pandemia...</p>
                <a href="#" class="text-[#D93280] text-xs font-medium hover:underline">Leer más</a>
              </div>
              </div>
            </div>
            
          <!-- Noticia 5 -->
          <div class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-all duration-300">
            <div class="relative">
              <span class="absolute top-3 left-3 bg-[#030D55] bg-opacity-70 text-white text-xs px-3 py-1 rounded-full">5 de septiembre de 2022</span>
                <img 
                src="{{ get_theme_file_uri('resources/images/prensa7.jpg') }}" 
                alt="Técnicas de mindfulness" 
                class="w-full h-[180px] object-cover"
              >
              <div class="p-5">
                <h3 class="text-base font-bold text-[#030D55] mb-2 line-clamp-2">Técnicas de mindfulness y su integración con la terapia EMDR</h3>
                <p class="text-xs text-gray-600 line-clamp-3 mb-3">Los especialistas de Instituto Kintsugi explicaron en Radio Cooperativa cómo las técnicas de mindfulness complementan los tratamientos con EMDR...</p>
                <a href="#" class="text-[#D93280] text-xs font-medium hover:underline">Leer más</a>
              </div>
            </div>
          </div>
              
          <!-- Noticia 6 -->
          <div class="bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-all duration-300">
            <div class="relative">
              <span class="absolute top-3 left-3 bg-[#030D55] bg-opacity-70 text-white text-xs px-3 py-1 rounded-full">20 de julio de 2022</span>
              <img 
                src="{{ get_theme_file_uri('resources/images/prensa8.jpg') }}" 
                alt="Salud mental en adolescentes" 
                class="w-full h-[180px] object-cover"
              >
              <div class="p-5">
                <h3 class="text-base font-bold text-[#030D55] mb-2 line-clamp-2">Salud mental en adolescentes: señales de alerta para padres</h3>
                <p class="text-xs text-gray-600 line-clamp-3 mb-3">Instituto Kintsugi ofreció una charla dirigida a padres y educadores sobre cómo identificar problemas de salud mental en adolescentes...</p>
                <a href="#" class="text-[#D93280] text-xs font-medium hover:underline">Leer más</a>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Botón Ver más noticias -->
        <div class="text-center mt-8">
          <button class="inline-block py-3 px-8 text-white rounded-full font-medium bg-gradient-to-r from-[#D93280] to-[#5A0989] hover:shadow-lg transition-all duration-300 transform hover:scale-105">
            Ver más noticias
          </button>
          </div>
        @endif
      </div>
  </section>

  <!-- Sección para contenido de Elementor -->
  <section class="elementor-section">
    <div class="elementor-container">
      @php the_content(); @endphp
    </div>
  </section>
@endsection
