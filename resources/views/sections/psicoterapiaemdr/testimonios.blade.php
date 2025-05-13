{{--
  Template Name: Testimonios EMDR
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
          <span class="text-[#AB277A] text-sm md:text-base uppercase tracking-wider font-medium mb-2 block">Testimonios EMDR</span>
          <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-[#030D55] mb-4 md:mb-8 leading-none transition-all duration-500 hover:text-[#AB277A] font-paytone" style="line-height: 1.1;">
           Testimonios reales: sanar es posible
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
                src="{{ get_theme_file_uri('resources/images/heros/testimonios.png') }}" 
                alt="Persona en sesión de terapia" 
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
        <path fill="#CCA0E00D" fill-opacity="1" d="M0,96L48,112C96,128,192,160,288,186.7C384,213,480,235,576,224C672,213,768,171,864,149.3C960,128,1056,128,1152,149.3C1248,171,1344,213,1392,234.7L1440,256L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
      </svg>
    </div>
  </section>

  <!-- Segunda sección con fondo lavanda claro -->
  <section class="bg-[#CCA0E00D] py-10 lg:py-16 overflow-x-hidden">
    <div class="container mx-auto px-4">
      <!-- Contenido centrado -->
      <div class="max-w-4xl mx-auto text-center" data-aos="fade-up" data-aos-duration="600">
        <h2 class="text-2xl md:text-4xl lg:text-4xl font-bold text-[#030D55] mb-8 transition-all duration-500 hover:text-[#AB277A] font-paytone">
          Testimonios de quienes <br> transformaron sus vidas
        </h2>
        
        <div class="prose prose-lg mx-auto">
          <p class="font-normal text-base leading-7 text-center transition-all duration-300 hover:translate-y-[-2px]">
          Queremos compartir contigo la experiencia de pacientes que, con gran generosidad, han querido relatar su proceso en Psicoterapia EMDR. Su testimonio busca ayudar a quienes aún tienen dudas o temores, brindando una visión realista y cercana de este enfoque terapéutico.
          </p>
          
          <p class="font-normal text-base leading-7 mt-4 text-center transition-all duration-300 hover:translate-y-[-2px]">
          Queremos compartir contigo la experiencia de pacientes que, con gran generosidad, han querido relatar su proceso en Psicoterapia EMDR. Su testimonio busca ayudar a quienes aún tienen dudas o temores, brindando una visión realista y cercana de este enfoque terapéutico.
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- Primer Testimonio - Lorena López -->
  <section class="bg-white py-16 relative overflow-x-hidden">
    <div class="container mx-auto px-4">
      <div class="flex flex-col md:flex-row gap-16 items-center max-w-6xl mx-auto">
        <!-- Texto del testimonio a la izquierda -->
        <div class="md:w-4/9 order-2 md:order-1" data-aos="fade-right" data-aos-duration="600">
          <h4 class="text-xl md:text-2xl font-extrabold text-[#AB277A] mb-4 transition-all duration-500 hover:text-[#030D55] font-paytone">
            Lorena
          </h4>
          <p class="text-base leading-7 transition-all duration-300 hover:translate-y-[-2px]" style="font-family: 'Roboto', sans-serif;">"Después de años en terapias largas y sin resultados, la terapia con Julio César fue un antes y un después para mí. En pocas sesiones vi cambios concretos, sin revivir traumas. Sentí que limpié mucho de mi interior y que, por fin, tenía una alternativa real al sufrimiento."</p>
        </div>
        
        <!-- Video a la derecha -->
        <div class="md:w-5/9 order-1 md:order-2" data-aos="fade-left" data-aos-duration="600">
          <div style="border-radius: 16px; overflow: hidden; box-shadow: 0px 4px 16px 0px #AB277A; border: 4px solid white;" class="transition-transform duration-500 hover:scale-105">
            <iframe class="w-full aspect-video" src="https://www.youtube.com/embed/Ft3oIUaRA5g" title="Testimonio de Lorena López" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Segundo Testimonio - Fernando Torres -->
  <section class="bg-white pb-20 relative overflow-x-hidden">
    <div class="container mx-auto px-4 py-12">
      <div class="flex flex-col md:flex-row gap-16 items-center max-w-6xl mx-auto">
        <!-- Video a la izquierda -->
        <div class="md:w-5/9" data-aos="fade-right" data-aos-duration="600">
          <div style="border-radius: 16px; overflow: hidden; box-shadow: 0px 4px 16px 0px #AB277A; border: 4px solid white;" class="transition-transform duration-500 hover:scale-105">
            <iframe class="w-full aspect-video" src="https://www.youtube.com/embed/S9de95EBTXI" title="Testimonio de Fernando Torres" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
        </div>
        
        <!-- Texto del testimonio a la derecha -->
        <div class="md:w-3/9" data-aos="fade-left" data-aos-duration="600">
          <h4 class="text-xl md:text-2xl font-extrabold text-[#AB277A] mb-4 transition-all duration-500 hover:text-[#030D55] font-paytone">
            Fernando
          </h4>
          <p class="text-base leading-7 transition-all duration-300 hover:translate-y-[-2px]" style="font-family: 'Roboto', sans-serif;">"Mi proceso de terapia con Shénhui fue transformador. Desde el primer momento, ella me acompañó con mucha calidez, guiándome con firmeza pero siempre con amabilidad, tanto en los días buenos como en los más difíciles."</p>
        </div>
      </div>
    </div>
  </section>
@endsection
