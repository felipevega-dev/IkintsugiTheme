<?php
/**
 * Template personalizado para comentarios de Kintsugi
 */

// Si el post está protegido por contraseña y el usuario aún no ha proporcionado la contraseña,
// o si los comentarios están cerrados, entonces salimos.
if (post_password_required() || (!have_comments() && !comments_open())) {
    return;
}
?>

<div class="comments-area">
  <?php if (have_comments()) : ?>
    <div class="mb-8">
      <h3 class="text-xl font-semibold text-[#AB277A] mb-6 font-paytone">
        <?php
        $comment_count = get_comments_number();
        if ($comment_count === '1') {
            echo '1 comentario';
        } else {
            echo $comment_count . ' comentarios';
        }
        ?>
      </h3>

      <ul class="comment-list space-y-6">
        <?php
        wp_list_comments([
            'style'       => 'ul',
            'short_ping'  => true,
            'avatar_size' => 60,
            'callback'    => function($comment, $args, $depth) {
                $GLOBALS['comment'] = $comment;
                $comment_class = empty($args['has_children']) ? 'parent' : 'parent has-children';
                $current_user_id = get_current_user_id();
                $is_author = $current_user_id && ($current_user_id == $comment->user_id);
                ?>
                <li id="comment-<?php comment_ID(); ?>" <?php comment_class($comment_class); ?>>
                  <article id="div-comment-<?php comment_ID(); ?>" class="comment-body bg-white p-5 md:p-6 rounded-2xl shadow-sm border border-gray-100 transition-shadow hover:shadow-md">
                    <div class="flex items-start gap-4">
                      <div class="flex-shrink-0">
                        <?php 
                        if ($args['avatar_size'] != 0) {
                            echo get_avatar($comment, $args['avatar_size'], '', '', [
                                'class' => 'rounded-full border-2 border-[#AB277A] shadow-sm'
                            ]); 
                        }
                        ?>
                      </div>
                      
                      <div class="flex-grow">
                        <div class="comment-meta mb-3">
                          <div class="comment-author vcard">
                            <span class="font-semibold text-[#030D55] text-lg"><?php comment_author(); ?></span>
                            <?php if ($comment->user_id) : ?>
                              <span class="inline-flex items-center rounded-full bg-purple-100 px-2 py-1 ml-2 text-xs font-medium text-purple-800">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-3 h-3 mr-1">
                                  <path fill-rule="evenodd" d="M8.603 3.799A4.49 4.49 0 0112 2.25c1.357 0 2.573.6 3.397 1.549a4.49 4.49 0 013.498 1.307 4.491 4.491 0 011.307 3.497A4.49 4.49 0 0121.75 12a4.49 4.49 0 01-1.549 3.397 4.491 4.491 0 01-1.307 3.497 4.491 4.491 0 01-3.497 1.307A4.49 4.49 0 0112 21.75a4.49 4.49 0 01-3.397-1.549 4.49 4.49 0 01-3.498-1.306 4.491 4.491 0 01-1.307-3.498A4.49 4.49 0 012.25 12c0-1.357.6-2.573 1.549-3.397a4.49 4.49 0 011.307-3.497 4.49 4.49 0 013.497-1.307zm7.007 6.387a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                                </svg>
                                Usuario registrado
                              </span>
                            <?php endif; ?>
                          </div>
                          
                          <div class="comment-metadata text-xs text-gray-500 mt-1 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-1">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <time datetime="<?php comment_time('c'); ?>">
                              <?php
                              printf(
                                  '%1$s a las %2$s',
                                  get_comment_date('j M Y'),
                                  get_comment_time()
                              );
                              ?>
                            </time>
                            <?php edit_comment_link(esc_html__('Editar', 'sage'), '<span class="edit-link ml-2 text-[#AB277A] hover:text-[#D93280] transition-colors">', '</span>'); ?>
                          </div>
                        </div>

                        <div class="comment-content prose prose-sm max-w-none text-gray-700">
                          <?php comment_text(); ?>
                        </div>
                        
                        <?php if ($is_author || current_user_can('moderate_comments')) : ?>
                          <div class="comment-actions mt-3 flex gap-2">
                            <button type="button" class="comment-edit-button text-xs px-3 py-1 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-full flex items-center gap-1 transition-colors" data-comment-id="<?php echo $comment->comment_ID; ?>">
                              <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                              </svg>
                              Editar
                            </button>
                            <button type="button" class="comment-delete-button text-xs px-3 py-1 bg-red-50 hover:bg-red-100 text-red-600 rounded-full flex items-center gap-1 transition-colors" data-comment-id="<?php echo $comment->comment_ID; ?>">
                              <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                              </svg>
                              Eliminar
                            </button>
                          </div>
                        <?php endif; ?>
                        
                        <?php
                        if ('1' == $comment->comment_approved || $comment->comment_approved === 'approve') {
                            comment_reply_link(
                                array_merge(
                                    $args,
                                    array(
                                        'add_below' => 'div-comment',
                                        'depth'     => $depth,
                                        'max_depth' => $args['max_depth'],
                                        'before'    => '<div class="reply mt-3"><span class="inline-flex items-center text-xs font-medium text-[#AB277A] hover:text-[#D93280] transition-colors">',
                                        'after'     => '</span></div>'
                                    )
                                )
                            );
                        }
                        ?>
                      </div>
                    </div>
                    
                    <?php if ('0' == $comment->comment_approved) : ?>
                      <div class="mt-3 bg-yellow-50 text-yellow-700 p-3 rounded-xl text-sm border border-yellow-100">
                        <p class="flex items-center">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                          </svg>
                          <?php esc_html_e('Tu comentario está pendiente de moderación.', 'sage'); ?>
                        </p>
                      </div>
                    <?php endif; ?>
                  </article>
                </li>
                <?php
            }
        ]);
        ?>
      </ul>

      <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
        <nav class="mt-8 flex justify-between">
          <div class="nav-previous">
            <?php previous_comments_link(
              '<span class="inline-flex items-center text-sm font-medium text-[#D93280] hover:text-[#AB277A] transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                Comentarios anteriores
              </span>'
            ); ?>
          </div>
          <div class="nav-next">
            <?php next_comments_link(
              '<span class="inline-flex items-center text-sm font-medium text-[#D93280] hover:text-[#AB277A] transition-colors">
                Comentarios más recientes
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
              </span>'
            ); ?>
          </div>
        </nav>
      <?php endif; ?>
    </div>
  <?php endif; ?>

  <?php if (comments_open()) : ?>
    <div class="comment-respond">
      <div class="mb-6 text-center max-w-2xl mx-auto">
        <p class="text-gray-600">Nos encantaría conocer tu opinión. Comparte tus pensamientos, preguntas o experiencias con nosotros.</p>
      </div>

      <?php if (is_user_logged_in()) : ?>
        <?php
        // Personalizar el botón de enviar
        $submit_button = '<button type="submit" name="%1$s" id="%2$s" class="%3$s flex items-center justify-center space-x-2 relative overflow-hidden group">
          <div class="submit-content relative z-10 flex items-center justify-center space-x-2">
            <span class="comment-submit-text">%4$s</span>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 transition-transform duration-300 group-hover:translate-x-1">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
            </svg>
          </div>
          <div class="comment-submitting absolute inset-0 flex items-center justify-center opacity-0 transition-opacity duration-300">
            <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
              <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
              <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            <span class="ml-2 text-white">Enviando...</span>
          </div>
        </button>';

        // Obtener datos del usuario actual
        $current_user = wp_get_current_user();
        $user_name = $current_user->display_name;
        
        comment_form([
            'class_container'    => 'comment-respond',
            'class_form'         => 'comment-form bg-white p-6 md:p-8 rounded-2xl shadow-sm border border-gray-100',
            'title_reply'        => esc_html__('Deja un comentario', 'sage'),
            'title_reply_before' => '<h3 id="reply-title" class="comment-reply-title text-xl font-semibold text-[#030D55] mb-5 font-paytone text-center">',
            'title_reply_after'  => '</h3>',
            'class_submit'       => 'transition-all duration-300 bg-gradient-to-r from-[#D93280] to-[#5A0989] hover:from-[#AB277A] hover:to-[#4A0979] text-white px-6 py-3 rounded-xl text-sm font-medium shadow-sm hover:shadow focus:outline-none focus:ring-2 focus:ring-[#AB277A] focus:ring-opacity-50',
            'label_submit'       => esc_html__('Publicar comentario', 'sage'),
            'submit_button'      => $submit_button,
            'comment_field'      => sprintf(
                '<div class="comment-form-comment mb-5"><label for="comment" class="text-[#030D55] font-medium block mb-3">%s</label><textarea id="comment" name="comment" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-[#AB277A] focus:ring focus:ring-[#AB277A] focus:ring-opacity-30 transition-all resize-y min-h-[150px] p-4" placeholder="¿Qué opinas? Comparte tu experiencia, ideas o preguntas... ¡Tu opinión es valiosa! ✨"></textarea></div>',
                _x('Comentario', 'noun', 'sage')
            ),
            'logged_in_as'       => '<div class="flex justify-between items-center mb-6 p-4 bg-gray-50 rounded-xl">
              <div class="flex items-center gap-3">
                ' . get_avatar($current_user->ID, 32, '', '', ['class' => 'rounded-full border-2 border-[#AB277A]']) . '
                <div>
                  <p class="text-sm font-medium text-gray-700">Comentando como <span class="text-[#AB277A]">' . esc_html($user_name) . '</span></p>
                  <a href="' . wp_logout_url(get_permalink()) . '" class="text-xs text-gray-500 hover:text-gray-700 transition-colors">Cerrar sesión</a>
                </div>
              </div>
            </div>',
            'comment_notes_before' => '',
            'fields' => []
        ]);
        ?>
      <?php else : ?>
        <div class="bg-white p-6 md:p-8 rounded-2xl shadow-sm border border-gray-100 mb-8">
          <div class="text-center mb-6">
            <h3 class="text-xl font-semibold text-[#030D55] mb-3 font-paytone">Inicia sesión para comentar</h3>
            <p class="text-gray-600">Para gestionar mejor tus comentarios, inicia sesión o regístrate en nuestra plataforma.</p>
          </div>
          
          <div class="flex flex-col sm:flex-row gap-4 justify-center mt-6">
            <a href="<?php echo esc_url(home_url('/login?redirect=' . urlencode(get_permalink()))); ?>" class="inline-flex items-center justify-center px-6 py-3 border border-transparent rounded-xl shadow-sm text-sm font-medium text-white bg-gradient-to-r from-[#D93280] to-[#5A0989] hover:from-[#AB277A] hover:to-[#4A0979] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#AB277A] transition-all transform hover:scale-[1.02] duration-200">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
              </svg>
              Iniciar sesión
            </a>
            <a href="<?php echo esc_url(home_url('/registro?redirect=' . urlencode(get_permalink()))); ?>" class="inline-flex items-center justify-center px-6 py-3 border border-gray-300 rounded-xl shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#AB277A] transition-all transform hover:scale-[1.02] duration-200">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
              </svg>
              Registrarse
            </a>
          </div>
          
          <!-- Formulario para comentarios de visitantes no registrados -->
          <div class="mt-8 pt-8 border-t border-gray-200">
            <h4 class="text-lg font-medium text-[#030D55] mb-4">¿Prefieres comentar sin registrarte?</h4>
            <p class="text-sm text-gray-600 mb-6">Los usuarios registrados pueden editar y eliminar sus comentarios. Al comentar como invitado, no podrás editar tu comentario más tarde.</p>
            <?php
            $submit_button = '<button type="submit" name="%1$s" id="%2$s" class="%3$s flex items-center justify-center space-x-2 relative overflow-hidden group">
              <div class="submit-content relative z-10 flex items-center justify-center space-x-2">
                <span class="comment-submit-text">%4$s</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 transition-transform duration-300 group-hover:translate-x-1">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
                </svg>
              </div>
              <div class="comment-submitting absolute inset-0 flex items-center justify-center opacity-0 transition-opacity duration-300">
                <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                  <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                  <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                <span class="ml-2 text-white">Enviando...</span>
              </div>
            </button>';
            
            comment_form([
                'class_container'    => 'comment-respond',
                'class_form'         => 'comment-form',
                'title_reply'        => '',
                'title_reply_before' => '',
                'title_reply_after'  => '',
                'class_submit'       => 'transition-all duration-300 bg-gradient-to-r from-[#D93280] to-[#5A0989] hover:from-[#AB277A] hover:to-[#4A0979] text-white px-6 py-3 rounded-xl text-sm font-medium shadow-sm hover:shadow focus:outline-none focus:ring-2 focus:ring-[#AB277A] focus:ring-opacity-50',
                'label_submit'       => esc_html__('Publicar comentario', 'sage'),
                'submit_button'      => $submit_button,
                'comment_field'      => sprintf(
                    '<div class="comment-form-comment mb-5"><label for="comment" class="text-[#030D55] font-medium block mb-3">%s</label><textarea id="comment" name="comment" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-[#AB277A] focus:ring focus:ring-[#AB277A] focus:ring-opacity-30 transition-all resize-y min-h-[150px] p-4" placeholder="¿Qué opinas? Comparte tu experiencia, ideas o preguntas... ¡Tu opinión es valiosa! ✨"></textarea></div>',
                    _x('Comentario', 'noun', 'sage')
                ),
                'comment_notes_before' => '<p class="comment-notes mb-5 text-sm text-gray-600 bg-gray-50 p-4 rounded-xl">' . esc_html__('Tu dirección de correo electrónico no será publicada. Los campos obligatorios están marcados con *', 'sage') . '</p>',
                'fields' => [
                    'author' => sprintf(
                        '<div class="comment-form-author mb-4"><label for="author" class="text-[#030D55] font-medium block mb-2">%s%s</label><input id="author" name="author" type="text" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-[#AB277A] focus:ring focus:ring-[#AB277A] focus:ring-opacity-30 transition-all px-4 py-3" value="%s" size="30" %s placeholder="¿Cómo te llamas? 😊" /></div>',
                        esc_html__('Nombre', 'sage'),
                        ' <span class="required text-[#D93280]">*</span>',
                        esc_attr($commenter['comment_author']),
                        $req ? 'required="required"' : ''
                    ),
                    'email' => sprintf(
                        '<div class="comment-form-email mb-4"><label for="email" class="text-[#030D55] font-medium block mb-2">%s%s</label><input id="email" name="email" type="email" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-[#AB277A] focus:ring focus:ring-[#AB277A] focus:ring-opacity-30 transition-all px-4 py-3" value="%s" size="30" %s placeholder="tu@email.com (no será visible)" /></div>',
                        esc_html__('Correo electrónico', 'sage'),
                        ' <span class="required text-[#D93280]">*</span>',
                        esc_attr($commenter['comment_author_email']),
                        $req ? 'required="required"' : ''
                    ),
                    'cookies' => sprintf(
                        '<div class="comment-form-cookies-consent mb-5 flex items-start gap-3"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" class="mt-1.5 rounded text-[#AB277A] focus:ring-[#AB277A]" %s /><label for="wp-comment-cookies-consent" class="text-sm text-gray-600">%s</label></div>',
                        (empty($commenter['comment_author_email']) ? '' : ' checked="checked"'),
                        esc_html__('Guardar mi nombre, correo electrónico y sitio web en este navegador para la próxima vez que comente.', 'sage')
                    ),
                ],
            ]);
            ?>
          </div>
        </div>
      <?php endif; ?>
    </div>
  <?php endif; ?>
</div>

<style>
/* Estilos adicionales para la sección de comentarios */
.comment-respond .form-submit {
  margin-top: 1.5rem;
  text-align: center;
}

.comment-reply-title small {
  margin-left: 1rem;
  font-size: 0.875rem;
}

.comment-reply-title small a {
  color: #AB277A;
  transition: color 0.2s;
}

.comment-reply-title small a:hover {
  color: #D93280;
  text-decoration: underline;
}

.comment-list .children {
  margin-top: 1.5rem;
  margin-left: 1.5rem;
  padding-left: 1.5rem;
  border-left: 2px solid #AB277A;
}

.comment-list .depth-2,
.comment-list .depth-3, 
.comment-list .depth-4,
.comment-list .depth-5 {
  margin-top: 1.5rem !important;
}

.logged-in-as {
  margin-bottom: 1.25rem;
  font-size: 0.875rem;
  color: #6B7280;
  text-align: center;
}

.logged-in-as a:first-child {
  color: #030D55;
  font-weight: 500;
}

.logged-in-as a:last-child {
  color: #AB277A;
  margin-left: 0.5rem;
}

.comment-notes {
  position: relative;
}

.comment-notes:before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 4px;
  height: 100%;
  background: linear-gradient(to bottom, #D93280, #5A0989);
  border-top-left-radius: 0.75rem;
  border-bottom-left-radius: 0.75rem;
}

.comment-respond textarea:focus,
.comment-respond input:focus {
  border-color: #AB277A;
  box-shadow: 0 0 0 3px rgba(171, 39, 122, 0.1);
}

/* Mejorar apariencia del formulario */
.comment-form {
  background: #FFFFFF;
  box-shadow: 0px 4px 16px rgba(0, 0, 0, 0.05);
}

/* Estilo para el botón de enviar */
.form-submit .submit {
  min-width: 180px;
  position: relative;
  overflow: hidden;
  transition: all 0.3s ease;
  transform: translateY(0);
}

.form-submit .submit:hover {
  transform: translateY(-2px);
  box-shadow: 0 6px 15px rgba(171, 39, 122, 0.2);
}

/* Animación al hacer hover */
.comment-submit-text {
  transition: all 0.3s ease;
}

/* Estado de enviando */
.comment-submitting {
  position: absolute;
  inset: 0;
  display: flex;
  align-items: center;
  justify-content: center;
  opacity: 0;
  transition: opacity 0.3s ease;
  z-index: 5;
}

.submitting .comment-submitting {
  opacity: 1;
}

.submitting .submit-content {
  opacity: 0;
}

/* Añadir efecto de onda al botón */
.form-submit .submit:before {
  content: '';
  position: absolute;
  top: 50%;
  left: 50%;
  width: 0;
  height: 0;
  background: rgba(255, 255, 255, 0.2);
  border-radius: 50%;
  transform: translate(-50%, -50%);
  transition: width 0.6s ease-out, height 0.6s ease-out;
}

.form-submit .submit:hover:before {
  width: 300px;
  height: 300px;
}

/* Botones de acción para editar/eliminar comentarios */
.comment-action-buttons {
  display: flex;
  gap: 0.5rem;
  margin-top: 1rem;
  opacity: 0;
  transition: opacity 0.3s ease;
}

/* Mostrar los botones al pasar el cursor sobre el comentario */
.comment-body:hover .comment-action-buttons {
  opacity: 1;
}

.comment-edit-button,
.comment-delete-button {
  font-size: 0.75rem;
  padding: 0.25rem 0.75rem;
  border-radius: 2rem;
  transition: all 0.3s ease;
  display: inline-flex;
  align-items: center;
  gap: 0.25rem;
}

.comment-edit-button {
  background-color: #f0f0f0;
  color: #4A0979;
}

.comment-edit-button:hover {
  background-color: #e0e0e0;
}

.comment-delete-button {
  background-color: #FFF0F5;
  color: #D93280;
}

.comment-delete-button:hover {
  background-color: #FFE4E1;
}

/* Modal de confirmación para eliminar comentario */
.comment-delete-modal {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0,0,0,0.5);
  display: flex;
  align-items: center;
  justify-content: center;
  z-index: 9999;
  opacity: 0;
  visibility: hidden;
  transition: opacity 0.3s, visibility 0.3s;
}

.comment-delete-modal.active {
  opacity: 1;
  visibility: visible;
}

.comment-delete-modal-content {
  background-color: white;
  border-radius: 12px;
  max-width: 400px;
  width: 100%;
  overflow: hidden;
  box-shadow: 0 4px 20px rgba(0,0,0,0.2);
  animation: modalFadeIn 0.3s;
}

.comment-delete-modal-header {
  padding: 15px 20px;
  background: linear-gradient(to right, #D93280, #5A0989);
  color: white;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.comment-delete-modal-header h3 {
  margin: 0;
  font-size: 18px;
}

.comment-delete-modal-body {
  padding: 20px;
  text-align: center;
}

.comment-delete-modal-footer {
  padding: 15px 20px;
  display: flex;
  justify-content: center;
  gap: 1rem;
  border-top: 1px solid #eee;
}

.comment-delete-modal-cancel,
.comment-delete-modal-confirm {
  padding: 8px 20px;
  border: none;
  border-radius: 30px;
  cursor: pointer;
  transition: all 0.3s;
}

.comment-delete-modal-cancel {
  background-color: #f0f0f0;
  color: #333;
}

.comment-delete-modal-confirm {
  background: linear-gradient(to right, #D93280, #5A0989);
  color: white;
}

.comment-delete-modal-cancel:hover,
.comment-delete-modal-confirm:hover {
  transform: translateY(-2px);
  box-shadow: 0 4px 10px rgba(0,0,0,0.1);
}

@keyframes modalFadeIn {
  from {opacity: 0; transform: translateY(-20px);}
  to {opacity: 1; transform: translateY(0);}
}

/* Modal de edición de comentario */
.comment-edit-modal {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0,0,0,0.5);
  display: flex;
  align-items: center;
  justify-content: center;
  z-index: 9999;
  opacity: 0;
  visibility: hidden;
  transition: opacity 0.3s, visibility 0.3s;
}

.comment-edit-modal.active {
  opacity: 1;
  visibility: visible;
}

.comment-edit-modal-content {
  background-color: white;
  border-radius: 12px;
  max-width: 600px;
  width: 100%;
  overflow: hidden;
  box-shadow: 0 4px 20px rgba(0,0,0,0.2);
  animation: modalFadeIn 0.3s;
}

.comment-edit-modal-header {
  padding: 15px 20px;
  background: linear-gradient(to right, #D93280, #5A0989);
  color: white;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.comment-edit-modal-header h3 {
  margin: 0;
  font-size: 18px;
}

.comment-edit-modal-body {
  padding: 20px;
}

.comment-edit-modal-body textarea {
  width: 100%;
  min-height: 150px;
  padding: 12px;
  border: 1px solid #e0e0e0;
  border-radius: 8px;
  resize: vertical;
  margin-bottom: 15px;
}

.comment-edit-modal-footer {
  padding: 15px 20px;
  display: flex;
  justify-content: flex-end;
  gap: 1rem;
  border-top: 1px solid #eee;
}

.comment-edit-modal-cancel,
.comment-edit-modal-save {
  padding: 8px 20px;
  border: none;
  border-radius: 30px;
  cursor: pointer;
  transition: all 0.3s;
}

.comment-edit-modal-cancel {
  background-color: #f0f0f0;
  color: #333;
}

.comment-edit-modal-save {
  background: linear-gradient(to right, #D93280, #5A0989);
  color: white;
  display: flex;
  align-items: center;
  gap: 0.5rem;
}

.comment-edit-modal-save .spinner {
  display: none;
  width: 16px;
  height: 16px;
  border: 2px solid rgba(255,255,255,0.3);
  border-radius: 50%;
  border-top-color: white;
  animation: spin 0.8s linear infinite;
}

.comment-edit-modal-save.saving .spinner {
  display: inline-block;
}

@keyframes spin {
  to { transform: rotate(360deg); }
}

/* Añadir estilos para las notificaciones */
.comment-notification {
  position: fixed;
  bottom: 20px;
  right: 20px;
  padding: 12px 20px;
  border-radius: 30px;
  background: linear-gradient(to right, #D93280, #5A0989);
  color: white;
  box-shadow: 0 4px 15px rgba(0,0,0,0.2);
  z-index: 9999;
  opacity: 1;
  transition: opacity 0.3s;
  font-size: 14px;
}

/* Mejorar apariencia de placeholders */
::placeholder {
  color: #8B93A7;
  opacity: 0.7;
  font-style: italic;
}

/* Aumentar tamaño de los campos de formulario */
.comment-form input[type="text"],
.comment-form input[type="email"],
.comment-form textarea {
  font-size: 15px;  /* Tamaño ligeramente mayor */
  line-height: 1.5;
}

/* Efecto hover suave en campos */
.comment-form input:hover,
.comment-form textarea:hover {
  border-color: #D93280;
  box-shadow: 0 0 0 1px rgba(171, 39, 122, 0.1);
  transition: all 0.3s ease;
}

/* Mejora en el diseño del checkbox */
#wp-comment-cookies-consent {
  width: 18px;
  height: 18px;
  cursor: pointer;
}

#wp-comment-cookies-consent:checked {
  background-color: #AB277A;
  border-color: #AB277A;
}

.comment-form-cookies-consent label {
  line-height: 1.4;
  cursor: pointer;
}

/* Transición suave al hacer foco en los campos */
.comment-form input:focus,
.comment-form textarea:focus {
  transform: translateY(-2px);
  transition: transform 0.3s;
}
</style>
