{{--
  Template Name: Home Page Template
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php(the_post())
    @php
      // Mostramos directamente el contenido para permitir los bloques ACF
      the_content();
    @endphp
  @endwhile
@endsection