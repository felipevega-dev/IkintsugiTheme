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
          
          <!-- Iconos de redes sociales -->
          <div class="flex items-center gap-3 mt-5">
            <p class="text-sm md:text-base text-[#AB277A] font-medium">Síguenos:</p>
            <div class="flex gap-4">
              <a href="https://www.instagram.com/instituto_kintsugi/" target="_blank" class="text-[#AB277A] hover:text-[#030D55] transition-all duration-300 transform hover:scale-110">
                <svg class="h-6 w-6 md:h-7 md:w-7" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                  <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/>
                </svg>
              </a>
              <a href="https://www.facebook.com/Ikintsugi/" target="_blank" class="text-[#AB277A] hover:text-[#030D55] transition-all duration-300 transform hover:scale-110">
                <svg class="h-6 w-6 md:h-7 md:w-7" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                  <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd"></path>
                </svg>
              </a>
              <a href="https://www.youtube.com/@emisorkintsugi" target="_blank" class="text-[#AB277A] hover:text-[#030D55] transition-all duration-300 transform hover:scale-110">
                <svg class="h-6 w-6 md:h-7 md:w-7" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                  <path fill-rule="evenodd" d="M19.812 5.418c.861.23 1.538.907 1.768 1.768C21.998 8.746 22 12 22 12s0 3.255-.418 4.814a2.504 2.504 0 0 1-1.768 1.768c-1.56.419-7.814.419-7.814.419s-6.255 0-7.814-.419a2.505 2.505 0 0 1-1.768-1.768C2 15.255 2 12 2 12s0-3.255.417-4.814a2.507 2.507 0 0 1 1.768-1.768C5.744 5 11.998 5 11.998 5s6.255 0 7.814.418ZM15.194 12 10 15V9l5.194 3Z" clip-rule="evenodd" />
                </svg>
              </a>
              <a href="https://open.spotify.com/show/08J06mjqK1UxNgXPTVlMkJ?nd=1&dlsi=74d83d61fb964b4a" target="_blank" class="text-[#AB277A] hover:text-[#030D55] transition-all duration-300 transform hover:scale-110">
                <svg class="h-6 w-6 md:h-7 md:w-7" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                  <path d="M12 0C5.4 0 0 5.4 0 12s5.4 12 12 12 12-5.4 12-12S18.66 0 12 0zm5.521 17.34c-.24.359-.66.48-1.021.24-2.82-1.74-6.36-2.101-10.561-1.141-.418.122-.779-.179-.899-.539-.12-.421.18-.78.54-.9 4.56-1.021 8.52-.6 11.64 1.32.42.18.479.659.301 1.02zm1.44-3.3c-.301.42-.841.6-1.262.3-3.239-1.98-8.159-2.58-11.939-1.38-.479.12-1.02-.12-1.14-.6-.12-.48.12-1.021.6-1.141C9.6 9.9 15 10.561 18.72 12.84c.361.181.54.78.241 1.2zm.12-3.36C15.24 8.4 8.82 8.16 5.16 9.301c-.6.179-1.2-.181-1.38-.721-.18-.601.18-1.2.72-1.381 4.26-1.26 11.28-1.02 15.721 1.621.539.3.719 1.02.419 1.56-.299.421-1.02.599-1.559.3z"/>
                </svg>
              </a>
            </div>
          </div>
        </div>
        
        <!-- Imagen a la derecha con fondo morado -->
        <div class="lg:w-1/2 flex justify-center lg:justify-end relative lg:mt-10" data-aos="fade-left" data-aos-duration="600">
          <div class="relative w-full max-w-[800px] mx-auto">
            <div class="relative">
              <!-- Imagen actual -->
              <img 
                src="{{ get_theme_file_uri('resources/images/heros/transtornos.png') }}" 
                alt="Mujer en terapia" 
                class="relative z-10 w-full h-auto transition-transform duration-500 hover:scale-105"
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