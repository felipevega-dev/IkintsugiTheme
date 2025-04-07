{{--
  Template Name: Quienes Somos
--}}

@extends('layouts.app')

@section('content')
  <!-- HERO SECTION (antes en hero.blade.php) -->
  <section class="relative bg-white py-15 overflow-hidden">
    <div class="container mx-auto px-4 relative z-10">
      <div class="flex flex-col md:flex-row items-center justify-center gap-16">
        <!-- Texto del lado izquierdo con más margen a la derecha -->
        <div class="md:w-2/5 mb-10 md:mb-0 md:ml-auto mt-10">
          <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-4 text-[#030D55]" style="font-family: 'Playfair Display', serif; line-height: 1.1;">
            Donde tus<br>cicatrices se<br>vuelven fortaleza
          </h1>
          
          <p class="text-4xl mt-14 text-[#AB277A]" style="font-family: 'Hugamour', sans-serif;">
            #El trauma se puede superar
          </p>
        </div>
        
        <!-- Imagen del lado derecho con más margen a la derecha -->
        <div class="md:w-2/5 md:ml-0">
          <div class="relative mt-15">
            <!-- Imagen con marco personalizado -->
            <div class="relative" style="width: 500px; height: 500px;">
              
              <!-- Línea curva violeta exterior -->
              <svg viewBox="0 0 450 450" class="absolute top-0 left-0 w-full h-full" style="transform: scale(1.08); transform-origin: center;">
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
              <svg viewBox="0 0 450 450" class="absolute top-0 left-0 w-full h-full" style="transform: scale(1.05); transform-origin: center;">
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
              <svg viewBox="0 0 450 450" class="absolute top-0 left-0 w-full h-full" style="transform: scale(1.02); transform-origin: center;">
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
              <div class="absolute inset-12 overflow-hidden rounded-full border-2 border-white">
                <img src="{{ get_theme_file_uri('resources/images/nosotros.png') }}" alt="Mujer en terapia" class="w-full h-full object-cover">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> 

  <!-- QUIENES SOMOS SECTION (antes en quienes-somos.blade.php) -->
  <section class="py-20 bg-[#030D550D] relative">
    <div class="container mx-auto px-4">
      <div class="flex flex-col md:flex-row items-center gap-12">
        <!-- Imagen con borde personalizado -->
        <div class="md:w-1/2 mb-8 md:mb-0">
          <div class="relative overflow-hidden">
            <!-- Borde estilizado similar al hero -->
            <div class="relative inline-block">
              <div class="p-2 rounded-[24px] overflow-hidden">
                <img src="{{ get_theme_file_uri('resources/images/quienesomos.png') }}" alt="Equipo Ikintsugi" class="w-full h-auto rounded-[20px]">
              </div>
            </div>
          </div>
        </div>
        
        <!-- Texto en contenedor específico -->
        <div class="md:w-1/2">
          <div class="w-full md:max-w-[618px] md:h-[532px] flex flex-col gap-6">
            <h2 class="text-4xl md:text-5xl font-bold mb-2 text-[#030D55]" style="font-family: 'Playfair Display', serif;">
              ¿Quiénes somos?
            </h2>
            
            <div class="space-y-6 text-[#181818]" style="font-family: 'Roboto', sans-serif; font-weight: 500; font-size: 16px; line-height: 28px; letter-spacing: 0;">
              <p>
                En Instituto Kintsugi, promovemos la salud mental a través de la psicoeducación y el tratamiento del trauma emocional. Inspirados en el arte japonés de reparar con oro, creemos en la resiliencia y transformación.
              </p>
              
              <p>
                Somos especialistas en terapia EMDR, un enfoque basado en neurociencia para procesar recuerdos dolorosos y reducir su impacto. Acompañamos a adolescentes, adultos y parejas que enfrentan dificultades emocionales derivadas de experiencias traumáticas.
              </p>
              
              <p>
                Ofrecemos un espacio seguro y empático con terapias respaldadas científicamente, adaptadas a cada persona.
              </p>
              
              <p style="font-family: 'Roboto', sans-serif; font-weight: 700; font-size: 16px; line-height: 28px; letter-spacing: 0;">
                Juntos recuperaremos el control de tus emociones y avanzaremos hacia una vida renovada.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Curva sutil inferior -->
    <div class="absolute bottom-0 left-0 right-0 w-full overflow-hidden" style="height: 70px; z-index: 1;">
      <svg width="100%" height="100%" viewBox="0 0 1440 70" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0,0 C240,70 480,70 720,35 C960,0 1200,0 1440,35 L1440,70 L0,70 Z" fill="#FFFFFF"></path>
      </svg>
    </div>
  </section> 

  <!-- SOBRE NOSOTROS SECTION (antes en sobre-nosotros.blade.php) -->
  <section class="py-20 bg-white relative overflow-hidden pt-14">
    <div class="container mx-auto px-4">
      <div class="text-center mb-12">
        <h2 class="text-5xl font-extrabold mb-8 text-[#030D55]" style="font-family: 'Playfair Display', serif; font-size: 48px; line-height: 1.1; letter-spacing: 0%;">
          Sobre nosotros
        </h2>
        
        <div class="mx-auto max-w-2xl mb-14">
          <p class="text-center mb-6 text-[#181818]" style="font-family: 'Roboto', sans-serif; font-weight: 400; font-size: 16px; line-height: 1.7;">
            Somos un equipo especializado en salud mental y terapia EMDR, avalada científicamente, enfocándonos en ayudarte a superar adversidades como maltrato, bullying o situaciones de violencia, adaptando cada tratamiento a ti.
          </p>
          
          <p class="text-center text-[#181818]" style="font-family: 'Roboto', sans-serif; font-weight: 400; font-size: 16px; line-height: 1.7;">
            Nuestro compromiso: brindarte un espacio seguro donde puedas recuperar tu equilibrio y construir una vida plena.
          </p>
        </div>
      </div>
      
      <!-- Equipo -->
      <div class="flex flex-wrap justify-center gap-16 md:gap-32 mx-auto">
        <!-- Terapeuta 1 -->
        <div class="w-auto">
          <!-- Foto circular con botón -->
          <div class="flex flex-col items-center relative">
            <div class="w-[250px] h-[250px] rounded-full overflow-hidden">
              <img src="{{ get_theme_file_uri('resources/images/julio.png') }}" alt="Julio César" class="w-full h-full object-cover">
            </div>
            <div class="absolute -bottom-3 left-1/2 transform -translate-x-1/2">
              <div class="p-[2px] rounded-2xl bg-gradient-to-b from-[rgba(171,39,122,0.48)] to-[rgba(3,13,85,0.48)]">
                <a href="#" class="inline-block text-center text-[14px] font-medium py-1 px-8 bg-white text-[#030D55] rounded-2xl">
                  Ver perfil
                </a>
              </div>
            </div>
          </div>
          
          <!-- Nombre y credenciales -->
          <div class="text-left mt-8">
            <h3 class="font-medium text-[#FF3382] text-xl mb-3">
              @Psicologo_JulioCesar
            </h3>
            
            <!-- Información sin puntos -->
            <ul class="list-none text-left text-sm space-y-0.5 max-w-[300px]">
              <li>Psicólogo Clínico</li>
              <li>Máster en Psicoterapia EMDR</li>
              <li>Hipnosis Clínica</li>
              <li>Diplomado en Gerontología</li>
              <li>Con experiencia en el trabajo con adolescentes, adultos, adultos mayores y parejas.</li>
              <li>Cofundador del Instituto Kintsugi</li>
              <li>Co-conductor y coordinador del podcast @EmisorKintsugi, donde participa en entrevistas y debates sobre temas de salud mental.</li>
              <li>Miembro Asociación de EMDR Chile y España</li>
            </ul>
          </div>
        </div>
        
        <!-- Terapeuta 2 -->
        <div class="w-auto">
          <!-- Foto circular con botón -->
          <div class="flex flex-col items-center relative">
            <div class="w-[250px] h-[275px] rounded-full overflow-hidden">
              <img src="{{ get_theme_file_uri('resources/images/shenhui.png') }}" alt="Shenhui" class="w-full h-full object-cover">
            </div>
            <div class="absolute -bottom-[-4px] left-1/2 transform -translate-x-1/2">
              <div class="p-[2px] rounded-2xl bg-gradient-to-b from-[rgba(171,39,122,0.48)] to-[rgba(3,13,85,0.48)]">
                <a href="#" class="inline-block text-center text-[14px] font-medium py-1 px-8 bg-white text-[#030D55] rounded-2xl">
                  Ver perfil
                </a>
              </div>
            </div>
          </div>
          
          <!-- Nombre y credenciales -->
          <div class="text-left mt-3">
            <h3 class="font-medium text-[#FF3382] text-xl mb-3">
              @Psicologa_Shenhui
            </h3>
            
            <!-- Información sin puntos -->
            <ul class="list-none text-left text-sm space-y-0.5 max-w-[300px]">
              <li>Psicóloga Clínica EMDR</li>
              <li>Máster en Psicoterapia EMDR</li>
              <li>Happiness Trainer</li>
              <li>Hipnosis Clínica</li>
              <li>Emotional Freedom Techniques (EFT)</li>
              <li>PAR/IJVE para trauma, apego y disociación</li>
              <li>Instructora de QIGONG</li>
              <li>Co-fundadora del Instituto Kintsugi</li>
              <li>Co-conductora de @EmisorKintsugi, podcast de divulgación científica de salud mental.</li>
              <li>Psicoterapia para adultos, adulto mayor y parejas</li>
              <li>Miembro Asociación de EMDR Chile y España</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Decoración -->
    <div class="absolute right-0 top-4 -z-0 opacity-50">
      <img src="{{ get_theme_file_uri('resources/images/deco1.png') }}" alt="Decoración" class="w-42">
    </div>
  </section>

  <!-- MISIÓN Y VALORES SECTION (antes en mision-valores.blade.php) -->
  <section class="py-50 relative overflow-hidden" style="background-color: #030D550D;">
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
    <div class="container mx-auto px-4 relative z-20 mt-24">
      <div class="flex flex-col md:flex-row items-center justify-center gap-8 relative">
        <!-- Misión -->
        <div class="bg-white/80 rounded-[16px] p-[24px] shadow-lg relative z-10" style="width: 395px; min-height: 376px;">
          <h3 class="text-[24px] font-bold mb-4 text-[#030D55] text-center" style="font-family: 'Playfair Display', serif; line-height: 100%; letter-spacing: 0%;">
            Nuestra misión
          </h3>
          <p class="text-[#181818]" style="font-family: 'Roboto', sans-serif; font-weight: 400; font-size: 16px; line-height: 28px; letter-spacing: 0%;">
            Estamos comprometidos en promover, difundir y brindar soluciones desde la Psicoterapia EMDR a problemáticas de la salud mental. Estamos enfocados en mejorar la calidad de vida de las personas, familias, grupos, comunidades e instituciones a través de la entrega de herramientas e intervenciones eficaces, basadas en evidencia científica, que permitan facilitar el desarrollo subjetivo y social de nuestros pacientes.
          </p>
          
          <!-- Línea conectora hacia el logo con puntitos -->
          <div class="hidden md:flex absolute right-[-60px] top-1/2 items-center space-x-1" style="z-index: 30;">
            <div class="w-2 h-2 rounded-full bg-[#F5B3F3]"></div>
            <div class="w-2 h-2 rounded-full bg-[#F5B3F3]"></div>
            <div class="w-2 h-2 rounded-full bg-[#F5B3F3]"></div>
            <div class="h-[3px] flex-grow bg-[#F5B3F3]" style="width: 45px;"></div>
          </div>
        </div>
        
        <!-- Logo central -->
        <div class="relative flex items-center justify-center mx-6 z-20">
          <!-- Logo blanco -->
          <div class="relative z-10">
            <img src="{{ get_theme_file_uri('resources/images/logoblanco.png') }}" alt="Ikintsugi Logo" style="width: 226px; height: 56px;">
          </div>
        </div>
        
        <!-- Valores -->
        <div class="bg-white/80 rounded-[16px] p-[24px] shadow-lg relative z-10" style="width: 395px; min-height: 376px;">
          <!-- Línea conectora hacia el logo con puntitos -->
          <div class="hidden md:flex absolute left-[-60px] top-1/2 items-center space-x-1" style="z-index: 30;">
            <div class="h-[3px] flex-grow bg-[#F5B3F3]" style="width: 45px;"></div>
            <div class="w-2 h-2 rounded-full bg-[#F5B3F3]"></div>
            <div class="w-2 h-2 rounded-full bg-[#F5B3F3]"></div>
            <div class="w-2 h-2 rounded-full bg-[#F5B3F3]"></div>
          </div>
          
          <h3 class="text-[24px] font-bold mb-4 text-[#030D55] text-center" style="font-family: 'Playfair Display', serif; line-height: 100%; letter-spacing: 0%;">
            Nuestros valores
          </h3>
          <p class="mb-4 text-[#181818]" style="font-family: 'Roboto', sans-serif; font-weight: 400; font-size: 16px; line-height: 28px; letter-spacing: 0%;">
            Como miembros de la Iniciativa Kintsugi creemos en la reparación del ser humano inspirada en los siguientes valores:
          </p>
          <ul class="space-y-1 text-[#181818]" style="font-family: 'Roboto', sans-serif; font-weight: 400; font-size: 16px; line-height: 28px; letter-spacing: 0%;">
            <li><span class="font-bold">Confianza</span></li>
            <li><span class="font-bold">Respeto</span></li>
            <li><span class="font-bold">Aceptación incondicional</span></li>
            <li><span class="font-bold">Conocimiento Científico</span></li>
            <li><span class="font-bold">Confidencialidad</span></li>
            <li><span class="font-bold">Ética Profesional</span></li>
          </ul>
        </div>
      </div>
    </div>
  </section> 

  <!-- BLOG SECTION (antes en blog.blade.php) -->
  <section class="py-20 bg-white">
    <div class="container mx-auto px-4">
      <h2 class="text-5xl font-extrabold mb-12 text-center text-[#030D55]" style="font-family: 'Playfair Display', serif; font-size: 48px; line-height: 100%; letter-spacing: 0%;">
        Nuestro blog
      </h2>
      
      <!-- Artículos del blog -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Artículo 1 -->
        <div class="rounded-2xl overflow-hidden w-full max-w-[395px] h-[419px] mx-auto" style="padding: 0;">
          <div class="relative h-full">
            <img src="{{ get_theme_file_uri('resources/images/blog1.png') }}" alt="La presión sobre artistas" class="w-full h-full object-cover">
            <div class="absolute top-3 left-3 text-white py-2.5 px-4 rounded-full text-center w-[201px] h-[40px]" style="background: rgba(3, 13, 85, 0.85);">
              11 de marzo de 2025
            </div>
            <!-- Overlay gradient on the entire image -->
            <div class="absolute inset-0" style="background: linear-gradient(180deg, rgba(171, 39, 122, 0.4) 0%, rgba(3, 13, 85, 0.4) 61%);"></div>
            <!-- Content overlay at bottom -->
            <div class="absolute bottom-0 left-0 right-0 p-4" style="padding-top: 24px; padding-right: 16px; padding-bottom: 24px; padding-left: 16px;">
              <div class="w-full max-w-[363px] gap-4 flex flex-col">
                <h3 class="text-2xl font-bold text-white" style="font-family: 'Playfair Display', serif; font-weight: 700; font-size: 24px; line-height: 100%; letter-spacing: 0%;">
                  La presión sobre artistas surcoreanos
                </h3>
                <p class="text-base text-white" style="font-family: 'Roboto', sans-serif; font-weight: 400; font-size: 16px; line-height: 28px; letter-spacing: 0%;">
                  La muerte de la actriz surcoreana Kim Sae-ron, de apenas 24 años, encontrada sin vida en su departamento el pasado domingo, volvió a encender...
                </p>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Artículo 2 -->
        <div class="rounded-2xl overflow-hidden w-full max-w-[395px] h-[419px] mx-auto" style="padding: 0;">
          <div class="relative h-full">
            <img src="{{ get_theme_file_uri('resources/images/blog2.png') }}" alt="Jorge López" class="w-full h-full object-cover">
            <div class="absolute top-3 left-3 text-white py-2.5 px-4 rounded-full text-center w-[201px] h-[40px]" style="background: rgba(3, 13, 85, 0.85);">
              11 de marzo de 2025
            </div>
            <!-- Overlay gradient on the entire image -->
            <div class="absolute inset-0" style="background: linear-gradient(180deg, rgba(171, 39, 122, 0.4) 0%, rgba(3, 13, 85, 0.4) 61%);"></div>
            <!-- Content overlay at bottom -->
            <div class="absolute bottom-0 left-0 right-0 p-4" style="padding-top: 24px; padding-right: 16px; padding-bottom: 24px; padding-left: 16px;">
              <div class="w-full max-w-[363px] gap-4 flex flex-col">
                <h3 class="text-2xl font-bold text-white" style="font-family: 'Playfair Display', serif; font-weight: 700; font-size: 24px; line-height: 100%; letter-spacing: 0%;">
                  Jorge López rechaza de plano el amor romántico
                </h3>
                <p class="text-base text-white" style="font-family: 'Roboto', sans-serif; font-weight: 400; font-size: 16px; line-height: 28px; letter-spacing: 0%;">
                  Durante este pasado fin de semana, en el marco del cierre de las celebraciones del Festival de Viña 2025, el actor chileno radicado en España y jurado...
                </p>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Artículo 3 -->
        <div class="rounded-2xl overflow-hidden w-full max-w-[395px] h-[419px] mx-auto" style="padding: 0;">
          <div class="relative h-full">
            <img src="{{ get_theme_file_uri('resources/images/blog3.png') }}" alt="El síndrome postvacacional" class="w-full h-full object-cover">
            <div class="absolute top-3 left-3 text-white py-2.5 px-4 rounded-full text-center w-[201px] h-[40px]" style="background: #030D55B8;">
              11 de marzo de 2025
            </div>
            <!-- Overlay gradient on the entire image -->
            <div class="absolute inset-0" style="background: linear-gradient(180deg, rgba(171, 39, 122, 0.4) 0%, rgba(3, 13, 85, 0.4) 61%);"></div>
            <!-- Content overlay at bottom -->
            <div class="absolute bottom-0 left-0 right-0 p-4" style="padding-top: 24px; padding-right: 16px; padding-bottom: 24px; padding-left: 16px;">
              <div class="w-full max-w-[363px] gap-4 flex flex-col">
                <h3 class="text-2xl font-bold text-white" style="font-family: 'Playfair Display', serif; font-weight: 700; font-size: 24px; line-height: 100%; letter-spacing: 0%;">
                  El síndrome postvacacional: cómo volver a la rutina sin estrés
                </h3>
                <p class="text-base text-white" style="font-family: 'Roboto', sans-serif; font-weight: 400; font-size: 16px; line-height: 28px; letter-spacing: 0%;">
                  Las vacaciones llegaron a su fin, el sol se escapó más temprano, las maletas se guardaron y el despertador vuelve a sonar. Llegó el momento de...
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Botón Ver más blogs -->
      <div class="text-center mt-12">
        <a href="{{ home_url('/blog') }}" class="inline-block py-2.5 px-8 text-white rounded-full font-medium w-[277px] h-[47px] text-center" style="background: linear-gradient(90deg, #FF3382 0%, rgba(90, 9, 137, 0.8) 100%); border-radius: 40px; padding: 10px;">
          Ver más blogs
        </a>
      </div>
    </div>
  </section>
@endsection 