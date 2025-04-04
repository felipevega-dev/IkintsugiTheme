<!-- Testimonials Section -->
<section class="py-10 bg-white relative">
  <!-- Curvatura superior -->
  <div class="absolute top-0 left-0 right-0 w-full">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 60" fill="none" class="w-full">
      <path d="M0 0C0 0 240 60 720 60C1200 60 1440 0 1440 0V60H0V0Z" fill="white"/>
    </svg>
  </div>

  <div class="container mx-auto px-4 pt-10">
    <!-- Section title -->
    <h2 class="text-[#030D55] font-extrabold text-5xl md:text-[48px] leading-tight mb-56 text-center" style="font-family: 'Playfair Display', serif;">
      Nuestros testimonios
    </h2>
    
    <!-- Testimonials Grid -->
    <div class="flex flex-wrap justify-center gap-[50px] max-w-6xl mx-auto">
      <!-- Testimonio 1 -->
      <div class="relative p-[24px] w-[525px] h-[398px] rounded-[16px] border border-[#D9D9D9]" style="background: linear-gradient(180deg, rgba(3, 13, 85, 0.15) 0%, rgba(171, 39, 122, 0.15) 100%);">
        <!-- Profile image -->
        <div class="absolute" style="width: 290px; height: 290px; top: -114px; left: 117.5px;">
          <div class="w-full h-full rounded-full overflow-hidden border-[8px] border-white">
            <img src="{{ get_theme_file_uri('resources/images/persona2.png') }}" alt="Lorena López" class="w-full h-full object-cover" onerror="this.src='https://via.placeholder.com/290?text=L'">
          </div>
        </div>
        
        <!-- Name -->
        <h3 class="text-[#AB277A] font-extrabold text-[24px] text-center mt-[180px] mb-4" style="font-family: 'Playfair Display', serif;">Lorena López</h3>
        
        <!-- Testimonial text -->
        <p class="text-[#181818] text-center text-[15px] font-normal font-roboto leading-normal px-2">
          "Después de años en terapias largas y sin resultados, la terapia con Julio César fue un antes y un después para mí. En pocas sesiones vi cambios concretos, sin revivir traumas. Sentí que limpié mucho de mi interior y que, por fin, tenía una alternativa real al sufrimiento. La recomiendo totalmente."
        </p>
      </div>
      
      <!-- Testimonio 2 -->
      <div class="relative p-[24px] w-[525px] h-[398px] rounded-[16px] border border-[#D9D9D9]" style="background: linear-gradient(180deg, rgba(3, 13, 85, 0.15) 0%, rgba(171, 39, 122, 0.15) 100%);">
        <!-- Profile image -->
        <div class="absolute" style="width: 290px; height: 290px; top: -114px; left: 117.5px;">
          <div class="w-full h-full rounded-full overflow-hidden border-[8px] border-white">
            <img src="{{ get_theme_file_uri('resources/images/persona1.png') }}" alt="Fernando Torres" class="w-full h-full object-cover" onerror="this.src='https://via.placeholder.com/290?text=F'">
          </div>
        </div>
        
        <!-- Name -->
        <h3 class="text-[#AB277A] font-extrabold text-[24px] text-center mt-[180px] mb-4" style="font-family: 'Playfair Display', serif;">Fernando Torres</h3>
        
        <!-- Testimonial text -->
        <p class="text-[#181818] text-center text-[15px] font-normal font-roboto leading-normal px-2">
          "Mi proceso de terapia con Shénhui fue transformador. Desde el primer momento, ella me acompañó con mucha calidez, guiándome con firmeza pero siempre con amabilidad, tanto en los días buenos como en los más difíciles. Gracias a su enfoque y al EMDR, pude sanar heridas profundas sin necesidad de revivirlas."
        </p>
      </div>
    </div>
  </div>
</section>
