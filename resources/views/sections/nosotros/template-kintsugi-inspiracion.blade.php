{{--
  Template Name: Qué nos inspira
--}}

@extends('layouts.app')

@section('content')
  <!-- Hero Section -->
  <section class="relative bg-white overflow-x-hidden">
    <div class="container mx-auto px-4 py-20 lg:py-28 relative z-10 mt-15">
      <div class="flex flex-col lg:flex-row items-center">
        <!-- Columna de texto -->
        <div class="lg:w-1/2 mb-12 lg:mb-0" data-aos="fade-right" data-aos-duration="600">
          <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-[#030D55] mb-8 leading-none transition-all duration-500 hover:text-[#AB277A]" style="font-family: 'Playfair Display', serif; line-height: 1.1;">
            Sanar es transformar tus heridas
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
            src="{{ get_theme_file_uri('resources/images/queinspira.png') }}" 
            alt="Kintsugi: nuestra inspiración" 
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
      <div class="flex flex-col lg:flex-row items-center gap-8">
        <!-- Imagen a la izquierda -->
        <div class="lg:w-1/2 flex justify-center lg:justify-start relative order-2 lg:order-1" data-aos="fade-right" data-aos-duration="600">
          <img 
            src="{{ get_theme_file_uri('resources/images/queinspira2.png') }}" 
            alt="Qué nos inspira" 
            class="max-w-full h-auto rounded-lg relative z-10 transition-transform duration-500 hover:scale-105"
            style="max-width: 543px;"
          >
        </div>
        
        <!-- Texto explicativo -->
        <div class="lg:w-1/2 mb-8 lg:mb-0 pr-0 lg:pr-6 order-1 lg:order-2" data-aos="fade-left" data-aos-duration="600">
          <h2 class="text-4xl lg:text-5xl font-bold text-[#030D55] mb-8 transition-all duration-500 hover:text-[#AB277A]" style="font-family: 'Playfair Display', serif; font-weight: 800;">
            ¿Qué nos inspira?
          </h2>
          
          <div class="prose prose-lg">
            <p class="font-normal text-base leading-7 transition-all duration-300 hover:translate-y-[-2px]">
              Nos motiva profundamente acompañar a las personas en su camino de sanación tras haber enfrentado experiencias traumáticas. Desde el comienzo de nuestra trayectoria, hemos dedicado nuestra pasión y conocimientos a comprender y aliviar el impacto del trauma, convencidos de que cada individuo posee la capacidad innata de superar la adversidad y reconstruir una vida llena de significado.
            </p>
            
            <p class="font-normal text-base leading-7 mt-4 transition-all duration-300 hover:translate-y-[-2px]">
              Nuestra vocación nace de una firme creencia: <strong>toda persona merece vivir sin el peso del trauma que limita su potencial</strong>. Nos comprometemos a crear un espacio seguro y acogedor, donde las emociones puedan ser exploradas con libertad y la autoestima pueda florecer nuevamente.
            </p>
            
            <p class="font-normal text-base leading-7 mt-4 transition-all duration-300 hover:translate-y-[-2px]">
              Entendemos que la recuperación es un proceso integral, y <strong>estamos aquí para brindar el apoyo necesario que transforme el dolor en fortaleza y el miedo en empoderamiento</strong> y que logres ser el mejor ser humano que quieres ser.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection 