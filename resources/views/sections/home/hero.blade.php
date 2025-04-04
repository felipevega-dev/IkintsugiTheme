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
      <source src="{{ get_theme_file_uri('resources/videos/background.mp4') }}" type="video/mp4">
      <!-- Fallback para navegadores que no soportan video -->
      <img src="{{ get_theme_file_uri('resources/images/hero-fallback.jpg') }}" alt="Background" class="w-full h-full object-cover">
    </video>
  </div>

  <!-- Contenido del hero -->
  <div class="container mx-auto px-4 relative z-10 min-h-[80vh] flex flex-col justify-center items-center">
    <div class="max-w-3xl mx-auto text-center text-white py-20 md:py-24 lg:py-26">
      <h2 class="text-xl md:text-2xl font-500 mb-5">Psicología Clínica EMDR</h2>
      <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold mb-8 font-playfair" style="font-family: 'Playfair Display', serif;">El Trauma se puede superar!</h1>
      <a href="/reservar-cita" class="bg-gradient-to-r from-pink-500 to-purple-600 hover:from-pink-600 hover:to-purple-700 
                    text-white px-6 py-3 rounded-full font-medium transition-all 
                    duration-300 transform hover:scale-105 shadow-md hover:shadow-lg 
                    font-roboto">
        Reservar Cita
      </a>
    </div>
  </div>

  <!-- Curvatura inferior -->
  <div class="absolute bottom-0 left-0 right-0 z-10 translate-y-1">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120" fill="#ffffff" preserveAspectRatio="none">
      <path d="M0,64L80,69.3C160,75,320,85,480,80C640,75,800,53,960,48C1120,43,1280,53,1360,58.7L1440,64L1440,120L1360,120C1280,120,1120,120,960,120C800,120,640,120,480,120C320,120,160,120,80,120L0,120Z"></path>
    </svg>
  </div>
</section>
