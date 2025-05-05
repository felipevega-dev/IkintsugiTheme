@php
// Asegurarse de que tenemos un post válido
global $post;
$post_id = get_the_ID();
if (!$post_id) return;
@endphp

<style>
  .single-post {
    padding-top: 0 !important;
  }
</style>

<!-- Hero Section -->
<section class="relative bg-[#362766] overflow-hidden pt-24 md:pt-28">
  <!-- Imagen de fondo con overlay -->
  <div class="absolute inset-0 z-0">
    <div class="absolute inset-0 bg-[#362766] opacity-70 z-10"></div>
    @if(has_post_thumbnail())
      <img src="{{ get_the_post_thumbnail_url() }}" alt="{{ get_the_title() }}" class="absolute inset-0 w-full h-full object-cover object-[center_top]">
    @else
      <img src="{{ get_theme_file_uri('resources/images/blog-default.jpg') }}" alt="{{ get_the_title() }}" class="absolute inset-0 w-full h-full object-cover object-[center_top]">
    @endif
    <div class="absolute inset-0 z-20" style="background: linear-gradient(180deg, rgba(171,39,122,0.48) 0%, rgba(3,13,85,0.48) 61%);"></div>
  </div>
  
  <!-- Título del post -->
  <div class="container mx-auto px-4 relative z-10 min-h-[500px] flex flex-col justify-center items-start pb-48">
    <div class="mt-40">
      <span class="text-white text-xs md:text-sm py-2 px-3 md:px-4 rounded-full inline-block mb-3" style="background: #030D55B8;">{{ get_the_date() }}</span>
      <h1 class="text-3xl md:text-5xl lg:text-6xl font-bold text-white max-w-4xl leading-tight" style="font-family: 'Playfair Display', serif;">{{ get_the_title() }}</h1>
      <a href="{{ home_url('/blog/') }}" class="inline-flex items-center mt-4 text-white hover:text-gray-200 transition-colors">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
        Volver al blog
      </a>
    </div>
  </div>

  <!-- Curvatura inferior -->
  <div class="absolute bottom-0 left-0 right-0 z-10 translate-y-1">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120" fill="#ffffff" preserveAspectRatio="none">
      <path d="M0,64L80,69.3C160,75,320,85,480,80C640,75,800,53,960,48C1120,43,1280,53,1360,58.7L1440,64L1440,120L1360,120C1280,120,1120,120,960,120C800,120,640,120,480,120C320,120,160,120,80,120L0,120Z"></path>
    </svg>
  </div>
</section>

<!-- Contenido del post -->
<section class="py-10 bg-white">
  <div class="container mx-auto px-4">
    <div class="flex flex-col md:flex-row gap-6 md:gap-10">
      <!-- Columna izquierda para la suscripción y datos del autor -->
      <div class="w-full md:w-2/4 lg:w-2/5">
        <div class="bg-gray-50 rounded-3xl p-5 sticky top-32 mx-auto md:mx-0 max-w-sm shadow-md border border-gray-100">
          <!-- Imagen de los profesionales -->
          <div class="mb-4 rounded-2xl overflow-hidden">
            <img src="{{ get_theme_file_uri('resources/images/julioyshen2.png') }}" alt="Profesionales" class="w-full h-auto" onerror="this.src='{{ get_avatar_url(get_the_author_meta('ID')) }}'">
          </div>
          
          <!-- Texto de mantente al día -->
          <h3 class="text-[#AB277A] text-base font-bold mb-3 leading-tight">Mantente al día con las últimas investigaciones, tendencias y reflexiones en salud mental, psicoterapia y bienestar.</h3>
          <div class="border-l-4 border-[#AB277A] pl-3 mb-5">
            <p class="text-xs text-gray-600">{{ get_the_author_meta('description') ?: 'Especialista en salud mental' }}</p>
          </div>
          
          <!-- Formulario de suscripción -->
          <div class="bg-white rounded-xl p-4 shadow-sm">
            <h4 class="text-sm font-bold text-[#030D55] mb-3">Suscríbete al blog</h4>
            <p class="text-xs text-gray-600 mb-3">Recibe las últimas publicaciones en tu correo.</p>
            <form method="post" action="{{ home_url('/wp-admin/admin-post.php') }}">
              <input type="hidden" name="action" value="suscribir_blog">
              <input type="email" name="suscriptor_email" placeholder="Tu correo electrónico" class="w-full mb-3 px-4 py-3 border border-gray-200 rounded-lg text-xs" required>
              <button type="submit" class="w-full py-3 px-4 bg-gradient-to-r from-[#D93280] to-[#5A0989] text-white rounded-lg text-xs font-medium hover:opacity-90 transition-opacity">Suscribirme</button>
              <?php if (isset($_GET['suscrito']) && $_GET['suscrito'] == 'ok'): ?>
                <p class="text-xs text-green-600 mt-2">¡Gracias por suscribirte!</p>
              <?php endif; ?>
            </form>
          </div>
        </div>
      </div>
      
      <!-- Columna derecha para el contenido -->
      <div class="w-full md:w-3/4 lg:w-4/5">
        <div class="prose max-w-none md:pl-4">
          @php
          the_content();
          @endphp
        </div>

        <!-- Etiquetas -->
        {!! get_the_tag_list('<div class="mt-8"><div class="flex flex-wrap gap-2">', '', '</div></div>') !!}
        
        <!-- Compartir en redes -->
        <div class="mt-8 pt-6 border-t border-gray-200">
          <h4 class="text-lg font-bold text-[#030D55] mb-4">Comparte este artículo</h4>
          <div class="flex gap-2">
            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(get_permalink()) }}" target="_blank" class="w-10 h-10 bg-[#D93280] rounded-md flex items-center justify-center text-white">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M22.675 0h-21.35c-.732 0-1.325.593-1.325 1.325v21.351c0 .731.593 1.324 1.325 1.324h11.495v-9.294h-3.128v-3.622h3.128v-2.671c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.313h3.587l-.467 3.622h-3.12v9.293h6.116c.73 0 1.323-.593 1.323-1.325v-21.35c0-.732-.593-1.325-1.325-1.325z"/></svg>
            </a>
            <a href="https://twitter.com/intent/tweet?url={{ urlencode(get_permalink()) }}&text={{ urlencode(get_the_title()) }}" target="_blank" class="w-10 h-10 bg-[#D93280] rounded-md flex items-center justify-center text-white">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg>
            </a>
            <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(get_permalink()) }}&title={{ urlencode(get_the_title()) }}" target="_blank" class="w-10 h-10 bg-[#D93280] rounded-md flex items-center justify-center text-white">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
            </a>
            <a href="https://wa.me/?text={{ urlencode(get_the_title()) }}%20{{ urlencode(get_permalink()) }}" target="_blank" class="w-10 h-10 bg-[#D93280] rounded-md flex items-center justify-center text-white">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Sección de comentarios -->
<section class="py-10 bg-gray-50">
  <div class="container mx-auto px-4">
    <div class="max-w-4xl mx-auto">
      <h2 class="text-2xl font-bold text-[#030D55] mb-6" style="font-family: 'Playfair Display', serif;">
        Comentarios
      </h2>
      
      @if(comments_open() || get_comments_number())
        <div class="bg-white rounded-xl p-6 shadow-sm">
          @php
            comments_template();
          @endphp
        </div>
      @else
        <p class="text-gray-600 italic">Los comentarios están cerrados para esta entrada.</p>
      @endif
    </div>
  </div>
</section>

@php
// Verificar si hay posts relacionados
$cat_ids = wp_get_post_categories($post_id, array('fields' => 'ids'));
if (!empty($cat_ids)):
@endphp
<!-- Artículos relacionados -->
<section class="py-12 bg-gray-50">
  <div class="container mx-auto px-4">
    <h2 class="text-3xl font-bold text-[#030D55] mb-10" style="font-family: 'Playfair Display', serif;">
      Artículos relacionados
    </h2>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      @php
      $related_args = array(
          'post_type' => 'post',
          'posts_per_page' => 3,
          'post__not_in' => array($post_id),
          'category__in' => $cat_ids,
          'orderby' => 'rand'
      );
      $related_posts = new WP_Query($related_args);
      @endphp
      
      @if($related_posts->have_posts())
        @while($related_posts->have_posts()) 
          @php $related_posts->the_post(); @endphp
          <a href="{{ get_the_permalink() }}" class="block bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-md transition-all duration-300">
            <div class="relative">
              <span class="absolute top-3 left-3 bg-[#030D55] bg-opacity-70 text-white text-xs px-3 py-1 rounded-full">
                {{ get_the_date() }}
              </span>
              @if(has_post_thumbnail())
                <img src="{{ get_the_post_thumbnail_url() }}" alt="{{ get_the_title() }}" class="w-full h-[180px] object-cover">
              @endif
              <div class="p-5">
                <h3 class="text-base font-bold text-[#030D55] mb-2 line-clamp-2">{{ get_the_title() }}</h3>
                <p class="text-xs text-gray-600 line-clamp-3 mb-3">{{ get_the_excerpt() }}</p>
              </div>
            </div>
          </a>
        @endwhile
        @php wp_reset_postdata(); @endphp
      @else
        <div class="col-span-3 text-center py-10">
          <p class="text-lg text-gray-600">No hay artículos relacionados por el momento.</p>
        </div>
      @endif
    </div>
  </div>
</section>
@php
endif;
@endphp
