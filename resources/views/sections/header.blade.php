<!-- Header -->
<header class="bg-[#362766] py-4">
  <div class="container mx-auto px-4">
    <!-- Contenedor con el menú blanco que contiene todo -->
    <div class="bg-white rounded-lg shadow-md">
      @php
        $current_url = home_url($_SERVER['REQUEST_URI']);
      @endphp

      <!-- Fila superior: Logo y Reservar Cita -->
      <div class="flex items-center justify-between px-8 pt-4">
        <!-- Logo -->
        <a class="flex items-center" href="{{ home_url('/') }}">
          <img 
            src="{{ get_theme_file_uri('resources/images/kintsugi-hero.png') }}" 
            alt="Kintsugi Logo" 
            class="h-12 w-auto"
          >
        </a>

        <!-- Redes sociales y Botón Reservar -->
        <div class="flex items-center space-x-4">
          <!-- Íconos de redes -->
          <a href="#" class="text-[#362766] hover:text-[#D93280] transition-all duration-300 transform hover:scale-110">
            <!-- Instagram -->
            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
              <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/>
            </svg>
          </a>
          <a href="#" class="text-[#362766] hover:text-[#D93280] transition-all duration-300 transform hover:scale-110">
            <!-- Facebook -->
            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
              <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd"></path>
            </svg>
          </a>
          <a href="#" class="text-[#362766] hover:text-[#D93280] transition-all duration-300 transform hover:scale-110">
            <!-- YouTube -->
            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
              <path fill-rule="evenodd" d="M19.812 5.418c.861.23 1.538.907 1.768 1.768C21.998 8.746 22 12 22 12s0 3.255-.418 4.814a2.504 2.504 0 0 1-1.768 1.768c-1.56.419-7.814.419-7.814.419s-6.255 0-7.814-.419a2.505 2.505 0 0 1-1.768-1.768C2 15.255 2 12 2 12s0-3.255.417-4.814a2.507 2.507 0 0 1 1.768-1.768C5.744 5 11.998 5 11.998 5s6.255 0 7.814.418ZM15.194 12 10 15V9l5.194 3Z" clip-rule="evenodd" />
            </svg>
          </a>

          <!-- Botón "Reservar Cita" -->
          <a href="{{ home_url('/reservar-cita') }}" 
             class="bg-gradient-to-r from-[#D93280] to-[#F472B6] hover:from-[#EC4899] hover:to-[#F9A8D4] 
                    text-white px-5 py-2 rounded-full font-medium transition-all 
                    duration-300 transform hover:scale-105 shadow-md hover:shadow-lg 
                    font-roboto">
            Reservar Cita
          </a>
        </div>
      </div>

      <!-- Línea de navegación (una sola) -->
      <div class="flex justify-center py-3 px-8">
        <nav class="flex flex-wrap justify-center items-center space-x-6">
          <a href="{{ home_url('/') }}" 
             class="text-gray-900 font-roboto text-sm px-2 py-1 border-b-2 
                    {{ ($current_url == home_url('/')) 
                       ? 'border-[#D93280] font-medium' 
                       : 'border-transparent hover:border-[#D93280]' }} 
                    transition-all duration-300">
            Inicio
          </a>
          <a href="{{ home_url('/quienes-somos') }}" 
             class="text-gray-900 font-roboto text-sm px-2 py-1 border-b-2 
                    {{ (strpos($current_url, 'quienes-somos') !== false) 
                       ? 'border-[#D93280] font-medium' 
                       : 'border-transparent hover:border-[#D93280]' }} 
                    transition-all duration-300">
            ¿Quienes somos?
          </a>
          <a href="{{ home_url('/psicoterapia-emdr') }}" 
             class="text-gray-900 font-roboto text-sm px-2 py-1 border-b-2 
                    {{ (strpos($current_url, 'psicoterapia-emdr') !== false) 
                       ? 'border-[#D93280] font-medium' 
                       : 'border-transparent hover:border-[#D93280]' }} 
                    transition-all duration-300">
            Psicoterapia EMDR
          </a>
          <a href="{{ home_url('/a-quienes-atendemos') }}" 
             class="text-gray-900 font-roboto text-sm px-2 py-1 border-b-2 
                    {{ (strpos($current_url, 'a-quienes-atendemos') !== false) 
                       ? 'border-[#D93280] font-medium' 
                       : 'border-transparent hover:border-[#D93280]' }} 
                    transition-all duration-300">
            ¿A quienes atendemos?
          </a>
          <a href="{{ home_url('/charlas-y-talleres') }}" 
             class="text-gray-900 font-roboto text-sm px-2 py-1 border-b-2 
                    {{ (strpos($current_url, 'charlas-y-talleres') !== false) 
                       ? 'border-[#D93280] font-medium' 
                       : 'border-transparent hover:border-[#D93280]' }} 
                    transition-all duration-300">
            Charlas y talleres
          </a>
          <a href="{{ home_url('/faqs') }}" 
             class="text-gray-900 font-roboto text-sm px-2 py-1 border-b-2 
                    {{ (strpos($current_url, 'faqs') !== false) 
                       ? 'border-[#D93280] font-medium' 
                       : 'border-transparent hover:border-[#D93280]' }} 
                    transition-all duration-300">
            FAQ'S
          </a>
          <a href="{{ home_url('/prensa-y-social') }}" 
             class="text-gray-900 font-roboto text-sm px-2 py-1 border-b-2 
                    {{ (strpos($current_url, 'prensa-y-social') !== false) 
                       ? 'border-[#D93280] font-medium' 
                       : 'border-transparent hover:border-[#D93280]' }} 
                    transition-all duration-300">
            Prensa y social media
          </a>
          <a href="{{ home_url('/contacto') }}" 
             class="text-gray-900 font-roboto text-sm px-2 py-1 border-b-2 
                    {{ (strpos($current_url, 'contacto') !== false) 
                       ? 'border-[#D93280] font-medium' 
                       : 'border-transparent hover:border-[#D93280]' }} 
                    transition-all duration-300">
            Contacto
          </a>
        </nav>
      </div>
    </div>
  </div>
</header>

<!-- Botón de menú móvil (sólo en pantallas pequeñas) -->
<div class="fixed bottom-4 right-4 lg:hidden z-50">
  <button class="bg-gradient-to-r from-[#D93280] to-[#F472B6] text-white p-3 rounded-full shadow-lg 
                 transition-all duration-300 transform hover:scale-110" 
          id="mobile-menu-button">
    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
            d="M4 6h16M4 12h16M4 18h16"></path>
    </svg>
  </button>
</div>

<!-- Menú móvil (overlay oculto por defecto) -->
<div class="fixed inset-0 bg-black bg-opacity-75 z-40 hidden" id="mobile-menu">
  <div class="h-full w-full flex items-center justify-center">
    <div class="bg-white rounded-lg p-8 max-w-sm w-full">
      <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-bold text-[#002060] font-roboto">Menú</h2>
        <button class="text-gray-700 hover:text-[#D93280] transition-all duration-300 transform hover:scale-110" 
                id="mobile-menu-close">
          <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" 
                  stroke-width="2" 
                  d="M6 18L18 6M6 6l12 12"></path>
          </svg>
        </button>
      </div>
      <nav class="flex flex-col space-y-4">
        <!-- Enlaces móviles, mismo orden que en desktop -->
        <a href="{{ home_url('/') }}" 
           class="text-gray-900 font-roboto py-2 border-b border-gray-200 
                  {{ ($current_url == home_url('/')) 
                     ? 'text-[#D93280] font-medium' 
                     : 'hover:text-[#D93280]' }} 
                  transition-colors duration-300">
          Inicio
        </a>
        <a href="{{ home_url('/quienes-somos') }}" 
           class="text-gray-900 font-roboto py-2 border-b border-gray-200 
                  {{ (strpos($current_url, 'quienes-somos') !== false) 
                     ? 'text-[#D93280] font-medium' 
                     : 'hover:text-[#D93280]' }} 
                  transition-colors duration-300">
          ¿Quienes somos?
        </a>
        <a href="{{ home_url('/psicoterapia-emdr') }}" 
           class="text-gray-900 font-roboto py-2 border-b border-gray-200 
                  {{ (strpos($current_url, 'psicoterapia-emdr') !== false) 
                     ? 'text-[#D93280] font-medium' 
                     : 'hover:text-[#D93280]' }} 
                  transition-colors duration-300">
          Psicoterapia EMDR
        </a>
        <a href="{{ home_url('/a-quienes-atendemos') }}" 
           class="text-gray-900 font-roboto py-2 border-b border-gray-200 
                  {{ (strpos($current_url, 'a-quienes-atendemos') !== false) 
                     ? 'text-[#D93280] font-medium' 
                     : 'hover:text-[#D93280]' }} 
                  transition-colors duration-300">
          ¿A quienes atendemos?
        </a>
        <a href="{{ home_url('/charlas-y-talleres') }}" 
           class="text-gray-900 font-roboto py-2 border-b border-gray-200 
                  {{ (strpos($current_url, 'charlas-y-talleres') !== false) 
                     ? 'text-[#D93280] font-medium' 
                     : 'hover:text-[#D93280]' }} 
                  transition-colors duration-300">
          Charlas y talleres
        </a>
        <a href="{{ home_url('/faqs') }}" 
           class="text-gray-900 font-roboto py-2 border-b border-gray-200 
                  {{ (strpos($current_url, 'faqs') !== false) 
                     ? 'text-[#D93280] font-medium' 
                     : 'hover:text-[#D93280]' }} 
                  transition-colors duration-300">
          FAQ'S
        </a>
        <a href="{{ home_url('/prensa-y-social') }}" 
           class="text-gray-900 font-roboto py-2 border-b border-gray-200 
                  {{ (strpos($current_url, 'prensa-y-social') !== false) 
                     ? 'text-[#D93280] font-medium' 
                     : 'hover:text-[#D93280]' }} 
                  transition-colors duration-300">
          Prensa y social media
        </a>
        <a href="{{ home_url('/contacto') }}" 
           class="text-gray-900 font-roboto py-2 
                  {{ (strpos($current_url, 'contacto') !== false) 
                     ? 'text-[#D93280] font-medium' 
                     : 'hover:text-[#D93280]' }} 
                  transition-colors duration-300">
          Contacto
        </a>
      </nav>
      <div class="mt-6">
        <a href="{{ home_url('/reservar-cita') }}" 
           class="bg-gradient-to-r from-[#D93280] to-[#F472B6] hover:from-[#EC4899] hover:to-[#F9A8D4] 
                  text-white px-4 py-2 rounded-full font-medium transition-all 
                  duration-300 transform hover:scale-105 shadow-md hover:shadow-lg 
                  font-roboto block text-center">
          Reservar Cita
        </a>
      </div>
    </div>
  </div>
</div>

<!-- Script para controlar el menú móvil -->
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const menuButton = document.getElementById('mobile-menu-button');
    const menuClose = document.getElementById('mobile-menu-close');
    const mobileMenu = document.getElementById('mobile-menu');
    
    if (menuButton && mobileMenu && menuClose) {
      // Abrir menú móvil
      menuButton.addEventListener('click', function() {
        mobileMenu.classList.remove('hidden');
        document.body.style.overflow = 'hidden'; // Evitar scroll en el fondo
      });
      
      // Cerrar menú móvil
      menuClose.addEventListener('click', function() {
        mobileMenu.classList.add('hidden');
        document.body.style.overflow = ''; // Restaurar scroll
      });
    }
  });
</script>
