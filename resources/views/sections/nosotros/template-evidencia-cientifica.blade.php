{{--
  Template Name: Evidencia Científica
--}}

@extends('layouts.app')

@section('content')
  <!-- HERO SECTION (antes en hero.blade.php) -->
  <section class="relative bg-white py-25 overflow-hidden">
    <div class="container mx-auto px-4 relative z-10">
      <div class="flex flex-col md:flex-row items-center justify-center gap-8">
        <!-- Texto del lado izquierdo con más margen a la derecha --> 
        <div class="md:w-3/6 mb-10 md:mb-0 mt-10">
          <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-4 text-[#030D55] transition-all duration-500 hover:text-[#AB277A]" style="font-family: 'Playfair Display', serif; line-height: 1.1;">
            Reconocimiento en<br>guías clínicas de<br>salud
          </h1>
          
          <p class="text-4xl mt-14 text-[#AB277A] transition-all duration-300 hover:translate-x-2" style="font-family: 'Hugamour', sans-serif;">
            #Mereces una vida mejor
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
                <img src="{{ get_theme_file_uri('resources/images/nosotros.png') }}" alt="Mujer en terapia" class="w-full h-full object-cover transition-all duration-700 hover:scale-110">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
     <!-- Curvatura inferior más pronunciada -->
     <div class="absolute bottom-0 left-0 right-0 h-20">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" preserveAspectRatio="none" class="w-full h-full">
        <path fill="#030D550D" fill-opacity="1" d="M0,96L48,112C96,128,192,160,288,186.7C384,213,480,235,576,224C672,213,768,171,864,149.3C960,128,1056,128,1152,149.3C1248,171,1344,213,1392,234.7L1440,256L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
      </svg>
    </div>
  </section> 

  <!-- Sección: Reconocimiento en guías clínicas de salud -->
  <section class="py-4 bg-[#030D550D]">
      <!-- Timeline con puntos -->
      <div class="mt-10 max-w-6xl mx-auto pl-4">
        <!-- 2013 -->
        <div class="flex opacity-0 animate-fade-in-up" style="animation-delay: 300ms; animation-duration: 1s; animation-fill-mode: forwards;">
          <div class="mr-6 flex flex-col items-center">
            <div class="w-6 h-6 rounded-full bg-[#AB277A] shadow-lg shadow-pink-500/50 animate-pulse"></div>
            <div class="w-0.5 h-full mt-1" style="border-left: 1px dashed #C29FDA; height: 200px;"></div>
          </div>
          <div class="max-w-5xl pb-8">
            <h3 class="text-lg font-semibold text-[#AB277A] mb-2">2013</h3>
            <p class="text-base transform transition-all duration-500">La terapia EMDR está avalada por la Organización Mundial de la Salud y las Guías Clínicas Internacionales para el tratamiento del trauma.</p>
            <p class="text-base mt-2">Directrices para el tratamiento de afecciones específicamente relacionadas con el estrés. Ginebra, OMS.</p>
            <p class="text-base mt-2 italic">"La terapia cognitivo conductual centrada en el trauma y la terapia EMDR son las únicas psicoterapias recomendadas para niños, adolescentes y adultos con trastorno de estrés postraumático. Al igual que la terapia cognitivo conductual centrada en el trauma y la terapia EMDR tiene como objetivo reducir la angustia subjetiva y fortalecer las cogniciones adaptativas relacionadas con el evento traumático. A diferencia de la terapia cognitivo conductual centrada en el trauma, la terapia EMDR no implica (a) descripciones detalladas del evento, (b) cuestionamiento directo de creencias, (c) exposición prolongada o (d) tareas para hacer en casa".</p>
          </div>
        </div>
        
        <!-- 2005 -->
        <div class="flex opacity-0 animate-fade-in-up" style="animation-delay: 600ms; animation-duration: 1s; animation-fill-mode: forwards;">
          <div class="mr-6 flex flex-col items-center">
            <div class="w-6 h-6 rounded-full bg-[#AB277A] shadow-lg shadow-purple-500/50 animate-pulse"></div>
            <div class="w-0.5 h-full mt-1" style="border-left: 1px dashed #C29FDA; height: 115px;"></div>
          </div>
          <div class="max-w-5xl pb-8">
            <h3 class="text-lg font-semibold text-[#AB277A] mb-2">2005</h3>
            <p class="text-base transform transition-all duration-500">Instituto Nacional de Excelencia Clínica. Trastorno de estrés postraumático (TEPT): manejo de adultos y niños en atención primaria y secundaria. Londres: Guías del NICE.</p>
            <p class="text-base mt-2">Se afirmó que la TCC centrada en el trauma y la EMDR eran tratamientos con respaldo empírico de elección para el TEPT en adultos.</p>
          </div>
        </div>
        
        <!-- 2004 - VA -->
        <div class="flex opacity-0 animate-fade-in-up" style="animation-delay: 900ms; animation-duration: 1s; animation-fill-mode: forwards;">
          <div class="mr-6 flex flex-col items-center">
            <div class="w-6 h-6 rounded-full bg-[#AB277A] shadow-lg shadow-indigo-500/50 animate-pulse"></div>
            <div class="w-0.5 h-full mt-1" style="border-left: 1px dashed #C29FDA; height: 145px;"></div>
          </div>
          <div class="max-w-5xl pb-8">
            <h3 class="text-lg font-semibold text-[#AB277A] mb-2">2004</h3>
            <p class="text-base transform transition-all duration-500">Guía práctica clínica del Depto. de Asuntos de Veteranos y Depto. de Defensa para el manejo del estrés. Washington, DC: Administración de Salud para Veteranos.</p>
            <p class="text-base mt-2">EMDR fue ubicado en la categoría "A" como "fuertemente recomendado" para el tratamiento del trauma.</p>
          </div>
        </div>

        <!-- 2004 - Francia -->
        <div class="flex opacity-0 animate-fade-in-up" style="animation-delay: 1200ms; animation-duration: 1s; animation-fill-mode: forwards;">
          <div class="mr-6 flex flex-col items-center">
            <div class="w-6 h-6 rounded-full bg-[#AB277A] shadow-lg shadow-blue-500/50 animate-pulse"></div>
            <div class="w-0.5 h-full mt-1" style="border-left: 1px dashed #C29FDA; height: 115px;"></div>
          </div>
          <div class="max-w-5xl pb-8">
            <h3 class="text-lg font-semibold text-[#AB277A] mb-2">2004</h3>
            <p class="text-base transform transition-all duration-500">Psicoterapia: evaluación de tres enfoques. Instituto Nacional de Salud e Investigación Médica de Francia, París, Francia.</p>
            <p class="text-base mt-2">Se afirmó que EMDR y TCC eran los tratamientos de elección para las víctimas de trauma.</p>
          </div>
        </div>

        <!-- 2003 - Irlanda -->
        <div class="flex opacity-0 animate-fade-in-up" style="animation-delay: 1500ms; animation-duration: 1s; animation-fill-mode: forwards;">
          <div class="mr-6 flex flex-col items-center">
            <div class="w-6 h-6 rounded-full bg-[#AB277A] shadow-lg shadow-green-500/50 animate-pulse"></div>
            <div class="w-0.5 h-full mt-1" style="border-left: 1px dashed #C29FDA; height: 115px;"></div>
          </div>
          <div class="max-w-5xl pb-8">
            <h3 class="text-lg font-semibold text-[#AB277A] mb-2">2003</h3>
            <p class="text-base transform transition-all duration-500">El tratamiento del trastorno de estrés postraumático en adultos. Una publicación del Equipo de apoyo para la eficiencia de los recursos clínicos del Departamento de Salud, Servicios Sociales y Seguridad Pública de Irlanda del Norte, Belfast.</p>
            <p class="text-base mt-2">Se afirmó que EMDR y TCC eran los tratamientos de elección.</p>
          </div>
        </div>

        <!-- 2003 - Países Bajos -->
        <div class="flex opacity-0 animate-fade-in-up" style="animation-delay: 1800ms; animation-duration: 1s; animation-fill-mode: forwards;">
          <div class="mr-6 flex flex-col items-center">
            <div class="w-6 h-6 rounded-full bg-[#AB277A] shadow-lg shadow-yellow-500/50 animate-pulse"></div>
            <div class="w-0.5 h-full mt-1" style="border-left: 1px dashed #C29FDA; height: 115px;"></div>
          </div>
          <div class="max-w-5xl pb-8">
            <h3 class="text-lg font-semibold text-[#AB277A] mb-2">2003</h3>
            <p class="text-base transform transition-all duration-500">Directriz multidisciplinaria sobre trastornos de ansiedad. Quality Institute Heath Care CBO/Trimbos Intitute. Utrecht, Países Bajos.</p>
            <p class="text-base mt-2">Tanto la EMDR como la TCC se consideran tratamientos de elección para el TEPT.</p>
          </div>
        </div>

        <!-- 2002 -->
        <div class="flex opacity-0 animate-fade-in-up" style="animation-delay: 2100ms; animation-duration: 1s; animation-fill-mode: forwards;">
          <div class="mr-6 flex flex-col items-center">
            <div class="w-6 h-6 rounded-full bg-[#AB277A] shadow-lg shadow-red-500/50 animate-pulse"></div>
            <div class="w-0.5 h-full mt-1" style="border-left: 1px dashed #C29FDA; height: 115px;"></div>
          </div>
          <div class="max-w-5xl pb-8">
            <h3 class="text-lg font-semibold text-[#AB277A] mb-2">2002</h3>
            <p class="text-base transform transition-all duration-500">Documento de posición del Consejo Nacional de Salud Mental (Israel): Directrices para la evaluación y la intervención profesional con víctimas del terrorismo en el hospital y en la comunidad. Jerusalén, Israel.</p>
            <p class="text-base mt-2">EMDR es uno de los tres métodos recomendados para el tratamiento de las víctimas del terrorismo. Bleich, A., Kotler, M. Kutz, I. y Shalev, A. (2002)</p>
          </div>
        </div>

        <!-- 2001 -->
        <div class="flex opacity-0 animate-fade-in-up" style="animation-delay: 2400ms; animation-duration: 1s; animation-fill-mode: forwards;">
          <div class="mr-6 flex flex-col items-center">
            <div class="w-6 h-6 rounded-full bg-[#AB277A] shadow-lg shadow-orange-500/50 animate-pulse"></div>
            <div class="w-0.5 h-full mt-1" style="border-left: 1px dashed #C29FDA; height: 115px;"></div>
          </div>
          <div class="max-w-5xl pb-8">
            <h3 class="text-lg font-semibold text-[#AB277A] mb-2">2001</h3>
            <p class="text-base transform transition-all duration-500">Depto. de Salud del Reino Unido. Guía de práctica clínica basada en evidencia sobre la elección del tratamiento en terapias psicológicas y asesoramiento. Londres, Inglaterra.</p>
            <p class="text-base mt-2">La mejor evidencia de eficacia se informó para EMDR, exposición e inoculación de estrés.</p>
          </div>
        </div>

        <!-- 1998 -->
        <div class="flex mb-12 opacity-0 animate-fade-in-up" style="animation-delay: 2700ms; animation-duration: 1s; animation-fill-mode: forwards;">
          <div class="mr-6 flex flex-col items-center">
            <div class="w-6 h-6 rounded-full bg-[#AB277A] shadow-lg shadow-teal-500/50 animate-pulse"></div>
            <!-- Última línea no tiene extensión hacia abajo -->
          </div>
          <div class="max-w-5xl">
            <h3 class="text-lg font-semibold text-[#AB277A] mb-2">1998</h3>
            <p class="text-base transform transition-all duration-500">Actualización de terapias empíricamente validadas, II. El Psicólogo Clínico, 51, 3-16.</p>
            <p class="text-base mt-2 italic">"Según un grupo de trabajo de la División Clínica de la Asociación Estadounidense de Psicología, los únicos métodos con respaldo empírico ("probablemente eficaces") para el tratamiento de cualquier población con trastorno de estrés postraumático eran la EMDR, la terapia de exposición y la terapia de inoculación de estrés. Cabe señalar que esta evaluación no cubre la última década de investigación"</p>
          </div>
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