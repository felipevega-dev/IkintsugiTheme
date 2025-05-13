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
        <div class="lg:w-1/2 flex justify-center lg:justify-end relative lg:mt-10" data-aos="fade-left" data-aos-duration="600">
          <div class="relative w-full max-w-[800px] mx-auto">
            <div class="relative">
              <!-- Imagen actual -->
              <img 
                src="{{ get_theme_file_uri('resources/images/heros/reserva.png') }}" 
                alt="Reserva de cita" 
                class="relative z-10 w-full h-auto transition-transform duration-500 hover:scale-105"
              >
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="reserva-section bg-white overflow-x-hidden mb-20">
    <div class="container mx-auto px-4 max-w-6xl">
      <h2 class="text-2xl md:text-4xl lg:text-5xl font-bold text-[#030D55] mb-8 text-center transition-all duration-500 hover:text-[#AB277A] font-paytone">Reserva tu cita con nosotros</h2>
      <div class="bg-white/90 rounded-lg p-6 shadow-lg">
        {!! do_shortcode('[bookly-services-form my-form-398]') !!}
      </div>
    </div>
  </section>
@endsection
