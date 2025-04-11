<!-- Header -->
<header class="fixed top-0 left-0 right-0 z-50 transition-all duration-300" id="main-header">
  <style>
    /* Comportamiento básico de submenu */
    .submenu-container {
      opacity: 0;
      visibility: hidden;
      position: absolute;
      left: 50%;
      transform: translateX(-50%);
      transition: all 0.3s ease;
      z-index: 60;
    }
    
    .group:hover .submenu-container {
      opacity: 1;
      visibility: visible;
    }
    
    /* Posicionamiento y animación específica según la fila */
    .top-row .submenu-container {
      bottom: 100%;
      transform: translateX(-50%) translateY(10px);
      margin-bottom: 12px;
    }
    
    .top-row .group:hover .submenu-container {
      transform: translateX(-50%) translateY(0);
    }
    
    .bottom-row .submenu-container {
      top: 100%;
      transform: translateX(-50%) translateY(-10px);
      margin-top: 12px;
    }
    
    .bottom-row .group:hover .submenu-container {
      transform: translateX(-50%) translateY(0);
    }
    
    /* Estilos del submenu horizontal */
    .horizontal-submenu {
      display: flex;
      border-radius: 12px;
      box-shadow: 0 4px 15px rgba(217, 50, 128, 0.15);
      background: white;
      border: 2px solid transparent;
      background-image: linear-gradient(white, white), linear-gradient(to right, #D93280, #AB277A);
      background-origin: border-box;
      background-clip: content-box, border-box;
      overflow: hidden;
    }
    
    .horizontal-submenu-item {
      white-space: nowrap;
      padding: 14px 22px;
      font-weight: 500;
      font-size: 15px;
      color: #030D55;
      transition: all 0.2s ease;
      position: relative;
    }
    
    .horizontal-submenu-item:not(:last-child)::after {
      content: "";
      position: absolute;
      right: 0;
      top: 25%;
      height: 50%;
      width: 1px;
      background: rgba(3, 13, 85, 0.1);
    }
    
    .horizontal-submenu-item:hover {
      background-color: #FBD5E8;
      color: #D93280;
      font-weight: bold;
    }
    
    .horizontal-submenu-item.active {
      background-color: #FBD5E8;
      color: #D93280;
      font-weight: bold;
    }
    
    /* Estilos del header al hacer scroll */
    .header-scrolled {
      background-color: rgba(255, 255, 255, 0.95);
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }
    
    /* Estilo para el menú móvil */
    .mobile-menu {
      position: absolute;
      top: 100%;
      left: 0;
      right: 0;
      width: 100%;
      background: white;
      transform: translateY(-100%);
      transition: all 0.3s ease-in-out;
      z-index: 50;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      border-radius: 0 0 16px 16px;
      opacity: 0;
      visibility: hidden;
      overflow: hidden;
    }
    
    .mobile-menu.active {
      transform: translateY(0);
      opacity: 1;
      visibility: visible;
    }
    
    /* Animación para los submenús móviles */
    .mobile-submenu {
      max-height: 0;
      overflow: hidden;
      transition: max-height 0.3s ease-in-out;
    }
    
    .mobile-submenu.active {
      max-height: 500px; /* Valor suficientemente grande para mostrar todos los ítems */
    }
    
    /* Botón de cerrar menú */
    .close-button {
      width: 32px;
      height: 32px;
      display: flex;
      align-items: center;
      justify-content: center;
      border-radius: 50%;
      background-color: #FBD5E8;
      color: #D93280;
      transition: all 0.2s ease;
    }
    
    .close-button:hover {
      background-color: #D93280;
      color: white;
    }
  </style>
  <div class="container mx-auto px-4">
    @php
      $current_url = home_url($_SERVER['REQUEST_URI']);
      // Detectar si estamos en una página con fondo de hero blanco
      $white_hero_pages = [
        'quienes-somos',
        'que-significa-kintsugi',
        'que-nos-inspira',
        'divulgacion-cientifica',
        'evidencia-cientifica',
        'a-quienes-atendemos',
        'contacto',
        'psicoterapia-emdr',
        'testimonios',
        'beneficios-emdr',
        'tratamiento-emdr',
        'que-esperar',
        'transtornos-y-malestares',
        // Añadir aquí otras páginas con hero de fondo blanco según sea necesario
      ];
      
      $has_white_hero = false;
      foreach ($white_hero_pages as $page) {
        if (strpos($current_url, $page) !== false) {
          $has_white_hero = true;
          break;
        }
      }
      
      // Definir la clase de color para los iconos sociales
      $social_icon_color = $has_white_hero ? 'text-[#030D55]' : 'text-white';
      $social_icon_hover = $has_white_hero ? 'hover:text-[#D93280]' : 'hover:text-[#FBD5E8]';
    @endphp

    <!-- Iconos de redes sociales (arriba del contenedor) -->
    <div class="hidden md:flex justify-end items-center mb-4 pt-4">
      <div class="flex items-center space-x-4">
        @if($has_white_hero)
        <a href="mailto:hola@ikintsugi.cl" class="text-[#030D55] mr-4 border-b border-[#030D55] hover:text-[#D93280] hover:border-[#D93280] transition-all duration-300">
          hola@ikintsugi.cl
        </a>
        @endif
        <a href="https://www.instagram.com/instituto_kintsugi/" class="{{ $social_icon_color }} {{ $social_icon_hover }} transition-all duration-300 transform hover:scale-110">
          <!-- Instagram -->
          <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/>
          </svg>
        </a>
        <a href="https://www.facebook.com/Ikintsugi/" class="{{ $social_icon_color }} {{ $social_icon_hover }} transition-all duration-300 transform hover:scale-110">
          <!-- Facebook -->
          <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
            <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd"></path>
          </svg>
        </a>
        <a href="https://www.youtube.com/@emisorkintsugi" class="{{ $social_icon_color }} {{ $social_icon_hover }} transition-all duration-300 transform hover:scale-110">
          <!-- YouTube -->
          <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
            <path fill-rule="evenodd" d="M19.812 5.418c.861.23 1.538.907 1.768 1.768C21.998 8.746 22 12 22 12s0 3.255-.418 4.814a2.504 2.504 0 0 1-1.768 1.768c-1.56.419-7.814.419-7.814.419s-6.255 0-7.814-.419a2.505 2.505 0 0 1-1.768-1.768C2 15.255 2 12 2 12s0-3.255.417-4.814a2.507 2.507 0 0 1 1.768-1.768C5.744 5 11.998 5 11.998 5s6.255 0 7.814.418ZM15.194 12 10 15V9l5.194 3Z" clip-rule="evenodd" />
          </svg>
        </a>
      </div>
    </div>

    <!-- Contenedor con el menú blanco que contiene todo -->
    <div class="bg-white rounded-lg shadow-[0_4px_15px_rgba(0,0,0,0.20)] pt-3 pb-3 mt-4 relative">
      @php
        $current_url = home_url($_SERVER['REQUEST_URI']);
      @endphp

      <!-- Versión desktop: 3 columnas -->
      <div class="hidden lg:grid grid-cols-3 items-center">
        <!-- Logo (columna izquierda) -->
        <div class="pl-8">
          <a class="flex items-center" href="{{ home_url('/') }}">
            <img 
              src="{{ get_theme_file_uri('resources/images/kintsugi-hero.png') }}" 
              alt="Kintsugi Logo" 
              class="h-12 w-auto"
            >
          </a>
        </div>
        
        <!-- Menú de navegación en dos filas centradas (columna central) -->
        <div class="flex flex-col items-center justify-center">
          <!-- Primera fila de navegación -->
          <nav class="flex justify-center items-center space-x-8 mb-2 top-row">
            <a href="{{ home_url('/') }}" 
               class="text-gray-900 font-roboto text-base px-2 py-1 border-b-2 whitespace-nowrap
                      {{ ($current_url == home_url('/')) 
                         ? 'border-[#D93280] font-bold' 
                         : 'border-transparent hover:border-[#D93280]' }} 
                      transition-all duration-300">
              Inicio
            </a>
            <!-- Menú desplegable para "Quiénes somos" -->
            <div class="relative hover:cursor-pointer group">
              <a href="{{ home_url('/quienes-somos') }}" 
                 class="text-gray-900 font-roboto text-base px-2 py-1 border-b-2 whitespace-nowrap flex items-center
                        {{ (strpos($current_url, 'quienes-somos') !== false || 
                            strpos($current_url, 'que-significa-kintsugi') !== false || 
                            strpos($current_url, 'que-nos-inspira') !== false || 
                            strpos($current_url, 'divulgacion-cientifica') !== false || 
                            strpos($current_url, 'evidencia-cientifica') !== false) 
                           ? 'border-[#D93280] font-bold' 
                           : 'border-transparent hover:border-[#D93280]' }} 
                        transition-all duration-300">
                ¿Quiénes somos?
                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
                </svg>
              </a>
              <!-- Submenú -->
              <div class="top-row submenu-container">
                <div class="horizontal-submenu">
                  <a href="{{ home_url('/que-significa-kintsugi') }}" 
                    class="horizontal-submenu-item {{ (strpos($current_url, 'que-significa-kintsugi') !== false) ? 'active' : '' }}">
                    Qué significa Kintsugi
                  </a>
                  <a href="{{ home_url('/que-nos-inspira') }}" 
                    class="horizontal-submenu-item {{ (strpos($current_url, 'que-nos-inspira') !== false) ? 'active' : '' }}">
                    Qué nos inspira
                  </a>
                  <a href="{{ home_url('/divulgacion-cientifica') }}" 
                    class="horizontal-submenu-item {{ (strpos($current_url, 'divulgacion-cientifica') !== false) ? 'active' : '' }}">
                    Divulgación Científica
                  </a>
                  <a href="{{ home_url('/evidencia-cientifica') }}" 
                    class="horizontal-submenu-item {{ (strpos($current_url, 'evidencia-cientifica') !== false) ? 'active' : '' }}">
                    Evidencia Científica
                  </a>
                </div>
              </div>
            </div>

            <!-- Menú desplegable para "Psicoterapia EMDR" -->
            <div class="relative hover:cursor-pointer group">
              <a href="{{ home_url('/psicoterapia-emdr') }}" 
                 class="text-gray-900 font-roboto text-base px-2 py-1 border-b-2 whitespace-nowrap flex items-center
                        {{ (strpos($current_url, 'psicoterapia-emdr') !== false || 
                            strpos($current_url, 'testimonios') !== false || 
                            strpos($current_url, 'beneficios-emdr') !== false || 
                            strpos($current_url, 'tratamiento-emdr') !== false ||
                            strpos($current_url, 'que-esperar') !== false ||
                            strpos($current_url, 'transtornos-y-malestares') !== false) 
                           ? 'border-[#D93280] font-bold' 
                           : 'border-transparent hover:border-[#D93280]' }} 
                        transition-all duration-300">
                Psicoterapia EMDR
                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path>
                </svg>
              </a>
              <!-- Submenú EMDR -->
              <div class="bottom-row submenu-container">
                <div class="horizontal-submenu">
                  <a href="{{ home_url('/testimonios') }}" 
                     class="horizontal-submenu-item {{ (strpos($current_url, 'testimonios') !== false) ? 'active' : '' }}">
                    Testimonios
                  </a>
                  <a href="{{ home_url('/beneficios-emdr') }}" 
                     class="horizontal-submenu-item {{ (strpos($current_url, 'beneficios-emdr') !== false) ? 'active' : '' }}">
                    Beneficios del EMDR
                  </a>
                  <a href="{{ home_url('/tratamiento-emdr') }}" 
                     class="horizontal-submenu-item {{ (strpos($current_url, 'tratamiento-emdr') !== false) ? 'active' : '' }}">
                    ¿Qué ocurre durante el tratamiento EMDR?
                  </a>
                  <a href="{{ home_url('/que-esperar') }}" 
                     class="horizontal-submenu-item {{ (strpos($current_url, 'que-esperar') !== false) ? 'active' : '' }}">
                    ¿Que esperar de la Psicoterapia?
                  </a>
                  <a href="{{ home_url('/transtornos-y-malestares') }}" 
                     class="horizontal-submenu-item {{ (strpos($current_url, 'transtornos-y-malestares') !== false) ? 'active' : '' }}">
                    Transtornos y malestares
                  </a>
                </div>
              </div>
            </div>

            <a href="{{ home_url('/a-quienes-atendemos') }}" 
               class="text-gray-900 font-roboto text-base px-2 py-1 border-b-2 whitespace-nowrap
                      {{ (strpos($current_url, 'a-quienes-atendemos') !== false) 
                         ? 'border-[#D93280] font-bold' 
                         : 'border-transparent hover:border-[#D93280]' }} 
                      transition-all duration-300">
              ¿A quiénes atendemos?
            </a>
          </nav>
          
          <!-- Segunda fila de navegación -->
          <nav class="flex justify-center items-center space-x-8 bottom-row">
            <a href="{{ home_url('/charlas-y-talleres') }}" 
               class="text-gray-900 font-roboto text-base px-2 py-1 border-b-2 whitespace-nowrap
                      {{ (strpos($current_url, 'charlas-y-talleres') !== false) 
                         ? 'border-[#D93280] font-bold' 
                         : 'border-transparent hover:border-[#D93280]' }} 
                      transition-all duration-300">
              Charlas y talleres
            </a>
            <a href="{{ home_url('/faqs') }}" 
               class="text-gray-900 font-roboto text-base px-2 py-1 border-b-2 whitespace-nowrap
                      {{ (strpos($current_url, 'faqs') !== false) 
                         ? 'border-[#D93280] font-bold' 
                         : 'border-transparent hover:border-[#D93280]' }} 
                      transition-all duration-300">
              FAQ'S
            </a>
            <a href="{{ home_url('/prensa-y-social') }}" 
               class="text-gray-900 font-roboto text-base px-2 py-1 border-b-2 whitespace-nowrap
                      {{ (strpos($current_url, 'prensa-y-social') !== false) 
                         ? 'border-[#D93280] font-bold' 
                         : 'border-transparent hover:border-[#D93280]' }} 
                      transition-all duration-300">
              Prensa y social media
            </a>
            <a href="{{ home_url('/contacto') }}" 
               class="text-gray-900 font-roboto text-base px-2 py-1 border-b-2 whitespace-nowrap
                      {{ (strpos($current_url, 'contacto') !== false) 
                         ? 'border-[#D93280] font-bold' 
                         : 'border-transparent hover:border-[#D93280]' }} 
                      transition-all duration-300">
              Contacto
            </a>
          </nav>
        </div>
        
        <!-- Botón "Reservar Cita" (columna derecha) -->
        <div class="flex justify-end pr-8">
          <a href="{{ home_url('/reservar-cita') }}" 
             class="bg-gradient-to-r from-pink-500 to-purple-600 hover:from-pink-600 hover:to-purple-700 
                    text-white px-6 py-2 rounded-full font-medium transition-all 
                    duration-300 transform hover:scale-105 shadow-md hover:shadow-lg 
                    font-roboto">
            Reservar Cita
          </a>
        </div>
      </div>

      <!-- Versión móvil y tablet: Logo centrado con botón de menú -->
      <div class="flex lg:hidden">
        <div class="flex items-center justify-between w-full px-4">
          <!-- Logo en móvil -->
          <div class="flex-1 flex justify-center">
            <a href="{{ home_url('/') }}">
              <img 
                src="{{ get_theme_file_uri('resources/images/kintsugi-hero.png') }}" 
                alt="Kintsugi Logo" 
                class="h-10 w-auto"
              >
            </a>
          </div>
          
          <!-- Botón de menú móvil integrado en el header -->
          <button class="text-[#D93280] p-2 rounded-full hover:bg-[#FBD5E8] hover:bg-opacity-50 transition-all duration-300" 
                  id="mobile-menu-button">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                    d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
          </button>
        </div>
        
        <!-- Menú móvil (se desliza desde el header) -->
        <div class="mobile-menu w-full" id="mobile-menu">
          <div class="bg-white shadow-md rounded-b-xl overflow-hidden">
            <div class="p-4">
              <div class="flex justify-between items-center border-b border-gray-100 pb-3">
                <a href="{{ home_url('/reservar-cita') }}" 
                  class="bg-gradient-to-r from-pink-500 to-purple-600 hover:from-pink-600 hover:to-purple-700 
                        text-white px-4 py-2 rounded-full font-medium transition-all 
                        duration-300 transform hover:scale-105 shadow-md hover:shadow-lg 
                        font-roboto text-sm">
                  Reservar Cita
                </a>
                <button class="close-button" id="mobile-menu-close">
                  <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" 
                          stroke-width="2" 
                          d="M6 18L18 6M6 6l12 12"></path>
                  </svg>
                </button>
              </div>
              
              <nav class="mt-4 max-h-[70vh] overflow-y-auto">
                <div class="space-y-1">
                  <!-- Enlaces del menú móvil -->
                  <a href="{{ home_url('/') }}" 
                    class="block py-3 border-b border-gray-100 text-gray-900 font-roboto
                          {{ ($current_url == home_url('/')) 
                            ? 'text-[#D93280] font-semibold' 
                            : 'hover:text-[#D93280]' }} 
                          transition-colors duration-300">
                    Inicio
                  </a>
                  
                  <!-- Menú desplegable para Quiénes somos -->
                  <div class="border-b border-gray-100">
                    <div class="flex justify-between items-center py-3 cursor-pointer" id="quienes-somos-toggle">
                      <a href="{{ home_url('/quienes-somos') }}" 
                        class="text-gray-900 font-roboto
                              {{ (strpos($current_url, 'quienes-somos') !== false || 
                                strpos($current_url, 'que-significa-kintsugi') !== false || 
                                strpos($current_url, 'que-nos-inspira') !== false || 
                                strpos($current_url, 'divulgacion-cientifica') !== false || 
                                strpos($current_url, 'evidencia-cientifica') !== false) 
                                ? 'text-[#D93280] font-semibold' 
                                : 'hover:text-[#D93280]' }}">
                        ¿Quiénes somos?
                      </a>
                      <button class="text-[#D93280] bg-[#FBD5E8] bg-opacity-50 p-1 rounded-full transition-transform duration-300" id="quienes-somos-icon">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                      </button>
                    </div>
                    
                    <!-- Submenú (inicialmente oculto) -->
                    <div class="mobile-submenu bg-gray-50 rounded-lg mt-1 mb-2" id="quienes-somos-submenu">
                      <a href="{{ home_url('/que-significa-kintsugi') }}" 
                        class="block py-2 px-4 text-[#030D55] hover:bg-[#FBD5E8] hover:text-[#D93280] transition-all duration-200
                              {{ (strpos($current_url, 'que-significa-kintsugi') !== false) ? 'bg-[#FBD5E8] text-[#D93280] font-semibold' : '' }}">
                        Qué significa Kintsugi
                      </a>
                      <a href="{{ home_url('/que-nos-inspira') }}" 
                        class="block py-2 px-4 text-[#030D55] hover:bg-[#FBD5E8] hover:text-[#D93280] transition-all duration-200
                              {{ (strpos($current_url, 'que-nos-inspira') !== false) ? 'bg-[#FBD5E8] text-[#D93280] font-semibold' : '' }}">
                        Qué nos inspira
                      </a>
                      <a href="{{ home_url('/divulgacion-cientifica') }}" 
                        class="block py-2 px-4 text-[#030D55] hover:bg-[#FBD5E8] hover:text-[#D93280] transition-all duration-200
                              {{ (strpos($current_url, 'divulgacion-cientifica') !== false) ? 'bg-[#FBD5E8] text-[#D93280] font-semibold' : '' }}">
                        Divulgación Científica
                      </a>
                      <a href="{{ home_url('/evidencia-cientifica') }}" 
                        class="block py-2 px-4 text-[#030D55] hover:bg-[#FBD5E8] hover:text-[#D93280] transition-all duration-200
                              {{ (strpos($current_url, 'evidencia-cientifica') !== false) ? 'bg-[#FBD5E8] text-[#D93280] font-semibold' : '' }}">
                        Evidencia Científica
                      </a>
                    </div>
                  </div>
                  
                  <!-- Menú desplegable para EMDR -->
                  <div class="border-b border-gray-100">
                    <div class="flex justify-between items-center py-3 cursor-pointer" id="emdr-toggle">
                      <a href="{{ home_url('/psicoterapia-emdr') }}" 
                        class="text-gray-900 font-roboto
                              {{ (strpos($current_url, 'psicoterapia-emdr') !== false || 
                                strpos($current_url, 'testimonios') !== false || 
                                strpos($current_url, 'beneficios-emdr') !== false || 
                                strpos($current_url, 'tratamiento-emdr') !== false ||
                                strpos($current_url, 'que-esperar') !== false ||
                                strpos($current_url, 'transtornos-y-malestares') !== false) 
                                ? 'text-[#D93280] font-semibold' 
                                : 'hover:text-[#D93280]' }}">
                        Psicoterapia EMDR
                      </a>
                      <button class="text-[#D93280] bg-[#FBD5E8] bg-opacity-50 p-1 rounded-full transition-transform duration-300" id="emdr-icon">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                      </button>
                    </div>
                    
                    <!-- Submenú (inicialmente oculto) -->
                    <div class="mobile-submenu bg-gray-50 rounded-lg mt-1 mb-2" id="emdr-submenu">
                      <a href="{{ home_url('/testimonios') }}" 
                        class="block py-2 px-4 text-[#030D55] hover:bg-[#FBD5E8] hover:text-[#D93280] transition-all duration-200
                              {{ (strpos($current_url, 'testimonios') !== false) ? 'bg-[#FBD5E8] text-[#D93280] font-semibold' : '' }}">
                        Testimonios
                      </a>
                      <a href="{{ home_url('/beneficios-emdr') }}" 
                        class="block py-2 px-4 text-[#030D55] hover:bg-[#FBD5E8] hover:text-[#D93280] transition-all duration-200
                              {{ (strpos($current_url, 'beneficios-emdr') !== false) ? 'bg-[#FBD5E8] text-[#D93280] font-semibold' : '' }}">
                        Beneficios del EMDR
                      </a>
                      <a href="{{ home_url('/tratamiento-emdr') }}" 
                        class="block py-2 px-4 text-[#030D55] hover:bg-[#FBD5E8] hover:text-[#D93280] transition-all duration-200
                              {{ (strpos($current_url, 'tratamiento-emdr') !== false) ? 'bg-[#FBD5E8] text-[#D93280] font-semibold' : '' }}">
                        ¿Qué ocurre durante el tratamiento EMDR?
                      </a>
                      <a href="{{ home_url('/que-esperar') }}" 
                        class="block py-2 px-4 text-[#030D55] hover:bg-[#FBD5E8] hover:text-[#D93280] transition-all duration-200
                              {{ (strpos($current_url, 'que-esperar') !== false) ? 'bg-[#FBD5E8] text-[#D93280] font-semibold' : '' }}">
                        ¿Que esperar de la Psicoterapia?
                      </a>
                      <a href="{{ home_url('/transtornos-y-malestares') }}" 
                        class="block py-2 px-4 text-[#030D55] hover:bg-[#FBD5E8] hover:text-[#D93280] transition-all duration-200
                              {{ (strpos($current_url, 'transtornos-y-malestares') !== false) ? 'bg-[#FBD5E8] text-[#D93280] font-semibold' : '' }}">
                        Transtornos y malestares
                      </a>
                    </div>
                  </div>
                  
                  <!-- Enlaces restantes -->
                  <a href="{{ home_url('/a-quienes-atendemos') }}" 
                    class="block py-3 border-b border-gray-100 text-gray-900 font-roboto
                          {{ (strpos($current_url, 'a-quienes-atendemos') !== false) 
                            ? 'text-[#D93280] font-semibold' 
                            : 'hover:text-[#D93280]' }} 
                          transition-colors duration-300">
                    ¿A quiénes atendemos?
                  </a>
                  <a href="{{ home_url('/charlas-y-talleres') }}" 
                    class="block py-3 border-b border-gray-100 text-gray-900 font-roboto
                          {{ (strpos($current_url, 'charlas-y-talleres') !== false) 
                            ? 'text-[#D93280] font-semibold' 
                            : 'hover:text-[#D93280]' }} 
                          transition-colors duration-300">
                    Charlas y talleres
                  </a>
                  <a href="{{ home_url('/faqs') }}" 
                    class="block py-3 border-b border-gray-100 text-gray-900 font-roboto
                          {{ (strpos($current_url, 'faqs') !== false) 
                            ? 'text-[#D93280] font-semibold' 
                            : 'hover:text-[#D93280]' }} 
                          transition-colors duration-300">
                    FAQ'S
                  </a>
                  <a href="{{ home_url('/prensa-y-social') }}" 
                    class="block py-3 border-b border-gray-100 text-gray-900 font-roboto
                          {{ (strpos($current_url, 'prensa-y-social') !== false) 
                            ? 'text-[#D93280] font-semibold' 
                            : 'hover:text-[#D93280]' }} 
                          transition-colors duration-300">
                    Prensa y social media
                  </a>
                  <a href="{{ home_url('/contacto') }}" 
                    class="block py-3 text-gray-900 font-roboto
                          {{ (strpos($current_url, 'contacto') !== false) 
                            ? 'text-[#D93280] font-semibold' 
                            : 'hover:text-[#D93280]' }} 
                          transition-colors duration-300">
                    Contacto
                  </a>
                </div>
              </nav>
              
              <!-- Redes sociales en el menú móvil -->
              <div class="mt-6 flex justify-center space-x-4 border-t border-gray-100 pt-4">
                <a href="https://www.instagram.com/instituto_kintsugi/" aria-label="Instagram" class="text-[#362766] hover:text-[#D93280] transition-all duration-300">
                  <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069z"/>
                  </svg>
                </a>
                <a href="https://www.facebook.com/Ikintsugi/" aria-label="Facebook" class="text-[#362766] hover:text-[#D93280] transition-all duration-300">
                  <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd"/>
                  </svg>
                </a>
                <a href="https://www.youtube.com/@emisorkintsugi" aria-label="YouTube" class="text-[#362766] hover:text-[#D93280] transition-all duration-300">
                  <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path fill-rule="evenodd" d="M19.812 5.418c.861.23 1.538.907 1.768 1.768C21.998 8.746 22 12 22 12s0 3.255-.418 4.814a2.504 2.504 0 0 1-1.768 1.768c-1.56.419-7.814.419-7.814.419s-6.255 0-7.814-.419a2.505 2.505 0 0 1-1.768-1.768C2 15.255 2 12 2 12s0-3.255.417-4.814a2.507 2.507 0 0 1 1.768-1.768C5.744 5 11.998 5 11.998 5s6.255 0 7.814.418ZM15.194 12 10 15V9l5.194 3Z" clip-rule="evenodd"/>
                  </svg>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>

<!-- Script para controlar el menú móvil -->
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const header = document.getElementById('main-header');
    const menuButton = document.getElementById('mobile-menu-button');
    const menuClose = document.getElementById('mobile-menu-close');
    const mobileMenu = document.getElementById('mobile-menu');
    
    // Elementos para el submenú de Quiénes Somos
    const quienesSomosToggle = document.getElementById('quienes-somos-toggle');
    const quienesSomosIcon = document.getElementById('quienes-somos-icon');
    const quienesSomosSubmenu = document.getElementById('quienes-somos-submenu');
    
    // Elementos para el submenú de EMDR
    const emdrToggle = document.getElementById('emdr-toggle');
    const emdrIcon = document.getElementById('emdr-icon');
    const emdrSubmenu = document.getElementById('emdr-submenu');
    
    // Función para manejar el scroll y añadir efectos al header
    function handleScroll() {
      if (window.scrollY > 50) {
        header.classList.add('header-scrolled');
      } else {
        header.classList.remove('header-scrolled');
      }
    }
    
    // Aplicar padding al body para compensar el header fijo
    function adjustBodyPadding() {
      // Esperar a que todos los estilos se hayan aplicado
      setTimeout(() => {
        const headerHeight = header.offsetHeight;
        document.body.style.paddingTop = `${headerHeight}px`;
      }, 100);
    }
    
    // Ajustar el padding inicial
    adjustBodyPadding();
    
    // Reajustar el padding cuando cambia el tamaño de la ventana
    window.addEventListener('resize', adjustBodyPadding);
    
    // Escuchar eventos de scroll
    window.addEventListener('scroll', handleScroll);
    
    // Verificar la posición inicial del scroll
    handleScroll();
    
    // Función para abrir el menú móvil
    function openMobileMenu() {
      // Resetear primero para asegurar que la animación funcione siempre
      mobileMenu.style.transition = 'none';
      mobileMenu.classList.remove('active');
      
      // Forzar un reflow para que el navegador procese los cambios
      void mobileMenu.offsetWidth;
      
      // Restaurar la transición y activar el menú
      mobileMenu.style.transition = 'all 0.3s ease-in-out';
      mobileMenu.classList.add('active');
    }
    
    // Función para cerrar el menú móvil
    function closeMobileMenu() {
      // Asegurar que la transición esté activada
      mobileMenu.style.transition = 'all 0.3s ease-in-out';
      mobileMenu.classList.remove('active');
    }
    
    // Función para alternar los submenús
    function toggleSubmenu(toggle, icon, submenu) {
      toggle.addEventListener('click', function(e) {
        // Prevenir que el enlace se active si se hace clic en el botón
        if (e.target.closest('button')) {
          e.preventDefault();
        }
        
        // Rotar el icono
        icon.classList.toggle('rotate-180');
        
        // Alternar la clase active del submenú
        submenu.classList.toggle('active');
      });
    }
    
    // Inicializar los controladores de eventos
    if (menuButton && mobileMenu && menuClose) {
      menuButton.addEventListener('click', openMobileMenu);
      menuClose.addEventListener('click', closeMobileMenu);
      
      // Configurar los submenús
      if (quienesSomosToggle && quienesSomosIcon && quienesSomosSubmenu) {
        toggleSubmenu(quienesSomosToggle, quienesSomosIcon, quienesSomosSubmenu);
      }
      
      if (emdrToggle && emdrIcon && emdrSubmenu) {
        toggleSubmenu(emdrToggle, emdrIcon, emdrSubmenu);
      }
    }
  });
</script>
