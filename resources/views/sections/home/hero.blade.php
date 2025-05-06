<!-- Hero Section -->
<section class="relative bg-[#362766] pt-0 overflow-hidden w-full">
  <!-- Video de fondo con overlay -->
  <div class="absolute inset-0 z-0 w-full h-full">
    <div class="absolute inset-0 bg-[#362766] opacity-70 z-10"></div>
    <video 
      class="absolute inset-0 w-full h-full object-cover" 
      autoplay 
      muted 
      loop 
      playsinline
      poster="{{ get_theme_file_uri('resources/videos/kintsugi-thumbnail.png') }}"
    >
      <source src="{{ get_theme_file_uri('resources/videos/kintsugi.mp4') }}" type="video/mp4">
    </video>
  </div>

  <!-- Contenido del hero -->
  <div class="container mx-auto px-4 relative z-10 min-h-[500px] sm:min-h-[550px] md:min-h-[100vh] flex flex-col justify-center items-center">
    <div class="w-full max-w-5xl mx-auto text-center text-white mt-16 md:mt-20 lg:mt-24">
      <h2 class="text-base md:text-xl font-normal mb-3 font-roboto tracking-wider uppercase opacity-90" data-aos="fade-up" data-aos-duration="500">Psicología Clínica EMDR</h2>
      <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold mb-10 md:mb-12 font-paytone tracking-tight leading-[1.1] px-4 md:px-0" data-aos="fade-up" data-aos-duration="600" data-aos-delay="50">
        El Trauma<br>
        se puede superar
      </h1>
      <a href="/reservar-cita" class="bg-gradient-to-r from-pink-500 to-purple-600 hover:from-pink-600 hover:to-purple-700 
                    text-white px-6 md:px-8 py-2.5 md:py-3 rounded-full transition-all 
                    duration-300 transform hover:scale-105 shadow-md hover:shadow-lg 
                    font-roboto text-base md:text-lg tracking-wide font-medium service-button" data-aos="fade-up" data-aos-duration="500" data-aos-delay="100">
        Reservar Cita
      </a>
    </div>
  </div>

  <!-- Curvatura inferior -->
  <div class="absolute bottom-0 left-0 right-0 z-10">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120" fill="#ffffff" class="w-full" preserveAspectRatio="none">
      <path d="M0,64L80,69.3C160,75,320,85,480,80C640,75,800,53,960,48C1120,43,1280,53,1360,58.7L1440,64L1440,120L1360,120C1280,120,1120,120,960,120C800,120,640,120,480,120C320,120,160,120,80,120L0,120Z"></path>
    </svg>
  </div>
</section>
