<!doctype html>
<html @php(language_attributes())>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <!-- AOS CSS para animaciones -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    @php(do_action('get_header'))
    @php(wp_head())

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Estilos base -->
    <style>
      body {
        font-family: 'Roboto', sans-serif;
      }
    </style>
  </head>

  <body @php(body_class('overflow-x-hidden'))>
    @php(wp_body_open())
    @php(do_action('get_header'))

    <div id="app" class="relative">
      <a class="sr-only focus:not-sr-only" href="#main">
        {{ __('Skip to content', 'sage') }}
      </a>

      @include('sections.header')

      <main id="main" class="main">
        @yield('content')
      </main>

      @hasSection('sidebar')
        <aside class="sidebar">
          @yield('sidebar')
        </aside>
      @endif

      @include('sections.footer')
    </div>

    @php(do_action('get_footer'))
    @php(wp_footer())
    
    <!-- AOS JS para animaciones -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        AOS.init({
          offset: 120,
          duration: 800,
          easing: 'ease-out',
          delay: 100,
          once: true
        });
      });
    </script>
    
    <!-- Estilos para animaciones hover -->
    <style>
      /* Tarjetas de Testimonios - Elevación y sombra */
      .testimonial-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
      }
      .testimonial-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(171, 39, 122, 0.1);
      }
      
      /* Imágenes decorativas - Efecto de pulso suave */
      .decorative-image {
        transition: transform 0.5s ease;
      }
      .decorative-image:hover {
        animation: pulse 1.5s infinite alternate;
      }
      @keyframes pulse {
        0% { transform: scale(1); }
        100% { transform: scale(1.05); }
      }
      
      /* Elementos FAQ - Efecto de brillo en el borde */
      .faq-item {
        transition: border 0.3s ease, box-shadow 0.3s ease;
      }
      .faq-item:hover {
        border-image-source: linear-gradient(90deg, #FF3382, #5A0989);
        box-shadow: 0 0 15px rgba(171, 39, 122, 0.15);
      }
      
      /* Imágenes de Perfil - Zoom controlado */
      .profile-image-container {
        overflow: hidden;
      }
      .profile-image {
        transition: transform 0.5s ease;
      }
      .profile-image-container:hover .profile-image {
        transform: scale(1.05);
      }
      
      /* Botones de servicio - Efecto brillante en hover */
      .service-button {
        position: relative;
        overflow: hidden;
      }
      .service-button:hover::after {
        transform: rotate(30deg) translate(20%, -10%);
        opacity: 1;
      }
      
      /* Tarjetas de servicio - Intensificación de color */
      .service-card {
        transition: all 0.4s ease;
      }
      .service-card:hover {
        box-shadow: 0 15px 30px rgba(171, 39, 122, 0.2);
      }
      .service-card:hover img {
        transform: scale(1.05);
        transition: transform 0.6s ease;
      }
      
      /* Imágenes con forma orgánica - Rotación leve */
      .organic-image-container {
        transition: transform 0.5s ease;
      }
      .organic-image-container:hover {
        transform: rotate(2deg) scale(1.02);
      }
    </style>
  </body>
</html>
