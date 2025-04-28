{{--
  Template Name: Psicoterapia EMDR
--}}

@extends('layouts.app')

@section('content')
  <!-- Hero Section con fondo blanco y figura morada alrededor de la foto -->
  <section class="relative bg-white overflow-x-hidden">
    <!-- Contenido del hero -->
    <div class="container mx-auto px-4 py-20 lg:py-28 relative z-10 mt-15">
      <div class="flex flex-col lg:flex-row items-center">
        <!-- Columna de texto -->
        <div class="lg:w-1/2 mb-12 lg:mb-0" data-aos="fade-right" data-aos-duration="600">
          <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-[#030D55] mb-8 leading-none transition-all duration-500 hover:text-[#AB277A] font-paytone" style="line-height: 1.1;">
          Recupera tu equilibrio con EMDR
          </h1>
          <p class="text-4xl mt-14 text-[#AB277A] transition-all duration-300 hover:translate-x-2" style="font-family: 'Hugamour', sans-serif;">
            #Mereces una vida mejor
          </p>
        </div>
        
        <!-- Imagen a la derecha con fondo morado -->
        <div class="lg:w-1/2 flex justify-center lg:justify-end relative" data-aos="fade-left" data-aos-duration="600">
          <div class="relative w-full max-w-[580px] mx-auto">
            <div class="relative">
              <!-- Fondo morado orgánico que rodea la imagen con medidas precisas -->
              <div class="absolute inset-0 z-0">
                <svg viewBox="0 0 586 566" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full h-full">
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
                src="{{ get_theme_file_uri('resources/images/psicoterapiaemdr1.png') }}" 
                alt="Psicoterapia EMDR" 
                class="relative z-10 w-full h-auto rounded-lg transition-transform duration-500 hover:scale-105"
              >
            </div>
          </div>
        </div>
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
            src="{{ get_theme_file_uri('resources/images/psicoterapiaemdr2.png') }}" 
            alt="Qué nos inspira" 
            class="w-full max-w-[543px] h-auto rounded-lg relative z-10 transition-transform duration-500 hover:scale-105"
          >
        </div>
        
        <!-- Texto explicativo -->
        <div class="w-full lg:w-1/2 mb-8 lg:mb-0 pr-0 lg:pr-6 order-1 lg:order-2" data-aos="fade-left" data-aos-duration="600">
          <h2 class="text-center lg:text-left text-3xl md:text-4xl lg:text-5xl font-bold text-[#030D55] mb-6 md:mb-8 transition-all duration-500 hover:text-[#AB277A] font-paytone" style="font-weight: 800;">
            ¿Qué es la Psicoterapia <br> EMDR?
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
          <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-[#030D55] mb-6 md:mb-8 transition-all duration-500 hover:text-[#AB277A] font-paytone">
            <strong>¿En que se basa?</strong>
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
