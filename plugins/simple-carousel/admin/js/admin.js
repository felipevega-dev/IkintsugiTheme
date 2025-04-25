jQuery(document).ready(function($) {
    // Initialize sortable for carousel items
    $('.carousel-items-grid').sortable({
        items: '.carousel-item-card',
        handle: '.carousel-item-image',
        cursor: 'move',
        opacity: 0.7,
        revert: true,
        update: function(event, ui) {
            const items = [];
            $('.carousel-item-card').each(function() {
                items.push($(this).data('id'));
            });

            $.ajax({
                url: simpleCarousel.ajaxurl,
                type: 'POST',
                data: {
                    action: 'update_carousel_order',
                    items: items,
                    nonce: simpleCarousel.nonce
                },
                success: function(response) {
                    if (response.success) {
                        // Optional: Show success message
                    }
                }
            });
        }
    });

    // Confirm delete action
    $('.carousel-item-actions .delete').on('click', function(e) {
        if (!confirm('Are you sure you want to delete this item?')) {
            e.preventDefault();
        }
    });

    // Manejar cambios en el tipo de item del carrusel
    $('input[name="carousel_item_type"]').on('change', function() {
        const type = $(this).val();
        $('#video-fields').toggle(type === 'video');
        $('#link-fields').toggle(type === 'image');
    });

    // Manejar la subida de imágenes destacadas
    if (typeof wp !== 'undefined' && wp.media && wp.media.editor) {
        $('.upload-custom-img').on('click', function(e) {
            e.preventDefault();
            const button = $(this);
            const customImgContainer = button.siblings('.custom-img-container');
            const customImgIdInput = button.siblings('.custom-img-id');

            wp.media.editor.send.attachment = function(props, attachment) {
                customImgContainer.html('<img src="' + attachment.url + '" style="max-width:100%;"/>');
                customImgIdInput.val(attachment.id);
            };

            wp.media.editor.open(button);
            return false;
        });

        $('.remove-custom-img').on('click', function(e) {
            e.preventDefault();
            const button = $(this);
            const customImgContainer = button.siblings('.custom-img-container');
            const customImgIdInput = button.siblings('.custom-img-id');

            customImgContainer.html('');
            customImgIdInput.val('');
        });
    }

    // Validación de URLs de video
    $('#video_url').on('change', function() {
        const url = $(this).val();
        if (url && !isValidVideoUrl(url)) {
            alert('Por favor, ingresa una URL válida de YouTube o Vimeo');
            $(this).val('');
        }
    });

    function isValidVideoUrl(url) {
        return /^(https?:\/\/)?(www\.)?(youtube\.com\/watch\?v=|youtu\.be\/|vimeo\.com\/)[\w-]+/.test(url);
    }

    // Manejar cambios en la configuración
    $('#autoplay').on('change', function() {
        const isChecked = $(this).is(':checked');
        $('#autoplay_speed').prop('disabled', !isChecked);
    });

    // Inicializar tooltips
    $('.simple-carousel-help').tooltip({
        position: {
            my: 'center bottom-20',
            at: 'center top',
            using: function(position, feedback) {
                $(this).css(position);
                $('<div>')
                    .addClass('arrow')
                    .addClass(feedback.vertical)
                    .addClass(feedback.horizontal)
                    .appendTo(this);
            }
        }
    });

    // Ordenamiento de items
    if ($('.simple-carousel-items-sortable').length) {
        $('.simple-carousel-items-sortable').sortable({
            handle: '.sort-handle',
            update: function(event, ui) {
                const items = [];
                $('.simple-carousel-items-sortable .carousel-item').each(function(index) {
                    items.push({
                        id: $(this).data('id'),
                        position: index
                    });
                });

                $.ajax({
                    url: ajaxurl,
                    type: 'POST',
                    data: {
                        action: 'update_carousel_order',
                        items: items,
                        nonce: simpleCarouselAdmin.nonce
                    },
                    success: function(response) {
                        if (response.success) {
                            // Mostrar mensaje de éxito
                            const notice = $('<div class="notice notice-success is-dismissible"><p>Orden actualizado correctamente.</p></div>')
                                .hide()
                                .insertBefore('.simple-carousel-items-sortable')
                                .slideDown();
                            
                            setTimeout(function() {
                                notice.slideUp(function() {
                                    $(this).remove();
                                });
                            }, 3000);
                        }
                    }
                });
            }
        });
    }
}); 