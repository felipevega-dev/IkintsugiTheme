@extends('layouts.app')

@section('content')
  <!-- Hero Section -->
  <section class="bg-kintsugi-light py-20">
    <div class="container mx-auto px-4">
      <div class="flex flex-col md:flex-row items-center">
        <div class="md:w-1/2 mb-10 md:mb-0">
          <h1 class="font-display text-4xl md:text-5xl lg:text-6xl font-bold text-kintsugi-black mb-4">
            El arte de la restauración
          </h1>
          <p class="text-kintsugi-gray text-lg mb-8">
            Descubre la belleza de lo imperfecto a través del arte milenario del Kintsugi.
            Transformamos tus piezas rotas en obras de arte únicas.
          </p>
          <div class="flex flex-wrap gap-4">
            <x-button variant="primary" size="lg" href="/servicios">
              Nuestros servicios
            </x-button>
            <x-button variant="outline" size="lg" href="/contacto">
              Contáctanos
            </x-button>
          </div>
        </div>
        <div class="md:w-1/2">
          <img src="{{ asset('images/kintsugi-hero.png') }}" alt="Kintsugi Art" class="rounded-lg shadow-xl">
        </div>
      </div>
    </div>
  </section>

  <!-- Featured Posts Section -->
  <section class="py-16">
    <div class="container mx-auto px-4">
      <h2 class="font-display text-3xl font-bold text-center mb-12">Últimas noticias</h2>

      @if (! have_posts())
        <x-alert type="warning">
          {!! __('No se encontraron resultados.', 'sage') !!}
        </x-alert>

        {!! get_search_form(false) !!}
      @else
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          @while(have_posts()) @php(the_post())
            <div class="bg-white rounded-lg shadow-md overflow-hidden transition-transform hover:scale-105">
              @if(has_post_thumbnail())
                <img src="{{ get_the_post_thumbnail_url() }}" alt="{{ get_the_title() }}" class="w-full h-56 object-cover">
              @endif
              <div class="p-6">
                <h3 class="font-display text-xl font-bold mb-2">
                  <a href="{{ get_permalink() }}" class="text-kintsugi-black hover:text-kintsugi-gold">
                    {{ get_the_title() }}
                  </a>
                </h3>
                <p class="text-kintsugi-gray mb-4">{{ get_the_excerpt() }}</p>
                <x-button variant="outline" size="sm" href="{{ get_permalink() }}">
                  Leer más
                </x-button>
              </div>
            </div>
          @endwhile
        </div>

        <div class="mt-12 flex justify-center">
          {!! get_the_posts_navigation([
            'prev_text' => __('Anterior', 'sage'),
            'next_text' => __('Siguiente', 'sage'),
            'screen_reader_text' => __('Navegación de entradas', 'sage'),
          ]) !!}
        </div>
      @endif
    </div>
  </section>
@endsection

@section('sidebar')
  @include('sections.sidebar')
@endsection
