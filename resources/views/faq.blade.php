{{--
  Template Name: FAQ
--}}

@extends('layouts.app')

@section('content')
  <!-- HERO SECTION -->
  <section class="relative bg-white py-15 overflow-hidden mt-10">
    <div class="container mx-auto px-4 relative z-10">
      <div class="flex flex-col md:flex-row items-center justify-center gap-3">
        <!-- Texto del lado izquierdo --> 
        <div class="md:w-3/6 mb-10 md:mb-0 mt-10">
          <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-4 text-[#030D55] transition-all duration-500 hover:text-[#AB277A]" style="font-family: 'Playfair Display', serif; line-height: 1.1;">
          Nosotros te<br>ayudamos a resolver<br>todas tus dudas
          </h1>
          
          <p class="text-4xl mt-14 text-[#AB277A] transition-all duration-300 hover:translate-x-2" style="font-family: 'Hugamour', sans-serif;">
            #El trauma se puede superar
          </p>
        </div>
        
        <!-- Imagen del lado derecho -->
        <div class="md:w-2/5 md:ml-0">
          <div class="relative sm:mt-5 md:mt-15">
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
                <img src="{{ get_theme_file_uri('resources/images/quienensatendemos1.png') }}" alt="Personas que atendemos" class="w-full h-full object-cover transition-all duration-700 hover:scale-110">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- FAQs Section -->
<section class="bg-white relative mb-20">
  <div class="container mx-auto px-4 relative">
    <!-- Section title -->
    <h2 class="text-[#030D55] font-extrabold text-3xl md:text-5xl md:text-[48px] leading-[100%] mb-10 md:mb-16 text-center" style="font-family: 'Playfair Display', serif;">
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
            <h3 class="text-[#030D55] font-bold text-xl md:text-[24px] leading-[100%] pr-4" style="font-family: 'Playfair Display', serif;">¿Cómo saber si necesito psicoterapia?</h3>
            <div class="arrow-icon w-5 md:w-6 h-5 md:h-6 flex-shrink-0 flex items-center justify-center transform transition-transform duration-500">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 md:h-6 w-5 md:w-6 text-[#FF3382]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </div>
          </button>
          <div class="faq-answer hidden bg-[#FFF3FF8F] p-3 md:p-4 transition-all duration-700 ease-out" style="max-height: 0; overflow: hidden;">
            <p class="font-roboto font-normal text-sm md:text-[16px] leading-6 md:leading-[28px] text-[#181818]">
              Nuestro equipo está aquí para ofrecerle el apoyo y la orientación necesarios para superar desafíos y fortalecer su bienestar emocional. No espere más para invertir en su salud mental; ¡empiece su viaje hacia un futuro más brillante hoy mismo!
            </p>
          </div>
        </div>
        
        <!-- FAQ Item 2 -->
        <div class="faq-item overflow-hidden w-full faq-gradient-border" style="max-width: 625px;">
          <button class="faq-question w-full flex justify-between items-center p-3 md:p-4 text-left bg-white hover:bg-gray-50 transition-colors duration-200" onclick="toggleFaq(this)">
            <h3 class="text-[#030D55] font-bold text-xl md:text-[24px] leading-[100%] pr-4" style="font-family: 'Playfair Display', serif;">Con EMDR, ¿los recuerdos se olvidan?</h3>
            <div class="arrow-icon w-5 md:w-6 h-5 md:h-6 flex-shrink-0 flex items-center justify-center transform transition-transform duration-500">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 md:h-6 w-5 md:w-6 text-[#FF3382]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </div>
          </button>
          <div class="faq-answer hidden bg-[#FFF3FF8F] p-3 md:p-4 transition-all duration-700 ease-out" style="max-height: 0; overflow: hidden;">
            <p class="font-roboto font-normal text-sm md:text-[16px] leading-6 md:leading-[28px] text-[#181818]">
              No, la terapia EMDR no hace que olvides tus recuerdos. Lo que hace es reprocesar los recuerdos traumáticos para que ya no causen el mismo nivel de angustia. Los recuerdos siguen ahí, pero pierden su carga emocional negativa intensa.
            </p>
          </div>
        </div>
        
        <!-- FAQ Item 3 -->
        <div class="faq-item overflow-hidden w-full faq-gradient-border" style="max-width: 625px;">
          <button class="faq-question w-full flex justify-between items-center p-3 md:p-4 text-left bg-white hover:bg-gray-50 transition-colors duration-200" onclick="toggleFaq(this)">
            <h3 class="text-[#030D55] font-bold text-xl md:text-[24px] leading-[100%] pr-4" style="font-family: 'Playfair Display', serif;">¿Quienes pueden atenderse con EMDR?</h3>
            <div class="arrow-icon w-5 md:w-6 h-5 md:h-6 flex-shrink-0 flex items-center justify-center transform transition-transform duration-500">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 md:h-6 w-5 md:w-6 text-[#FF3382]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </div>
          </button>
          <div class="faq-answer hidden bg-[#FFF3FF8F] p-3 md:p-4 transition-all duration-700 ease-out" style="max-height: 0; overflow: hidden;">
            <p class="font-roboto font-normal text-sm md:text-[16px] leading-6 md:leading-[28px] text-[#181818]">
              La terapia EMDR es adecuada para niños, adolescentes y adultos que han experimentado traumas, ansiedad, depresión, fobias, estrés postraumático y muchas otras condiciones. Cada caso es evaluado de forma individual para determinar si EMDR es el enfoque más adecuado.
            </p>
          </div>
        </div>
        
        <!-- FAQ Item 4 -->
        <div class="faq-item overflow-hidden w-full faq-gradient-border" style="max-width: 625px;">
          <button class="faq-question w-full flex justify-between items-center p-3 md:p-4 text-left bg-white hover:bg-gray-50 transition-colors duration-200" onclick="toggleFaq(this)">
            <h3 class="text-[#030D55] font-bold text-xl md:text-[24px] leading-[100%] pr-4" style="font-family: 'Playfair Display', serif;">¿Cuánto dura el tratamiento psicológico EMDR?</h3>
            <div class="arrow-icon w-5 md:w-6 h-5 md:h-6 flex-shrink-0 flex items-center justify-center transform transition-transform duration-500">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 md:h-6 w-5 md:w-6 text-[#FF3382]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </div>
          </button>
          <div class="faq-answer hidden bg-[#FFF3FF8F] p-3 md:p-4 transition-all duration-700 ease-out" style="max-height: 0; overflow: hidden;">
            <p class="font-roboto font-normal text-sm md:text-[16px] leading-6 md:leading-[28px] text-[#181818]">
              La duración del tratamiento varía según las necesidades individuales. Algunos casos sencillos pueden resolverse en 6-12 sesiones, mientras que situaciones más complejas pueden requerir más tiempo. Muchas personas notan mejoras significativas después de pocas sesiones.
            </p>
          </div>
        </div>
        
        <!-- FAQ Item 5 -->
        <div class="faq-item overflow-hidden w-full faq-gradient-border" style="max-width: 625px;">
          <button class="faq-question w-full flex justify-between items-center p-3 md:p-4 text-left bg-white hover:bg-gray-50 transition-colors duration-200" onclick="toggleFaq(this)">
            <h3 class="text-[#030D55] font-bold text-xl md:text-[24px] leading-[100%] pr-4" style="font-family: 'Playfair Display', serif;">¿Qué duración tienen las sesiones?</h3>
            <div class="arrow-icon w-5 md:w-6 h-5 md:h-6 flex-shrink-0 flex items-center justify-center transform transition-transform duration-500">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 md:h-6 w-5 md:w-6 text-[#FF3382]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </div>
          </button>
          <div class="faq-answer hidden bg-[#FFF3FF8F] p-3 md:p-4 transition-all duration-700 ease-out" style="max-height: 0; overflow: hidden;">
            <p class="font-roboto font-normal text-sm md:text-[16px] leading-6 md:leading-[28px] text-[#181818]">
              Las sesiones de terapia EMDR suelen durar entre 50 y 90 minutos. La primera sesión puede ser más larga, ya que incluye la evaluación inicial y la obtención del historial completo para personalizar el tratamiento.
            </p>
          </div>
        </div>
        
        <!-- FAQ Item 6 -->
        <div class="faq-item overflow-hidden w-full faq-gradient-border" style="max-width: 625px;">
          <button class="faq-question w-full flex justify-between items-center p-3 md:p-4 text-left bg-white hover:bg-gray-50 transition-colors duration-200" onclick="toggleFaq(this)">
            <h3 class="text-[#030D55] font-bold text-xl md:text-[24px] leading-[100%] pr-4" style="font-family: 'Playfair Display', serif;">¿Cada cuánto tiempo se hace una sesión?</h3>
            <div class="arrow-icon w-5 md:w-6 h-5 md:h-6 flex-shrink-0 flex items-center justify-center transform transition-transform duration-500">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 md:h-6 w-5 md:w-6 text-[#FF3382]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </div>
          </button>
          <div class="faq-answer hidden bg-[#FFF3FF8F] p-3 md:p-4 transition-all duration-700 ease-out" style="max-height: 0; overflow: hidden;">
            <p class="font-roboto font-normal text-sm md:text-[16px] leading-6 md:leading-[28px] text-[#181818]">
              Habitualmente, las sesiones de EMDR se programan una vez por semana, aunque en casos de crisis pueden ser más frecuentes. A medida que se avanza en el tratamiento, las sesiones pueden espaciarse cada dos semanas o incluso mensualmente.
            </p>
          </div>
        </div>
        
        <!-- FAQ Item 7 -->
        <div class="faq-item overflow-hidden w-full faq-gradient-border" style="max-width: 625px;">
          <button class="faq-question w-full flex justify-between items-center p-3 md:p-4 text-left bg-white hover:bg-gray-50 transition-colors duration-200" onclick="toggleFaq(this)">
            <h3 class="text-[#030D55] font-bold text-xl md:text-[24px] leading-[100%] pr-4" style="font-family: 'Playfair Display', serif;">¿Cómo me puede ayudar EMDR?</h3>
            <div class="arrow-icon w-5 md:w-6 h-5 md:h-6 flex-shrink-0 flex items-center justify-center transform transition-transform duration-500">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 md:h-6 w-5 md:w-6 text-[#FF3382]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </div>
          </button>
          <div class="faq-answer hidden bg-[#FFF3FF8F] p-3 md:p-4 transition-all duration-700 ease-out" style="max-height: 0; overflow: hidden;">
            <p class="font-roboto font-normal text-sm md:text-[16px] leading-6 md:leading-[28px] text-[#181818]">
              EMDR puede ayudar con traumas, ansiedad, depresión, fobias, estrés postraumático, duelo complicado, adicciones, baja autoestima y muchas otras condiciones. Este enfoque terapéutico permite reprocesar experiencias difíciles y desarrollar recursos internos para afrontar mejor las situaciones actuales.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  
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
</section>
@endsection
