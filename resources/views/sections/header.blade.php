<header class="relative bg-kintsugi-purple-900 text-gray-900 py-6">
  <div class="container mx-auto px-4">
    <!-- Iconos de redes sociales en la parte superior derecha -->
    <div class="absolute top-2 right-6 z-10">
      <div class="flex items-center space-x-4">
        <a href="#" class="text-white hover:text-kintsugi-pink-300 transition-all duration-300 transform hover:scale-110">
          <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
            <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63z" clip-rule="evenodd"></path>
          </svg>
        </a>
        <a href="#" class="text-white hover:text-kintsugi-pink-300 transition-all duration-300 transform hover:scale-110">
          <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
            <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd"></path>
          </svg>
        </a>
        <a href="#" class="text-white hover:text-kintsugi-pink-300 transition-all duration-300 transform hover:scale-110">
          <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
            <path fill-rule="evenodd" d="M19.812 5.418c.861.23 1.538.907 1.768 1.768C21.998 8.746 22 12 22 12s0 3.255-.418 4.814a2.504 2.504 0 0 1-1.768 1.768c-1.56.419-7.814.419-7.814.419s-6.255 0-7.814-.419a2.505 2.505 0 0 1-1.768-1.768C2 15.255 2 12 2 12s0-3.255.417-4.814a2.507 2.507 0 0 1 1.768-1.768C5.744 5 11.998 5 11.998 5s6.255 0 7.814.418ZM15.194 12 10 15V9l5.194 3Z" clip-rule="evenodd" />
          </svg>
        </a>
      </div>
    </div>
    
    <!-- Menú principal con fondo blanco -->
    <div class="bg-white rounded-full shadow-md">
      <div class="flex items-center justify-between py-2 px-8">
        <!-- Logo -->
        <a class="flex items-center my-auto" href="{{ home_url('/') }}">
          <img src="{{ get_theme_file_uri('resources/images/kintsugi-hero.png') }}" alt="Kintsugi Logo" class="h-12 w-auto">
        </a>

        <!-- Navegación principal (texto negro) -->
        <nav class="flex-1 flex flex-wrap justify-center items-center space-x-4 mx-6">
          @php
            $current_url = home_url($_SERVER['REQUEST_URI']);
          @endphp
          
          <a href="{{ home_url('/') }}" 
             class="text-gray-900 font-roboto text-sm px-2 py-1 border-b-2 {{ ($current_url == home_url('/')) ? 'border-kintsugi-pink-700 font-medium' : 'border-transparent hover:border-kintsugi-pink-700' }} transition-all duration-300">
            Inicio
          </a>
          <a href="{{ home_url('/quienes-somos') }}" 
             class="text-gray-900 font-roboto text-sm px-2 py-1 border-b-2 {{ (strpos($current_url, 'quienes-somos') !== false) ? 'border-kintsugi-pink-700 font-medium' : 'border-transparent hover:border-kintsugi-pink-700' }} transition-all duration-300">
            ¿Quienes somos?
          </a>
          <a href="{{ home_url('/psicoterapia-emdr') }}" 
             class="text-gray-900 font-roboto text-sm px-2 py-1 border-b-2 {{ (strpos($current_url, 'psicoterapia-emdr') !== false) ? 'border-kintsugi-pink-700 font-medium' : 'border-transparent hover:border-kintsugi-pink-700' }} transition-all duration-300">
            Psicoterapia EMDR
          </a>
          <a href="{{ home_url('/a-quienes-atendemos') }}" 
             class="text-gray-900 font-roboto text-sm px-2 py-1 border-b-2 {{ (strpos($current_url, 'a-quienes-atendemos') !== false) ? 'border-kintsugi-pink-700 font-medium' : 'border-transparent hover:border-kintsugi-pink-700' }} transition-all duration-300">
            ¿A quienes atendemos?
          </a>
        </nav>
        
        <!-- Calendario y botón de cita -->
        <div class="flex items-center space-x-4 my-auto">
          <a href="#" class="text-gray-900 hover:text-kintsugi-pink-700 transition-all duration-300 transform hover:scale-110">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
          </a>
          <a href="{{ home_url('/reservar-cita') }}" class="bg-gradient-to-r from-kintsugi-pink-700 to-kintsugi-pink-500 hover:from-kintsugi-pink-600 hover:to-kintsugi-pink-400 text-white px-5 py-2 rounded-full font-medium transition-all duration-300 transform hover:scale-105 shadow-md hover:shadow-lg font-roboto">
            Reservar Cita
          </a>
        </div>
      </div>
      
      <!-- Segunda línea de navegación -->
      <div class="flex justify-center pb-3 px-8">
        <nav class="flex items-center space-x-4">
          <a href="{{ home_url('/charlas-y-talleres') }}" 
             class="text-gray-900 font-roboto text-sm px-2 py-1 border-b-2 {{ (strpos($current_url, 'charlas-y-talleres') !== false) ? 'border-kintsugi-pink-700 font-medium' : 'border-transparent hover:border-kintsugi-pink-700' }} transition-all duration-300">
            Charlas y talleres
          </a>
          <a href="{{ home_url('/faqs') }}" 
             class="text-gray-900 font-roboto text-sm px-2 py-1 border-b-2 {{ (strpos($current_url, 'faqs') !== false) ? 'border-kintsugi-pink-700 font-medium' : 'border-transparent hover:border-kintsugi-pink-700' }} transition-all duration-300">
            FAQ'S
          </a>
          <a href="{{ home_url('/prensa-y-social') }}" 
             class="text-gray-900 font-roboto text-sm px-2 py-1 border-b-2 {{ (strpos($current_url, 'prensa-y-social') !== false) ? 'border-kintsugi-pink-700 font-medium' : 'border-transparent hover:border-kintsugi-pink-700' }} transition-all duration-300">
            Prensa y social media
          </a>
          <a href="{{ home_url('/contacto') }}" 
             class="text-gray-900 font-roboto text-sm px-2 py-1 border-b-2 {{ (strpos($current_url, 'contacto') !== false) ? 'border-kintsugi-pink-700 font-medium' : 'border-transparent hover:border-kintsugi-pink-700' }} transition-all duration-300">
            Contacto
          </a>
        </nav>
      </div>
    </div>
  </div>
</header>

<!-- Botón de menú móvil (visible solo en móviles) -->
<div class="fixed bottom-4 right-4 lg:hidden z-50">
  <button class="bg-gradient-to-r from-kintsugi-pink-700 to-kintsugi-pink-500 text-white p-3 rounded-full shadow-lg transition-all duration-300 transform hover:scale-110" id="mobile-menu-button">
    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
    </svg>
  </button>
</div>

<!-- Menú móvil (oculto por defecto) -->
<div class="fixed inset-0 bg-black bg-opacity-75 z-40 hidden" id="mobile-menu">
  <div class="h-full w-full flex items-center justify-center">
    <div class="bg-white rounded-lg p-8 max-w-sm w-full">
      <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-bold text-kintsugi-blue-900 font-roboto">Menú</h2>
        <button class="text-gray-700 hover:text-kintsugi-pink-700 transition-all duration-300 transform hover:scale-110" id="mobile-menu-close">
          <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
          </svg>
        </button>
      </div>
      <nav class="flex flex-col space-y-4">
        <a href="{{ home_url('/') }}" class="text-gray-900 font-roboto py-2 border-b border-gray-200 {{ ($current_url == home_url('/')) ? 'text-kintsugi-pink-700 font-medium' : 'hover:text-kintsugi-pink-700' }} transition-colors duration-300">Inicio</a>
        <a href="{{ home_url('/quienes-somos') }}" class="text-gray-900 font-roboto py-2 border-b border-gray-200 {{ (strpos($current_url, 'quienes-somos') !== false) ? 'text-kintsugi-pink-700 font-medium' : 'hover:text-kintsugi-pink-700' }} transition-colors duration-300">¿Quienes somos?</a>
        <a href="{{ home_url('/psicoterapia-emdr') }}" class="text-gray-900 font-roboto py-2 border-b border-gray-200 {{ (strpos($current_url, 'psicoterapia-emdr') !== false) ? 'text-kintsugi-pink-700 font-medium' : 'hover:text-kintsugi-pink-700' }} transition-colors duration-300">Psicoterapia EMDR</a>
        <a href="{{ home_url('/a-quienes-atendemos') }}" class="text-gray-900 font-roboto py-2 border-b border-gray-200 {{ (strpos($current_url, 'a-quienes-atendemos') !== false) ? 'text-kintsugi-pink-700 font-medium' : 'hover:text-kintsugi-pink-700' }} transition-colors duration-300">¿A quienes atendemos?</a>
        <a href="{{ home_url('/charlas-y-talleres') }}" class="text-gray-900 font-roboto py-2 border-b border-gray-200 {{ (strpos($current_url, 'charlas-y-talleres') !== false) ? 'text-kintsugi-pink-700 font-medium' : 'hover:text-kintsugi-pink-700' }} transition-colors duration-300">Charlas y talleres</a>
        <a href="{{ home_url('/faqs') }}" class="text-gray-900 font-roboto py-2 border-b border-gray-200 {{ (strpos($current_url, 'faqs') !== false) ? 'text-kintsugi-pink-700 font-medium' : 'hover:text-kintsugi-pink-700' }} transition-colors duration-300">FAQ'S</a>
        <a href="{{ home_url('/prensa-y-social') }}" class="text-gray-900 font-roboto py-2 border-b border-gray-200 {{ (strpos($current_url, 'prensa-y-social') !== false) ? 'text-kintsugi-pink-700 font-medium' : 'hover:text-kintsugi-pink-700' }} transition-colors duration-300">Prensa y social media</a>
        <a href="{{ home_url('/contacto') }}" class="text-gray-900 font-roboto py-2 {{ (strpos($current_url, 'contacto') !== false) ? 'text-kintsugi-pink-700 font-medium' : 'hover:text-kintsugi-pink-700' }} transition-colors duration-300">Contacto</a>
      </nav>
      <div class="mt-6">
        <a href="{{ home_url('/reservar-cita') }}" class="bg-gradient-to-r from-kintsugi-pink-700 to-kintsugi-pink-500 hover:from-kintsugi-pink-600 hover:to-kintsugi-pink-400 text-white px-4 py-2 rounded-full font-medium transition-all duration-300 transform hover:scale-105 shadow-md hover:shadow-lg font-roboto block text-center">
          Reservar Cita
        </a>
      </div>
    </div>
  </div>
</div>

<script>
  // Script para controlar el menú móvil
  document.addEventListener('DOMContentLoaded', function() {
    const menuButton = document.getElementById('mobile-menu-button');
    const menuClose = document.getElementById('mobile-menu-close');
    const mobileMenu = document.getElementById('mobile-menu');
    
    if (menuButton && mobileMenu && menuClose) {
      menuButton.addEventListener('click', function() {
        mobileMenu.classList.remove('hidden');
        document.body.style.overflow = 'hidden'; // Evitar scroll
      });
      
      menuClose.addEventListener('click', function() {
        mobileMenu.classList.add('hidden');
        document.body.style.overflow = ''; // Restaurar scroll
      });
    }
  });
</script>
