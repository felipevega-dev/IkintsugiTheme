<section class="py-20 bg-[#030D550D] relative">
  <div class="container mx-auto px-4">
    <div class="flex flex-col md:flex-row items-center gap-12">
      <!-- Imagen con borde personalizado -->
      <div class="md:w-1/2 mb-8 md:mb-0">
        <div class="relative overflow-hidden">
          <!-- Borde estilizado similar al hero -->
          <div class="relative inline-block">
            <div class="p-2 rounded-[24px] overflow-hidden">
              <img src="{{ get_theme_file_uri('resources/images/quienesomos.png') }}" alt="Equipo Ikintsugi" class="w-full h-auto rounded-[20px]">
            </div>
          </div>
        </div>
      </div>
      
      <!-- Texto en contenedor específico -->
      <div class="md:w-1/2">
        <div class="w-full md:max-w-[618px] md:h-[532px] flex flex-col gap-6">
          <h2 class="text-4xl md:text-5xl font-bold mb-2 text-[#030D55]" style="font-family: 'Playfair Display', serif;">
            ¿Quiénes somos?
          </h2>
          
          <div class="space-y-6 text-[#181818]" style="font-family: 'Roboto', sans-serif; font-weight: 500; font-size: 16px; line-height: 28px; letter-spacing: 0;">
            <p>
              En Instituto Kintsugi, promovemos la salud mental a través de la psicoeducación y el tratamiento del trauma emocional. Inspirados en el arte japonés de reparar con oro, creemos en la resiliencia y transformación.
            </p>
            
            <p>
              Somos especialistas en terapia EMDR, un enfoque basado en neurociencia para procesar recuerdos dolorosos y reducir su impacto. Acompañamos a adolescentes, adultos y parejas que enfrentan dificultades emocionales derivadas de experiencias traumáticas.
            </p>
            
            <p>
              Ofrecemos un espacio seguro y empático con terapias respaldadas científicamente, adaptadas a cada persona.
            </p>
            
            <p style="font-family: 'Roboto', sans-serif; font-weight: 700; font-size: 16px; line-height: 28px; letter-spacing: 0;">
              Juntos recuperaremos el control de tus emociones y avanzaremos hacia una vida renovada.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Curva sutil inferior -->
  <div class="absolute bottom-0 left-0 right-0 w-full overflow-hidden" style="height: 70px; z-index: 1;">
    <svg width="100%" height="100%" viewBox="0 0 1440 70" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M0,0 C240,70 480,70 720,35 C960,0 1200,0 1440,35 L1440,70 L0,70 Z" fill="#FFFFFF"></path>
    </svg>
  </div>
</section> 