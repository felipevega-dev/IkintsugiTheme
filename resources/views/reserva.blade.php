{{--
  Template Name: Reserva
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
          <span class="text-[#AB277A] text-sm md:text-base uppercase tracking-wider font-medium mb-2 block">Reserva tu cita</span>
          <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-[#030D55] mb-4 md:mb-8 leading-none transition-all duration-500 hover:text-[#AB277A] font-paytone">
            Reserva tu<br>cita con nosotros
          </h1>
          <p class="text-2xl md:text-4xl text-[#AB277A] transition-all duration-300 hover:translate-x-2" style="font-family: 'Hugamour', sans-serif;">
            #El trauma se puede superar
          </p>
        </div>
        
        <!-- Imagen a la derecha con fondo morado -->
        <div class="lg:w-1/2 flex justify-center lg:justify-end relative" data-aos="fade-left" data-aos-duration="600">
          <div class="relative w-full max-w-[580px] mx-auto">
            <div class="relative">
              <!-- Fondo morado orgánico que rodea la imagen con medidas precisas -->
              <div class="absolute inset-0 z-0">
                <svg viewBox="0 0 586 566" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full h-full">
                  <path d="M140,60 C60,120 20,180 40,280 C60,380 120,460 240,500 C360,540 460,460 520,380 C580,300 560,200 480,120 C400,40 280,20 220,20 C180,20 160,40 140,60 Z" fill="#8961C4"/>
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
                src="{{ get_theme_file_uri('resources/images/contacto.png') }}" 
                alt="Reserva de cita" 
                class="relative z-10 w-full h-auto rounded-lg transition-transform duration-500 hover:scale-105"
              >
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="reserva-section bg-white py-10 lg:py-16 overflow-x-hidden">
    <div class="container mx-auto px-4 max-w-6xl">
      <h2 class="text-2xl md:text-4xl lg:text-5xl font-bold text-[#030D55] mb-8 text-center transition-all duration-500 hover:text-[#AB277A] font-paytone">Reserva tu cita con nosotros</h2>
      <p class="text-base md:text-lg text-center mb-8 text-[#181818]">Selecciona el profesional y el horario que más te acomode.</p>
      <div class="bg-white/90 rounded-lg p-6 shadow-lg">
        {!! do_shortcode('[bookly-staff-form my-form]') !!}
      </div>
    </div>
  </section>
@endsection
