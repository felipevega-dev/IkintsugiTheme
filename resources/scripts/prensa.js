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
            const container = document.getElementById('kintsugi-noticias-ajax-container');
            if (!container) return;
            
            // Asegurarse de que las noticias estén en un contenedor grid
            const noticiasGrids = container.querySelectorAll('.kintsugi-noticias-grid');
            if (noticiasGrids.length === 0) {
                // Si no hay grid, envolver las noticias en uno
                const noticiaItems = container.querySelectorAll('.kintsugi-noticia-item');
                if (noticiaItems.length > 0) {
                    const gridContainer = document.createElement('div');
                    gridContainer.className = 'kintsugi-noticias-grid';
                    
                    // Rodear cada noticia con el div grid
                    noticiaItems.forEach(item => {
                        // Agregar el gradiente overlay a cada ítem
                        item.style.position = 'relative';
                        if (!item.querySelector('.noticia-gradient-overlay')) {
                            const overlay = document.createElement('div');
                            overlay.className = 'noticia-gradient-overlay';
                            overlay.style.cssText = 'position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(180deg, rgba(171, 39, 122, 0.4) 0%, rgba(3, 13, 85, 0.4) 61%); z-index: 1; pointer-events: none;';
                            item.insertBefore(overlay, item.firstChild);
                        }
                        
                        // Aplicar dimensiones específicas
                        item.style.cssText = 'width: 590px !important; height: 419px !important; border-radius: 16px !important; padding: 24px 16px 24px 16px !important; position: relative !important; overflow: hidden !important; background-color: transparent !important; border: none !important; transition: transform 0.4s cubic-bezier(0.165, 0.84, 0.44, 1) !important; margin-bottom: 20px !important;';
                        
                        // Asegurar que el contenido esté por encima del gradiente
                        const content = item.querySelector('.kintsugi-noticia-content');
                        if (content) {
                            content.style.cssText = 'position: relative !important; z-index: 2 !important; height: 100% !important; display: flex !important; flex-direction: column !important; justify-content: space-between !important;';
                        }
                        
                        // Mejorar la visibilidad del texto sobre el gradiente
                        const title = item.querySelector('.kintsugi-noticia-title');
                        if (title) {
                            title.style.cssText = 'color: white !important; font-size: 22px !important; font-weight: 700 !important; line-height: 1.3 !important; text-shadow: 0 1px 3px rgba(0, 0, 0, 0.3) !important;';
                        }
                        
                        const excerpt = item.querySelector('.kintsugi-noticia-excerpt');
                        if (excerpt) {
                            excerpt.style.cssText = 'color: rgba(255, 255, 255, 0.9) !important; font-size: 16px !important; line-height: 1.5 !important; text-shadow: 0 1px 2px rgba(0, 0, 0, 0.2) !important;';
                        }
                        
                        gridContainer.appendChild(item);
                    });
                    
                    // Limpiar el contenedor y agregar el nuevo grid
                    while (container.firstChild) {
                        container.removeChild(container.firstChild);
                    }
                    container.appendChild(gridContainer);
                    
                    // Agregar la paginación si existía
                    const pagination = document.querySelector('.kintsugi-noticias-pagination');
                    if (pagination) {
                        container.appendChild(pagination);
                    }
                }
            }
            
            // Aplicar estilos inline al grid para el layout correcto
            const allGrids = document.querySelectorAll('.kintsugi-noticias-grid');
            allGrids.forEach(grid => {
                grid.style.cssText = 'display: grid !important; grid-template-columns: repeat(1, 1fr) !important; gap: 169px !important; width: 100% !important; justify-items: center !important;';
                
                // Aplicar media query manualmente - ahora con breakpoint en 1280px
                if (window.innerWidth >= 1280) {
                    grid.style.cssText = 'display: grid !important; grid-template-columns: repeat(2, 1fr) !important; gap: 169px !important; width: 100% !important; justify-items: center !important;';
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