{{--
  Template Name: A quienes atendemos
--}}

@extends('layouts.app')

@section('content')
  <!-- HERO SECTION -->
  <section class="relative bg-white py-25 overflow-hidden">
    <div class="container mx-auto px-4 relative z-10">
      <div class="flex flex-col md:flex-row items-center justify-center gap-3">
        <!-- Texto del lado izquierdo --> 
        <div class="md:w-3/6 mb-10 md:mb-0 mt-10">
          <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-4 text-[#030D55] transition-all duration-500 hover:text-[#AB277A]" style="font-family: 'Playfair Display', serif; line-height: 1.1;">
            Para quienes<br>buscan alivio y<br>bienestar
          </h1>
          
          <p class="text-4xl mt-14 text-[#AB277A] transition-all duration-300 hover:translate-x-2" style="font-family: 'Hugamour', sans-serif;">
            #Mereces una vida mejor
          </p>
        </div>
        
        <!-- Imagen del lado derecho -->
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
                <img src="{{ get_theme_file_uri('resources/images/quienensatendemos1.png') }}" alt="Personas que atendemos" class="w-full h-full object-cover transition-all duration-700 hover:scale-110">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Sección Principal -->
  <section class="bg-white py-16">
    <div class="container mx-auto px-4">
      <!-- Título Principal -->
      <h1 class="text-4xl md:text-5xl font-bold text-center text-[#030D55] mb-20" style="font-family: 'Playfair Display', serif;">
        ¿A qué personas atendemos?
      </h1>

      <!-- Contenedor principal -->
      <div class="max-w-6xl mx-auto">
        <!-- Adolescentes -->
        <div class="flex flex-col md:flex-row items-start justify-between mb-32">
          <div class="md:w-1/2 pr-10">
            <h2 class="text-2xl font-bold text-[#AB277A] mb-6" style="font-family: 'Playfair Display', serif;">
              Adolescentes
            </h2>
            <p class="text-base text-[#030D55]">
              Ofrecemos un espacio seguro y comprensivo para adolescentes mayores de 16 años que buscan activamente mejorar su bienestar emocional. A través de la terapia EMDR, facilitamos el manejo de emociones intensas y la superación de experiencias adversas, fortaleciendo su identidad y autonomía. Esta atención clínica está especialmente diseñada para adolescentes que quieran ser su propia vitalidad, con el apoyo activo de sus padres orientados a realizar cambios personales en pro del bienestar de su hijo/a, permitiéndoles enfrentar de manera significativa los desafíos propios de su desarrollo de vida.
            </p>
          </div>
          <div class="md:w-1/2 relative mt-10 md:mt-0">
            <!-- Forma orgánica con puntos -->
            <div class="relative">
              <!-- SVG para el borde orgánico con puntos -->
              <svg viewBox="0 0 600 600" class="absolute top-0 left-0 w-full h-full" style="z-index: -1;">
                <defs>
                  <pattern id="dotPattern" width="10" height="10" patternUnits="userSpaceOnUse">
                    <circle cx="2" cy="2" r="1" fill="#AB277A" opacity="0.3" />
                  </pattern>
                </defs>
                <path d="M300,30 
                       C400,30 500,120 500,300
                       C500,480 400,570 300,570
                       C200,570 100,480 100,300
                       C100,120 200,30 300,30Z" 
                     fill="url(#dotPattern)" stroke="#9D85C1" stroke-width="2" />
              </svg>
              <img 
                src="{{ get_theme_file_uri('resources/images/quienensatendemos2.png') }}" 
                alt="Adolescentes" 
                class="w-full h-auto object-cover rounded-[100px] relative z-10"
              >
            </div>
          </div>
        </div>

        <!-- Adultos -->
        <div class="flex flex-col md:flex-row-reverse items-start justify-between mb-32">
          <div class="md:w-1/2 pl-10">
            <h2 class="text-2xl font-bold text-[#AB277A] mb-6" style="font-family: 'Playfair Display', serif;">
              Adultos
            </h2>
            <p class="text-base text-[#030D55]">
              Atendemos a <strong>adultos sobre 25 años</strong> que buscan superar bloqueos emocionales, sanar traumas pasados o afrontar desafíos cotidianos que impiden el buen vivir o el desarrollo adecuado en lo laboral, académico o relacional. Utilizando la terapia EMDR, ayudamos a reprocesar recuerdos dolorosos y a transformar patrones negativos, promoviendo el crecimiento personal, la resiliencia y el bienestar emocional.
            </p>
          </div>
          <div class="md:w-1/2 relative mt-10 md:mt-0">
            <!-- Forma orgánica con puntos -->
            <div class="relative">
              <!-- SVG para el borde orgánico con puntos -->
              <svg viewBox="0 0 600 600" class="absolute top-0 left-0 w-full h-full" style="z-index: -1;">
                <defs>
                  <pattern id="dotPattern2" width="10" height="10" patternUnits="userSpaceOnUse">
                    <circle cx="2" cy="2" r="1" fill="#AB277A" opacity="0.3" />
                  </pattern>
                </defs>
                <path d="M300,30 
                       C400,30 500,120 500,300
                       C500,480 400,570 300,570
                       C200,570 100,480 100,300
                       C100,120 200,30 300,30Z" 
                     fill="url(#dotPattern2)" stroke="#9D85C1" stroke-width="2" />
              </svg>
              <img 
                src="{{ get_theme_file_uri('resources/images/quienensatendemos3.png') }}" 
                alt="Adultos" 
                class="w-full h-auto object-cover rounded-[100px] relative z-10"
              >
            </div>
          </div>
        </div>

        <!-- Adulto Mayor -->
        <div class="flex flex-col md:flex-row items-start justify-between mb-32">
          <div class="md:w-1/2 pr-10">
            <h2 class="text-2xl font-bold text-[#AB277A] mb-6" style="font-family: 'Playfair Display', serif;">
              Adulto Mayor
            </h2>
            <p class="text-base text-[#030D55]">
              Apoyamos a adultos mayores que enfrentan transiciones vitales, pérdidas o cambios significativos en su vida. A través de EMDR, trabajamos en el reprocesamiento de experiencias acumuladas, facilitando la adaptación emocional y mejorando la calidad de vida para un envejecimiento activo y pleno.
            </p>
          </div>
          <div class="md:w-1/2 relative mt-10 md:mt-0">
            <!-- Forma orgánica con puntos -->
            <div class="relative">
              <!-- SVG para el borde orgánico con puntos -->
              <svg viewBox="0 0 600 600" class="absolute top-0 left-0 w-full h-full" style="z-index: -1;">
                <defs>
                  <pattern id="dotPattern3" width="10" height="10" patternUnits="userSpaceOnUse">
                    <circle cx="2" cy="2" r="1" fill="#AB277A" opacity="0.3" />
                  </pattern>
                </defs>
                <path d="M300,30 
                       C400,30 500,120 500,300
                       C500,480 400,570 300,570
                       C200,570 100,480 100,300
                       C100,120 200,30 300,30Z" 
                     fill="url(#dotPattern3)" stroke="#9D85C1" stroke-width="2" />
              </svg>
              <img 
                src="{{ get_theme_file_uri('resources/images/quienensatendemos4.png') }}" 
                alt="Adulto Mayor" 
                class="w-full h-auto object-cover rounded-[100px] relative z-10"
              >
            </div>
          </div>
        </div>

        <!-- Parejas -->
        <div class="flex flex-col md:flex-row-reverse items-start justify-between">
          <div class="md:w-1/2 pl-10">
            <h2 class="text-2xl font-bold text-[#AB277A] mb-6" style="font-family: 'Playfair Display', serif;">
              Parejas
            </h2>
            <p class="text-base text-[#030D55]">
              En el ámbito de la terapia de pareja, incorporamos EMDR para identificar y transformar patrones emocionales que afectan la relación. Este enfoque facilita una comunicación más abierta y efectiva, promoviendo el entendimiento mutuo y fortaleciendo la conexión emocional entre los miembros.
            </p>
          </div>
          <div class="md:w-1/2 relative mt-10 md:mt-0">
            <!-- Forma orgánica con puntos -->
            <div class="relative">
              <!-- SVG para el borde orgánico con puntos -->
              <svg viewBox="0 0 600 600" class="absolute top-0 left-0 w-full h-full" style="z-index: -1;">
                <defs>
                  <pattern id="dotPattern4" width="10" height="10" patternUnits="userSpaceOnUse">
                    <circle cx="2" cy="2" r="1" fill="#AB277A" opacity="0.3" />
                  </pattern>
                </defs>
                <path d="M300,30 
                       C400,30 500,120 500,300
                       C500,480 400,570 300,570
                       C200,570 100,480 100,300
                       C100,120 200,30 300,30Z" 
                     fill="url(#dotPattern4)" stroke="#9D85C1" stroke-width="2" />
              </svg>
              <img 
                src="{{ get_theme_file_uri('resources/images/quienensatendemos5.png') }}" 
                alt="Parejas" 
                class="w-full h-auto object-cover rounded-[100px] relative z-10"
              >
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
