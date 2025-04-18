/**
 * Carousel scripts for Kintsugi Content Manager - Theme Version (without styles)
 */

(function($) {
    'use strict';

    // Variable global para controlar si hay un video reproduciéndose
    let videoIsPlaying = false;

    // Function to initialize everything
    function initKintsugiCarousel() {
        initCarousel();
        initVideoPopup();
    }

    // Document ready
    $(function() {
        initKintsugiCarousel();
    });
    
    // If loaded dynamically (for Sage themes)
    // This ensures the script works when directly embedded in the page
    if (typeof window.initKintsugiCarousel === 'undefined') {
        window.initKintsugiCarousel = initKintsugiCarousel;
    }
    
    // Initialize Swiper carousel
    function initCarousel() {
        if ($('.kintsugi-carousel-container').length) {
            var swiperInstances = [];
            
            $('.kintsugi-carousel-container').each(function(index) {
                // Verificar si ya tiene un ID, de lo contrario asignarle uno
                var $container = $(this);
                var carouselId = $container.attr('id');
                if (!carouselId) {
                    carouselId = 'kintsugi-carousel-' + index;
                    $container.attr('id', carouselId);
                }
                
                // Check if this carousel is already initialized
                if ($container.hasClass('carousel-initialized')) {
                    return;
                }
                
                // Inicializar Swiper con opciones adaptadas
                var swiper = new Swiper('#' + carouselId, {
                    slidesPerView: 1,
                    spaceBetween: 20,
                    loop: true,
                    grabCursor: true,
                    effect: 'slide',
                    speed: 600,
                    watchOverflow: true,
                    observer: true, 
                    observeParents: true,
                    updateOnWindowResize: true,
                    autoplay: {
                        delay: 5000,
                        disableOnInteraction: false,
                        pauseOnMouseEnter: true,
                    },
                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true,
                        dynamicBullets: true,
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
                        },
                    },
                    on: {
                        init: function() {
                            $('#' + carouselId).addClass('carousel-initialized');
                            console.log('Swiper iniciado con slidesPerView:', this.params.slidesPerView);
                            
                            // Añadir elementos de navegación y paginación si no existen
                            if ($('#' + carouselId + ' .swiper-pagination').length === 0) {
                                $('#' + carouselId).append('<div class="swiper-pagination"></div>');
                            }
                            
                            if ($('#' + carouselId + ' .kintsugi-carousel-nav-prev').length === 0) {
                                $('#' + carouselId).append('<div class="kintsugi-carousel-nav-prev" role="button" aria-label="Previous slide" style="position: absolute; left: -30px; top: 50%; transform: translateY(-50%); width: 50px; height: 50px; background-color: rgba(54, 39, 102, 0.8); border-radius: 50%; cursor: pointer; z-index: 10; display: flex; align-items: center; justify-content: center;"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"></polyline></svg></div>');
                            }
                            
                            if ($('#' + carouselId + ' .kintsugi-carousel-nav-next').length === 0) {
                                $('#' + carouselId).append('<div class="kintsugi-carousel-nav-next" role="button" aria-label="Next slide" style="position: absolute; right: -30px; top: 50%; transform: translateY(-50%); width: 50px; height: 50px; background-color: rgba(54, 39, 102, 0.8); border-radius: 50%; cursor: pointer; z-index: 10; display: flex; align-items: center; justify-content: center;"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg></div>');
                            }
                            
                            // Mejorar el aspecto visual de las diapositivas
                            $('#' + carouselId + ' .kintsugi-carousel-slide').css({
                                'transition': 'all 0.3s ease',
                                'border-radius': '12px',
                                'overflow': 'hidden',
                                'box-shadow': '0 5px 15px rgba(0, 0, 0, 0.08)',
                                'height': '420px'
                            });
                            
                            // Añadir efecto hover a las diapositivas
                            $('#' + carouselId + ' .kintsugi-carousel-slide').hover(
                                function() {
                                    $(this).css({
                                        'transform': 'translateY(-10px)',
                                        'box-shadow': '0 15px 30px rgba(54, 39, 102, 0.15)'
                                    });
                                    $(this).find('img').css('transform', 'scale(1.05)');
                                },
                                function() {
                                    $(this).css({
                                        'transform': '',
                                        'box-shadow': '0 5px 15px rgba(0, 0, 0, 0.08)'
                                    });
                                    $(this).find('img').css('transform', '');
                                }
                            );
                            
                            // Forzar actualización de Swiper después de un breve retraso
                            setTimeout(function() {
                                swiper.update();
                            }, 500);
                        }
                    }
                });
                
                swiperInstances.push(swiper);
            });
            
            // Guardar referencia global de instancias de Swiper
            window.kintsugiSwiperInstances = swiperInstances;
        }
    }
    
    // Inicialización del popup de video
    function initVideoPopup() {
        // Evitar duplicación de eventos
        $(document).off('click', '.kintsugi-carousel-video-link');
        
        // Agregar evento click para links de video
        $(document).on('click', '.kintsugi-carousel-video-link', function(e) {
            e.preventDefault();
            
            // Prevenir múltiples reproducciones simultáneas
            if (videoIsPlaying) {
                return false;
            }
            
            var videoUrl = $(this).data('video-url');
            if (videoUrl) {
                videoIsPlaying = true; // Marcar que hay un video reproduciéndose
                openVideoPopup(videoUrl);
                
                // Pausar autoplay cuando se abre un video
                if (window.kintsugiSwiperInstances && window.kintsugiSwiperInstances.length) {
                    window.kintsugiSwiperInstances.forEach(function(swiper) {
                        if (swiper && swiper.autoplay) {
                            swiper.autoplay.stop();
                        }
                    });
                }
            }
            return false;
        });
        
        // Cerrar popup al hacer click en el botón o fondo
        $(document).on('click', '.kintsugi-video-popup-close, .kintsugi-video-popup', function(e) {
            if ($(e.target).is('.kintsugi-video-popup-close') || $(e.target).is('.kintsugi-video-popup') || $(e.target).closest('.kintsugi-video-popup-close').length) {
                closeVideoPopup();
            }
        });
        
        // Cerrar popup con tecla Escape
        $(document).on('keyup', function(e) {
            if (e.key === 'Escape') {
                closeVideoPopup();
            }
        });
        
        // Asegurarse de que exista el popup
        if ($('.kintsugi-video-popup').length === 0) {
            createVideoPopup();
        }
    }
    
    // Función para crear el popup de video si no existe
    function createVideoPopup() {
        // Si ya existe un popup, no creamos otro
        if ($('.kintsugi-video-popup').length > 0) {
            return;
        }
        
        $('body').append(`
            <div class="kintsugi-video-popup" style="display: none; position: fixed; top: 0; left: 0; right: 0; bottom: 0; background-color: rgba(0, 0, 0, 0.9); z-index: 999999; justify-content: center; align-items: center;">
                <div class="kintsugi-video-popup-container" style="position: relative; width: 90%; max-width: 900px; max-height: 80vh; background: #000; border-radius: 8px; overflow: hidden; box-shadow: 0 0 30px rgba(0, 0, 0, 0.5);">
                    <button class="kintsugi-video-popup-close" style="position: absolute; top: 10px; right: 10px; background: rgba(0, 0, 0, 0.7); color: white; font-size: 24px; font-weight: bold; width: 40px; height: 40px; border: none; border-radius: 50%; cursor: pointer; display: flex; align-items: center; justify-content: center; z-index: 1000001;">✕</button>
                    <div class="kintsugi-video-popup-content" style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden;">
                    </div>
                </div>
            </div>
        `);
        
        // Añadir los event listeners
        $('.kintsugi-video-popup-close').on('click', function() {
            closeVideoPopup();
        });
        
        $('.kintsugi-video-popup').on('click', function(e) {
            if ($(e.target).hasClass('kintsugi-video-popup')) {
                closeVideoPopup();
            }
        });
    }
    
    // Función para abrir el popup de video
    function openVideoPopup(videoUrl) {
        // Extraer ID de YouTube
        var videoId = extractYouTubeId(videoUrl);
        
        if (videoId) {
            // Asegurarse de que el popup exista en el DOM - crearlo solo si es necesario
            createVideoPopup();
            
            // Limpiar cualquier iframe existente para evitar reproducción doble
            $('.kintsugi-video-popup-content').empty();
            
            // Crear un nuevo iframe con los atributos correctos
            var $iframe = $('<iframe></iframe>')
                .attr({
                    'allow': 'autoplay; encrypted-media',
                    'allowfullscreen': 'true',
                    'style': 'position: absolute; top: 0; left: 0; width: 100%; height: 100%; border: none;'
                });
            
            // Crear URL para embeber
            var embedUrl = 'https://www.youtube.com/embed/' + videoId + '?autoplay=1&rel=0&modestbranding=1';
            
            // Agregar el iframe al contenedor
            $('.kintsugi-video-popup-content').append($iframe);
            
            // Mostrar popup - Forzar que esté sobre todo el contenido
            $('.kintsugi-video-popup')
                .appendTo('body') // Mover al final del body para evitar problemas de posicionamiento
                .css({
                    'display': 'flex',
                    'position': 'fixed',
                    'z-index': '999999',
                    'top': '0',
                    'left': '0',
                    'right': '0',
                    'bottom': '0'
                })
                .addClass('active');
            
            // Agregar clase al body para prevenir scroll
            $('body').addClass('kintsugi-popup-open').css('overflow', 'hidden');
            
            // Solo establecer el src después de que el popup sea visible para evitar problemas de carga
            setTimeout(function() {
                $iframe.attr('src', embedUrl);
            }, 100);
        }
    }
    
    // Función para extraer ID de YouTube
    function extractYouTubeId(url) {
        var regExp = /^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#&?]*).*/;
        var match = url.match(regExp);
        return (match && match[7].length === 11) ? match[7] : false;
    }
    
    // Función para cerrar el popup de video
    function closeVideoPopup() {
        // Limpiar src del iframe para detener el video - primero vaciar el src y luego eliminar el iframe
        $('.kintsugi-video-popup-content iframe').attr('src', '');
        setTimeout(function() {
            $('.kintsugi-video-popup-content').empty();
        }, 100);
        
        // Ocultar popup
        $('.kintsugi-video-popup').removeClass('active').fadeOut(300, function() {
            // Una vez que se ha ocultado completamente, eliminamos el popup del DOM
            $(this).remove();
        });
        
        // Quitar clase del body
        $('body').removeClass('kintsugi-popup-open').css('overflow', '');
        
        // Resetear el estado de reproducción
        videoIsPlaying = false;
        
        // Reanudar autoplay de los carruseles
        if (window.kintsugiSwiperInstances && window.kintsugiSwiperInstances.length) {
            window.kintsugiSwiperInstances.forEach(function(swiper) {
                if (swiper && swiper.autoplay) {
                    swiper.autoplay.start();
                }
            });
        }
    }

})(jQuery); 