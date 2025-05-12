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
          <span class="text-[#AB277A] text-sm md:text-base uppercase tracking-wider font-medium mb-2 block">Quiénes somos</span>
          <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-[#030D55] mb-4 md:mb-8 leading-none transition-all duration-500 hover:text-[#AB277A] font-paytone">
            Donde tus<br>cicatrices se<br>vuelven fortaleza
          </h1>
          
          <p class="text-2xl md:text-4xl text-[#AB277A] transition-all duration-300 hover:translate-x-2" style="font-family: 'Hugamour', sans-serif;">
            #Mereces una vida mejor
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
  </section>

  <!-- QUIENES SOMOS SECTION (antes en quienes-somos.blade.php) -->
  <section class="bg-white relative overflow-hidden">
    <div class="container mx-auto px-4">
      <!-- Título y primeros dos párrafos centrados arriba -->
      <div class="max-w-[1300px] mx-auto mb-6 md:mb-8" data-aos="fade-up" data-aos-duration="600">
        <h2 class="text-2xl md:text-4xl lg:text-4xl font-extrabold mb-4 md:mb-6 text-[#030D55] transition-all duration-500 hover:text-[#AB277A] font-paytone text-center">
          Quiénes somos
        </h2>
        
        <div class="space-y-3 md:space-y-4">
          <p class="text-base md:text-lg text-[#181818] font-normal transition-all duration-300 hover:translate-y-[-2px]" style="font-family: 'Roboto', sans-serif; line-height: 1.6; @media (min-width: 768px) { line-height: 1.7; }">
            El Instituto Kintsugi es una organización dedicada a la promoción y prevención de la salud mental, a través de la psicoeducación y el tratamiento del trauma emocional. 
          </p>
          
          <p class="text-base md:text-lg text-[#181818] font-normal transition-all duration-300 hover:translate-y-[-2px]" style="font-family: 'Roboto', sans-serif; line-height: 1.6; @media (min-width: 768px) { line-height: 1.7; }">
            Nuestro nombre se inspira en el arte japonés de reparar las piezas rotas con oro, simbolizando la belleza y la fortaleza que se encuentra en cada cicatriz. Somos un equipo de profesionales especializados en el tratamiento del trauma y en la terapia EMDR, un enfoque basado en neurociencia que permite procesar los recuerdos traumáticos y reducir sus efectos negativos, ayudándote a superar la adversidad y a desarrollar una vida plena.
          </p>
        </div>
      </div>
      
      <!-- Contenido principal: imagen a la izquierda y texto a la derecha -->
      <div class="flex flex-col md:flex-row items-center xl:items-start lg:justify-center gap-6 md:gap-8 xl:gap-16">
        <div class="md:w-1/2 xl:w-auto relative mb-6 md:mb-0 flex justify-center md:justify-start" data-aos="fade-right" data-aos-duration="600">
          <div class="relative z-10 max-w-[600px] w-full md:w-auto">
            <div class="rounded-2xl overflow-hidden transition-all duration-500 md:max-w-[600px] xl:max-w-[550px]">
              <img
                src="{{ get_theme_file_uri('resources/images/julioyshen3.png') }}"
                alt="Quiénes Somos"
                class="w-full h-auto md:min-h-[450px] xl:min-h-[520px] object-cover object-center transition-all duration-500 hover:scale-105"
              >
            </div>
          </div>
        </div>
        
        <div class="md:w-1/2 xl:w-auto max-w-full xl:max-w-[650px]" data-aos="fade-left" data-aos-duration="600">
          <div class="mx-auto md:mx-0">            
            <div class="space-y-3 md:space-y-4">              
              <p class="text-base md:text-lg text-[#181818] font-normal transition-all duration-300 hover:translate-y-[-2px]" style="font-family: 'Roboto', sans-serif; line-height: 1.6; @media (min-width: 768px) { line-height: 1.7; }">
                Acompañamos a adolescentes, adultos, parejas y adultos mayores que enfrentan dificultades emocionales derivadas de experiencias traumáticas. Si has vivido maltrato laboral, bullying o has sido víctima de agresiones como un portonazo o encerrona, estamos aquí para ayudarte.
              </p>
              
              <p class="text-base md:text-lg text-[#181818] font-normal transition-all duration-300 hover:translate-y-[-2px]" style="font-family: 'Roboto', sans-serif; line-height: 1.6; @media (min-width: 768px) { line-height: 1.7; }">
                Nuestro compromiso es brindarte un espacio seguro y empático en el que puedas recuperar tu equilibrio emocional y retomar una vida plena. Combinamos un profundo entendimiento del impacto del trauma en la mente y el cuerpo con herramientas terapéuticas de eficacia comprobada.
              </p>
              
              <p class="text-base md:text-lg text-[#181818] font-normal transition-all duration-300 hover:translate-y-[-2px]" style="font-family: 'Roboto', sans-serif; line-height: 1.6; @media (min-width: 768px) { line-height: 1.7; }">
                Nuestro enfoque EMDR es de tercera generación, basado en evidencia científica y avalado por las más importantes organizaciones de salud mundial, lo que nos permite adaptar estrategias de intervención temprana en momentos de crisis y ajustar cada tratamiento a tus necesidades individuales.
              </p>
              
              <p class="text-base md:text-lg text-[#181818] font-normal transition-all duration-300 hover:translate-y-[-2px]" style="font-family: 'Roboto', sans-serif; line-height: 1.6; @media (min-width: 768px) { line-height: 1.7; }">
                Trabajemos juntos en el proceso de transformar esos recuerdos perturbadores en caminos hacia la resiliencia y el bienestar. Juntos recuperaremos el control de tus emociones y avanzaremos hacia una vida renovada.
              </p>
              
              <p class="text-2xl text-center md:text-4xl md:text-left text-[#AB277A] font-medium md:font-semibold my-6 md:my-8 transition-all duration-300 hover:translate-x-2" style="font-family: 'Hugamour', sans-serif;">
                Mereces una vida mejor.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> 

  <!-- Video de presentación -->
  <section class="bg-white relative overflow-hidden py-4 md:py-12">
    <div class="container mx-auto px-4">
      <div class="mx-auto aspect-video md:max-w-[850px]" style="max-width: 90%; border-radius: 16px; overflow: hidden; box-shadow: 0px 4px 16px 0px rgba(171, 39, 122, 0.5);" data-aos="fade-up" data-aos-duration="800">
        <div class="relative w-full h-0 pb-[56.25%]">
          <!-- Borde con gradiente -->
          <div class="absolute inset-0 p-1 rounded-2xl" style="background: linear-gradient(90deg, #FF3382 0%, rgba(90, 9, 137, 0.8) 100%);">
            <!-- Video -->
            <iframe class="absolute top-0 left-0 w-full h-full rounded-xl" src="https://www.youtube.com/embed/MWUOwbLgzuU" title="Presentación Instituto Kintsugi" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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
        
        <div class="mx-auto max-w-5xl mb-6 md:mb-14">
          <p class="text-base md:text-lg text-center mb-3 md:mb-6 text-[#181818] transition-all duration-300 hover:translate-y-[-2px]" style="font-family: 'Roboto', sans-serif; font-weight: 400; line-height: 1.6; @media (min-width: 768px) { line-height: 1.7; }">
          Somos un equipo de psicólogos especializados en salud mental y Psicoterapia EMDR, de 3era generación, basada en evidencia científica. Nos enfocamos en ayudarte a superar las adversidades como maltrato, bullying o situaciones de violencia y más, adaptando cada tratamiento a tu persona.
          </p>
          
          <p class="text-base md:text-lg text-center text-[#181818] transition-all duration-300 hover:translate-y-[-2px]" style="font-family: 'Roboto', sans-serif; font-weight: 400; line-height: 1.6; @media (min-width: 768px) { line-height: 1.7; }">
          <b>Nuestro compromiso:</b> brindarte un espacio seguro donde puedas recuperar tu equilibrio y construir una vida plena.
          </p>
        </div>
      </div>
      
      <!-- Equipo -->
      <div class="flex flex-wrap justify-center gap-6 md:gap-16 lg:gap-32 mx-auto">
        <!-- Terapeuta 1 -->
        <div class="w-auto mb-6 md:mb-0" data-aos="fade-up" data-aos-duration="600" data-aos-delay="100">
          <!-- Foto circular con botón -->
          <div class="flex flex-col items-center relative">
            <div class="relative overflow-hidden transition-transform duration-500 hover:scale-105" style="width: min(280px, 90vw); height: min(280px, 90vw);">
              <div class="w-full h-full flex items-center justify-center">
                <img src="{{ get_theme_file_uri('resources/images/julio.png') }}" alt="Julio César" class="w-auto h-auto max-w-full max-h-full">
              </div>
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
            <h3 class="font-medium text-[#FF3382] text-lg md:text-xl mb-3 transition-transform duration-300 hover:translate-x-1 flex items-center">
              <a href="https://www.instagram.com/psicologo_juliocesar/" target="_blank" rel="noopener noreferrer" class="hover:underline flex items-center">
                @Psicologo_JulioCesar 
                <svg class="w-5 h-5 ml-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                  <path fill="currentColor" d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/>
                </svg>
              </a>
            </h3>
            
            <!-- Información sin puntos -->
            <ul class="list-none text-left text-sm md:text-base space-y-2 max-w-[300px]">
              <li class="transition-all duration-200 hover:text-[#AB277A] hover:font-medium hover:translate-x-1 flex items-start">
                <span class="inline-block w-2 h-2 rounded-full bg-[#030D55] mr-2 mt-[0.45em] flex-shrink-0 transition-colors duration-200"></span>
                <span>Psicólogo Clínico</span>
              </li>
              <li class="transition-all duration-200 hover:text-[#AB277A] hover:font-medium hover:translate-x-1 flex items-start">
                <span class="inline-block w-2 h-2 rounded-full bg-[#030D55] mr-2 mt-[0.45em] flex-shrink-0 transition-colors duration-200"></span>
                <span>Máster en Psicoterapia EMDR</span>
              </li>
              <li class="transition-all duration-200 hover:text-[#AB277A] hover:font-medium hover:translate-x-1 flex items-start">
                <span class="inline-block w-2 h-2 rounded-full bg-[#030D55] mr-2 mt-[0.45em] flex-shrink-0 transition-colors duration-200"></span>
                <span>Hipnosis Clínica</span>
              </li>
              <li class="transition-all duration-200 hover:text-[#AB277A] hover:font-medium hover:translate-x-1 flex items-start">
                <span class="inline-block w-2 h-2 rounded-full bg-[#030D55] mr-2 mt-[0.45em] flex-shrink-0 transition-colors duration-200"></span>
                <span>Diplomado en Gerontología</span>
              </li>
              <li class="transition-all duration-200 hover:text-[#AB277A] hover:font-medium hover:translate-x-1 flex items-start">
                <span class="inline-block w-2 h-2 rounded-full bg-[#030D55] mr-2 mt-[0.45em] flex-shrink-0 transition-colors duration-200"></span>
                <span>Con experiencia en el trabajo con adolescentes, adultos, adultos mayores y parejas.</span>
              </li>
              <li class="transition-all duration-200 hover:text-[#AB277A] hover:font-medium hover:translate-x-1 flex items-start">
                <span class="inline-block w-2 h-2 rounded-full bg-[#030D55] mr-2 mt-[0.45em] flex-shrink-0 transition-colors duration-200"></span>
                <span>Cofundador del Instituto Kintsugi</span>
              </li>
              <li class="transition-all duration-200 hover:text-[#AB277A] hover:font-medium hover:translate-x-1 flex items-start">
                <span class="inline-block w-2 h-2 rounded-full bg-[#030D55] mr-2 mt-[0.45em] flex-shrink-0 transition-colors duration-200"></span>
                <span>Co-conductor y coordinador del podcast @EmisorKintsugi, donde participa en entrevistas y debates sobre temas de salud mental.</span>
              </li>
              <li class="transition-all duration-200 hover:text-[#AB277A] hover:font-medium hover:translate-x-1 flex items-start">
                <span class="inline-block w-2 h-2 rounded-full bg-[#030D55] mr-2 mt-[0.45em] flex-shrink-0 transition-colors duration-200"></span>
                <span>Miembro Asociación de EMDR Chile</span>
              </li>
              <li class="transition-all duration-200 hover:text-[#AB277A] hover:font-medium hover:translate-x-1 flex items-start">
                <span class="inline-block w-2 h-2 rounded-full bg-[#030D55] mr-2 mt-[0.45em] flex-shrink-0 transition-colors duration-200"></span>
                <span>Miembro Asociación de EMDR España</span>
              </li>
              <li class="transition-all duration-200 hover:text-[#AB277A] hover:font-medium hover:translate-x-1 flex items-start mt-4">
                <div class="flex flex-col items-start">
                  <span class="font-bold text-sm mb-1">Núm. de Registro: 572705</span>
                  <span class="flex items-center">
                    <span class="mr-2">Superintendencia de Salud</span>
                    <img src="{{ get_theme_file_uri('resources/images/superintendencia.png') }}" alt="Superintendencia de Salud" class="h-5 w-auto">
                  </span>
                </div>
              </li>
            </ul>
          </div>
        </div>
        
        <!-- Terapeuta 2 -->
        <div class="w-auto" data-aos="fade-up" data-aos-duration="600" data-aos-delay="200">
          <!-- Foto circular con botón -->
          <div class="flex flex-col items-center relative">
            <div class="relative overflow-hidden transition-transform duration-500 hover:scale-105" style="width: min(280px, 90vw); height: min(280px, 90vw);">
              <div class="w-full h-full flex items-center justify-center">
                <img src="{{ get_theme_file_uri('resources/images/shenhui.png') }}" alt="Shenhui" class="w-auto h-auto max-w-full max-h-full">
              </div>
            </div>
            <div class="absolute -bottom-3 left-1/2 transform -translate-x-1/2">
              <div class="p-[2px] rounded-2xl bg-gradient-to-b from-[rgba(171,39,122,0.48)] to-[rgba(3,13,85,0.48)]">
                <a href="{{ site_url('/shenhui') }}" class="inline-block text-center text-[13px] md:text-[14px] font-medium py-1 px-6 md:px-8 bg-white text-[#030D55] rounded-2xl transition-all duration-300 hover:bg-gradient-to-b from-[rgba(171,39,122,0.48)] to-[rgba(3,13,85,0.48)] hover:text-white">
                  Ver perfil
                </a>
              </div>
            </div>
          </div>
          
          <!-- Nombre y credenciales -->
          <div class="text-left mt-6 md:mt-8">
            <h3 class="font-medium text-[#FF3382] text-lg md:text-xl mb-3 transition-transform duration-300 hover:translate-x-1 flex items-center">
              <a href="https://www.instagram.com/psicologa_shenhui/" target="_blank" rel="noopener noreferrer" class="hover:underline flex items-center">
                @Psicologa_Shenhui
                <svg class="w-5 h-5 ml-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                  <path fill="currentColor" d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/>
                </svg>
              </a>
            </h3>
            
            <!-- Información sin puntos -->
            <ul class="list-none text-left text-sm md:text-base space-y-2 max-w-[300px]">
              <li class="transition-all duration-200 hover:text-[#AB277A] hover:font-medium hover:translate-x-1 flex items-start">
                <span class="inline-block w-2 h-2 rounded-full bg-[#030D55] mr-2 mt-[0.45em] flex-shrink-0 transition-colors duration-200"></span>
                <span>Psicóloga Clínica EMDR</span>
              </li>
              <li class="transition-all duration-200 hover:text-[#AB277A] hover:font-medium hover:translate-x-1 flex items-start">
                <span class="inline-block w-2 h-2 rounded-full bg-[#030D55] mr-2 mt-[0.45em] flex-shrink-0 transition-colors duration-200"></span>
                <span>Máster en Psicoterapia EMDR</span>
              </li>
              <li class="transition-all duration-200 hover:text-[#AB277A] hover:font-medium hover:translate-x-1 flex items-start">
                <span class="inline-block w-2 h-2 rounded-full bg-[#030D55] mr-2 mt-[0.45em] flex-shrink-0 transition-colors duration-200"></span>
                <span>Happiness Trainer</span>
              </li>
              <li class="transition-all duration-200 hover:text-[#AB277A] hover:font-medium hover:translate-x-1 flex items-start">
                <span class="inline-block w-2 h-2 rounded-full bg-[#030D55] mr-2 mt-[0.45em] flex-shrink-0 transition-colors duration-200"></span>
                <span>Hipnosis Clínica</span>
              </li>
              <li class="transition-all duration-200 hover:text-[#AB277A] hover:font-medium hover:translate-x-1 flex items-start">
                <span class="inline-block w-2 h-2 rounded-full bg-[#030D55] mr-2 mt-[0.45em] flex-shrink-0 transition-colors duration-200"></span>
                <span>Emotional Freedom Techniques (EFT)</span>
              </li>
              <li class="transition-all duration-200 hover:text-[#AB277A] hover:font-medium hover:translate-x-1 flex items-start">
                <span class="inline-block w-2 h-2 rounded-full bg-[#030D55] mr-2 mt-[0.45em] flex-shrink-0 transition-colors duration-200"></span>
                <span>PARCUVE para trauma, apego y disociación</span>
              </li>
              <li class="transition-all duration-200 hover:text-[#AB277A] hover:font-medium hover:translate-x-1 flex items-start">
                <span class="inline-block w-2 h-2 rounded-full bg-[#030D55] mr-2 mt-[0.45em] flex-shrink-0 transition-colors duration-200"></span>
                <span>Instructora de QiGONG</span>
              </li>
              <li class="transition-all duration-200 hover:text-[#AB277A] hover:font-medium hover:translate-x-1 flex items-start">
                <span class="inline-block w-2 h-2 rounded-full bg-[#030D55] mr-2 mt-[0.45em] flex-shrink-0 transition-colors duration-200"></span>
                <span>Co-fundadora del Instituto Kintsugi</span>
              </li>
              <li class="transition-all duration-200 hover:text-[#AB277A] hover:font-medium hover:translate-x-1 flex items-start">
                <span class="inline-block w-2 h-2 rounded-full bg-[#030D55] mr-2 mt-[0.45em] flex-shrink-0 transition-colors duration-200"></span>
                <span>Co-conductora de @EmisorKintsugi, podcast de divulgación científica donde comparte consejos, información y reflexiones sobre salud mental, neurociencia, traumas y felicidad.</span>
              </li>
              <li class="transition-all duration-200 hover:text-[#AB277A] hover:font-medium hover:translate-x-1 flex items-start">
                <span class="inline-block w-2 h-2 rounded-full bg-[#030D55] mr-2 mt-[0.45em] flex-shrink-0 transition-colors duration-200"></span>
                <span>Psicoterapia para adultos, adulto mayor y parejas</span>
              </li>
              <li class="transition-all duration-200 hover:text-[#AB277A] hover:font-medium hover:translate-x-1 flex items-start">
                <span class="inline-block w-2 h-2 rounded-full bg-[#030D55] mr-2 mt-[0.45em] flex-shrink-0 transition-colors duration-200"></span>
                <span>Miembro Asociación de EMDR Chile</span>
              </li>
              <li class="transition-all duration-200 hover:text-[#AB277A] hover:font-medium hover:translate-x-1 flex items-start">
                <span class="inline-block w-2 h-2 rounded-full bg-[#030D55] mr-2 mt-[0.45em] flex-shrink-0 transition-colors duration-200"></span>
                <span>Miembro Asociación de EMDR España</span>
              </li>
              <li class="transition-all duration-200 hover:text-[#AB277A] hover:font-medium hover:translate-x-1 flex items-start mt-4">
                <div class="flex flex-col items-start">
                  <span class="font-bold text-sm mb-1">Núm. de Registro: 529758</span>
                  <span class="flex items-center">
                    <span class="mr-2">Superintendencia de Salud</span>
                    <img src="{{ get_theme_file_uri('resources/images/superintendencia.png') }}" alt="Superintendencia de Salud" class="h-5 w-auto">
                  </span>
                </div>
              </li>
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
    
    <!-- Título de la sección con efecto decorativo - ajustado para móvil -->
    <div class="container mx-auto px-4 text-center relative z-20 mb-6 md:mb-12 pt-10 md:pt-0">
      <h2 class="text-3xl md:text-5xl font-bold text-white inline-block relative font-paytone" data-aos="fade-up" data-aos-duration="800">
        <span class="relative z-10 drop-shadow-lg">Nuestra Misión y Valores</span>
        <!-- Efecto decorativo debajo del texto -->
        <div class="absolute bottom-0 left-0 right-0 h-3 bg-[#F5B3F3] opacity-60 -skew-x-12 transform translate-y-2 z-0"></div>
      </h2>
      <div class="flex justify-center mt-2 md:mt-4">
        <div class="h-1 w-24 md:w-32 bg-white opacity-70 rounded"></div>
      </div>
    </div>
    
    <!-- Contenido -->
    <div class="container mx-auto px-4 relative z-20 mt-8 md:mt-16">
      <div class="flex flex-col md:flex-row items-center justify-center gap-10 md:gap-8 relative">
        <!-- Misión -->
        <div class="bg-white/90 backdrop-blur-sm rounded-[16px] p-[24px] md:p-[30px] shadow-lg relative z-10 transition-all duration-500 hover:bg-white hover:shadow-xl hover:-translate-y-2 w-full max-w-[350px] md:max-w-[395px] mb-12 md:mb-0" style="min-height: 300px; @media (min-width: 768px) { min-height: 376px; }" data-aos="fade-right" data-aos-duration="600">
          <h3 class="text-xl md:text-2xl font-bold mb-4 md:mb-5 text-[#030D55] text-center transition-all duration-300 hover:text-[#AB277A]">
            Nuestra misión
            <div class="h-1 w-12 bg-[#AB277A] mx-auto mt-2"></div>
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
          <!-- Logo con resplandor -->
          <div class="relative z-10 transition-all duration-500 hover:scale-110">
            <div class="absolute inset-0 rounded-full bg-white opacity-20 blur-md -z-10"></div>
            <img src="{{ get_theme_file_uri('resources/images/logoblanco.png') }}" alt="Ikintsugi Logo" style="width: 180px; height: 45px; @media (min-width: 768px) { width: 226px; height: 56px; }">
          </div>
        </div>
        
        <!-- Valores -->
        <div class="bg-white/90 backdrop-blur-sm rounded-[16px] p-[24px] md:p-[30px] shadow-lg relative z-10 transition-all duration-500 hover:bg-white hover:shadow-xl hover:-translate-y-2 w-full max-w-[350px] md:max-w-[395px]" style="min-height: 300px; @media (min-width: 768px) { min-height: 376px; }" data-aos="fade-left" data-aos-duration="600">
          <!-- Línea conectora hacia el logo con puntitos (visible solo en desktop) -->
          <div class="hidden md:flex absolute left-[-47px] top-1/2 items-center z-30">
            <div class="flex items-center space-x-1 flex-row-reverse">
              <div class="w-2 h-2 rounded-full bg-[#F5B3F3] animate-ping" style="animation-duration: 2s;"></div>
              <div class="w-2 h-2 rounded-full bg-[#F5B3F3] animate-ping" style="animation-duration: 2.5s;"></div>
            <div class="w-2 h-2 rounded-full bg-[#F5B3F3] animate-ping" style="animation-duration: 3s;"></div>
            </div>
          </div>
          
          <h3 class="text-[20px] md:text-[24px] font-bold mb-4 md:mb-5 text-[#030D55] text-center transition-all duration-300 hover:text-[#AB277A]">
            Nuestros valores
            <div class="h-1 w-12 bg-[#AB277A] mx-auto mt-2"></div>
          </h3>
          <p class="mb-3 md:mb-5 text-base md:text-lg text-[#181818] transition-all duration-300 hover:translate-y-[-2px]" style="font-family: 'Roboto', sans-serif; font-weight: 400; line-height: 1.6; @media (min-width: 768px) { line-height: 1.7; }">
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