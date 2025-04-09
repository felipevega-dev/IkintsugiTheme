{{--
  Template Name: Psicoterapia EMDR
--}}

@extends('layouts.app')

@section('content')
  <!-- HERO SECTION (antes en hero.blade.php) -->
  <section class="relative bg-white py-15 overflow-hidden">
    <div class="container mx-auto px-4 relative z-10 mb-10">
      <div class="flex flex-col md:flex-row items-center justify-center gap-16 mt-15">
        <!-- Texto del lado izquierdo con más margen a la derecha -->
        <div class="md:w-2/5 mb-10 md:mb-0 md:ml-auto mt-10">
          <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-4 text-[#030D55] transition-all duration-500 hover:text-[#AB277A]" style="font-family: 'Playfair Display', serif; line-height: 1.1;">
           EMDR: Sana<br>traumas y libera tu<br>bienestar emocional
          </h1>
          
          <p class="text-4xl mt-14 text-[#AB277A] transition-all duration-300 hover:translate-x-2" style="font-family: 'Hugamour', sans-serif;">
            #Mereces una vida mejor
          </p>
        </div>
        
        <!-- Imagen del lado derecho con más margen a la derecha -->
        <div class="md:w-2/5 md:ml-0">
          <div class="relative mt-15">
            <!-- Imagen con marco personalizado -->
            <div class="relative transition-all duration-700 hover:scale-105" style="width: 500px; height: 500px;">
              
              <!-- Línea curva violeta exterior -->
              <svg viewBox="0 0 450 450" class="absolute top-0 left-0 w-full h-full animate-pulse" style="transform: scale(1.08); transform-origin: center; animation-duration: 8s;">
                <path d="M225,10 
                        C290,10 345,35 380,70
                        C415,105 440,160 440,225
                        C440,290 415,345 380,380
                        C345,415 290,440 225,440
                        C160,440 105,415 70,380
                        C35,345 10,290 10,225
                        C10,160 35,105 70,70
                        C105,35 160,10 225,10 Z" 
                     fill="none" stroke="#8961C4" stroke-width="2"></path>
              </svg>
              
              <!-- Línea curva rosa -->
              <svg viewBox="0 0 450 450" class="absolute top-0 left-0 w-full h-full animate-pulse" style="transform: scale(1.05); transform-origin: center; animation-duration: 7s;">
                <path d="M225,30 
                        C280,30 325,50 355,80
                        C385,110 420,155 420,225
                        C420,295 385,340 355,370
                        C325,400 280,420 225,420
                        C170,420 125,400 95,370
                        C65,340 30,295 30,225
                        C30,155 65,110 95,80
                        C125,50 170,30 225,30 Z" 
                     fill="none" stroke="#F5B3F3" stroke-width="2"></path>
              </svg>
              
              <!-- Línea curva azul marino -->
              <svg viewBox="0 0 450 450" class="absolute top-0 left-0 w-full h-full animate-pulse" style="transform: scale(1.02); transform-origin: center; animation-duration: 6s;">
                <path d="M225,50 
                        C270,50 310,65 335,90
                        C360,115 400,155 400,225
                        C400,295 360,335 335,360
                        C310,385 270,400 225,400
                        C180,400 140,385 115,360
                        C90,335 50,295 50,225
                        C50,155 90,115 115,90
                        C140,65 180,50 225,50 Z" 
                     fill="none" stroke="#030D55" stroke-width="1.5"></path>
              </svg>
              
              <!-- Imagen circular -->
              <div class="absolute inset-12 overflow-hidden rounded-full border-2 border-white transition-all duration-500 hover:shadow-lg">
                <img src="{{ get_theme_file_uri('resources/images/psicoterapiaemdr1.png') }}" alt="Psicoterapia EMDR" class="w-full h-full object-cover transition-all duration-700 hover:scale-110">
              </div>

              
            </div>
          </div>
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
      <div class="flex flex-col lg:flex-row items-center gap-8">
        <!-- Imagen a la izquierda -->
        <div class="lg:w-1/2 flex justify-center lg:justify-start relative order-2 lg:order-1">
          <!-- Fondo morado orgánico -->
          <div class="absolute inset-0 z-0">
            <svg width="100%" height="100%" viewBox="0 0 600 600" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M50,80 C150,20 250,0 350,20 C450,40 550,100 580,200 C600,290 590,380 550,450 C510,520 440,550 370,570 C280,590 190,580 120,530 C50,480 0,400 0,310 C0,220 30,130 50,80 Z" fill="#F5B3F3"/>
            </svg>
          </div>
          
          <img 
            src="{{ get_theme_file_uri('resources/images/psicoterapiaemdr2.png') }}" 
            alt="Qué nos inspira" 
            class="max-w-full h-auto rounded-lg relative z-10"
            style="max-width: 543px;"
          >
        </div>
        
        <!-- Texto explicativo -->
        <div class="lg:w-1/2 mb-8 lg:mb-0 pr-0 lg:pr-6 order-1 lg:order-2">
          <h2 class="text-center text-4xl lg:text-5xl font-bold text-[#030D55] mb-8" style="font-family: 'Playfair Display', serif; font-weight: 800;">
            ¿Qué es la Psicoterapia <br> EMDR?
          </h2>
          
          <div class="prose prose-lg">
            <p class="font-normal text-base leading-7" style="font-family: 'Roboto', sans-serif;">
              <strong>Historia</strong>
            </p>
            
            <p class="font-normal text-base leading-7 mt-4" style="font-family: 'Roboto', sans-serif;">
              EMDR – cuyas siglas en español significan Desensibilización y Reprocesamiento por los Movimientos Oculares, según sus siglas en inglés (Eye Movement Desensibilization and Reprocessing). Su autora fue Francine Shapiro, (1987). El EMDR es un abordaje psicoterapéutico, que trabaja con el sistema natural e intrínseco de procesamiento del paciente (SPIA).
            </p>
            
            <p class="font-normal text-base leading-7 mt-4" style="font-family: 'Roboto', sans-serif;">
              En 1987, Francine Shapiro, psicóloga norteamericana, descubrió que los movimientos oculares voluntarios reducían la intensidad de la angustia de los pensamientos negativos e inició una investigación (Shapiro, 1989) con sujetos traumatizados en la guerra de Vietnam y víctimas de abuso sexual para medir la eficacia del EMDR.
            </p>
            
            <p class="font-normal text-base leading-7 mt-4" style="font-family: 'Roboto', sans-serif;">
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
      <div class="flex flex-col lg:flex-row items-center gap-4">
        <!-- Texto explicativo -->
        <div class="lg:w-1/2 mb-8 lg:mb-0 pr-0 lg:pr-6 order-1 lg:order-1">
          <h2 class="text-4xl lg:text-5xl font-bold text-[#030D55] mb-8" style="font-family: 'Playfair Display', serif;">
            <strong>¿En que se basa?</strong>
          </h2>
          
          <div class="prose prose-lg">
            <p class="font-normal text-base leading-7" style="font-family: 'Roboto', sans-serif;">
              Se basa en la comprensión del efecto de las experiencias vitales adversas y traumáticas sobre la patología y en el procesamiento de dichas experiencias a través de procedimientos estructurados que incluyen movimientos oculares u otras formas de estimulación bilateral.
            </p>
            
            <p class="font-normal text-base leading-7 mt-4" style="font-family: 'Roboto', sans-serif;">
              Cuando el ser humano vivencia situaciones dolorosas o traumáticas de cualquier índole (muertes, abusos psicológicos, emocionales, físicos, u otro tipo de abusos, u otros factores que acontecen en la vida del paciente), el sistema se bloquea y surgen síntomas tales como (miedo, angustia, tristeza, dolor, baja autoestima, creencias del tipo: no valgo, soy tonto, estoy dañado para siempre, no puedo expresar mis emociones con seguridad, etc.).
            </p>
            
            <p class="font-normal text-base leading-7 mt-4" style="font-family: 'Roboto', sans-serif;">
              Estos hechos, al no ser tratados, generan profundos malestares psicológicos e incluso pueden llegar a producir trastornos (depresión, trastorno obsesivo compulsivo, trastorno límite de personalidad, trastorno bipolar, adicciones, etc.)
            </p>

            <p class="font-normal text-base leading-7 mt-4" style="font-family: 'Roboto', sans-serif;">
              También está recomendado en el tratamiento de las dificultades emocionales causadas por experiencias difíciles en la vida del sujeto, desde fobias, ataques de pánico, muerte traumática y duelos o incidentes traumáticos en la infancia hasta accidentes y desastres naturales
            </p>

            <div class="mt-8">
              <img src="{{ get_theme_file_uri('resources/images/emdrlogo.png') }}" alt="EMDR Logo" class="w-[222px] h-[52px]">
              <a href="https://www.emdr.com/what-is-emdr/" target="_blank" class="block mt-2 text-[#030D55] hover:text-[#AB277A] transition-colors duration-300">@https://www.emdr.com/what-is-emdr/</a>
            </div>
          </div>
        </div>
        
        <!-- Imagen a la derecha (invertida) -->
        <div class="lg:w-1/2 flex justify-center lg:justify-end relative order-2 lg:order-2">
          <img 
            src="{{ get_theme_file_uri('resources/images/psicoterapiaemdr3.png') }}" 
            alt="EMDR Therapy" 
            class="max-w-full h-auto rounded-lg relative z-10 transform scale-x-[-1]"
            style="max-width: 543px;"
          >
        </div>
      </div>
    </div>
  </section>
@endsection
