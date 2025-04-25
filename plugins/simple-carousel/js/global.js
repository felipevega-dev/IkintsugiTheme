(function($) {
      function ensureModal() {
          if (!document.getElementById('video-modal-popup')) {
              $('body').append(`
                  <div id="video-modal-popup" style="display:none;position:fixed;inset:0;z-index:9999;align-items:center;justify-content:center;background:rgba(0,0,0,0.85);display:flex;">
                      <div style="position:relative;max-width:90vw;max-height:80vh;">
                          <button id="video-modal-close" style="position:absolute;top:0;right:0;font-size:2rem;color:#fff;background:#362766;border:none;border-radius:0 8px 0 8px;width:44px;height:44px;cursor:pointer;z-index:2;">&times;</button>
                          <div id="video-modal-content"></div>
                      </div>
                  </div>
              `);
          }
      }
      function openVideoModal(embedUrl) {
          ensureModal();
          $('#video-modal-content').html(`<iframe src="${embedUrl}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen style="width:70vw;min-width:320px;height:40vw;min-height:200px;max-width:900px;max-height:510px;border-radius:12px;background:#000;"></iframe>`);
          $('#video-modal-popup').fadeIn(150);
          $('body').css('overflow', 'hidden');
      }
      function closeVideoModal() {
          $('#video-modal-popup').fadeOut(120, function() {
              $(this).remove(); // <-- ¡Elimina TODO el modal del DOM!
              $('body').css('overflow', '');
          });
      }
      // Delegación global para todos los play-btn
      $(document).on('click', '.video-thumbnail, .video-play-btn, .video-play-button', function(e) {
            e.preventDefault();
            const embedUrl = $(this).data('video-url') || $(this).attr('data-video') || $(this).closest('.video-thumbnail').data('video-url');
            if(embedUrl) openVideoModal(embedUrl);
        });
      $(document).on('click', '#video-modal-close', closeVideoModal);
      $(document).on('click', '#video-modal-popup', function(e) {
          if (e.target.id === 'video-modal-popup') closeVideoModal();
      });
  })(jQuery);
  