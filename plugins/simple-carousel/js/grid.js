jQuery(document).ready(function($) {
    let page = 1;
    let loading = false;
    const grid = $('.carousel-grid');
    const loadMoreBtn = $('#carousel-load-more');

    function loadGridItems(reset = false) {
        if (loading) return;
        loading = true;
        if (reset) {
            page = 1;
            grid.html('<div style="text-align:center;padding:2em 0;">Cargando...</div>');
        } else {
            loadMoreBtn.text('Cargando...');
        }

        $.ajax({
            url: simpleCarouselGrid.ajaxurl,
            type: 'POST',
            data: {
                action: 'simple_carousel_grid_search',
                nonce: simpleCarouselGrid.nonce,
                search: $('#carousel-search').val(),
                year: $('#carousel-year').val(),
                sort: $('#carousel-sort').val(),
                page: page
            },
            success: function(response) {
                if (response.success && response.data.items) {
                    if (reset) {
                        grid.html(response.data.items);
                    } else {
                        grid.append(response.data.items);
                    }
                    page++;
                    if (!response.data.has_more) {
                        loadMoreBtn.hide();
                    } else {
                        loadMoreBtn.show();
                    }
                    // Lazy loading para nuevas imágenes:
                    if ('IntersectionObserver' in window) {
                        lazyLoadImages();
                    }
                } else {
                    grid.html('<div style="text-align:center;padding:2em 0;">No se encontraron resultados.</div>');
                    loadMoreBtn.hide();
                }
                loadMoreBtn.text('Cargar más');
                loading = false;
            },
            error: function() {
                grid.html('<div style="text-align:center;padding:2em 0;color:#e33;">Error al cargar.</div>');
                loadMoreBtn.text('Cargar más');
                loading = false;
            }
        });
    }

    // Filtros y búsqueda instantánea
    $('#carousel-year, #carousel-sort').on('change', function() {
        loadGridItems(true);
    });

    let searchTimeout;
    $('#carousel-search').on('input', function() {
        clearTimeout(searchTimeout);
        searchTimeout = setTimeout(function() {
            loadGridItems(true);
        }, 500);
    });

    // Cargar más
    loadMoreBtn.on('click', function() {
        loadGridItems();
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
