{{--
  Template Name: Contacto
--}}

@extends('layouts.app')

@section('content')
  <!-- HERO SECTION -->
  <section class="relative bg-white py-25 overflow-hidden">
    <div class="container mx-auto px-4 relative z-10">
      <div class="flex flex-col md:flex-row items-center justify-center gap-3">
        <!-- Texto del lado izquierdo --> 
        <div class="md:w-3/6 mb-10 md:mb-0 mt-10">
          <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-4 text-[#030D55] transition-all duration-500 hover:text-[#AB277A]" style="font-family: 'Playfair Display', serif; line-height: 1.1;">
          Contáctanos y te<br>ayudamos en tu<br>proceso de sanación
          </h1>
          
          <p class="text-4xl mt-14 text-[#AB277A] transition-all duration-300 hover:translate-x-2" style="font-family: 'Hugamour', sans-serif;">
            #El trauma se puede superar
          </p>
        </div>
        
        <!-- Imagen del lado derecho -->
        <div class="md:w-2/5 md:ml-0">
          <div class="relative mt-15">
            <!-- Imagen con marco personalizado -->
            <div class="relative transition-all duration-700 hover:scale-105" style="width: 500px; height: 500px;">
              
              <!-- Línea curva violeta exterior -->
              <svg viewBox="0 0 450 450" class="absolute top-0 left-0 w-full h-full animate-pulse" style="transform: scale(1.08); transform-origin: center; animation-duration: 8s;">
                <path d="M225,10 
                        C290,10 345,35 380,70
                        C415,105 440,160 440,225
                        C440,290 415,345 380,380
                        C345,415 290,440 225,440
                        C160,440 105,415 70,380
                        C35,345 10,290 10,225
                        C10,160 35,105 70,70
                        C105,35 160,10 225,10 Z" 
                     fill="none" stroke="#8961C4" stroke-width="2"></path>
              </svg>
              
              <!-- Línea curva rosa -->
              <svg viewBox="0 0 450 450" class="absolute top-0 left-0 w-full h-full animate-pulse" style="transform: scale(1.05); transform-origin: center; animation-duration: 7s;">
                <path d="M225,30 
                        C280,30 325,50 355,80
                        C385,110 420,155 420,225
                        C420,295 385,340 355,370
                        C325,400 280,420 225,420
                        C170,420 125,400 95,370
                        C65,340 30,295 30,225
                        C30,155 65,110 95,80
                        C125,50 170,30 225,30 Z" 
                     fill="none" stroke="#F5B3F3" stroke-width="2"></path>
              </svg>
              
              <!-- Línea curva azul marino -->
              <svg viewBox="0 0 450 450" class="absolute top-0 left-0 w-full h-full animate-pulse" style="transform: scale(1.02); transform-origin: center; animation-duration: 6s;">
                <path d="M225,50 
                        C270,50 310,65 335,90
                        C360,115 400,155 400,225
                        C400,295 360,335 335,360
                        C310,385 270,400 225,400
                        C180,400 140,385 115,360
                        C90,335 50,295 50,225
                        C50,155 90,115 115,90
                        C140,65 180,50 225,50 Z" 
                     fill="none" stroke="#030D55" stroke-width="1.5"></path>
              </svg>
              
              <!-- Imagen circular -->
              <div class="absolute inset-12 overflow-hidden rounded-full border-2 border-white transition-all duration-500 hover:shadow-lg">
                <img src="{{ get_theme_file_uri('resources/images/contacto.png') }}" alt="Personas que atendemos" class="w-full h-full object-cover transition-all duration-700 hover:scale-110">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Contact Section -->
  <section class="py-12 md:py-16 bg-white relative">
    <div class="container mx-auto px-4 relative">
      <!-- Section title -->
      <h2 class="text-[#030D55] font-extrabold text-3xl md:text-5xl md:text-[48px] leading-[100%] mb-10 md:mb-16 text-center" style="font-family: 'Playfair Display', serif;">
        Contáctanos
      </h2>
      
      <!-- Contact Container -->
      <div class="flex flex-col md:flex-row items-center md:items-start justify-center gap-8 md:gap-12 lg:gap-16 max-w-6xl mx-auto">
        <!-- Left Image -->
        <div class="relative w-full max-w-[375px]">
          <img 
            src="{{ get_theme_file_uri('resources/images/contacto2.jpg') }}" 
            alt="Psicólogos Instituto Kintsugi" 
            class="w-full h-[458px] object-cover rounded-[16px]"
            style="box-shadow: 0px 4px 16px 0px #AB277A;"
          >
        </div>
        
        <!-- Right Form - Contact Form 7 -->
        <div class="w-full max-w-[600px]">
          <div class="contact-form-container">
            @php
            // Asegúrate de reemplazar '123' con el ID real de tu formulario
            echo do_shortcode('[contact-form-7 id="4655e97" title="Formulario de contacto"]');
            @endphp
          </div>
          
          <div class="text-center mt-6">
            <p class="text-gray-600">O contáctanos vía email: <a href="mailto:hola@ikintsugi.cl" class="text-[#D93280] hover:underline">hola@ikintsugi.cl</a></p>
          </div>
        </div>
      </div>
    </div>
    
    <style>
      /* Estilo para Contact Form 7 */
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
      .contact-form-container textarea {
        width: 100%;
        padding: 0.5rem 1rem;
        border: 1px solid #e2e8f0;
        border-radius: 0.375rem;
        transition: all 0.3s;
      }
      
      .contact-form-container input[type="text"]:focus,
      .contact-form-container input[type="email"]:focus,
      .contact-form-container textarea:focus {
        outline: none;
        border-color: transparent;
        box-shadow: 0 0 0 2px #AB277A;
      }
      
      .contact-form-container input[type="submit"] {
        background-image: linear-gradient(to right, #D93280, #AB277A);
        color: white;
        padding: 0.5rem 2rem;
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
        transform: scale(1.05);
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
      }
      
      .contact-form-container .wpcf7-response-output {
        margin-top: 1rem;
        padding: 0.5rem 1rem;
        border-radius: 0.375rem;
        text-align: center;
      }
    </style>
  </section>
@endsection
