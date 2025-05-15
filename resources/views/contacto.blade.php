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
          
          <!-- Iconos de redes sociales -->
          <div class="flex items-center gap-3 mt-5">
            <p class="text-sm md:text-base text-[#AB277A] font-medium">Síguenos:</p>
            <div class="flex gap-4">
              <a href="https://www.instagram.com/instituto_kintsugi/" target="_blank" class="text-[#AB277A] hover:text-[#030D55] transition-all duration-300 transform hover:scale-110">
                <svg class="h-6 w-6 md:h-7 md:w-7" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                  <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/>
                </svg>
              </a>
              <a href="https://www.facebook.com/Ikintsugi/" target="_blank" class="text-[#AB277A] hover:text-[#030D55] transition-all duration-300 transform hover:scale-110">
                <svg class="h-6 w-6 md:h-7 md:w-7" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                  <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd"></path>
                </svg>
              </a>
              <a href="https://www.youtube.com/@emisorkintsugi" target="_blank" class="text-[#AB277A] hover:text-[#030D55] transition-all duration-300 transform hover:scale-110">
                <svg class="h-6 w-6 md:h-7 md:w-7" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                  <path fill-rule="evenodd" d="M19.812 5.418c.861.23 1.538.907 1.768 1.768C21.998 8.746 22 12 22 12s0 3.255-.418 4.814a2.504 2.504 0 0 1-1.768 1.768c-1.56.419-7.814.419-7.814.419s-6.255 0-7.814-.419a2.505 2.505 0 0 1-1.768-1.768C2 15.255 2 12 2 12s0-3.255.417-4.814a2.507 2.507 0 0 1 1.768-1.768C5.744 5 11.998 5 11.998 5s6.255 0 7.814.418ZM15.194 12 10 15V9l5.194 3Z" clip-rule="evenodd" />
                </svg>
              </a>
              <a href="https://open.spotify.com/show/08J06mjqK1UxNgXPTVlMkJ?nd=1&dlsi=74d83d61fb964b4a" target="_blank" class="text-[#AB277A] hover:text-[#030D55] transition-all duration-300 transform hover:scale-110">
                <svg class="h-6 w-6 md:h-7 md:w-7" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                  <path d="M12 0C5.4 0 0 5.4 0 12s5.4 12 12 12 12-5.4 12-12S18.66 0 12 0zm5.521 17.34c-.24.359-.66.48-1.021.24-2.82-1.74-6.36-2.101-10.561-1.141-.418.122-.779-.179-.899-.539-.12-.421.18-.78.54-.9 4.56-1.021 8.52-.6 11.64 1.32.42.18.479.659.301 1.02zm1.44-3.3c-.301.42-.841.6-1.262.3-3.239-1.98-8.159-2.58-11.939-1.38-.479.12-1.02-.12-1.14-.6-.12-.48.12-1.021.6-1.141C9.6 9.9 15 10.561 18.72 12.84c.361.181.54.78.241 1.2zm.12-3.36C15.24 8.4 8.82 8.16 5.16 9.301c-.6.179-1.2-.181-1.38-.721-.18-.601.18-1.2.72-1.381 4.26-1.26 11.28-1.02 15.721 1.621.539.3.719 1.02.419 1.56-.299.421-1.02.599-1.559.3z"/>
                </svg>
              </a>
            </div>
          </div>
        </div>
        
        <!-- Imagen a la derecha con fondo morado -->
        <div class="lg:w-1/2 flex justify-center lg:justify-end relative lg:mt-10" data-aos="fade-left" data-aos-duration="600">
          <div class="relative w-full max-w-[800px] mx-auto">
            <div class="relative">
              <!-- Imagen actual -->
              <img 
                src="{{ get_theme_file_uri('resources/images/heros/contacto.png') }}" 
                alt="Contacto" 
                class="relative z-10 w-full h-auto transition-transform duration-500 hover:scale-105"
              >
            </div>
          </div>
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
          <button id="toggle-charlas" class="py-2 px-6 rounded-full bg-transparent text-gray-700 font-medium transition-all duration-300">
            Para charlas y talleres
          </button>
          <button id="toggle-psicologica" class="py-2 px-6 rounded-full bg-[#AB277A] text-white font-medium transition-all duration-300">
            Para atención psicológica
          </button>
        </div>
      </div>
      
      <!-- Contact Container - Charlas y Talleres (oculto por defecto) -->
      <div id="contact-charlas" class="hidden flex-col md:flex-row items-center md:items-start justify-center gap-6 md:gap-12 lg:gap-16 max-w-6xl mx-auto">
        <!-- Left Image -->
        <div class="relative w-full max-w-[375px]" data-aos="fade-right" data-aos-duration="600">
          <div class="transition-all duration-500 hover:scale-105 hover:shadow-xl">
            <img 
              src="{{ get_theme_file_uri('resources/images/contacto2.jpg') }}" 
              alt="Psicólogos Instituto Kintsugi" 
              class="w-full h-auto md:h-[458px] object-cover rounded-[16px]"
              style="box-shadow: 0px 4px 16px 0px #AB277A;"
            >
          </div>
        </div>
        
        <!-- Right Form - Contact Form 7 -->
        <div class="w-full max-w-[600px]" data-aos="fade-left" data-aos-duration="600">
          <div class="text-center mb-6">
            <p class="text-lg text-gray-700 font-medium">Para charlas y talleres</p>
            <p class="text-gray-600">
              Completa el formulario o envíanos un mail a: 
              <a href="mailto:hola@ikintsugi.cl" class="text-[#D93280] hover:underline hover:text-[#AB277A] transition-all duration-300">
                hola@ikintsugi.cl
              </a>
            </p>
          </div>
          
          <div class="contact-form-container transition-all duration-300 hover:shadow-lg p-5 rounded-lg">
            @php
              echo do_shortcode('[contact-form-7 id="7942127" title="Contact form (style 4) (Traducido a español)"]');
            @endphp
          </div>
        </div>
      </div>
      
      <!-- Contact Container - Atención Psicológica (visible por defecto) -->
      <div id="contact-psicologica" class="flex flex-col md:flex-row items-center justify-center gap-6 md:gap-12 lg:gap-16 max-w-6xl mx-auto">
        <!-- Left Image -->
        <div class="relative w-full max-w-[375px]" data-aos="fade-right" data-aos-duration="600">
          <div class="transition-all duration-500 hover:scale-105 hover:shadow-xl">
            <img 
              src="{{ get_theme_file_uri('resources/images/contacto2.jpg') }}" 
              alt="Psicólogos Instituto Kintsugi" 
              class="w-full h-auto md:h-[458px] object-cover rounded-[16px]"
              style="box-shadow: 0px 4px 16px 0px #AB277A;"
            >
          </div>
        </div>
        
        <!-- Right Content - WhatsApp -->
        <div class="text-center w-full max-w-[600px]" data-aos="fade-left" data-aos-duration="600">
          <div class="bg-white rounded-[16px] p-8 shadow-lg transition-all duration-500 hover:shadow-xl">
            <h3 class="text-2xl font-bold text-[#030D55] mb-4">Para atención psicológica</h3>
            <p class="text-lg mb-6">Reserva en el WhatsApp</p>
            
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
					  <div class="w-16 h-16 overflow-hidden mr-3">
						<img 
						  src="{{ get_theme_file_uri('resources/images/juliomini.png') }}" 
						  alt="Julio César" 
						  class="w-full h-full object-cover rounded-full transition-all duration-500 hover:scale-110"
						>
					  </div>
					  <div class="text-left">
						<h5 class="font-semibold text-[#030D55]">Julio César</h5>
						<p class="text-sm text-gray-600">Psicólogo Clínico</p>
					  </div>
					</div>
					<a 
					  href="https://wa.me/56937166362" 
					  target="_blank" 
					  class="bg-[#25D366] p-2.5 rounded-full text-white hover:bg-[#20b956] transition-all duration-300 shadow-md hover:shadow-lg hover:scale-110"
					>
					  <svg 
						xmlns="http://www.w3.org/2000/svg" 
						width="20" 
						height="20" 
						viewBox="0 0 24 24" 
						fill="none" 
						stroke="white" 
						stroke-width="2" 
						stroke-linecap="round" 
						stroke-linejoin="round"
					  >
						<path d="M22 16.92v3a2 2 0 0 1-2.18 2 
						  19.79 19.79 0 0 1-8.63-3.07 
						  19.5 19.5 0 0 1-6-6 
						  19.79 19.79 0 0 1-3.07-8.67 
						  A2 2 0 0 1 4.11 2h3 
						  a2 2 0 0 1 2 1.72 
						  12.84 12.84 0 0 0 .7 2.81 
						  2 2 0 0 1-.45 2.11L8.09 9.91 
						  a16 16 0 0 0 6 6l1.27-1.27 
						  a2 2 0 0 1 2.11-.45 
						  12.84 12.84 0 0 0 2.81.7 
						  A2 2 0 0 1 22 16.92z"/>
					  </svg>
					</a>
				  </div>
				  <!-- Profesional 2 -->
				  <div class="flex items-center justify-between bg-white rounded-lg p-3 shadow-sm hover:shadow-md transition-all duration-300">
					<div class="flex items-center">
					  <div class="w-16 h-16 overflow-hidden mr-3">
						<img 
						  src="{{ get_theme_file_uri('resources/images/shenmini.png') }}" 
						  alt="Shénhui Lin" 
						  class="w-full h-full object-cover rounded-full transition-all duration-500 hover:scale-110"
						>
					  </div>
					  <div class="text-left">
						<h5 class="font-semibold text-[#030D55]">Shénhui Lín</h5>
						<p class="text-sm text-gray-600">Psicóloga Clínica</p>
					  </div>
					</div>
					<a 
					  href="https://wa.me/56956345078" 
					  target="_blank" 
					  class="bg-[#25D366] p-2.5 rounded-full text-white hover:bg-[#20b956] transition-all duration-300 shadow-md hover:shadow-lg hover:scale-110"
					>
					  <svg 
						xmlns="http://www.w3.org/2000/svg" 
						width="20" 
						height="20" 
						viewBox="0 0 24 24" 
						fill="none" 
						stroke="white" 
						stroke-width="2" 
						stroke-linecap="round" 
						stroke-linejoin="round"
					  >
						<path d="M22 16.92v3a2 2 0 0 1-2.18 2 
						  19.79 19.79 0 0 1-8.63-3.07 
						  19.5 19.5 0 0 1-6-6 
						  19.79 19.79 0 0 1-3.07-8.67 
						  A2 2 0 0 1 4.11 2h3 
						  a2 2 0 0 1 2 1.72 
						  12.84 12.84 0 0 0 .7 2.81 
						  2 2 0 0 1-.45 2.11L8.09 9.91 
						  a16 16 0 0 0 6 6l1.27-1.27 
						  a2 2 0 0 1 2.11-.45 
						  12.84 12.84 0 0 0 2.81.7 
						  A2 2 0 0 1 22 16.92z"/>
					  </svg>
					</a>
				  </div>
				</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <style>
    /* Estilo para Contact Form 7 */
    .contact-form-container { transition: all 0.3s ease; }
    .contact-form-container .wpcf7-form { display: flex; flex-direction: column; gap: 1rem; }
    .contact-form-container input, .contact-form-container textarea {
      width: 100%; padding: 0.75rem 1rem; border: 1px solid #e2e8f0; border-radius: 0.375rem; transition: all 0.3s;
    }
    .contact-form-container input:focus, .contact-form-container textarea:focus {
      outline: none; border-color: transparent; box-shadow: 0 0 0 2px #AB277A; transform: translateY(-2px);
    }
    .contact-form-container input[type="submit"] {
      background-image: linear-gradient(to right, #D93280, #AB277A); color: white; padding: 0.75rem 2.5rem;
      border: none; border-radius: 9999px; font-weight: 500; cursor: pointer; display: block; margin: 1rem auto 0; min-width: 150px;
      transition: all 0.3s;
    }
    .contact-form-container input[type="submit"]:hover {
      transform: scale(1.05) translateY(-3px);
      box-shadow: 0 4px 12px -1px rgba(171,39,122,0.4), 0 2px 4px -1px rgba(0,0,0,0.06);
    }
    .contact-form-container .wpcf7-response-output { margin-top: 1rem; padding: 0.75rem 1rem; border-radius: 0.375rem; text-align: center; }
  </style>
  
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const toggleCharlas = document.getElementById('toggle-charlas');
      const togglePsicologica = document.getElementById('toggle-psicologica');
      const contactCharlas = document.getElementById('contact-charlas');
      const contactPsicologica = document.getElementById('contact-psicologica');

      function updateToggleStyles() {
        // Charlas inactivo
        toggleCharlas.classList.remove('bg-[#AB277A]', 'text-white');
        toggleCharlas.classList.add('bg-transparent', 'text-gray-700');
        // Psicológica activo
        togglePsicologica.classList.remove('bg-transparent', 'text-gray-700');
        togglePsicologica.classList.add('bg-[#AB277A]', 'text-white');
        // Mostrar sección psicológica por defecto
        contactCharlas.classList.add('hidden');
        contactPsicologica.classList.remove('hidden');
        contactPsicologica.classList.add('flex');
      }

      updateToggleStyles();

      toggleCharlas.addEventListener('click', function() {
        toggleCharlas.classList.add('bg-[#AB277A]', 'text-white');
        toggleCharlas.classList.remove('bg-transparent', 'text-gray-700');
        togglePsicologica.classList.remove('bg-[#AB277A]', 'text-white');
        togglePsicologica.classList.add('bg-transparent', 'text-gray-700');
        contactCharlas.classList.remove('hidden');
        contactCharlas.classList.add('flex');
        contactPsicologica.classList.add('hidden');
        contactPsicologica.classList.remove('flex');
      });

      togglePsicologica.addEventListener('click', function() {
        updateToggleStyles();
      });
    });
  </script>
</section>
@endsection
