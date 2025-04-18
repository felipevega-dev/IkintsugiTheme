// Verificar la disponibilidad de jQuery
document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM cargado. Verificando jQuery...');
    if (typeof jQuery === 'undefined') {
        console.error('jQuery NO está disponible');
    } else {
        console.log('jQuery está disponible. Versión:', jQuery.fn.jquery);
        // Inicializar funcionalidades
        initKintsugiCarousel();
        initNoticiasFilters();
        setupVideoPopups();
    }
});

// Pass AJAX parameters to our script
var kintsugi_ajax = {
  ajax_url: '',
  nonce: ''
};

// Función para inicializar el carrusel principal
function initKintsugiCarousel() {
    console.log('Inicializando carrusel principal...');
    
    // Verificar si Swiper está disponible
    if (typeof Swiper === 'undefined') {
        console.error('Error: Swiper no está disponible');
        return;
    }
    
    // Verificar si el elemento existe
    const carouselElement = document.querySelector('#kintsugi-carousel-main');
    if (!carouselElement) {
        console.warn('Elemento del carrusel #kintsugi-carousel-main no encontrado');
        return;
    }
    
    // Inicializar carrusel con Swiper
    try {
        const mainCarousel = new Swiper('#kintsugi-carousel-main', {
            slidesPerView: 1,
            spaceBetween: 20,
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.kintsugi-carousel-nav-next',
                prevEl: '.kintsugi-carousel-nav-prev',
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                    spaceBetween: 15,
                },
                992: {
                    slidesPerView: 3,
                    spaceBetween: 20,
                }
            }
        });
        console.log('Swiper inicializado correctamente:', mainCarousel);
        
        // Aplicar estilos a elementos del carrusel una vez inicializado
        applyInlineStyles();
    } catch (error) {
        console.error('Error al inicializar Swiper:', error);
    }
}

// Función para configurar popups de video
function setupVideoPopups() {
    console.log('Configurando popups de video...');
    
    // Seleccionar todos los botones de video
    const videoButtons = document.querySelectorAll('.kintsugi-carousel-video-link, .kintsugi-noticia-video-link');
    
    if (videoButtons.length === 0) {
        console.warn('No se encontraron botones de video para configurar');
    } else {
        console.log(`Configurando ${videoButtons.length} botones de video`);
    }
    
    // Configurar cada botón de video
    videoButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            const videoUrl = this.getAttribute('data-video-url');
            if (!videoUrl) {
                console.warn('Botón de video sin URL:', this);
                return;
            }
            
            console.log('Abriendo video:', videoUrl);
            
            // Buscar el popup de video existente
            let popup = document.querySelector('.kintsugi-video-popup');
            
            if (popup) {
                // Si ya existe un popup, usar ese
                const iframe = popup.querySelector('iframe');
                if (iframe) {
                    iframe.setAttribute('src', videoUrl);
                }
                popup.classList.add('active');
                
                // Configurar cierre de popup
                const closeButton = popup.querySelector('.kintsugi-video-popup-close');
                if (closeButton) {
                    closeButton.addEventListener('click', function() {
                        popup.classList.remove('active');
                        popup.querySelector('iframe').setAttribute('src', '');
                    });
                }
            } else {
                console.error('No se encontró el elemento .kintsugi-video-popup en el DOM');
            }
        });
    });
    
    // Cerrar popup al hacer clic fuera del contenido
    document.addEventListener('click', function(e) {
        const popup = document.querySelector('.kintsugi-video-popup.active');
        if (popup && !popup.querySelector('.kintsugi-video-popup-inner').contains(e.target)) {
            popup.classList.remove('active');
            popup.querySelector('iframe').setAttribute('src', '');
        }
    });
}

/**
 * Custom JavaScript for Prensa page
 * Handles AJAX search, filtering, and sorting of news items
 */
jQuery(document).ready(function($) {
    'use strict';

    console.log("Kintsugi Prensa JS initialized");

    // Inicializar componentes cuando el DOM esté listo
    initKintsugiCarousel();
    setupVideoPopups();
    setupSearchAndFilters();

    /**
     * Inicializa el carrusel de Swiper si existe el elemento y la librería
     */
    function initKintsugiCarousel() {
        console.log("Initializing Kintsugi Carousel");
        
        // Verificar si Swiper está disponible
        if (typeof Swiper === 'undefined') {
            console.error("Swiper library not found. Make sure it's properly loaded.");
            return;
        }
        
        // Verificar si el contenedor del carrusel existe
        if (!$('.kintsugi-carousel-container').length) {
            console.log("No carousel container found, skipping initialization");
            return;
        }
        
        try {
            // Inicializar carrusel de noticias
            var swiper = new Swiper('.kintsugi-carousel-container', {
                slidesPerView: 'auto',
                spaceBetween: 20,
                grabCursor: true,
                loop: false,
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.kintsugi-carousel-nav-next',
                    prevEl: '.kintsugi-carousel-nav-prev',
                },
                breakpoints: {
                    640: {
                        slidesPerView: 2,
                        spaceBetween: 15
                    },
                    992: {
                        slidesPerView: 3,
                        spaceBetween: 20
                    }
                }
            });
            
            console.log("Kintsugi Carousel initialized successfully");
        } catch (error) {
            console.error("Error initializing Swiper carousel:", error);
        }
    }

    /**
     * Configura los popups de video
     */
    function setupVideoPopups() {
        console.log("Setting up video popups");
        
        // Selector que agrupa todos los posibles botones de video
        const videoButtons = $('.kintsugi-carousel-play, .kintsugi-noticia-video-play, .kintsugi-video-button');
        
        if (!videoButtons.length) {
            console.log("No video buttons found, skipping setup");
            return;
        }
        
        // Asegurarse de que el contenedor del popup exista
        if (!$('.kintsugi-video-popup').length) {
            console.log("Creating video popup container");
            $('body').append(`
                <div class="kintsugi-video-popup">
                    <div class="kintsugi-video-popup-inner">
                        <div class="kintsugi-video-popup-container">
                            <div class="kintsugi-video-popup-content"></div>
                        </div>
                        <button class="kintsugi-video-popup-close">×</button>
                    </div>
                </div>
            `);
        }
        
        // Manejar clics en botones de video
        videoButtons.off('click').on('click', function(e) {
            e.preventDefault();
            console.log("Video button clicked");
            
            const videoUrl = $(this).data('video-url');
            console.log("Video URL:", videoUrl);
            
            if (!videoUrl) {
                console.error("No video URL found on this button");
                return;
            }
            
            // Determinar el tipo de video (YouTube, Vimeo, etc.) y generar el iframe correspondiente
            let videoIframe = '';
            
            if (videoUrl.includes('youtube.com') || videoUrl.includes('youtu.be')) {
                // Extraer ID de YouTube
                let youtubeId = '';
                if (videoUrl.includes('youtube.com/watch?v=')) {
                    youtubeId = videoUrl.split('v=')[1];
                    const ampersandPosition = youtubeId.indexOf('&');
                    if (ampersandPosition !== -1) {
                        youtubeId = youtubeId.substring(0, ampersandPosition);
                    }
                } else if (videoUrl.includes('youtu.be/')) {
                    youtubeId = videoUrl.split('youtu.be/')[1];
                }
                
                videoIframe = `<iframe src="https://www.youtube.com/embed/${youtubeId}?autoplay=1" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>`;
            } else if (videoUrl.includes('vimeo.com')) {
                // Extraer ID de Vimeo
                const vimeoId = videoUrl.split('vimeo.com/')[1];
                videoIframe = `<iframe src="https://player.vimeo.com/video/${vimeoId}?autoplay=1" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>`;
            } else {
                // Para otros formatos de video o URLs directas
                videoIframe = `<iframe src="${videoUrl}" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>`;
            }
            
            // Insertar iframe en el popup
            $('.kintsugi-video-popup-content').html(videoIframe);
            
            // Mostrar el popup con una animación suave
            $('.kintsugi-video-popup').addClass('active');
            
            // Evitar scroll en el body mientras el popup está activo
            $('body').css('overflow', 'hidden');
        });
        
        // Cerrar el popup al hacer clic en el botón de cerrar o fuera del contenido
        $('.kintsugi-video-popup-close, .kintsugi-video-popup').off('click').on('click', function(e) {
            if (e.target === this || $(this).hasClass('kintsugi-video-popup-close')) {
                $('.kintsugi-video-popup').removeClass('active');
                
                // Detener la reproducción del video al cerrar el popup
                setTimeout(function() {
                    $('.kintsugi-video-popup-content').empty();
                }, 300);
                
                // Restaurar scroll del body
                $('body').css('overflow', '');
            }
        });
        
        // Evitar que el clic dentro del contenedor del video cierre el popup
        $('.kintsugi-video-popup-container').on('click', function(e) {
            e.stopPropagation();
        });
        
        console.log("Video popups setup complete");
    }

    /**
     * Configura la búsqueda y filtros para las noticias
     */
    function setupSearchAndFilters() {
        console.log("Setting up search and filters");
        
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
    
    // Re-inicializar componentes después de cargas AJAX
    $(document).ajaxComplete(function() {
        console.log("AJAX request completed, reinitializing components");
        setupVideoPopups();
        enforceGridLayout();
    });
});

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
// Función para aplicar estilos inline a elementos del plugin
function applyInlineStyles() {
    console.log('Aplicando estilos inline a elementos generados dinámicamente');
    
    // Aplicar estilos a elementos del carrusel
    $('.kintsugi-carousel-slide').attr('style', 'position: relative !important; border-radius: 8px !important; overflow: hidden !important; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1) !important; height: 400px !important; transition: transform 0.3s, box-shadow 0.3s !important; background-color: #fff !important; border: 1px solid rgba(54, 39, 102, 0.1) !important;');
    
    $('.kintsugi-carousel-image').attr('style', 'height: 200px !important; overflow: hidden !important;');
    $('.kintsugi-carousel-image img').attr('style', 'width: 100% !important; height: 100% !important; object-fit: cover !important; transition: transform 0.5s !important;');
    
    $('.kintsugi-carousel-content').attr('style', 'padding: 15px !important; position: relative !important; z-index: 2 !important;');
    $('.kintsugi-carousel-title').attr('style', 'margin: 0 0 8px !important; font-size: 18px !important; font-weight: 700 !important; color: #030D55 !important; line-height: 1.3 !important; font-family: "Playfair Display", serif !important;');
    $('.kintsugi-carousel-excerpt').attr('style', 'font-size: 14px !important; color: #4a4a4a !important; line-height: 1.5 !important;');
    
    $('.kintsugi-carousel-date').attr('style', 'position: absolute !important; top: 10px !important; right: 10px !important; background: rgba(54, 39, 102, 0.8) !important; color: #fff !important; padding: 4px 8px !important; border-radius: 4px !important; font-size: 12px !important; z-index: 5 !important;');
    $('.kintsugi-carousel-overlay').attr('style', 'position: absolute !important; inset: 0 !important; background: linear-gradient(to bottom, rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, 0.7) 100%) !important; z-index: 1 !important;');
    
    // Aplicar estilos a los botones de reproducción de video
    $('.kintsugi-carousel-play, .kintsugi-noticia-video-play').attr('style', 'position: absolute !important; top: 50% !important; left: 50% !important; transform: translate(-50%, -50%) !important; width: 60px !important; height: 60px !important; background-color: rgba(54, 39, 102, 0.8) !important; border-radius: 50% !important; display: flex !important; align-items: center !important; justify-content: center !important; z-index: 3 !important; cursor: pointer !important;');
    
    // Crear triángulo de reproducción
    $('.kintsugi-carousel-play, .kintsugi-noticia-video-play').each(function() {
        if (!$(this).find('.play-triangle').length) {
            $(this).html('<div class="play-triangle" style="width: 0 !important; height: 0 !important; border-top: 12px solid transparent !important; border-bottom: 12px solid transparent !important; border-left: 18px solid white !important; margin-left: 5px !important;"></div>');
        }
    });
    
    // Aplicar estilos a elementos de noticias
    $('.kintsugi-noticia-item').attr('style', 'width: 590px !important; height: 419px !important; border-radius: 16px !important; padding: 24px 16px 24px 16px !important; position: relative !important; overflow: hidden !important; background-color: transparent !important; border: none !important; transition: transform 0.4s cubic-bezier(0.165, 0.84, 0.44, 1) !important; margin-bottom: 20px !important;');
    
    $('.kintsugi-noticia-image, .kintsugi-noticia-video').attr('style', 'height: 200px !important; overflow: hidden !important;');
    $('.kintsugi-noticia-img').attr('style', 'width: 100% !important; height: 100% !important; object-fit: cover !important; transition: transform 0.5s !important;');
    
    $('.kintsugi-noticia-content').attr('style', 'padding: 15px !important; position: relative !important; z-index: 2 !important;');
    $('.kintsugi-noticia-title').attr('style', 'margin: 0 0 8px !important; font-size: 18px !important; font-weight: 700 !important; color: #030D55 !important; line-height: 1.3 !important; font-family: "Playfair Display", serif !important;');
    $('.kintsugi-noticia-excerpt').attr('style', 'font-size: 14px !important; color: #4a4a4a !important; line-height: 1.5 !important;');
    
    $('.kintsugi-noticia-date').attr('style', 'position: absolute !important; top: 10px !important; right: 10px !important; background: rgba(54, 39, 102, 0.8) !important; color: #fff !important; padding: 4px 8px !important; border-radius: 4px !important; font-size: 12px !important; z-index: 5 !important;');
    $('.kintsugi-noticia-overlay').attr('style', 'position: absolute !important; inset: 0 !important; background: linear-gradient(to bottom, rgba(0, 0, 0, 0) 50%, rgba(0, 0, 0, 0.7) 100%) !important; z-index: 1 !important;');
    
    // Aplicar estilos a la paginación
    $('.kintsugi-noticias-pagination').attr('style', 'display: flex !important; justify-content: center !important; margin-top: 30px !important;');
    $('.kintsugi-noticias-pagination .page-numbers').attr('style', 'display: inline-flex !important; align-items: center !important; justify-content: center !important; width: 36px !important; height: 36px !important; margin: 0 3px !important; border-radius: 4px !important; border: 1px solid #ddd !important; color: #4a4a4a !important; text-decoration: none !important; transition: all 0.3s !important; font-weight: 500 !important;');
    $('.kintsugi-noticias-pagination .page-numbers.current').attr('style', 'background-color: #030D55 !important; border-color: #030D55 !important; color: white !important; display: inline-flex !important; align-items: center !important; justify-content: center !important; width: 36px !important; height: 36px !important; margin: 0 3px !important; border-radius: 4px !important;');
    $('.kintsugi-noticias-pagination .prev, .kintsugi-noticias-pagination .next').attr('style', 'width: auto !important; padding: 0 12px !important; display: inline-flex !important; align-items: center !important; justify-content: center !important; height: 36px !important; margin: 0 3px !important; border-radius: 4px !important; border: 1px solid #ddd !important; color: #4a4a4a !important; text-decoration: none !important; transition: all 0.3s !important;');
}

