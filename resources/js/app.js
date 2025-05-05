import.meta.glob([
  '../images/**',
  '../fonts/**',
]);

document.addEventListener('DOMContentLoaded', () => {
  // Funcionalidad para el menú móvil principal
  const mobileMenuButton = document.getElementById('mobile-menu-button');
  const mobileMenuClose = document.getElementById('mobile-menu-close');
  const mobileMenu = document.getElementById('mobile-menu');

  // Abrir menú móvil
  if (mobileMenuButton) {
    mobileMenuButton.addEventListener('click', () => {
      mobileMenu.classList.add('active');
      document.body.style.overflow = 'hidden'; // Solo bloquea scroll vertical
    });
  }

  // Cerrar menú móvil
  if (mobileMenuClose) {
    mobileMenuClose.addEventListener('click', () => {
      mobileMenu.classList.remove('active');
      document.body.style.overflow = ''; // Restaurar scroll
    });
  }

  // Funcionalidad para el submenú de Quiénes somos en móvil
  const quienesSomosToggle = document.querySelector('#quienes-somos-icon')?.closest('a');
  const quienesSomosIcon = document.getElementById('quienes-somos-icon');
  const quienesSomosSubmenu = document.getElementById('quienes-somos-submenu');

  if (quienesSomosToggle && quienesSomosSubmenu) {
    quienesSomosToggle.addEventListener('click', (e) => {
      e.preventDefault();
      
      // Animación suave para el submenú
      if (quienesSomosSubmenu.classList.contains('hidden')) {
        // Mostrar el submenú
        quienesSomosSubmenu.classList.remove('hidden');
        quienesSomosSubmenu.style.maxHeight = '0px';
        setTimeout(() => {
          quienesSomosSubmenu.style.maxHeight = quienesSomosSubmenu.scrollHeight + 'px';
        }, 10);
      } else {
        // Ocultar el submenú
        quienesSomosSubmenu.style.maxHeight = '0px';
        setTimeout(() => {
          quienesSomosSubmenu.classList.add('hidden');
        }, 300); // Tiempo igual a la duración de la transición
      }
      
      quienesSomosIcon?.classList.toggle('rotate-180');
    });
  }
  
  // Mejorar accesibilidad del menú desplegable en desktop
  const submenuDesktop = document.querySelector('.group .absolute');
  const menuParentDesktop = document.querySelector('.group');
  
  if (submenuDesktop && menuParentDesktop) {
    let timeoutId;
    
    // Mostrar menú con retraso para evitar flickering
    menuParentDesktop.addEventListener('mouseenter', () => {
      clearTimeout(timeoutId);
      submenuDesktop.classList.remove('hidden');
    });
    
    // Ocultar con retraso para dar tiempo al usuario a mover el cursor al submenú
    menuParentDesktop.addEventListener('mouseleave', () => {
      timeoutId = setTimeout(() => {
        submenuDesktop.classList.add('hidden');
      }, 300);
    });
    
    // Cancelar el ocultamiento si el ratón vuelve al menú
    submenuDesktop.addEventListener('mouseenter', () => {
      clearTimeout(timeoutId);
    });
    
    // Retrasar ocultamiento cuando salimos del submenú
    submenuDesktop.addEventListener('mouseleave', () => {
      timeoutId = setTimeout(() => {
        submenuDesktop.classList.add('hidden');
      }, 300);
    });
  }
});

// Import comment management functionality
import './comment-management.js';
