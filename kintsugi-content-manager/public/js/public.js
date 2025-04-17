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
        // Asegurar que los thumbnails de videos se carguen correctamente
        initializeVideoThumbnails();
        
        // Ensure all external article links open in a new tab
        $('.kintsugi-noticia-item a, .kintsugi-carousel-slide a').each(function() {
            if (!$(this).hasClass('kintsugi-noticia-video-link') && 
                !$(this).hasClass('kintsugi-carousel-video-link')) {
                $(this).attr('target', '_blank');
                $(this).attr('rel', 'noopener noreferrer');
            }
        });
        
        // Handle video links click (for noticia items and carousel items)
        // Use event delegation for dynamically loaded content
        $(document).on('click', '.kintsugi-noticia-item a[data-video-url], .kintsugi-noticia-video-link, .kintsugi-carousel-video-link', function(e) {
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
            
            return false;
        });
        
        // Handle video popup close
        // Use event delegation for dynamically loaded content
        $(document).on('click', '.kintsugi-video-popup-close', function() {
            closeVideoPopup();
        });
        
        // Close popup on escape key
        $(document).on('keyup', function(e) {
            if (e.key === 'Escape') {
                closeVideoPopup();
            }
        });
        
        // Close popup on background click
        // Use event delegation for dynamically loaded content
        $(document).on('click', '.kintsugi-video-popup', function(e) {
            if ($(e.target).hasClass('kintsugi-video-popup')) {
                closeVideoPopup();
            }
        });
        
        // Fix para el video popup duplicado
        if ($('.kintsugi-video-popup').length > 1) {
            $('.kintsugi-video-popup:gt(0)').remove();
        }
        
        // Inicializar AJAX Search & Filtering si están presentes los elementos
        initializeAjaxFiltering();
    }
    
    // Function to initialize video thumbnails
    function initializeVideoThumbnails() {
        $('.kintsugi-noticia-video-preview').each(function() {
            var $this = $(this);
            var videoId = $this.data('video-id');
            
            if (videoId) {
                // Intentar cargar imagen HD primero
                var hdImg = new Image();
                hdImg.onload = function() {
                    $this.find('img').attr('src', this.src);
                };
                hdImg.onerror = function() {
                    // Si falla, cargar imagen estándar
                    $this.find('img').attr('src', 'https://img.youtube.com/vi/' + videoId + '/0.jpg');
                };
                hdImg.src = 'https://img.youtube.com/vi/' + videoId + '/maxresdefault.jpg';
                
                // Establece también un fondo de respaldo por si la imagen no carga
                $this.css('background-image', 'url(https://img.youtube.com/vi/' + videoId + '/0.jpg)');
            }
        });
    }
    
    // Function to initialize AJAX filtering
    function initializeAjaxFiltering() {
        if ($('#kintsugi-search-input').length && $('#kintsugi-noticias-ajax-container').length) {
            var ajaxUrl = typeof ajaxurl !== 'undefined' ? ajaxurl : '/wp-admin/admin-ajax.php';
            var searchTimer;
            var currentPage = 1;
            
            // Handle search input with debounce
            $('#kintsugi-search-input').on('input', function() {
                clearTimeout(searchTimer);
                searchTimer = setTimeout(function() {
                    currentPage = 1;
                    fetchFilteredResults();
                }, 300); // Reduced from 500ms to 300ms for faster response
            });
            
            // Handle year filter
            $('#kintsugi-year-filter').on('change', function() {
                currentPage = 1;
                fetchFilteredResults();
            });
            
            // Handle sort filter
            $('#kintsugi-sort-filter').on('change', function() {
                currentPage = 1;
                fetchFilteredResults();
            });
            
            // Handle pagination clicks
            // Ensure event delegation for pagination links inside the ajax container
            $(document).on('click', '#kintsugi-noticias-ajax-container .kintsugi-noticias-pagination a.page-numbers', function(e) {
                e.preventDefault();
                var href = $(this).attr('href');
                var page = getParameterByName('paged', href) || 1;
                currentPage = parseInt(page);
                fetchFilteredResults();
                
                // Scroll to top of results
                $('html, body').animate({
                    scrollTop: $('#kintsugi-noticias-ajax-container').offset().top - 100
                }, 300);
            });
            
            // Function to fetch filtered results
            function fetchFilteredResults() {
                var searchQuery = $('#kintsugi-search-input').val();
                var yearFilter = $('#kintsugi-year-filter').val();
                var sortFilter = $('#kintsugi-sort-filter').val();
                
                // Show loading state
                $('#kintsugi-noticias-ajax-container').html('<div class="text-center py-8"><div class="inline-block animate-spin rounded-full h-8 w-8 border-b-2 border-[#362766]"></div><p class="mt-2 text-gray-600">Cargando...</p></div>');
                
                // Parse sort filter
                var orderby = 'date';
                var order = 'DESC';
                
                if (sortFilter === 'date-asc') {
                    orderby = 'date';
                    order = 'ASC';
                } else if (sortFilter === 'title-asc') {
                    orderby = 'title';
                    order = 'ASC';
                } else if (sortFilter === 'title-desc') {
                    orderby = 'title';
                    order = 'DESC';
                }
                
                // Make AJAX request
                $.ajax({
                    url: ajaxUrl,
                    type: 'POST',
                    data: {
                        action: 'kintsugi_filter_noticias',
                        search: searchQuery,
                        year: yearFilter,
                        orderby: orderby,
                        order: order,
                        paged: currentPage,
                        per_page: 10 // Match the default per page (was 4)
                    },
                    success: function(response) {
                        $('#kintsugi-noticias-ajax-container').html(response);
                        
                        // Reinitialize components
                        initializeVideoThumbnails();
                        
                        // Ensure all external article links open in a new tab
                        $('.kintsugi-noticia-item a').each(function() {
                            if (!$(this).hasClass('kintsugi-noticia-video-link')) {
                                $(this).attr('target', '_blank');
                                $(this).attr('rel', 'noopener noreferrer');
                            }
                        });
                        
                        // Rebind video click events for grid items
                        $('.kintsugi-noticia-item a[data-video-url], .kintsugi-noticia-video-link').off('click').on('click', function(e) {
                            e.preventDefault();
                            
                            if (videoIsPlaying) {
                                return false;
                            }
                            
                            var videoUrl = $(this).data('video-url');
                            if (videoUrl) {
                                videoIsPlaying = true;
                                openVideoPopup(videoUrl);
                            }
                            
                            return false;
                        });
                        
                        // Highlight the active page in pagination
                        $('.kintsugi-noticias-pagination .page-numbers').removeClass('current');
                        $('.kintsugi-noticias-pagination .page-numbers').each(function() {
                            var pageNum = parseInt($(this).text());
                            if (pageNum === currentPage) {
                                $(this).addClass('current');
                            }
                        });
                    },
                    error: function() {
                        $('#kintsugi-noticias-ajax-container').html('<div class="p-4 bg-red-100 text-red-700 rounded">Error al cargar las noticias. Por favor, inténtalo de nuevo.</div>');
                    }
                });
            }
        }
    }
    
    // Function to get URL parameters - utility for pagination
    function getParameterByName(name, url) {
        if (!url) url = window.location.href;
        name = name.replace(/[\[\]]/g, '\\$&');
        var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
            results = regex.exec(url);
        if (!results) return null;
        if (!results[2]) return '';
        return decodeURIComponent(results[2].replace(/\+/g, ' '));
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
            // Ensure the popup exists and is unique
            var $popup = $('.kintsugi-video-popup');
            if ($popup.length > 1) {
                $popup.slice(1).remove(); // Remove duplicates if any
                $popup = $('.kintsugi-video-popup'); // Re-select the unique one
            }
            $popup.addClass('active').fadeIn(300);
            
            // Add class to body to prevent scroll
            $('body').addClass('kintsugi-popup-open');
            
            // Also stop any carousel auto-play if it exists (using the carousel.js functions)
            if (typeof window.kintsugiSwiperInstances !== 'undefined') {
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
        // Clear iframe src to stop video
        $('.kintsugi-video-popup-content iframe').attr('src', '');
        
        // Hide popup
        // Ensure the popup exists and is unique
        var $popup = $('.kintsugi-video-popup');
        if ($popup.length > 1) {
            $popup.slice(1).remove(); // Remove duplicates if any
            $popup = $('.kintsugi-video-popup'); // Re-select the unique one
        }
        $popup.removeClass('active').fadeOut(300);
        
        // Remove class from body
        $('body').removeClass('kintsugi-popup-open');
        
        // Resetear el estado de reproducción
        videoIsPlaying = false;
        
        // Also resume any carousel auto-play if it exists (using the carousel.js functions)
        if (typeof window.kintsugiSwiperInstances !== 'undefined') {
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
    
    // Expose functions to global scope to ensure they're accessible from other scripts
    window.kintsugiOpenVideoPopup = openVideoPopup;
    window.kintsugiCloseVideoPopup = closeVideoPopup;
    window.kintsugiExtractYouTubeId = extractYouTubeId;

})(jQuery); 