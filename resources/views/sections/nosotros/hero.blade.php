<section class="relative bg-white py-15 overflow-hidden">
  <div class="container mx-auto px-4 relative z-10">
    <div class="flex flex-col md:flex-row items-center justify-center gap-16">
      <!-- Texto del lado izquierdo con más margen a la derecha -->
      <div class="md:w-2/5 mb-10 md:mb-0 md:ml-auto mt-10">
        <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-4 text-[#030D55]" style="font-family: 'Playfair Display', serif; line-height: 1.1;">
          Donde tus<br>cicatrices se<br>vuelven fortaleza
        </h1>
        
        <p class="text-4xl mt-14 text-[#AB277A]" style="font-family: 'Hugamour', sans-serif;">
          #El trauma se puede superar
        </p>
      </div>
      
      <!-- Imagen del lado derecho con más margen a la derecha -->
      <div class="md:w-2/5 md:ml-0">
        <div class="relative mt-15">
          <!-- Imagen con marco personalizado -->
          <div class="relative" style="width: 500px; height: 500px;">
            
            <!-- Línea curva violeta exterior -->
            <svg viewBox="0 0 450 450" class="absolute top-0 left-0 w-full h-full" style="transform: scale(1.08); transform-origin: center;">
              <path d="M225,10 
                      C290,10 345,35 380,70
                      C415,105 440,160 440,225
                      C440,290 415,345 380,380
                      C345,415 290,440 225,440
                      C160,440 105,415 70,380
                      C35,345 10,290 10,225
                      C10,160 35,105 70,70
                      C105,35 160,10 225,10 Z" 
                   fill="none" stroke="#8961C4" stroke-width="2"></path>
            </svg>
            
            <!-- Línea curva rosa -->
            <svg viewBox="0 0 450 450" class="absolute top-0 left-0 w-full h-full" style="transform: scale(1.05); transform-origin: center;">
              <path d="M225,30 
                      C280,30 325,50 355,80
                      C385,110 420,155 420,225
                      C420,295 385,340 355,370
                      C325,400 280,420 225,420
                      C170,420 125,400 95,370
                      C65,340 30,295 30,225
                      C30,155 65,110 95,80
                      C125,50 170,30 225,30 Z" 
                   fill="none" stroke="#F5B3F3" stroke-width="2"></path>
            </svg>
            
            <!-- Línea curva azul marino -->
            <svg viewBox="0 0 450 450" class="absolute top-0 left-0 w-full h-full" style="transform: scale(1.02); transform-origin: center;">
              <path d="M225,50 
                      C270,50 310,65 335,90
                      C360,115 400,155 400,225
                      C400,295 360,335 335,360
                      C310,385 270,400 225,400
                      C180,400 140,385 115,360
                      C90,335 50,295 50,225
                      C50,155 90,115 115,90
                      C140,65 180,50 225,50 Z" 
                   fill="none" stroke="#030D55" stroke-width="1.5"></path>
            </svg>
            
            <!-- Imagen circular -->
            <div class="absolute inset-12 overflow-hidden rounded-full border-2 border-white">
              <img src="{{ get_theme_file_uri('resources/images/nosotros.png') }}" alt="Mujer en terapia" class="w-full h-full object-cover">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section> 