{{--
  Template Name: Transtornos
--}}

@extends('layouts.app')

@section('content')
  <!-- HERO SECTION (antes en hero.blade.php) -->
  <section class="relative bg-white py-25 overflow-hidden">
    <div class="container mx-auto px-4 relative z-10">
      <div class="flex flex-col md:flex-row items-center justify-center gap-8">
        <!-- Texto del lado izquierdo con más margen a la derecha --> 
        <div class="md:w-3/6 mb-10 md:mb-0 mt-10" data-aos="fade-right" data-aos-duration="600">
          <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-4 text-[#030D55] transition-all duration-500 hover:text-[#AB277A]" style="font-family: 'Playfair Display', serif; line-height: 1.1;">
            Testimonios que<br>inspiran: La<br>sanación es posible
          </h1>
          
          <p class="text-4xl mt-14 text-[#AB277A] transition-all duration-300 hover:translate-x-2" style="font-family: 'Hugamour', sans-serif;">
            #El trauma se puede superar
          </p>
        </div>
        
        <!-- Imagen del lado derecho con más margen a la derecha -->
        <div class="md:w-2/5 md:ml-0" data-aos="fade-left" data-aos-duration="600">
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
              <div class="absolute inset-12 overflow-hidden rounded-full border-2 border-white transition-transform duration-500 hover:shadow-lg">
                <img src="{{ get_theme_file_uri('resources/images/transtornos1.png') }}" alt="Mujer en terapia" class="w-full h-full object-cover transition-transform duration-700 hover:scale-110">
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

  <!-- Sección: Trastornos y malestares que atendemos -->
  <section class="relative py-16 overflow-hidden bg-[#030D550D]">
    <div class="container mx-auto px-4 relative z-10">
      <!-- Título principal centrado -->
      <h2 class="text-4xl md:text-5xl font-bold text-center text-[#030D55] mb-12 transition-all duration-500 hover:text-[#AB277A]" style="font-family: 'Playfair Display', serif;" data-aos="fade-up" data-aos-duration="600">
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
  <div class="relative">
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
            <h3 class="text-xl md:text-2xl font-semibold text-center text-[#AB277A] mb-6 transition-all duration-300 hover:text-[#030D55]" style="font-family: 'Playfair Display', serif;">
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
            <h3 class="text-xl md:text-2xl font-semibold text-center text-[#AB277A] mb-6 transition-all duration-300 hover:text-[#030D55]" style="font-family: 'Playfair Display', serif;">
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
  <section class="bg-white py-16 relative">
    <div class="container mx-auto px-4">
      <div class="flex flex-col md:flex-row gap-16 items-center max-w-6xl mx-auto">
        <!-- Texto del testimonio a la izquierda -->
        <div class="md:w-4/9 order-2 md:order-1" data-aos="fade-right" data-aos-duration="600">
          <h4 class="text-center text-2xl font-extrabold text-[#AB277A] mb-4 transition-all duration-500 hover:text-[#030D55]" style="font-family: 'Playfair Display', serif; line-height: 100%;">Trabajemos en tu disociación   </h4>
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
  <section class="bg-white pb-20 relative">
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
          <h4 class="text-center md:text-right text-2xl font-extrabold text-[#AB277A] mb-4 transition-all duration-500 hover:text-[#030D55]" style="font-family: 'Playfair Display', serif; line-height: 100%;">Juntas podemos superar el abuso</h4>
          <p class="text-center text-base leading-7 text-[#030D55] mb-4 transition-all duration-300 hover:translate-y-[-2px]">
          El video aborda el dolor del abuso, ofreciendo apoyo profesional con psicoterapia EMDR para superar el trauma y recuperar bienestar emocional.
          </p>
        </div>
      </div>
    </div>
  </section>
  <!-- Primer Testimonio - Lorena López -->
  <section class="bg-white py-16 relative">
    <div class="container mx-auto px-4">
      <div class="flex flex-col md:flex-row gap-16 items-center max-w-6xl mx-auto">
        <!-- Texto del testimonio a la izquierda -->
        <div class="md:w-4/9 order-2 md:order-1" data-aos="fade-right" data-aos-duration="600">
          <h4 class="text-center text-2xl font-extrabold text-[#AB277A] mb-4 transition-all duration-500 hover:text-[#030D55]" style="font-family: 'Playfair Display', serif; line-height: 100%;">La mala suerte en el amor no existe, es trauma. Trabajemos juntos con EMDR.</h4>
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
  <section class="bg-white pb-10 relative">
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
          <h4 class="text-center md:text-right text-2xl font-extrabold text-[#AB277A] mb-4 transition-all duration-500 hover:text-[#030D55]" style="font-family: 'Playfair Display', serif; line-height: 100%;">Con EMDR, trabajemos juntos en tus miedos y traumas</h4>
          <p class="text-center text-base leading-7 text-[#030D55] mb-4 transition-all duration-300 hover:translate-y-[-2px]">
          Supera tus miedos y traumas con psicoterapia EMDR, sanando heridas del pasado, aprendiendo herramientas útiles y mejorando tu vida de manera duradera.
          </p>
        </div>
      </div>
    </div>
  </section>

  <section class="bg-white py-16 mb-5">
    <div class="container mx-auto px-4 max-w-3xl">
      <!-- Contenido centrado con línea vertical -->
      <div class="relative flex flex-col items-center text-center" data-aos="fade-up" data-aos-duration="600">
        
        <h4 class="text-3xl font-bold mb-6 bg-white px-4 relative z-10 transition-all duration-500 hover:text-[#AB277A]" style="font-family: 'Playfair Display', serif;">
          Atención de emergencia:
        </h4>
        
        <p class="text-base leading-7 max-w-xl bg-white px-4 relative z-10 transition-all duration-300 hover:translate-y-[-2px]">
          Abordamos situaciones de emergencia, tales como desastres, catástrofe o delitos a nivel: individual, grupal, familiar o parejas, para empresas e instituciones.
        </p>
      </div>
    </div>
  </section>
@endsection 