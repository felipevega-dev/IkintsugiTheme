{{--
  Template Name: Quienes Somos
--}}

@extends('layouts.app')

@section('content')
  <!-- HERO SECTION (antes en hero.blade.php) -->
  <section class="relative bg-white pt-20 md:pt-36 pb-10 md:pb-15 overflow-hidden">
    <div class="container mx-auto px-4 relative z-10">
      <!-- Contenedor con flexbox en columna inversa para móvil y fila para desktop -->
      <div class="flex flex-col md:flex-row items-center justify-center gap-8 md:gap-16">
        
        <!-- ORDEN MODIFICADO: Primero mostramos la imagen en el DOM para que aparezca primero en móvil -->
        <!-- Imagen - aparece primero en móvil, a la derecha en desktop -->
        <div class="w-full md:w-2/5 md:order-last mb-6 md:mb-0">
          <div class="relative mx-auto">
            <!-- Imagen con marco personalizado -->
            <div class="relative mx-auto hero-image-container" style="width: 330px; height: 330px; max-width: 100%; max-height: 100%;">
              
              <!-- Formas ameboides como en la imagen de referencia 2 -->
              <svg viewBox="0 0 450 450" class="absolute top-0 left-0 w-full h-full" style="transform-origin: center;">
                <path d="M225,10 C280,10 330,30 360,80 C390,130 410,180 400,230 C390,280 370,320 330,370 C290,420 250,440 190,430 C130,420 90,390 60,340 C30,290 20,230 40,180 C60,130 90,80 140,40 C175,15 210,10 225,10 Z" 
                    fill="none" stroke="#8961C4" stroke-width="1.5" stroke-opacity="0.6" style="transform-origin: center; animation: float 15s infinite ease-in-out;"/>
              </svg>
              
              <svg viewBox="0 0 450 450" class="absolute top-0 left-0 w-full h-full" style="transform: scale(0.92); transform-origin: center;">
                <path d="M225,30 C270,30 310,50 340,90 C370,130 385,170 380,210 C375,250 360,290 325,330 C290,370 260,390 210,385 C160,380 125,360 100,320 C75,280 65,230 80,190 C95,150 120,110 160,80 C185,60 210,30 225,30 Z" 
                    fill="none" stroke="#F5B3F3" stroke-width="1.5" stroke-opacity="0.7" style="transform-origin: center; animation: float 12s infinite ease-in-out reverse;"/>
              </svg>
              
              <svg viewBox="0 0 450 450" class="absolute top-0 left-0 w-full h-full" style="transform: scale(0.85); transform-origin: center;">
                <path d="M225,50 C265,50 295,65 320,100 C345,135 360,170 355,205 C350,240 335,270 305,305 C275,340 245,355 205,350 C165,345 140,325 120,295 C100,265 90,230 100,195 C110,160 130,125 165,100 C185,85 200,50 225,50 Z" 
                    fill="none" stroke="#030D55" stroke-width="1" stroke-opacity="0.7" style="transform-origin: center; animation: float 10s infinite ease-in-out;"/>
              </svg>
              
              <!-- Animación flotante para las formas -->
              <style>
                @keyframes float {
                  0% { transform: translateY(0) rotate(0deg); }
                  25% { transform: translateY(5px) rotate(1deg); }
                  50% { transform: translateY(0) rotate(0deg); }
                  75% { transform: translateY(-5px) rotate(-1deg); }
                  100% { transform: translateY(0) rotate(0deg); }
                }
              </style>
              
              <!-- Imagen circular más grande -->
              <div class="absolute inset-0 m-10 overflow-hidden rounded-full border-2 border-white shadow-md">
                <img src="{{ get_theme_file_uri('resources/images/nosotros.png') }}" alt="Mujer en terapia" class="w-full h-full object-cover transition-transform duration-700 hover:scale-110">
              </div>
            </div>
          </div>
        </div>
        
        <!-- Texto - aparece segundo en móvil, a la izquierda en desktop -->
        <div class="w-full md:w-2/5 md:order-first md:ml-auto">
          <h1 class="text-3xl md:text-5xl lg:text-6xl font-bold mb-4 text-[#030D55] transition-all duration-500 hover:text-[#AB277A]" style="font-family: 'Playfair Display', serif; line-height: 1.1;">
            Donde tus<br>cicatrices se<br>vuelven fortaleza
          </h1>
          
          <p class="text-2xl md:text-4xl mt-6 md:mt-14 text-[#AB277A] transition-all duration-300 hover:translate-x-2" style="font-family: 'Hugamour', sans-serif;">
            #El trauma se puede superar
          </p>
        </div>
      </div>
    </div>
    
    <!-- Estilos específicos para asegurar el tamaño correcto en PC -->
    <style>
      @media (min-width: 768px) {
        .hero-image-container {
          width: 500px !important;
          height: 500px !important;
        }
      }
    </style>
  </section> 

  <!-- QUIENES SOMOS SECTION (antes en quienes-somos.blade.php) -->
  <section class="bg-white relative overflow-hidden py-8 md:py-16">
    <div class="container mx-auto px-4">
      <div class="flex flex-col md:flex-row items-center gap-6 md:gap-12 lg:gap-16">
        <div class="md:w-1/2 relative">
          <div class="relative z-10 max-w-[450px] mx-auto md:mx-0 mb-3 md:mb-0">
            <div class="rounded-2xl overflow-hidden">
              <img
                src="{{ get_theme_file_uri('resources/images/quienesomos.png') }}"
                alt="Quiénes Somos"
                class="w-full h-auto object-cover"
              >
            </div>
          </div>
        </div>
        
        <div class="md:w-1/2">
          <div class="max-w-[520px] mx-auto md:mx-0">
            <h2 class="text-3xl md:text-4xl lg:text-5xl font-extrabold mb-6 text-[#030D55]" style="font-family: 'Playfair Display', serif; line-height: 1.1; letter-spacing: 0%;">
              Quiénes somos
            </h2>
            
            <div class="space-y-3 md:space-y-4">
              <p class="text-[#181818] font-normal" style="font-family: 'Roboto', sans-serif; font-size: 15px; line-height: 1.6; @media (min-width: 768px) { font-size: 16px; line-height: 1.7; }">
                En Instituto Kintsugi, nos dedicamos apasionadamente a mejorar tu bienestar mental y emocional, ofreciéndote un camino hacia la curación y el autodescubrimiento, inspirado en la filosofía japonesa del Kintsugi.
              </p>
              
              <p class="text-[#181818] font-normal" style="font-family: 'Roboto', sans-serif; font-size: 15px; line-height: 1.6; @media (min-width: 768px) { font-size: 16px; line-height: 1.7; }">
                Así como esta técnica transforma objetos rotos en arte más valioso al resaltar sus grietas con oro, creemos que tus experiencias difíciles pueden convertirse en tu mayor fortaleza con el apoyo adecuado.
              </p>
              
              <p class="text-[#181818]" style="font-family: 'Roboto', sans-serif; font-size: 15px; line-height: 1.6; @media (min-width: 768px) { font-size: 16px; line-height: 1.7; }">
                <span class="font-normal">Nuestro equipo especializado integra terapias basadas en evidencia científica, como EMDR, en un ambiente seguro y comprensivo donde puedes sanar tus heridas del pasado y construir un presente más pleno. </span>
                <span class="font-semibold">En Instituto Kintsugi, transformamos cicatrices en fortalezas que iluminan tu camino hacia una vida más auténtica y significativa.</span>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> 

  <!-- SOBRE NOSOTROS SECTION (antes en sobre-nosotros.blade.php) -->
  <section class="py-12 md:py-20 bg-white relative overflow-hidden pt-10 md:pt-14">
    <div class="container mx-auto px-4">
      <div class="text-center mb-8 md:mb-12">
        <h2 class="text-3xl md:text-5xl font-extrabold mb-6 md:mb-8 text-[#030D55]" style="font-family: 'Playfair Display', serif; font-size: 36px; line-height: 1.1; letter-spacing: 0%; @media (min-width: 768px) { font-size: 48px; }">
          Sobre nosotros
        </h2>
        
        <div class="mx-auto max-w-2xl mb-8 md:mb-14">
          <p class="text-center mb-4 md:mb-6 text-[#181818]" style="font-family: 'Roboto', sans-serif; font-weight: 400; font-size: 15px; line-height: 1.6; @media (min-width: 768px) { font-size: 16px; line-height: 1.7; }">
            Somos un equipo especializado en salud mental y terapia EMDR, avalada científicamente, enfocándonos en ayudarte a superar adversidades como maltrato, bullying o situaciones de violencia, adaptando cada tratamiento a ti.
          </p>
          
          <p class="text-center text-[#181818]" style="font-family: 'Roboto', sans-serif; font-weight: 400; font-size: 15px; line-height: 1.6; @media (min-width: 768px) { font-size: 16px; line-height: 1.7; }">
            Nuestro compromiso: brindarte un espacio seguro donde puedas recuperar tu equilibrio y construir una vida plena.
          </p>
        </div>
      </div>
      
      <!-- Equipo -->
      <div class="flex flex-wrap justify-center gap-8 md:gap-16 lg:gap-32 mx-auto">
        <!-- Terapeuta 1 -->
        <div class="w-auto">
          <!-- Foto circular con botón -->
          <div class="flex flex-col items-center relative">
            <div class="w-[200px] h-[200px] md:w-[250px] md:h-[250px] rounded-full overflow-hidden transition-transform duration-500 hover:scale-105">
              <img src="{{ get_theme_file_uri('resources/images/julio.png') }}" alt="Julio César" class="w-full h-full object-cover transition-all duration-700 hover:saturate-150">
            </div>
            <div class="absolute -bottom-3 left-1/2 transform -translate-x-1/2">
              <div class="p-[2px] rounded-2xl bg-gradient-to-b from-[rgba(171,39,122,0.48)] to-[rgba(3,13,85,0.48)]">
                <a href="{{ site_url('/julio-cesar') }}" class="inline-block text-center text-[13px] md:text-[14px] font-medium py-1 px-6 md:px-8 bg-white text-[#030D55] rounded-2xl transition-all duration-300 hover:bg-gradient-to-b from-[rgba(171,39,122,0.48)] to-[rgba(3,13,85,0.48)] hover:text-white">
                  Ver perfil
                </a>
              </div>
            </div>
          </div>
          
          <!-- Nombre y credenciales -->
          <div class="text-left mt-8">
            <h3 class="font-medium text-[#FF3382] text-lg md:text-xl mb-3 transition-transform duration-300 hover:translate-x-1">
              @Psicologo_JulioCesar
            </h3>
            
            <!-- Información sin puntos -->
            <ul class="list-none text-left text-xs md:text-sm space-y-0.5 max-w-[300px]">
              <li class="transition-all duration-200 hover:text-[#AB277A] hover:font-medium">Psicólogo Clínico</li>
              <li class="transition-all duration-200 hover:text-[#AB277A] hover:font-medium">Máster en Psicoterapia EMDR</li>
              <li class="transition-all duration-200 hover:text-[#AB277A] hover:font-medium">Hipnosis Clínica</li>
              <li class="transition-all duration-200 hover:text-[#AB277A] hover:font-medium">Diplomado en Gerontología</li>
              <li class="transition-all duration-200 hover:text-[#AB277A] hover:font-medium">Con experiencia en el trabajo con adolescentes, adultos, adultos mayores y parejas.</li>
              <li class="transition-all duration-200 hover:text-[#AB277A] hover:font-medium">Cofundador del Instituto Kintsugi</li>
              <li class="transition-all duration-200 hover:text-[#AB277A] hover:font-medium">Co-conductor y coordinador del podcast @EmisorKintsugi, donde participa en entrevistas y debates sobre temas de salud mental.</li>
              <li class="transition-all duration-200 hover:text-[#AB277A] hover:font-medium">Miembro Asociación de EMDR Chile y España</li>
            </ul>
          </div>
        </div>
        
        <!-- Terapeuta 2 -->
        <div class="w-auto">
          <!-- Foto circular con botón -->
          <div class="flex flex-col items-center relative">
            <div class="w-[200px] h-[225px] md:w-[250px] md:h-[275px] rounded-full overflow-hidden transition-transform duration-500 hover:scale-105">
              <img src="{{ get_theme_file_uri('resources/images/shenhui.png') }}" alt="Shenhui" class="w-full h-full object-cover transition-all duration-700 hover:saturate-150">
            </div>
            <div class="absolute -bottom-[-4px] left-1/2 transform -translate-x-1/2">
              <div class="p-[2px] rounded-2xl bg-gradient-to-b from-[rgba(171,39,122,0.48)] to-[rgba(3,13,85,0.48)]">
                <a href="{{ site_url('/shenhui') }}" class="inline-block text-center text-[13px] md:text-[14px] font-medium py-1 px-6 md:px-8 bg-white text-[#030D55] rounded-2xl transition-all duration-300 hover:bg-gradient-to-b from-[rgba(171,39,122,0.48)] to-[rgba(3,13,85,0.48)] hover:text-white">
                  Ver perfil
                </a>
              </div>
            </div>
          </div>
          
          <!-- Nombre y credenciales -->
          <div class="text-left mt-3">
            <h3 class="font-medium text-[#FF3382] text-lg md:text-xl mb-3 transition-transform duration-300 hover:translate-x-1">
              @Psicologa_Shenhui
            </h3>
            
            <!-- Información sin puntos -->
            <ul class="list-none text-left text-xs md:text-sm space-y-0.5 max-w-[300px]">
              <li class="transition-all duration-200 hover:text-[#AB277A] hover:font-medium">Psicóloga Clínica EMDR</li>
              <li class="transition-all duration-200 hover:text-[#AB277A] hover:font-medium">Máster en Psicoterapia EMDR</li>
              <li class="transition-all duration-200 hover:text-[#AB277A] hover:font-medium">Happiness Trainer</li>
              <li class="transition-all duration-200 hover:text-[#AB277A] hover:font-medium">Hipnosis Clínica</li>
              <li class="transition-all duration-200 hover:text-[#AB277A] hover:font-medium">Emotional Freedom Techniques (EFT)</li>
              <li class="transition-all duration-200 hover:text-[#AB277A] hover:font-medium">PAR/IJVE para trauma, apego y disociación</li>
              <li class="transition-all duration-200 hover:text-[#AB277A] hover:font-medium">Instructora de QIGONG</li>
              <li class="transition-all duration-200 hover:text-[#AB277A] hover:font-medium">Co-fundadora del Instituto Kintsugi</li>
              <li class="transition-all duration-200 hover:text-[#AB277A] hover:font-medium">Co-conductora de @EmisorKintsugi, podcast de divulgación científica de salud mental.</li>
              <li class="transition-all duration-200 hover:text-[#AB277A] hover:font-medium">Psicoterapia para adultos, adulto mayor y parejas</li>
              <li class="transition-all duration-200 hover:text-[#AB277A] hover:font-medium">Miembro Asociación de EMDR Chile y España</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    
  
  </section>

  <!-- MISIÓN Y VALORES SECTION (antes en mision-valores.blade.php) -->
  <section class="py-12 md:py-50 relative overflow-hidden">
    <!-- Fondo con imagen vectorial y efecto de degradado -->
    <div class="absolute top-0 left-0 w-full h-full z-0">
      <img src="{{ get_theme_file_uri('resources/images/vector1.png') }}" alt="Fondo" class="w-full h-full object-cover">
      <div class="absolute top-0 left-0 w-full h-full" style="background: linear-gradient(180deg, rgba(171, 39, 122, 0.4) 0%, rgba(3, 13, 85, 0.4) 61%);"></div>
      <div class="absolute top-0 left-0 w-full h-full">
        <img src="{{ get_theme_file_uri('resources/images/vector2.png') }}" alt="Efecto sombra" class="w-full h-full object-cover opacity-70 mix-blend-multiply">
      </div>
      
      <!-- Curva superior integrada en el fondo -->
      <div class="absolute top-0 left-0 right-0 w-full z-10">
        <svg width="100%" height="70" viewBox="0 0 1440 70" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M0,35 C240,0 480,0 720,35 C960,70 1200,70 1440,35 L1440,0 L0,0 Z" fill="white"></path>
        </svg>
      </div>
    </div>
    
    <!-- Contenido -->
    <div class="container mx-auto px-4 relative z-20 mt-14 md:mt-24">
      <div class="flex flex-col md:flex-row items-center justify-center gap-10 md:gap-8 relative">
        <!-- Misión -->
        <div class="bg-white/80 rounded-[16px] p-[20px] md:p-[24px] shadow-lg relative z-10 transition-all duration-500 hover:bg-white hover:shadow-xl hover:-translate-y-2 w-full max-w-[350px] md:max-w-[395px] mb-12 md:mb-0" style="min-height: 300px; @media (min-width: 768px) { min-height: 376px; }">
          <h3 class="text-[20px] md:text-[24px] font-bold mb-3 md:mb-4 text-[#030D55] text-center transition-all duration-300 hover:text-[#AB277A]" style="font-family: 'Playfair Display', serif; line-height: 100%; letter-spacing: 0%;">
            Nuestra misión
          </h3>
          <p class="text-[#181818] text-sm md:text-base" style="font-family: 'Roboto', sans-serif; font-weight: 400; line-height: 24px; md:line-height: 28px; letter-spacing: 0%;">
            Estamos comprometidos en promover, difundir y brindar soluciones desde la Psicoterapia EMDR a problemáticas de la salud mental. Estamos enfocados en mejorar la calidad de vida de las personas, familias, grupos, comunidades e instituciones a través de la entrega de herramientas e intervenciones eficaces, basadas en evidencia científica, que permitan facilitar el desarrollo subjetivo y social de nuestros pacientes.
          </p>
          
          <!-- Línea conectora hacia el logo con puntitos (visible solo en desktop) -->
          <div class="hidden md:flex absolute right-[-60px] top-1/2 items-center z-30">
            <div class="flex items-center space-x-1">
            <div class="w-2 h-2 rounded-full bg-[#F5B3F3] animate-ping" style="animation-duration: 2s;"></div>
            <div class="w-2 h-2 rounded-full bg-[#F5B3F3] animate-ping" style="animation-duration: 2.5s;"></div>
            <div class="w-2 h-2 rounded-full bg-[#F5B3F3] animate-ping" style="animation-duration: 3s;"></div>
            </div>
          </div>
        </div>
        
        <!-- Logo central -->
        <div class="relative flex items-center justify-center mx-4 md:mx-6 z-20 mb-12 md:mb-0">
          <!-- Logo blanco -->
          <div class="relative z-10 transition-all duration-500 hover:scale-110">
            <img src="{{ get_theme_file_uri('resources/images/logoblanco.png') }}" alt="Ikintsugi Logo" style="width: 180px; height: 45px; @media (min-width: 768px) { width: 226px; height: 56px; }">
          </div>
        </div>
        
        <!-- Valores -->
        <div class="bg-white/80 rounded-[16px] p-[20px] md:p-[24px] shadow-lg relative z-10 transition-all duration-500 hover:bg-white hover:shadow-xl hover:-translate-y-2 w-full max-w-[350px] md:max-w-[395px]" style="min-height: 300px; @media (min-width: 768px) { min-height: 376px; }">
          <!-- Línea conectora hacia el logo con puntitos (visible solo en desktop) -->
          <div class="hidden md:flex absolute left-[-60px] top-1/2 items-center z-30">
            <div class="flex items-center space-x-1 flex-row-reverse">
              <div class="w-2 h-2 rounded-full bg-[#F5B3F3] animate-ping" style="animation-duration: 2s;"></div>
              <div class="w-2 h-2 rounded-full bg-[#F5B3F3] animate-ping" style="animation-duration: 2.5s;"></div>
            <div class="w-2 h-2 rounded-full bg-[#F5B3F3] animate-ping" style="animation-duration: 3s;"></div>
            </div>
          </div>
          
          <h3 class="text-[20px] md:text-[24px] font-bold mb-3 md:mb-4 text-[#030D55] text-center transition-all duration-300 hover:text-[#AB277A]" style="font-family: 'Playfair Display', serif; line-height: 100%; letter-spacing: 0%;">
            Nuestros valores
          </h3>
          <p class="mb-2 md:mb-4 text-[#181818] text-sm md:text-base" style="font-family: 'Roboto', sans-serif; font-weight: 400; line-height: 24px; md:line-height: 28px; letter-spacing: 0%;">
            Como miembros de la Iniciativa Kintsugi creemos en la reparación del ser humano inspirada en los siguientes valores:
          </p>
          <ul class="space-y-0 md:space-y-1 text-[#181818] text-sm md:text-base" style="font-family: 'Roboto', sans-serif; font-weight: 400; line-height: 24px; md:line-height: 28px; letter-spacing: 0%;">
            <li class="transition-all duration-200 hover:text-[#AB277A] hover:font-bold hover:translate-x-1"><span class="font-bold">Confianza</span></li>
            <li class="transition-all duration-200 hover:text-[#AB277A] hover:font-bold hover:translate-x-1"><span class="font-bold">Respeto</span></li>
            <li class="transition-all duration-200 hover:text-[#AB277A] hover:font-bold hover:translate-x-1"><span class="font-bold">Aceptación incondicional</span></li>
            <li class="transition-all duration-200 hover:text-[#AB277A] hover:font-bold hover:translate-x-1"><span class="font-bold">Conocimiento Científico</span></li>
            <li class="transition-all duration-200 hover:text-[#AB277A] hover:font-bold hover:translate-x-1"><span class="font-bold">Confidencialidad</span></li>
            <li class="transition-all duration-200 hover:text-[#AB277A] hover:font-bold hover:translate-x-1"><span class="font-bold">Ética Profesional</span></li>
          </ul>
        </div>
      </div>
    </div>
  </section> 

  <!-- ENTRADAS MÁS RECIENTES -->
  <section class="py-12 md:py-20 bg-white">
    <div class="container mx-auto px-4">
      <h2 class="text-3xl md:text-5xl font-extrabold mb-8 md:mb-12 text-center text-[#030D55]" style="font-family: 'Playfair Display', serif; font-size: 32px; line-height: 100%; letter-spacing: 0%; @media (min-width: 768px) { font-size: 48px; }">
        Nuestro blog
      </h2>
      
      <!-- Artículos del blog -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-8">
        @php
        $recent_args = array(
            'post_type' => 'post',
            'posts_per_page' => 3
        );
        $recent_posts = new WP_Query($recent_args);
        @endphp
        
        @if($recent_posts->have_posts())
          @while($recent_posts->have_posts()) 
            @php $recent_posts->the_post(); @endphp
            <a href="{{ get_the_permalink() }}" class="rounded-2xl overflow-hidden w-full h-[350px] md:h-[419px] mx-auto transition-transform duration-300 hover:transform hover:scale-105 hover:shadow-lg cursor-pointer max-w-[350px] md:max-w-[395px]" style="padding: 0;">
          <div class="relative h-full">
                @if(has_post_thumbnail())
                  <img src="{{ get_the_post_thumbnail_url() }}" alt="{{ get_the_title() }}" class="w-full h-full object-cover transition-transform duration-500 hover:scale-110">
                @else
                  <img src="{{ get_theme_file_uri('resources/images/blog-default.jpg') }}" alt="{{ get_the_title() }}" class="w-full h-full object-cover transition-transform duration-500 hover:scale-110">
                @endif
                <div class="absolute top-3 left-3 text-white py-2 md:py-2.5 px-3 md:px-4 rounded-full text-center text-xs md:text-sm max-w-[190px] md:max-w-[201px]" style="background: #030D55B8;">
                  {{ get_the_date() }}
            </div>
            <!-- Overlay gradient on the entire image -->
            <div class="absolute inset-0" style="background: linear-gradient(180deg, rgba(171, 39, 122, 0.4) 0%, rgba(3, 13, 85, 0.4) 61%);"></div>
            <!-- Content overlay at bottom -->
                <div class="absolute bottom-0 left-0 right-0 p-3 md:p-4" style="padding-top: 20px; padding-right: 12px; padding-bottom: 20px; padding-left: 12px; @media (min-width: 768px) { padding-top: 24px; padding-right: 16px; padding-bottom: 24px; padding-left: 16px; }">
                  <div class="w-full flex flex-col gap-2 md:gap-4">
                    <h3 class="text-xl md:text-2xl font-bold text-white" style="font-family: 'Playfair Display', serif; font-weight: 700; line-height: 100%; letter-spacing: 0%;">
                      {{ get_the_title() }}
                </h3>
                    <p class="text-sm md:text-base text-white" style="font-family: 'Roboto', sans-serif; font-weight: 400; line-height: 1.4; @media (min-width: 768px) { line-height: 1.7; }">
                      {{ get_the_excerpt() }}
                </p>
              </div>
            </div>
              </div>
            </a>
          @endwhile
          @php wp_reset_postdata(); @endphp
        @endif
      </div>
      
      <!-- Botón Ver más blogs -->
      <div class="text-center mt-8 md:mt-12">
        <a href="{{ home_url('/blog') }}" class="inline-block py-2 md:py-2.5 px-6 md:px-8 text-white rounded-full font-medium w-[220px] md:w-[277px] h-[40px] md:h-[47px] text-center transition-all duration-300 hover:shadow-lg hover:scale-105" style="background: linear-gradient(90deg, #FF3382 0%, rgba(90, 9, 137, 0.8) 100%); border-radius: 40px; padding: 8px 10px; @media (min-width: 768px) { padding: 10px; }">
          Ver más blogs
        </a>
      </div>
    </div>
  </section>
@endsection 