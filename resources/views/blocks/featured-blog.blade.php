{{--
  Title: Blog Destacado
  Description: Muestra 3 posts destacados del blog con diseño personalizado
  Category: design
  Icon: admin-post
  Keywords: blog, destacado, posts
  Mode: edit
  Align: full
  PostTypes: page
  SupportsAlign: false
  SupportsMode: false
  SupportsMultiple: false
--}}

@php
  // Campos ACF
  $title = get_field('title') ?: 'Nuestro blog';
  $selected_posts = get_field('featured_posts');
  
  // Si no hay posts seleccionados, mostrar los 3 más recientes
  if (empty($selected_posts)) {
    $args = array(
      'post_type' => 'post',
      'posts_per_page' => 3,
      'orderby' => 'date',
      'order' => 'DESC'
    );
    $selected_posts = get_posts($args);
  }
@endphp

<section class="py-20 bg-white">
  <div class="container mx-auto px-4">
    <h2 class="text-5xl font-extrabold mb-12 text-center text-[#030D55]" style="font-family: 'Playfair Display', serif; font-size: 48px; line-height: 100%; letter-spacing: 0%;">
      {{ $title }}
    </h2>
    
    <!-- Artículos del blog -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
      @if(!empty($selected_posts))
        @foreach($selected_posts as $post)
          @php
            // Configurar post data para este post
            $post_thumbnail = get_the_post_thumbnail_url($post->ID, 'full') ?: get_theme_file_uri('resources/images/blog1.png');
            $post_title = get_the_title($post->ID);
            $post_excerpt = has_excerpt($post->ID) ? get_the_excerpt($post->ID) : wp_trim_words(get_the_content('', false, $post->ID), 20, '...');
            $post_date = get_the_date('', $post->ID);
          @endphp
          <div class="rounded-2xl overflow-hidden w-full max-w-[395px] h-[419px] mx-auto" style="padding: 0;">
            <div class="relative h-full">
              <img src="{{ $post_thumbnail }}" alt="{{ $post_title }}" class="w-full h-full object-cover">
              <div class="absolute top-3 left-3 text-white py-2.5 px-4 rounded-full text-center w-[201px] h-[40px]" style="background: rgba(3, 13, 85, 0.85);">
                {{ $post_date }}
              </div>
              <!-- Overlay gradient on the entire image -->
              <div class="absolute inset-0" style="background: linear-gradient(180deg, rgba(171, 39, 122, 0.4) 0%, rgba(3, 13, 85, 0.4) 61%);"></div>
              <!-- Content overlay at bottom -->
              <div class="absolute bottom-0 left-0 right-0 p-4" style="padding-top: 24px; padding-right: 16px; padding-bottom: 24px; padding-left: 16px;">
                <div class="w-full max-w-[363px] gap-4 flex flex-col">
                  <h3 class="text-2xl font-bold text-white" style="font-family: 'Playfair Display', serif; font-weight: 700; font-size: 24px; line-height: 100%; letter-spacing: 0%;">
                    {{ $post_title }}
                  </h3>
                  <p class="text-base text-white" style="font-family: 'Roboto', sans-serif; font-weight: 400; font-size: 16px; line-height: 28px; letter-spacing: 0%;">
                    {{ $post_excerpt }}
                  </p>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      @endif
    </div>
    
    <!-- Botón Ver más blogs -->
    <div class="text-center mt-12">
      <a href="{{ home_url('/blog') }}" class="inline-block py-2.5 px-8 text-white rounded-full font-medium w-[277px] h-[47px] text-center" style="background: linear-gradient(90deg, #FF3382 0%, rgba(90, 9, 137, 0.8) 100%); border-radius: 40px; padding: 10px;">
        Ver más blogs
      </a>
    </div>
  </div>
</section>