{{--
  Template Name: Qué significa Kintsugi
--}}

@extends('layouts.app')

@section('content')
  <div class="bg-[#CCA0E00D] pb-20 relative pt-24">
    <div class="container mx-auto px-4 py-12">
      <h1 class="text-5xl font-bold text-[#030D55] mb-10 text-center" style="font-family: 'Playfair Display', serif;">¿Qué significa Kintsugi?</h1>
      
      <div class="max-w-4xl mx-auto">
        <div class="mb-12 flex justify-center">
          <img src="{{ get_theme_file_uri('resources/images/kintsugi-art.jpg') }}" alt="Arte Kintsugi" class="rounded-xl shadow-lg w-full max-w-2xl">
        </div>
        
        <div class="prose prose-lg mx-auto">
          <p>El Kintsugi es un arte japonés milenario que consiste en reparar piezas de cerámica rotas con oro, plata o platino, destacando las fracturas en lugar de ocultarlas. Este arte representa una filosofía que acepta el pasado, la imperfección y celebra las cicatrices como parte de la historia única de cada objeto.</p>
          
          <p>Para nosotros, el Kintsugi simboliza la esencia de nuestro enfoque terapéutico: no intentamos borrar las heridas emocionales, sino transformarlas en fuentes de fortaleza y belleza. Creemos que las experiencias difíciles pueden convertirse en oportunidades de crecimiento cuando se les da el significado adecuado.</p>
          
          <h2 class="text-3xl font-bold text-[#030D55] mt-8 mb-4" style="font-family: 'Playfair Display', serif;">Principios del Kintsugi que nos inspiran</h2>
          
          <ul>
            <li><strong>Aceptación:</strong> Reconocer las experiencias difíciles como parte natural de la vida.</li>
            <li><strong>Transformación:</strong> Convertir el dolor en una fuente de fortaleza y sabiduría.</li>
            <li><strong>Belleza en la imperfección:</strong> Apreciar nuestra historia completa, incluidas las cicatrices.</li>
            <li><strong>Resiliencia:</strong> Fortalecer las áreas que han sido dañadas para crear algo más resistente.</li>
          </ul>
          
          <p>En el Instituto Kintsugi, aplicamos esta filosofía a nuestro trabajo terapéutico, ayudando a las personas a reconocer su propia capacidad de transformar sus experiencias dolorosas en fortalezas únicas.</p>
        </div>
      </div>
    </div>
    
    <!-- Borde curvo inferior -->
    <div class="absolute bottom-0 left-0 right-0">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" preserveAspectRatio="none" class="w-full h-12">
        <path fill="#ffffff" fill-opacity="1" d="M0,64L80,69.3C160,75,320,85,480,112C640,139,800,181,960,186.7C1120,192,1280,160,1360,144L1440,128L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z"></path>
      </svg>
    </div>
  </div>
@endsection 