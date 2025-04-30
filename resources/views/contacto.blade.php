{{--
  Template Name: Contacto
--}}

@extends('layouts.app')

@section('content')
  <!-- Hero Section con fondo blanco y figura morada alrededor de la foto -->
  <section class="relative bg-white overflow-x-hidden">
    <!-- Contenido del hero -->
    <div class="container mx-auto px-4 py-12 lg:py-28 relative z-10">
      <div class="flex flex-col lg:flex-row items-center">
        <!-- Columna de texto -->
        <div class="lg:w-1/2 mb-8 lg:mb-12" data-aos="fade-right" data-aos-duration="600">
          <span class="text-[#AB277A] text-sm md:text-base uppercase tracking-wider font-medium mb-2 block">Contacto</span>
          <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-[#030D55] mb-4 md:mb-8 leading-none transition-all duration-500 hover:text-[#AB277A] font-paytone" style="line-height: 1.1;">
            Contáctanos y te<br>ayudamos en tu<br>proceso de sanación
          </h1>
          <p class="text-2xl md:text-4xl text-[#AB277A] transition-all duration-300 hover:translate-x-2" style="font-family: 'Hugamour', sans-serif;">
            #El trauma se puede superar
          </p>
        </div>
        
        <!-- Imagen a la derecha con fondo morado -->
        <div class="lg:w-1/2 flex justify-center lg:justify-end relative" data-aos="fade-left" data-aos-duration="600">
          <!-- Fondo morado orgánico que rodea la imagen con medidas precisas -->
          <div class="absolute inset-0 z-0 transition-transform duration-700 hover:scale-105">
            <svg width="586.48px" height="565.73px" viewBox="0 0 586.48 565.73" fill="none" xmlns="http://www.w3.org/2000/svg" style="position: absolute; top: 0; left: 0;">
              <path d="M140,60 C100,110 20,180 40,280 C60,380 120,420 180,460 C240,500 300,540 400,500 C500,460 580,380 560,280 C540,200 500,160 440,100 C380,40 300,20 220,20 C180,20 180,10 140,60 Z" fill="#8961C4"/>
            </svg>
          </div>
          
          <!-- Elementos gráficos de fondo -->
          <div class="absolute w-16 h-16 rounded-full bg-[#9978d1] opacity-40 top-10 left-5 z-0 animate-pulse"></div>
          <div class="absolute w-12 h-12 rounded-full bg-[#9978d1] opacity-30 bottom-10 right-10 z-0 animate-pulse" style="animation-delay: 1s;"></div>
          <!-- Líneas decorativas -->
          <div class="absolute h-[40%] w-px bg-white opacity-20 top-10 left-1/3 z-0"></div>
          <div class="absolute h-px w-[20%] bg-white opacity-20 top-1/3 right-20 z-0"></div>
          
          <!-- Imagen actual -->
          <img 
            src="{{ get_theme_file_uri('resources/images/contacto.png') }}" 
            alt="Contacto" 
            class="max-w-full h-auto rounded-lg relative z-10 transition-transform duration-500 hover:scale-105"
            style="max-width: 580px; position: relative;"
          >
        </div>
      </div>
    </div>
  </section>

  <!-- Contact Section -->
  <section class="py-8 md:py-12 bg-white relative overflow-x-hidden">
    <div class="container mx-auto px-4 relative">
      <!-- Section title -->
      <h2 class="text-2xl md:text-4xl lg:text-5xl font-bold text-[#030D55] mb-6 md:mb-16 text-center transition-all duration-500 hover:text-[#AB277A] font-paytone">
          Contáctanos
      </h2>
      
      <!-- Toggle Switch -->
      <div class="flex justify-center items-center mb-8">
        <div class="bg-gray-200 rounded-full p-1 flex w-max mx-auto">
          <button id="toggle-charlas" class="py-2 px-6 rounded-full bg-[#AB277A] text-white font-medium transition-all duration-300">
            Para charlas y talleres
          </button>
          <button id="toggle-psicologica" class="py-2 px-6 rounded-full text-gray-700 font-medium transition-all duration-300">
            Para atención psicológica
          </button>
        </div>
      </div>
      
      <!-- Contact Container - Charlas y Talleres -->
      <div id="contact-charlas" class="flex flex-col md:flex-row items-center md:items-start justify-center gap-6 md:gap-12 lg:gap-16 max-w-6xl mx-auto">
        <!-- Left Image -->
        <div class="relative w-full max-w-[375px]" data-aos="fade-right" data-aos-duration="600">
          <div class="transition-all duration-500 hover:scale-105 hover:shadow-xl">
            <img 
              src="{{ get_theme_file_uri('resources/images/contacto2.jpg') }}" 
              alt="Psicólogos Instituto Kintsugi" 
              class="w-full h-[458px] object-cover rounded-[16px]"
              style="box-shadow: 0px 4px 16px 0px #AB277A;"
            >
          </div>
        </div>
        
        <!-- Right Form - Contact Form 7 -->
        <div class="w-full max-w-[600px]" data-aos="fade-left" data-aos-duration="600">
          <div class="text-center mb-6">
            <p class="text-lg text-gray-700 font-medium">Para charlas y talleres</p>
            <p class="text-gray-600">Completa el formulario o envianos un mail a: <a href="mailto:hola@ikintsugi.cl" class="text-[#D93280] hover:underline hover:text-[#AB277A] transition-all duration-300">hola@ikintsugi.cl</a></p>
          </div>
          
          <div class="contact-form-container transition-all duration-300 hover:shadow-lg p-5 rounded-lg">
            @php
            // Asegúrate de reemplazar '123' con el ID real de tu formulario
            echo do_shortcode('[contact-form-7 id="7942127" title="Contact form (style 4) (Traducido a español)"]');
            @endphp
          </div>
        </div>
      </div>
      
      <!-- Contact Container - Atención Psicológica (hidden by default) -->
      <div id="contact-psicologica" class="hidden flex-col md:flex-row items-center justify-center gap-6 md:gap-12 lg:gap-16 max-w-6xl mx-auto">
        <!-- Left Image - Same as in charlas section -->
        <div class="relative w-full max-w-[375px]" data-aos="fade-right" data-aos-duration="600">
          <div class="transition-all duration-500 hover:scale-105 hover:shadow-xl">
            <img 
              src="{{ get_theme_file_uri('resources/images/contacto2.jpg') }}" 
              alt="Psicólogos Instituto Kintsugi" 
              class="w-full h-[458px] object-cover rounded-[16px]"
              style="box-shadow: 0px 4px 16px 0px #AB277A;"
            >
          </div>
        </div>
        
        <!-- Right Content - WhatsApp -->
        <div class="text-center w-full max-w-[600px]" data-aos="fade-left" data-aos-duration="600">
          <div class="bg-white rounded-[16px] p-8 shadow-lg transition-all duration-500 hover:shadow-xl">
            <h3 class="text-2xl font-bold text-[#030D55] mb-4">Para atención psicológica</h3>
            <p class="text-lg mb-6">Reserva en el WhatsApp</p>
            
            <!-- WhatsApp Content -->
            <div class="whatsapp-content py-4 bg-[#25D366]/10 rounded-xl p-4">
              <div class="bg-white rounded-lg shadow-sm p-4 mb-4">
                <div class="flex items-center mb-2">
                  <div class="bg-[#25D366] rounded-full p-2 mr-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                    </svg>
                  </div>
                  <h4 class="text-lg font-semibold">Consultas y Reservas de Horas</h4>
                </div>
                <p class="text-gray-600 text-left">¡Hola! Haga clic en uno de nuestros profesionales a continuación para chatear en WhatsApp</p>
              </div>
              
              <p class="text-gray-500 text-sm mb-2">El equipo suele responder en unos minutos.</p>
              
              <!-- Profesionales -->
              <div class="space-y-3">
                <!-- Profesional 1 -->
                <div class="flex items-center justify-between bg-white rounded-lg p-3 shadow-sm hover:shadow-md transition-all duration-300">
                  <div class="flex items-center">
                    <img src="{{ get_theme_file_uri('resources/images/julio.enc') }}" alt="Julio César" class="w-12 h-12 rounded-full mr-3 object-cover">
                    <div class="text-left">
                      <h5 class="font-semibold">Julio César</h5>
                      <p class="text-sm text-gray-600">Psicólogo Clínico</p>
                    </div>
                  </div>
                  <a href="https://wa.me/56937166362" target="_blank" class="bg-[#25D366] p-2 rounded-full text-white hover:bg-[#20b956] transition-all duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                    </svg>
                  </a>
                </div>
                
                <!-- Profesional 2 -->
                <div class="flex items-center justify-between bg-white rounded-lg p-3 shadow-sm hover:shadow-md transition-all duration-300">
                  <div class="flex items-center">
                    <img src="{{ get_theme_file_uri('resources/images/shen.jpg') }}" alt="Shénhui Lin" class="w-12 h-12 rounded-full mr-3 object-cover">
                    <div class="text-left">
                      <h5 class="font-semibold">Shénhui Lín</h5>
                      <p class="text-sm text-gray-600">Psicóloga Clínica</p>
                    </div>
                  </div>
                  <a href="https://wa.me/56956345078" target="_blank" class="bg-[#25D366] p-2 rounded-full text-white hover:bg-[#20b956] transition-all duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                    </svg>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <style>
      /* Estilo para Contact Form 7 */
      .contact-form-container {
        transition: all 0.3s ease;
      }
      
      .contact-form-container .wpcf7-form {
        display: flex;
        flex-direction: column;
        gap: 1rem;
      }
      
      .contact-form-container .wpcf7-form p {
        margin: 0;
      }
      
      .contact-form-container .wpcf7-form .nombre-apellido {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1rem;
      }
      
      .contact-form-container input[type="text"],
      .contact-form-container input[type="email"],
	  .contact-form-container input[type="tel"],
      .contact-form-container textarea {
        width: 100%;
        padding: 0.75rem 1rem;
        border: 1px solid #e2e8f0;
        border-radius: 0.375rem;
        transition: all 0.3s;
      }
      
      .contact-form-container input[type="text"]:focus,
      .contact-form-container input[type="email"]:focus,
	  .contact-form-container input[type="tel"]:focus,
      .contact-form-container textarea:focus {
        outline: none;
        border-color: transparent;
        box-shadow: 0 0 0 2px #AB277A;
        transform: translateY(-2px);
      }
      
      .contact-form-container input[type="submit"] {
        background-image: linear-gradient(to right, #D93280, #AB277A);
        color: white;
        padding: 0.75rem 2.5rem;
        border: none;
        border-radius: 9999px;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s;
        display: block;
        margin: 1rem auto 0;
        min-width: 150px;
      }
      
      .contact-form-container input[type="submit"]:hover {
        transform: scale(1.05) translateY(-3px);
        box-shadow: 0 4px 12px -1px rgba(171, 39, 122, 0.4), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
      }
      
      .contact-form-container .wpcf7-response-output {
        margin-top: 1rem;
        padding: 0.75rem 1rem;
        border-radius: 0.375rem;
        text-align: center;
        transition: all 0.3s;
      }
    </style>
    
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        const toggleCharlas = document.getElementById('toggle-charlas');
        const togglePsicologica = document.getElementById('toggle-psicologica');
        const contactCharlas = document.getElementById('contact-charlas');
        const contactPsicologica = document.getElementById('contact-psicologica');
        
        // Remove any existing background classes and set initial state
        function updateToggleStyles() {
          // Setup charlas toggle (active by default)
          toggleCharlas.classList.remove('bg-transparent');
          toggleCharlas.classList.add('bg-[#AB277A]');
          toggleCharlas.classList.add('text-white');
          toggleCharlas.classList.remove('text-gray-700');
          
          // Setup psicologica toggle (inactive by default)
          togglePsicologica.classList.remove('bg-[#AB277A]');
          togglePsicologica.classList.add('bg-transparent');
          togglePsicologica.classList.remove('text-white');
          togglePsicologica.classList.add('text-gray-700');
        }
        
        // Set initial styles
        updateToggleStyles();
        
        toggleCharlas.addEventListener('click', function() {
          // Update toggle button styles
          toggleCharlas.classList.add('bg-[#AB277A]', 'text-white');
          toggleCharlas.classList.remove('bg-transparent', 'text-gray-700');
          
          togglePsicologica.classList.remove('bg-[#AB277A]', 'text-white');
          togglePsicologica.classList.add('bg-transparent', 'text-gray-700');
          
          // Toggle content
          contactCharlas.classList.remove('hidden');
          contactCharlas.classList.add('flex');
          contactPsicologica.classList.add('hidden');
          contactPsicologica.classList.remove('flex');
        });
        
        togglePsicologica.addEventListener('click', function() {
          // Update toggle button styles
          togglePsicologica.classList.add('bg-[#AB277A]', 'text-white');
          togglePsicologica.classList.remove('bg-transparent', 'text-gray-700');
          
          toggleCharlas.classList.remove('bg-[#AB277A]', 'text-white');
          toggleCharlas.classList.add('bg-transparent', 'text-gray-700');
          
          // Toggle content
          contactPsicologica.classList.remove('hidden');
          contactPsicologica.classList.add('flex');
          contactCharlas.classList.add('hidden');
          contactCharlas.classList.remove('flex');
        });
      });
    </script>
</section>
@endsection
