<!-- Services Section -->
<section class="py-16 pb-24 mb-20 relative overflow-hidden bg-[#030D550D]">
  <!-- La planta ahora está en la sección features con dimensiones específicas -->
  
  <div class="container mx-auto px-4 relative z-10">
    <!-- Section title -->
    <h2 class="text-[#030D55] font-extrabold text-5xl md:text-[48px] leading-tight mb-12 text-center max-w-[600px] mx-auto" style="font-family: 'Playfair Display', serif;">
      Empieza aquí tu viaje de 
      sanación y crecimiento
    </h2>
    
    <!-- Service boxes -->
    <div class="flex flex-wrap lg:flex-nowrap justify-center gap-4 md:gap-6 lg:gap-10 mb-24">
      <!-- Service 1 -->
      <div class="rounded-[16px] overflow-hidden shadow-lg transition-transform duration-300 hover:-translate-y-2 w-full lg:w-1/3" style="max-width: 395px; height: 419px;">
        <div class="relative h-full">
          <img src="{{ get_theme_file_uri('resources/images/servicio1.jpeg') }}" alt="Terapia Individual" class="w-full h-full object-cover">
          <!-- Gradient overlay for text readability -->
          <div class="absolute inset-0" style="background: linear-gradient(180deg, rgba(171, 39, 122, 0.32) 0%, rgba(3, 13, 85, 0.32) 61%);"></div>
          <!-- Service title -->
          <div class="absolute bottom-0 left-0 w-full p-6">
            <h3 class="text-white font-roboto font-bold text-2xl mb-2">Atención Médica</h3>
            <p class="text-white font-roboto">Brindamos acompañamiento terapéutico profesional para tu bienestar emocional y mental.</p>
          </div>
        </div>
      </div>
      
      <!-- Service 2 -->
      <div class="rounded-[16px] overflow-hidden shadow-lg transition-transform duration-300 hover:-translate-y-2 w-full lg:w-1/3" style="max-width: 395px; height: 419px;">
        <div class="relative h-full">
          <img src="{{ get_theme_file_uri('resources/images/servicio2.png') }}" alt="Terapia de Pareja" class="w-full h-full object-cover">
          <!-- Gradient overlay for text readability -->
          <div class="absolute inset-0" style="background: linear-gradient(180deg, rgba(171, 39, 122, 0.32) 0%, rgba(3, 13, 85, 0.32) 61%);"></div>
          <!-- Service title -->
          <div class="absolute bottom-0 left-0 w-full p-6">
            <h3 class="text-white font-roboto font-bold text-2xl mb-2">Talleres y Charlas</h3>
            <p class="text-white font-roboto">Aprende, crece y disfruta de actividades para mejorar talleres dinámicos sobre bienestar, crianza y vínculos.</p>
          </div>
        </div>
      </div>
      
      <!-- Service 3 -->
      <div class="rounded-[16px] overflow-hidden shadow-lg transition-transform duration-300 hover:-translate-y-2 w-full lg:w-1/3" style="max-width: 395px; height: 419px;">
        <div class="relative h-full">
          <img src="{{ get_theme_file_uri('resources/images/servicio3.jpeg') }}" alt="Terapia Familiar" class="w-full h-full object-cover">
          <!-- Gradient overlay for text readability -->
          <div class="absolute inset-0" style="background: linear-gradient(180deg, rgba(171, 39, 122, 0.32) 0%, rgba(3, 13, 85, 0.32) 61%);"></div>
          <!-- Service title -->
          <div class="absolute bottom-0 left-0 w-full p-6">
            <h3 class="text-white font-roboto font-bold text-2xl mb-2">Personas que atendemos</h3>
            <p class="text-white font-roboto">Acompañamos a niños, adolescentes, adultos, parejas y familias en su camino hacia el bienestar personal.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Curvatura inferior - más sutil sin línea azul -->
  <div class="absolute bottom-0 left-0 right-0 w-full" style="height: 120px;">
    <!-- SVG para la curva sutil con más curvatura a la izquierda -->
    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 1513 100" fill="none" preserveAspectRatio="none">
    
    <path d="M0,30 C250,60 600,80 900,50 C1200,30 1400,40 1513,30 L1513,100 L0,100 Z"
          fill="#ffffff" />
    </svg>
  </div>
</section>
