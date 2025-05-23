{{--
  Template Name: FAQ
--}}

@extends('layouts.app')

@section('content')
<style>
  .page-template-faq {
    padding-top: 0 !important;
  }
</style>
  <!-- Hero Section con fondo blanco y figura morada alrededor de la foto -->
  <section class="relative bg-white overflow-x-hidden">
    <!-- Contenido del hero -->
    <div class="container mx-auto px-4 py-12 lg:py-28 relative z-10">
      <div class="flex flex-col lg:flex-row items-center">
        <!-- Columna de texto -->
        <div class="lg:w-1/2 mb-12 lg:mb-12" data-aos="fade-right" data-aos-duration="600">
          <span class="text-[#AB277A] text-sm md:text-base uppercase tracking-wider font-medium mb-4 block">Preguntas frecuentes</span>
          <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-[#030D55] mb-6 md:mb-8 leading-none transition-all duration-500 hover:text-[#AB277A] font-paytone" style="line-height: 1.1;">
            Te ayudamos a <br> resolver tus dudas
          </h1>
          <p class="text-2xl md:text-4xl text-[#AB277A] mt-6 transition-all duration-300 hover:translate-x-2" style="font-family: 'Hugamour', sans-serif;">
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
                src="{{ get_theme_file_uri('resources/images/heros/faq.png') }}" 
                alt="Preguntas frecuentes" 
                class="relative z-10 w-full h-auto transition-transform duration-500 hover:scale-105"
              >
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- FAQs Section -->
  <section class="bg-white relative mb-20 pt-8 md:pt-12">
    <div class="container mx-auto px-4 relative">
      <!-- Section title -->
      <h2 class="text-2xl md:text-4xl lg:text-5xl font-bold text-[#030D55] mb-12 md:mb-16 text-center font-paytone">
        FAQ's
      </h2>
      
      <!-- FAQs Container with decorations -->
      <div class="relative max-w-[650px] mx-auto">
        <!-- Decorative image left -->
        <div class="absolute -left-40 top-1/2 transform -translate-y-1/2 hidden md:block">
          <img src="{{ get_theme_file_uri('resources/images/deco1.png') }}" alt="Decorative Element" class="w-40">
        </div>
        
        <!-- Decorative image right -->
        <div class="absolute -right-28 top-2/6 transform -translate-y-1/2 hidden md:block">
          <img src="{{ get_theme_file_uri('resources/images/deco2.png') }}" alt="Decorative Element" class="w-40">
        </div>
        
        <!-- FAQ Items -->
        <div class="space-y-4 md:space-y-6">
          <!-- FAQ Item 1 -->
          <div class="faq-item overflow-hidden w-full faq-gradient-border" style="max-width: 625px;">
            <button class="faq-question w-full flex justify-between items-center p-3 md:p-4 text-left bg-white hover:bg-gray-50 transition-colors duration-200" onclick="toggleFaq(this)">
              <h3 class="text-[#030D55] font-bold text-xl md:text-[24px] leading-[100%] pr-4 font-roboto">¿Cómo saber si necesito psicoterapia?</h3>
              <div class="arrow-icon w-5 md:w-6 h-5 md:h-6 flex-shrink-0 flex items-center justify-center transform transition-transform duration-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 md:h-6 w-5 md:w-6 text-[#FF3382]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
              </div>
            </button>
            <div class="faq-answer hidden bg-[#FFF3FF8F] p-3 md:p-4 transition-all duration-700 ease-out" style="max-height: 0; overflow: hidden;">
            <p class="font-roboto font-normal text-sm md:text-[16px] leading-6 md:leading-[28px] text-[#181818]">
                Si consideras que han ocurrido sucesos a lo largo de tu vida que de una forma u otra te mantienen anclado al pasado y no te dejan progresar, el abordaje EMDR te puede resultar de gran ayuda.
              </p>
              <p class="mt-4 font-roboto font-normal text-sm md:text-[16px] leading-6 md:leading-[28px] text-[#181818]">
              Por otra parte, en muchas ocasiones hay pacientes que no consiguen identificar de donde le vienen sus dificultades e, igualmente, no consiguen alcanzar el nivel de bienestar que les gustaría. También para estos pacientes está recomendada la terapia EMDR, puesto que a través de las dificultades que una persona tiene en el presente, es posible con la ayuda del terapeuta liberar la mente para identificar aquellos eventos asociados y así poder trabajar con ellos.
              </p>
              <p class="mt-4 font-roboto font-normal text-sm md:text-[16px] leading-6 md:leading-[28px] text-[#181818]">
              Igualmente, si no duerme bien desde hace tiempo, si tiene mal humor continuo, cansancio crónico sin base orgánica, si no puede dejar de utilizar internet cuando está solo o aburrido, incluso si tiene problemas en la comunicación, si se muestra competitivo cuando conduce, si está ansioso, si se siente atrapado en las relaciones, si las relaciones no funcionan, si juega compulsivamente, si se le olvidan las cosas con frecuencia, si está "como ido", etc., en todos estos casos se puede beneficiar de un tratamiento con EMDR.
              </p>
            </div>
          </div>
          
          <!-- FAQ Item 2 -->
          <div class="faq-item overflow-hidden w-full faq-gradient-border" style="max-width: 625px;">
            <button class="faq-question w-full flex justify-between items-center p-3 md:p-4 text-left bg-white hover:bg-gray-50 transition-colors duration-200" onclick="toggleFaq(this)">
              <h3 class="text-[#030D55] font-bold text-xl md:text-[24px] leading-[100%] pr-4 font-roboto">Con EMDR, ¿los recuerdos se olvidan?</h3>
              <div class="arrow-icon w-5 md:w-6 h-5 md:h-6 flex-shrink-0 flex items-center justify-center transform transition-transform duration-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 md:h-6 w-5 md:w-6 text-[#FF3382]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
              </div>
            </button>
            <div class="faq-answer hidden bg-[#FFF3FF8F] p-3 md:p-4 transition-all duration-700 ease-out" style="max-height: 0; overflow: hidden;">
              <p class="font-roboto font-normal text-sm md:text-[16px] leading-6 md:leading-[28px] text-[#181818]">
              Los recuerdos no se olvidan. Con EMDR los recuerdos o experiencias traumáticas pierden carga negativa emocional, cognitiva y sensorial, es decir, dejan de generar un malestar. Se refuerzan las experiencias adaptativas y funcionales, incrementando su percepción positiva. Y en la medida que se avanza en la terapia con EMDR, muchos recuerdos agradables y desagradables, que se creían ya olvidados comienzan a aflorar permitiendo que se trabaje con ellos.
              </p>
            </div>
          </div>

          <!-- FAQ Item 3 -->
          <div class="faq-item overflow-hidden w-full faq-gradient-border" style="max-width: 625px;" data-aos="fade-up" data-aos-duration="500" data-aos-delay="75">
            <button class="faq-question w-full flex justify-between items-center p-3 md:p-4 text-left bg-white hover:bg-gray-50 transition-colors duration-200" onclick="toggleFaq(this)">
              <h3 class="text-[#030D55] font-bold text-xl md:text-[24px] leading-[100%] pr-4 font-roboto">¿La atención se puede reembolsar en la Isapre?</h3>
              <div class="arrow-icon w-5 md:w-6 h-5 md:h-6 flex-shrink-0 flex items-center justify-center transform transition-transform duration-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 md:h-6 w-5 md:w-6 text-[#FF3382]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
              </div>
            </button>
            <div class="faq-answer hidden bg-[#FFF3FF8F] p-3 md:p-4 transition-all duration-700 ease-out" style="max-height: 0; overflow: hidden;">
              <p class="font-roboto font-normal text-sm md:text-[16px] leading-6 md:leading-[28px] text-[#181818]">
                Si, con la boleta podrás reembolsar cada una de las sesiones en la Isapre y/o seguro médico.</p>
              <p class="font-roboto font-normal text-sm md:text-[16px] leading-6 md:leading-[28px] text-[#181818] mt-4">El monto a reembolsar dependerá del plan que usted tenga en la Isapre y/o del seguro médico. Por favor, consulte directamente con su prestador.
              </p>
            </div>
          </div>
          
          <!-- FAQ Item 4 -->
          <div class="faq-item overflow-hidden w-full faq-gradient-border" style="max-width: 625px;">
            <button class="faq-question w-full flex justify-between items-center p-3 md:p-4 text-left bg-white hover:bg-gray-50 transition-colors duration-200" onclick="toggleFaq(this)">
              <h3 class="text-[#030D55] font-bold text-xl md:text-[24px] leading-[100%] pr-4 font-roboto">¿Quienes pueden atenderse con EMDR?</h3>
              <div class="arrow-icon w-5 md:w-6 h-5 md:h-6 flex-shrink-0 flex items-center justify-center transform transition-transform duration-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 md:h-6 w-5 md:w-6 text-[#FF3382]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
              </div>
            </button>
            <div class="faq-answer hidden bg-[#FFF3FF8F] p-3 md:p-4 transition-all duration-700 ease-out" style="max-height: 0; overflow: hidden;">
              <p class="font-roboto font-normal text-sm md:text-[16px] leading-6 md:leading-[28px] text-[#181818]">
              El tratamiento con EMDR puede ser aplicado desde niños a adultos sin restricción de edad. En Kintsugi atendemos desde los 14 años hacia arriba.
              </p>
            </div>
          </div>  
          
          <!-- FAQ Item 5 -->
          <div class="faq-item overflow-hidden w-full faq-gradient-border" style="max-width: 625px;">
            <button class="faq-question w-full flex justify-between items-center p-3 md:p-4 text-left bg-white hover:bg-gray-50 transition-colors duration-200" onclick="toggleFaq(this)">
              <h3 class="text-[#030D55] font-bold text-xl md:text-[24px] leading-[100%] pr-4 font-roboto">¿Cuánto dura el tratamiento psicológico EMDR?</h3>
              <div class="arrow-icon w-5 md:w-6 h-5 md:h-6 flex-shrink-0 flex items-center justify-center transform transition-transform duration-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 md:h-6 w-5 md:w-6 text-[#FF3382]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
              </div>
            </button>
            <div class="faq-answer hidden bg-[#FFF3FF8F] p-3 md:p-4 transition-all duration-700 ease-out" style="max-height: 0; overflow: hidden;">
              <p class="font-roboto font-normal text-sm md:text-[16px] leading-6 md:leading-[28px] text-[#181818]">
              La duración del tratamiento con EMDR varía en función de los niveles o intensidad de malestar o perturbación, síntomas, historial de situaciones traumáticas vividas, trastorno psiquiátrico y la propia subjetividad del paciente.</p>
              <p class="font-roboto font-normal text-sm md:text-[16px] leading-6 md:leading-[28px] text-[#181818] mt-4">Sin embargo, para casos de Trastorno de estrés post traumático (TEPT) ocasionado por UN evento traumático concreto, hace menos de 3 meses, tales como: un portonazo, un accidente, catástrofe, un duelo, u otras situaciones similares. Sin que exista traumas similares no resueltos con anterioridad, con la terapia con EMDR, se puede lograr evidente mejoría o al menos reducción de los síntomas más intensos, en un proceso psicoterapéutico de 4 a 12 sesiones.  Esto es referencial, ya que cada persona es un mundo que ofrece particularidades que intervendrá en el proceso.</p>
            </div>
          </div>
          
          <!-- FAQ Item 6 -->
          <div class="faq-item overflow-hidden w-full faq-gradient-border" style="max-width: 625px;">
            <button class="faq-question w-full flex justify-between items-center p-3 md:p-4 text-left bg-white hover:bg-gray-50 transition-colors duration-200" onclick="toggleFaq(this)">
              <h3 class="text-[#030D55] font-bold text-xl md:text-[24px] leading-[100%] pr-4 font-roboto">¿Qué duración tienen las sesiones?</h3>
              <div class="arrow-icon w-5 md:w-6 h-5 md:h-6 flex-shrink-0 flex items-center justify-center transform transition-transform duration-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 md:h-6 w-5 md:w-6 text-[#FF3382]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
              </div>
            </button>
            <div class="faq-answer hidden bg-[#FFF3FF8F] p-3 md:p-4 transition-all duration-700 ease-out" style="max-height: 0; overflow: hidden;">
              <p class="font-roboto font-normal text-sm md:text-[16px] leading-6 md:leading-[28px] text-[#181818]">
              Cada sesión EMDR tiene una duración aproximada de 45 minutos.
              </p>
            </div>
          </div>
          
          <!-- FAQ Item 7 -->
          <div class="faq-item overflow-hidden w-full faq-gradient-border" style="max-width: 625px;">
            <button class="faq-question w-full flex justify-between items-center p-3 md:p-4 text-left bg-white hover:bg-gray-50 transition-colors duration-200" onclick="toggleFaq(this)">
              <h3 class="text-[#030D55] font-bold text-xl md:text-[24px] leading-[100%] pr-4 font-roboto">¿Cada cuánto tiempo se hace una sesión?</h3>
              <div class="arrow-icon w-5 md:w-6 h-5 md:h-6 flex-shrink-0 flex items-center justify-center transform transition-transform duration-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 md:h-6 w-5 md:w-6 text-[#FF3382]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
              </div>
            </button>
            <div class="faq-answer hidden bg-[#FFF3FF8F] p-3 md:p-4 transition-all duration-700 ease-out" style="max-height: 0; overflow: hidden;">
              <p class="font-roboto font-normal text-sm md:text-[16px] leading-6 md:leading-[28px] text-[#181818]">
              El proceso de Psicoterapia EMDR conlleva la realización de una sesión por semana. De este modo, logramos establecer un vínculo terapéutico, mediado por la confianza, estabilidad y seguridad emocional que nos permite ir poco a poco sentando las bases emocionales protegidas para abordar los episodios dolorosos y angustiantes que se han vivenciado, con la certeza que podremos continuar la siguiente semana.
              </p>
              <p class="mt-4 font-roboto font-normal text-sm md:text-[16px] leading-6 md:leading-[28px] text-[#181818]">
              En fase de seguimiento, es decir ad portas del alta psicoterapéutica, las sesiones se podrán realizar cada 15 días, luego cada dos o más meses, hasta el alta psicoterapéutica, según sea el caso.
              </p>
            </div>
          </div>
          
          <!-- FAQ Item 8 -->
          <div class="faq-item overflow-hidden w-full faq-gradient-border" style="max-width: 625px;">
            <button class="faq-question w-full flex justify-between items-center p-3 md:p-4 text-left bg-white hover:bg-gray-50 transition-colors duration-200" onclick="toggleFaq(this)">
              <h3 class="text-[#030D55] font-bold text-xl md:text-[24px] leading-[100%] pr-4 font-roboto">¿Cómo me puede ayudar EMDR?</h3>
              <div class="arrow-icon w-5 md:w-6 h-5 md:h-6 flex-shrink-0 flex items-center justify-center transform transition-transform duration-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 md:h-6 w-5 md:w-6 text-[#FF3382]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
              </div>
            </button>
            <div class="faq-answer hidden bg-[#FFF3FF8F] p-3 md:p-4 transition-all duration-700 ease-out" style="max-height: 0; overflow: hidden;">
              <p class="font-roboto font-bold text-sm md:text-[16px] leading-6 md:leading-[28px] text-[#181818]">
              Desde las vivencias dolorosas explícitas
              </p>
              <p class="mt-4 font-roboto font-normal text-sm md:text-[16px] leading-6 md:leading-[28px] text-[#181818]">
              Si has experimentado situaciones negativas que han dejado una marca profunda en tu vida, como el maltrato, abuso, violación, bullying, mobbing o encerronas, es posible que, a pesar de haber transcurrido años, continúen afectándote. Pesadillas, flashbacks, angustia y creencias negativas pueden persistir, haciendo que solo la idea de revivir esos recuerdos resulte aterradora.
              </p>
              <p class="mt-4 font-roboto font-normal text-sm md:text-[16px] leading-6 md:leading-[28px] text-[#181818]">
              EMDR te ofrece la posibilidad de reprocesar estos recuerdos dolorosos, disminuyendo su carga emocional y permitiéndote avanzar hacia una vida más tranquila y plena.
              </p>

              <p class="mt-4 font-roboto font-bold text-sm md:text-[16px] leading-6 md:leading-[28px] text-[#181818]">
              Desde los Trastornos 
              </p>
              <p class="mt-4 font-roboto font-normal text-sm md:text-[16px] leading-6 md:leading-[28px] text-[#181818]">
              Si padeces síntomas tales como angustia, tristeza, ira o pensamientos negativos, y sientes que en algunas ocasiones te desconectas, te encuentras perdida o agotada debido a condiciones psiquiátricas (como el trastorno de estrés postraumático, trauma complejo, disociación, ansiedad, crisis de pánico, trastorno límite de la personalidad, depresión, TOC o trastornos alimentarios, entre otros), la psicoterapia EMDR puede ser una herramienta efectiva en tu proceso de recuperación.
              </p>
             
              <p class="mt-4 font-roboto font-bold text-sm md:text-[16px] leading-6 md:leading-[28px] text-[#181818]">
              Desde los Malestares emocionales
              </p>
              <p class="mt-4 font-roboto font-normal text-sm md:text-[16px] leading-6 md:leading-[28px] text-[#181818]">
              Si sufres de malestares psicológicos que incluyen baja autoestima, inseguridad, dificultades para tomar decisiones o creencias negativas y limitantes sobre ti misma y los demás. O sientes que algo te ocurre que impide que puedas tener una vida plena. EMDR puede ayudarte. O sientes que las cosas nunca te salen bien, experimentar culpa constante o tener la sensación de no ser lo suficientemente buena, incluso llegando a complacer en exceso, son patrones que se pueden abordar y transformar con la psicoterapia EMDR.
              </p>

              <p class="mt-4 font-roboto font-bold text-sm md:text-[16px] leading-6 md:leading-[28px] text-[#181818]">
              ¿Qué haremos?
              </p>
              <p class="mt-4 font-roboto font-normal text-sm md:text-[16px] leading-6 md:leading-[28px] text-[#181818]">
              Nuestro trabajo conjunto se basa en tu compromiso, paciencia, constancia y participación hacia una vida mejor. El proceso terapéutico incluye:
              </p>

              <p class="mt-4 font-roboto font-bold text-sm md:text-[16px] leading-6 md:leading-[28px] text-[#181818]">
              Identificación:
              </p>
              <p class="mt-4 font-roboto font-normal text-sm md:text-[16px] leading-6 md:leading-[28px] text-[#181818]">
              Analizaremos los síntomas y los disparadores o gatillantes que afectan tu bienestar.
              </p>

              <p class="mt-4 font-roboto font-bold text-sm md:text-[16px] leading-6 md:leading-[28px] text-[#181818]">
              Exploración de causas:
              </p>
              <p class="mt-4 font-roboto font-normal text-sm md:text-[16px] leading-6 md:leading-[28px] text-[#181818]">
              Investigaremos las raíces de estos problemas, que a menudo se originan en la infancia o juventud.
              </p>

              <p class="mt-4 font-roboto font-bold text-sm md:text-[16px] leading-6 md:leading-[28px] text-[#181818]">
              Plan de intervención:
              </p>
              <p class="mt-4 font-roboto font-normal text-sm md:text-[16px] leading-6 md:leading-[28px] text-[#181818]">
              Diseñaremos un plan personalizado que aborde tanto recuerdos explícitos como implícitos responsables de tu malestar actual.
              </p>

              <p class="mt-4 font-roboto font-bold text-sm md:text-[16px] leading-6 md:leading-[28px] text-[#181818]">
              Desarrollo de recursos:
              </p>
              <p class="mt-4 font-roboto font-normal text-sm md:text-[16px] leading-6 md:leading-[28px] text-[#181818]">
              Evaluaremos tus mecanismos de regulación emocional, tus relaciones interpersonales y estrategias de defensa, para implementar herramientas y recursos que te permitan vivir de manera más equilibrada y satisfactoria.
              </p>
            </div>
          </div>

          <!-- FAQ Item 8 -->
          <div class="faq-item overflow-hidden w-full faq-gradient-border" style="max-width: 625px;">
            <button class="faq-question w-full flex justify-between items-center p-3 md:p-4 text-left bg-white hover:bg-gray-50 transition-colors duration-200" onclick="toggleFaq(this)">
              <h3 class="text-[#030D55] font-bold text-xl md:text-[24px] leading-[100%] pr-4 font-roboto">¿A qué personas atendemos?</h3>
              <div class="arrow-icon w-5 md:w-6 h-5 md:h-6 flex-shrink-0 flex items-center justify-center transform transition-transform duration-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 md:h-6 w-5 md:w-6 text-[#FF3382]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
              </div>
            </button>
            <div class="faq-answer hidden bg-[#FFF3FF8F] p-3 md:p-4 transition-all duration-700 ease-out" style="max-height: 0; overflow: hidden;">
              <p class="font-roboto font-bold text-sm md:text-[16px] leading-6 md:leading-[28px] text-[#181818]">
              Adultos
              </p>
              <p class="mt-4 font-roboto font-normal text-sm md:text-[16px] leading-6 md:leading-[28px] text-[#181818]">
              Atendemos a adultos sobre 25 años, que buscan superar bloqueos emocionales, sanar traumas pasados o afrontar desafíos cotidianos que impiden el buen vivir o el desarrollo adecuado en lo laboral, académico o relacional. Utilizando la terapia EMDR, ayudamos a reprocesar recuerdos dolorosos y a transformar patrones negativos, promoviendo el crecimiento personal, la resiliencia y el bienestar emocional.
              </p>

              <p class="mt-4 font-roboto font-bold text-sm md:text-[16px] leading-6 md:leading-[28px] text-[#181818]">
              Adolescentes
              </p>
              <p class="mt-4 font-roboto font-normal text-sm md:text-[16px] leading-6 md:leading-[28px] text-[#181818]">
              Ofrecemos un espacio seguro y comprensivo para adolescentes mayores de 16 años que buscan activamente mejorar su bienestar emocional. A través de la terapia EMDR, facilitamos el manejo de emociones intensas y la superación de experiencias adversas, fortaleciendo su identidad y autonomía. Esta atención clínica está especialmente diseñada para adolescentes que acuden por su propia voluntad, con el apoyo activo de sus padres disponibles a realizar cambios personales en pro del bienestar de su hija/o, permitiéndoles enfrentar de manera equilibrada y saludable los desafíos propios de su desarrollo de vida.
              </p>

              <p class="mt-4 font-roboto font-bold text-sm md:text-[16px] leading-6 md:leading-[28px] text-[#181818]">
              Adulto Mayor
              </p>
              <p class="mt-4 font-roboto font-normal text-sm md:text-[16px] leading-6 md:leading-[28px] text-[#181818]">
              Apoyamos a adultos mayores que enfrentan transiciones vitales, pérdidas o cambios significativos en su vida. A través de EMDR, trabajamos en el reprocesamiento de experiencias acumuladas, facilitando la adaptación emocional y mejorando la calidad de vida para un envejecimiento activo y pleno.
              </p>

              <p class="mt-4 font-roboto font-bold text-sm md:text-[16px] leading-6 md:leading-[28px] text-[#181818]">
              Parejas
              </p>
              <p class="mt-4 font-roboto font-normal text-sm md:text-[16px] leading-6 md:leading-[28px] text-[#181818]">
              En el ámbito de la terapia de pareja, incorporamos EMDR para identificar y transformar patrones emocionales que afectan la relación. Este enfoque facilita una comunicación más abierta y efectiva, promoviendo el entendimiento mutuo y fortaleciendo la conexión emocional entre los miembros.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <style>
    .faq-gradient-border {
      border: 1px solid;
      border-radius: 0.375rem;
      border-image-source: linear-gradient(180deg, rgba(171, 39, 122, 0.48) 0%, rgba(3, 13, 85, 0.48) 61%);
      border-image-slice: 1;
    }
    
    .faq-answer {
      transition: max-height 600ms ease-out;
    }
  </style>
  
  <!-- JavaScript for toggle functionality -->
  <script>
    function toggleFaq(element) {
      const answer = element.nextElementSibling;
      const arrow = element.querySelector('.arrow-icon');
      
      // Toggle answer visibility with animation
      if (answer.classList.contains('hidden')) {
        // Show answer
        answer.classList.remove('hidden');
        // Use setTimeout to ensure the transition happens after the display change
        setTimeout(function() {
          answer.style.maxHeight = answer.scrollHeight + 'px';
          arrow.style.transform = 'rotate(180deg)';
        }, 10);
      } else {
        // Hide answer - faster animation for closing
        answer.style.maxHeight = '0px';
        arrow.style.transform = 'rotate(0deg)';
        
        // Wait for animation to complete before hiding - reduced time
        setTimeout(function() {
          answer.classList.add('hidden');
        }, 400);
      }
    }
    
    // Initialize all FAQ answers
    document.addEventListener('DOMContentLoaded', function() {
      document.querySelectorAll('.faq-answer').forEach(function(answer) {
        answer.style.maxHeight = '0px';
      });
    });
  </script>
@endsection
