<section class="py-20 bg-white">
  <div class="container mx-auto px-4">
    <h2 class="text-5xl font-extrabold mb-12 text-center text-[#030D55]" style="font-family: 'Playfair Display', serif; font-size: 48px; line-height: 100%; letter-spacing: 0%;">
      Nuestro blog
    </h2>
    
    <!-- Artículos del blog -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
      <!-- Artículo 1 -->
      <div class="rounded-2xl overflow-hidden w-full max-w-[395px] h-[419px] mx-auto" style="padding: 0;">
        <div class="relative h-full">
          <img src="{{ get_theme_file_uri('resources/images/blog1.png') }}" alt="La presión sobre artistas" class="w-full h-full object-cover">
          <div class="absolute top-3 left-3 text-white py-2.5 px-4 rounded-full text-center w-[201px] h-[40px]" style="background: rgba(3, 13, 85, 0.85);">
            11 de marzo de 2025
          </div>
          <!-- Overlay gradient on the entire image -->
          <div class="absolute inset-0" style="background: linear-gradient(180deg, rgba(171, 39, 122, 0.4) 0%, rgba(3, 13, 85, 0.4) 61%);"></div>
          <!-- Content overlay at bottom -->
          <div class="absolute bottom-0 left-0 right-0 p-4" style="padding-top: 24px; padding-right: 16px; padding-bottom: 24px; padding-left: 16px;">
            <div class="w-full max-w-[363px] gap-4 flex flex-col">
              <h3 class="text-2xl font-bold text-white" style="font-family: 'Playfair Display', serif; font-weight: 700; font-size: 24px; line-height: 100%; letter-spacing: 0%;">
                La presión sobre artistas surcoreanos
              </h3>
              <p class="text-base text-white" style="font-family: 'Roboto', sans-serif; font-weight: 400; font-size: 16px; line-height: 28px; letter-spacing: 0%;">
                La muerte de la actriz surcoreana Kim Sae-ron, de apenas 24 años, encontrada sin vida en su departamento el pasado domingo, volvió a encender...
              </p>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Artículo 2 -->
      <div class="rounded-2xl overflow-hidden w-full max-w-[395px] h-[419px] mx-auto" style="padding: 0;">
        <div class="relative h-full">
          <img src="{{ get_theme_file_uri('resources/images/blog2.png') }}" alt="Jorge López" class="w-full h-full object-cover">
          <div class="absolute top-3 left-3 text-white py-2.5 px-4 rounded-full text-center w-[201px] h-[40px]" style="background: rgba(3, 13, 85, 0.85);">
            11 de marzo de 2025
          </div>
          <!-- Overlay gradient on the entire image -->
          <div class="absolute inset-0" style="background: linear-gradient(180deg, rgba(171, 39, 122, 0.4) 0%, rgba(3, 13, 85, 0.4) 61%);"></div>
          <!-- Content overlay at bottom -->
          <div class="absolute bottom-0 left-0 right-0 p-4" style="padding-top: 24px; padding-right: 16px; padding-bottom: 24px; padding-left: 16px;">
            <div class="w-full max-w-[363px] gap-4 flex flex-col">
              <h3 class="text-2xl font-bold text-white" style="font-family: 'Playfair Display', serif; font-weight: 700; font-size: 24px; line-height: 100%; letter-spacing: 0%;">
                Jorge López rechaza de plano el amor romántico
              </h3>
              <p class="text-base text-white" style="font-family: 'Roboto', sans-serif; font-weight: 400; font-size: 16px; line-height: 28px; letter-spacing: 0%;">
                Durante este pasado fin de semana, en el marco del cierre de las celebraciones del Festival de Viña 2025, el actor chileno radicado en España y jurado...
              </p>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Artículo 3 -->
      <div class="rounded-2xl overflow-hidden w-full max-w-[395px] h-[419px] mx-auto" style="padding: 0;">
        <div class="relative h-full">
          <img src="{{ get_theme_file_uri('resources/images/blog3.png') }}" alt="El síndrome postvacacional" class="w-full h-full object-cover">
          <div class="absolute top-3 left-3 text-white py-2.5 px-4 rounded-full text-center w-[201px] h-[40px]" style="background: #030D55B8;">
            11 de marzo de 2025
          </div>
          <!-- Overlay gradient on the entire image -->
          <div class="absolute inset-0" style="background: linear-gradient(180deg, rgba(171, 39, 122, 0.4) 0%, rgba(3, 13, 85, 0.4) 61%);"></div>
          <!-- Content overlay at bottom -->
          <div class="absolute bottom-0 left-0 right-0 p-4" style="padding-top: 24px; padding-right: 16px; padding-bottom: 24px; padding-left: 16px;">
            <div class="w-full max-w-[363px] gap-4 flex flex-col">
              <h3 class="text-2xl font-bold text-white" style="font-family: 'Playfair Display', serif; font-weight: 700; font-size: 24px; line-height: 100%; letter-spacing: 0%;">
                El síndrome postvacacional: cómo volver a la rutina sin estrés
              </h3>
              <p class="text-base text-white" style="font-family: 'Roboto', sans-serif; font-weight: 400; font-size: 16px; line-height: 28px; letter-spacing: 0%;">
                Las vacaciones llegaron a su fin, el sol se escapó más temprano, las maletas se guardaron y el despertador vuelve a sonar. Llegó el momento de...
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Botón Ver más blogs -->
    <div class="text-center mt-12">
      <a href="{{ home_url('/blog') }}" class="inline-block py-2.5 px-8 text-white rounded-full font-medium w-[277px] h-[47px] text-center" style="background: linear-gradient(90deg, #FF3382 0%, rgba(90, 9, 137, 0.8) 100%); border-radius: 40px; padding: 10px;">
        Ver más blogs
      </a>
    </div>
  </div>
</section> 