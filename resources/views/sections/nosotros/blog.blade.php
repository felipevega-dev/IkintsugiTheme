<section class="py-20 bg-white">
  <div class="container mx-auto px-4">
    <h2 class="text-4xl md:text-5xl font-bold mb-12 text-[#030D55] text-center" style="font-family: 'Playfair Display', serif;">
      Nuestro blog
    </h2>
    
    <!-- Artículos del blog -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
      <!-- Artículo 1 -->
      <div class="rounded-xl overflow-hidden shadow-lg">
        <div class="relative">
          <img src="{{ get_theme_file_uri('resources/images/blog-1.jpg') }}" alt="La presión sobre artistas" class="w-full h-48 object-cover">
          <div class="absolute top-3 left-3 bg-[#AB277A] text-white text-xs py-1 px-3 rounded-full">
            11 de marzo de 2023
          </div>
        </div>
        <div class="p-6">
          <h3 class="text-xl font-bold mb-3 text-[#030D55]" style="font-family: 'Playfair Display', serif;">
            La presión sobre artistas: autocensura
          </h3>
          <p class="text-sm text-[#181818] mb-4" style="font-family: 'Roboto', sans-serif;">
            La censura en el arte es constante y los límites de lo que es aceptable cambian con el tiempo. El miedo a las represalias puede llevar a los artistas a autocensurarse.
          </p>
          <a href="#" class="text-[#AB277A] font-medium hover:underline">Leer más</a>
        </div>
      </div>
      
      <!-- Artículo 2 -->
      <div class="rounded-xl overflow-hidden shadow-lg">
        <div class="relative">
          <img src="{{ get_theme_file_uri('resources/images/blog-2.jpg') }}" alt="Jorge López" class="w-full h-48 object-cover">
          <div class="absolute top-3 left-3 bg-[#AB277A] text-white text-xs py-1 px-3 rounded-full">
            11 de marzo de 2023
          </div>
        </div>
        <div class="p-6">
          <h3 class="text-xl font-bold mb-3 text-[#030D55]" style="font-family: 'Playfair Display', serif;">
            Jorge López rechaza de plano el amor romántico
          </h3>
          <p class="text-sm text-[#181818] mb-4" style="font-family: 'Roboto', sans-serif;">
            El actor chileno Jorge López criticó la idealización del amor romántico y reveló que se asume como "poliamoroso". "Tengo relaciones sanas con todas las personas que han pasado por mi vida", afirmó.
          </p>
          <a href="#" class="text-[#AB277A] font-medium hover:underline">Leer más</a>
        </div>
      </div>
      
      <!-- Artículo 3 -->
      <div class="rounded-xl overflow-hidden shadow-lg">
        <div class="relative">
          <img src="{{ get_theme_file_uri('resources/images/blog-3.jpg') }}" alt="El síndrome postvacacional" class="w-full h-48 object-cover">
          <div class="absolute top-3 left-3 bg-[#AB277A] text-white text-xs py-1 px-3 rounded-full">
            11 de marzo de 2023
          </div>
        </div>
        <div class="p-6">
          <h3 class="text-xl font-bold mb-3 text-[#030D55]" style="font-family: 'Playfair Display', serif;">
            El síndrome postvacacional: cómo volver a la rutina sin estrés
          </h3>
          <p class="text-sm text-[#181818] mb-4" style="font-family: 'Roboto', sans-serif;">
            Las vacaciones terminan y, con ello, llega el momento de regresar a nuestra rutina laboral. Llega el momento de adaptarse de nuevo y afrontar el síndrome post vacacional.
          </p>
          <a href="#" class="text-[#AB277A] font-medium hover:underline">Leer más</a>
        </div>
      </div>
    </div>
    
    <!-- Botón Ver más blogs -->
    <div class="text-center mt-12">
      <a href="{{ home_url('/blog') }}" class="inline-block py-3 px-8 bg-[#E93D82] text-white rounded-full font-medium hover:bg-[#D93280] transition-colors duration-300">
        Ver más blogs
      </a>
    </div>
  </div>
</section> 