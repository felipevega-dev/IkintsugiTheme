<!-- FAQs Section -->
<section class="py-16 bg-white relative">
  <div class="container mx-auto px-4 relative">
    <!-- Section title -->
    <h2 class="text-[#030D55] font-extrabold text-5xl md:text-[48px] leading-[100%] mb-16 text-center" style="font-family: 'Playfair Display', serif;">
      FAQ's
    </h2>
    
    <!-- FAQs Container with decorations -->
    <div class="relative max-w-[650px] mx-auto">
      <!-- Decorative image left -->
      <div class="absolute -left-28 top-1/2 transform -translate-y-1/2 hidden md:block">
        <img src="{{ get_theme_file_uri('resources/images/deco1.png') }}" alt="Decorative Element" class="w-24">
      </div>
      
      <!-- Decorative image right -->
      <div class="absolute -right-28 top-1/2 transform -translate-y-1/2 hidden md:block">
        <img src="{{ get_theme_file_uri('resources/images/deco2.png') }}" alt="Decorative Element" class="w-24">
      </div>
      
      <!-- FAQ Items -->
      <div class="space-y-2">
        <!-- FAQ Item 1 -->
        <div class="faq-item border border-gray-200 rounded-md overflow-hidden w-full" style="max-width: 625px;">
          <button class="faq-question w-full flex justify-between items-center p-4 text-left bg-white hover:bg-gray-50 transition-colors duration-200" onclick="toggleFaq(this)">
            <h3 class="text-[#030D55] font-bold text-[24px] leading-[100%]" style="font-family: 'Playfair Display', serif;">¿Cómo saber si necesito psicoterapia?</h3>
            <div class="arrow-icon bg-[#FF3382] rounded-full w-6 h-6 flex items-center justify-center transform transition-transform duration-300">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </div>
          </button>
          <div class="faq-answer hidden bg-[#FFF3FF8F] p-4">
            <p class="font-roboto font-normal text-[16px] leading-[28px] text-[#181818]">
              Nuestro equipo está aquí para ofrecerle el apoyo y la orientación necesarios para superar desafíos y fortalecer su bienestar emocional. No espere más para invertir en su salud mental; ¡empiece su viaje hacia un futuro más brillante hoy mismo!
            </p>
          </div>
        </div>
        
        <!-- FAQ Item 2 -->
        <div class="faq-item border border-gray-200 rounded-md overflow-hidden w-full" style="max-width: 625px;">
          <button class="faq-question w-full flex justify-between items-center p-4 text-left bg-white hover:bg-gray-50 transition-colors duration-200" onclick="toggleFaq(this)">
            <h3 class="text-[#030D55] font-bold text-[24px] leading-[100%]" style="font-family: 'Playfair Display', serif;">Con EMDR, ¿los recuerdos se olvidan?</h3>
            <div class="arrow-icon bg-[#FF3382] rounded-full w-6 h-6 flex items-center justify-center transform transition-transform duration-300">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </div>
          </button>
          <div class="faq-answer hidden bg-[#FFF3FF8F] p-4">
            <p class="font-roboto font-normal text-[16px] leading-[28px] text-[#181818]">
              No, la terapia EMDR no hace que olvides tus recuerdos. Lo que hace es reprocesar los recuerdos traumáticos para que ya no causen el mismo nivel de angustia. Los recuerdos siguen ahí, pero pierden su carga emocional negativa intensa.
            </p>
          </div>
        </div>
        
        <!-- FAQ Item 3 -->
        <div class="faq-item border border-gray-200 rounded-md overflow-hidden w-full" style="max-width: 625px;">
          <button class="faq-question w-full flex justify-between items-center p-4 text-left bg-white hover:bg-gray-50 transition-colors duration-200" onclick="toggleFaq(this)">
            <h3 class="text-[#030D55] font-bold text-[24px] leading-[100%]" style="font-family: 'Playfair Display', serif;">¿Quienes pueden atenderse con EMDR?</h3>
            <div class="arrow-icon bg-[#FF3382] rounded-full w-6 h-6 flex items-center justify-center transform transition-transform duration-300">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </div>
          </button>
          <div class="faq-answer hidden bg-[#FFF3FF8F] p-4">
            <p class="font-roboto font-normal text-[16px] leading-[28px] text-[#181818]">
              La terapia EMDR es adecuada para niños, adolescentes y adultos que han experimentado traumas, ansiedad, depresión, fobias, estrés postraumático y muchas otras condiciones. Cada caso es evaluado de forma individual para determinar si EMDR es el enfoque más adecuado.
            </p>
          </div>
        </div>
        
        <!-- FAQ Item 4 -->
        <div class="faq-item border border-gray-200 rounded-md overflow-hidden w-full" style="max-width: 625px;">
          <button class="faq-question w-full flex justify-between items-center p-4 text-left bg-white hover:bg-gray-50 transition-colors duration-200" onclick="toggleFaq(this)">
            <h3 class="text-[#030D55] font-bold text-[24px] leading-[100%]" style="font-family: 'Playfair Display', serif;">¿Cuánto dura el tratamiento psicológico EMDR?</h3>
            <div class="arrow-icon bg-[#FF3382] rounded-full w-6 h-6 flex items-center justify-center transform transition-transform duration-300">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </div>
          </button>
          <div class="faq-answer hidden bg-[#FFF3FF8F] p-4">
            <p class="font-roboto font-normal text-[16px] leading-[28px] text-[#181818]">
              La duración del tratamiento varía según las necesidades individuales. Algunos casos sencillos pueden resolverse en 6-12 sesiones, mientras que situaciones más complejas pueden requerir más tiempo. Muchas personas notan mejoras significativas después de pocas sesiones.
            </p>
          </div>
        </div>
        
        <!-- FAQ Item 5 -->
        <div class="faq-item border border-gray-200 rounded-md overflow-hidden w-full" style="max-width: 625px;">
          <button class="faq-question w-full flex justify-between items-center p-4 text-left bg-white hover:bg-gray-50 transition-colors duration-200" onclick="toggleFaq(this)">
            <h3 class="text-[#030D55] font-bold text-[24px] leading-[100%]" style="font-family: 'Playfair Display', serif;">¿Qué duración tienen las sesiones?</h3>
            <div class="arrow-icon bg-[#FF3382] rounded-full w-6 h-6 flex items-center justify-center transform transition-transform duration-300">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </div>
          </button>
          <div class="faq-answer hidden bg-[#FFF3FF8F] p-4">
            <p class="font-roboto font-normal text-[16px] leading-[28px] text-[#181818]">
              Las sesiones de terapia EMDR suelen durar entre 50 y 90 minutos. La primera sesión puede ser más larga, ya que incluye la evaluación inicial y la obtención del historial completo para personalizar el tratamiento.
            </p>
          </div>
        </div>
        
        <!-- FAQ Item 6 -->
        <div class="faq-item border border-gray-200 rounded-md overflow-hidden w-full" style="max-width: 625px;">
          <button class="faq-question w-full flex justify-between items-center p-4 text-left bg-white hover:bg-gray-50 transition-colors duration-200" onclick="toggleFaq(this)">
            <h3 class="text-[#030D55] font-bold text-[24px] leading-[100%]" style="font-family: 'Playfair Display', serif;">¿Cada cuánto tiempo se hace una sesión?</h3>
            <div class="arrow-icon bg-[#FF3382] rounded-full w-6 h-6 flex items-center justify-center transform transition-transform duration-300">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </div>
          </button>
          <div class="faq-answer hidden bg-[#FFF3FF8F] p-4">
            <p class="font-roboto font-normal text-[16px] leading-[28px] text-[#181818]">
              Habitualmente, las sesiones de EMDR se programan una vez por semana, aunque en casos de crisis pueden ser más frecuentes. A medida que se avanza en el tratamiento, las sesiones pueden espaciarse cada dos semanas o incluso mensualmente.
            </p>
          </div>
        </div>
        
        <!-- FAQ Item 7 -->
        <div class="faq-item border border-gray-200 rounded-md overflow-hidden w-full" style="max-width: 625px;">
          <button class="faq-question w-full flex justify-between items-center p-4 text-left bg-white hover:bg-gray-50 transition-colors duration-200" onclick="toggleFaq(this)">
            <h3 class="text-[#030D55] font-bold text-[24px] leading-[100%]" style="font-family: 'Playfair Display', serif;">¿Cómo me puede ayudar EMDR?</h3>
            <div class="arrow-icon bg-[#FF3382] rounded-full w-6 h-6 flex items-center justify-center transform transition-transform duration-300">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </div>
          </button>
          <div class="faq-answer hidden bg-[#FFF3FF8F] p-4">
            <p class="font-roboto font-normal text-[16px] leading-[28px] text-[#181818]">
              EMDR puede ayudar con traumas, ansiedad, depresión, fobias, estrés postraumático, duelo complicado, adicciones, baja autoestima y muchas otras condiciones. Este enfoque terapéutico permite reprocesar experiencias difíciles y desarrollar recursos internos para afrontar mejor las situaciones actuales.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!-- JavaScript for toggle functionality -->
  <script>
    function toggleFaq(element) {
      const answer = element.nextElementSibling;
      const arrow = element.querySelector('.arrow-icon');
      
      // Toggle answer visibility
      answer.classList.toggle('hidden');
      
      // Rotate arrow
      if (answer.classList.contains('hidden')) {
        arrow.style.transform = 'rotate(0deg)';
      } else {
        arrow.style.transform = 'rotate(180deg)';
      }
    }
  </script>
</section>
