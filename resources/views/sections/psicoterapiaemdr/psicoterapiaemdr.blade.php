{{--
  Template Name: Psicoterapia EMDR
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
          <span class="text-[#AB277A] text-sm md:text-base uppercase tracking-wider font-medium mb-2 block">¿Qué es Psicoterapia EMDR?</span>
          <h1 class="text-4xl md:text-5xl lg:text-6xl text-[#030D55] mb-4 md:mb-8 leading-none transition-all duration-500 hover:text-[#AB277A] font-paytone" style="line-height: 1.1;">
          Recupera tu equilibrio con EMDR
          </h1>
          <p class="text-2xl md:text-4xl text-[#AB277A] transition-all duration-300 hover:translate-x-2" style="font-family: 'Hugamour', sans-serif;">
            #El trauma se puede superar
          </p>
        </div>
        
        <!-- Imagen a la derecha con fondo morado -->
        <div class="lg:w-1/2 flex justify-center lg:justify-end relative lg:mt-10" data-aos="fade-left" data-aos-duration="600">
          <div class="relative w-full max-w-[800px] mx-auto">
            <div class="relative">
              <!-- Imagen actual -->
              <img 
                src="{{ get_theme_file_uri('resources/images/heros/psicoterapiaemdr.png') }}" 
                alt="Psicoterapia EMDR" 
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

  
  <!-- Segunda sección con fondo lavanda claro -->
  <section class="bg-[#CCA0E00D] py-10 lg:py-16 overflow-x-hidden">
    <div class="container mx-auto px-4">
      <div class="flex flex-col lg:flex-row items-center gap-8">
        <!-- Imagen a la izquierda -->  
        <div class="w-full lg:w-1/2 flex justify-center lg:justify-start relative order-2 lg:order-1" data-aos="fade-right" data-aos-duration="600">
          <img 
            src="{{ get_theme_file_uri('resources/images/psicoterapiaemdrnew2.png') }}" 
            alt="Qué nos inspira" 
            class="w-full max-w-[543px] h-auto rounded-lg relative z-10 transition-transform duration-500 hover:scale-105"
          >
        </div>
        
        <!-- Texto explicativo -->
        <div class="w-full lg:w-1/2 mb-8 lg:mb-0 pr-0 lg:pr-6 order-1 lg:order-2" data-aos="fade-left" data-aos-duration="600">
          <h2 class="text-2xl md:text-4xl lg:text-4xl text-[#030D55] mb-6 md:mb-8 transition-all duration-500 hover:text-[#AB277A] font-paytone">
            ¿Qué es la Psicoterapia EMDR?
          </h2>
          
          <div class="prose prose-lg max-w-none">
            <p class="font-normal text-base leading-7 transition-all duration-300 hover:translate-x-1" style="font-family: 'Roboto', sans-serif;">
              <strong>Historia</strong>
            </p>
            
            <p class="font-normal text-base leading-7 mt-4 transition-all duration-300 hover:translate-y-[-2px]" style="font-family: 'Roboto', sans-serif;">
              EMDR – cuyas siglas en español significan Desensibilización y Reprocesamiento por los Movimientos Oculares, según sus siglas en inglés (Eye Movement Desensibilization and Reprocessing). Su autora fue Francine Shapiro, (1987). El EMDR es un abordaje psicoterapéutico, que trabaja con el sistema natural e intrínseco de procesamiento del paciente (SPIA).
            </p>
            
            <p class="font-normal text-base leading-7 mt-4 transition-all duration-300 hover:translate-y-[-2px]" style="font-family: 'Roboto', sans-serif;">
              En 1987, Francine Shapiro, psicóloga norteamericana, descubrió que los movimientos oculares voluntarios reducían la intensidad de la angustia de los pensamientos negativos e inició una investigación (Shapiro, 1989) con sujetos traumatizados en la guerra de Vietnam y víctimas de abuso sexual para medir la eficacia del EMDR.
            </p>
            
            <p class="font-normal text-base leading-7 mt-4 transition-all duration-300 hover:translate-y-[-2px]" style="font-family: 'Roboto', sans-serif;">
              De esta manera comprobó que EMDR reducía de manera significativa los síntomas del Trastorno por Estrés Post Traumático en estos sujetos.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Tercera sección con fondo blanco -->
  <section class="bg-white py-10 lg:py-16 overflow-x-hidden">
    <div class="container mx-auto px-4">
      <div class="flex flex-col lg:flex-row items-center gap-6 md:gap-4">
        <!-- Texto explicativo -->
        <div class="w-full lg:w-1/2 mb-8 lg:mb-0 pr-0 lg:pr-6 order-1" data-aos="fade-right" data-aos-duration="600">
          <h2 class="text-2xl md:text-4xl lg:text-4xl text-[#030D55] mb-6 md:mb-8 transition-all duration-500 hover:text-[#AB277A] font-paytone">
            <strong>¿En qué se basa?</strong>
          </h2>
          
          <div class="prose prose-lg max-w-none">
            <p class="font-normal text-base leading-7 transition-all duration-300 hover:translate-y-[-2px]" style="font-family: 'Roboto', sans-serif;">
              Se basa en la comprensión del efecto de las experiencias vitales adversas y traumáticas sobre la patología y en el procesamiento de dichas experiencias a través de procedimientos estructurados que incluyen movimientos oculares u otras formas de estimulación bilateral.
            </p>
            
            <p class="font-normal text-base leading-7 mt-4 transition-all duration-300 hover:translate-y-[-2px]" style="font-family: 'Roboto', sans-serif;">
              Cuando el ser humano vivencia situaciones dolorosas o traumáticas de cualquier índole (muertes, abusos psicológicos, emocionales, físicos, u otro tipo de abusos, u otros factores que acontecen en la vida del paciente), el sistema se bloquea y surgen síntomas tales como (miedo, angustia, tristeza, dolor, baja autoestima, creencias del tipo: no valgo, soy tonto, estoy dañado para siempre, no puedo expresar mis emociones con seguridad, etc.).
            </p>
            
            <p class="font-normal text-base leading-7 mt-4 transition-all duration-300 hover:translate-y-[-2px]" style="font-family: 'Roboto', sans-serif;">
              Estos hechos, al no ser tratados, generan profundos malestares psicológicos e incluso pueden llegar a producir trastornos (depresión, trastorno obsesivo compulsivo, trastorno límite de personalidad, trastorno bipolar, adicciones, etc.)
            </p>

            <p class="font-normal text-base leading-7 mt-4 transition-all duration-300 hover:translate-y-[-2px]" style="font-family: 'Roboto', sans-serif;">
              También está recomendado en el tratamiento de las dificultades emocionales causadas por experiencias difíciles en la vida del sujeto, desde fobias, ataques de pánico, muerte traumática y duelos o incidentes traumáticos en la infancia hasta accidentes y desastres naturales.
            </p>

            <div class="mt-8 transition-all duration-300 hover:translate-y-[-2px]">
              <img src="{{ get_theme_file_uri('resources/images/emdrlogo.png') }}" alt="EMDR Logo" class="w-[180px] md:w-[222px] h-auto md:h-[52px] transition-transform duration-300 hover:scale-105">
              <a href="https://www.emdr.com/what-is-emdr/" target="_blank" class="block mt-2 text-[#030D55] hover:text-[#AB277A] transition-colors duration-300 text-sm md:text-base">@https://www.emdr.com/what-is-emdr/</a>
            </div>
          </div>
        </div>
        
        <!-- Imagen a la derecha (invertida) -->
        <div class="w-full lg:w-1/2 flex justify-center lg:justify-end relative order-2" data-aos="fade-left" data-aos-duration="600">
          <img 
            src="{{ get_theme_file_uri('resources/images/psicoterapiaemdr3.png') }}" 
            alt="EMDR Therapy" 
            class="w-full max-w-[543px] h-auto rounded-lg relative z-10 transition-transform duration-500 hover:scale-105"
          >
        </div>
      </div>
    </div>
  </section>
@endsection
