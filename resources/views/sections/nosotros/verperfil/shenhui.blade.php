{{--
  Template Name: Shénhui Lin
--}}

@extends('layouts.app')

@section('content')
  @php
    // Datos del psicólogo
    $nombre = "Shénhui Lin";
    $foto = get_theme_file_uri('resources/images/shenperfil.png');
    $credenciales = [
      "Psicóloga Clínica EMDR",
      "Máster en Psicoterapia EMDR",
      "Happiness Trainer",
      "Hipnosis Clínica",
      "Emotional Freedom Techniques (EFT)",
      "PARCUVE para trauma, apego y disociación",
      "Instructora de QIGONG",
      "Co-fundadora del Instituto Kintsugi y Co-conductora de @EmisorKintsugi, podcast de divulgación científica donde comparte consejos, información y reflexiones sobre salud mental, neurociencia, traumas y felicidad.",
      "Psicoterapia para adultos, adulto mayor y parejas",
      "Miembro Asociación de EMDR Chile",
      "Miembro Asociación de EMDR España"
    ];
    $descripcion = '
      <p class="mb-4">He dedicado mi vida profesional a facilitar el proceso de cambio en las personas adultas que han sufrido dolorosas heridas emocionales, causadas por los vínculos interpersonales y laborales. Abordando los trastornos psicológicos derivados de las vivencias traumáticas, tales como; trastorno de estrés postraumático (TEPT), trauma complejo, trastornos disociativos, ansiedad, depresión, trastorno límite de la personalidad, como también la posibilidad de salir adelante y reparar el daño en quienes han sido víctimas de abuso, violencia de género, maltrato en ambiente laboral o mobbing, entre otros.</p>
      <p class="mb-4">Mi enfoque integrativo busca proporcionar un espacio seguro y comprensivo donde las personas puedan sentirse escuchadas y apoyadas, en su camino hacia la sanación y transformación de sus heridas y vidas.</p>
    ';
    $titulo_video = "Estoy aquí para acompañarte en el<br>proceso de sanar y recuperar tu<br>bienestar emocional.";
    $video_id = "XBhKLq9y9bE"; // ID del video de presentación de Shenhui
    
    $titulo_formacion = "Formación Académica y Certificaciones Internacionales";
    $formacion = [
      [
        "titulo" => "Máster en Psicoterapia Clínica EMDR",
        "institucion" => "Universidad Nacional de Educación a Distancia (UNED), España."
      ],
      [
        "titulo" => "Enfoque en trauma, regulación emocional y desarrollo de la personalidad.",
        "institucion" => ""
      ],
      [
        "titulo" => "Especialización en trastornos disociativos y cuadros postraumáticos graves.",
        "institucion" => ""
      ],
      [
        "titulo" => "Emotional Freedom Techniques (EFT).",
        "institucion" => ""
      ],
      [
        "titulo" => "Postitulo en Hipnosis Clínica Ericksoniana.",
        "institucion" => ""
      ],
      [
        "titulo" => "Happiness Trainer, Happiness Studies Academy of PhD. Tal Ben-Shahar, Universidad de Harvard.",
        "institucion" => ""
      ]
    ];
    
    $titulo_especialidades = "Especialización en Terapia EMDR";
    $especialidades = [
      "EMDR, Protocolo principal, para Desensibilización y Reprocesamiento por Movimientos Oculares, para las vivencias traumáticas, EMDR Institute USA, EMDRIA.",
      "EMD, Protocolo simplicado, Desensibilización por Movimientos Oculares.",
      "EMDR 2.0 (Optimización del proceso terapéutico con técnicas innovadoras creadas por Suzy Matthijssen y Ad De Jongh).",
      "PESEA, Protocolo EMDR, para Estabilización en Síndrome de Estrés Agudo, por PhD. Ignacio Jarero.",
      "PRECI, Protocolo de Terapia EMDR para Incidentes Críticos Recientes y Estrés Traumático Continuado, por PhD. Ignacio Jarero.",
      "Protocolo Grupal, para intervenciones en situaciones de crisis o catástrofes, de PhD Ignacio Jarero.",
      "GTEP – Protocolo Grupal e Integrativo con Terapia EMDR, por Elan Shapiro Brurit Laub.",
      "R-TEP Protocolo avanzado para trauma complejo, por Elan Shapiro y Brurit Laub.",
      "Formación avanzada en Disociación Traumática, por PhD. Suzatte Boon.",
      "Formación avanzada en el Tratamiento del Trauma Complejo, por Deany Laliotis, LICSW.",
      "Formación avanzada en Trastornos de Trauma Complejo y Disociación, por Phd. Onno van der Hart y Phd. Roger Solomon, EMDR Europe.",
      "Written Exposure Therapy for PTSD, PhD. Debra Kaysen.",
      "Formación avanzada en Estrategias para Trastornos Somáticos, por Ps. Santiago Jácome, EMDR Iberoamérica.",
      "Formación avanzada en el Trastorno Somático con Terapia EMDR, por Ps. Natalia Seijo."
    ];
    
    $titulo_testimonio = "Un testimonio de quien transformó<br>su vida con Shénhui";
    $testimonio_id = "8NmFpjcz-QU"; // ID del video de testimonio de Shenhui
    $testimonio_autor = "Fernando Torres";
    $testimonio_texto = '"Después de años en terapias largas y sin resultados, la terapia con Shénhui fue un antes y un después para mí. En pocas sesiones vi cambios concretos, sin revivir traumas. Sentí que forjé mucho de mi interior y que, por fin, tenía una alternativa real al sufrimiento."';
    
    $url_reserva = "/reservar-cita";
    $texto_boton = "Reservar Cita";
  @endphp
  
  <!-- Sección de héroe con fondo y borde curvo -->
  <div class="bg-[#CCA0E00D] pb-20 relative pt-24">
    <div class="container mx-auto px-4 py-12">
      <div class="flex flex-col md:flex-row items-center md:items-start gap-8 max-w-6xl mx-auto mt-20">
        <!-- Imagen con borde redondeado y degradado -->
        <div class="flex-shrink-0 w-100 h-100 rounded-full overflow-hidden relative -mt-0 mt-5">
          <div class="absolute inset-0 rounded-full overflow-hidden">
            <img src="{{ $foto }}" alt="{{ $nombre }}" class="w-full h-full object-cover relative z-0 rounded-full p-1.5">
          </div>
        </div>
        
        <!-- Información del psicólogo -->
        <div class="flex-grow">
          <h1 class="text-5xl md:text-5xl font-bold text-[#030D55] mb-6 text-center md:text-left" style="font-family: 'Playfair Display', serif;">{{ $nombre }}</h1>
          
          <ul class="list-none space-y-1 mt-15">
            @foreach($credenciales as $credencial)
              <li class="flex items-start">
                <span class="text-[#030D55] mr-2">•</span>
                <span>{{ $credencial }}</span>
              </li>
            @endforeach
          </ul>
          
          <!-- Redes sociales -->
          <div class="mt-4 flex gap-4 justify-center md:justify-start">
            <a href="https://instagram.com/" target="_blank" class="text-[#FF3382]">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
              </svg>
            </a>
            <a href="https://facebook.com/" target="_blank" class="text-[#FF3382]">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                <path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"/>
              </svg>
            </a>
          </div>
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
  
  <div class="container mx-auto px-4 py-12">
    <!-- Sección de descripción -->
    <div class="mb-16 max-w-6xl mx-auto">
      <div>
        {!! $descripcion !!}
      </div>
    </div>
    
    <!-- Sección de video -->
    <div class="mb-16 text-center">
      <h2 class="text-2xl md:text-3xl font-bold text-[#030D55] mb-6 text-center" style="font-family: 'Playfair Display', serif;">Estoy aquí para acompañarte en el<br>proceso de sanar y recuperar tu<br>bienestar emocional.</h2>
      
      <div class="mx-auto" style="width: 1053px; height: 537px; border-radius: 16px; overflow: hidden; box-shadow: 0px 4px 16px 0px #AB277A;">
        <iframe class="w-full h-full" src="https://www.youtube.com/embed/{{ $video_id }}" title="Presentación {{ $nombre }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>
    </div>
    
    <!-- Formación Académica y Certificaciones -->
    <div class="mb-16 max-w-5xl mx-auto">
      <h3 class="text-xl font-bold text-[#030D55] mb-6 text-center">Formación Académica y Certificaciones Internacionales</h3>
      
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @foreach($formacion as $item)
          <div class="rounded-2xl overflow-hidden" style="padding: 1px; background: linear-gradient(180deg, rgba(171, 39, 122, 0.48) 0%, rgba(3, 13, 85, 0.48) 61%);">
            <div class="bg-white p-4 rounded-2xl h-full">
              <h4 class="font-semibold mb-2">{{ $item['titulo'] }}</h4>
              @if($item['institucion'])
                <p class="text-sm">{{ $item['institucion'] }}</p>
              @endif
            </div>
          </div>
        @endforeach
      </div>
    </div>
    
    <!-- Especialidades en Terapia EMDR -->
    <div class="mb-16 max-w-5xl mx-auto relative">
      <h3 class="text-xl font-bold text-[#000000] mb-6 text-start">Especialización en Terapia EMDR</h3>
      
      <div class="mt-10 relative">
        <!-- Línea vertical punteada para conectar los puntos -->
        <div class="hidden md:block absolute left-[9px] top-2 bottom-0 border-l-2 border-dashed border-[#AB277A] opacity-30" style="height: calc(100% - 20px);"></div>
        
        <ul class="space-y-6 relative z-10">
          @foreach($especialidades as $especialidad)
            <li class="flex items-start">
              <span class="flex-shrink-0 w-[20px] h-[20px] mt-1 mr-3 bg-[#AB277A] rounded-full"></span>
              <span>{{ $especialidad }}</span>
            </li>
          @endforeach
        </ul>
      </div>
      
      <!-- Decoración de hojas para Especialidades en EMDR -->
      <div class="absolute bottom-0 right-0 -mb-40 z-10">
        <img src="{{ get_theme_file_uri('resources/images/deco3.png') }}" alt="Decoración" class="w-64">
      </div>
    </div>
  </div>
  
  <!-- Testimonio con fondo completo y borde ondulado como el hero -->
  <div class="bg-[#F8F9FC] pb-20 relative">
    <!-- Borde curvo superior -->
    <div class="absolute top-0 left-0 right-0 transform -translate-y-1">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" preserveAspectRatio="none" class="w-full h-12">
        <path fill="#F8F9FC" fill-opacity="1" d="M0,64L80,69.3C160,75,320,85,480,112C640,139,800,181,960,186.7C1120,192,1280,160,1360,144L1440,128L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z"></path>
      </svg>
    </div>
    
    <div class="container mx-auto px-4 py-12">
      <h3 class="text-4xl font-bold text-[#030D55] mb-15 text-center" style="font-family: 'Playfair Display', serif;">Un testimonio de quien transformó<br>su vida con Shénhui</h3>
      
      <div class="flex flex-col md:flex-row gap-16 items-center max-w-6xl mx-auto">
        <!-- Video a la izquierda -->
        <div class="md:w-5/9">
          <div style="border-radius: 16px; overflow: hidden; box-shadow: 0px 4px 16px 0px #AB277A; border: 4px solid white;">
            <iframe class="w-full aspect-video" src="https://www.youtube.com/embed/{{ $testimonio_id }}" title="Testimonio de {{ $testimonio_autor }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          </div>
        </div>
        
        <!-- Texto del testimonio a la derecha -->
        <div class="md:w-4/8">
          <h4 class="text-center text-2xl font-extrabold text-[#AB277A] mb-4" style="font-family: 'Playfair Display', serif; line-height: 100%;">Fernando Torres</h4>
          <p class="text-base leading-7" style="font-family: 'Roboto', sans-serif;">"Mi proceso de terapia con Shénhui fue transformador. Desde el primer momento, ella me acompañó con mucha calidez, guiándome con firmeza pero siempre con amabilidad, tanto en los días buenos como en los más difíciles."</p>
        </div>
      </div>
    </div>
    
    <!-- Borde curvo inferior similar al del hero -->
    <div class="absolute bottom-0 left-0 right-0">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" preserveAspectRatio="none" class="w-full h-12">
        <path fill="#ffffff" fill-opacity="1" d="M0,64L80,69.3C160,75,320,85,480,112C640,139,800,181,960,186.7C1120,192,1280,160,1360,144L1440,128L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z"></path>
      </svg>
    </div>
  </div>
  
  <div class="container mx-auto px-5">
    <!-- Botón de reserva -->
    <div class="text-center mb-8">
      <a href="{{ $url_reserva }}" class="inline-block py-3 px-8 text-white rounded-full font-medium bg-gradient-to-r from-[#FF3382] to-[#5A0989] hover:opacity-90 transition-opacity">
        {{ $texto_boton }}
      </a>
    </div>
  </div>
@endsection
