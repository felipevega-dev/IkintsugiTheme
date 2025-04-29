{{--
  Template Name: Quienes Somos
--}}

@extends('layouts.app')

@section('content')
  <!-- Hero Section con fondo blanco y figura morada alrededor de la foto -->
  <section class="relative bg-white overflow-hidden">
    <!-- Contenido del hero -->
    <div class="container mx-auto px-4 py-12 lg:py-28 relative z-10">
      <div class="flex flex-col lg:flex-row items-center">
        <!-- Columna de texto -->
        <div class="lg:w-1/2 mb-8 lg:mb-12" data-aos="fade-right" data-aos-duration="600">
          <span class="text-[#AB277A] text-sm md:text-base uppercase tracking-wider font-medium mb-2 block">Quienes somos</span>
          <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-[#030D55] mb-4 md:mb-8 leading-none transition-all duration-500 hover:text-[#AB277A] font-paytone">
            Donde tus<br>cicatrices se<br>vuelven fortaleza
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
                alt="Instituto Kintsugi" 
                class="relative z-10 w-full h-auto rounded-lg transition-transform duration-500 hover:scale-105"
              >
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- QUIENES SOMOS SECTION (antes en quienes-somos.blade.php) -->
  <section class="bg-white relative overflow-hidden py-8 md:py-16">
    <div class="container mx-auto px-4">
      <div class="flex flex-col md:flex-row items-center gap-6 md:gap-12 lg:gap-16">
        <div class="md:w-1/2 relative mb-6 md:mb-0" data-aos="fade-right" data-aos-duration="600">
          <div class="relative z-10 max-w-[450px] mx-auto md:mx-0">
            <div class="rounded-2xl overflow-hidden transition-all duration-500">
              <img
                src="{{ get_theme_file_uri('resources/images/quienesomos.png') }}"
                alt="Quiénes Somos"
                class="w-full h-auto object-cover transition-all duration-500 hover:scale-105"
              >
            </div>
          </div>
        </div>
        
        <div class="md:w-1/2" data-aos="fade-left" data-aos-duration="600">
          <div class="max-w-[520px] mx-auto md:mx-0">
            <h2 class="text-2xl md:text-4xl lg:text-4xl font-extrabold mb-4 md:mb-6 text-[#030D55] transition-all duration-500 hover:text-[#AB277A] font-paytone">
              Quiénes somos
            </h2>
            
            <div class="space-y-3 md:space-y-4">
              <p class="text-base md:text-lg text-[#181818] font-normal transition-all duration-300 hover:translate-y-[-2px]" style="font-family: 'Roboto', sans-serif; line-height: 1.6; @media (min-width: 768px) { line-height: 1.7; }">
                En Instituto Kintsugi, nos dedicamos apasionadamente a mejorar tu bienestar mental y emocional, ofreciéndote un camino hacia la curación y el autodescubrimiento, inspirado en la filosofía japonesa del Kintsugi.
              </p>
              
              <p class="text-base md:text-lg text-[#181818] font-normal transition-all duration-300 hover:translate-y-[-2px]" style="font-family: 'Roboto', sans-serif; line-height: 1.6; @media (min-width: 768px) { line-height: 1.7; }">
                Así como esta técnica transforma objetos rotos en arte más valioso al resaltar sus grietas con oro, creemos que tus experiencias difíciles pueden convertirse en tu mayor fortaleza con el apoyo adecuado.
              </p>
              
              <p class="text-base md:text-lg text-[#181818] transition-all duration-300 hover:translate-y-[-2px]" style="font-family: 'Roboto', sans-serif; line-height: 1.6; @media (min-width: 768px) { line-height: 1.7; }">
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
  <section class="py-8 md:py-20 bg-white relative overflow-hidden">
    <div class="container mx-auto px-4">
      <div class="text-center mb-6 md:mb-12" data-aos="fade-up" data-aos-duration="600">
        <h2 class="text-2xl md:text-4xl lg:text-4xl font-extrabold mb-4 md:mb-8 text-[#030D55] transition-all duration-500 hover:text-[#AB277A] font-paytone">
          Sobre nosotros
        </h2>
        
        <div class="mx-auto max-w-2xl mb-6 md:mb-14">
          <p class="text-base md:text-lg text-center mb-3 md:mb-6 text-[#181818] transition-all duration-300 hover:translate-y-[-2px]" style="font-family: 'Roboto', sans-serif; font-weight: 400; line-height: 1.6; @media (min-width: 768px) { line-height: 1.7; }">
            Somos un equipo especializado en salud mental y terapia EMDR, avalada científicamente, enfocándonos en ayudarte a superar adversidades como maltrato, bullying o situaciones de violencia, adaptando cada tratamiento a ti.
          </p>
          
          <p class="text-base md:text-lg text-center text-[#181818] transition-all duration-300 hover:translate-y-[-2px]" style="font-family: 'Roboto', sans-serif; font-weight: 400; line-height: 1.6; @media (min-width: 768px) { line-height: 1.7; }">
            Nuestro compromiso: brindarte un espacio seguro donde puedas recuperar tu equilibrio y construir una vida plena.
          </p>
        </div>
      </div>
      
      <!-- Equipo -->
      <div class="flex flex-wrap justify-center gap-6 md:gap-16 lg:gap-32 mx-auto">
        <!-- Terapeuta 1 -->
        <div class="w-auto mb-6 md:mb-0" data-aos="fade-up" data-aos-duration="600" data-aos-delay="100">
          <!-- Foto circular con botón -->
          <div class="flex flex-col items-center relative">
            <div class="w-[180px] h-[180px] md:w-[250px] md:h-[250px] rounded-full overflow-hidden transition-transform duration-500 hover:scale-105 shadow-lg hover:shadow-xl">
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
          <div class="text-left mt-6 md:mt-8">
            <h3 class="font-medium text-[#FF3382] text-lg md:text-xl mb-3 transition-transform duration-300 hover:translate-x-1">
              @Psicologo_JulioCesar
            </h3>
            
            <!-- Información sin puntos -->
            <ul class="list-none text-left text-sm md:text-base space-y-0.5 max-w-[300px]">
              <li class="transition-all duration-200 hover:text-[#AB277A] hover:font-medium hover:translate-x-1">Psicólogo Clínico</li>
              <li class="transition-all duration-200 hover:text-[#AB277A] hover:font-medium hover:translate-x-1">Máster en Psicoterapia EMDR</li>
              <li class="transition-all duration-200 hover:text-[#AB277A] hover:font-medium hover:translate-x-1">Hipnosis Clínica</li>
              <li class="transition-all duration-200 hover:text-[#AB277A] hover:font-medium hover:translate-x-1">Diplomado en Gerontología</li>
              <li class="transition-all duration-200 hover:text-[#AB277A] hover:font-medium hover:translate-x-1">Con experiencia en el trabajo con adolescentes, adultos, adultos mayores y parejas.</li>
              <li class="transition-all duration-200 hover:text-[#AB277A] hover:font-medium hover:translate-x-1">Cofundador del Instituto Kintsugi</li>
              <li class="transition-all duration-200 hover:text-[#AB277A] hover:font-medium hover:translate-x-1">Co-conductor y coordinador del podcast @EmisorKintsugi, donde participa en entrevistas y debates sobre temas de salud mental.</li>
              <li class="transition-all duration-200 hover:text-[#AB277A] hover:font-medium hover:translate-x-1">Miembro Asociación de EMDR Chile y España</li>
            </ul>
          </div>
        </div>
        
        <!-- Terapeuta 2 -->
        <div class="w-auto" data-aos="fade-up" data-aos-duration="600" data-aos-delay="200">
          <!-- Foto circular con botón -->
          <div class="flex flex-col items-center relative">
            <div class="w-[180px] h-[205px] md:w-[250px] md:h-[275px] rounded-full overflow-hidden transition-transform duration-500 hover:scale-105 shadow-lg hover:shadow-xl">
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
          <div class="text-left mt-6 md:mt-8">
            <h3 class="font-medium text-[#FF3382] text-lg md:text-xl mb-3 transition-transform duration-300 hover:translate-x-1">
              @Psicologa_Shenhui
            </h3>
            
            <!-- Información sin puntos -->
            <ul class="list-none text-left text-sm md:text-base space-y-0.5 max-w-[300px]">
              <li class="transition-all duration-200 hover:text-[#AB277A] hover:font-medium hover:translate-x-1">Psicóloga Clínica EMDR</li>
              <li class="transition-all duration-200 hover:text-[#AB277A] hover:font-medium hover:translate-x-1">Máster en Psicoterapia EMDR</li>
              <li class="transition-all duration-200 hover:text-[#AB277A] hover:font-medium hover:translate-x-1">Happiness Trainer</li>
              <li class="transition-all duration-200 hover:text-[#AB277A] hover:font-medium hover:translate-x-1">Hipnosis Clínica</li>
              <li class="transition-all duration-200 hover:text-[#AB277A] hover:font-medium hover:translate-x-1">Emotional Freedom Techniques (EFT)</li>
              <li class="transition-all duration-200 hover:text-[#AB277A] hover:font-medium hover:translate-x-1">PAR/IJVE para trauma, apego y disociación</li>
              <li class="transition-all duration-200 hover:text-[#AB277A] hover:font-medium hover:translate-x-1">Instructora de QIGONG</li>
              <li class="transition-all duration-200 hover:text-[#AB277A] hover:font-medium hover:translate-x-1">Co-fundadora del Instituto Kintsugi</li>
              <li class="transition-all duration-200 hover:text-[#AB277A] hover:font-medium hover:translate-x-1">Co-conductora de @EmisorKintsugi, podcast de divulgación científica de salud mental.</li>
              <li class="transition-all duration-200 hover:text-[#AB277A] hover:font-medium hover:translate-x-1">Psicoterapia para adultos, adulto mayor y parejas</li>
              <li class="transition-all duration-200 hover:text-[#AB277A] hover:font-medium hover:translate-x-1">Miembro Asociación de EMDR Chile y España</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- MISIÓN Y VALORES SECTION (antes en mision-valores.blade.php) -->
  <section class="py-12 md:py-26 relative overflow-hidden">
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
        <div class="bg-white/80 rounded-[16px] p-[20px] md:p-[24px] shadow-lg relative z-10 transition-all duration-500 hover:bg-white hover:shadow-xl hover:-translate-y-2 w-full max-w-[350px] md:max-w-[395px] mb-12 md:mb-0" style="min-height: 300px; @media (min-width: 768px) { min-height: 376px; }" data-aos="fade-right" data-aos-duration="600">
          <h3 class="text-xl md:text-2xl font-bold mb-3 md:mb-4 text-[#030D55] text-center transition-all duration-300 hover:text-[#AB277A]">
            Nuestra misión
          </h3>
          <p class="text-base md:text-lg text-[#181818] transition-all duration-300 hover:translate-y-[-2px]" style="font-family: 'Roboto', sans-serif; font-weight: 400; line-height: 1.6; @media (min-width: 768px) { line-height: 1.7; }">
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
        <div class="relative flex items-center justify-center mx-4 md:mx-6 z-20 mb-12 md:mb-0" data-aos="fade-up" data-aos-duration="800">
          <!-- Logo blanco -->
          <div class="relative z-10 transition-all duration-500 hover:scale-110">
            <img src="{{ get_theme_file_uri('resources/images/logoblanco.png') }}" alt="Ikintsugi Logo" style="width: 180px; height: 45px; @media (min-width: 768px) { width: 226px; height: 56px; }">
          </div>
        </div>
        
        <!-- Valores -->
        <div class="bg-white/80 rounded-[16px] p-[20px] md:p-[24px] shadow-lg relative z-10 transition-all duration-500 hover:bg-white hover:shadow-xl hover:-translate-y-2 w-full max-w-[350px] md:max-w-[395px]" style="min-height: 300px; @media (min-width: 768px) { min-height: 376px; }" data-aos="fade-left" data-aos-duration="600">
          <!-- Línea conectora hacia el logo con puntitos (visible solo en desktop) -->
          <div class="hidden md:flex absolute left-[-47px] top-1/2 items-center z-30">
            <div class="flex items-center space-x-1 flex-row-reverse">
              <div class="w-2 h-2 rounded-full bg-[#F5B3F3] animate-ping" style="animation-duration: 2s;"></div>
              <div class="w-2 h-2 rounded-full bg-[#F5B3F3] animate-ping" style="animation-duration: 2.5s;"></div>
            <div class="w-2 h-2 rounded-full bg-[#F5B3F3] animate-ping" style="animation-duration: 3s;"></div>
            </div>
          </div>
          
          <h3 class="text-[20px] md:text-[24px] font-bold mb-3 md:mb-4 text-[#030D55] text-center transition-all duration-300 hover:text-[#AB277A]">
            Nuestros valores
          </h3>
          <p class="mb-2 md:mb-4 text-base md:text-lg text-[#181818] transition-all duration-300 hover:translate-y-[-2px]" style="font-family: 'Roboto', sans-serif; font-weight: 400; line-height: 1.6; @media (min-width: 768px) { line-height: 1.7; }">
            Como miembros de la Iniciativa Kintsugi creemos en la reparación del ser humano inspirada en los siguientes valores:
          </p>
          <ul class="space-y-1 md:space-y-2 text-base md:text-lg text-[#181818]" style="font-family: 'Roboto', sans-serif; font-weight: 400; line-height: 1.6; @media (min-width: 768px) { line-height: 1.7; }">
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
      <h2 class="text-2xl md:text-4xl lg:text-4xl mb-8 md:mb-12 text-center text-[#030D55] transition-all duration-500 hover:text-[#AB277A] font-paytone">
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
          @php $delay = 100; @endphp
          @while($recent_posts->have_posts()) 
            @php 
            $recent_posts->the_post(); 
            @endphp
            <a href="{{ get_the_permalink() }}" class="rounded-2xl overflow-hidden w-full h-[350px] md:h-[419px] mx-auto transition-all duration-500 hover:transform hover:scale-105 hover:shadow-xl cursor-pointer max-w-[350px] md:max-w-[395px]" style="padding: 0;" data-aos="fade-up" data-aos-duration="600" data-aos-delay="{{ $delay }}">
              @php $delay += 100; @endphp
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
      <div class="text-center mt-8 md:mt-12" data-aos="fade-up" data-aos-duration="600" data-aos-delay="400">
        <a href="{{ home_url('/blog') }}" class="inline-flex items-center justify-center py-2 md:py-2.5 px-6 md:px-8 text-white rounded-full font-medium w-[220px] md:w-[277px] h-[40px] md:h-[47px] transition-all duration-300 hover:shadow-lg hover:scale-105" style="background: linear-gradient(90deg, #FF3382 0%, rgba(90, 9, 137, 0.8) 100%); border-radius: 40px;">
          Ver más blogs
        </a>
      </div>
    </div>
  </section>
@endsection 