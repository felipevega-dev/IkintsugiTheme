// Envolver todo en un closure seguro de jQuery para evitar conflictos
jQuery(function($) {
  // Variables globales
  var kintsugi_ajax = { ajax_url: '', nonce: '' };

  // Iniciar todo cuando el DOM esté listo
  $(document).ready(function() {
    initKintsugiCarousel();
    initNoticiasFilters();
    setupVideoPopups();
  });

  function initKintsugiCarousel() {
    if (typeof Swiper === 'undefined') return;

    // Destruir instancias existentes para evitar duplicados
    if (window.mainCarousel && window.mainCarousel.destroy) {
      window.mainCarousel.destroy(true, true);
    }

    // Carrusel principal
    const main = document.querySelector('#kintsugi-carousel-main');
    if (main) {
      main.querySelectorAll('.main-carousel-prev, .main-carousel-next').forEach(el => el.remove());
      main.insertAdjacentHTML('beforeend',
        '<div class="main-carousel-prev kintsugi-carousel-nav-prev"></div>' +
        '<div class="main-carousel-next kintsugi-carousel-nav-next"></div>'
      );
      
      // Inicializar Swiper con loop y navegación
      window.mainCarousel = new Swiper('#kintsugi-carousel-main', {
        loop: true,
        navigation: {
          prevEl: '.main-carousel-prev',
          nextEl: '.main-carousel-next',
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
          navigation: { prevEl: `.${prev}`, nextEl: `.${next}` },
          pagination: { el: '.swiper-pagination', clickable: true }
        });
      });

    applyInlineStyles();
  }

  function setupVideoPopups() {
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

  function setupSearchAndFilters() {
    const searchInput = $('#kintsugi-search-input');
    let searchTimeout = null;
    
    if (searchInput.length) {
        searchInput.on('input', function() {
            clearTimeout(searchTimeout);
            
            searchTimeout = setTimeout(function() {
                loadFilteredNoticias();
            }, 500); // 500ms de debounce
        });
    }
    
    // Manejar cambios en los filtros
    $('#kintsugi-year-filter, #kintsugi-sort-filter').on('change', function() {
        loadFilteredNoticias();
    });
    
    // Función para cargar noticias filtradas VIA AJAX
    function loadFilteredNoticias() {
        const searchQuery = $('#kintsugi-search-input').val() || '';
        const yearFilter = $('#kintsugi-year-filter').val() || '';
        const sortFilter = $('#kintsugi-sort-filter').val() || 'desc';
        
        // Mostrar spinner de carga SOLO en el contenedor de noticias
        $('#kintsugi-noticias-ajax-container').html('<div class="kintsugi-loading"><div class="spinner"></div><div>Cargando noticias...</div></div>');
        
        $.ajax({
            url: kintsugi_ajax.ajax_url,
            type: 'POST',
            data: {
                action: 'kintsugi_filter_noticias',
                search: searchQuery,
                year: yearFilter,
                sort: sortFilter,
                partial: true, // Indicar que solo queremos el contenido parcial
                nonce: kintsugi_ajax.nonce
            },
            success: function(response) {
                $('#kintsugi-noticias-ajax-container').html(response);
                
                // Reinicializar los popups de video para los nuevos elementos
                setupVideoPopups();
                
                // Aplicar estilos consistentes a los resultados
                applyInlineStyles();
            },
            error: function(error) {
                $('#kintsugi-noticias-ajax-container').html('<div class="alert alert-danger">Ocurrió un error al cargar las noticias. Por favor, intenta de nuevo.</div>');
            }
        });
    }
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
      'box-shadow': '0 2px 5px rgba(0,0,0,0.2)'
    });
  }

  function initNoticiasFilters() {
    const $searchInput = $('#kintsugi-search-input');
    const $yearFilter = $('#kintsugi-year-filter');
    const $sortFilter = $('#kintsugi-sort-filter');
    const $container = $('#kintsugi-noticias-ajax-container');
    
    if (!$searchInput.length || !$yearFilter.length || !$sortFilter.length || !$container.length) {
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
        const yearFilter = $yearFilter.val();
        const sortOrder = $sortFilter.val();
        
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
    $yearFilter.on('change', loadFilteredContent);
    $sortFilter.on('change', loadFilteredContent);
    
    // Gestionar clics en paginación
    $(document).on('click', '.kintsugi-noticias-pagination a.page-numbers', function(e) {
        e.preventDefault();
        
        // Extraer número de página de la URL
        const href = $(this).attr('href');
        const page = href.match(/page\/(\d+)/) || href.match(/paged=(\d+)/);
        const pageNum = page ? page[1] : 1;
        
        // Valores actuales de filtros
        const searchQuery = $searchInput.val().trim();
        const yearFilter = $yearFilter.val();
        const sortOrder = $sortFilter.val();
        
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