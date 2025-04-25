{{--
  Template Name: Contacto
--}}

@extends('layouts.app')

@section('content')
  <!-- Hero Section con fondo blanco y figura morada alrededor de la foto -->
  <section class="relative bg-white overflow-x-hidden">
    <!-- Contenido del hero -->
    <div class="container mx-auto px-4 py-20 lg:py-22 relative z-10 mt-15">
      <div class="flex flex-col lg:flex-row items-center">
        <!-- Columna de texto -->
        <div class="lg:w-1/2 mb-12 lg:mb-0" data-aos="fade-right" data-aos-duration="600">
          <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-[#030D55] mb-8 leading-none transition-all duration-500 hover:text-[#AB277A]" style="font-family: 'Playfair Display', serif; line-height: 1.1;">
            Contáctanos y te<br>ayudamos en tu<br>proceso de sanación
          </h1>
          <p class="text-4xl mt-14 text-[#AB277A] transition-all duration-300 hover:translate-x-2" style="font-family: 'Hugamour', sans-serif;">
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
    <h2 class="text-[#030D55] font-extrabold text-3xl md:text-5xl md:text-[48px] leading-[100%] mb-10 md:mb-16 text-center transition-all duration-500 hover:text-[#AB277A]" style="font-family: 'Playfair Display', serif;" data-aos="fade-up" data-aos-duration="600">
        Contáctanos
    </h2>
      
      <!-- Contact Container -->
      <div class="flex flex-col md:flex-row items-center md:items-start justify-center gap-8 md:gap-12 lg:gap-16 max-w-6xl mx-auto">
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
          <div class="contact-form-container transition-all duration-300 hover:shadow-lg p-5 rounded-lg">
            @php
            // Asegúrate de reemplazar '123' con el ID real de tu formulario
            echo do_shortcode('[contact-form-7 id="7942127" title="Contact form (style 4) (Traducido a español)"]');
            @endphp
          </div>
        
          <div class="text-center mt-6 transition-all duration-300 hover:translate-y-[-2px]">
            <p class="text-gray-600">O contáctanos vía email: <a href="mailto:hola@ikintsugi.cl" class="text-[#D93280] hover:underline hover:text-[#AB277A] transition-all duration-300">hola@ikintsugi.cl</a></p>
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
</section>
@endsection
