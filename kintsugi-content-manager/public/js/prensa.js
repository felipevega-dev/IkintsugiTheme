// Verificar la disponibilidad de jQuery
document.addEventListener('DOMContentLoaded', function() {
    if (typeof jQuery === 'undefined') {
      console.error('jQuery NO está disponible');
    } else {
      jQuery(function($) {
        initKintsugiCarousel();
        initNoticiasFilters();
        setupVideoPopups();
      });
    }
  });
  
  var kintsugi_ajax = { ajax_url: '', nonce: '' };
  
  function initKintsugiCarousel() {
    console.log('Initializing Kintsugi Carousel');
    if (typeof Swiper === 'undefined') return console.error('Swiper no encontrado');
  
    // Limpiar flechas previas
    document.querySelectorAll('.kintsugi-carousel-nav-prev, .kintsugi-carousel-nav-next')
      .forEach(el => el.remove());
  
    // Carrusel principal
    const main = document.querySelector('#kintsugi-carousel-main');
    if (main) {
      main.insertAdjacentHTML('beforeend',
        '<div class="kintsugi-carousel-nav-prev main-carousel-prev"></div>' +
        '<div class="kintsugi-carousel-nav-next main-carousel-next"></div>'
      );
      new Swiper('#kintsugi-carousel-main', { 
        loop: true,
        navigation: {
          nextEl: '.main-carousel-next',
          prevEl: '.main-carousel-prev',
        },
        pagination: {
          el: '.swiper-pagination',
          clickable: true,
        },
      }); // Configuración del carrusel principal
        ;
    }
  
    // Carruseles secundarios
    document.querySelectorAll('.kintsugi-carousel-container:not(#kintsugi-carousel-main)')
      .forEach((container, i) => {
        const id = container.id || `kintsugi-carousel-${i}`;
        container.id = id;
        const prev = `${id}-prev`, next = `${id}-next`;
        container.insertAdjacentHTML('beforeend',
          `<div class="kintsugi-carousel-nav-prev ${prev}"></div>` +
          `<div class="kintsugi-carousel-nav-next ${next}"></div>`
        );
        new Swiper(`#${id}`, { 
          loop: true,
          navigation: {
            nextEl: `.${next}`,
            prevEl: `.${prev}`,
          },
          pagination: {
            el: '.swiper-pagination',
            clickable: true,
          },
        });
      });
  
    applyInlineStyles();
}

/**
* Configura los popups de video
*/
function setupVideoPopups() {
  console.log("Setting up video popups");
  
  // Usar jQuery ya que estamos fuera del bloque ready
  var $ = jQuery;
  
  // Cerrar el popup al hacer clic en el botón de cerrar
  $('.kintsugi-video-popup-close').off('click').on('click', function() {
      closeVideoPopup();
  });
  
  // Cerrar al hacer clic fuera del contenido
  $('.kintsugi-video-popup').off('click').on('click', function(e) {
      if ($(e.target).hasClass('kintsugi-video-popup')) {
          closeVideoPopup();
      }
  });
  
  // Cerrar al presionar ESC
  $(document).off('keydown.videoPopup').on('keydown.videoPopup', function(e) {
      if (e.key === "Escape") {
          closeVideoPopup();
      }
  });
  
  // Manejar clics en los botones de video en carrusel
  $('.kintsugi-carousel-play').off('click').on('click', function(e) {
      e.preventDefault();
      e.stopPropagation();
      var videoUrl = $(this).closest('[data-video-url]').data('video-url');
      if (videoUrl) {
          openVideoPopup(videoUrl);
      }
  });
  
  // Manejar clics en las diapositivas de video del carrusel
  $('.swiper-slide[data-video-url]').off('click').on('click', function(e) {
      e.preventDefault();
      var videoUrl = $(this).data('video-url');
      if (videoUrl) {
          openVideoPopup(videoUrl);
      }
  });
  
  // Manejar clics en elementos de video de la cuadrícula de noticias
  $('.kintsugi-noticia-video-play').off('click').on('click', function(e) {
      e.preventDefault();
      e.stopPropagation();
      var videoUrl = $(this).closest('[data-video-url]').data('video-url');
      if (videoUrl) {
          openVideoPopup(videoUrl);
      }
  });
}

function openVideoPopup(videoUrl) {
  console.log("Opening video popup with URL:", videoUrl);
  
  // Usar jQuery ya que estamos fuera del bloque ready
  var $ = jQuery;
  
  // Detener cualquier reproducción de video anterior
  $('.kintsugi-video-popup-content').empty();
  
  // Obtener el ID de YouTube o Vimeo
  var youtubeId = getYoutubeID(videoUrl);
  var vimeoId = getVimeoID(videoUrl);
  
  var embedCode = '';
  
  if (youtubeId) {
      // YouTube embed - añadir mute=1 para iniciar silenciado
      embedCode = '<iframe src="https://www.youtube.com/embed/' + youtubeId + '?autoplay=1&mute=1&rel=0&showinfo=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
  } else if (vimeoId) {
      // Vimeo embed - añadir muted=1 para iniciar silenciado
      embedCode = '<iframe src="https://player.vimeo.com/video/' + vimeoId + '?autoplay=1&muted=1" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>';
  } else {
      console.error("URL de video no reconocida:", videoUrl);
      return;
  }
  
  // Insertar el código embed
  $('.kintsugi-video-popup-content').html(embedCode);
  
  // Mostrar el popup con animación
  var $popup = $('.kintsugi-video-popup');
  $popup.addClass('active');
  
  // Prevenir scroll del body mientras el popup está abierto
  $('body').css('overflow', 'hidden');
}

function closeVideoPopup() {
  // Usar jQuery ya que estamos fuera del bloque ready
  var $ = jQuery;
  
  // Detener la reproducción de video
  $('.kintsugi-video-popup-content').empty();
  
  // Ocultar el popup con animación
  $('.kintsugi-video-popup').removeClass('active');
  
  // Restaurar scroll del body
  $('body').css('overflow', '');
}

function getYoutubeID(url) {
  var regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
  var match = url.match(regExp);
  return (match && match[2].length === 11) ? match[2] : null;
}

function getVimeoID(url) {
  var regExp = /^.*(vimeo\.com\/)((channels\/[A-z]+\/)|(groups\/[A-z]+\/videos\/))?([0-9]+)/;
  var match = url.match(regExp);
  return match ? match[5] : null;
}

/**
* Configura la búsqueda y filtros para las noticias
*/
function setupSearchAndFilters() {
  console.log("Setting up search and filters");
  
  // Usar jQuery ya que estamos fuera del bloque ready
  var $ = jQuery;
  
  // Manejar la búsqueda con debounce para evitar muchas peticiones
  const searchInput = $('#kintsugi-search-input');
  let searchTimeout = null;
  
  if (searchInput.length) {
      searchInput.on('input', function() {
          clearTimeout(searchTimeout);
          const query = $(this).val();
          
          searchTimeout = setTimeout(function() {
              loadFilteredNoticias();
          }, 500); // 500ms de debounce
      });
  }
  
  // Manejar cambios en los filtros
  $('#kintsugi-year-filter, #kintsugi-sort-filter').on('change', function() {
      loadFilteredNoticias();
  });
  
  // Función para cargar noticias filtradas
  function loadFilteredNoticias() {
      const searchQuery = $('#kintsugi-search-input').val() || '';
      const yearFilter = $('#kintsugi-year-filter').val() || '';
      const sortFilter = $('#kintsugi-sort-filter').val() || 'desc';
      
      // Mostrar spinner de carga
      $('#kintsugi-noticias-ajax-container').html('<div class="kintsugi-loading"><div class="spinner"></div><div>Cargando noticias...</div></div>');
      
      $.ajax({
          url: kintsugi_ajax.ajax_url,
          type: 'POST',
          data: {
              action: 'kintsugi_filter_noticias',
              search: searchQuery,
              year: yearFilter,
              sort: sortFilter,
              nonce: kintsugi_ajax.nonce
          },
          success: function(response) {
              $('#kintsugi-noticias-ajax-container').html(response);
              
              // Reinicializar los popups de video para los nuevos elementos
              setupVideoPopups();
              
              // Aplicar grid a los resultados
              enforceGridLayout();
          },
          error: function(error) {
              console.error("Error loading filtered news:", error);
              $('#kintsugi-noticias-ajax-container').html('<div class="alert alert-danger">Ocurrió un error al cargar las noticias. Por favor, intenta de nuevo.</div>');
          }
      });
  }
  
  console.log("Search and filters setup complete");
}

/**
* Asegura que los elementos de noticias se muestren en formato grid
*/
function enforceGridLayout() {
  console.log("Enforcing grid layout");
  
  // Usar jQuery ya que estamos fuera del bloque ready
  var $ = jQuery;
  
  const container = $('#kintsugi-noticias-ajax-container');
  
  if (!container.length) return;
  
  const items = container.find('.kintsugi-noticia-item');
  
  if (!items.length) return;
  
  // Si los elementos no están dentro de un grid, envolverlos en uno
  if (!container.find('.kintsugi-noticias-grid').length) {
      items.wrapAll('<div class="kintsugi-noticias-grid"></div>');
  }
  
  console.log("Grid layout enforced");
}

/**
* Aplica estilos inline a elementos generados dinámicamente
*/
function applyInlineStyles() {
  console.log('Aplicando estilos inline a elementos generados dinámicamente');
  
  // Usar jQuery ya que estamos fuera del bloque ready
  var $ = jQuery;
  
  // Aplicar estilos a elementos del carrusel - reducir altura y espacios
  $('.kintsugi-carousel-slide, .swiper-slide').attr('style', 'position: relative !important; border-radius: 8px !important; overflow: hidden !important; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1) !important; transition: transform 0.3s, box-shadow 0.3s !important; background-color: #fff !important; border: 1px solid rgba(54, 39, 102, 0.1) !important; height: 350px !important; min-height: 300px !important;');
  
  $('.kintsugi-carousel-image').attr('style', 'height: 180px !important; overflow: hidden !important;');
  $('.kintsugi-carousel-image img').attr('style', 'width: 100% !important; height: 100% !important; object-fit: cover !important; transition: transform 0.5s !important;');
  
  $('.kintsugi-carousel-content').attr('style', 'padding: 10px !important; position: relative !important; z-index: 2 !important; max-height: 160px !important; overflow: hidden !important;');
  $('.kintsugi-carousel-title').attr('style', 'margin: 0 0 8px !important; font-size: 16px !important; font-weight: 700 !important; color: #030D55 !important; line-height: 1.3 !important; font-family: "Playfair Display", serif !important;');
  $('.kintsugi-carousel-excerpt').attr('style', 'font-size: 13px !important; color: #4a4a4a !important; line-height: 1.4 !important; max-height: 80px !important; overflow: hidden !important;');
  
  $('.kintsugi-carousel-date').attr('style', 'position: absolute !important; top: 10px !important; right: 10px !important; background: rgba(54, 39, 102, 0.8) !important; color: #fff !important; padding: 4px 8px !important; border-radius: 4px !important; font-size: 12px !important; z-index: 5 !important;');
  $('.kintsugi-carousel-overlay').attr('style', 'position: absolute !important; inset: 0 !important; background: linear-gradient(to bottom, rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, 0.7) 100%) !important; z-index: 1 !important;');
  
  // Aplicar estilos a los botones de navegación
  $('.kintsugi-carousel-nav-prev, .kintsugi-carousel-nav-next').attr('style', 'position: absolute !important; top: 50% !important; transform: translateY(-50%) !important; width: 40px !important; height: 40px !important; background: rgba(54, 39, 102, 0.8) !important; border-radius: 50% !important; z-index: 10 !important; cursor: pointer !important; display: flex !important; align-items: center !important; justify-content: center !important;');
  
  $('.kintsugi-carousel-nav-prev').attr('style', 'position: absolute !important; top: 50% !important; transform: translateY(-50%) !important; width: 40px !important; height: 40px !important; background: rgba(54, 39, 102, 0.8) !important; border-radius: 50% !important; z-index: 10 !important; cursor: pointer !important; display: flex !important; align-items: center !important; justify-content: center !important; left: 10px !important;');
  
  $('.kintsugi-carousel-nav-next').attr('style', 'position: absolute !important; top: 50% !important; transform: translateY(-50%) !important; width: 40px !important; height: 40px !important; background: rgba(54, 39, 102, 0.8) !important; border-radius: 50% !important; z-index: 10 !important; cursor: pointer !important; display: flex !important; align-items: center !important; justify-content: center !important; right: 10px !important;');
  
  // Crear flechas dentro de los botones de navegación
  $('.kintsugi-carousel-nav-prev').each(function() {
      if (!$(this).find('.nav-arrow').length) {
          $(this).html('<span class="nav-arrow" style="display: block; width: 10px; height: 10px; border-top: 2px solid white; border-right: 2px solid white; transform: rotate(-135deg); margin-left: 5px;"></span>');
      }
  });
  
  $('.kintsugi-carousel-nav-next').each(function() {
      if (!$(this).find('.nav-arrow').length) {
          $(this).html('<span class="nav-arrow" style="display: block; width: 10px; height: 10px; border-top: 2px solid white; border-right: 2px solid white; transform: rotate(45deg); margin-right: 5px;"></span>');
      }
  });
  
  // Aplicar estilos a los botones de reproducción de video
  $('.kintsugi-carousel-play, .kintsugi-noticia-video-play').attr('style', 'position: absolute !important; top: 50% !important; left: 50% !important; transform: translate(-50%, -50%) !important; width: 60px !important; height: 60px !important; background-color: rgba(54, 39, 102, 0.8) !important; border-radius: 50% !important; display: flex !important; align-items: center !important; justify-content: center !important; z-index: 3 !important; cursor: pointer !important;');
  
  // Crear triángulo de reproducción
  $('.kintsugi-carousel-play, .kintsugi-noticia-video-play').each(function() {
      if (!$(this).find('.play-triangle').length) {
          $(this).html('<div class="play-triangle" style="width: 0 !important; height: 0 !important; border-top: 12px solid transparent !important; border-bottom: 12px solid transparent !important; border-left: 18px solid white !important; margin-left: 5px !important;"></div>');
      }
  });
  
  // Aplicar estilos a elementos de noticias
  $('.kintsugi-noticia-item').attr('style', 'width: 590px !important; height: 419px !important; border-radius: 16px !important; padding: 24px 16px 24px 16px !important; position: relative !important; overflow: hidden !important; background-color: transparent !important; border: none !important; transition: transform 0.4s cubic-bezier(0.165, 0.84, 0.44, 1) !important; margin-bottom: 20px !important; box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08) !important;');
  
  $('.kintsugi-noticia-image, .kintsugi-noticia-video').attr('style', 'height: 200px !important; overflow: hidden !important;');
  $('.kintsugi-noticia-img').attr('style', 'width: 100% !important; height: 100% !important; object-fit: cover !important; transition: transform 0.5s !important;');
  
  $('.kintsugi-noticia-content').attr('style', 'padding: 15px !important; position: relative !important; z-index: 2 !important;');
  $('.kintsugi-noticia-title').attr('style', 'margin: 0 0 8px !important; font-size: 18px !important; font-weight: 700 !important; color: #030D55 !important; line-height: 1.3 !important; font-family: "Playfair Display", serif !important;');
  $('.kintsugi-noticia-excerpt').attr('style', 'font-size: 14px !important; color: #4a4a4a !important; line-height: 1.5 !important;');
  
  $('.kintsugi-noticia-date').attr('style', 'position: absolute !important; top: 10px !important; right: 10px !important; background: rgba(54, 39, 102, 0.8) !important; color: #fff !important; padding: 4px 8px !important; border-radius: 4px !important; font-size: 12px !important; z-index: 5 !important;');
  $('.kintsugi-noticia-overlay').attr('style', 'position: absolute !important; inset: 0 !important; background: linear-gradient(to bottom, rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, 0.7) 100%) !important; z-index: 1 !important;');
  
  // Estilo especial para noticias de video en el carrusel principal
  $('.noticia-video').attr('style', 'position: relative; cursor: pointer;');
  
  // Aplicar gradiente a las tarjetas de noticias
  $('.kintsugi-noticia-item').each(function() {
      if (!$(this).find('.gradient-overlay').length) {
          $(this).prepend('<div class="gradient-overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(180deg, rgba(171, 39, 122, 0.4) 0%, rgba(3, 13, 85, 0.4) 61%); z-index: 1; pointer-events: none;"></div>');
      }
  });
  
  // Aplicar estilos a la paginación
  $('.kintsugi-noticias-pagination').attr('style', 'display: flex !important; justify-content: center !important; margin-top: 30px !important;');
  $('.kintsugi-noticias-pagination .page-numbers').attr('style', 'display: inline-flex !important; align-items: center !important; justify-content: center !important; width: 36px !important; height: 36px !important; margin: 0 3px !important; border-radius: 4px !important; border: 1px solid #ddd !important; color: #4a4a4a !important; text-decoration: none !important; transition: all 0.3s !important; font-weight: 500 !important;');
  $('.kintsugi-noticias-pagination .page-numbers.current').attr('style', 'background-color: #030D55 !important; border-color: #030D55 !important; color: white !important; display: inline-flex !important; align-items: center !important; justify-content: center !important; width: 36px !important; height: 36px !important; margin: 0 3px !important; border-radius: 4px !important;');
  $('.kintsugi-noticias-pagination .prev, .kintsugi-noticias-pagination .next').attr('style', 'width: auto !important; padding: 0 12px !important; display: inline-flex !important; align-items: center !important; justify-content: center !important; height: 36px !important; margin: 0 3px !important; border-radius: 4px !important; border: 1px solid #ddd !important; color: #4a4a4a !important; text-decoration: none !important; transition: all 0.3s !important;');
}

// Función para inicializar los filtros de noticias
function initNoticiasFilters() {
  // DOM elements
  const $searchInput = $('#kintsugi-search-input');
  const $yearFilter = $('#kintsugi-year-filter');
  const $sortFilter = $('#kintsugi-sort-filter');
  const $container = $('#kintsugi-noticias-ajax-container');
  
  if (!$searchInput.length || !$yearFilter.length || !$sortFilter.length || !$container.length) {
      console.warn('Algunos elementos de filtro no se encontraron en el DOM');
      return;
  }
  
  console.log('Inicializando filtros de noticias');
  
  // Debounce function to limit how often the search is executed
  function debounce(func, wait) {
      let timeout;
      return function() {
          const context = this;
          const args = arguments;
          clearTimeout(timeout);
          timeout = setTimeout(() => {
              func.apply(context, args);
          }, wait);
      };
  }
  
  // Function to load filtered content
  function loadFilteredContent() {
      // Get current filter values
      const searchQuery = $searchInput.val().trim();
      const yearFilter = $yearFilter.val();
      const sortOrder = $sortFilter.val();
      
      // Show loading state
      $container.addClass('loading');
      $container.append('<div class="kintsugi-loading"><div class="spinner"></div><p>Cargando noticias...</p></div>');
      
      // Make AJAX request
      $.ajax({
          url: kintsugi_ajax.ajax_url,
          type: 'POST',
          data: {
              action: 'kintsugi_filter_noticias',
              search: searchQuery,
              year: yearFilter,
              sort: sortOrder,
              nonce: kintsugi_ajax.nonce
          },
          success: function(response) {
              // Replace content with AJAX response
              $container.html(response);
              
              // Reinicializar los popups de video
              setupVideoPopups();
              
              // Scroll to container top with offset
              $('html, body').animate({
                  scrollTop: $container.offset().top - 100
              }, 300);
          },
          error: function() {
              $container.html('<div class="kintsugi-error">Hubo un error al cargar las noticias. Por favor intenta de nuevo.</div>');
          },
          complete: function() {
              $container.removeClass('loading');
              $('.kintsugi-loading').remove();
              
              // Aplicar estilos después de cargar
              applyInlineStyles();
              
              // Forzar layout de grid
              enforceGridLayout();
          }
      });
  }
  
  // Debounced search function (300ms delay)
  const debouncedSearch = debounce(loadFilteredContent, 300);
  
  // Event listeners
  $searchInput.on('input', debouncedSearch);
  $yearFilter.on('change', loadFilteredContent);
  $sortFilter.on('change', loadFilteredContent);
  
  // Handle pagination clicks
  $(document).on('click', '.kintsugi-noticias-pagination a.page-numbers', function(e) {
      e.preventDefault();
      
      // Extract page number from URL
      const href = $(this).attr('href');
      const page = href.match(/page\/(\d+)/) || href.match(/paged=(\d+)/);
      const pageNum = page ? page[1] : 1;
      
      // Get current filter values
      const searchQuery = $searchInput.val().trim();
      const yearFilter = $yearFilter.val();
      const sortOrder = $sortFilter.val();
      
      // Show loading state
      $container.addClass('loading');
      $container.append('<div class="kintsugi-loading"><div class="spinner"></div><p>Cargando noticias...</p></div>');
      
      // Make AJAX request for pagination
      $.ajax({
          url: kintsugi_ajax.ajax_url,
          type: 'POST',
          data: {
              action: 'kintsugi_filter_noticias',
              search: searchQuery,
              year: yearFilter,
              sort: sortOrder,
              paged: pageNum,
              nonce: kintsugi_ajax.nonce
          },
          success: function(response) {
              $container.html(response);
              
              // Reinicializar los popups de video
              setupVideoPopups();
              
              // Scroll to container top with offset
              $('html, body').animate({
                  scrollTop: $container.offset().top - 100
              }, 300);
          },
          error: function() {
              $container.html('<div class="kintsugi-error">Hubo un error al cargar las noticias. Por favor intenta de nuevo.</div>');
          },
          complete: function() {
              $container.removeClass('loading');
              $('.kintsugi-loading').remove();
              
              // Aplicar estilos después de cargar
              applyInlineStyles();
              
              // Forzar layout de grid
              enforceGridLayout();
          }
      });
  });
}

/**
* Custom JavaScript for Prensa page initialization
*/
jQuery(document).ready(function($) {
  'use strict';

  console.log("Kintsugi Prensa JS initialized");

  // Inicializar componentes cuando el DOM esté listo
  initKintsugiCarousel();
  setupVideoPopups();
  setupSearchAndFilters();

  // Re-inicializar componentes después de cargas AJAX
  $(document).ajaxComplete(function() {
      console.log("AJAX request completed, reinitializing components");
      setupVideoPopups();
      enforceGridLayout();
  });
});

// filepath: c:\laragon\www\test\wp-content\plugins\kintsugi-content-manager\public\js\prensa.js
jQuery(document).ready(function($){
    // inicializa Swiper
    if ( typeof Swiper !== 'undefined' ) {
      // ejemplo: swiper principal
      new Swiper('#kintsugi-carousel-main', {
        pagination:{ el:'.swiper-pagination', clickable:true },
        slidesPerView:1,
        breakpoints:{
          640:{ slidesPerView:2 },
          992:{ slidesPerView:4 }
        }
      });
    }
    // tus funciones de popup, filtros, grid, etc.
    initKintsugiCarousel();
    setupVideoPopups();
    setupSearchAndFilters();
    enforceGridLayout();
  });