{{--
  Template Name: Julio César Carrasco
--}}

@extends('layouts.app')

@section('content')
  @php
    // Datos del psicólogo
    $nombre = "Julio César Carrasco";
    $foto = get_theme_file_uri('resources/images/julioperfil.png');
    $credenciales = [
      "Psicólogo Clínico",
      "Máster en Psicoterapia EMDR",
      "Hipnosis Clínica",
      "Diplomado en Gerontología",
      "Con experiencia en el trabajo con adolescentes, adultos, adultos mayores y parejas.",
      "Cofundador del Instituto Kintsugi",
      "Co-conductor y coordinador del podcast @EmisorKintsugi, donde participa en entrevistas y debates sobre temas de salud mental.",
      "Miembro Asociación de EMDR Chile",
      "Miembro Asociación de EMDR España"
    ];
    $descripcion = '
      <p class="mb-4">Me especializo en trabajar con adolescentes, adultos, parejas y adultos mayores que enfrentan dificultades emocionales relacionadas con experiencias traumáticas. Ayudo a personas que:</p>
      <ul class="mb-4 list-disc pl-6">
        <li>No logran superar recuerdos perturbadores, imágenes o sonidos relacionados con el trauma.</li>
        <li>Experimentan miedo, re-traumatización o emociones fuera de control.</li>
        <li>Se sienten paralizadas, irritables o profundamente tristes.</li>
      </ul>
      <p class="mb-4">Mi objetivo es acompañarte en el proceso de recuperar el equilibrio emocional y facilitar un retorno rápido a la normalidad, siempre con un enfoque empático y basado en evidencia.</p>
      <p class="mb-4">Mi enfoque combina un profundo entendimiento del impacto del trauma en la mente y el cuerpo, con herramientas terapéuticas de eficacia comprobada basadas en evidencia científica en las neurociencias.</p>
      <p class="mb-4">Utilizo estrategias de intervención temprana para crisis y catástrofes, adaptando las terapias según las necesidades individuales de cada paciente.</p>
    ';
    $titulo_video = "Estoy aquí para acompañarte en el<br>proceso de sanar y recuperar tu<br>bienestar emocional.";
    $video_id = "VIDEO_ID"; // Reemplazar con ID real de YouTube
    
    $titulo_formacion = "Formación Académica y Certificaciones Internacionales";
    $formacion = [
      [
        "titulo" => "Máster en Psicoterapia Clínica EMDR",
        "institucion" => "Universidad Iberoamericana (México)"
      ],
      [
        "titulo" => "Licenciado en Psicología, especialidad emocional y desarrollo de la personalidad",
        "institucion" => ""
      ],
      [
        "titulo" => "Especialización en trastornos disociativos y casos complejos con Dolores Mosquera",
        "institucion" => ""
      ],
      [
        "titulo" => "Diplomado en Gerontología",
        "institucion" => ""
      ],
      [
        "titulo" => "Certificado en Hipnosis Clínica Ericksoniana",
        "institucion" => ""
      ],
      [
        "titulo" => "MASTER PRACTITIONER: Avalado por American Alliance for Medical Hypnosis, International Association for Counseling",
        "institucion" => ""
      ]
    ];
    
    $titulo_especialidades = "Especialidades en Terapia EMDR";
    $especialidades = [
      "EMDR Protocolo de terapia para trastornos de la alimentación (Trastorno por atracón, Bulimia nerviosa, Anorexia nerviosa, TCANE y otros OSFED)",
      "EMDR Protocolo integrado para trastornos somatomorfos",
      "EMDR y técnicas específicas para trastornos de ansiedad (Ansiedad en general, TOC; fobias específicas, fobia social, TAG, trastorno del pánico)",
      "EMDR Terapia con padres (Intervenciones con padres y madres)",
      "EMDR Protocolo para regulación afectiva y trauma complejo",
      "EMDR Terapia de reconstrucción de la respuesta al trauma (TRR)",
      "EMDR Protocolo para el desarrollo de Recursos de Estabilización (LoS Low Intensity Skill)",
      "Protocolo avanzado de la Plantilla del Trauma y Conflicto (JTC)",
      "Protocolo integrado de EMDR para el trauma y duelo (TGP)",
      "Protocolo integrado de Psicoterapia EMDR en grupo con el Dr. Ignacio Jarero (formato individual-grupal, EMDR-IGTP, EMDR-Integrative Group Treatment Protocol)",
      "Protocolo de EMDR para Trauma reciente",
      "Protocolo de procesos adaptativos acelerados (R-TEP)"
    ];
    
    $titulo_testimonio = "Testimonios de quienes transformaron su vida";
    $testimonio_id = "Ft3oIUaRA5g"; // Reemplazar con ID real de YouTube
    $testimonio_autor = "Lorena";
    $testimonio_texto = '"Cuando decidí buscar la terapia con Julio, lo hice porque sentía mucha ansiedad todo el tiempo. Mi mente no paraba y me impedía dormir y disfrutar de mi vida. A través del proceso, he aprendido a entender mis emociones y a gestionarlas. Hoy me siento mucho más tranquila."';
    
    $url_reserva = "/reservar-cita";
    $texto_boton = "Reservar Cita";
  @endphp
  
  <!-- Estilos y animaciones para la página -->

  <style>
  .page-template-verperfil {
    padding-top: 0 !important;
  }
  </style>
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
  <div class="bg-[#CCA0E00D] relative pb-12 pt-24">
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
            <a href="https://www.instagram.com/psicologo_juliocesar" target="_blank" class="text-[#FF3382] social-icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
              </svg>
            </a>
            <a href="https://www.tiktok.com/@psicologo_juliocesar?_t=ZM-8tyTPw3sZEM&_r=1" target="_blank" class="text-[#FF3382] social-icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                <path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64 2.93 2.93 0 0 1 .88.13V9.4a6.84 6.84 0 0 0-1-.05A6.33 6.33 0 0 0 5 20.1a6.34 6.34 0 0 0 10.86-4.43v-7a8.16 8.16 0 0 0 4.77 1.52v-3.4a4.85 4.85 0 0 1-1-.1z"/>
              </svg>
            </a>
            <a href="https://www.facebook.com/PsJulioCesarCarrasco" target="_blank" class="text-[#FF3382] social-icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                <path d="M20 3H4a1 1 0 0 0-1 1v16a1 1 0 0 0 1 1h8.615v-6.96h-2.338v-2.725h2.338v-2c0-2.325 1.42-3.592 3.5-3.592.699-.002 1.399.034 2.095.107v2.42h-1.435c-1.128 0-1.348.538-1.348 1.325v1.735h2.697l-.35 2.725h-2.348V21H20a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1z"></path>
              </svg>
            </a>
            <a href="https://www.linkedin.com/newsletters/emisor-kintsugi-7039605681020108800/" target="_blank" class="text-[#FF3382] social-icon">
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
      <h2 class="text-2xl md:text-3xl font-bold text-[#030D55] mb-6 text-center font-paytone">Estoy aquí para acompañarte en el<br>proceso de sanar y recuperar tu<br>bienestar emocional.</h2>
      
      <div class="mx-auto video-container relative" style="max-width: 100%; width: 1053px; height: 537px; border-radius: 16px; overflow: hidden; box-shadow: 0px 4px 16px 0px #AB277A;">
        <div class="w-full h-full" id="main-video-container"></div>
      </div>
    </div>
    
    <!-- Formación Académica y Certificaciones -->
    <div class="mb-16 max-w-5xl mx-auto fade-up" data-delay="400">
      <h3 class="text-xl font-bold text-[#030D55] mb-6 text-center font-paytone">Formación Académica y Certificaciones Internacionales</h3>
      
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="rounded-2xl overflow-hidden formacion-card" style="padding: 1px; background: linear-gradient(180deg, rgba(171, 39, 122, 0.48) 0%, rgba(3, 13, 85, 0.48) 61%);">
          <div class="bg-white p-4 rounded-2xl h-full">
            <h4 class="font-semibold mb-2">Máster en Psicoterapia Clínica EMDR</h4>
            <p class="text-sm">Universidad Nacional de Educación a Distancia (UNED), España.</p>
          </div>
        </div>
        <div class="rounded-2xl overflow-hidden formacion-card" style="padding: 1px; background: linear-gradient(180deg, rgba(171, 39, 122, 0.48) 0%, rgba(3, 13, 85, 0.48) 61%);">
          <div class="bg-white p-4 rounded-2xl h-full">
            <h4 class="font-semibold mb-2">Enfoque en trauma, regulación emocional y desarrollo de la personalidad.</h4>
            <p class="text-sm"></p>
          </div>
        </div>
        <div class="rounded-2xl overflow-hidden formacion-card" style="padding: 1px; background: linear-gradient(180deg, rgba(171, 39, 122, 0.48) 0%, rgba(3, 13, 85, 0.48) 61%);">
          <div class="bg-white p-4 rounded-2xl h-full">
            <h4 class="font-semibold mb-2">Especialización en trastornos disociativos y casos complejos con Dolores Mosquera</h4>
            <p class="text-sm"></p>
          </div>
        </div>
        <div class="rounded-2xl overflow-hidden formacion-card" style="padding: 1px; background: linear-gradient(180deg, rgba(171, 39, 122, 0.48) 0%, rgba(3, 13, 85, 0.48) 61%);">
          <div class="bg-white p-4 rounded-2xl h-full">
            <h4 class="font-semibold mb-2">Diplomado en Gerontología.</h4>
            <p class="text-sm"></p>
          </div>
        </div>
        <div class="rounded-2xl overflow-hidden formacion-card" style="padding: 1px; background: linear-gradient(180deg, rgba(171, 39, 122, 0.48) 0%, rgba(3, 13, 85, 0.48) 61%);">
          <div class="bg-white p-4 rounded-2xl h-full">
            <h4 class="font-semibold mb-2">Postitulo en Hipnosis Clínica Ericksoniana.</h4>
            <p class="text-sm"></p>
          </div>
        </div>
        <div class="rounded-2xl overflow-hidden formacion-card" style="padding: 1px; background: linear-gradient(180deg, rgba(171, 39, 122, 0.48) 0%, rgba(3, 13, 85, 0.48) 61%);">
          <div class="bg-white p-4 rounded-2xl h-full">
            <h4 class="font-semibold mb-2">Modelo PARCUVE (Apego, disociación y trauma, Dr. Manuel Hernández Pacheco).</h4>
            <p class="text-sm"></p>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Especialidades en Terapia EMDR -->
    <div class="mb-16 max-w-5xl mx-auto relative fade-up" data-delay="500">
      <h3 class="text-xl font-bold text-[#000000] mb-6 text-start font-paytone">Especialización en Terapia EMDR</h3>
      
      <div class="mt-10 relative">
        <!-- Línea vertical punteada para conectar los puntos -->
        <div class="hidden md:block absolute left-[9px] top-2 bottom-0 border-l-2 border-dashed border-[#AB277A] opacity-30" style="height: calc(100% - 20px);"></div>
        
        <ul class="space-y-6 relative z-10">
          <li class="flex items-start group hover:-translate-y-1 transition-all duration-300">
            <span class="flex-shrink-0 w-[20px] h-[20px] mt-1 mr-3 bg-[#AB277A] rounded-full shadow-md relative overflow-hidden transition-all duration-300 group-hover:shadow-[0_0_15px_rgba(171,39,122,0.7)] group-hover:scale-110">
              <span class="absolute inset-0 bg-white opacity-0 group-hover:opacity-30 group-hover:animate-pulse"></span>
            </span>
            <span>EMDR, Protocolo principal, para Desensibilización y Reprocesamiento por Movimientos Oculares, para las vivencias traumáticas, EMDR Institute USA, EMDRIA.</span>
          </li>
          <li class="flex items-start group hover:-translate-y-1 transition-all duration-300">
            <span class="flex-shrink-0 w-[20px] h-[20px] mt-1 mr-3 bg-[#AB277A] rounded-full shadow-md relative overflow-hidden transition-all duration-300 group-hover:shadow-[0_0_15px_rgba(171,39,122,0.7)] group-hover:scale-110">
              <span class="absolute inset-0 bg-white opacity-0 group-hover:opacity-30 group-hover:animate-pulse"></span>
            </span>
            <span>EMD, Protocolo simplicado, Desensibilización por Movimientos Oculares.</span>
          </li>
          <li class="flex items-start group hover:-translate-y-1 transition-all duration-300">
            <span class="flex-shrink-0 w-[20px] h-[20px] mt-1 mr-3 bg-[#AB277A] rounded-full shadow-md relative overflow-hidden transition-all duration-300 group-hover:shadow-[0_0_15px_rgba(171,39,122,0.7)] group-hover:scale-110">
              <span class="absolute inset-0 bg-white opacity-0 group-hover:opacity-30 group-hover:animate-pulse"></span>
            </span>
            <span>EMDR 2.0 (Optimización del proceso terapéutico con técnicas innovadoras creadas por Suzy Matthijssen y Ad De Jongh).</span>
          </li>
          <li class="flex items-start group hover:-translate-y-1 transition-all duration-300">
            <span class="flex-shrink-0 w-[20px] h-[20px] mt-1 mr-3 bg-[#AB277A] rounded-full shadow-md relative overflow-hidden transition-all duration-300 group-hover:shadow-[0_0_15px_rgba(171,39,122,0.7)] group-hover:scale-110">
              <span class="absolute inset-0 bg-white opacity-0 group-hover:opacity-30 group-hover:animate-pulse"></span>
            </span>
            <span>PESEA, Protocolo EMDR, para Estabilización en Síndrome de Estrés Agudo, por PhD. Ignacio Jarero.</span>
          </li>
          <li class="flex items-start group hover:-translate-y-1 transition-all duration-300">
            <span class="flex-shrink-0 w-[20px] h-[20px] mt-1 mr-3 bg-[#AB277A] rounded-full shadow-md relative overflow-hidden transition-all duration-300 group-hover:shadow-[0_0_15px_rgba(171,39,122,0.7)] group-hover:scale-110">
              <span class="absolute inset-0 bg-white opacity-0 group-hover:opacity-30 group-hover:animate-pulse"></span>
            </span>
            <span>PRECI, Protocolo de Terapia EMDR para Incidentes Críticos Recientes y Estrés Traumático Continuado, por PhD. Ignacio Jarero.</span>
          </li>
          <li class="flex items-start group hover:-translate-y-1 transition-all duration-300">
            <span class="flex-shrink-0 w-[20px] h-[20px] mt-1 mr-3 bg-[#AB277A] rounded-full shadow-md relative overflow-hidden transition-all duration-300 group-hover:shadow-[0_0_15px_rgba(171,39,122,0.7)] group-hover:scale-110">
              <span class="absolute inset-0 bg-white opacity-0 group-hover:opacity-30 group-hover:animate-pulse"></span>
            </span>
            <span>Protocolo Grupal, para intervenciones en situaciones de crisis o catástrofes, de PhD Ignacio Jarero.</span>
          </li>
          <li class="flex items-start group hover:-translate-y-1 transition-all duration-300">
            <span class="flex-shrink-0 w-[20px] h-[20px] mt-1 mr-3 bg-[#AB277A] rounded-full shadow-md relative overflow-hidden transition-all duration-300 group-hover:shadow-[0_0_15px_rgba(171,39,122,0.7)] group-hover:scale-110">
              <span class="absolute inset-0 bg-white opacity-0 group-hover:opacity-30 group-hover:animate-pulse"></span>
            </span>
            <span>GTEP – Protocolo Grupal e Integrativo con Terapia EMDR, por Elan Shapiro Brurit Laub.</span>
          </li>
          <li class="flex items-start group hover:-translate-y-1 transition-all duration-300">
            <span class="flex-shrink-0 w-[20px] h-[20px] mt-1 mr-3 bg-[#AB277A] rounded-full shadow-md relative overflow-hidden transition-all duration-300 group-hover:shadow-[0_0_15px_rgba(171,39,122,0.7)] group-hover:scale-110">
              <span class="absolute inset-0 bg-white opacity-0 group-hover:opacity-30 group-hover:animate-pulse"></span>
            </span>
            <span>R-TEP Protocolo avanzado para trauma complejo, por Elan Shapiro y Brurit Laub.</span>
          </li>
          <li class="flex items-start group hover:-translate-y-1 transition-all duration-300">
            <span class="flex-shrink-0 w-[20px] h-[20px] mt-1 mr-3 bg-[#AB277A] rounded-full shadow-md relative overflow-hidden transition-all duration-300 group-hover:shadow-[0_0_15px_rgba(171,39,122,0.7)] group-hover:scale-110">
              <span class="absolute inset-0 bg-white opacity-0 group-hover:opacity-30 group-hover:animate-pulse"></span>
            </span>
            <span>Formación avanzada en Disociación Traumática, por PhD. Suzatte Boon.</span>
          </li>
          <li class="flex items-start group hover:-translate-y-1 transition-all duration-300">
            <span class="flex-shrink-0 w-[20px] h-[20px] mt-1 mr-3 bg-[#AB277A] rounded-full shadow-md relative overflow-hidden transition-all duration-300 group-hover:shadow-[0_0_15px_rgba(171,39,122,0.7)] group-hover:scale-110">
              <span class="absolute inset-0 bg-white opacity-0 group-hover:opacity-30 group-hover:animate-pulse"></span>
            </span>
            <span>Formación avanzada en el Tratamiento del Trauma Complejo, por Deany Laliotis, LICSW.</span>
          </li>
          <li class="flex items-start group hover:-translate-y-1 transition-all duration-300">
            <span class="flex-shrink-0 w-[20px] h-[20px] mt-1 mr-3 bg-[#AB277A] rounded-full shadow-md relative overflow-hidden transition-all duration-300 group-hover:shadow-[0_0_15px_rgba(171,39,122,0.7)] group-hover:scale-110">
              <span class="absolute inset-0 bg-white opacity-0 group-hover:opacity-30 group-hover:animate-pulse"></span>
            </span>
            <span>Formación avanzada en Trastornos de Trauma Complejo y Disociación, por Phd. Onno van der Hart y Phd. Roger Solomon, EMDR Europe.</span>
          </li>
          <li class="flex items-start group hover:-translate-y-1 transition-all duration-300">
            <span class="flex-shrink-0 w-[20px] h-[20px] mt-1 mr-3 bg-[#AB277A] rounded-full shadow-md relative overflow-hidden transition-all duration-300 group-hover:shadow-[0_0_15px_rgba(171,39,122,0.7)] group-hover:scale-110">
              <span class="absolute inset-0 bg-white opacity-0 group-hover:opacity-30 group-hover:animate-pulse"></span>
            </span>
            <span>Formación avanzada en EMDR para Víctimas de Violencia de Género, por Ps. Dolores Mosquera, EMDR Chile, EMDRLAC.</span>
          </li>
          <li class="flex items-start group hover:-translate-y-1 transition-all duration-300">
            <span class="flex-shrink-0 w-[20px] h-[20px] mt-1 mr-3 bg-[#AB277A] rounded-full shadow-md relative overflow-hidden transition-all duration-300 group-hover:shadow-[0_0_15px_rgba(171,39,122,0.7)] group-hover:scale-110">
              <span class="absolute inset-0 bg-white opacity-0 group-hover:opacity-30 group-hover:animate-pulse"></span>
            </span>
            <span>Formación avanzada en abuso sexual en terapia EMDR, Ps Arun Mansukhani.</span>
          </li>
          <li class="flex items-start group hover:-translate-y-1 transition-all duration-300">
            <span class="flex-shrink-0 w-[20px] h-[20px] mt-1 mr-3 bg-[#AB277A] rounded-full shadow-md relative overflow-hidden transition-all duration-300 group-hover:shadow-[0_0_15px_rgba(171,39,122,0.7)] group-hover:scale-110">
              <span class="absolute inset-0 bg-white opacity-0 group-hover:opacity-30 group-hover:animate-pulse"></span>
            </span>
            <span>Protocolo en Trastornos Somáticos en Terapia EMDR, Ps. Silvia Grauvy, EMDR Argentina.</span>
          </li>
          <li class="flex items-start group hover:-translate-y-1 transition-all duration-300">
            <span class="flex-shrink-0 w-[20px] h-[20px] mt-1 mr-3 bg-[#AB277A] rounded-full shadow-md relative overflow-hidden transition-all duration-300 group-hover:shadow-[0_0_15px_rgba(171,39,122,0.7)] group-hover:scale-110">
              <span class="absolute inset-0 bg-white opacity-0 group-hover:opacity-30 group-hover:animate-pulse"></span>
            </span>
            <span>Flash, Protocolo en intervención temprana, EMDR por PhD. Esly Regina Carvalho.</span>
          </li>
          <li class="flex items-start group hover:-translate-y-1 transition-all duration-300">
            <span class="flex-shrink-0 w-[20px] h-[20px] mt-1 mr-3 bg-[#AB277A] rounded-full shadow-md relative overflow-hidden transition-all duration-300 group-hover:shadow-[0_0_15px_rgba(171,39,122,0.7)] group-hover:scale-110">
              <span class="absolute inset-0 bg-white opacity-0 group-hover:opacity-30 group-hover:animate-pulse"></span>
            </span>
            <span>Formación avanzada en Estrategias para Trastornos Somáticos, por Ps. Santiago Jácome, EMDR Iberoamérica.</span>
          </li>
          <li class="flex items-start group hover:-translate-y-1 transition-all duration-300">
            <span class="flex-shrink-0 w-[20px] h-[20px] mt-1 mr-3 bg-[#AB277A] rounded-full shadow-md relative overflow-hidden transition-all duration-300 group-hover:shadow-[0_0_15px_rgba(171,39,122,0.7)] group-hover:scale-110">
              <span class="absolute inset-0 bg-white opacity-0 group-hover:opacity-30 group-hover:animate-pulse"></span>
            </span>
            <span>Written Exposure Therapy for PTSD, PhD. Debra Kaysen.</span>
          </li>
          <li class="flex items-start group hover:-translate-y-1 transition-all duration-300">
            <span class="flex-shrink-0 w-[20px] h-[20px] mt-1 mr-3 bg-[#AB277A] rounded-full shadow-md relative overflow-hidden transition-all duration-300 group-hover:shadow-[0_0_15px_rgba(171,39,122,0.7)] group-hover:scale-110">
              <span class="absolute inset-0 bg-white opacity-0 group-hover:opacity-30 group-hover:animate-pulse"></span>
            </span>
            <span>Formación avanzada en el Trastorno Somático con Terapia EMDR, por Ps. Natalia Seijo.</span>
          </li>
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
      <h3 class="text-4xl font-bold text-[#030D55] mb-15 text-center fade-up font-paytone" data-delay="200">Testimonios de quienes transformaron su vida</h3>
      
      <div class="flex flex-col md:flex-row gap-16 items-center max-w-6xl mx-auto testimonial-section">
        <!-- Texto del testimonio a la izquierda -->
        <div class="md:w-4/8 testimonial-text fade-up" data-delay="300">
          <h4 class="text-center text-2xl font-extrabold text-[#AB277A] mb-4 font-paytone">Lorena</h4>
          <p class="text-base leading-7" style="font-family: 'Roboto', sans-serif;">"Después de años en terapias largas y sin resultados, la terapia con Julio César fue un antes y un después para mí. En pocas sesiones vi cambios concretos, sin revivir traumas. Sentí que forjé mucho de mi interior y que, por fin, tenía una alternativa real al sufrimiento."</p>
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
      
      // Adjust spacing for mobile
      function adjustMobileSpacing() {
        if (window.innerWidth <= 768) {
          // Fix additional spacing issues
          const testimonialContainer = document.querySelector('.testimonial-container');
          if (testimonialContainer) {
            testimonialContainer.style.paddingTop = '1rem';
            testimonialContainer.style.paddingBottom = '1rem';
          }
          
          // Adjust hero container spacing
          const heroContainer = document.querySelector('.hero-container');
          if (heroContainer) {
            heroContainer.style.paddingTop = '0.5rem';
            heroContainer.style.paddingBottom = '0.5rem';
          }
          
          // Fix margin bottom for description sections
          document.querySelectorAll('.mb-16').forEach(el => {
            el.style.marginBottom = '1rem';
          });
          
          // Adjust credentials list spacing
          const credentialsList = document.querySelector('.list-none.space-y-1');
          if (credentialsList) {
            credentialsList.style.marginTop = '0.5rem';
          }
          
          // Better center social icons on mobile
          const socialIconsContainer = document.querySelector('.social-icons-container');
          if (socialIconsContainer) {
            socialIconsContainer.style.justifyContent = 'center';
            socialIconsContainer.style.gap = '1.5rem';
            
            // Make icons larger
            const socialIcons = document.querySelectorAll('.social-icon svg');
            socialIcons.forEach(icon => {
              icon.style.width = '30px';
              icon.style.height = '30px';
            });
          }
        }
      }
      
      // Run initially and on resize
      adjustMobileSpacing();
      window.addEventListener('resize', adjustMobileSpacing);
      
      // Cargar videos de YouTube
      const testimonialVideoContainer = document.getElementById('testimonial-video-container');
      if (testimonialVideoContainer) {
        const iframe = document.createElement('iframe');
        iframe.setAttribute('src', 'https://www.youtube.com/embed/Ft3oIUaRA5g');
        iframe.setAttribute('title', 'Testimonio de Lorena');
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

  <script>
    // Carga segura del iframe de YouTube para evitar problemas de scroll en móvil
    document.addEventListener('DOMContentLoaded', function() {
      const videoContainer = document.getElementById('main-video-container');
      const iframe = document.createElement('iframe');
      iframe.setAttribute('src', 'https://www.youtube.com/embed/t_SvFfMMRzo');
      iframe.setAttribute('title', 'Presentación {{ $nombre }}');
      iframe.setAttribute('frameborder', '0');
      iframe.setAttribute('allow', 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture');
      iframe.setAttribute('allowfullscreen', '');
      iframe.classList.add('w-full', 'h-full');
      iframe.style.position = 'absolute';
      iframe.style.top = '0';
      iframe.style.left = '0';
      videoContainer.appendChild(iframe);
    });
  </script>
@endsection
