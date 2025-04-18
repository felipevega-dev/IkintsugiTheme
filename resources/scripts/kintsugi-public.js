/**
 * Public scripts for Kintsugi Content Manager - Theme Version (without styles)
 */

(function($) {
    'use strict';
    
    // Variable global para controlar si hay un video reproduciéndose
    let videoIsPlaying = false;

    // Function to initialize everything
    function initKintsugiPublic() {
        // Ensure all external article links open in a new tab
        $('.kintsugi-noticia-item a, .kintsugi-carousel-slide a').each(function() {
            if (!$(this).hasClass('kintsugi-noticia-video-link') && 
                !$(this).hasClass('kintsugi-carousel-video-link')) {
                $(this).attr('target', '_blank');
                $(this).attr('rel', 'noopener noreferrer');
            }
        });
        
        // Handle video links click (for BOTH noticia and carousel items)
        $(document).on("click", ".kintsugi-noticia-video-link, .kintsugi-carousel-video-link", function(e) {
            e.preventDefault();
            
            // Prevenir múltiples reproducciones simultáneas
            if (videoIsPlaying) {
                return false;
            }
            
            var videoUrl = $(this).data('video-url');
            if (videoUrl) {
                videoIsPlaying = true; // Marcar que hay un video reproduciéndose
                openVideoPopup(videoUrl);
            }
        });
        
        // Handle video popup close
        $('.kintsugi-video-popup-close').on('click', function() {
            closeVideoPopup();
        });
        
        // Close popup on escape key
        $(document).on('keyup', function(e) {
            if (e.key === 'Escape') {
                closeVideoPopup();
            }
        });
        
        // Close popup on background click
        $('.kintsugi-video-popup').on('click', function(e) {
            if ($(e.target).hasClass('kintsugi-video-popup')) {
                closeVideoPopup();
            }
        });
    }

    // Document ready
    $(function() {
        initKintsugiPublic();
    });
    
    // If loaded dynamically (for Sage themes)
    // This ensures the script works when directly embedded in the page
    if (typeof window.initKintsugiPublic === 'undefined') {
        window.initKintsugiPublic = initKintsugiPublic;
    }
    
    // Function to create video popup if it doesn't exist
    function createVideoPopup() {
        // Si ya existe un popup, no creamos otro
        if ($('.kintsugi-video-popup').length > 0) {
            return;
        }
        
        // Append structure WITHOUT inline styles - rely on CSS in prensa.blade.php
        $("body").append(`
            <div class="kintsugi-video-popup">
                <div class="kintsugi-video-popup-container">
                    <button class="kintsugi-video-popup-close">✕</button>
                    <div class="kintsugi-video-popup-content">
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
    
    // Function to open video popup
    function openVideoPopup(videoUrl) {
        // Extract YouTube video ID
        var videoId = extractYouTubeId(videoUrl);
        
        if (videoId) {
            // Asegurarse de que el popup exista en el DOM - crearlo solo si es necesario
            createVideoPopup();
            
            // Limpiar cualquier iframe existente para evitar reproducción doble
            $('.kintsugi-video-popup-content').empty();
            
            // Crear un nuevo iframe con los atributos correctos
            var $iframe = $("<iframe></iframe>")
                .attr({
                    "allow": "autoplay; encrypted-media",
                    "allowfullscreen": "true"
                    // Style comes from CSS
                });
            
            // Create embed URL
            var embedUrl = 'https://www.youtube.com/embed/' + videoId + '?autoplay=1&rel=0&modestbranding=1';
            
            // Agregar el iframe al contenedor y establecer su src
            $('.kintsugi-video-popup-content').append($iframe);
            
            // Show popup - Forzar que esté sobre todo el contenido
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
            
            // Add class to body to prevent scroll
            $('body').addClass('kintsugi-popup-open').css('overflow', 'hidden');
            
            // Set src immediately
            $iframe.attr("src", embedUrl);
            
            // Pausar todos los carouseles que puedan estar reproduciéndose
            if (window.kintsugiSwiperInstances && window.kintsugiSwiperInstances.length) {
                window.kintsugiSwiperInstances.forEach(function(swiper) {
                    if (swiper && swiper.autoplay) {
                        swiper.autoplay.stop();
                    }
                });
            }
        }
    }
    
    // Function to close video popup
    function closeVideoPopup() {
        // Clear iframe src to stop video - primero vaciar el src y luego eliminar el iframe
        $('.kintsugi-video-popup-content iframe').attr('src', '');
        setTimeout(function() {
            $('.kintsugi-video-popup-content').empty();
        }, 100);
        
        // Hide popup with fade out effect
        $('.kintsugi-video-popup').removeClass('active').fadeOut(300, function() {
            // Una vez que se ha ocultado completamente, eliminamos el popup del DOM
            $(this).remove();
        });
        
        // Remove class from body
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
    
    // Function to extract YouTube video ID
    function extractYouTubeId(url) {
        var regExp = /^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#&?]*).*/;
        var match = url.match(regExp);
        return (match && match[7].length === 11) ? match[7] : false;
    }

})(jQuery); 