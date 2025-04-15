/**
 * Carousel scripts for Kintsugi Content Manager.
 *
 * @package    Kintsugi_Content_Manager
 * @subpackage Kintsugi_Content_Manager/public/js
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
                    speed: 800,
                    autoplay: {
                        delay: 5000,
                        disableOnInteraction: false,
                        pauseOnMouseEnter: true,
                    },
                    pagination: {
                        el: '#' + carouselId + ' .swiper-pagination',
                        clickable: true,
                        dynamicBullets: true,
                    },
                    navigation: {
                        nextEl: '#' + carouselId + ' .kintsugi-carousel-nav-next',
                        prevEl: '#' + carouselId + ' .kintsugi-carousel-nav-prev',
                    },
                    breakpoints: {
                        768: {
                            slidesPerView: 2,
                            spaceBetween: 20,
                        },
                        992: {
                            slidesPerView: 3,
                            spaceBetween: 30,
                        },
                    },
                    on: {
                        init: function() {
                            $('#' + carouselId).addClass('carousel-initialized');
                            
                            // Garantizar que todas las imágenes tengan altura uniforme
                            $('.kintsugi-carousel-slide').css('height', '400px');
                            
                            // Garantizar que todas las imágenes se muestren correctamente
                            $('.kintsugi-carousel-image img').css({
                                'width': '100%',
                                'height': '100%',
                                'object-fit': 'cover'
                            });
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
            if ($(e.target).is('.kintsugi-video-popup-close') || $(e.target).is('.kintsugi-video-popup')) {
                closeVideoPopup();
            }
        });
        
        // Cerrar popup con tecla Escape
        $(document).on('keyup', function(e) {
            if (e.key === 'Escape') {
                closeVideoPopup();
            }
        });
    }
    
    // Función para abrir el popup de video
    function openVideoPopup(videoUrl) {
        // Extraer ID de YouTube
        var videoId = extractYouTubeId(videoUrl);
        
        if (videoId) {
            // Crear URL para embeber
            var embedUrl = 'https://www.youtube.com/embed/' + videoId + '?autoplay=1&rel=0&modestbranding=1';
            
            // Establecer src del iframe
            $('.kintsugi-video-popup-content iframe').attr('src', embedUrl);
            
            // Mostrar popup
            $('.kintsugi-video-popup').addClass('active').fadeIn(300);
            
            // Agregar clase al body para prevenir scroll
            $('body').addClass('kintsugi-popup-open');
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
        // Limpiar src del iframe para detener el video
        $('.kintsugi-video-popup-content iframe').attr('src', '');
        
        // Ocultar popup
        $('.kintsugi-video-popup').removeClass('active').fadeOut(300);
        
        // Quitar clase del body
        $('body').removeClass('kintsugi-popup-open');
        
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