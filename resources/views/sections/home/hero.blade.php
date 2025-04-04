<!-- Hero Section -->
<section class="relative bg-[#362766] overflow-hidden pt-32">
  <!-- Video de fondo con overlay -->
  <div class="absolute inset-0 z-0">
    <div class="absolute inset-0 bg-[#362766] opacity-70 z-10"></div>
    <video 
      class="absolute inset-0 w-full h-full object-cover" 
      autoplay 
      muted 
      loop 
      playsinline
    >
      <source src="{{ get_theme_file_uri('resources/videos/hero-background.mp4') }}" type="video/mp4">
      <!-- Fallback para navegadores que no soportan video -->
      <img src="{{ get_theme_file_uri('resources/images/hero-fallback.jpg') }}" alt="Background" class="w-full h-full object-cover">
    </video>
  </div>

  <!-- Contenido del hero -->
  <div class="container mx-auto px-4 relative z-10 pb-32 pt-14">
    <div class="max-w-3xl mx-auto text-center text-white">
      <h2 class="text-xl md:text-2xl font-medium mb-3">Psicología Clínica EMDR</h2>
      <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6">El Trauma se puede superar!</h1>
      <p class="text-lg md:text-xl mb-8">Terapia especializada en trauma y EMDR en Madrid</p>
      <a href="/reservar-cita" class="inline-block bg-gradient-to-r from-[#E93D82] to-[#F26EB6] hover:from-[#E93D82] hover:to-[#F58EC7] text-white px-6 py-3 rounded-full font-medium transition-all duration-300">
        Reservar Cita
      </a>
    </div>
  </div>

  <!-- Curvatura inferior -->
  <div class="absolute bottom-0 left-0 right-0 z-10">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120" fill="#ffffff" preserveAspectRatio="none">
      <path d="M0,64L80,69.3C160,75,320,85,480,80C640,75,800,53,960,48C1120,43,1280,53,1360,58.7L1440,64L1440,120L1360,120C1280,120,1120,120,960,120C800,120,640,120,480,120C320,120,160,120,80,120L0,120Z"></path>
    </svg>
  </div>
</section>
