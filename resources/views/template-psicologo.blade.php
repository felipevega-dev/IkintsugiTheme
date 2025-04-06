{{--
  Template Name: Plantilla de Psicólogo
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php(the_post())
    <div class="container mx-auto px-4 py-8 md:py-12">
      <!-- Sección de perfil con borde -->
      <div class="relative mb-10">
        <div class="border-2 border-[#030D55] rounded-xl p-6 md:p-8 flex flex-col md:flex-row gap-6">
          <!-- Foto con borde curveado -->
          <div class="flex-shrink-0">
            <img src="{{ get_field('foto_psicologo') ?: get_theme_file_uri('resources/images/default-profile.png') }}" alt="{{ get_field('nombre_psicologo') }}" class="w-48 h-48 object-cover rounded-lg">
          </div>
          
          <!-- Información del perfil -->
          <div class="flex-grow">
            <h1 class="text-3xl md:text-4xl font-bold text-[#030D55] mb-4" style="font-family: 'Playfair Display', serif;">{{ get_field('nombre_psicologo') }}</h1>
            
            @if(have_rows('credenciales'))
              <ul class="list-none space-y-2">
                @while(have_rows('credenciales')) @php(the_row())
                  <li class="flex items-start">
                    <span class="text-[#030D55] mr-2">•</span>
                    <span>{{ get_sub_field('credencial') }}</span>
                  </li>
                @endwhile
              </ul>
            @endif
          </div>
        </div>
      </div>
      
      <!-- Sección de descripción -->
      <div class="mb-16 max-w-3xl mx-auto">
        @if(get_field('estilo_descripcion') == 'recuadro')
          <div class="bg-[#e3f3fb] border-l-4 border-[#030D55] p-6 rounded-lg">
            {!! get_field('descripcion') !!}
          </div>
        @else
          <div>
            {!! get_field('descripcion') !!}
          </div>
        @endif
      </div>
      
      <!-- Sección de video -->
      <div class="mb-16 text-center">
        <h2 class="text-2xl md:text-3xl font-bold text-[#030D55] mb-6 text-center" style="font-family: 'Playfair Display', serif;">{{ get_field('titulo_video') ?: 'Estoy aquí para acompañarte en el proceso de sanar y recuperar tu bienestar emocional.' }}</h2>
        
        @if(get_field('video_id'))
          <div class="max-w-2xl mx-auto">
            <div class="aspect-w-16 aspect-h-9 rounded-lg overflow-hidden">
              <iframe class="w-full h-full" src="https://www.youtube.com/embed/{{ get_field('video_id') }}" title="Presentación {{ get_field('nombre_psicologo') }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
          </div>
        @endif
      </div>
      
      <!-- Formación Académica y Certificaciones -->
      @if(have_rows('formacion_academica'))
        <div class="mb-16">
          <h3 class="text-xl font-bold text-[#030D55] mb-6">{{ get_field('titulo_formacion') ?: 'Formación Académica y Certificaciones Internacionales' }}</h3>
          
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @while(have_rows('formacion_academica')) @php(the_row())
              <div class="border border-gray-200 p-4 rounded-lg">
                <h4 class="font-semibold mb-2">{{ get_sub_field('titulo_formacion') }}</h4>
                <p class="text-sm">{{ get_sub_field('institucion') }}</p>
              </div>
            @endwhile
          </div>
        </div>
      @endif
      
      <!-- Especialidades en Terapia EMDR -->
      @if(have_rows('especialidades'))
        <div class="mb-16">
          <h3 class="text-xl font-bold text-[#030D55] mb-6">{{ get_field('titulo_especialidades') ?: 'Especialidades en Terapia EMDR' }}</h3>
          
          <ul class="space-y-3">
            @while(have_rows('especialidades')) @php(the_row())
              <li class="flex items-start">
                <span class="flex-shrink-0 w-4 h-4 mt-1 mr-3 bg-[#FF3382] rounded-full"></span>
                <span>{{ get_sub_field('especialidad') }}</span>
              </li>
            @endwhile
          </ul>
          
          <!-- Decoración de hoja -->
          <div class="relative">
            <img src="{{ get_theme_file_uri('resources/images/leaf-decoration.png') }}" alt="Decoración" class="absolute bottom-0 right-0 w-32 opacity-70">
          </div>
        </div>
      @endif
      
      <!-- Testimonio -->
      @if(get_field('testimonio_id') || get_field('testimonio_texto'))
        <div class="mb-16">
          <h3 class="text-2xl font-bold text-[#030D55] mb-8 text-center" style="font-family: 'Playfair Display', serif;">{{ get_field('titulo_testimonio') ?: 'Un testimonio de quien transformó su vida' }}</h3>
          
          <div class="max-w-4xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-6 items-center">
            @if(get_field('testimonio_id'))
              <div class="md:col-span-2">
                <div class="aspect-w-16 aspect-h-9 rounded-lg overflow-hidden">
                  <iframe class="w-full h-full" src="https://www.youtube.com/embed/{{ get_field('testimonio_id') }}" title="Testimonio de cliente" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
              </div>
            @endif
            
            @if(get_field('testimonio_autor') || get_field('testimonio_texto'))
              <div class="md:col-span-1">
                @if(get_field('testimonio_autor'))
                  <h4 class="text-lg font-bold text-[#FF3382] mb-3">{{ get_field('testimonio_autor') }}</h4>
                @endif
                @if(get_field('testimonio_texto'))
                  <p class="text-sm">{{ get_field('testimonio_texto') }}</p>
                @endif
              </div>
            @endif
          </div>
        </div>
      @endif
      
      <!-- Botón de reserva -->
      <div class="text-center mb-16">
        <a href="{{ get_field('url_reserva') ?: '/reservar-cita' }}" class="inline-block py-3 px-8 text-white rounded-full font-medium bg-gradient-to-r from-[#FF3382] to-[#5A0989] hover:opacity-90 transition-opacity">
          {{ get_field('texto_boton') ?: 'Reservar Cita' }}
        </a>
      </div>
    </div>
  @endwhile
@endsection 