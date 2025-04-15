<!-- Hero Section -->
<section class="relative bg-[#362766] pt-0 max-w-full">
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
  <div class="container mx-auto px-4 relative z-10 min-h-[90vh] md:min-h-[100vh] flex flex-col justify-center items-center">
    <div class="max-w-3xl mx-auto text-center text-white py-24 md:py-40 lg:py-52">
      <h2 class="text-lg md:text-2xl font-500 mb-3 md:mb-5" data-aos="fade-up" data-aos-duration="500">Psicología Clínica EMDR</h2>
      <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold mb-6 md:mb-8 font-playfair" style="font-family: 'Playfair Display', serif;" data-aos="fade-up" data-aos-duration="600" data-aos-delay="50">El Trauma se puede superar!</h1>
      <a href="/reservar-cita" class="bg-gradient-to-r from-pink-500 to-purple-600 hover:from-pink-600 hover:to-purple-700 
                    text-white px-5 md:px-6 py-2 md:py-3 rounded-full font-medium transition-all 
                    duration-300 transform hover:scale-105 shadow-md hover:shadow-lg 
                    font-roboto text-base md:text-lg service-button" data-aos="fade-up" data-aos-duration="500" data-aos-delay="100">
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
