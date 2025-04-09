
{{--
  Template Name: Charlas y Talleres
--}}

@extends('layouts.app')

@section('content')

<!-- Hero Section -->
<section class="relative bg-[#362766] overflow-hidden pt-32">
  <!-- Video de fondo con overlay -->
  <div class="absolute inset-0 z-0">
    <div class="absolute inset-0 bg-[#362766] opacity-70 z-10"></div>
    <video 
      class="absolute inset-0 w-full h-full object-cover" 
      autoplay 
      muted 
      loop 
      playsinline
    >
      <source src="{{ get_theme_file_uri('resources/videos/background.mp4') }}" type="video/mp4">
      <!-- Fallback para navegadores que no soportan video -->
      <img src="{{ get_theme_file_uri('resources/images/hero-fallback.jpg') }}" alt="Background" class="w-full h-full object-cover">
    </video>
  </div>

  <!-- Contenido del hero -->
  <div class="container mx-auto px-4 relative z-10 min-h-[80vh] flex flex-col justify-center items-center">
    <div class="max-w-3xl mx-auto text-center text-white py-20 md:py-24 lg:py-26">
      <h2 class="text-xl md:text-2xl font-500 mb-2">Psicología Clínica EMDR</h2>
      <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold mb-8 font-playfair" style="font-family: 'Playfair Display', serif;">Nuestras Charlas y talleres</h1>
    </div>
  </div>

  <!-- Curvatura inferior -->
  <div class="absolute bottom-0 left-0 right-0 z-10 translate-y-1">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120" fill="#ffffff" preserveAspectRatio="none">
      <path d="M0,64L80,69.3C160,75,320,85,480,80C640,75,800,53,960,48C1120,43,1280,53,1360,58.7L1440,64L1440,120L1360,120C1280,120,1120,120,960,120C800,120,640,120,480,120C320,120,160,120,80,120L0,120Z"></path>
    </svg>
  </div>
</section>
<!-- Segunda sección con fondo blanco-->
<section class="bg-white py-10 lg:py-16">
    <div class="container mx-auto px-4 max-w-7xl">
      <div class="flex flex-col lg:flex-row items-center gap-4">
        <!-- Texto explicativo -->
        <div class="lg:w-1/2 mb-8 lg:mb-0 pr-0 lg:pr-6 order-2 lg:order-2">
          <h2 class="text-center text-4xl lg:text-5xl font-bold text-[#030D55] mb-8" style="font-family: 'Playfair Display', serif; font-weight: 800;">
            ¿Qué haremos?
          </h2>
          
          <div class="prose prose-lg">
            <p class="font-normal text-base leading-7">
              Nuestro trabajo conjunto se basa en tu compromiso, paciencia, constancia y participación hacia una vida mejor. El proceso terapéutico incluye:
            </p>
            
            <ul class="mt-4 space-y-3">
              <li class="font-normal text-base leading-7">
                <strong>Identificación:</strong> Analizaremos los síntomas y los disparadores o gatillantes que afectan tu bienestar.
              </li>
              <li class="font-normal text-base leading-7">
                <strong>Exploración de causas:</strong> Investigaremos las raíces de estos problemas, que a menudo se originan en la infancia o juventud.
              </li>
              <li class="font-normal text-base leading-7">
                <strong>Plan de intervención:</strong> Diseñaremos un plan personalizado que aborde tanto recuerdos explícitos como implícitos responsables de tu malestar actual.
              </li>
              <li class="font-normal text-base leading-7">
                <strong>Desarrollo de recursos:</strong> Evaluaremos tus mecanismos de regulación emocional, tus relaciones interpersonales y estrategias de defensa, para implementar herramientas y recursos que te permitan vivir de manera más equilibrada y satisfactoria.
              </li>
            </ul>
          </div>
        </div>
        <!-- Imagen a la izquierda -->
        <div class="lg:w-1/2 flex justify-center lg:justify-end relative order-1 lg:order-1">
          
          <img 
            src="{{ get_theme_file_uri('resources/images/beneficios2.png') }}" 
            alt="Qué nos inspira" 
            class="max-w-full h-auto rounded-lg relative z-10"
            style="max-width: 543px;"
          >
        </div>
      </div>
    </div>
  </section>

@endsection
