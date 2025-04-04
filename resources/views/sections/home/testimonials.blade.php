<!-- Testimonials Section -->
<section class="py-16 bg-white relative">
  <!-- Curvatura superior -->
  <div class="absolute top-0 left-0 right-0 w-full">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 60" fill="none" class="w-full">
      <path d="M0 0C0 0 240 60 720 60C1200 60 1440 0 1440 0V60H0V0Z" fill="white"/>
    </svg>
  </div>

  <div class="container mx-auto px-4 pt-10">
    <!-- Section title -->
    <h2 class="text-[#030D55] font-extrabold text-5xl md:text-[48px] leading-tight mb-16 text-center" style="font-family: 'Playfair Display', serif;">
      Nuestros testimonios
    </h2>
    
    <!-- Testimonials Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-12 gap-y-16 max-w-5xl mx-auto">
      <!-- Testimonio 1 -->
      <div class="bg-[#F8F6FE] rounded-lg p-8 relative">
        <!-- Profile image -->
        <div class="absolute -top-10 left-1/2 transform -translate-x-1/2">
          <div class="w-20 h-20 rounded-full overflow-hidden border-4 border-white">
            <img src="{{ get_theme_file_uri('resources/images/persona2.png') }}" alt="Lorena López" class="w-full h-full object-cover" onerror="this.src='https://via.placeholder.com/80?text=L'">
          </div>
        </div>
        
        <!-- Name -->
        <h3 class="text-[#AB277A] font-semibold text-xl text-center mt-8 mb-4">Lorena López</h3>
        
        <!-- Testimonial text -->
        <p class="text-gray-700 text-center text-sm">
          "Después de años en terapias largas y sin resultados, la terapia con Julia Cielo fue un antes y un después para mí. Su genio asistente a desenredar mis patrones aprendidos y atender a lo que requería de mí crecer y sanar por lo tanto una alternativa al sufrimiento. La recomiendo totalmente."
        </p>
      </div>
      
      <!-- Testimonio 2 -->
      <div class="bg-[#F8F6FE] rounded-lg p-8 relative">
        <!-- Profile image -->
        <div class="absolute -top-10 left-1/2 transform -translate-x-1/2">
          <div class="w-20 h-20 rounded-full overflow-hidden border-4 border-white">
            <img src="{{ get_theme_file_uri('resources/images/persona1.png') }}" alt="Fernando Torres" class="w-full h-full object-cover" onerror="this.src='https://via.placeholder.com/80?text=F'">
          </div>
        </div>
        
        <!-- Name -->
        <h3 class="text-[#AB277A] font-semibold text-xl text-center mt-8 mb-4">Fernando Torres</h3>
        
        <!-- Testimonial text -->
        <p class="text-gray-700 text-center text-sm">
          "Mi proceso de terapia con Sherifem fue transformador. Desde el primer momento, me hizo acompañado con mucha calidez, apertura y profesionalismo. He podido resolver situaciones de los días que me trascendían en las más difíciles. Gracias a su enfoque y al EMDR, pude sanar heridas profundas sin necesidad de revivir la experiencia."
        </p>
      </div>
    </div>
  </div>
</section>
