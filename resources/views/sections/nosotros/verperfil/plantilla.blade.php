{{-- resources/views/template-psicologo.blade.php --}}
{{--
  Template Name: Plantilla de Psicólogo
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php(the_post())
    
    {{-- Header de perfil --}}
    @include('sections.nosotros.verperfil.header')
    
    {{-- Contenido específico del psicólogo --}}
    @yield('psicologo-content')
    
    {{-- Sección de testimonios (si es común) --}}
    @include('sections.nosotros.verperfil.testimonios')
    
    {{-- Certificaciones o credenciales (si es común) --}}
    @include('sections.nosotros.verperfil.certificaciones')
    
  @endwhile
@endsection