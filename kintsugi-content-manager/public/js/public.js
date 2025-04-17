/**
 * Public scripts for Kintsugi Content Manager.
 *
 * @package    Kintsugi_Content_Manager
 * @subpackage Kintsugi_Content_Manager/public/js
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
        
        // Handle video links click (only for noticia items, not carousel ones - those are handled in carousel.js)
        $('.kintsugi-noticia-video-link').on('click', function(e) {
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
    
    // Function to open video popup
    function openVideoPopup(videoUrl) {
        // Extract YouTube video ID
        var videoId = extractYouTubeId(videoUrl);
        
        if (videoId) {
            // Create embed URL
            var embedUrl = 'https://www.youtube.com/embed/' + videoId + '?autoplay=1';
            
            // Set iframe src
            $('.kintsugi-video-popup-content iframe').attr('src', embedUrl);
            
            // Show popup
            $('.kintsugi-video-popup').addClass('active').fadeIn(300);
            
            // Add class to body to prevent scroll
            $('body').addClass('kintsugi-popup-open');
        }
    }
    
    // Function to close video popup
    function closeVideoPopup() {
        // Clear iframe src to stop video
        $('.kintsugi-video-popup-content iframe').attr('src', '');
        
        // Hide popup
        $('.kintsugi-video-popup').removeClass('active').fadeOut(300);
        
        // Remove class from body
        $('body').removeClass('kintsugi-popup-open');
        
        // Resetear el estado de reproducción
        videoIsPlaying = false;
    }
    
    // Function to extract YouTube video ID
    function extractYouTubeId(url) {
        var regExp = /^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#&?]*).*/;
        var match = url.match(regExp);
        return (match && match[7].length === 11) ? match[7] : false;
    }

})(jQuery); 