/**
 * Carousel scripts for Kintsugi Content Manager - Theme Version (without styles)
 */

(function($) {
    'use strict';

    // Function to initialize everything
    function initKintsugiCarousel() {
        initCarousel();
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

})(jQuery); 