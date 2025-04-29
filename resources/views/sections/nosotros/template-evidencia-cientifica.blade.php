{{--
  Template Name: Evidencia Científica
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
          <span class="text-[#AB277A] text-sm md:text-base uppercase tracking-wider font-medium mb-2 block">Evidencia científica</span>
          <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-[#030D55] mb-8 leading-none transition-all duration-500 hover:text-[#AB277A] font-paytone">
          Avalado por guías clínicas de salud mental
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
            src="{{ get_theme_file_uri('resources/images/nosotros.png') }}" 
            alt="Evidencia científica EMDR" 
            class="max-w-full h-auto rounded-lg relative z-10 transition-transform duration-500 hover:scale-105"
            style="max-width: 580px; position: relative;"
          >
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
        <div class="flex" data-aos="fade-up" data-aos-duration="600" data-aos-delay="100">
          <div class="mr-6 flex flex-col items-center">
            <div class="w-6 h-6 rounded-full bg-[#AB277A] shadow-lg shadow-pink-500/50 animate-pulse"></div>
            <div class="w-0.5 h-full mt-1" style="border-left: 1px dashed #C29FDA; height: 200px;"></div>
          </div>
          <div class="max-w-5xl pb-8">
            <h3 class="text-lg md:text-xl font-semibold text-[#AB277A] mb-2 transition-all duration-300 hover:translate-x-1">2013</h3>
            <p class="text-base transition-all duration-300 hover:translate-y-[-2px]">La terapia EMDR está avalada por la Organización Mundial de la Salud y las Guías Clínicas Internacionales para el tratamiento del trauma.</p>
            <p class="text-base mt-2 transition-all duration-300 hover:translate-y-[-2px]">Directrices para el tratamiento de afecciones específicamente relacionadas con el estrés. Ginebra, OMS.</p>
            <p class="text-base mt-2 italic transition-all duration-300 hover:translate-y-[-2px]">"La terapia cognitivo conductual centrada en el trauma y la terapia EMDR son las únicas psicoterapias recomendadas para niños, adolescentes y adultos con trastorno de estrés postraumático. Al igual que la terapia cognitivo conductual centrada en el trauma y la terapia EMDR tiene como objetivo reducir la angustia subjetiva y fortalecer las cogniciones adaptativas relacionadas con el evento traumático. A diferencia de la terapia cognitivo conductual centrada en el trauma, la terapia EMDR no implica (a) descripciones detalladas del evento, (b) cuestionamiento directo de creencias, (c) exposición prolongada o (d) tareas para hacer en casa".</p>
          </div>
        </div>
        
        <!-- 2005 -->
        <div class="flex" data-aos="fade-up" data-aos-duration="600" data-aos-delay="150">
          <div class="mr-6 flex flex-col items-center">
            <div class="w-6 h-6 rounded-full bg-[#AB277A] shadow-lg shadow-purple-500/50 animate-pulse"></div>
            <div class="w-0.5 h-full mt-1" style="border-left: 1px dashed #C29FDA; height: 115px;"></div>
          </div>
          <div class="max-w-5xl pb-8">
            <h3 class="text-lg font-semibold text-[#AB277A] mb-2 transition-all duration-300 hover:translate-x-1">2005</h3>
            <p class="text-base transition-all duration-300 hover:translate-y-[-2px]">Instituto Nacional de Excelencia Clínica. Trastorno de estrés postraumático (TEPT): manejo de adultos y niños en atención primaria y secundaria. Londres: Guías del NICE.</p>
            <p class="text-base mt-2 transition-all duration-300 hover:translate-y-[-2px]">Se afirmó que la TCC centrada en el trauma y la EMDR eran tratamientos con respaldo empírico de elección para el TEPT en adultos.</p>
          </div>
        </div>
        
        <!-- 2004 - VA -->
        <div class="flex" data-aos="fade-up" data-aos-duration="600" data-aos-delay="200">
          <div class="mr-6 flex flex-col items-center">
            <div class="w-6 h-6 rounded-full bg-[#AB277A] shadow-lg shadow-indigo-500/50 animate-pulse"></div>
            <div class="w-0.5 h-full mt-1" style="border-left: 1px dashed #C29FDA; height: 145px;"></div>
          </div>
          <div class="max-w-5xl pb-8">
            <h3 class="text-lg font-semibold text-[#AB277A] mb-2 transition-all duration-300 hover:translate-x-1">2004</h3>
            <p class="text-base transition-all duration-300 hover:translate-y-[-2px]">Guía práctica clínica del Depto. de Asuntos de Veteranos y Depto. de Defensa para el manejo del estrés. Washington, DC: Administración de Salud para Veteranos.</p>
            <p class="text-base mt-2 transition-all duration-300 hover:translate-y-[-2px]">EMDR fue ubicado en la categoría "A" como "fuertemente recomendado" para el tratamiento del trauma.</p>
          </div>
        </div>

        <!-- 2004 - Francia -->
        <div class="flex" data-aos="fade-up" data-aos-duration="600" data-aos-delay="250">
          <div class="mr-6 flex flex-col items-center">
            <div class="w-6 h-6 rounded-full bg-[#AB277A] shadow-lg shadow-blue-500/50 animate-pulse"></div>
            <div class="w-0.5 h-full mt-1" style="border-left: 1px dashed #C29FDA; height: 115px;"></div>
          </div>
          <div class="max-w-5xl pb-8">
            <h3 class="text-lg font-semibold text-[#AB277A] mb-2 transition-all duration-300 hover:translate-x-1">2004</h3>
            <p class="text-base transition-all duration-300 hover:translate-y-[-2px]">Psicoterapia: evaluación de tres enfoques. Instituto Nacional de Salud e Investigación Médica de Francia, París, Francia.</p>
            <p class="text-base mt-2 transition-all duration-300 hover:translate-y-[-2px]">Se afirmó que EMDR y TCC eran los tratamientos de elección para las víctimas de trauma.</p>
          </div>
        </div>

        <!-- 2003 - Irlanda -->
        <div class="flex" data-aos="fade-up" data-aos-duration="600" data-aos-delay="300">
          <div class="mr-6 flex flex-col items-center">
            <div class="w-6 h-6 rounded-full bg-[#AB277A] shadow-lg shadow-green-500/50 animate-pulse"></div>
            <div class="w-0.5 h-full mt-1" style="border-left: 1px dashed #C29FDA; height: 115px;"></div>
          </div>
          <div class="max-w-5xl pb-8">
            <h3 class="text-lg font-semibold text-[#AB277A] mb-2 transition-all duration-300 hover:translate-x-1">2003</h3>
            <p class="text-base transition-all duration-300 hover:translate-y-[-2px]">El tratamiento del trastorno de estrés postraumático en adultos. Una publicación del Equipo de apoyo para la eficiencia de los recursos clínicos del Departamento de Salud, Servicios Sociales y Seguridad Pública de Irlanda del Norte, Belfast.</p>
            <p class="text-base mt-2 transition-all duration-300 hover:translate-y-[-2px]">Se afirmó que EMDR y TCC eran los tratamientos de elección.</p>
          </div>
        </div>

        <!-- 2003 - Países Bajos -->
        <div class="flex" data-aos="fade-up" data-aos-duration="600" data-aos-delay="350">
          <div class="mr-6 flex flex-col items-center">
            <div class="w-6 h-6 rounded-full bg-[#AB277A] shadow-lg shadow-yellow-500/50 animate-pulse"></div>
            <div class="w-0.5 h-full mt-1" style="border-left: 1px dashed #C29FDA; height: 115px;"></div>
          </div>
          <div class="max-w-5xl pb-8">
            <h3 class="text-lg font-semibold text-[#AB277A] mb-2 transition-all duration-300 hover:translate-x-1">2003</h3>
            <p class="text-base transition-all duration-300 hover:translate-y-[-2px]">Directriz multidisciplinaria sobre trastornos de ansiedad. Quality Institute Heath Care CBO/Trimbos Intitute. Utrecht, Países Bajos.</p>
            <p class="text-base mt-2 transition-all duration-300 hover:translate-y-[-2px]">Tanto la EMDR como la TCC se consideran tratamientos de elección para el TEPT.</p>
          </div>
        </div>

        <!-- 2002 -->
        <div class="flex" data-aos="fade-up" data-aos-duration="600" data-aos-delay="400">
          <div class="mr-6 flex flex-col items-center">
            <div class="w-6 h-6 rounded-full bg-[#AB277A] shadow-lg shadow-red-500/50 animate-pulse"></div>
            <div class="w-0.5 h-full mt-1" style="border-left: 1px dashed #C29FDA; height: 115px;"></div>
          </div>
          <div class="max-w-5xl pb-8">
            <h3 class="text-lg font-semibold text-[#AB277A] mb-2 transition-all duration-300 hover:translate-x-1">2002</h3>
            <p class="text-base transition-all duration-300 hover:translate-y-[-2px]">Documento de posición del Consejo Nacional de Salud Mental (Israel): Directrices para la evaluación y la intervención profesional con víctimas del terrorismo en el hospital y en la comunidad. Jerusalén, Israel.</p>
            <p class="text-base mt-2 transition-all duration-300 hover:translate-y-[-2px]">EMDR es uno de los tres métodos recomendados para el tratamiento de las víctimas del terrorismo. Bleich, A., Kotler, M. Kutz, I. y Shalev, A. (2002)</p>
          </div>
        </div>

        <!-- 2001 -->
        <div class="flex" data-aos="fade-up" data-aos-duration="600" data-aos-delay="450">
          <div class="mr-6 flex flex-col items-center">
            <div class="w-6 h-6 rounded-full bg-[#AB277A] shadow-lg shadow-orange-500/50 animate-pulse"></div>
            <div class="w-0.5 h-full mt-1" style="border-left: 1px dashed #C29FDA; height: 115px;"></div>
          </div>
          <div class="max-w-5xl pb-8">
            <h3 class="text-lg font-semibold text-[#AB277A] mb-2 transition-all duration-300 hover:translate-x-1">2001</h3>
            <p class="text-base transition-all duration-300 hover:translate-y-[-2px]">Depto. de Salud del Reino Unido. Guía de práctica clínica basada en evidencia sobre la elección del tratamiento en terapias psicológicas y asesoramiento. Londres, Inglaterra.</p>
            <p class="text-base mt-2 transition-all duration-300 hover:translate-y-[-2px]">La mejor evidencia de eficacia se informó para EMDR, exposición e inoculación de estrés.</p>
          </div>
        </div>

        <!-- 1998 -->
        <div class="flex mb-12" data-aos="fade-up" data-aos-duration="600" data-aos-delay="500">
          <div class="mr-6 flex flex-col items-center">
            <div class="w-6 h-6 rounded-full bg-[#AB277A] shadow-lg shadow-teal-500/50 animate-pulse"></div>
            <!-- Última línea no tiene extensión hacia abajo -->
          </div>
          <div class="max-w-5xl">
            <h3 class="text-lg font-semibold text-[#AB277A] mb-2 transition-all duration-300 hover:translate-x-1">1998</h3>
            <p class="text-base transition-all duration-300 hover:translate-y-[-2px]">Actualización de terapias empíricamente validadas, II. El Psicólogo Clínico, 51, 3-16.</p>
            <p class="text-base mt-2 italic transition-all duration-300 hover:translate-y-[-2px]">"Según un grupo de trabajo de la División Clínica de la Asociación Estadounidense de Psicología, los únicos métodos con respaldo empírico ("probablemente eficaces") para el tratamiento de cualquier población con trastorno de estrés postraumático eran la EMDR, la terapia de exposición y la terapia de inoculación de estrés. Cabe señalar que esta evaluación no cubre la última década de investigación"</p>
          </div>
        </div>
      </div>
  </section>
@endsection 