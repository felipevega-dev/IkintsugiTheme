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
      <?php
      comment_form([
          'class_container'    => 'comment-respond',
          'class_form'         => 'comment-form bg-white p-6 md:p-8 rounded-2xl shadow-sm border border-gray-100',
          'title_reply'        => esc_html__('Deja un comentario', 'sage'),
          'title_reply_before' => '<h3 id="reply-title" class="comment-reply-title text-xl font-semibold text-[#030D55] mb-5 font-paytone">',
          'title_reply_after'  => '</h3>',
          'logged_in_as'       => '',
          'class_submit'       => 'transition-all duration-300 bg-gradient-to-r from-[#D93280] to-[#5A0989] hover:from-[#AB277A] hover:to-[#4A0979] text-white px-6 py-3 rounded-xl text-sm font-medium shadow-sm hover:shadow focus:outline-none focus:ring-2 focus:ring-[#AB277A] focus:ring-opacity-50',
          'label_submit'       => esc_html__('Publicar comentario', 'sage'),
          'comment_field'      => sprintf(
              '<div class="comment-form-comment mb-5"><label for="comment" class="text-[#030D55] font-medium block mb-3">%s</label><textarea id="comment" name="comment" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-[#AB277A] focus:ring focus:ring-[#AB277A] focus:ring-opacity-30 transition-all resize-y min-h-[150px] p-3"></textarea></div>',
              _x('Comentario', 'noun', 'sage')
          ),
          'comment_notes_before' => '<p class="comment-notes mb-5 text-sm text-gray-600 bg-gray-50 p-4 rounded-xl">' . esc_html__('Tu dirección de correo electrónico no será publicada. Los campos obligatorios están marcados con *', 'sage') . '</p>',
          'fields' => [
              'author' => sprintf(
                  '<div class="comment-form-author mb-4"><label for="author" class="text-[#030D55] font-medium block mb-2">%s%s</label><input id="author" name="author" type="text" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-[#AB277A] focus:ring focus:ring-[#AB277A] focus:ring-opacity-30 transition-all" value="%s" size="30" %s /></div>',
                  esc_html__('Nombre', 'sage'),
                  ' <span class="required text-[#D93280]">*</span>',
                  esc_attr($commenter['comment_author']),
                  $req ? 'required="required"' : ''
              ),
              'email' => sprintf(
                  '<div class="comment-form-email mb-4"><label for="email" class="text-[#030D55] font-medium block mb-2">%s%s</label><input id="email" name="email" type="email" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-[#AB277A] focus:ring focus:ring-[#AB277A] focus:ring-opacity-30 transition-all" value="%s" size="30" %s /></div>',
                  esc_html__('Correo electrónico', 'sage'),
                  ' <span class="required text-[#D93280]">*</span>',
                  esc_attr($commenter['comment_author_email']),
                  $req ? 'required="required"' : ''
              ),
              'url' => sprintf(
                  '<div class="comment-form-url mb-5"><label for="url" class="text-[#030D55] font-medium block mb-2">%s</label><input id="url" name="url" type="url" class="w-full rounded-xl border-gray-300 shadow-sm focus:border-[#AB277A] focus:ring focus:ring-[#AB277A] focus:ring-opacity-30 transition-all" value="%s" size="30" /></div>',
                  esc_html__('Sitio web', 'sage'),
                  esc_attr($commenter['comment_author_url'])
              ),
              'cookies' => sprintf(
                  '<div class="comment-form-cookies-consent mb-5 flex items-start gap-2"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" class="mt-1.5 rounded text-[#AB277A] focus:ring-[#AB277A]" %s /><label for="wp-comment-cookies-consent" class="text-sm text-gray-600">%s</label></div>',
                  (empty($commenter['comment_author_email']) ? '' : ' checked="checked"'),
                  esc_html__('Guardar mi nombre, correo electrónico y sitio web en este navegador para la próxima vez que comente.', 'sage')
              ),
          ],
      ]);
      ?>
    </div>
  <?php endif; ?>
</div>

<style>
/* Estilos adicionales para la sección de comentarios */
.comment-respond .form-submit {
  margin-top: 1.5rem;
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
</style>
