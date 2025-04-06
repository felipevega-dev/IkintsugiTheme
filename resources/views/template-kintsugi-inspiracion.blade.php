{{--
  Template Name: Qué nos inspira
--}}

@extends('layouts.app')

@section('content')
  <div class="bg-[#CCA0E00D] pb-20 relative pt-24">
    <div class="container mx-auto px-4 py-12">
      <h1 class="text-5xl font-bold text-[#030D55] mb-10 text-center" style="font-family: 'Playfair Display', serif;">Qué nos inspira</h1>
      
      <div class="max-w-4xl mx-auto">
        <div class="mb-12 flex justify-center">
          <img src="{{ get_theme_file_uri('resources/images/inspiracion.jpg') }}" alt="Nuestra inspiración" class="rounded-xl shadow-lg w-full max-w-2xl">
        </div>
        
        <div class="prose prose-lg mx-auto">
          <p>En el Instituto Kintsugi, nos inspira la capacidad humana de transformación y sanación. Creemos profundamente en que toda persona tiene el potencial para recuperarse del trauma y las heridas emocionales, y nuestro propósito es facilitar ese proceso de manera efectiva y compasiva.</p>
          
          <h2 class="text-3xl font-bold text-[#030D55] mt-8 mb-4" style="font-family: 'Playfair Display', serif;">Nuestra visión</h2>
          
          <p>Aspiramos a ser un espacio de referencia en la transformación emocional, donde las personas puedan reconectar con su capacidad innata de sanación y crecimiento. Visualizamos una sociedad que comprenda mejor el trauma y su impacto, y que valore la salud mental tanto como la física.</p>
          
          <h2 class="text-3xl font-bold text-[#030D55] mt-8 mb-4" style="font-family: 'Playfair Display', serif;">Nuestros valores</h2>
          
          <ul>
            <li><strong>Compromiso con la ciencia:</strong> Basamos nuestro trabajo en evidencia científica y neurociencia moderna.</li>
            <li><strong>Empatía profunda:</strong> Acompañamos desde la comprensión genuina del sufrimiento humano.</li>
            <li><strong>Transformación:</strong> Creemos en la capacidad de convertir el dolor en fortaleza.</li>
            <li><strong>Excelencia terapéutica:</strong> Nos comprometemos con la formación continua y la calidad en nuestros servicios.</li>
            <li><strong>Inclusión:</strong> Respetamos la diversidad y adaptamos nuestro enfoque a las necesidades individuales.</li>
          </ul>
          
          <h2 class="text-3xl font-bold text-[#030D55] mt-8 mb-4" style="font-family: 'Playfair Display', serif;">Nuestro enfoque</h2>
          
          <p>Nos inspira el modelo integrativo que combina la terapia EMDR, las neurociencias modernas y la sabiduría ancestral sobre la resiliencia humana. Creemos que el trauma puede ser procesado y transformado cuando se aborda de manera integral, respetando el ritmo y las necesidades de cada persona.</p>
          
          <p>Nos motiva acompañar a cada persona en su viaje de autodescubrimiento y sanación, celebrando cada paso hacia una vida más plena y consciente.</p>
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