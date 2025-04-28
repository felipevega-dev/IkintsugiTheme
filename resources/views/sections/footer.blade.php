<!-- Footer Superior -->
<footer class="relative bg-gradient-to-r from-[rgba(223,152,163,0.6)] to-[rgba(204,160,224,0.6)] overflow-hidden py-12">
  <div class="container mx-auto relative px-4" style="max-width: 1512px;">
    <!-- Grid principal -->
    <div class="grid grid-cols-1 md:grid-cols-12 gap-8 md:gap-6 relative">
      <!-- Columna 1: Logo, redes y frase -->
      <div class="flex flex-col items-center md:items-start md:col-span-3 pl-0 md:pl-12">
        <!-- Logo -->
        <div class="mb-6 transition-transform duration-300 hover:scale-110">
          <img src="{{ get_theme_file_uri('resources/images/kintsugi-hero-azul.png') }}" alt="Logo" class="w-48 md:w-56 h-auto">
        </div>
        
        <!-- Redes sociales -->
        <h3 class="text-[#AB277A] font-medium mb-4 text-xl text-center md:text-left" style="font-family: 'Roboto', sans-serif;">
          Síguenos
        </h3>
        
        <!-- Iconos sociales con dropdown -->
        <div class="flex justify-center md:justify-start space-x-6 items-center mb-6 w-full">
          <!-- Instagram -->
          <div class="relative group" x-data="{ open: false }" @click.away="open = false">
            <a href="https://www.instagram.com/instituto_kintsugi/" target="_blank" rel="noopener" 
               class="text-[#181818] hover:text-[#AB277A] transition-colors duration-300 block md:cursor-pointer"
               @click.prevent="$event.target.closest('.group').querySelector('.dropdown-menu').classList.toggle('active')">
              <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/>
              </svg>
            </a>
            <div class="dropdown-menu absolute left-0 mt-2 w-48 bg-white rounded-lg shadow-lg opacity-0 invisible md:group-hover:opacity-100 md:group-hover:visible transition-all duration-300 z-50">
              <a href="https://www.instagram.com/psicologa_shenhui/" target="_blank" rel="noopener" class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#AB277A] hover:text-white">@psicologa_shenhui</a>
              <a href="https://www.instagram.com/psicologo_juliocesar/" target="_blank" rel="noopener" class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#AB277A] hover:text-white">@psicologo_juliocesar</a>
            </div>
          </div>

          <!-- Facebook -->
          <div class="relative group" x-data="{ open: false }" @click.away="open = false">
            <a href="https://www.facebook.com/Ikintsugi/" target="_blank" rel="noopener" 
               class="text-[#181818] hover:text-[#AB277A] transition-colors duration-300 block md:cursor-pointer"
               @click.prevent="$event.target.closest('.group').querySelector('.dropdown-menu').classList.toggle('active')">
              <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                <path d="M22.675 0h-21.35c-.732 0-1.325.593-1.325 1.325v21.351c0 .731.593 1.324 1.325 1.324h11.495v-9.294h-3.128v-3.622h3.128v-2.671c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.313h3.587l-.467 3.622h-3.12v9.293h6.116c.73 0 1.323-.593 1.323-1.325v-21.35c0-.732-.593-1.325-1.325-1.325z"/>
              </svg>
            </a>
            <div class="dropdown-menu absolute left-0 mt-2 w-48 bg-white rounded-lg shadow-lg opacity-0 invisible md:group-hover:opacity-100 md:group-hover:visible transition-all duration-300 z-50">
              <a href="https://www.facebook.com/profile.php?id=100063555630096" target="_blank" rel="noopener" class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#AB277A] hover:text-white">Psicóloga Shénhui</a>
              <a href="https://www.facebook.com/profile.php?id=100063467988484" target="_blank" rel="noopener" class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#AB277A] hover:text-white">Psicólogo Julio César</a>
            </div>
          </div>

          <!-- LinkedIn -->
          <div class="relative group">
            <div class="text-[#181818] hover:text-[#AB277A] transition-colors duration-300 block cursor-pointer"
                 onclick="toggleDropdown(this)">
              <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
              </svg>
            </div>
            <div class="dropdown-menu absolute left-0 mt-2 w-48 bg-white rounded-lg shadow-lg opacity-0 invisible md:group-hover:opacity-100 md:group-hover:visible transition-all duration-300 z-50">
              <a href="https://www.linkedin.com/newsletters/7085405873988083712/" target="_blank" rel="noopener" class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#AB277A] hover:text-white">Newsletter Shénhui</a>
              <a href="https://www.linkedin.com/newsletters/emisor-kintsugi-7039605681020108800/" target="_blank" rel="noopener" class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#AB277A] hover:text-white">Newsletter Julio César</a>
            </div>
          </div>

          <!-- TikTok -->
          <div class="relative group">
            <div class="text-[#181818] hover:text-[#AB277A] transition-colors duration-300 block cursor-pointer"
                 onclick="toggleDropdown(this)">
              <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                <path d="M19.59 6.69a4.83 4.83 0 01-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 01-5.2 1.74 2.89 2.89 0 012.31-4.64 2.93 2.93 0 01.88.13V9.4a6.84 6.84 0 00-1-.05A6.33 6.33 0 005 20.1a6.34 6.34 0 0010.86-4.43v-7a8.16 8.16 0 004.77 1.52v-3.4a4.85 4.85 0 01-1-.1z"/>
              </svg>
            </div>
            <div class="dropdown-menu absolute left-0 mt-2 w-48 bg-white rounded-lg shadow-lg opacity-0 invisible md:group-hover:opacity-100 md:group-hover:visible transition-all duration-300 z-50">
              <a href="https://www.tiktok.com/@psicologo_juliocesar" target="_blank" rel="noopener" class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#AB277A] hover:text-white">@psicologo_juliocesar</a>
              <a href="https://www.tiktok.com/@psicologa_shenhui" target="_blank" rel="noopener" class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#AB277A] hover:text-white">@psicologa_shenhui</a>
            </div>
          </div>

          <!-- YouTube -->
          <a href="https://www.youtube.com/@emisorkintsugi" target="_blank" rel="noopener" class="text-[#181818] hover:text-[#AB277A] transition-all duration-300 hover:scale-110">
            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
              <path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"/>
            </svg>
          </a>

          <!-- Spotify -->
          <a href="https://open.spotify.com/show/08J06mjqK1UxNgXPTVlMkJ?si=3bd91370c015422e" target="_blank" rel="noopener" class="text-[#181818] hover:text-[#AB277A] transition-all duration-300 hover:scale-110">
            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
              <path d="M12 0C5.4 0 0 5.4 0 12s5.4 12 12 12 12-5.4 12-12S18.66 0 12 0zm5.521 17.34c-.24.359-.66.48-1.021.24-2.82-1.74-6.36-2.101-10.561-1.141-.418.122-.779-.179-.899-.539-.12-.421.18-.78.54-.9 4.56-1.021 8.52-.6 11.64 1.32.42.18.479.659.301 1.02zm1.44-3.3c-.301.42-.841.6-1.262.3-3.239-1.98-8.159-2.58-11.939-1.38-.479.12-1.02-.12-1.14-.6-.12-.48.12-1.021.6-1.141C9.6 9.9 15 10.561 18.72 12.84c.361.181.54.78.241 1.2zm.12-3.36C15.24 8.4 8.82 8.16 5.16 9.301c-.6.179-1.2-.181-1.38-.721-.18-.601.18-1.2.72-1.381 4.26-1.26 11.28-1.02 15.721 1.621.539.3.719 1.02.419 1.56-.299.421-1.02.599-1.559.3z"/>
            </svg>
          </a>
        </div>
        
        <!-- Frase inspiradora con animación -->
        <div class="text-[#AB277A] text-2xl md:text-3xl text-center md:text-left w-full" style="font-family: 'Hugamour', sans-serif;">
          <p class="mb-0 animate-fade-in-slide" style="animation-delay: 0s;">#El Trauma</p>
          <p class="mb-0 md:ml-8 animate-fade-in-slide mx-auto md:mx-0" style="animation-delay: 0.2s;">Se Puede</p>
          <p class="mb-0 md:ml-16 animate-fade-in-slide mx-auto md:mx-0" style="animation-delay: 0.4s;">Superar</p>
        </div>
      </div>
      
      <!-- Columna 2: Instituciones + Menú -->
      <div class="md:col-span-7">
        <!-- Instituciones Asociadas -->
        <div class="mb-8">
          <h3 class="text-[#AB277A] font-medium mb-4 text-xl text-center md:text-left" style="font-family: 'Roboto', sans-serif;">
            Instituciones Asociadas
          </h3>
          <div class="grid grid-cols-2 md:grid-cols-4 gap-4 justify-items-center md:justify-items-start">
            <a href="https://www.emdr-es.org/Terapeutas" target="_blank" rel="noopener" class="transition-all duration-300 hover:scale-110 w-32 h-16 flex items-center justify-center">
              <img src="{{ get_theme_file_uri('resources/images/logoemdr1.png') }}" alt="Asociación EMDR España" class="max-w-full max-h-full object-contain">
            </a>
            <a href="https://emdrchile.cl/terapeutas/julio-cesar-carrasco-rebolledo/" target="_blank" rel="noopener" class="transition-all duration-300 hover:scale-110 w-32 h-16 flex items-center justify-center">
              <img src="{{ get_theme_file_uri('resources/images/logoemdr2.png') }}" alt="EMDR Chile" class="max-w-full max-h-full object-contain">
            </a>
            <a href="https://www.happinessstudies.academy/" target="_blank" rel="noopener" class="transition-all duration-300 hover:scale-110 w-40 h-20 flex items-center justify-center">
              <img src="{{ get_theme_file_uri('resources/images/logo-hsa.avif') }}" alt="Happiness Studies Academy" class="max-w-full max-h-full object-contain">
            </a>
            <a href="https://www.psicologiadeldeportechile.cl/" target="_blank" rel="noopener" class="transition-all duration-300 hover:scale-110 w-40 h-20 flex items-center justify-center">
              <img src="{{ get_theme_file_uri('resources/images/logo-psidepchile.avif') }}" alt="Sociedad Chilena de Psicología del Deporte" class="max-w-full max-h-full object-contain">
            </a>
          </div>
        </div>

        <!-- Menú desktop (oculto en móvil) -->
        <div class="hidden md:block">
          <nav class="grid grid-cols-3 gap-x-8 gap-y-3">
            <!-- Primera columna -->
            <div class="space-y-2">
              <a href="{{ home_url('/') }}" class="block text-[#181818] hover:text-[#AB277A] transition-all duration-300">Inicio</a>
              <a href="{{ home_url('/a-quienes-atendemos') }}" class="block text-[#181818] hover:text-[#AB277A] transition-all duration-300">¿A quiénes atendemos?</a>
              <a href="{{ home_url('/charlas-y-talleres') }}" class="block text-[#181818] hover:text-[#AB277A] transition-all duration-300">Charlas y talleres</a>
            </div>
            <!-- Segunda columna -->
            <div class="space-y-2">
              <div class="relative group">
                <a href="{{ home_url('/psicoterapia-emdr') }}" class="block text-[#181818] hover:text-[#AB277A] transition-all duration-300">
                  Psicoterapia EMDR
                </a>
                <div class="submenu-container -left-4">
                  <div class="horizontal-submenu">
                    <a href="{{ home_url('/testimonios') }}" class="horizontal-submenu-item">Testimonios</a>
                    <a href="{{ home_url('/beneficios-emdr') }}" class="horizontal-submenu-item">Beneficios del EMDR</a>
                    <a href="{{ home_url('/tratamiento-emdr') }}" class="horizontal-submenu-item">¿Qué ocurre durante el tratamiento?</a>
                    <a href="{{ home_url('/que-esperar') }}" class="horizontal-submenu-item">¿Qué esperar?</a>
                    <a href="{{ home_url('/transtornos-y-malestares') }}" class="horizontal-submenu-item">Transtornos y malestares</a>
                  </div>
                </div>
              </div>
              <div class="relative group">
                <a href="{{ home_url('/quienes-somos') }}" class="block text-[#181818] hover:text-[#AB277A] transition-all duration-300">
                  ¿Quiénes somos?
                </a>
                <div class="submenu-container -left-4">
                  <div class="horizontal-submenu">
                    <a href="{{ home_url('/que-significa-kintsugi') }}" class="horizontal-submenu-item">Qué significa Kintsugi</a>
                    <a href="{{ home_url('/que-nos-inspira') }}" class="horizontal-submenu-item">Qué nos inspira</a>
                    <a href="{{ home_url('/divulgacion-cientifica') }}" class="horizontal-submenu-item">Divulgación Científica</a>
                    <a href="{{ home_url('/evidencia-cientifica') }}" class="horizontal-submenu-item">Evidencia Científica</a>
                  </div>
                </div>
              </div>
            </div>
            <!-- Tercera columna -->
            <div class="space-y-2">
              <div class="relative group">
                <a href="{{ home_url('/prensa') }}" class="block text-[#181818] hover:text-[#AB277A] transition-all duration-300">
                  Prensa y medios
                </a>
                <div class="submenu-container -left-4">
                  <div class="horizontal-submenu">
                    <a href="{{ home_url('/blog') }}" class="horizontal-submenu-item">Blog</a>
                    <a href="{{ home_url('/canales-oficiales') }}" class="horizontal-submenu-item">Canales Oficiales</a>
                  </div>
                </div>
              </div>
              <a href="{{ home_url('/contacto') }}" class="block text-[#181818] hover:text-[#AB277A] transition-all duration-300">Contacto</a>
              <a href="{{ home_url('/preguntas-frecuentes') }}" class="block text-[#181818] hover:text-[#AB277A] transition-all duration-300">FAQ'S</a>
            </div>
          </nav>
        </div>
      </div>
      
      <!-- Columna 3: Contacto y Privacidad -->
      <div class="md:col-span-2">
        <div class="space-y-8">
          <!-- Contacto -->
          <div class="text-center md:text-left">
            <a href="{{ home_url('/contacto') }}" class="group">
              <h3 class="text-[#AB277A] font-medium mb-4 text-xl transition-all duration-300 group-hover:text-[#030D55]" style="font-family: 'Roboto', sans-serif;">
                Contacto
              </h3>
            </a>
            <a href="mailto:hola@ikintsugi.cl" class="text-[#181818] hover:text-[#AB277A] hover:underline transition-all duration-300 text-base hover:translate-x-2 inline-block" style="font-family: 'Roboto', sans-serif; font-weight: 400;">
              hola@ikintsugi.cl
            </a>
          </div>

          <!-- Privacidad -->
          <div class="text-center md:text-left">
            <h3 class="text-[#AB277A] font-medium mb-4 text-xl" style="font-family: 'Roboto', sans-serif;">
              Privacidad
            </h3>
            <ul class="space-y-2">
              <li>
                <a href="{{ home_url('/terminos-y-condiciones') }}" class="text-[#181818] hover:text-[#AB277A] hover:underline transition-all duration-300 text-base" style="font-family: 'Roboto', sans-serif; font-weight: 400;">
                  Términos Y condiciones
                </a>
              </li>
              <li>
                <a href="{{ home_url('/politica-de-privacidad') }}" class="text-[#181818] hover:text-[#AB277A] hover:underline transition-all duration-300 text-base" style="font-family: 'Roboto', sans-serif; font-weight: 400;">
                  Política de privacidad
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>

<!-- Espacio en blanco -->
<div class="h-16 bg-[#030D550D]"></div>

<!-- Footer Inferior -->
<footer class="relative bg-[#C5ACE5]" style="height: 59px;">
  <div class="w-full h-full relative">
    <!-- Onda superior -->
    <svg viewBox="0 0 1512 30" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" class="w-full absolute -top-[30px] left-0" style="height: 30px;">
      <path d="M0,30 L1512,30 L1512,10 C1200,0 800,5 500,15 C250,20 100,15 0,5 L0,30 Z" fill="#C5ACE5"></path>
    </svg>

    <!-- Copyright -->
    <div class="flex items-center justify-center h-full">
      <p class="text-center font-medium text-base" style="font-family: 'Roboto', sans-serif; line-height: 100%;">
        <a href="{{ home_url('/') }}" class="text-[#181818] hover:text-[#AB277A] transition-colors duration-300">Ikintsugi</a> © {{ date('Y') }}. Todos los derechos reservados.
      </p>
    </div>
  </div>
</footer>

<style>
  @font-face {
    font-family: 'Hugamour';
    src: url('{{ get_theme_file_uri('resources/fonts/Hugamour.otf') }}') format('opentype'),
         url('{{ get_theme_file_uri('resources/fonts/Hugamour.ttf') }}') format('truetype');
    font-weight: normal;
    font-style: normal;
    font-display: swap;
  }
  
  .footer-link {
    position: relative;
  }
  
  .footer-link::after {
    content: '';
    position: absolute;
    width: 0;
    height: 1px;
    bottom: -2px;
    left: 0;
    background-color: #AB277A;
    transition: width 0.3s ease;
  }
  
  .footer-link:hover::after {
    width: 100%;
  }

  @keyframes fade-in-slide {
    0% {
      opacity: 0;
      transform: translateX(-20px);
    }
    100% {
      opacity: 1;
      transform: translateX(0);
    }
  }

  .animate-fade-in-slide {
    animation: fade-in-slide 0.5s ease-out forwards;
    opacity: 0;
  }

  /* Estilos para los submenús horizontales */
  .submenu-container {
    opacity: 0;
    visibility: hidden;
    position: absolute;
    top: 100%;
    transition: all 0.3s ease;
    z-index: 60;
    margin-top: 0.5rem;
  }
  
  .group:hover .submenu-container {
    opacity: 1;
    visibility: visible;
  }
  
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
    padding: 10px 16px;
    font-weight: 500;
    font-size: 14px;
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

  /* Estilos para el dropdown en móvil */
  @media (max-width: 768px) {
    .dropdown-menu.active {
      opacity: 1;
      visibility: visible;
      transform: translateY(0);
    }
    
    .dropdown-menu {
      transform: translateY(-10px);
    }
  }

  /* Mejorar la animación de hover para los logos */
  .transition-all {
    transition-property: all;
    transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
    transition-duration: 300ms;
  }
</style>

<script>
function toggleDropdown(element) {
  // Solo ejecutar en móvil
  if (window.innerWidth <= 768) {
    const dropdown = element.nextElementSibling;
    
    // Cerrar todos los otros dropdowns
    document.querySelectorAll('.dropdown-menu').forEach(menu => {
      if (menu !== dropdown) {
        menu.classList.remove('active');
      }
    });
    
    // Toggle el dropdown actual
    dropdown.classList.toggle('active');
    
    // Prevenir que el evento se propague
    event.stopPropagation();
  }
}

// Cerrar dropdowns al hacer click fuera
document.addEventListener('click', function(e) {
  if (!e.target.closest('.group')) {
    document.querySelectorAll('.dropdown-menu').forEach(menu => {
      menu.classList.remove('active');
    });
  }
});
</script>
