{{--
  Template Name: Psicoterapia EMDR
--}}

@extends('layouts.app')

@section('content')
  <!-- HERO SECTION (antes en hero.blade.php) -->
  <section class="relative bg-white pt-20 md:pt-36 pb-10 md:pb-15 overflow-hidden">
    <div class="container mx-auto px-4 relative z-10">
      <!-- Contenedor con flexbox en columna inversa para móvil y fila para desktop -->
      <div class="flex flex-col md:flex-row items-center justify-center gap-8 md:gap-16">
        
        <!-- ORDEN MODIFICADO: Primero mostramos la imagen en el DOM para que aparezca primero en móvil -->
        <!-- Imagen - aparece primero en móvil, a la derecha en desktop -->
        <div class="w-full md:w-2/5 md:order-last mb-6 md:mb-0" data-aos="fade-left" data-aos-duration="600">
          <div class="relative mx-auto">
            <!-- Imagen con forma orgánica -->
            <div class="relative mx-auto hero-image-container transition-all duration-500 hover:scale-105" style="width: 330px; height: 330px; max-width: 100%; max-height: 100%;">
              
              <!-- Formas ameboides como en la imagen de referencia -->
              <svg viewBox="0 0 450 450" class="absolute top-0 left-0 w-full h-full" style="transform-origin: center;">
                <path d="M225,10 C280,10 330,30 360,80 C390,130 410,180 400,230 C390,280 370,320 330,370 C290,420 250,440 190,430 C130,420 90,390 60,340 C30,290 20,230 40,180 C60,130 90,80 140,40 C175,15 210,10 225,10 Z" 
                    fill="none" stroke="#8961C4" stroke-width="1.5" stroke-opacity="0.6" style="transform-origin: center; animation: float 15s infinite ease-in-out;"/>
              </svg>
              
              <svg viewBox="0 0 450 450" class="absolute top-0 left-0 w-full h-full" style="transform: scale(0.92); transform-origin: center;">
                <path d="M225,30 C270,30 310,50 340,90 C370,130 385,170 380,210 C375,250 360,290 325,330 C290,370 260,390 210,385 C160,380 125,360 100,320 C75,280 65,230 80,190 C95,150 120,110 160,80 C185,60 210,30 225,30 Z" 
                    fill="none" stroke="#F5B3F3" stroke-width="1.5" stroke-opacity="0.7" style="transform-origin: center; animation: float 12s infinite ease-in-out reverse;"/>
              </svg>
              
              <svg viewBox="0 0 450 450" class="absolute top-0 left-0 w-full h-full" style="transform: scale(0.85); transform-origin: center;">
                <path d="M225,50 C265,50 295,65 320,100 C345,135 360,170 355,205 C350,240 335,270 305,305 C275,340 245,355 205,350 C165,345 140,325 120,295 C100,265 90,230 100,195 C110,160 130,125 165,100 C185,85 200,50 225,50 Z" 
                    fill="none" stroke="#030D55" stroke-width="1" stroke-opacity="0.7" style="transform-origin: center; animation: float 10s infinite ease-in-out;"/>
              </svg>
              
              <!-- Animación flotante para las formas -->
              <style>
                @keyframes float {
                  0% { transform: translateY(0) rotate(0deg); }
                  25% { transform: translateY(5px) rotate(1deg); }
                  50% { transform: translateY(0) rotate(0deg); }
                  75% { transform: translateY(-5px) rotate(-1deg); }
                  100% { transform: translateY(0) rotate(0deg); }
                }
              </style>
              
              <!-- Imagen circular -->
              <div class="absolute inset-0 m-10 overflow-hidden rounded-full border-2 border-white shadow-md transition-transform duration-500 hover:shadow-lg">
                <img src="{{ get_theme_file_uri('resources/images/psicoterapiaemdr1.png') }}" alt="Psicoterapia EMDR" class="w-full h-full object-cover transition-transform duration-700 hover:scale-110">
              </div>
            </div>
          </div>
        </div>
        
        <!-- Texto - aparece segundo en móvil, a la izquierda en desktop -->
        <div class="w-full md:w-3/5 md:order-first md:ml-auto" data-aos="fade-right" data-aos-duration="600">
          <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-4 text-[#030D55] transition-all duration-500 hover:text-[#AB277A]" style="font-family: 'Playfair Display', serif; line-height: 1.1;">
            EMDR: Sana<br>traumas y libera tu<br>bienestar emocional
          </h1>
          
          <p class="text-2xl md:text-4xl mt-6 md:mt-14 text-[#AB277A] transition-all duration-300 hover:translate-x-2" style="font-family: 'Hugamour', sans-serif;">
            #Mereces una vida mejor
          </p>
        </div>
      </div>
    </div>
    
    <!-- Estilos específicos para asegurar el tamaño correcto en PC -->
    <style>
      @media (min-width: 768px) {
        .hero-image-container {
          width: 500px !important;
          height: 500px !important;
        }
      }
    </style>
  </section>

  
  <!-- Segunda sección con fondo lavanda claro -->
  <section class="bg-[#CCA0E00D] py-10 lg:py-16">
    <div class="container mx-auto px-4">
      <div class="flex flex-col lg:flex-row items-center gap-8">
        <!-- Imagen a la izquierda -->
        <div class="w-full lg:w-1/2 flex justify-center lg:justify-start relative order-2 lg:order-1" data-aos="fade-right" data-aos-duration="600">
          <img 
            src="{{ get_theme_file_uri('resources/images/psicoterapiaemdr2.png') }}" 
            alt="Qué nos inspira" 
            class="max-w-full h-auto rounded-lg relative z-10 transition-transform duration-500 hover:scale-105"
            style="max-width: 100%; @media (min-width: 1024px) { max-width: 543px; }"
          >
        </div>
        
        <!-- Texto explicativo -->
        <div class="w-full lg:w-1/2 mb-8 lg:mb-0 pr-0 lg:pr-6 order-1 lg:order-2" data-aos="fade-left" data-aos-duration="600">
          <h2 class="text-center lg:text-left text-3xl md:text-4xl lg:text-5xl font-bold text-[#030D55] mb-6 md:mb-8 transition-all duration-500 hover:text-[#AB277A]" style="font-family: 'Playfair Display', serif; font-weight: 800;">
            ¿Qué es la Psicoterapia <br> EMDR?
          </h2>
          
          <div class="prose prose-lg">
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
  <section class="bg-white py-10 lg:py-16 max-w-[1440px] mx-auto">
    <div class="container mx-auto px-4">
      <div class="flex flex-col lg:flex-row items-center gap-6 md:gap-4">
        <!-- Texto explicativo -->
        <div class="w-full lg:w-1/2 mb-8 lg:mb-0 pr-0 lg:pr-6 order-1" data-aos="fade-right" data-aos-duration="600">
          <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold text-[#030D55] mb-6 md:mb-8 transition-all duration-500 hover:text-[#AB277A]" style="font-family: 'Playfair Display', serif;">
            <strong>¿En que se basa?</strong>
          </h2>
          
          <div class="prose prose-lg">
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
            class="max-w-full h-auto rounded-lg relative z-10 transition-transform duration-500 hover:scale-105"
            style="max-width: 100%; @media (min-width: 1024px) { max-width: 543px; }"
          >
        </div>
      </div>
    </div>
  </section>
@endsection
