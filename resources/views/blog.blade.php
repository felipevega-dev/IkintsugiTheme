{{--
  Template Name: Blog
--}}

@extends('layouts.app')

@section('content')
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
  <div class="container mx-auto px-4 relative z-10 min-h-[400px] md:min-h-[600px] flex flex-col justify-center items-center">
    <div class="max-w-4xl mx-auto text-center text-white py-32 md:py-32">
      <h1 class="text-5xl md:text-6xl lg:text-7xl font-bold mb-8 font-playfair" style="font-family: 'Playfair Display', serif;">¡Mereces una vida mejor!</h1>
      <p class="text-xl md:text-2xl font-500 mb-2">En este blog encontrarás los mejores artículos y noticias que te inspirarán a cuidar de tu salud emocional y a vivir con plenitud.
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
    <div class="container mx-auto px-4">
      <h2 class="text-3xl md:text-4xl font-bold text-[#030D55] mb-8 text-left" style="font-family: 'Playfair Display', serif;">
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
          <a href="{{ get_the_permalink() }}" class="block rounded-2xl overflow-hidden w-full h-[350px] md:h-[419px] mx-auto transition-transform duration-300 hover:transform hover:scale-105 hover:shadow-lg cursor-pointer max-w-[350px] md:max-w-[395px]">
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

<!-- Sección: Todas las entradas -->
  <section class="bg-gray-50 py-16 relative">
    <div class="container mx-auto px-4 relative">
      <h2 class="text-3xl md:text-4xl font-bold text-[#030D55] mb-8 text-left" style="font-family: 'Playfair Display', serif;">
      Todas las entradas
        </h2>
      
    <!-- Filtros por categoría -->
      <div class="flex flex-wrap justify-start gap-2 mb-8">
      <a href="?cat=all" class="px-4 py-2 bg-[#D93280] text-white rounded-lg text-sm font-medium">Todas</a>
      @php
      $categories = get_categories();
      @endphp
      
      @foreach($categories as $category)
        <a href="?cat={{ $category->term_id }}" class="px-4 py-2 bg-white text-[#030D55] rounded-lg text-sm font-medium border border-gray-200 hover:bg-gray-100">
          {{ $category->name }}
        </a>
      @endforeach
      </div>
      
    <!-- Grid de entradas -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
      @php
      $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
      $category = isset($_GET['cat']) && $_GET['cat'] != 'all' ? $_GET['cat'] : '';
      
      $args = array(
          'post_type' => 'post',
          'posts_per_page' => 9,
          'paged' => $paged,
          'cat' => $category
      );
      
      // Ajustar el offset solo en la primera página y si hay posts recientes
      if ($paged == 1 && $recent_posts->post_count > 0) {
          $args['offset'] = 3; // Skip the first 3 posts shown in "más recientes"
      }
      
      $blog_posts = new WP_Query($args);
        @endphp
        
      @if($blog_posts->have_posts())
        @while($blog_posts->have_posts()) 
          @php $blog_posts->the_post(); @endphp
          <a href="{{ get_the_permalink() }}" class="block rounded-2xl overflow-hidden w-full h-[300px] md:h-[350px] mx-auto transition-transform duration-300 hover:transform hover:scale-105 hover:shadow-lg cursor-pointer">
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
        <div class="col-span-3 text-center py-10">
          <p class="text-lg text-gray-600">No se encontraron artículos adicionales.</p>
        </div>
      @endif
          </div>
    
    <!-- Paginación -->
    <div class="text-center mt-8">
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
                  echo '<span class="px-4 py-2 bg-[#D93280] text-white rounded-lg text-sm font-medium">' . $i . '</span>';
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
