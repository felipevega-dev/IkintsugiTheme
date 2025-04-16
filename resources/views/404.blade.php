@extends('layouts.app')

@section('content')
<section class="py-6 bg-white md:py-8 lg:py-12">
    <div class="container mx-auto px-4">
        <div class="text-center mt-22 md:mt-26 lg:mt-30">
            
            <!-- Animación y título -->
            <div class="relative mb-8">
                <h2 class="text-5xl font-bold mb-2 text-[#1A1A1A] animate-pulse">404</h2>
                <h3 class="text-3xl font-medium mb-6 text-[#333333]">Página no encontrada</h3>
                <div class="w-24 h-1 bg-[#D93280] mx-auto"></div>
            </div>
            
            <p class="text-lg mb-10 text-[#4D4D4D] max-w-lg mx-auto">Lo sentimos, pero la página que intentas ver no existe o ha sido trasladada a otra ubicación.</p>
            
            <!-- Buscador personalizado en español -->
            <div class="max-w-md mx-auto mb-8">
                <form role="search" method="get" class="search-form relative" action="{{ home_url('/') }}">
                    <label class="sr-only">Buscar:</label>
                    <div class="flex shadow-sm">
                        <input type="search" class="w-full px-4 py-3 border border-[#CCCCCC] rounded-l-lg focus:outline-none focus:ring-2 focus:ring-[#D93280]" 
                            placeholder="¿Qué estás buscando?" value="{{ get_search_query() }}" name="s">
                        <button type="submit" class="px-6 bg-[#D93280] text-white rounded-r-lg hover:bg-[#B7006E] transition-colors">
                            Buscar
                        </button>
                    </div>
                </form>
            </div>
            
            <!-- Secciones sugeridas -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 max-w-2xl mx-auto mb-10">
                <a href="{{ home_url('/') }}" class="p-3 border border-[#CCCCCC] rounded-lg bg-white hover:shadow-md hover:border-[#F472B6] transition-all">
                    <h4 class="font-medium text-[#B7006E]">Inicio</h4>
                </a>
                <a href="{{ home_url('/quienes-somos') }}" class="p-3 border border-[#CCCCCC] rounded-lg bg-white hover:shadow-md hover:border-[#F472B6] transition-all">
                    <h4 class="font-medium text-[#B7006E]">¿Quiénes somos?</h4>
                </a>
                <a href="{{ home_url('/psicoterapia-emdr') }}" class="p-3 border border-[#CCCCCC] rounded-lg bg-white hover:shadow-md hover:border-[#F472B6] transition-all">
                    <h4 class="font-medium text-[#B7006E]">Psicoterapia EMDR</h4>
                </a>
            </div>
            
            <!-- Botón de volver -->
            <a href="{{ home_url('/') }}" class="inline-flex items-center py-3 px-6 bg-[#D93280] hover:bg-[#B7006E] text-white font-medium rounded-full transition-colors duration-200 shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Volver al inicio
            </a>
        </div>
    </div>
</section>

<style>
    @keyframes gentle-pulse {
        0% { opacity: 1; }
        50% { opacity: 0.7; }
        100% { opacity: 1; }
    }
    .animate-pulse {
        animation: gentle-pulse 2s infinite;
    }
</style>
@endsection
