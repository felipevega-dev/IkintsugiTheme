<section class="py-32 relative overflow-hidden">
  <!-- Curva superior tipo montaña -->
  <div class="absolute top-0 left-0 w-full z-10 overflow-hidden">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 150" preserveAspectRatio="none" class="w-full h-36">
      <path fill="#FFFFFF" d="M0,128L48,117.3C96,107,192,85,288,80C384,75,480,85,576,101.3C672,117,768,139,864,144C960,149,1056,139,1152,122.7C1248,107,1344,85,1392,74.7L1440,64L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path>
    </svg>
  </div>

  <!-- Fondo con imagen vectorial y efecto de degradado -->
  <div class="absolute top-0 left-0 w-full h-full z-0">
    <img src="{{ get_theme_file_uri('resources/images/vector1.png') }}" alt="Fondo" class="w-full h-full object-cover">
    <div class="absolute top-0 left-0 w-full h-full" style="background: linear-gradient(180deg, rgba(171, 39, 122, 0.4) 0%, rgba(3, 13, 85, 0.4) 61%);"></div>
    <div class="absolute top-0 left-0 w-full h-full">
      <img src="{{ get_theme_file_uri('resources/images/vector2.png') }}" alt="Efecto sombra" class="w-full h-full object-cover opacity-70 mix-blend-multiply">
    </div>
  </div>
  
  <!-- Contenido -->
  <div class="container mx-auto px-4 relative z-20 mt-16">
    <div class="flex flex-col md:flex-row items-center justify-center gap-8 relative">
      <!-- Misión -->
      <div class="bg-white rounded-[16px] p-[24px] shadow-lg relative z-10" style="width: 395px; min-height: 376px;">
        <h3 class="text-[24px] font-bold mb-4 text-[#030D55] text-center" style="font-family: 'Playfair Display', serif; line-height: 100%; letter-spacing: 0%;">
          Nuestra misión
        </h3>
        <p class="text-[#181818]" style="font-family: 'Roboto', sans-serif; font-weight: 400; font-size: 16px; line-height: 28px; letter-spacing: 0%;">
          Estamos comprometidos en promover, difundir y brindar soluciones desde la Psicoterapia EMDR a problemáticas de la salud mental. Estamos enfocados en mejorar la calidad de vida de las personas, familias, grupos, comunidades e instituciones a través de la entrega de herramientas e intervenciones eficaces, basadas en evidencia científica, que permitan facilitar el desarrollo subjetivo y social de nuestros pacientes.
        </p>
        
        <!-- Línea conectora hacia el logo -->
        <div class="hidden md:block absolute right-[-60px] top-1/2 w-[60px] h-[3px]" style="background-color: #F5B3F3; z-index: 30;"></div>
      </div>
      
      <!-- Logo central -->
      <div class="relative flex items-center justify-center mx-6 z-20">
        <!-- Logo blanco -->
        <div class="relative z-10">
          <img src="{{ get_theme_file_uri('resources/images/logoblanco.png') }}" alt="Ikintsugi Logo" style="width: 226px; height: 56px;">
        </div>
      </div>
      
      <!-- Valores -->
      <div class="bg-white rounded-[16px] p-[24px] shadow-lg relative z-10" style="width: 395px; min-height: 376px;">
        <!-- Línea conectora hacia el logo -->
        <div class="hidden md:block absolute left-[-60px] top-1/2 w-[60px] h-[3px]" style="background-color: #F5B3F3; z-index: 30;"></div>
        
        <h3 class="text-[24px] font-bold mb-4 text-[#030D55] text-center" style="font-family: 'Playfair Display', serif; line-height: 100%; letter-spacing: 0%;">
          Nuestros valores
        </h3>
        <p class="mb-4 text-[#181818]" style="font-family: 'Roboto', sans-serif; font-weight: 400; font-size: 16px; line-height: 28px; letter-spacing: 0%;">
          Como miembros de la Iniciativa Kintsugi creemos en la reparación del ser humano inspirada en los siguientes valores:
        </p>
        <ul class="space-y-1 text-[#181818]" style="font-family: 'Roboto', sans-serif; font-weight: 400; font-size: 16px; line-height: 28px; letter-spacing: 0%;">
          <li>Confianza</li>
          <li>Respeto</li>
          <li>Aceptación incondicional</li>
          <li>Conocimiento Científico</li>
          <li>Confidencialidad</li>
          <li>Ética Profesional</li>
        </ul>
      </div>
    </div>
  </div>
</section> 