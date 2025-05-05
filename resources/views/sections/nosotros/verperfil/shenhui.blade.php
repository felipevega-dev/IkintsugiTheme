{{--
  Template Name: Shénhui Lin
--}}

@extends('layouts.app')

@section('content')
  @php
    // Datos del psicólogo
    $nombre = "Shénhui Lín";
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
    $titulo_video = "Estoy aquí para acompañarte en el proceso de sanar y recuperar tu bienestar emocional.";
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
      "Formación avanzada en el Trastorno Somático con Terapia EMDR, por Ps. Natalia Seijo.",
      "Formación avanzada en EMDR para Víctimas de Violencia de Género, por Ps. Dolores Mosquera, EMDR Chile, EMDRLAC.",
      "Formación avanzada en abuso sexual en terapia EMDR, por Ps. Arun Mansukhani.",
      "Protocolo en Trastornos Somáticos en Terapia EMDR, Ps. Silvia Grauvy, EMDR Argentina.",
      "Flash, Protocolo en intervención temprana, EMDR por PhD. Esly Regina Carvalho.",
    ];
    
    $titulo_testimonio = "Testimonios de quienes transformaron su vida";
    $testimonio_id = "S9de95EBTXI"; // ID del video de testimonio de Shenhui
    $testimonio_autor = "Fernando";
    $testimonio_texto = '"Después de años en terapias largas y sin resultados, la terapia con Shénhui fue un antes y un después para mí. En pocas sesiones vi cambios concretos, sin revivir traumas. Sentí que forjé mucho de mi interior y que, por fin, tenía una alternativa real al sufrimiento."';
    
    $url_reserva = "/reservar-cita";
    $texto_boton = "Reservar Cita";
  @endphp
  
  <style>
  .page-template-verperfil {
    padding-top: 0 !important;
  }
  </style>
  <!-- Estilos y animaciones para la página -->
  <style>
    .img-hover-zoom {
      transition: transform 0.5s ease;
      overflow: hidden;
    }
    .img-hover-zoom:hover {
      transform: scale(1.05);
    }
    .formacion-card {
      transition: all 0.3s ease;
    }
    .formacion-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 20px rgba(171, 39, 122, 0.2);
    }
    .social-icon {
      transition: transform 0.3s ease;
    }
    .social-icon:hover {
      transform: scale(1.2);
    }
    
    /* Animaciones de scroll */
    .fade-up {
      opacity: 0;
      transform: translateY(20px);
      transition: opacity 0.8s ease, transform 0.8s ease;
    }
    .fade-up.active {
      opacity: 1;
      transform: translateY(0);
    }
    
    /* Fix responsiveness issues */
    @media (max-width: 768px) {
      .video-container {
        width: 100% !important;
        height: auto !important;
        aspect-ratio: 16/12 !important; /* Taller video on mobile */
      }
      .video-container iframe {
        height: 100% !important;
      }
      .testimonial-section {
        flex-direction: column;
        gap: 2rem;
      }
      .testimonial-text, .testimonial-video {
        width: 100% !important;
      }
      .hero-profile {
        margin-top: 0 !important;
        padding-top: 20px !important; /* Reduced space for mobile header */
      }
      /* Reduce spacing after social icons */
      .mt-4 {
        margin-top: 0.5rem !important;
      }
      /* Add space between list items and social media icons */
      .social-icons-container {
        margin-top: 2rem !important;
      }
      /* Reduce spacing between sections */
      .mb-16 {
        margin-bottom: 2rem !important;
      }
      /* Adjust container spacing */
      .container.mx-auto.px-4.py-12 {
        padding-top: 1rem !important;
        padding-bottom: 1rem !important;
      }
      /* Reduce space between list items */
      .space-y-1 > * + * {
        margin-top: 0.25rem !important;
      }
    }
    
    /* Corrección para el header en esta página */
    @media (max-width: 1023px) {
      #main-header {
        position: fixed !important;
        top: 14px !important; /* More space above header on mobile */
        z-index: 1000 !important;
      }
      /* Make social icons larger on mobile */
      .social-icon svg {
        width: 30px !important;
        height: 30px !important;
      }
      /* Better center the social icons with less spacing */
      .hero-profile .flex.gap-4 {
        justify-content: center !important;
        gap: 1.5rem !important;
      }
    }
    
    @media (min-width: 1024px) {
      #main-header {
        position: absolute !important;
        top: 0 !important;
        z-index: 50 !important;
      }
      /* Ajustar márgenes para el contenido en desktop */
      .hero-profile {
        margin-top: 30px !important;
      }
    }
  </style>
  
  <!-- Sección de héroe con fondo y borde curvo -->
  <div class="bg-[#CCA0E00D] pb-12 relative pt-24">
    <div class="container mx-auto px-4 py-12 hero-container">
      <div class="flex flex-col md:flex-row items-center md:items-start gap-8 max-w-6xl mx-auto hero-profile">
        <!-- Imagen con borde redondeado y degradado -->
        <div class="flex-shrink-0 w-100 h-100 rounded-full overflow-hidden relative mt-0 fade-up" data-delay="200">
          <div class="absolute inset-0 rounded-full overflow-hidden img-hover-zoom">
            <img src="{{ $foto }}" alt="{{ $nombre }}" class="w-full h-full object-cover relative z-0 rounded-full p-1.5">
          </div>
        </div>
        
        <!-- Información del psicólogo -->
        <div class="flex-grow fade-up" data-delay="400">
          <h1 class="text-5xl md:text-5xl font-bold text-[#030D55] mb-6 text-center md:text-left font-paytone">{{ $nombre }}</h1>
          
          <ul class="list-none space-y-1 mt-4">
            @foreach($credenciales as $credencial)
              <li class="flex items-start">
                <span class="text-[#030D55] mr-2">•</span>
                <span>{{ $credencial }}</span>
              </li>
            @endforeach
          </ul>
          
          <!-- Redes sociales -->
          <div class="mt-2 flex gap-4 justify-center md:justify-start social-icons-container">
            <a href="https://www.instagram.com/psicologa_shenhui/" target="_blank" class="text-[#FF3382] social-icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
              </svg>
            </a>
            <a href="https://www.tiktok.com/@psicologa_shenhui" target="_blank" class="text-[#FF3382] social-icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                <path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64 2.93 2.93 0 0 1 .88.13V9.4a6.84 6.84 0 0 0-1-.05A6.33 6.33 0 0 0 5 20.1a6.34 6.34 0 0 0 10.86-4.43v-7a8.16 8.16 0 0 0 4.77 1.52v-3.4a4.85 4.85 0 0 1-1-.1z"/>
              </svg>
            </a>
            <a href="https://www.facebook.com/psicologa.shenhui" target="_blank" class="text-[#FF3382] social-icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                <path d="M20 3H4a1 1 0 0 0-1 1v16a1 1 0 0 0 1 1h8.615v-6.96h-2.338v-2.725h2.338v-2c0-2.325 1.42-3.592 3.5-3.592.699-.002 1.399.034 2.095.107v2.42h-1.435c-1.128 0-1.348.538-1.348 1.325v1.735h2.697l-.35 2.725h-2.348V21H20a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1z"></path>
              </svg>
            </a>
            <a href="https://www.linkedin.com/newsletters/7085405873988083712/" target="_blank" class="text-[#FF3382] social-icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                <path d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14m-.5 15.5v-5.3a3.26 3.26 0 0 0-3.26-3.26c-.85 0-1.84.52-2.32 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 0 1 1.4 1.4v4.93h2.79M6.88 8.56a1.68 1.68 0 0 0 1.68-1.68c0-.93-.75-1.69-1.68-1.69a1.69 1.69 0 0 0-1.69 1.69c0 .93.76 1.68 1.69 1.68m1.39 9.94v-8.37H5.5v8.37h2.77z"></path>
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
    <div class="mb-16 max-w-6xl mx-auto fade-up" data-delay="200">
      <div>
        {!! $descripcion !!}
      </div>
    </div>
    
    <!-- Sección de video -->
    <div class="mb-16 text-center fade-up" data-delay="300">
      <h2 class="text-2xl md:text-3xl font-bold text-[#030D55] mb-6 text-center font-paytone">{{ $titulo_video }}</h2>
      
      <div class="mx-auto video-container relative" style="max-width: 100%; width: 1053px; height: 537px; border-radius: 16px; overflow: hidden; box-shadow: 0px 4px 16px 0px #AB277A;">
        <div class="w-full h-full" id="main-video-container"></div>
      </div>
    </div>
    
    <!-- Formación Académica y Certificaciones -->
    <div class="mb-16 max-w-5xl mx-auto fade-up" data-delay="400">
      <h3 class="text-2xl font-bold text-[#030D55] mb-6 text-center font-paytone">{{ $titulo_formacion }}</h3>
      
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @foreach($formacion as $item)
          <div class="rounded-2xl overflow-hidden formacion-card" style="padding: 1px; background: linear-gradient(180deg, rgba(171, 39, 122, 0.48) 0%, rgba(3, 13, 85, 0.48) 61%);">
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
    <div class="mb-16 max-w-5xl mx-auto relative fade-up" data-delay="500">
      <h3 class="text-2xl font-bold text-[#000000] mb-6 text-start font-paytone">{{ $titulo_especialidades }}</h3>
      
      <div class="mt-10 relative">
        <!-- Línea vertical punteada para conectar los puntos -->
        <div class="hidden md:block absolute left-[9px] top-2 bottom-0 border-l-2 border-dashed border-[#AB277A] opacity-30" style="height: calc(100% - 20px);"></div>
        
        <ul class="space-y-6 relative z-10">
          @foreach($especialidades as $especialidad)
            <li class="flex items-start group hover:-translate-y-1 transition-all duration-300">
              <span class="flex-shrink-0 w-[20px] h-[20px] mt-1 mr-3 bg-[#AB277A] rounded-full shadow-md relative overflow-hidden transition-all duration-300 group-hover:shadow-[0_0_15px_rgba(171,39,122,0.7)] group-hover:scale-110">
                <span class="absolute inset-0 bg-white opacity-0 group-hover:opacity-30 group-hover:animate-pulse"></span>
              </span>
              <span>{{ $especialidad }}</span>
            </li>
          @endforeach
        </ul>
      </div>
      
      <!-- Decoración de hojas para Especialidades en EMDR -->
      <div class="absolute bottom-0 right-0 -mb-40 z-10 hidden md:block img-hover-zoom">
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
    
    <div class="container mx-auto px-4 py-12 testimonial-container">
      <h3 class="text-3xl font-bold text-[#030D55] mb-15 text-center fade-up font-paytone" data-delay="200">{{ $titulo_testimonio }}</h3>
      
      <div class="flex flex-col md:flex-row gap-16 items-center max-w-6xl mx-auto testimonial-section">
        <!-- Texto del testimonio a la izquierda -->
        <div class="md:w-4/8 testimonial-text fade-up" data-delay="300">
          <h4 class="text-center text-2xl font-extrabold text-[#AB277A] mb-4 font-paytone">{{ $testimonio_autor }}</h4>
          <p class="text-base leading-7" style="font-family: 'Roboto', sans-serif;">{{ $testimonio_texto }}</p>
        </div>
        
        <!-- Video a la derecha -->
        <div class="md:w-5/9 testimonial-video fade-up" data-delay="400">
          <div style="border-radius: 16px; overflow: hidden; box-shadow: 0px 4px 16px 0px #AB277A; border: 4px solid white;">
            <div class="w-full aspect-video relative" id="testimonial-video-container"></div>
          </div>
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
    <div class="text-center mb-8 fade-up" data-delay="200">
      <a href="{{ $url_reserva }}" class="inline-block py-3 px-8 text-white rounded-full font-medium bg-gradient-to-r from-[#FF3382] to-[#5A0989] hover:opacity-90 transition-opacity transform hover:scale-105 duration-300">
        {{ $texto_boton }}
      </a>
    </div>
  </div>

  <!-- Sección de comentarios -->
  <section class="py-10 bg-gray-50">
    <div class="container mx-auto px-4">
      <div class="max-w-4xl mx-auto">
        <h2 class="text-2xl font-bold text-[#030D55] mb-6 font-paytone">
          Comentarios
        </h2>
        
        @if(comments_open())
          <div class="bg-white rounded-xl p-6 shadow-sm">
            @php
              comments_template();
            @endphp
          </div>
        @else
          <p class="text-gray-600 italic">Los comentarios están cerrados para este perfil.</p>
        @endif
      </div>
    </div>
  </section>

  <!-- Script para manejar las animaciones de scroll -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Función para comprobar si un elemento está en el viewport
      function isElementInViewport(el) {
        const rect = el.getBoundingClientRect();
        return (
          rect.top <= (window.innerHeight || document.documentElement.clientHeight) * 0.85
        );
      }

      // Aplicar la clase active a los elementos fade-up que están en el viewport
      function handleScrollAnimation() {
        const elements = document.querySelectorAll('.fade-up:not(.active)');
        
        elements.forEach(element => {
          if (isElementInViewport(element)) {
            // Obtener delay personalizado si existe
            const delay = element.getAttribute('data-delay') || 0;
            setTimeout(() => {
              element.classList.add('active');
            }, delay);
          }
        });
      }

      // Ejecutar al cargar la página y en cada scroll
      handleScrollAnimation();
      window.addEventListener('scroll', handleScrollAnimation);
      
      // Cargar videos de YouTube de forma segura para evitar problemas de scroll en móvil
      const mainVideoContainer = document.getElementById('main-video-container');
      if (mainVideoContainer) {
        const iframe = document.createElement('iframe');
        iframe.setAttribute('src', 'https://www.youtube.com/embed/{{ $video_id }}');
        iframe.setAttribute('title', 'Presentación {{ $nombre }}');
        iframe.setAttribute('frameborder', '0');
        iframe.setAttribute('allow', 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture');
        iframe.setAttribute('allowfullscreen', '');
        iframe.classList.add('w-full', 'h-full');
        iframe.style.position = 'absolute';
        iframe.style.top = '0';
        iframe.style.left = '0';
        mainVideoContainer.appendChild(iframe);
      }
      
      const testimonialVideoContainer = document.getElementById('testimonial-video-container');
      if (testimonialVideoContainer) {
        const iframe = document.createElement('iframe');
        iframe.setAttribute('src', 'https://www.youtube.com/embed/{{ $testimonio_id }}');
        iframe.setAttribute('title', 'Testimonio de {{ $testimonio_autor }}');
        iframe.setAttribute('frameborder', '0');
        iframe.setAttribute('allow', 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture');
        iframe.setAttribute('allowfullscreen', '');
        iframe.classList.add('w-full', 'h-full');
        iframe.style.position = 'absolute';
        iframe.style.top = '0';
        iframe.style.left = '0';
        testimonialVideoContainer.appendChild(iframe);
      }
    });
  </script>
@endsection
