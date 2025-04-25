jQuery(document).ready(function($) {
    let page = 1;
    let loading = false;
    const grid = $('.carousel-grid');
    
    // Función para cargar más items
    function loadMoreItems() {
        if (loading) return;
        loading = true;
        
        const loadMoreBtn = $('#carousel-load-more');
        loadMoreBtn.text('Cargando...');
        
        $.ajax({
            url: simpleCarouselGrid.ajaxurl,
            type: 'POST',
            data: {
                action: 'load_more_carousel_items',
                nonce: simpleCarouselGrid.nonce,
                page: page,
                year: $('#carousel-year').val(),
                sort: $('#carousel-sort').val(),
                search: $('#carousel-search').val()
            },
            success: function(response) {
                if (response.success) {
                    if (response.data.items) {
                        grid.append(response.data.items);
                        page++;
                        
                        if (!response.data.has_more) {
                            loadMoreBtn.hide();
                        }
                    }
                }
                loadMoreBtn.text('Cargar más');
                loading = false;
            },
            error: function() {
                loadMoreBtn.text('Cargar más');
                loading = false;
            }
        });
    }
    
    // Click en "Cargar más"
    $('#carousel-load-more').on('click', loadMoreItems);
    
    // Filtros
    function applyFilters() {
        page = 1;
        grid.empty();
        loadMoreItems();
    }
    
    $('#carousel-year, #carousel-sort').on('change', applyFilters);
    
    // Búsqueda con debounce
    let searchTimeout;
    $('#carousel-search').on('input', function() {
        clearTimeout(searchTimeout);
        searchTimeout = setTimeout(applyFilters, 500);
    });
    
    // Lazy loading de imágenes
    function lazyLoadImages() {
        const images = document.querySelectorAll('.carousel-grid-item img[data-src]');
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.dataset.src;
                    img.removeAttribute('data-src');
                    observer.unobserve(img);
                }
            });
        });
        
        images.forEach(img => imageObserver.observe(img));
    }
    
    // Inicializar lazy loading
    if ('IntersectionObserver' in window) {
        lazyLoadImages();
    }
});

// Modal video eliminado, va en global.js
