{{--
  Template Name: Tratamiento EMDR
--}}

@extends('layouts.app')

@section('content')
  <!-- Hero Section con fondo blanco y figura morada alrededor de la foto -->
  <section class="relative bg-white overflow-hidden">
    <!-- Contenido del hero -->
    <div class="container mx-auto px-4 py-20 lg:py-28 relative z-10 mt-15">
      <div class="flex flex-col lg:flex-row items-center">
        <!-- Columna de texto -->
        <div class="lg:w-1/2 mb-12 lg:mb-0" data-aos="fade-right" data-aos-duration="600">
          <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-[#030D55] mb-8 leading-none transition-all duration-500 hover:text-[#AB277A]" style="font-family: 'Playfair Display', serif; line-height: 1.1;">
          Reprocesando el <br>trauma: La <br>metodología EMDR <br>en acción
          </h1>
          
          <p class="text-4xl mt-14 text-[#AB277A] transition-all duration-300 hover:translate-x-2" style="font-family: 'Hugamour', sans-serif;">
          #El trauma se puede superar
          </p>
        </div>
        
        <!-- Imagen a la derecha con fondo morado -->
        <div class="lg:w-1/2 flex justify-center lg:justify-end relative" data-aos="fade-left" data-aos-duration="600">
          <div class="relative mt-0">
            <!-- Imagen con marco personalizado -->
            <div class="relative transition-all duration-700 hover:scale-105" style="width: 500px; height: 500px;">
              
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
                src="{{ get_theme_file_uri('resources/images/tratamiento1.png') }}" 
                alt="Psicoterapia EMDR" 
                class="max-w-full h-auto rounded-lg relative z-10 transition-transform duration-500 hover:scale-105"
                style="max-width: 580px; position: relative;"
              >
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Curvatura inferior más pronunciada -->
    <div class="absolute bottom-0 left-0 right-0 h-20">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" preserveAspectRatio="none" class="w-full h-full">
        <path fill="#F8F9FA" fill-opacity="1" d="M0,96L48,112C96,128,192,160,288,186.7C384,213,480,235,576,224C672,213,768,171,864,149.3C960,128,1056,128,1152,149.3C1248,171,1344,213,1392,234.7L1440,256L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
      </svg>
    </div>
  </section>

  <!-- Sección: ¿Qué ocurre durante el tratamiento EMDR? -->
  <section class="py-16 bg-[#F8F9FA]">
    <div class="container mx-auto px-4 max-w-6xl">
      <!-- Encabezado con decoración -->
      <div class="relative mb-12">
        <!-- Elementos decorativos laterales -->
        <div class="flex justify-center items-center">
          <div class="hidden md:block" data-aos="fade-right" data-aos-duration="600">
            <img src="{{ get_theme_file_uri('resources/images/deco1.png') }}" alt="Psicoterapia EMDR" class="w-full h-full object-cover transition-transform duration-700 hover:scale-110" style="max-width: 250px; max-height: 250px;">
          </div>
          
          <div class="text-center px-4" data-aos="fade-up" data-aos-duration="600">
            <h2 class="text-center text-4xl lg:text-5xl font-bold text-[#030D55] transition-all duration-500 hover:text-[#AB277A]" style="font-family: 'Playfair Display', serif; font-weight: 800;">
              ¿Qué ocurre durante el<br>tratamiento EMDR?
            </h2>
            
            <p class="mt-6 text-base text-center max-w-3xl mx-auto transition-all duration-300 hover:translate-y-[-2px]">
              En el proceso psicoterapéutico con EMDR, el psicólogo trabaja en conjunto con el paciente para identificar el o las problemáticas que lo aquejan, para luego definir un <br> plan psicoterapéutico que permita colocar foco en cada molestia.
            </p>
          </div>
          
          <div class="hidden md:block" data-aos="fade-left" data-aos-duration="600">
            <img src="{{ get_theme_file_uri('resources/images/deco2.png') }}" alt="Psicoterapia EMDR" class="w-full h-full object-cover transition-transform duration-700 hover:scale-110" style="max-width: 250px; max-height: 250px;">
          </div>
        </div>
      </div>
      
      <!-- Timeline con puntos -->
      <div class="mt-16 max-w-5xl mx-auto pl-4">
        <!-- Punto 1 -->
        <div class="flex opacity-0 animate-fade-in-up" style="animation-delay: 300ms; animation-duration: 1s; animation-fill-mode: forwards;" data-aos="fade-up" data-aos-duration="600" data-aos-delay="100">
          <div class="mr-6 flex flex-col items-center">
            <div class="w-6 h-6 rounded-full bg-[#AB277A] shadow-lg shadow-pink-500/50 animate-pulse"></div>
            <div class="w-0.5 h-full mt-1" style="border-left: 1px dashed #C29FDA; height: 80px;"></div>
          </div>
          <div class="max-w-5xl pb-8">
            <p class="text-base transform transition-all duration-500 hover:translate-y-[-2px]">El paciente describe el o los recuerdos dolorosos y/o traumáticos, muchas veces ya olvidados. Con ayuda del psicólogo se seleccionarán los aspectos que más angustian de dicho incidente.</p>
          </div>
        </div>
        
        <!-- Punto 2 -->
        <div class="flex opacity-0 animate-fade-in-up" style="animation-delay: 800ms; animation-duration: 1s; animation-fill-mode: forwards;" data-aos="fade-up" data-aos-duration="600" data-aos-delay="150">
          <div class="mr-6 flex flex-col items-center">
            <div class="w-6 h-6 rounded-full bg-[#AB277A] shadow-lg shadow-purple-500/50 animate-pulse" style="animation-delay: 500ms;"></div>
            <div class="w-0.5 h-full mt-1" style="border-left: 1px dashed #C29FDA; height: 115px;"></div>
          </div>
          <div class="max-w-5xl pb-8">
            <p class="text-base transform transition-all duration-500 hover:translate-y-[-2px]">Luego para desensibilizar y reprocesar el profesional realizará estimulaciones bilaterales, (visual, auditiva o kinestésica). Esta estimulación facilitará la conexión entre los dos hemisferios cerebrales, permitiendo el procesamiento de la información y la disminución de la carga emocional, para un estado más adaptativo.</p>
          </div>
        </div>
        
        <!-- Punto 3 -->
        <div class="flex opacity-0 animate-fade-in-up" style="animation-delay: 1300ms; animation-duration: 1s; animation-fill-mode: forwards;" data-aos="fade-up" data-aos-duration="600" data-aos-delay="200">
          <div class="mr-6 flex flex-col items-center">
            <div class="w-6 h-6 rounded-full bg-[#AB277A] shadow-lg shadow-indigo-500/50 animate-pulse" style="animation-delay: 1000ms;"></div>
            <div class="w-0.5 h-full mt-1" style="border-left: 1px dashed #C29FDA; height: 145px;"></div>
          </div>
          <div class="max-w-5xl pb-8">
            <p class="text-base transform transition-all duration-500 hover:translate-y-[-2px]">El psicólogo clínico entrenado en EMDR guía el proceso, tomando decisiones clínicas sobre la dirección que debe seguir la intervención. La meta es que el paciente procese la información sobre el incidente traumático, llevándolo a una "resolución adaptativa". En palabras de Francine Shapiro, esto significa: reducción de los síntomas cambio en creencias negativas y/o disruptivas a positivas y pertinentes y la posibilidad de funcionar mejor y adecuadamente en la vida cotidiana.</p>
          </div>
        </div>
        
        <!-- Punto 4 -->
        <div class="flex mb-12 opacity-0 animate-fade-in-up" style="animation-delay: 1800ms; animation-duration: 1s; animation-fill-mode: forwards;" data-aos="fade-up" data-aos-duration="600" data-aos-delay="250">
          <div class="mr-6 flex flex-col items-center">
            <div class="w-6 h-6 rounded-full bg-[#AB277A] shadow-lg shadow-blue-500/50 animate-pulse" style="animation-delay: 1500ms;"></div>
            <!-- Última línea no tiene extensión hacia abajo -->
          </div>
          <div class="max-w-5xl">
            <p class="text-base transform transition-all duration-500 hover:translate-y-[-2px]">El abordaje empleado en EMDR se sustenta en tres puntos:</p>
            <ol class="list-decimal pl-5 mt-3 space-y-1">
              <li class="opacity-0 animate-fade-in transition-all duration-300 hover:translate-x-1" style="animation-delay: 2000ms; animation-fill-mode: forwards;" data-aos="fade-up" data-aos-duration="400" data-aos-delay="300">Experiencias pasadas de la vida temprana.</li>
              <li class="opacity-0 animate-fade-in transition-all duration-300 hover:translate-x-1" style="animation-delay: 2200ms; animation-fill-mode: forwards;" data-aos="fade-up" data-aos-duration="400" data-aos-delay="350">Experiencias estresantes que detonan malestar en el presente.</li>
              <li class="opacity-0 animate-fade-in transition-all duration-300 hover:translate-x-1" style="animation-delay: 2400ms; animation-fill-mode: forwards;" data-aos="fade-up" data-aos-duration="400" data-aos-delay="400">Pensamientos y comportamientos deseados para el futuro (desarrollo de recursos para situaciones futuras).</li>
            </ol>
          </div>
        </div>
        
        <!-- Información final -->
        <div class="ml-12 mt-2 opacity-0 animate-fade-in" style="animation-delay: 2600ms; animation-fill-mode: forwards;" data-aos="fade-up" data-aos-duration="600" data-aos-delay="300">
          <p class="text-base transition-all duration-300 hover:translate-y-[-2px]">El tratamiento psicológico con EMDR puede ser desde 5 sesiones para un trauma simple y hasta más de un año para problemas complejos.</p>
        </div>
      </div>
      
      <style>
        @keyframes fade-in-up {
          0% {
            opacity: 0;
            transform: translateY(20px);
          }
          100% {
            opacity: 1;
            transform: translateY(0);
          }
        }
        
        @keyframes fade-in {
          0% {
            opacity: 0;
          }
          100% {
            opacity: 1;
          }
        }
        
        .animate-fade-in-up {
          animation-name: fade-in-up;
        }
        
        .animate-fade-in {
          animation-name: fade-in;
        }
      </style>
    </div>
  </section>
@endsection
