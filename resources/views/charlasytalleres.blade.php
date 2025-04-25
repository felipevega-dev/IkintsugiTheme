{{--
  Template Name: Charlas y Talleres
--}}

@extends('layouts.app')

@section('content')
<style>
  .page-template-charlasytalleres {
    padding-top: 0 !important;
  }
</style>

<!-- Hero Section -->
<section class="relative bg-[#362766] overflow-hidden pt-32 max-w-full">
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
  <div class="container mx-auto px-4 relative z-10 min-h-[80vh] flex flex-col justify-center items-center overflow-hidden">
    <div class="max-w-3xl mx-auto text-center text-white py-20 md:py-24 lg:py-26">
      <h2 class="text-xl md:text-2xl font-500 mb-2" data-aos="fade-up" data-aos-duration="500">Psicología Clínica EMDR</h2>
      <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold mb-8 font-playfair" style="font-family: 'Playfair Display', serif;" data-aos="fade-up" data-aos-duration="600" data-aos-delay="50">Nuestras Charlas y talleres</h1>
    </div>
  </div>

  <!-- Curvatura inferior -->
  <div class="absolute bottom-0 left-0 right-0 z-10 translate-y-1">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120" fill="#ffffff" preserveAspectRatio="none">
      <path d="M0,64L80,69.3C160,75,320,85,480,80C640,75,800,53,960,48C1120,43,1280,53,1360,58.7L1440,64L1440,120L1360,120C1280,120,1120,120,960,120C800,120,640,120,480,120C320,120,160,120,80,120L0,120Z"></path>
    </svg>
  </div>
</section>

  <!-- Sección 1: Charlas y talleres - Texto izquierda, imagen derecha -->
  <section class="bg-white py-16 overflow-hidden">
    <div class="container mx-auto px-4">
      <div class="flex flex-col md:flex-row items-center justify-between gap-8">
        <!-- Texto a la izquierda -->
        <div class="md:w-1/2 pr-0 md:pr-8" data-aos="fade-right" data-aos-duration="600">
          <h2 class="text-4xl font-bold text-[#030D55] mb-8" style="font-family: 'Playfair Display', serif;">
            Charlas y talleres
          </h2>
          <p class="text-base text-[#030D55] mb-4">
            En el Instituto Kintsugi creemos que el aprendizaje es un proceso continuo que nos permite crecer y desarrollarnos como personas. Por esto desarrollamos una variedad de talleres para colegios, parejas, agrupaciones, empresas e instituciones, que abordan temas como la felicidad, manejo de conflictos, inteligencia emocional, la comunicación efectiva, el liderazgo, la resiliencia, la autoestima y el manejo del estrés.
          </p>
          <p class="text-base text-[#030D55] mb-4">
            Impartimos talleres que utilizan metodologías participativas, dinámicas y lúdicas. Con nuestros talleres podrás adquirir herramientas prácticas y útiles para mejorar tu calidad de vida, tus relaciones y tu desempeño profesional. Te invitamos a explorar nuestra oferta de talleres y a solicitar el que más te interese.
          </p>
        </div>
        
        <!-- Imagen a la derecha con marco orgánico -->
        <div class="md:w-1/2 relative mt-6 md:mt-0" data-aos="fade-left" data-aos-duration="600" data-aos-delay="100">
          <div class="relative">
            <div class="relative z-10 organic-image-container">
              <img 
                src="{{ get_theme_file_uri('resources/images/charlas1.png') }}" 
                alt="Charlas y talleres" 
                class="w-full rounded-[40px] md:rounded-[100px] h-auto"
              >
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Sección 2: Explorar talleres con curvatura inferior y fondo gris -->
  <section class="relative bg-gray-100 py-16 overflow-hidden">
    <div class="container mx-auto px-4">
      <div class="flex flex-col md:flex-row items-center gap-8">
        <!-- Imagen orgánica a la izquierda -->
        <div class="md:w-1/2 order-2 md:order-1 mt-6 md:mt-0" data-aos="fade-right" data-aos-duration="600">
          <div class="relative">
            <div class="relative z-10 organic-image-container">
              <img 
                src="{{ get_theme_file_uri('resources/images/charlas2.png') }}" 
                alt="Charlas y talleres" 
                class="w-full rounded-[40px] md:rounded-[100px] h-auto"
              >
            </div>
          </div>
        </div>

        <!-- Texto y lista a la derecha -->
        <div class="md:w-1/2 pl-0 md:pl-8 order-1 md:order-2" data-aos="fade-left" data-aos-duration="600" data-aos-delay="100">
          <h2 class="text-3xl font-bold text-[#030D55] mb-6" style="font-family: 'Playfair Display', serif;">
            Te invitamos a explorar nuestra oferta de talleres y a solicitar el que más te interese.
          </h2>
          
          <ul class="space-y-3 text-[#030D55] list-disc pl-5">
            <li data-aos="fade-up" data-aos-duration="400" data-aos-delay="100">Talleres para parejas</li>
            <li data-aos="fade-up" data-aos-duration="400" data-aos-delay="150">Taller de felicidad</li>
            <li data-aos="fade-up" data-aos-duration="400" data-aos-delay="200">Taller de comunicación para empresas</li>
            <li data-aos="fade-up" data-aos-duration="400" data-aos-delay="250">Taller de resiliencia y afrontamiento</li>
            <li data-aos="fade-up" data-aos-duration="400" data-aos-delay="300">Taller de autoestima y auto desarrollo</li>
            <li data-aos="fade-up" data-aos-duration="400" data-aos-delay="350">Taller de comunicación asertiva</li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Curvatura inferior -->
    <div class="absolute bottom-0 left-0 w-full h-20 overflow-hidden">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="absolute bottom-0 w-full">
        <path fill="white" fill-opacity="1" d="M0,64L80,80C160,96,320,128,480,122.7C640,117,800,75,960,64C1120,53,1280,75,1360,85.3L1440,96L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z"></path>
      </svg>
    </div>
  </section>

  <!-- Sección 3: Coaching psicológico con elementos decorativos laterales -->
  <section class="bg-white py-8 relative overflow-hidden mb-10">
    <div class="container mx-auto px-4 relative">
      <!-- Contenido centrado con decorativos integrados -->
      <div class="max-w-4xl mx-auto text-center relative">
        <!-- Elementos decorativos integrados -->
        <div class="absolute left-0 top-1/2 transform -translate-y-1/2 hidden md:block" style="left: -100px;" data-aos="fade-right" data-aos-duration="600">
          <img src="{{ get_theme_file_uri('resources/images/deco1.png') }}" alt="Decoración izquierda" class="w-auto h-56 decorative-image">
        </div>
        
        <div class="absolute right-0 top-1/2 transform -translate-y-1/2 hidden md:block" style="right: -110px;" data-aos="fade-left" data-aos-duration="600">
          <img src="{{ get_theme_file_uri('resources/images/deco2.png') }}" alt="Decoración derecha" class="w-auto h-56 decorative-image">
        </div>
        
        <h2 class="text-4xl font-bold text-[#030D55] mb-8" style="font-family: 'Playfair Display', serif;" data-aos="fade-up" data-aos-duration="600">
          Coaching psicológico
        </h2>
        
        <p class="text-base text-[#030D55] mb-4" data-aos="fade-up" data-aos-duration="500" data-aos-delay="100">
          En el Instituto Kintsugi, creemos que cada persona tiene un potencial único que puede desarrollar y expresar en su vida personal y profesional. De esta manera, podemos ayudarte desde el coaching psicológico, impartido por psicólogos que te ayudarán a conocerte y potenciar tus recursos, superar las dificultades y alcanzar tus objetivos.
        </p>
        
        <p class="text-base text-[#030D55] mb-6" data-aos="fade-up" data-aos-duration="500" data-aos-delay="150">
          Con el coaching psicológico podrás mejorar tus capacidades individuales, tu bienestar emocional y tu rendimiento laboral. Te invitamos a vivir esta experiencia de aprendizaje y cambio con nosotros.
        </p>
        
        <p class="text-base text-[#030D55] font-semibold" data-aos="fade-up" data-aos-duration="500" data-aos-delay="200">
          Coaching of life, de pareja, laboral, felicidad.
        </p>
      </div>
    </div>
  </section>
@endsection
