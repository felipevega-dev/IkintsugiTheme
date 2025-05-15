{{--
  Template Name: A quienes atendemos
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
          <span class="text-[#AB277A] text-sm md:text-base uppercase tracking-wider font-medium mb-2 block">¿A qué personas atendemos?          </span>
          <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-[#030D55] mb-4 md:mb-8 leading-none transition-all duration-500 hover:text-[#AB277A] font-paytone">
          Alivio y plenitud para ti
          </h1>
          <p class="text-2xl md:text-4xl text-[#AB277A] transition-all duration-300 hover:translate-x-2" style="font-family: 'Hugamour', sans-serif;">
            #Mereces una vida mejor
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
                src="{{ get_theme_file_uri('resources/images/heros/aquienesatendemos.png') }}" 
                alt="Personas que atendemos" 
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
    
    <!-- Curvatura inferior más pronunciada -->
    <div class="absolute bottom-0 left-0 right-0 h-20">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" preserveAspectRatio="none" class="w-full h-full">
        <path fill="#ffffff" fill-opacity="1" d="M0,96L48,112C96,128,192,160,288,186.7C384,213,480,235,576,224C672,213,768,171,864,149.3C960,128,1056,128,1152,149.3C1248,171,1344,213,1392,234.7L1440,256L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
      </svg>
    </div>
  </section>

  <!-- Sección Principal -->
  <section class="bg-white py-8 md:py-12 overflow-x-hidden">
    <div class="container mx-auto px-4">
      <!-- Título Principal -->
      <h2 class="text-2xl md:text-4xl lg:text-5xl font-bold text-center text-[#030D55] mb-8 md:mb-16 transition-all duration-500 hover:text-[#AB277A] font-paytone">
        ¿A qué personas atendemos?
      </h2>

      <!-- Contenedor principal -->
      <div class="max-w-6xl mx-auto">
        <!-- Adolescentes -->
        <div class="flex flex-col md:flex-row items-center justify-between mb-12 md:mb-20">
          <div class="md:w-1/2 pr-0 md:pr-10 self-center mb-6 md:mb-0" data-aos="fade-right" data-aos-duration="600">
            <h2 class="text-2xl font-bold text-[#AB277A] mb-4 md:mb-6 transition-all duration-300 hover:translate-x-1 font-paytone">
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
                src="{{ get_theme_file_uri('resources/images/quienensatendemosadulto.png') }}" 
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
