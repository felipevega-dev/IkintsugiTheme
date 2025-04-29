{{--
  Template Name: Blog
--}}

@extends('layouts.app')

@section('content')
<style>
  .page-template-blog {
    padding-top: 0 !important;
  }
</style>

<!-- Hero Section -->
<section class="relative bg-[#362766] overflow-hidden pt-24 md:pt-32">
  <!-- Imagen de fondo con overlay -->
  <div class="absolute inset-0 z-0">
    <div class="absolute inset-0 bg-[#362766] opacity-70 z-10"></div>
    <img 
      src="{{ get_theme_file_uri('resources/images/prensa.png') }}" 
      class="absolute inset-0 w-full h-full object-cover object-top" 
    >
  </div>
        
  <!-- Contenido del hero -->
  <div class="container mx-auto px-4 relative z-10 min-h-[450px] sm:min-h-[500px] md:min-h-[80vh] flex flex-col justify-center items-center">
    <div class="max-w-4xl mx-auto text-center text-white py-16 md:py-16">
      <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold mb-8 font-paytone" style="line-height: 1.1;" data-aos="fade-up" data-aos-duration="600">¡Mereces una vida mejor!</h1>
      <p class="text-xl md:text-2xl font-500 mb-2" data-aos="fade-up" data-aos-duration="600" data-aos-delay="100">En este blog encontrarás los mejores artículos y noticias que te inspirarán a cuidar de tu salud emocional y a vivir con plenitud.
¡Descubre, aprende y comparte con quienes te rodean! Además, te invitamos a suscribirte para recibir nuestras últimas novedades y recursos directamente en tu correo.</p>
    </div>
  </div>

  <!-- Curvatura inferior -->
  <div class="absolute bottom-0 left-0 right-0 z-10 translate-y-1">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120" fill="#ffffff" preserveAspectRatio="none">
      <path d="M0,64L80,69.3C160,75,320,85,480,80C640,75,800,53,960,48C1120,43,1280,53,1360,58.7L1440,64L1440,120L1360,120C1280,120,1120,120,960,120C800,120,640,120,480,120C320,120,160,120,80,120L0,120Z"></path>
    </svg>
  </div>
</section>

<!-- Sección: Las entradas más recientes -->
  <section class="bg-white py-16 overflow-hidden">
    <div class="container mx-auto px-4 text-center">
      <h1 class="text-3xl md:text-4xl font-bold text-[#030D55] mb-8 font-paytone" style="line-height: 1.1;" data-aos="fade-up" data-aos-duration="600">
      Nuestro Blog
      </h1>
    </div>
    <div class="container mx-auto px-4">

    <!-- Título de la sección -->
      <h2 class="text-3xl md:text-4xl font-bold text-[#AB277A] mb-8 text-left font-paytone" style="line-height: 1.1;" data-aos="fade-up" data-aos-duration="600">
        Las más recientes
      </h2>

    <!-- Contenedor para las 3 entradas más recientes -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-8">
      @php
      $recent_args = array(
          'post_type' => 'post',
          'posts_per_page' => 3
      );
      $recent_posts = new WP_Query($recent_args);
            @endphp
            
      @if($recent_posts->have_posts())
        @while($recent_posts->have_posts()) 
          @php $recent_posts->the_post(); @endphp
          <a href="{{ get_the_permalink() }}" class="block rounded-2xl overflow-hidden w-full h-[350px] md:h-[419px] mx-auto transition-transform duration-300 hover:transform hover:scale-105 hover:shadow-lg cursor-pointer max-w-[350px] md:max-w-[395px]" data-aos="fade-up" data-aos-duration="600">
            <div class="relative h-full">
              @if(has_post_thumbnail())
                <img src="{{ get_the_post_thumbnail_url() }}" alt="{{ get_the_title() }}" class="w-full h-full object-cover transition-transform duration-500 hover:scale-110">
              @endif
              <div class="absolute top-3 left-3 text-white py-2 md:py-2.5 px-3 md:px-4 rounded-full text-center text-xs md:text-sm max-w-[190px] md:max-w-[201px]" style="background: #030D55B8;">
                {{ get_the_date() }}
          </div>
              <!-- Overlay gradient on the entire image -->
              <div class="absolute inset-0" style="background: linear-gradient(180deg, rgba(171, 39, 122, 0.4) 0%, rgba(3, 13, 85, 0.4) 61%);"></div>
              <!-- Content overlay at bottom -->
              <div class="absolute bottom-0 left-0 right-0 p-3 md:p-4" style="padding-top: 20px; padding-right: 12px; padding-bottom: 20px; padding-left: 12px; @media (min-width: 768px) { padding-top: 24px; padding-right: 16px; padding-bottom: 24px; padding-left: 16px; }">
                <div class="w-full flex flex-col gap-2 md:gap-4">
                  <h3 class="text-xl md:text-2xl font-bold text-white" style="font-family: 'Playfair Display', serif; font-weight: 700; line-height: 100%; letter-spacing: 0%;">
                    {{ get_the_title() }}
                  </h3>
                  <p class="text-sm md:text-base text-white" style="font-family: 'Roboto', sans-serif; font-weight: 400; line-height: 1.4; @media (min-width: 768px) { line-height: 1.7; }">
                    {{ get_the_excerpt() }}
                  </p>
          </div>
        </div>
        </div>
          </a>
        @endwhile
        @php wp_reset_postdata(); @endphp
        @endif
      </div>
    </div>
  </section>

<!-- Sección: Otros blogs -->
  <section class="bg-gray-50 py-16 relative overflow-hidden">
    <div class="container mx-auto px-4 relative">
      <h2 class="text-3xl md:text-4xl font-bold text-[#AB277A] mb-8 text-left font-paytone" style="line-height: 1.1;" data-aos="fade-up" data-aos-duration="600">
      Otros blogs
      </h2>
      
    <!-- Filtros por categoría y año -->
      <div class="flex flex-wrap justify-start gap-2 mb-8" data-aos="fade-up" data-aos-duration="600">
      <a href="?cat=all" class="px-4 py-2 bg-[#AB277A] text-white rounded-lg text-sm font-medium">Todas</a>
      @php
      $categories = get_categories();
      @endphp
      
      @foreach($categories as $category)
        <a href="?cat={{ $category->term_id }}" class="px-4 py-2 bg-white text-[#030D55] rounded-lg text-sm font-medium border border-gray-200 hover:bg-gray-100">
          {{ $category->name }}
        </a>
      @endforeach
      
      <!-- Filtro por año -->
      @php
        // Obtenemos los años usando una consulta personalizada de WordPress sin usar $wpdb directamente
        $years = array();
        $year_query = new WP_Query(array(
          'post_type' => 'post',
          'post_status' => 'publish',
          'orderby' => 'date',
          'order' => 'DESC',
          'posts_per_page' => -1
        ));
        
        if ($year_query->have_posts()) :
          while ($year_query->have_posts()) : $year_query->the_post();
            $year = get_the_date('Y');
            if (!in_array($year, $years)) {
              $years[] = $year;
            }
          endwhile;
          wp_reset_postdata();
        endif;
      @endphp
      
      @foreach($years as $year)
        <a href="?year={{ $year }}" class="px-4 py-2 bg-white text-[#030D55] rounded-lg text-sm font-medium border border-gray-200 hover:bg-gray-100">
          {{ $year }}
        </a>
      @endforeach
      </div>
      
    <!-- Grid de entradas -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
      @php
      $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
      $category = isset($_GET['cat']) && $_GET['cat'] != 'all' ? $_GET['cat'] : '';
      $year = isset($_GET['year']) ? $_GET['year'] : '';
      
      // Obtén los IDs de los posts recientes para excluirlos
      $recent_ids = wp_list_pluck($recent_posts->posts, 'ID');
      
      $args = array(
          'post_type' => 'post',
          'posts_per_page' => 6,
          'paged' => $paged
      );
      
      // Excluir siempre los posts recientes
      if (!empty($recent_ids)) {
          $args['post__not_in'] = $recent_ids;
      }
      
      // Filtrar por categoría si está seleccionada
      if (!empty($category)) {
          $args['cat'] = $category;
      }
      
      // Filtrar por año si está seleccionado
      if (!empty($year)) {
          $args['date_query'] = array(
              array(
                  'year' => $year
              )
          );
      }
      
      $blog_posts = new WP_Query($args);
      
      // Si no hay resultados y no hay filtros aplicados, mostramos los posts más antiguos
      if (!$blog_posts->have_posts() && empty($category) && empty($year)) {
          $args = array(
              'post_type' => 'post',
              'posts_per_page' => 6,
              'paged' => $paged,
              'offset' => 3 // Omitir los 3 más recientes
          );
          $blog_posts = new WP_Query($args);
      }
      @endphp
        
      @if($blog_posts->have_posts())
        @while($blog_posts->have_posts()) 
          @php $blog_posts->the_post(); @endphp
          <a href="{{ get_the_permalink() }}" class="block rounded-2xl overflow-hidden w-full h-[300px] md:h-[350px] mx-auto transition-transform duration-300 hover:transform hover:scale-105 hover:shadow-lg cursor-pointer" data-aos="fade-up" data-aos-duration="600">
            <div class="relative h-full">
              @if(has_post_thumbnail())
                <img src="{{ get_the_post_thumbnail_url() }}" alt="{{ get_the_title() }}" class="w-full h-full object-cover transition-transform duration-500 hover:scale-110">
              @endif
              <div class="absolute top-3 left-3 text-white py-2 px-3 rounded-full text-center text-xs" style="background: #030D55B8;">
                {{ get_the_date() }}
              </div>
              <!-- Overlay gradient on the entire image -->
              <div class="absolute inset-0" style="background: linear-gradient(180deg, rgba(171, 39, 122, 0.4) 0%, rgba(3, 13, 85, 0.4) 61%);"></div>
              <!-- Content overlay at bottom -->
              <div class="absolute bottom-0 left-0 right-0 p-3 md:p-4">
                <div class="w-full flex flex-col gap-2">
                  <h3 class="text-lg md:text-xl font-bold text-white" style="font-family: 'Playfair Display', serif; line-height: 100%;">
                    {{ get_the_title() }}
                  </h3>
                  <p class="text-xs md:text-sm text-white line-clamp-2" style="font-family: 'Roboto', sans-serif; font-weight: 400; line-height: 1.4;">
                    {{ get_the_excerpt() }}
                  </p>
          </div>
              </div>
            </div>
          </a>
        @endwhile
        @php wp_reset_postdata(); @endphp
      @else
        <div class="col-span-3 text-center py-10" data-aos="fade-up" data-aos-duration="600">
          @if(empty($category) && empty($year))
            <p class="text-lg text-gray-600">Actualmente no hay suficientes artículos para mostrar en esta sección. Pronto publicaremos más contenido.</p>
          @else
            <p class="text-lg text-gray-600">No se encontraron artículos que coincidan con los filtros seleccionados.</p>
            <a href="{{ get_permalink() }}" class="inline-block mt-4 px-6 py-2 bg-[#AB277A] text-white rounded-lg font-medium hover:bg-opacity-90 transition-all duration-300">
              Ver todos los artículos
            </a>
          @endif
        </div>
      @endif
    </div>
    
    <!-- Botón "Cargar más" -->
    <div class="text-center mt-8" data-aos="fade-up" data-aos-duration="600">
      @if($blog_posts->max_num_pages > 1 && $paged < $blog_posts->max_num_pages)
        <a href="{{ add_query_arg('paged', $paged + 1) }}" class="inline-block px-8 py-3 bg-[#AB277A] text-white rounded-full text-lg font-medium hover:bg-opacity-90 transition-all duration-300 transform hover:scale-105">
          Cargar más blogs
        </a>
      @endif
    </div>
    
    <!-- Paginación (alternativa al botón "Cargar más") -->
    <div class="text-center mt-8 hidden">
      @php
      $total_pages = $blog_posts->max_num_pages;
      
      if ($total_pages > 1) {
          $current_page = max(1, get_query_var('paged'));
          
          echo '<div class="inline-flex gap-2">';
          
          if ($current_page > 1) {
              echo '<a href="' . get_pagenum_link($current_page - 1) . '" class="px-4 py-2 bg-white text-[#030D55] rounded-lg text-sm font-medium border border-gray-200 hover:bg-gray-100">Anterior</a>';
          }
          
          for ($i = 1; $i <= $total_pages; $i++) {
              if ($i == $current_page) {
                  echo '<span class="px-4 py-2 bg-[#AB277A] text-white rounded-lg text-sm font-medium">' . $i . '</span>';
              } else {
                  echo '<a href="' . get_pagenum_link($i) . '" class="px-4 py-2 bg-white text-[#030D55] rounded-lg text-sm font-medium border border-gray-200 hover:bg-gray-100">' . $i . '</a>';
              }
          }
          
          if ($current_page < $total_pages) {
              echo '<a href="' . get_pagenum_link($current_page + 1) . '" class="px-4 py-2 bg-white text-[#030D55] rounded-lg text-sm font-medium border border-gray-200 hover:bg-gray-100">Siguiente</a>';
          }
          
          echo '</div>';
      }
      @endphp
    </div>
      </div>
  </section>

<!-- Sección para contenido de Elementor (por si quieres agregar algo más) -->
  <section class="elementor-section">
    <div class="elementor-container">
      @php the_content(); @endphp
    </div>
  </section>
@endsection
