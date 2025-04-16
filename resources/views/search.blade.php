@extends('layouts.app')

@section('content')
<section class="py-6 bg-white md:py-10 lg:py-12">
  <div class="container mx-auto px-4">
    <div class="text-center mb-10">
      <h1 class="text-4xl font-bold mb-2 text-[#1A1A1A]">Resultados de búsqueda</h1>
      <div class="w-24 h-1 bg-[#D93280] mx-auto mb-4"></div>
      <p class="text-lg text-[#4D4D4D]">
        @if(have_posts())
          Resultados para: <span class="font-medium">{{ get_search_query() }}</span>
        @endif
      </p>
    </div>

    @if (! have_posts())
      <div class="text-center max-w-2xl mx-auto">
        <!-- Logo -->
        <div class="flex justify-center mb-8 max-w-md mx-auto">
          <img src="{{ get_theme_file_uri('resources/images/kintsugi-hero.png') }}" alt="Kintsugi Logo" class="h-24 md:h-28 w-auto">
        </div>
        
        <h2 class="text-2xl font-bold mb-4 text-[#1A1A1A]">No se encontraron resultados</h2>
        <p class="text-lg mb-8 text-[#4D4D4D]">Lo sentimos, no encontramos resultados para "<span class="font-medium">{{ get_search_query() }}</span>".</p>
        
        <div class="mb-8">
          <h3 class="text-xl font-semibold mb-4 text-[#333333]">Puedes intentar con otra búsqueda:</h3>
          <!-- Buscador personalizado en español -->
          <div class="max-w-md mx-auto mb-8">
            <form role="search" method="get" class="search-form relative" action="{{ home_url('/') }}">
              <label class="sr-only">Buscar:</label>
              <div class="flex">
                <input type="search" class="w-full px-4 py-3 border border-[#CCCCCC] rounded-l-lg focus:outline-none focus:ring-2 focus:ring-[#D93280]" 
                    placeholder="¿Qué estás buscando?" value="{{ get_search_query() }}" name="s">
                <button type="submit" class="px-6 bg-[#D93280] text-white rounded-r-lg hover:bg-[#C31A7F] transition-colors">
                    Buscar
                </button>
              </div>
            </form>
          </div>
        </div>
        
        <h3 class="text-xl font-semibold mb-4 text-[#333333]">O explorar estas secciones populares:</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 max-w-4xl mx-auto">
          <a href="{{ home_url('/') }}" class="p-4 border border-[#CCCCCC] rounded-lg bg-white hover:shadow-md hover:border-[#F472B6] transition-all">
            <h4 class="font-medium text-lg mb-2 text-[#B7006E]">Inicio</h4>
            <p class="text-[#4D4D4D] text-sm">Visita nuestra página principal</p>
          </a>
          <a href="{{ home_url('/quienes-somos') }}" class="p-4 border border-[#CCCCCC] rounded-lg bg-white hover:shadow-md hover:border-[#F472B6] transition-all">
            <h4 class="font-medium text-lg mb-2 text-[#B7006E]">¿Quiénes somos?</h4>
            <p class="text-[#4D4D4D] text-sm">Conoce nuestro equipo</p>
          </a>
          <a href="{{ home_url('/psicoterapia-emdr') }}" class="p-4 border border-[#CCCCCC] rounded-lg bg-white hover:shadow-md hover:border-[#F472B6] transition-all">
            <h4 class="font-medium text-lg mb-2 text-[#B7006E]">Psicoterapia EMDR</h4>
            <p class="text-[#4D4D4D] text-sm">Descubre este tratamiento</p>
          </a>
        </div>

        <div class="mt-10">
          <a href="{{ home_url('/') }}" class="inline-flex items-center py-3 px-6 bg-[#D93280] hover:bg-[#B7006E] text-white font-medium rounded-full transition-colors duration-200">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Volver al inicio
          </a>
        </div>
      </div>
    @else
      <div class="max-w-4xl mx-auto">
        <div class="grid grid-cols-1 gap-8 mb-10">
          @while(have_posts()) @php(the_post())
            <article class="bg-white p-6 rounded-xl shadow-sm hover:shadow-md border border-[#CCCCCC] hover:border-[#F472B6] transition-all">
              <h2 class="text-2xl font-bold mb-3">
                <a href="{{ get_permalink() }}" class="text-[#1A1A1A] hover:text-[#D93280] transition-colors">
                  {!! get_the_title() !!}
                </a>
              </h2>
              
              @if(get_post_type() === 'post')
                <div class="text-sm text-[#666666] mb-3">
                  Publicado el {{ get_the_date() }}
                </div>
              @endif
              
              <div class="prose prose-lg text-[#4D4D4D] mb-4">
                {!! get_the_excerpt() !!}
              </div>
              
              <a href="{{ get_permalink() }}" class="inline-block text-[#D93280] hover:text-[#B7006E] font-medium">
                Leer más →
              </a>
            </article>
          @endwhile
        </div>
        
        <div class="mt-10 flex justify-center">
          {!! get_the_posts_navigation([
            'prev_text' => 'Resultados anteriores',
            'next_text' => 'Más resultados',
            'screen_reader_text' => 'Navegación de resultados de búsqueda'
          ]) !!}
        </div>
      </div>
    @endif
    
    <!-- Nuevo formulario de búsqueda al final de la página cuando hay resultados -->
    @if(have_posts())
      <div class="mt-16 text-center max-w-xl mx-auto p-8 bg-[#F2F2F2] rounded-xl border border-[#CCCCCC]">
        <h3 class="text-xl font-semibold mb-4 text-[#1A1A1A]">¿No encontraste lo que buscabas?</h3>
        <form role="search" method="get" class="search-form relative" action="{{ home_url('/') }}">
          <label class="sr-only">Buscar:</label>
          <div class="flex">
            <input type="search" class="w-full px-4 py-3 border border-[#B3B3B3] rounded-l-lg focus:outline-none focus:ring-2 focus:ring-[#D93280]" 
                placeholder="Intenta con otra búsqueda..." value="" name="s">
            <button type="submit" class="px-6 bg-[#D93280] text-white rounded-r-lg hover:bg-[#B7006E] transition-colors">
                Buscar
            </button>
          </div>
        </form>
      </div>
    @endif
  </div>
</section>
@endsection
