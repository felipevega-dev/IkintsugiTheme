jQuery(document).ready(function($) {
    console.log('SimpleCarousel admin script loaded');
    
    // Debug de jQuery UI
    if (typeof $.ui === 'undefined') {
        console.error('jQuery UI no está cargado correctamente');
    } else {
        console.log('jQuery UI cargado correctamente');
    }
    
    // Inicialización simple de sortable
    if ($('.simple-carousel-items-sortable').length) {
        console.log('Inicializando sortable...');
        
        $('.simple-carousel-items-sortable').sortable({
            items: '.carousel-item',
            handle: '.sort-handle',
            cursor: 'move',
            opacity: 0.7,
            tolerance: 'pointer',
            update: function(event, ui) {
                console.log('Orden actualizado');
                ui.item.effect('highlight', {}, 1000);
            }
        });
        
        // Guardar orden al hacer clic
        $('#save-carousel-order').on('click', function() {
            saveOrder();
        });
        
        function saveOrder() {
            var items = [];
            $('.carousel-item').each(function(index) {
                items.push({
                    id: $(this).data('id'),
                    position: index
                });
            });
            
            console.log('Items a guardar:', items);
            
            $('#save-carousel-order').prop('disabled', true).text('Guardando...');
            
            $.post(
                ajaxurl,
                {
                    action: 'update_carousel_order',
                    items: items,
                    nonce: simpleCarouselAdmin.nonce
                },
                function(response) {
                    console.log('Respuesta AJAX:', response);
                    $('#save-carousel-order').prop('disabled', false).text('Guardar Orden');
                    
                    if (response.success) {
                        $('#carousel-order-success').fadeIn().delay(1500).fadeOut();
                    } else {
                        alert('Error al guardar');
                    }
                }
            ).fail(function() {
                alert('Error de conexión');
                $('#save-carousel-order').prop('disabled', false).text('Guardar Orden');
            });
        }
    }
    
    // Manejar cambios en el tipo de item del carrusel
    $('input[name="carousel_item_type"]').on('change', function() {
        const type = $(this).val();
        $('#video-fields').toggle(type === 'video');
        $('#link-fields').toggle(type === 'image');
    });

    // Confirm delete action
    $('.carousel-item-actions .delete').on('click', function(e) {
        if (!confirm('Are you sure you want to delete this item?')) {
            e.preventDefault();
        }
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
}); 