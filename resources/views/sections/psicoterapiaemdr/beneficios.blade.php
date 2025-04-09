{{--
  Template Name: Beneficios EMDR
--}}

@extends('layouts.app')

@section('content')
  <!-- Hero Section con fondo blanco y figura morada alrededor de la foto -->
  <section class="relative bg-white overflow-hidden">
    <!-- Contenido del hero -->
    <div class="container mx-auto px-4 py-20 lg:py-28 relative z-10 mt-15">
      <div class="flex flex-col lg:flex-row items-center">
        <!-- Columna de texto -->
        <div class="lg:w-1/2 mb-12 lg:mb-0">
          <h1 class="text-5xl lg:text-7xl font-bold text-[#030D55] mb-8 leading-none" style="font-family: 'Playfair Display', serif; font-weight: 800;">
          Reconocer, sanar y avanzar: Un enfoque terapéutico con EMDR
          </h1>
          <p class="text-3xl lg:text-5xl text-[#AB277A] mt-6" style="font-family: 'Hugamour', serif; font-weight: 400;">
            #El trauma se puede superar
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
            src="{{ get_theme_file_uri('resources/images/beneficios.png') }}" 
            alt="Persona en sesión de terapia" 
            class="max-w-full h-auto rounded-lg relative z-10"
            style="max-width: 580px;"
          >
        </div>
      </div>
    </div>

  </section>

  <!-- Beneficios de la Psicoterapia EMDR -->
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
      <div class="flex flex-col md:flex-row items-center justify-center gap-8 md:gap-16 relative">
        <!-- Primer contenedor: Vivencias dolorosas explícitas -->
        <div class="bg-white/80 rounded-[16px] p-[24px] shadow-lg relative z-10 transition-all duration-500 hover:bg-white hover:shadow-xl hover:-translate-y-2" style="width: 395px; height: 500px; display: flex; flex-direction: column;">
          <h3 class="text-[24px] font-bold mb-4 text-[#030D55] text-center transition-all duration-300 hover:text-[#AB277A]" style="font-family: 'Playfair Display', serif; line-height: 100%; letter-spacing: 0%;">
            Desde las vivencias dolorosas explícitas
          </h3>
          <div class="flex-grow overflow-auto">
            <p class="text-[#181818]" style="font-family: 'Roboto', sans-serif; font-weight: 400; font-size: 16px; line-height: 28px; letter-spacing: 0%;">
              Si has experimentado situaciones negativas que han dejado una marca profunda en tu vida, como el maltrato, abuso, violación, bullying, mobbing o encerronas, es posible que, a pesar de haber transcurrido años, continúen afectándote. Pesadillas, flashbacks, angustia y creencias negativas pueden persistir, haciendo que solo la idea de revivir esos recuerdos resulte aterradora.
            </p>
            <p class="mt-4 text-[#181818]" style="font-family: 'Roboto', sans-serif; font-weight: 400; font-size: 16px; line-height: 28px; letter-spacing: 0%;">
              EMDR te ofrece la posibilidad de reprocesar estos recuerdos dolorosos, disminuyendo su carga emocional y permitiéndote avanzar hacia una vida más tranquila y plena.
            </p>
          </div>
        </div>
        
        <!-- Segundo contenedor: Trastornos -->
        <div class="bg-white/80 rounded-[16px] p-[24px] shadow-lg relative z-10 transition-all duration-500 hover:bg-white hover:shadow-xl hover:-translate-y-2" style="width: 395px; height: 500px; display: flex; flex-direction: column;">
          <h3 class="text-[24px] font-bold mb-4 text-[#030D55] text-center transition-all duration-300 hover:text-[#AB277A]" style="font-family: 'Playfair Display', serif; line-height: 100%; letter-spacing: 0%;">
            Desde los Trastornos
          </h3>
          <div class="flex-grow overflow-auto">
            <p class="text-[#181818]" style="font-family: 'Roboto', sans-serif; font-weight: 400; font-size: 16px; line-height: 28px; letter-spacing: 0%;">
              Si padeces síntomas tales como angustia, tristeza, ira o pensamientos negativos, y sientes que en algunas ocasiones te desconectas, te encuentras perdida o agotada debido a condiciones psiquiátricas (como el trastorno de estrés postraumático, trauma complejo, disociación, ansiedad, crisis de pánico, trastorno límite de la personalidad, depresión, TOC o trastornos alimentarios, entre otros), la psicoterapia EMDR puede ser una herramienta efectiva en tu proceso de recuperación.
            </p>
          </div>
        </div>
        
        <!-- Tercer contenedor: Malestares emocionales -->
        <div class="bg-white/80 rounded-[16px] p-[24px] shadow-lg relative z-10 transition-all duration-500 hover:bg-white hover:shadow-xl hover:-translate-y-2" style="width: 395px; height: 500px; display: flex; flex-direction: column;">
          <h3 class="text-[24px] font-bold mb-4 text-[#030D55] text-center transition-all duration-300 hover:text-[#AB277A]" style="font-family: 'Playfair Display', serif; line-height: 100%; letter-spacing: 0%;">
            Malestares emocionales
          </h3>
          <div class="flex-grow overflow-auto">
            <p class="text-[#181818]" style="font-family: 'Roboto', sans-serif; font-weight: 400; font-size: 16px; line-height: 28px; letter-spacing: 0%;">
              Si sufres de malestares psicológicos que incluyen baja autoestima, inseguridad, dificultades para tomar decisiones o creencias negativas y limitantes sobre ti misma y los demás. O sientes que algo te ocurre que impide que puedas tener una vida plena. EMDR puede ayudarte. O sientes que las cosas nunca te salen bien, experimentar culpa constante o tener la sensación de no ser lo suficientemente buena, incluso llegando a complacer en exceso, son patrones que se pueden abordar y transformar con la psicoterapia EMDR.
            </p>
          </div>
        </div>
      </div>
    </div>
  </section> 
  <!-- Segunda sección con fondo blanco-->
  <section class="bg-white py-10 lg:py-16">
    <div class="container mx-auto px-4 max-w-7xl">
      <div class="flex flex-col lg:flex-row items-center gap-4">
        <!-- Imagen a la izquierda -->
        <div class="lg:w-1/2 flex justify-center lg:justify-start relative order-2 lg:order-1">
          
          <img 
            src="{{ get_theme_file_uri('resources/images/beneficios2.png') }}" 
            alt="Qué nos inspira" 
            class="max-w-full h-auto rounded-lg relative z-10"
            style="max-width: 543px;"
          >
        </div>
        
        <!-- Texto explicativo -->
        <div class="lg:w-1/2 mb-8 lg:mb-0 pr-0 lg:pr-6 order-1 lg:order-2">
          <h2 class="text-center text-4xl lg:text-5xl font-bold text-[#030D55] mb-8" style="font-family: 'Playfair Display', serif; font-weight: 800;">
            ¿Qué haremos?
          </h2>
          
          <div class="prose prose-lg">
            <p class="font-normal text-base leading-7">
              Nuestro trabajo conjunto se basa en tu compromiso, paciencia, constancia y participación hacia una vida mejor. El proceso terapéutico incluye:
            </p>
            
            <ul class="mt-4 space-y-3">
              <li class="font-normal text-base leading-7">
                <strong>Identificación:</strong> Analizaremos los síntomas y los disparadores o gatillantes que afectan tu bienestar.
              </li>
              <li class="font-normal text-base leading-7">
                <strong>Exploración de causas:</strong> Investigaremos las raíces de estos problemas, que a menudo se originan en la infancia o juventud.
              </li>
              <li class="font-normal text-base leading-7">
                <strong>Plan de intervención:</strong> Diseñaremos un plan personalizado que aborde tanto recuerdos explícitos como implícitos responsables de tu malestar actual.
              </li>
              <li class="font-normal text-base leading-7">
                <strong>Desarrollo de recursos:</strong> Evaluaremos tus mecanismos de regulación emocional, tus relaciones interpersonales y estrategias de defensa, para implementar herramientas y recursos que te permitan vivir de manera más equilibrada y satisfactoria.
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
