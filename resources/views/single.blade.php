@extends('layouts.app')

@section('content')
  @if(have_posts())
    @while(have_posts())
      @php
      the_post();
      @endphp
      @includeFirst(['partials.content-single-' . get_post_type(), 'partials.content-single'])
    @endwhile
  @else
    <div class="container mx-auto px-4 py-32">
      <div class="text-center">
        <h1 class="text-3xl font-bold text-[#030D55] mb-6">Contenido no encontrado</h1>
        <p class="mb-8">Lo sentimos, el artículo que estás buscando no existe o ha sido movido.</p>
        <a href="{{ home_url('/blog') }}" class="inline-block py-2 px-6 bg-gradient-to-r from-[#D93280] to-[#5A0989] text-white rounded-full">Volver al blog</a>
      </div>
    </div>
  @endif
@endsection
