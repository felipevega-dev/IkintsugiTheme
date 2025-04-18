{{--
  Template Name: FAQ
--}}

@extends('layouts.app')

@section('content')
  <!-- HERO SECTION -->
  <section class="relative bg-white py-15 overflow-hidden mt-10">
    <div class="container mx-auto px-4 relative z-10">
      <div class="flex flex-col md:flex-row items-center justify-center gap-3">
        <!-- Texto del lado izquierdo --> 
        <div class="md:w-3/6 mb-10 md:mb-0 mt-10">
          <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-4 text-[#030D55] transition-all duration-500 hover:text-[#AB277A]" style="font-family: 'Playfair Display', serif; line-height: 1.1;">
          Nosotros te<br>ayudamos a resolver<br>todas tus dudas
          </h1>
          
          <p class="text-4xl mt-14 text-[#AB277A] transition-all duration-300 hover:translate-x-2" style="font-family: 'Hugamour', sans-serif;">
            #El trauma se puede superar
          </p>
        </div>
        
        <!-- Imagen del lado derecho -->
        <div class="md:w-2/5 md:ml-0">
          <div class="relative sm:mt-5 md:mt-15">
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
                <img src="{{ get_theme_file_uri('resources/images/quienensatendemos1.png') }}" alt="Personas que atendemos" class="w-full h-full object-cover transition-all duration-700 hover:scale-110">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- FAQs Section -->
<section class="bg-white relative mb-20">
  <div class="container mx-auto px-4 relative">
    <!-- Section title -->
    <h2 class="text-[#030D55] font-extrabold text-3xl md:text-5xl md:text-[48px] leading-[100%] mb-10 md:mb-16 text-center" style="font-family: 'Playfair Display', serif;">
      FAQ's
    </h2>
    
    <!-- FAQs Container with decorations -->
    <div class="relative max-w-[650px] mx-auto">
      <!-- Decorative image left -->
      <div class="absolute -left-40 top-1/2 transform -translate-y-1/2 hidden md:block">
        <img src="{{ get_theme_file_uri('resources/images/deco1.png') }}" alt="Decorative Element" class="w-40">
      </div>
      
      <!-- Decorative image right -->
      <div class="absolute -right-28 top-2/6 transform -translate-y-1/2 hidden md:block">
        <img src="{{ get_theme_file_uri('resources/images/deco2.png') }}" alt="Decorative Element" class="w-40">
      </div>
      
      <!-- FAQ Items -->
      <div class="space-y-4 md:space-y-6">
        <!-- FAQ Item 1 -->
        <div class="faq-item overflow-hidden w-full faq-gradient-border" style="max-width: 625px;">
          <button class="faq-question w-full flex justify-between items-center p-3 md:p-4 text-left bg-white hover:bg-gray-50 transition-colors duration-200" onclick="toggleFaq(this)">
            <h3 class="text-[#030D55] font-bold text-xl md:text-[24px] leading-[100%] pr-4" style="font-family: 'Playfair Display', serif;">¿Cómo saber si necesito psicoterapia?</h3>
            <div class="arrow-icon w-5 md:w-6 h-5 md:h-6 flex-shrink-0 flex items-center justify-center transform transition-transform duration-500">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 md:h-6 w-5 md:w-6 text-[#FF3382]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </div>
          </button>
          <div class="faq-answer hidden bg-[#FFF3FF8F] p-3 md:p-4 transition-all duration-700 ease-out" style="max-height: 0; overflow: hidden;">
          <p class="font-roboto font-normal text-sm md:text-[16px] leading-6 md:leading-[28px] text-[#181818]">
              Si consideras que han ocurrido sucesos a lo largo de tu vida que de una forma u otra te mantienen anclado al pasado y no te dejan progresar, el abordaje EMDR te puede resultar de gran ayuda.
            </p>
            <p class="mt-4 font-roboto font-normal text-sm md:text-[16px] leading-6 md:leading-[28px] text-[#181818]">
            Por otra parte, en muchas ocasiones hay pacientes que no consiguen identificar de donde le vienen sus dificultades e, igualmente, no consiguen alcanzar el nivel de bienestar que les gustaría. También para estos pacientes está recomendada la terapia EMDR, puesto que a través de las dificultades que una persona tiene en el presente, es posible con la ayuda del terapeuta liberar la mente para identificar aquellos eventos asociados y así poder trabajar con ellos.
            </p>
            <p class="mt-4 font-roboto font-normal text-sm md:text-[16px] leading-6 md:leading-[28px] text-[#181818]">
            Igualmente, si no duerme bien desde hace tiempo, si tiene mal humor continuo, cansancio crónico sin base orgánica, si no puede dejar de utilizar internet cuando está solo o aburrido, incluso si tiene problemas en la comunicación, si se muestra competitivo cuando conduce, si está ansioso, si se siente atrapado en las relaciones, si las relaciones no funcionan, si juega compulsivamente, si se le olvidan las cosas con frecuencia, si está "como ido", etc., en todos estos casos se puede beneficiar de un tratamiento con EMDR.
            </p>
          </div>
        </div>
        
        <!-- FAQ Item 2 -->
        <div class="faq-item overflow-hidden w-full faq-gradient-border" style="max-width: 625px;">
          <button class="faq-question w-full flex justify-between items-center p-3 md:p-4 text-left bg-white hover:bg-gray-50 transition-colors duration-200" onclick="toggleFaq(this)">
            <h3 class="text-[#030D55] font-bold text-xl md:text-[24px] leading-[100%] pr-4" style="font-family: 'Playfair Display', serif;">Con EMDR, ¿los recuerdos se olvidan?</h3>
            <div class="arrow-icon w-5 md:w-6 h-5 md:h-6 flex-shrink-0 flex items-center justify-center transform transition-transform duration-500">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 md:h-6 w-5 md:w-6 text-[#FF3382]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </div>
          </button>
          <div class="faq-answer hidden bg-[#FFF3FF8F] p-3 md:p-4 transition-all duration-700 ease-out" style="max-height: 0; overflow: hidden;">
            <p class="font-roboto font-normal text-sm md:text-[16px] leading-6 md:leading-[28px] text-[#181818]">
            Los recuerdos no se olvidan. Con EMDR los recuerdos o experiencias traumáticas pierden carga negativa emocional, cognitiva y sensorial, es decir, dejan de generar un malestar. Se refuerzan las experiencias adaptativas y funcionales, incrementando su percepción positiva. Y en la medida que se avanza en la terapia con EMDR, muchos recuerdos agradables y desagradables, que se creían ya olvidados comienzan a aflorar permitiendo que se trabaje con ellos.
            </p>
          </div>
        </div>
        
        <!-- FAQ Item 3 -->
        <div class="faq-item overflow-hidden w-full faq-gradient-border" style="max-width: 625px;">
          <button class="faq-question w-full flex justify-between items-center p-3 md:p-4 text-left bg-white hover:bg-gray-50 transition-colors duration-200" onclick="toggleFaq(this)">
            <h3 class="text-[#030D55] font-bold text-xl md:text-[24px] leading-[100%] pr-4" style="font-family: 'Playfair Display', serif;">¿Quienes pueden atenderse con EMDR?</h3>
            <div class="arrow-icon w-5 md:w-6 h-5 md:h-6 flex-shrink-0 flex items-center justify-center transform transition-transform duration-500">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 md:h-6 w-5 md:w-6 text-[#FF3382]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </div>
          </button>
          <div class="faq-answer hidden bg-[#FFF3FF8F] p-3 md:p-4 transition-all duration-700 ease-out" style="max-height: 0; overflow: hidden;">
            <p class="font-roboto font-normal text-sm md:text-[16px] leading-6 md:leading-[28px] text-[#181818]">
            El tratamiento con EMDR puede ser aplicado desde niños a adultos sin restricción de edad. En Kintsugi atendemos desde los 14 años hacia arriba.
            </p>
          </div>
        </div>
        
        <!-- FAQ Item 4 -->
        <div class="faq-item overflow-hidden w-full faq-gradient-border" style="max-width: 625px;">
          <button class="faq-question w-full flex justify-between items-center p-3 md:p-4 text-left bg-white hover:bg-gray-50 transition-colors duration-200" onclick="toggleFaq(this)">
            <h3 class="text-[#030D55] font-bold text-xl md:text-[24px] leading-[100%] pr-4" style="font-family: 'Playfair Display', serif;">¿Cuánto dura el tratamiento psicológico EMDR?</h3>
            <div class="arrow-icon w-5 md:w-6 h-5 md:h-6 flex-shrink-0 flex items-center justify-center transform transition-transform duration-500">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 md:h-6 w-5 md:w-6 text-[#FF3382]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </div>
          </button>
          <div class="faq-answer hidden bg-[#FFF3FF8F] p-3 md:p-4 transition-all duration-700 ease-out" style="max-height: 0; overflow: hidden;">
            <p class="font-roboto font-normal text-sm md:text-[16px] leading-6 md:leading-[28px] text-[#181818]">
            La duración del tratamiento con EMDR varía en función de los niveles o intensidad de malestar o perturbación, síntomas, historial de situaciones traumáticas vividas, trastorno psiquiátrico y la propia subjetividad del paciente.</p>
            <p class="font-roboto font-normal text-sm md:text-[16px] leading-6 md:leading-[28px] text-[#181818] mt-4">Sin embargo, para casos de Trastorno de estrés post traumático (TEPT) ocasionado por UN evento traumático concreto, hace menos de 3 meses, tales como: un portonazo, un accidente, catástrofe, un duelo, u otras situaciones similares. Sin que exista traumas similares no resueltos con anterioridad, con la terapia con EMDR, se puede lograr evidente mejoría o al menos reducción de los síntomas más intensos, en un proceso psicoterapéutico de 4 a 12 sesiones.  Esto es referencial, ya que cada persona es un mundo que ofrece particularidades que intervendrá en el proceso.</p>
          </div>
        </div>
        
        <!-- FAQ Item 5 -->
        <div class="faq-item overflow-hidden w-full faq-gradient-border" style="max-width: 625px;">
          <button class="faq-question w-full flex justify-between items-center p-3 md:p-4 text-left bg-white hover:bg-gray-50 transition-colors duration-200" onclick="toggleFaq(this)">
            <h3 class="text-[#030D55] font-bold text-xl md:text-[24px] leading-[100%] pr-4" style="font-family: 'Playfair Display', serif;">¿Qué duración tienen las sesiones?</h3>
            <div class="arrow-icon w-5 md:w-6 h-5 md:h-6 flex-shrink-0 flex items-center justify-center transform transition-transform duration-500">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 md:h-6 w-5 md:w-6 text-[#FF3382]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </div>
          </button>
          <div class="faq-answer hidden bg-[#FFF3FF8F] p-3 md:p-4 transition-all duration-700 ease-out" style="max-height: 0; overflow: hidden;">
            <p class="font-roboto font-normal text-sm md:text-[16px] leading-6 md:leading-[28px] text-[#181818]">
            Cada sesión EMDR tiene una duración aproximada de 45 minutos.
            </p>
          </div>
        </div>
        
        <!-- FAQ Item 6 -->
        <div class="faq-item overflow-hidden w-full faq-gradient-border" style="max-width: 625px;">
          <button class="faq-question w-full flex justify-between items-center p-3 md:p-4 text-left bg-white hover:bg-gray-50 transition-colors duration-200" onclick="toggleFaq(this)">
            <h3 class="text-[#030D55] font-bold text-xl md:text-[24px] leading-[100%] pr-4" style="font-family: 'Playfair Display', serif;">¿Cada cuánto tiempo se hace una sesión?</h3>
            <div class="arrow-icon w-5 md:w-6 h-5 md:h-6 flex-shrink-0 flex items-center justify-center transform transition-transform duration-500">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 md:h-6 w-5 md:w-6 text-[#FF3382]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </div>
          </button>
          <div class="faq-answer hidden bg-[#FFF3FF8F] p-3 md:p-4 transition-all duration-700 ease-out" style="max-height: 0; overflow: hidden;">
            <p class="font-roboto font-normal text-sm md:text-[16px] leading-6 md:leading-[28px] text-[#181818]">
            El proceso de Psicoterapia EMDR conlleva la realización de una sesión por semana. De este modo, logramos establecer un vínculo terapéutico, mediado por la confianza, estabilidad y seguridad emocional que nos permite ir poco a poco sentando las bases emocionales protegidas para abordar los episodios dolorosos y angustiantes que se han vivenciado, con la certeza que podremos continuar la siguiente semana.
            </p>
            <p class="mt-4 font-roboto font-normal text-sm md:text-[16px] leading-6 md:leading-[28px] text-[#181818]">
            En fase de seguimiento, es decir ad portas del alta psicoterapéutica, las sesiones se podrán realizar cada 15 días, luego cada dos o más meses, hasta el alta psicoterapéutica, según sea el caso.
            </p>
          </div>
        </div>
        
        <!-- FAQ Item 7 -->
        <div class="faq-item overflow-hidden w-full faq-gradient-border" style="max-width: 625px;">
          <button class="faq-question w-full flex justify-between items-center p-3 md:p-4 text-left bg-white hover:bg-gray-50 transition-colors duration-200" onclick="toggleFaq(this)">
            <h3 class="text-[#030D55] font-bold text-xl md:text-[24px] leading-[100%] pr-4" style="font-family: 'Playfair Display', serif;">¿Cómo me puede ayudar EMDR?</h3>
            <div class="arrow-icon w-5 md:w-6 h-5 md:h-6 flex-shrink-0 flex items-center justify-center transform transition-transform duration-500">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 md:h-6 w-5 md:w-6 text-[#FF3382]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </div>
          </button>
          <div class="faq-answer hidden bg-[#FFF3FF8F] p-3 md:p-4 transition-all duration-700 ease-out" style="max-height: 0; overflow: hidden;">
            <p class="font-roboto font-bold text-sm md:text-[16px] leading-6 md:leading-[28px] text-[#181818]">
            Desde las vivencias dolorosas explícitas
            </p>
            <p class="mt-4 font-roboto font-normal text-sm md:text-[16px] leading-6 md:leading-[28px] text-[#181818]">
            Si has experimentado situaciones negativas que han dejado una marca profunda en tu vida, como el maltrato, abuso, violación, bullying, mobbing o encerronas, es posible que, a pesar de haber transcurrido años, continúen afectándote. Pesadillas, flashbacks, angustia y creencias negativas pueden persistir, haciendo que solo la idea de revivir esos recuerdos resulte aterradora.
            </p>
            <p class="mt-4 font-roboto font-normal text-sm md:text-[16px] leading-6 md:leading-[28px] text-[#181818]">
            EMDR te ofrece la posibilidad de reprocesar estos recuerdos dolorosos, disminuyendo su carga emocional y permitiéndote avanzar hacia una vida más tranquila y plena.
            </p>

            <p class="mt-4 font-roboto font-bold text-sm md:text-[16px] leading-6 md:leading-[28px] text-[#181818]">
            Desde los Trastornos 
            </p>
            <p class="mt-4 font-roboto font-normal text-sm md:text-[16px] leading-6 md:leading-[28px] text-[#181818]">
            Si padeces síntomas tales como angustia, tristeza, ira o pensamientos negativos, y sientes que en algunas ocasiones te desconectas, te encuentras perdida o agotada debido a condiciones psiquiátricas (como el trastorno de estrés postraumático, trauma complejo, disociación, ansiedad, crisis de pánico, trastorno límite de la personalidad, depresión, TOC o trastornos alimentarios, entre otros), la psicoterapia EMDR puede ser una herramienta efectiva en tu proceso de recuperación.
            </p>
           
            <p class="mt-4 font-roboto font-bold text-sm md:text-[16px] leading-6 md:leading-[28px] text-[#181818]">
            Desde los Malestares emocionales
            </p>
            <p class="mt-4 font-roboto font-normal text-sm md:text-[16px] leading-6 md:leading-[28px] text-[#181818]">
            Si sufres de malestares psicológicos que incluyen baja autoestima, inseguridad, dificultades para tomar decisiones o creencias negativas y limitantes sobre ti misma y los demás. O sientes que algo te ocurre que impide que puedas tener una vida plena. EMDR puede ayudarte. O sientes que las cosas nunca te salen bien, experimentar culpa constante o tener la sensación de no ser lo suficientemente buena, incluso llegando a complacer en exceso, son patrones que se pueden abordar y transformar con la psicoterapia EMDR.
            </p>

            <p class="mt-4 font-roboto font-bold text-sm md:text-[16px] leading-6 md:leading-[28px] text-[#181818]">
            ¿Qué haremos?
            </p>
            <p class="mt-4 font-roboto font-normal text-sm md:text-[16px] leading-6 md:leading-[28px] text-[#181818]">
            Nuestro trabajo conjunto se basa en tu compromiso, paciencia, constancia y participación hacia una vida mejor. El proceso terapéutico incluye:
            </p>

            <p class="mt-4 font-roboto font-bold text-sm md:text-[16px] leading-6 md:leading-[28px] text-[#181818]">
            Identificación:
            </p>
            <p class="mt-4 font-roboto font-normal text-sm md:text-[16px] leading-6 md:leading-[28px] text-[#181818]">
            Analizaremos los síntomas y los disparadores o gatillantes que afectan tu bienestar.
            </p>

            <p class="mt-4 font-roboto font-bold text-sm md:text-[16px] leading-6 md:leading-[28px] text-[#181818]">
            Exploración de causas:
            </p>
            <p class="mt-4 font-roboto font-normal text-sm md:text-[16px] leading-6 md:leading-[28px] text-[#181818]">
            Investigaremos las raíces de estos problemas, que a menudo se originan en la infancia o juventud.
            </p>

            <p class="mt-4 font-roboto font-bold text-sm md:text-[16px] leading-6 md:leading-[28px] text-[#181818]">
            Plan de intervención:
            </p>
            <p class="mt-4 font-roboto font-normal text-sm md:text-[16px] leading-6 md:leading-[28px] text-[#181818]">
            Diseñaremos un plan personalizado que aborde tanto recuerdos explícitos como implícitos responsables de tu malestar actual.
            </p>

            <p class="mt-4 font-roboto font-bold text-sm md:text-[16px] leading-6 md:leading-[28px] text-[#181818]">
            Desarrollo de recursos:
            </p>
            <p class="mt-4 font-roboto font-normal text-sm md:text-[16px] leading-6 md:leading-[28px] text-[#181818]">
            Evaluaremos tus mecanismos de regulación emocional, tus relaciones interpersonales y estrategias de defensa, para implementar herramientas y recursos que te permitan vivir de manera más equilibrada y satisfactoria.
            </p>
          </div>
        </div>

        <!-- FAQ Item 8 -->
        <div class="faq-item overflow-hidden w-full faq-gradient-border" style="max-width: 625px;">
          <button class="faq-question w-full flex justify-between items-center p-3 md:p-4 text-left bg-white hover:bg-gray-50 transition-colors duration-200" onclick="toggleFaq(this)">
            <h3 class="text-[#030D55] font-bold text-xl md:text-[24px] leading-[100%] pr-4" style="font-family: 'Playfair Display', serif;">¿A qué personas atendemos?</h3>
            <div class="arrow-icon w-5 md:w-6 h-5 md:h-6 flex-shrink-0 flex items-center justify-center transform transition-transform duration-500">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 md:h-6 w-5 md:w-6 text-[#FF3382]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
              </svg>
            </div>
          </button>
          <div class="faq-answer hidden bg-[#FFF3FF8F] p-3 md:p-4 transition-all duration-700 ease-out" style="max-height: 0; overflow: hidden;">
            <p class="font-roboto font-bold text-sm md:text-[16px] leading-6 md:leading-[28px] text-[#181818]">
            Adultos
            </p>
            <p class="mt-4 font-roboto font-normal text-sm md:text-[16px] leading-6 md:leading-[28px] text-[#181818]">
            Atendemos a adultos sobre 25 años, que buscan superar bloqueos emocionales, sanar traumas pasados o afrontar desafíos cotidianos que impiden el buen vivir o el desarrollo adecuado en lo laboral, académico o relacional. Utilizando la terapia EMDR, ayudamos a reprocesar recuerdos dolorosos y a transformar patrones negativos, promoviendo el crecimiento personal, la resiliencia y el bienestar emocional.
            </p>

            <p class="mt-4 font-roboto font-bold text-sm md:text-[16px] leading-6 md:leading-[28px] text-[#181818]">
            Adolescentes
            </p>
            <p class="mt-4 font-roboto font-normal text-sm md:text-[16px] leading-6 md:leading-[28px] text-[#181818]">
            Ofrecemos un espacio seguro y comprensivo para adolescentes mayores de 16 años que buscan activamente mejorar su bienestar emocional. A través de la terapia EMDR, facilitamos el manejo de emociones intensas y la superación de experiencias adversas, fortaleciendo su identidad y autonomía. Esta atención clínica está especialmente diseñada para adolescentes que acuden por su propia voluntad, con el apoyo activo de sus padres disponibles a realizar cambios personales en pro del bienestar de su hija/o, permitiéndoles enfrentar de manera equilibrada y saludable los desafíos propios de su desarrollo de vida.
            </p>

            <p class="mt-4 font-roboto font-bold text-sm md:text-[16px] leading-6 md:leading-[28px] text-[#181818]">
            Adulto Mayor
            </p>
            <p class="mt-4 font-roboto font-normal text-sm md:text-[16px] leading-6 md:leading-[28px] text-[#181818]">
            Apoyamos a adultos mayores que enfrentan transiciones vitales, pérdidas o cambios significativos en su vida. A través de EMDR, trabajamos en el reprocesamiento de experiencias acumuladas, facilitando la adaptación emocional y mejorando la calidad de vida para un envejecimiento activo y pleno.
            </p>

            <p class="mt-4 font-roboto font-bold text-sm md:text-[16px] leading-6 md:leading-[28px] text-[#181818]">
            Parejas
            </p>
            <p class="mt-4 font-roboto font-normal text-sm md:text-[16px] leading-6 md:leading-[28px] text-[#181818]">
            En el ámbito de la terapia de pareja, incorporamos EMDR para identificar y transformar patrones emocionales que afectan la relación. Este enfoque facilita una comunicación más abierta y efectiva, promoviendo el entendimiento mutuo y fortaleciendo la conexión emocional entre los miembros.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <style>
    .faq-gradient-border {
      border: 1px solid;
      border-radius: 0.375rem;
      border-image-source: linear-gradient(180deg, rgba(171, 39, 122, 0.48) 0%, rgba(3, 13, 85, 0.48) 61%);
      border-image-slice: 1;
    }
    
    .faq-answer {
      transition: max-height 600ms ease-out;
    }
  </style>
  
  <!-- JavaScript for toggle functionality -->
  <script>
    function toggleFaq(element) {
      const answer = element.nextElementSibling;
      const arrow = element.querySelector('.arrow-icon');
      
      // Toggle answer visibility with animation
      if (answer.classList.contains('hidden')) {
        // Show answer
        answer.classList.remove('hidden');
        // Use setTimeout to ensure the transition happens after the display change
        setTimeout(function() {
          answer.style.maxHeight = answer.scrollHeight + 'px';
          arrow.style.transform = 'rotate(180deg)';
        }, 10);
      } else {
        // Hide answer - faster animation for closing
        answer.style.maxHeight = '0px';
        arrow.style.transform = 'rotate(0deg)';
        
        // Wait for animation to complete before hiding - reduced time
        setTimeout(function() {
          answer.classList.add('hidden');
        }, 400);
      }
    }
    
    // Initialize all FAQ answers
    document.addEventListener('DOMContentLoaded', function() {
      document.querySelectorAll('.faq-answer').forEach(function(answer) {
        answer.style.maxHeight = '0px';
      });
    });
  </script>
</section>
@endsection
