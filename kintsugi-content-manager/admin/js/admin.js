/**
 * Admin scripts for Kintsugi Content Manager.
 *
 * @package    Kintsugi_Content_Manager
 * @subpackage Kintsugi_Content_Manager/admin/js
 */

(function($) {
    'use strict';

    // Document ready
    $(function() {
        
        // Handle tipo_noticia field changes
        $('#tipo_noticia').on('change', function() {
            var selectedType = $(this).val();
            
            if (selectedType === 'articulo') {
                $('#articulo_fields').show();
                $('#video_fields').hide();
            } else if (selectedType === 'video') {
                $('#articulo_fields').hide();
                $('#video_fields').show();
            }
        });
        
        // Trigger change on load to ensure proper visibility
        $('#tipo_noticia').trigger('change');
    });

})(jQuery); 