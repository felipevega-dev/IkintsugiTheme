{{--
  Template Name: Qué nos inspira
--}}

@extends('layouts.app')

@section('content')
  <!-- Hero Section con fondo blanco y figura morada alrededor de la foto -->
  <div class="relative bg-white overflow-hidden">
    <!-- Contenido del hero -->
    <div class="container mx-auto px-4 py-20 lg:py-28 relative z-10 mt-15">
      <div class="flex flex-col lg:flex-row items-center">
        <!-- Columna de texto -->
        <div class="lg:w-1/2 mb-12 lg:mb-0">
          <h1 class="text-5xl lg:text-7xl font-bold text-[#030D55] mb-8 leading-none" style="font-family: 'Playfair Display', serif; font-weight: 800;">
            Sanar es transformar tus heridas
          </h1>
          <p class="text-3xl lg:text-5xl text-[#AB277A] mt-6" style="font-family: 'Hugamour', serif; font-weight: 400;">
            #Mereces una vida mejor
          </p>
        </div>
        
        <!-- Imagen a la derecha con fondo morado -->
        <div class="lg:w-1/2 flex justify-center lg:justify-end relative">
          <!-- Fondo morado orgánico que rodea la imagen (usando una imagen SVG directo) -->
          <div class="absolute inset-0 z-0">
            <svg width="90%" height="100%" viewBox="0 0 600 600" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M50,50 C150,20 300,30 400,60 C520,100 580,50 580,120 C580,250 560,400 540,500 C520,550 450,580 380,580 C280,580 180,550 100,500 C50,460 20,380 20,300 C20,200 30,100 50,50 Z" fill="#F5B3F3"/>
            </svg>
          </div>
          
          <!-- Elementos gráficos de fondo -->
          <div class="absolute w-16 h-16 rounded-full bg-[#9978d1] opacity-40 top-10 left-5 z-0"></div>
          <div class="absolute w-12 h-12 rounded-full bg-[#9978d1] opacity-30 bottom-10 right-10 z-0"></div>
          <!-- Líneas decorativas -->
          <div class="absolute h-[40%] w-px bg-white opacity-20 top-10 left-1/3 z-0"></div>
          <div class="absolute h-px w-[20%] bg-white opacity-20 top-1/3 right-20 z-0"></div>
          
          <!-- Imagen actual -->
          <img 
            src="{{ get_theme_file_uri('resources/images/queinspira.png') }}" 
            alt="Persona en sesión de terapia" 
            class="max-w-full h-auto rounded-lg relative z-10"
            style="max-width: 580px;"
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
  </div>
  
  <!-- Segunda sección con fondo lavanda claro -->
  <div class="bg-[#CCA0E00D] py-10 lg:py-16">
    <div class="container mx-auto px-4">
      <div class="flex flex-col lg:flex-row items-center gap-8">
        <!-- Imagen a la izquierda -->
        <div class="lg:w-1/2 flex justify-center lg:justify-start relative order-2 lg:order-1">
          <!-- Fondo morado orgánico -->
          <div class="absolute inset-0 z-0">
            <svg width="100%" height="100%" viewBox="0 0 600 600" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M50,80 C150,20 250,0 350,20 C450,40 550,100 580,200 C600,290 590,380 550,450 C510,520 440,550 370,570 C280,590 190,580 120,530 C50,480 0,400 0,310 C0,220 30,130 50,80 Z" fill="#F5B3F3"/>
            </svg>
          </div>
          
          <img 
            src="{{ get_theme_file_uri('resources/images/queinspira2.png') }}" 
            alt="Qué nos inspira" 
            class="max-w-full h-auto rounded-lg relative z-10"
            style="max-width: 543px;"
          >
        </div>
        
        <!-- Texto explicativo -->
        <div class="lg:w-1/2 mb-8 lg:mb-0 pr-0 lg:pr-6 order-1 lg:order-2">
          <h2 class="text-4xl lg:text-5xl font-bold text-[#030D55] mb-8" style="font-family: 'Playfair Display', serif; font-weight: 800;">
            ¿Qué nos inspira?
          </h2>
          
          <div class="prose prose-lg">
            <p class="font-normal text-base leading-7">
              Nos motiva profundamente acompañar a las personas en su camino de sanación tras haber enfrentado experiencias traumáticas. Desde el comienzo de nuestra trayectoria, hemos dedicado nuestra pasión y conocimientos a comprender y aliviar el impacto del trauma, convencidos de que cada individuo posee la capacidad innata de superar la adversidad y reconstruir una vida llena de significado.
            </p>
            
            <p class="font-normal text-base leading-7 mt-4">
              Nuestra vocación nace de una firme creencia: <strong>toda persona merece vivir sin el peso del trauma que limita su potencial</strong>. Nos comprometemos a crear un espacio seguro y acogedor, donde las emociones puedan ser exploradas con libertad y la autoestima pueda florecer nuevamente.
            </p>
            
            <p class="font-normal text-base leading-7 mt-4">
              Entendemos que la recuperación es un proceso integral, y <strong>estamos aquí para brindar el apoyo necesario que transforme el dolor en fortaleza y el miedo en empoderamiento</strong> y que logres ser el mejor ser humano que quieres ser.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection 