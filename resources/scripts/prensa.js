/**
 * Custom JavaScript for Prensa page
 * Handles AJAX search, filtering, and sorting of news items
 */

(function($) {
    'use strict';

    // Initialize when document is ready
    $(function() {
        initNoticiasFilters();
    });

    function initNoticiasFilters() {
        // DOM elements
        const $searchInput = $('#kintsugi-search-input');
        const $yearFilter = $('#kintsugi-year-filter');
        const $sortFilter = $('#kintsugi-sort-filter');
        const $container = $('#kintsugi-noticias-ajax-container');
        
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
                    
                    // Asegurarse de que el grid se aplique correctamente
                    enforceGridLayout();
                    
                    // Initialize any video links in the new content
                    if (typeof window.initKintsugiPublic === 'function') {
                        window.initKintsugiPublic();
                    }
                    
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
                }
            });
        }
        
        // Función para forzar que las noticias se muestren en grid
        function enforceGridLayout() {
            // Asegurarse de que las noticias estén en un contenedor grid
            const noticiasGrids = $container.find('.kintsugi-noticias-grid');
            if (noticiasGrids.length === 0) {
                // Si no hay grid, envolver las noticias en uno
                const noticiaItems = $container.find('.kintsugi-noticia-item');
                if (noticiaItems.length > 0) {
                    const gridContainer = $('<div class="kintsugi-noticias-grid"></div>');
                    
                    // Rodear cada noticia con el div grid
                    noticiaItems.each(function() {
                        gridContainer.append($(this));
                    });
                    
                    // Limpiar el contenedor y agregar el nuevo grid
                    $container.empty().append(gridContainer);
                    
                    // Agregar la paginación si existía
                    const pagination = $('.kintsugi-noticias-pagination');
                    if (pagination.length) {
                        $container.append(pagination);
                    }
                }
            }
            
            // Aplicar estilos inline a cada elemento para forzar el layout
            $('.kintsugi-noticias-grid').attr('style', 'display: grid !important; grid-template-columns: repeat(1, 1fr) !important; gap: 20px !important; width: 100% !important;');
            
            // Aplicar media query manualmente
            if (window.innerWidth >= 640) {
                $('.kintsugi-noticias-grid').attr('style', 'display: grid !important; grid-template-columns: repeat(2, 1fr) !important; gap: 20px !important; width: 100% !important;');
            }
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
                    
                    // Initialize any video links in the new content
                    if (typeof window.initKintsugiPublic === 'function') {
                        window.initKintsugiPublic();
                    }
                    
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
                }
            });
        });
    }

})(jQuery); 