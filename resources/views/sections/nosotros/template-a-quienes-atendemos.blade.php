{{--
  Template Name: A quienes atendemos
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
          <span class="text-[#AB277A] text-sm md:text-base uppercase tracking-wider font-medium mb-2 block">A quiénes atendemos</span>
          <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-[#030D55] mb-8 leading-none transition-all duration-500 hover:text-[#AB277A] font-paytone">
          Alivio y plenitud para ti
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
            src="{{ get_theme_file_uri('resources/images/quienensatendemos1.png') }}" 
            alt="Personas que atendemos" 
            class="max-w-full h-auto rounded-lg relative z-10 transition-transform duration-500 hover:scale-105"
            style="max-width: 580px; position: relative;"
          >
        </div>
      </div>
    </div>
    
    <!-- Curvatura inferior más pronunciada -->
    <div class="absolute bottom-0 left-0 right-0 h-20">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" preserveAspectRatio="none" class="w-full h-full">
        <path fill="#ffffff" fill-opacity="1" d="M0,96L48,112C96,128,192,160,288,186.7C384,213,480,235,576,224C672,213,768,171,864,149.3C960,128,1056,128,1152,149.3C1248,171,1344,213,1392,234.7L1440,256L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
      </svg>
    </div>
  </section>

  <!-- Sección Principal -->
  <section class="bg-white py-12 overflow-x-hidden">
    <div class="container mx-auto px-4">
      <!-- Título Principal -->
      <h2 class="text-2xl md:text-4xl lg:text-5xl font-bold text-center text-[#030D55] mb-16 transition-all duration-500 hover:text-[#AB277A] font-paytone">
        ¿A qué personas atendemos?
      </h2>

      <!-- Contenedor principal -->
      <div class="max-w-6xl mx-auto">
        <!-- Adolescentes -->
        <div class="flex flex-col md:flex-row items-center justify-between mb-20">
          <div class="md:w-1/2 pr-0 md:pr-10 self-center" data-aos="fade-right" data-aos-duration="600">
            <h2 class="text-2xl font-bold text-[#AB277A] mb-6 transition-all duration-300 hover:translate-x-1 font-paytone">
              Adolescentes
            </h2>
            <p class="text-base text-[#030D55] transition-all duration-300 hover:translate-y-[-2px]">
              Ofrecemos un espacio seguro y comprensivo para adolescentes mayores de 16 años que buscan activamente mejorar su bienestar emocional. A través de la terapia EMDR, facilitamos el manejo de emociones intensas y la superación de experiencias adversas, fortaleciendo su identidad y autonomía. Esta atención clínica está especialmente diseñada para adolescentes que quieran ser su propia vitalidad, con el apoyo activo de sus padres orientados a realizar cambios personales en pro del bienestar de su hijo/a, permitiéndoles enfrentar de manera significativa los desafíos propios de su desarrollo de vida.
            </p>
          </div>
          <div class="md:w-1/2 relative mt-10 md:mt-0 self-center" data-aos="fade-left" data-aos-duration="600">
            <!-- Forma orgánica con puntos -->
            <div class="relative transition-all duration-500 hover:scale-105">
              <img 
                src="{{ get_theme_file_uri('resources/images/quienensatendemos2.png') }}" 
                alt="Adolescentes" 
                class="w-full h-auto object-cover rounded-[100px] relative z-10 transition-transform duration-700 hover:scale-[1.02]"
              >
            </div>
          </div>
        </div>
        
        <!-- Adultos -->
        <div class="flex flex-col md:flex-row-reverse items-center justify-between mb-20">
          <div class="md:w-1/2 pl-0 md:pl-10 self-center" data-aos="fade-left" data-aos-duration="600">
            <h2 class="text-2xl font-bold text-[#AB277A] mb-6 transition-all duration-300 hover:translate-x-1 font-paytone">
              Adultos
            </h2>
            <p class="text-base text-[#030D55] transition-all duration-300 hover:translate-y-[-2px]">
              Atendemos a <strong>adultos sobre 25 años</strong> que buscan superar bloqueos emocionales, sanar traumas pasados o afrontar desafíos cotidianos que impiden el buen vivir o el desarrollo adecuado en lo laboral, académico o relacional. Utilizando la terapia EMDR, ayudamos a reprocesar recuerdos dolorosos y a transformar patrones negativos, promoviendo el crecimiento personal, la resiliencia y el bienestar emocional.
            </p>
          </div>
          <div class="md:w-1/2 relative mt-10 md:mt-0 self-center" data-aos="fade-right" data-aos-duration="600">
            <!-- Forma orgánica con puntos -->
            <div class="relative transition-all duration-500 hover:scale-105">
              <img 
                src="{{ get_theme_file_uri('resources/images/quienensatendemos3.png') }}" 
                alt="Adultos" 
                class="w-full h-auto object-cover rounded-[100px] relative z-10 transition-transform duration-700 hover:scale-[1.02]"
              >
            </div>
          </div>
        </div>

        <!-- Adulto Mayor -->
        <div class="flex flex-col md:flex-row items-center justify-between mb-20">
          <div class="md:w-1/2 pr-0 md:pr-10 self-center" data-aos="fade-right" data-aos-duration="600">
            <h2 class="text-2xl font-bold text-[#AB277A] mb-6 transition-all duration-300 hover:translate-x-1 font-paytone">
              Adulto Mayor
            </h2>
            <p class="text-base text-[#030D55] transition-all duration-300 hover:translate-y-[-2px]">
              Apoyamos a adultos mayores que enfrentan transiciones vitales, pérdidas o cambios significativos en su vida. A través de EMDR, trabajamos en el reprocesamiento de experiencias acumuladas, facilitando la adaptación emocional y mejorando la calidad de vida para un envejecimiento activo y pleno.
            </p>
          </div>
          <div class="md:w-1/2 relative mt-10 md:mt-0 self-center" data-aos="fade-left" data-aos-duration="600">
            <!-- Forma orgánica con puntos -->
            <div class="relative transition-all duration-500 hover:scale-105">
              <img 
                src="{{ get_theme_file_uri('resources/images/quienensatendemos4.png') }}" 
                alt="Adulto Mayor" 
                class="w-full h-auto object-cover rounded-[100px] relative z-10 transition-transform duration-700 hover:scale-[1.02]"
              >
            </div>
          </div>
        </div>
        
        <!-- Parejas -->
        <div class="flex flex-col md:flex-row-reverse items-center justify-between">
          <div class="md:w-1/2 pl-0 md:pl-10 self-center" data-aos="fade-left" data-aos-duration="600">
            <h2 class="text-2xl font-bold text-[#AB277A] mb-6 transition-all duration-300 hover:translate-x-1 font-paytone">
              Parejas
            </h2>
            <p class="text-base text-[#030D55] transition-all duration-300 hover:translate-y-[-2px]">
              En el ámbito de la terapia de pareja, incorporamos EMDR para identificar y transformar patrones emocionales que afectan la relación. Este enfoque facilita una comunicación más abierta y efectiva, promoviendo el entendimiento mutuo y fortaleciendo la conexión emocional entre los miembros.
            </p>
          </div>
          <div class="md:w-1/2 relative mt-10 md:mt-0 self-center" data-aos="fade-right" data-aos-duration="600">
            <!-- Forma orgánica con puntos -->
            <div class="relative transition-all duration-500 hover:scale-105">
              <img 
                src="{{ get_theme_file_uri('resources/images/quienensatendemos5.png') }}" 
                alt="Parejas" 
                class="w-full h-auto object-cover rounded-[100px] relative z-10 transition-transform duration-700 hover:scale-[1.02]"
              >
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
