{{--
  Template Name: Tratamiento EMDR
--}}

@extends('layouts.app')

@section('content')
  <!-- HERO SECTION (antes en hero.blade.php) -->
  <section class="relative bg-white py-15 overflow-hidden">
    <div class="container mx-auto px-4 relative z-10 mb-10">
      <div class="flex flex-col md:flex-row items-center justify-center gap-16 mt-15">
        <!-- Texto del lado izquierdo con más margen a la derecha -->
        <div class="md:w-2/5 mb-10 md:mb-0 md:ml-auto mt-10 lg:w-1/2">
          <h1 class="text-5xl md:text-5xl lg:text-7xl font-bold mb-4 text-[#030D55] transition-all duration-500 hover:text-[#AB277A]" style="font-family: 'Playfair Display', serif; line-height: 1.1;">
          Reprocesando el <br>trauma: La <br>metodología EMDR <br>en acción
          </h1>
          
          <p class="text-4xl mt-14 text-[#AB277A] transition-all duration-300 hover:translate-x-2" style="font-family: 'Hugamour', sans-serif;">
          #El trauma se puede superar
          </p>
        </div>
        
        <!-- Imagen del lado derecho con más margen a la derecha -->
        <div class="md:w-2/5 md:ml-0">
          <div class="relative mt-15">
            <!-- Imagen con marco personalizado -->
            <div class="relative transition-all duration-700 hover:scale-105" style="width: 500px; height: 500px;">
              
              <!-- Línea curva violeta exterior -->
              <svg viewBox="0 0 450 450" class="absolute top-0 left-0 w-full h-full animate-pulse" style="transform: scale(1.08); transform-origin: center; animation-duration: 8s;">
                <path d="M225,10 
                        C290,10 345,35 380,70
                        C415,105 440,160 440,225
                        C440,290 415,345 380,380
                        C345,415 290,440 225,440
                        C160,440 105,415 70,380
                        C35,345 10,290 10,225
                        C10,160 35,105 70,70
                        C105,35 160,10 225,10 Z" 
                     fill="none" stroke="#8961C4" stroke-width="2"></path>
              </svg>
              
              <!-- Línea curva rosa -->
              <svg viewBox="0 0 450 450" class="absolute top-0 left-0 w-full h-full animate-pulse" style="transform: scale(1.05); transform-origin: center; animation-duration: 7s;">
                <path d="M225,30 
                        C280,30 325,50 355,80
                        C385,110 420,155 420,225
                        C420,295 385,340 355,370
                        C325,400 280,420 225,420
                        C170,420 125,400 95,370
                        C65,340 30,295 30,225
                        C30,155 65,110 95,80
                        C125,50 170,30 225,30 Z" 
                     fill="none" stroke="#F5B3F3" stroke-width="2"></path>
              </svg>
              
              <!-- Línea curva azul marino -->
              <svg viewBox="0 0 450 450" class="absolute top-0 left-0 w-full h-full animate-pulse" style="transform: scale(1.02); transform-origin: center; animation-duration: 6s;">
                <path d="M225,50 
                        C270,50 310,65 335,90
                        C360,115 400,155 400,225
                        C400,295 360,335 335,360
                        C310,385 270,400 225,400
                        C180,400 140,385 115,360
                        C90,335 50,295 50,225
                        C50,155 90,115 115,90
                        C140,65 180,50 225,50 Z" 
                     fill="none" stroke="#030D55" stroke-width="1.5"></path>
              </svg>
              
              <!-- Imagen circular -->
              <div class="absolute inset-12 overflow-hidden rounded-full border-2 border-white transition-all duration-500 hover:shadow-lg">
                <img src="{{ get_theme_file_uri('resources/images/tratamiento1.png') }}" alt="Psicoterapia EMDR" class="w-full h-full object-cover transition-all duration-700 hover:scale-110">
              </div>

              
            </div>
          </div>
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

  <!-- Sección: ¿Qué ocurre durante el tratamiento EMDR? -->
  <section class="py-16 bg-[#F8F9FA]">
    <div class="container mx-auto px-4 max-w-6xl">
      <!-- Encabezado con decoración -->
      <div class="relative mb-12">
        <!-- Elementos decorativos laterales -->
        <div class="flex justify-center items-center">
          <div class="hidden md:block">
            <img src="{{ get_theme_file_uri('resources/images/deco1.png') }}" alt="Psicoterapia EMDR" class="w-full h-full object-cover transition-all duration-700 hover:scale-110" style="max-width: 250px; max-height: 250px;">
          </div>
          
          <div class="text-center px-4">
            <h2 class="text-center text-4xl lg:text-5xl font-bold text-[#030D55]" style="font-family: 'Playfair Display', serif; font-weight: 800;">
              ¿Qué ocurre durante el<br>tratamiento EMDR?
            </h2>
            
            <p class="mt-6 text-base text-center max-w-3xl mx-auto">
              En el proceso psicoterapéutico con EMDR, el psicólogo trabaja en conjunto con el paciente para identificar el o las problemáticas que lo aquejan, para luego definir un <br> plan psicoterapéutico que permita colocar foco en cada molestia.
            </p>
          </div>
          
          <div class="hidden md:block">
            <img src="{{ get_theme_file_uri('resources/images/deco2.png') }}" alt="Psicoterapia EMDR" class="w-full h-full object-cover transition-all duration-700 hover:scale-110" style="max-width: 250px; max-height: 250px;">
          </div>
        </div>
      </div>
      
      <!-- Timeline con puntos -->
      <div class="mt-16 max-w-5xl mx-auto pl-4">
        <!-- Punto 1 -->
        <div class="flex opacity-0 animate-fade-in-up" style="animation-delay: 300ms; animation-duration: 1s; animation-fill-mode: forwards;">
          <div class="mr-6 flex flex-col items-center">
            <div class="w-6 h-6 rounded-full bg-[#AB277A] shadow-lg shadow-pink-500/50 animate-pulse"></div>
            <div class="w-0.5 h-full mt-1" style="border-left: 1px dashed #C29FDA; height: 80px;"></div>
          </div>
          <div class="max-w-5xl pb-8">
            <p class="text-base transform transition-all duration-500">El paciente describe el o los recuerdos dolorosos y/o traumáticos, muchas veces ya olvidados. Con ayuda del psicólogo se seleccionarán los aspectos que más angustian de dicho incidente.</p>
          </div>
        </div>
        
        <!-- Punto 2 -->
        <div class="flex opacity-0 animate-fade-in-up" style="animation-delay: 800ms; animation-duration: 1s; animation-fill-mode: forwards;">
          <div class="mr-6 flex flex-col items-center">
            <div class="w-6 h-6 rounded-full bg-[#AB277A] shadow-lg shadow-purple-500/50 animate-pulse" style="animation-delay: 500ms;"></div>
            <div class="w-0.5 h-full mt-1" style="border-left: 1px dashed #C29FDA; height: 115px;"></div>
          </div>
          <div class="max-w-5xl pb-8">
            <p class="text-base transform transition-all duration-500">Luego para desensibilizar y reprocesar el profesional realizará estimulaciones bilaterales, (visual, auditiva o kinestésica). Esta estimulación facilitará la conexión entre los dos hemisferios cerebrales, permitiendo el procesamiento de la información y la disminución de la carga emocional, para un estado más adaptativo.</p>
          </div>
        </div>
        
        <!-- Punto 3 -->
        <div class="flex opacity-0 animate-fade-in-up" style="animation-delay: 1300ms; animation-duration: 1s; animation-fill-mode: forwards;">
          <div class="mr-6 flex flex-col items-center">
            <div class="w-6 h-6 rounded-full bg-[#AB277A] shadow-lg shadow-indigo-500/50 animate-pulse" style="animation-delay: 1000ms;"></div>
            <div class="w-0.5 h-full mt-1" style="border-left: 1px dashed #C29FDA; height: 145px;"></div>
          </div>
          <div class="max-w-5xl pb-8">
            <p class="text-base transform transition-all duration-500">El psicólogo clínico entrenado en EMDR guía el proceso, tomando decisiones clínicas sobre la dirección que debe seguir la intervención. La meta es que el paciente procese la información sobre el incidente traumático, llevándolo a una "resolución adaptativa". En palabras de Francine Shapiro, esto significa: reducción de los síntomas cambio en creencias negativas y/o disruptivas a positivas y pertinentes y la posibilidad de funcionar mejor y adecuadamente en la vida cotidiana.</p>
          </div>
        </div>
        
        <!-- Punto 4 -->
        <div class="flex mb-12 opacity-0 animate-fade-in-up" style="animation-delay: 1800ms; animation-duration: 1s; animation-fill-mode: forwards;">
          <div class="mr-6 flex flex-col items-center">
            <div class="w-6 h-6 rounded-full bg-[#AB277A] shadow-lg shadow-blue-500/50 animate-pulse" style="animation-delay: 1500ms;"></div>
            <!-- Última línea no tiene extensión hacia abajo -->
          </div>
          <div class="max-w-5xl">
            <p class="text-base transform transition-all duration-500">El abordaje empleado en EMDR se sustenta en tres puntos:</p>
            <ol class="list-decimal pl-5 mt-3 space-y-1">
              <li class="opacity-0 animate-fade-in" style="animation-delay: 2000ms; animation-fill-mode: forwards;">Experiencias pasadas de la vida temprana.</li>
              <li class="opacity-0 animate-fade-in" style="animation-delay: 2200ms; animation-fill-mode: forwards;">Experiencias estresantes que detonan malestar en el presente.</li>
              <li class="opacity-0 animate-fade-in" style="animation-delay: 2400ms; animation-fill-mode: forwards;">Pensamientos y comportamientos deseados para el futuro (desarrollo de recursos para situaciones futuras).</li>
            </ol>
          </div>
        </div>
        
        <!-- Información final -->
        <div class="ml-12 mt-2 opacity-0 animate-fade-in" style="animation-delay: 2600ms; animation-fill-mode: forwards;">
          <p class="text-base">El tratamiento psicológico con EMDR puede ser desde 5 sesiones para un trauma simple y hasta más de un año para problemas complejos.</p>
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
