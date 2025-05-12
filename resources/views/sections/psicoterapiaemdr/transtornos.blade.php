{{--
  Template Name: Transtornos
--}}

@extends('layouts.app')

@section('content')
  <!-- Hero Section con fondo blanco y figura morada alrededor de la foto -->
  <section class="relative bg-white overflow-x-hidden">
    <!-- Contenido del hero -->
    <div class="container mx-auto px-4 py-12 lg:py-28 relative z-10">
      <div class="flex flex-col lg:flex-row items-center">
        <!-- Columna de texto -->
        <div class="lg:w-1/2 mb-8 lg:mb-12" data-aos="fade-right" data-aos-duration="600">
          <span class="text-[#AB277A] text-sm md:text-base uppercase tracking-wider font-medium mb-2 block">Trastornos y malestares que atendemos</span>
          <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-[#030D55] mb-4 md:mb-8 leading-none transition-all duration-500 hover:text-[#AB277A] font-paytone">
          Con EMDR, la sanación <br>es posible
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
                src="{{ get_theme_file_uri('resources/images/transtornos1.png') }}" 
                alt="Mujer en terapia" 
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
     <!-- Curvatura inferior más pronunciada -->
     <div class="absolute bottom-0 left-0 right-0 h-20">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" preserveAspectRatio="none" class="w-full h-full">
        <path fill="#030D550D" fill-opacity="1" d="M0,96L48,112C96,128,192,160,288,186.7C384,213,480,235,576,224C672,213,768,171,864,149.3C960,128,1056,128,1152,149.3C1248,171,1344,213,1392,234.7L1440,256L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
      </svg>
    </div>
  </section>

  <!-- Sección: Trastornos y malestares que atendemos -->
  <section class="relative py-16 overflow-x-hidden bg-[#030D550D]">
    <div class="container mx-auto px-4 relative z-10">
      <!-- Título principal centrado -->
      <h2 class="text-2xl md:text-4xl lg:text-4xl font-bold text-center text-[#030D55] mb-12 transition-all duration-500 hover:text-[#AB277A] font-paytone">
        Trastornos y malestares que<br>atendemos
      </h2>

      <!-- Contenido de texto principal -->
      <div class="max-w-4xl mx-auto text-base mb-16 text-center" data-aos="fade-up" data-aos-duration="600" data-aos-delay="100">
        <p class="mb-4 transition-all duration-300 hover:translate-y-[-2px]">
          En el Instituto Kintsugi sabemos que el trauma puede afectar profundamente la vida de las personas, generando síntomas como disociación, amnesia disociativa, desrealización, despersonalización, ansiedad, depresión, estrés postraumático, falta de límites, dificultades relacionales, labilidad emocional, baja autoestima y más.
        </p>
        <p class="mb-4 transition-all duration-300 hover:translate-y-[-2px]">
          Por esto, somos un equipo de psicólogos clínicos que nos hemos especializado en el tratamiento del trauma, principalmente mediante la terapia EMDR (Eye Movement Desensitization and Reprocessing), como también desde la Hipnosis Clínica, EFT (Emotional Freedom Techniques – Tapping), Modelo PARCUVE, con enfoque de Apego, Trauma y Disociación, y Written Exposure Therapy for PTSD.
        </p>
        <p class="transition-all duration-300 hover:translate-y-[-2px]">
          EMDR es una terapia de tercera generación, basada en evidencia, que utiliza la estimulación bilateral del cerebro para procesar y desactivar las memorias traumáticas, permitiendo así la recuperación emocional y la restauración de la identidad. Con el EMDR podrás liberarte del pasado, vivir el presente y proyectarte al futuro con confianza y esperanza. Te invitamos a conocer más sobre esta psicoterapia basada en neurociencias y solicitar una sesión con nosotros.
        </p>
      </div>
    </div>
  </section>

  <!-- Sección con gradiente y listas -->
  <div class="relative overflow-x-hidden">
    <!-- Curvatura en la parte superior -->
    <div class="absolute top-0 left-0 w-full h-24 overflow-hidden" style="z-index: 1;">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 200" preserveAspectRatio="none" class="absolute -top-1 w-full h-full">
        <path fill="#030D550D" d="M0,32L80,37.3C160,43,320,53,480,48C640,43,800,21,960,16C1120,11,1280,21,1360,26.7L1440,32L1440,0L1360,0C1280,0,1120,0,960,0C800,0,640,0,480,0C320,0,160,0,80,0L0,0Z"></path>
      </svg>
    </div>

    <section class="relative py-16" style="background: linear-gradient(180deg, rgba(171, 39, 122, 0.48) 0%, rgba(3, 13, 85, 0.48) 61%);">
      <!-- Imagen de fondo con opacidad -->
      <div class="absolute inset-0 z-0">
        <img src="{{ get_theme_file_uri('resources/images/vector1.png') }}" alt="Fondo" class="w-full h-full object-cover opacity-50">
      </div>

      <div class="container mx-auto px-4 relative z-10 pt-10">
        <div class="flex flex-col md:flex-row justify-between gap-8">
          <!-- Primera columna: Patologías con base traumática -->
          <div class="bg-white/90 p-6 md:p-8 rounded-3xl shadow-lg md:w-1/2 transition-all duration-500 hover:bg-white hover:shadow-xl hover:-translate-y-2" data-aos="fade-right" data-aos-duration="600">
            <h3 class="text-xl md:text-2xl font-semibold text-center text-[#AB277A] mb-6 transition-all duration-300 hover:text-[#030D55] font-paytone">
              Entre las patologías con base traumática que tratamos se encuentran:
            </h3>
            <ul class="list-disc pl-5 text-[#030D55] space-y-2">
              <li class="transition-all duration-300 hover:translate-x-1" data-aos="fade-up" data-aos-duration="400" data-aos-delay="100">Trastorno por estrés postraumático (TEPT)</li>
              <li class="transition-all duration-300 hover:translate-x-1" data-aos="fade-up" data-aos-duration="400" data-aos-delay="150">Trastornos disociativos (TID)</li>
              <li class="transition-all duration-300 hover:translate-x-1" data-aos="fade-up" data-aos-duration="400" data-aos-delay="200">Trauma complejo (TEPC)</li>
              <li class="transition-all duration-300 hover:translate-x-1" data-aos="fade-up" data-aos-duration="400" data-aos-delay="250">Trastorno límite de la personalidad (TLP)</li>
              <li class="transition-all duration-300 hover:translate-x-1" data-aos="fade-up" data-aos-duration="400" data-aos-delay="300">Trastorno obsesivo compulsivo (TOC)</li>
              <li class="transition-all duration-300 hover:translate-x-1" data-aos="fade-up" data-aos-duration="400" data-aos-delay="350">Trastornos de la conducta alimentaria (TCA)</li>
              <li class="transition-all duration-300 hover:translate-x-1" data-aos="fade-up" data-aos-duration="400" data-aos-delay="400">Trastornos psicosomáticos, conversivo.</li>
              <li class="transition-all duration-300 hover:translate-x-1" data-aos="fade-up" data-aos-duration="400" data-aos-delay="450">Depresión</li>
              <li class="transition-all duration-300 hover:translate-x-1" data-aos="fade-up" data-aos-duration="400" data-aos-delay="500">Ansiedad</li>
              <li class="transition-all duration-300 hover:translate-x-1" data-aos="fade-up" data-aos-duration="400" data-aos-delay="550">Crisis de Pánico</li>
              <li class="transition-all duration-300 hover:translate-x-1" data-aos="fade-up" data-aos-duration="400" data-aos-delay="600">Fobias (Miedo a hablar en público, a volar, conducir, tragar alimentos, dentista, etc.).</li>
            </ul>
          </div>

          <!-- Segunda columna: Otros traumas o malestares -->
          <div class="bg-white/90 p-6 md:p-8 rounded-3xl shadow-lg md:w-1/2 transition-all duration-500 hover:bg-white hover:shadow-xl hover:-translate-y-2" data-aos="fade-left" data-aos-duration="600">
            <h3 class="text-xl md:text-2xl font-semibold text-center text-[#AB277A] mb-6 transition-all duration-300 hover:text-[#030D55] font-paytone">
              Otro tipo de traumas o malestares psicológicos
            </h3>
            <ul class="list-disc pl-5 text-[#030D55] space-y-2">
              <li class="transition-all duration-300 hover:translate-x-1" data-aos="fade-up" data-aos-duration="400" data-aos-delay="100">Abuso sexual</li>
              <li class="transition-all duration-300 hover:translate-x-1" data-aos="fade-up" data-aos-duration="400" data-aos-delay="150">Violencia de género y violencia intrafamiliar</li>
              <li class="transition-all duration-300 hover:translate-x-1" data-aos="fade-up" data-aos-duration="400" data-aos-delay="200">Bullying (acoso escolar)</li>
              <li class="transition-all duration-300 hover:translate-x-1" data-aos="fade-up" data-aos-duration="400" data-aos-delay="250">Mobbing (acoso laboral)</li>
              <li class="transition-all duration-300 hover:translate-x-1" data-aos="fade-up" data-aos-duration="400" data-aos-delay="300">Descontrol de impulsos</li>
              <li class="transition-all duration-300 hover:translate-x-1" data-aos="fade-up" data-aos-duration="400" data-aos-delay="350">Duelos traumáticos</li>
              <li class="transition-all duration-300 hover:translate-x-1" data-aos="fade-up" data-aos-duration="400" data-aos-delay="400">Baja Autoestima e inseguridad</li>
              <li class="transition-all duration-300 hover:translate-x-1" data-aos="fade-up" data-aos-duration="400" data-aos-delay="450">Problemas para relacionarse</li>
              <li class="transition-all duration-300 hover:translate-x-1" data-aos="fade-up" data-aos-duration="400" data-aos-delay="500">Creencias negativas o limitantes</li>
              <li class="transition-all duration-300 hover:translate-x-1" data-aos="fade-up" data-aos-duration="400" data-aos-delay="550">Exceso de control</li>
              <li class="transition-all duration-300 hover:translate-x-1" data-aos="fade-up" data-aos-duration="400" data-aos-delay="600">Angustia a rendir examen de grado</li>
              <li class="transition-all duration-300 hover:translate-x-1" data-aos="fade-up" data-aos-duration="400" data-aos-delay="650">Estrés laboral</li>
            </ul>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- Primer Testimonio -->
  <section class="bg-white py-16 relative overflow-x-hidden">
    <div class="container mx-auto px-4">
      <div class="flex flex-col md:flex-row gap-16 items-center max-w-6xl mx-auto">
        <!-- Texto del testimonio a la izquierda -->
        <div class="md:w-4/9 order-2 md:order-1" data-aos="fade-right" data-aos-duration="600">
          <h4 class="text-center text-2xl font-extrabold text-[#AB277A] mb-4 transition-all duration-500 hover:text-[#030D55] font-paytone">
            Trabajemos en tu disociación   
          </h4>
          <p class="text-center text-base leading-7 text-[#030D55] mb-4 transition-all duration-300 hover:translate-y-[-2px]">
          El video aborda la disociación como respuesta a traumas, explicando sus efectos y cómo la psicoterapia EMDR puede ayudar a reconectar contigo mismo y liderar tu vida con apoyo profesional.
          </p>
        </div>
        
        <!-- Video a la derecha -->
        <div class="md:w-5/9 order-1 md:order-2" data-aos="fade-left" data-aos-duration="600">
          <div style="border-radius: 16px; overflow: hidden; box-shadow: 0px 4px 16px 0px #AB277A; border: 4px solid white;" class="transition-transform duration-500 hover:scale-105">
            <iframe class="w-full aspect-video" src="https://www.youtube.com/embed/9z6mAyHNQVI" title="Testimonio de Lorena López" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Segundo Testimonio - Fernando Torres -->
  <section class="bg-white pb-20 relative overflow-x-hidden">
    <div class="container mx-auto px-4 py-12">
      <div class="flex flex-col md:flex-row gap-16 items-center max-w-6xl mx-auto">
        <!-- Video a la izquierda -->
        <div class="md:w-5/9" data-aos="fade-right" data-aos-duration="600">
          <div style="border-radius: 16px; overflow: hidden; box-shadow: 0px 4px 16px 0px #AB277A; border: 4px solid white;" class="transition-transform duration-500 hover:scale-105">
            <iframe class="w-full aspect-video" src="https://www.youtube.com/embed/miE8HNudwsM" title="Testimonio de Fernando Torres" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
        </div>
        
        <!-- Texto del testimonio a la derecha -->
        <div class="md:w-3/9" data-aos="fade-left" data-aos-duration="600">
          <h4 class="text-center md:text-right text-2xl font-extrabold text-[#AB277A] mb-4 transition-all duration-500 hover:text-[#030D55] font-paytone">
            Juntas podemos superar el abuso
          </h4>
          <p class="text-center text-base leading-7 text-[#030D55] mb-4 transition-all duration-300 hover:translate-y-[-2px]">
          El video aborda el dolor del abuso, ofreciendo apoyo profesional con psicoterapia EMDR para superar el trauma y recuperar bienestar emocional.
          </p>
        </div>
      </div>
    </div>
  </section>
  <!-- Primer Testimonio - Lorena López -->
  <section class="bg-white py-16 relative overflow-x-hidden">
    <div class="container mx-auto px-4">
      <div class="flex flex-col md:flex-row gap-16 items-center max-w-6xl mx-auto">
        <!-- Texto del testimonio a la izquierda -->
        <div class="md:w-4/9 order-2 md:order-1" data-aos="fade-right" data-aos-duration="600">
          <h4 class="text-center text-2xl font-extrabold text-[#AB277A] mb-4 transition-all duration-500 hover:text-[#030D55] font-paytone">
            La mala suerte en el amor no existe, es trauma. Trabajemos juntos con EMDR.
          </h4>
          <p class="text-center text-base leading-7 text-[#030D55] mb-4 transition-all duration-300 hover:translate-y-[-2px]">
          Superar patrones dañinos en el amor es posible trabajando traumas pasados con psicoterapia EMDR para abrirse a relaciones saludables..
          </p>
        </div>
        
        <!-- Video a la derecha -->
        <div class="md:w-5/9 order-1 md:order-2" data-aos="fade-left" data-aos-duration="600">
          <div style="border-radius: 16px; overflow: hidden; box-shadow: 0px 4px 16px 0px #AB277A; border: 4px solid white;" class="transition-transform duration-500 hover:scale-105">
            <iframe class="w-full aspect-video" src="https://www.youtube.com/embed/nnW-a80PBMg" title="Testimonio de Lorena López" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Segundo Testimonio - Fernando Torres -->
  <section class="bg-white pb-10 relative overflow-x-hidden">
    <div class="container mx-auto px-4 py-12">
      <div class="flex flex-col md:flex-row gap-16 items-center max-w-6xl mx-auto">
        <!-- Video a la izquierda -->
        <div class="md:w-5/9" data-aos="fade-right" data-aos-duration="600">
          <div style="border-radius: 16px; overflow: hidden; box-shadow: 0px 4px 16px 0px #AB277A; border: 4px solid white;" class="transition-transform duration-500 hover:scale-105">
            <iframe class="w-full aspect-video" src="https://www.youtube.com/embed/EiXm9E8jqwM" title="Testimonio de Fernando Torres" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
        </div>
        
        <!-- Texto del testimonio a la derecha -->
        <div class="md:w-3/9" data-aos="fade-left" data-aos-duration="600">
          <h4 class="text-center md:text-right text-2xl font-extrabold text-[#AB277A] mb-4 transition-all duration-500 hover:text-[#030D55] font-paytone">
            Con EMDR, trabajemos juntos en tus miedos y traumas
          </h4>
          <p class="text-center text-base leading-7 text-[#030D55] mb-4 transition-all duration-300 hover:translate-y-[-2px]">
          Supera tus miedos y traumas con psicoterapia EMDR, sanando heridas del pasado, aprendiendo herramientas útiles y mejorando tu vida de manera duradera.
          </p>
        </div>
      </div>
    </div>
  </section>

  <section class="bg-white py-16 mb-5 overflow-x-hidden">
    <div class="container mx-auto px-4 max-w-3xl">
      <!-- Contenido centrado con línea vertical -->
      <div class="relative flex flex-col items-center text-center" data-aos="fade-up" data-aos-duration="600">
        
        <h3 class="text-xl md:text-2xl font-bold text-[#030D55] mb-6 text-center transition-all duration-500 hover:text-[#AB277A] font-paytone">
          Atención de emergencia:
        </h3>
        
        <p class="text-base leading-7 max-w-xl bg-white px-4 relative z-10 transition-all duration-300 hover:translate-y-[-2px]">
          Abordamos situaciones de emergencia, tales como desastres, catástrofe o delitos a nivel: individual, grupal, familiar o parejas, para empresas e instituciones.
        </p>
      </div>
    </div>
  </section>
@endsection 