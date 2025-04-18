// Envolver todo en un closure seguro de jQuery para evitar conflictos
jQuery(function($) {
  // Variables globales
  var kintsugi_ajax = window.kintsugi_ajax || { ajax_url: '', nonce: '' };

  // Iniciar todo cuando el DOM esté listo
  $(document).ready(function() {
    initKintsugiCarousel();
    initNoticiasFilters();
    setupVideoPopups();
    enforceGridLayout();
    applyInlineStyles();
  });

  function initKintsugiCarousel() {
    // Carrusel principal (si está presente)
    const mainCarousel = document.getElementById('kintsugi-carousel-main');
    if (mainCarousel) {
      new Swiper('#kintsugi-carousel-main', {
        loop: true,
        speed: 700,
        autoplay: {
          delay: 5000,
          disableOnInteraction: false,
        },
        navigation: {
          nextEl: '.kintsugi-carousel-nav-next',
          prevEl: '.kintsugi-carousel-nav-prev',
        },
        pagination: { el: '.swiper-pagination', clickable: true },
        slidesPerView: 1,
        breakpoints: { 640:{ slidesPerView:2 }, 992:{ slidesPerView:4 } }
      });
    }

    // Carruseles secundarios (si los hubiera)
    document.querySelectorAll('.kintsugi-carousel-container:not(#kintsugi-carousel-main)')
      .forEach((container, i) => {
        const id = container.id || `kintsugi-carousel-${i}`;
        container.id = id;
        const prev = `${id}-prev`, next = `${id}-next`;
        container.insertAdjacentHTML('beforeend',
          `<div class="${prev} kintsugi-carousel-nav-prev"></div>` +
          `<div class="${next} kintsugi-carousel-nav-next"></div>`
        );
        new Swiper(`#${id}`, {
          loop: true,
          speed: 700,
          navigation: { prevEl: `.${prev}`, nextEl: `.${next}` },
          pagination: { el: '.swiper-pagination', clickable: true }
        });
      });

    applyInlineStyles();
  }

  function setupVideoPopups() {
    // Limpiar cualquier handler previo
    $('.kintsugi-carousel-video-link, .kintsugi-noticia-video-link, .swiper-slide[data-video-url], .kintsugi-noticia-video-play, .kintsugi-video-popup-close').off();
    
    // Asegurarse que el popup de video existe
    if ($('.kintsugi-video-popup').length === 0) {
      $('body').append(`
        <div class="kintsugi-video-popup">
          <div class="kintsugi-video-popup-inner">
            <div class="kintsugi-video-popup-container">
              <div class="kintsugi-video-popup-content"></div>
            </div>
            <div class="kintsugi-video-popup-close">&times;</div>
          </div>
        </div>
      `);
    }
    
    // Manejar clics en enlaces de video
    $('.kintsugi-carousel-video-link, .kintsugi-noticia-video-link').on('click', function(e) {
      e.preventDefault();
      var videoUrl = $(this).data('video-url');
      if (videoUrl) {
        openVideoPopup(videoUrl);
      }
    });
    
    // Manejar clics en los botones de reproducción
    $('.kintsugi-noticia-video-play').on('click', function(e) {
      e.preventDefault();
      e.stopPropagation();
      var videoUrl = $(this).closest('[data-video-url]').data('video-url');
      if (videoUrl) {
        openVideoPopup(videoUrl);
      }
    });
    
    // Manejar clics en las diapositivas de video del carrusel
    $('.swiper-slide[data-video-url]').on('click', function(e) {
      e.preventDefault();
      var videoUrl = $(this).data('video-url');
      if (videoUrl) {
        openVideoPopup(videoUrl);
      }
    });
    
    // Cerrar el popup de video
    $('.kintsugi-video-popup-close').on('click', function() {
      closeVideoPopup();
    });
    
    // También cerrar con Escape
    $(document).on('keydown', function(e) {
      if (e.key === 'Escape' && $('.kintsugi-video-popup').hasClass('active')) {
        closeVideoPopup();
      }
    });
    
    // Y cerrar si se hace clic fuera del contenido del video
    $('.kintsugi-video-popup').on('click', function(e) {
      if ($(e.target).hasClass('kintsugi-video-popup') || $(e.target).hasClass('kintsugi-video-popup-inner')) {
        closeVideoPopup();
      }
    });
  }

  function openVideoPopup(videoUrl) {
    // Detectar tipo de video (YouTube / Vimeo)
    var embedUrl = '';
    var youtubeId = getYoutubeID(videoUrl);
    var vimeoId = getVimeoID(videoUrl);
    
    if (youtubeId) {
      embedUrl = 'https://www.youtube.com/embed/' + youtubeId + '?autoplay=1&rel=0';
    } else if (vimeoId) {
      embedUrl = 'https://player.vimeo.com/video/' + vimeoId + '?autoplay=1';
    } else {
      console.error('URL de video no reconocida:', videoUrl);
      return;
    }
    
    // Crear iframe
    var iframe = '<iframe src="' + embedUrl + '" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
    
    // Insertar en el popup y mostrar
    $('.kintsugi-video-popup-content').html(iframe);
    $('.kintsugi-video-popup').addClass('active');
    $('body').addClass('kintsugi-popup-open');
    
    // Animación
    setTimeout(function() {
      $('.kintsugi-video-popup-container').css({
        'transform': 'scale(1)',
        'opacity': '1'
      });
    }, 10);
  }

  function closeVideoPopup() {
    // Animación de cierre
    $('.kintsugi-video-popup-container').css({
      'transform': 'scale(0.9)',
      'opacity': '0'
    });
    
    // Esperar a que termine la animación
    setTimeout(function() {
      $('.kintsugi-video-popup').removeClass('active');
      $('.kintsugi-video-popup-content').html(''); // Limpiar iframe
      $('body').removeClass('kintsugi-popup-open');
    }, 300);
  }

  function getYoutubeID(url) {
    var regExp = /^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#&?]*).*/;
    var match = url.match(regExp);
    return (match && match[7].length === 11) ? match[7] : false;
  }

  function getVimeoID(url) {
    var regExp = /(?:www\.|player\.)?vimeo.com\/(?:channels\/(?:\w+\/)?|groups\/([^\/]*)\/videos\/|album\/(\d+)\/video\/|video\/|)(\d+)(?:$|\/|\?)/;
    var match = url.match(regExp);
    return match ? match[3] : false;
  }

  function enforceGridLayout() {
    const container = $('#kintsugi-noticias-ajax-container');
    
    if (!container.length) return;
    
    const items = container.find('.kintsugi-noticia-item');
    
    if (!items.length) return;
    
    // Si los elementos no están dentro de un grid, envolverlos en uno
    if (!container.find('.kintsugi-noticias-grid').length) {
      items.wrapAll('<div class="kintsugi-noticias-grid"></div>');
    }
  }

  function applyInlineStyles() {
    // Normalizar tamaños de imágenes en todas las noticias
    $('.kintsugi-noticia-item img, .swiper-slide img').css({
      'width': '100%',
      'height': '250px',
      'object-fit': 'cover',
      'object-position': 'center',
    });
    
    // Aplicar estilos consistentes a todos los elementos de noticias
    $('.kintsugi-carousel-slide, .swiper-slide, .kintsugi-noticia-item').css({
      'position': 'relative',
      'border-radius': '16px',
      'overflow': 'hidden',
      'box-shadow': '0 8px 20px rgba(0, 0, 0, 0.08)',
      'transition': 'transform 0.4s cubic-bezier(0.165, 0.84, 0.44, 1)',
      'background-color': 'transparent',
      'height': 'auto',
      'min-height': '380px'
    });
    
    // Añadir gradiente a todos los elementos
    $('.kintsugi-carousel-slide, .swiper-slide, .kintsugi-noticia-item').each(function() {
      if (!$(this).find('.gradient-overlay').length) {
        $(this).prepend('<div class="gradient-overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(180deg, rgba(171, 39, 122, 0.4) 0%, rgba(3, 13, 85, 0.4) 61%); z-index: 1; pointer-events: none;"></div>');
      }
    });
    
    // Estilos consistentes para el contenido
    $('.kintsugi-noticia-content, .kintsugi-carousel-content').css({
      'padding': '24px 16px',
      'position': 'relative',
      'z-index': '2',
      'height': '100%',
      'display': 'flex',
      'flex-direction': 'column',
      'justify-content': 'space-between',
      'background': 'transparent'
    });

    // Estilos de texto para títulos y extractos
    $('.kintsugi-noticia-title, .kintsugi-carousel-title').css({
      'color': 'white',
      'font-size': '22px',
      'font-weight': '700',
      'line-height': '1.3',
      'text-shadow': '0 1px 3px rgba(0, 0, 0, 0.3)',
      'font-family': '"Playfair Display", serif',
      'margin-bottom': '8px'
    });
    
    $('.kintsugi-noticia-excerpt, .kintsugi-carousel-excerpt').css({
      'color': 'rgba(255, 255, 255, 0.9)',
      'font-size': '16px',
      'line-height': '1.5',
      'text-shadow': '0 1px 2px rgba(0, 0, 0, 0.2)',
      'margin-bottom': '8px'
    });
    
    // Mejorar el estilo de las fechas
    $('.kintsugi-noticia-date').css({
      'position': 'absolute',
      'top': '15px',
      'left': '15px',
      'background-color': 'rgba(171, 39, 122, 0.8)',
      'color': 'white',
      'padding': '5px 12px',
      'border-radius': '8px',
      'font-size': '14px',
      'font-weight': '600',
      'z-index': '10',
      'backdrop-filter': 'blur(3px)',
      'box-shadow': '0 2px 6px rgba(0, 0, 0, 0.2)'
    });
    
    // Mejorar los botones de play para videos
    $('.kintsugi-carousel-play, .kintsugi-noticia-video-play').css({
      'background-color': 'rgba(54, 39, 102, 0.9)',
      'width': '70px',
      'height': '70px',
      'border-radius': '50%',
      'position': 'absolute',
      'top': '50%',
      'left': '50%',
      'transform': 'translate(-50%, -50%)',
      'z-index': '10',
      'display': 'flex',
      'align-items': 'center',
      'justify-content': 'center',
      'box-shadow': '0 8px 24px rgba(0, 0, 0, 0.3)',
      'cursor': 'pointer',
      'transition': 'all 0.3s ease'
    });
    
    // Asegurarse que el botón play contenga un triángulo
    $('.kintsugi-carousel-play, .kintsugi-noticia-video-play').each(function() {
      if ($(this).children().length === 0) {
        $(this).html('<div class="play-triangle"></div>');
      }
    });
    
    // Estilo para el triángulo de play
    $('.play-triangle').css({
      'width': '0',
      'height': '0',
      'border-top': '12px solid transparent',
      'border-bottom': '12px solid transparent',
      'border-left': '18px solid white',
      'margin-left': '5px'
    });
    
    // Estilos para las imágenes
    $('.kintsugi-noticia-image img, .kintsugi-carousel-image img, .kintsugi-noticia-video img').css({
      'transition': 'transform 0.5s ease',
      'width': '100%',
      'height': '250px',
      'object-fit': 'cover'
    });
    
    // Efecto hover para las tarjetas
    $('.kintsugi-noticia-item, .kintsugi-carousel-slide').hover(
      function() {
        $(this).css('transform', 'translateY(-8px)');
        $(this).find('img').css('transform', 'scale(1.05)');
      },
      function() {
        $(this).css('transform', 'none');
        $(this).find('img').css('transform', 'none');
      }
    );
  }

  function initNoticiasFilters() {
    const $searchInput = $('#kintsugi-search-input');
    const $yearFilter = $('#kintsugi-year-filter');
    const $sortFilter = $('#kintsugi-sort-filter');
    const $container = $('#kintsugi-noticias-ajax-container');
    
    if (!$searchInput.length || !$container.length) {
      return;
    }
    
    // Debounce function para limitar las peticiones de búsqueda
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
    
    // Función para cargar contenido filtrado
    function loadFilteredContent() {
      // Valores actuales de los filtros
      const searchQuery = $searchInput.val().trim();
      const yearFilter = $yearFilter.length ? $yearFilter.val() : 'all';
      const sortOrder = $sortFilter.length ? $sortFilter.val() : 'date-desc';
      
      // Mostrar estado de carga
      $container.addClass('loading');
      $container.html('<div class="kintsugi-loading"><div class="spinner"></div><p>Cargando noticias...</p></div>');
      
      // Petición AJAX - SOLO para el contenedor de noticias, no la página completa
      $.ajax({
        url: kintsugi_ajax.ajax_url,
        type: 'POST',
        data: {
          action: 'kintsugi_filter_noticias',
          search: searchQuery,
          year: yearFilter,
          sort: sortOrder,
          partial: true, // Indicar que solo queremos el contenido parcial
          nonce: kintsugi_ajax.nonce
        },
        success: function(response) {
          // Reemplazar SOLO el contenido de noticias
          $container.html(response);
          
          // Reinicializar popups de video
          setupVideoPopups();
        },
        error: function() {
          $container.html('<div class="kintsugi-error">Hubo un error al cargar las noticias. Por favor intenta de nuevo.</div>');
        },
        complete: function() {
          $container.removeClass('loading');
          
          // Aplicar estilos consistentes
          applyInlineStyles();
          
          // Forzar layout de grid
          enforceGridLayout();
        }
      });
    }
    
    // Función de búsqueda con debounce (300ms)
    const debouncedSearch = debounce(loadFilteredContent, 300);
    
    // Event listeners
    $searchInput.on('input', debouncedSearch);
    if ($yearFilter.length) $yearFilter.on('change', loadFilteredContent);
    if ($sortFilter.length) $sortFilter.on('change', loadFilteredContent);
    
    // Gestionar clics en paginación
    $(document).on('click', '.kintsugi-noticias-pagination a.page-numbers', function(e) {
      e.preventDefault();
      
      // Extraer número de página de la URL
      const href = $(this).attr('href');
      const page = href.match(/page\/(\d+)/) || href.match(/paged=(\d+)/);
      const pageNum = page ? page[1] : 1;
      
      // Valores actuales de filtros
      const searchQuery = $searchInput.val().trim();
      const yearFilter = $yearFilter.length ? $yearFilter.val() : 'all';
      const sortOrder = $sortFilter.length ? $sortFilter.val() : 'date-desc';
      
      // Mostrar estado de carga
      $container.addClass('loading');
      $container.html('<div class="kintsugi-loading"><div class="spinner"></div><p>Cargando noticias...</p></div>');
      
      // Petición AJAX para paginación
      $.ajax({
        url: kintsugi_ajax.ajax_url,
        type: 'POST',
        data: {
          action: 'kintsugi_filter_noticias',
          search: searchQuery,
          year: yearFilter,
          sort: sortOrder,
          paged: pageNum,
          partial: true, // Indicar que solo queremos el contenido parcial
          nonce: kintsugi_ajax.nonce
        },
        success: function(response) {
          $container.html(response);
          
          // Reinicializar popups de video
          setupVideoPopups();
          
          // Scroll hacia el contenedor
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

  // Llamar a las funciones principales al cargar la página
  $(document).ajaxComplete(function() {
    setupVideoPopups();
    enforceGridLayout();
    applyInlineStyles();
  });
});