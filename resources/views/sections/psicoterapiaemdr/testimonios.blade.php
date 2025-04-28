{{--
  Template Name: Testimonios EMDR
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
          <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-[#030D55] mb-8 leading-none transition-all duration-500 hover:text-[#AB277A] font-paytone" style="line-height: 1.1;">
           Testimonios reales: sanar es posible
          </h1>
          <p class="text-4xl mt-14 text-[#AB277A] transition-all duration-300 hover:translate-x-2" style="font-family: 'Hugamour', serif; font-weight: 400;">
            #El trauma se puede superar
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
            src="{{ get_theme_file_uri('resources/images/nosotros.png') }}" 
            alt="Persona en sesión de terapia" 
            class="max-w-full h-auto rounded-lg relative z-10 transition-transform duration-500 hover:scale-105"
            style="max-width: 580px; position: relative;"
          >
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
  <section class="bg-[#CCA0E00D] py-10 lg:py-16 overflow-x-hidden">
    <div class="container mx-auto px-4">
      <!-- Contenido centrado -->
      <div class="max-w-4xl mx-auto text-center" data-aos="fade-up" data-aos-duration="600">
        <h2 class="text-4xl lg:text-5xl font-bold text-[#030D55] mb-8 transition-all duration-500 hover:text-[#AB277A] font-paytone" style="font-weight: 800;">
          El testimonio de quienes <br> transformaron sus vidas
        </h2>
        
        <div class="prose prose-lg mx-auto">
          <p class="font-normal text-base leading-7 text-center transition-all duration-300 hover:translate-y-[-2px]">
            Queremos compartir contigo la experiencia de dos pacientes que, con gran generosidad, han querido relatar su proceso en Psicoterapia EMDR. Su testimonio busca ayudar a quienes aún tienen dudas o temores, brindando una visión realista y cercana de este enfoque terapéutico.
          </p>
          
          <p class="font-normal text-base leading-7 mt-4 text-center transition-all duration-300 hover:translate-y-[-2px]">
            Agradecemos profundamente a Lorena y Fernando por su tremenda generosidad, disposición y gratitud para compartir su camino hacia la reparación de sus heridas de vida. Su testimonio es un regalo para quienes buscan bienestar, transformación y aún no saben qué ruta seguir.
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
          <h4 class="text-center text-2xl font-extrabold text-[#AB277A] mb-4 transition-all duration-500 hover:text-[#030D55] font-paytone">Lorena López</h4>
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
            <iframe class="w-full aspect-video" src="https://www.youtube.com/embed/8NmFpjcz-QU" title="Testimonio de Fernando Torres" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
        </div>
        
        <!-- Texto del testimonio a la derecha -->
        <div class="md:w-4/9" data-aos="fade-left" data-aos-duration="600">
          <h4 class="text-center md:text-right text-2xl font-extrabold text-[#AB277A] mb-4 transition-all duration-500 hover:text-[#030D55] font-paytone">Fernando Torres</h4>
          <p class="text-base leading-7 transition-all duration-300 hover:translate-y-[-2px]" style="font-family: 'Roboto', sans-serif;">"Mi proceso de terapia con Shénhui fue transformador. Desde el primer momento, ella me acompañó con mucha calidez, guiándome con firmeza pero siempre con amabilidad, tanto en los días buenos como en los más difíciles."</p>
        </div>
      </div>
    </div>
  </section>
@endsection
