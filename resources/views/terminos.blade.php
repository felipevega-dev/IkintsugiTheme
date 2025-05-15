{{--
  Template Name: Terminos y Condiciones
--}}

@extends('layouts.app')

@section('content')
<section class="relative bg-white overflow-hidden">
    <div class="container mx-auto px-4 relative z-10 mt-10">
    </div>
</section>
<section class="py-6 mt-6 bg-white md:mt-14 md:py-14 lg:mt-16 lg:py-16 xl:mt-20 xl:py-20">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row justify-between items-center mb-8">
            <h2 class="text-2xl md:text-3xl font-bold mb-4 md:mb-0">Términos y Condiciones</h2>
            <div class="flex space-x-4">
                <button id="languageToggle" class="flex items-center bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-md transition-all duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129" />
                    </svg>
                    Ver en Inglés
                </button>
            </div>
        </div>

        <!-- Index Section -->
        <div class="mb-10 p-5 bg-gray-100 rounded-lg shadow-sm">
            <h3 class="text-lg font-semibold mb-3">Índice de Contenidos</h3>
            <div id="spanishIndex" class="grid grid-cols-1 md:grid-cols-2 gap-2">
                <a href="#intro-es" class="text-purple-600 hover:text-purple-800 transition-colors duration-200">1. Introducción</a>
                <a href="#license-es" class="text-purple-600 hover:text-purple-800 transition-colors duration-200">2. Licencia de Uso</a>
                <a href="#comments-es" class="text-purple-600 hover:text-purple-800 transition-colors duration-200">3. Comentarios de Usuario</a>
                <a href="#hyperlinks-es" class="text-purple-600 hover:text-purple-800 transition-colors duration-200">4. Hipervínculos a Nuestro Contenido</a>
                <a href="#rights-es" class="text-purple-600 hover:text-purple-800 transition-colors duration-200">5. Reserva de Derechos</a>
                <a href="#liability-es" class="text-purple-600 hover:text-purple-800 transition-colors duration-200">6. Responsabilidad del Contenido</a>
                <a href="#disclaimer-es" class="text-purple-600 hover:text-purple-800 transition-colors duration-200">7. Renuncia de Responsabilidad</a>
                <a href="#limitations-es" class="text-purple-600 hover:text-purple-800 transition-colors duration-200">8. Limitaciones y Exclusiones</a>
                <a href="#changes-es" class="text-purple-600 hover:text-purple-800 transition-colors duration-200">9. Cambios a estos Términos</a>
            </div>
            
            <div id="englishIndex" class="grid grid-cols-1 md:grid-cols-2 gap-2 hidden">
                <a href="#intro-en" class="text-purple-600 hover:text-purple-800 transition-colors duration-200">1. Introduction</a>
                <a href="#license-en" class="text-purple-600 hover:text-purple-800 transition-colors duration-200">2. License Usage</a>
                <a href="#comments-en" class="text-purple-600 hover:text-purple-800 transition-colors duration-200">3. User Comments</a>
                <a href="#hyperlinks-en" class="text-purple-600 hover:text-purple-800 transition-colors duration-200">4. Hyperlinking to Our Content</a>
                <a href="#rights-en" class="text-purple-600 hover:text-purple-800 transition-colors duration-200">5. Reservation of Rights</a>
                <a href="#liability-en" class="text-purple-600 hover:text-purple-800 transition-colors duration-200">6. Content Liability</a>
                <a href="#disclaimer-en" class="text-purple-600 hover:text-purple-800 transition-colors duration-200">7. Disclaimer</a>
                <a href="#limitations-en" class="text-purple-600 hover:text-purple-800 transition-colors duration-200">8. Limitations and Exclusions</a>
                <a href="#changes-en" class="text-purple-600 hover:text-purple-800 transition-colors duration-200">9. Changes to These Terms</a>
            </div>
        </div>

        <!-- Spanish Content -->
        <div id="spanishContent" class="space-y-8">
            <div id="intro-es" class="border-l-4 border-purple-600 pl-4 mb-8 transition-all duration-300 hover:border-l-6 hover:pl-5">
                <h3 class="text-xl font-semibold mb-2">1. Introducción</h3>
                <p>Estos términos y condiciones establecen las normas y reglas para el uso de nuestro sitio web y los servicios ofrecidos. Al acceder a este sitio web, asumimos que acepta estos términos y condiciones en su totalidad. No continúe usando nuestro sitio web si no acepta todos los términos y condiciones establecidos en esta página.</p>
            </div>

            <div id="license-es" class="border-l-4 border-purple-600 pl-4 mb-8 transition-all duration-300 hover:border-l-6 hover:pl-5">
                <h3 class="text-xl font-semibold mb-2">2. Licencia de Uso</h3>
                <p>A menos que se indique lo contrario, nosotros y/o nuestros licenciantes poseemos los derechos de propiedad intelectual de todo el material en nuestro sitio web. Todos los derechos de propiedad intelectual están reservados. Puede ver y/o imprimir páginas desde nuestro sitio web para su uso personal sujeto a las restricciones establecidas en estos términos y condiciones.</p>
                
                <h4 class="text-lg font-medium mt-4">Usted no debe:</h4>
                <ul class="list-disc pl-6 mt-2">
                    <li>Republicar material de nuestro sitio web</li>
                    <li>Vender, alquilar o sublicenciar material de nuestro sitio web</li>
                    <li>Reproducir, duplicar o copiar material de nuestro sitio web</li>
                    <li>Redistribuir contenido de nuestro sitio web</li>
                </ul>
            </div>

            <div id="comments-es" class="border-l-4 border-purple-600 pl-4 mb-8 transition-all duration-300 hover:border-l-6 hover:pl-5">
                <h3 class="text-xl font-semibold mb-2">3. Comentarios de Usuario</h3>
                <p>Ciertas partes de este sitio web ofrecen la oportunidad a los usuarios de publicar e intercambiar opiniones e información en determinadas áreas. Filtramos, editamos y revisamos todos los comentarios antes de su publicación en el sitio web a través de nuestro sistema de gestión de contenido WordPress. Esto nos permite garantizar que no se publiquen contenidos inapropiados o spam. Los comentarios no reflejan los puntos de vista y opiniones de nuestra empresa, sus agentes y/o afiliados. Los comentarios reflejan los puntos de vista y opiniones de la persona que publica sus puntos de vista y opiniones.</p>
                
                <h4 class="text-lg font-medium mt-4">Usted es responsable de:</h4>
                <ul class="list-disc pl-6 mt-2">
                    <li>Asegurarse de que cualquier comentario que publique cumpla con nuestros términos y condiciones</li>
                    <li>Tenga en cuenta que una vez que publica un comentario, este se hace públicamente disponible</li>
                    <li>Nos reservamos el derecho de eliminar cualquier comentario que consideremos inapropiado o que infrinja nuestros términos y condiciones</li>
                </ul>
            </div>

            <div id="hyperlinks-es" class="border-l-4 border-purple-600 pl-4 mb-8 transition-all duration-300 hover:border-l-6 hover:pl-5">
                <h3 class="text-xl font-semibold mb-2">4. Hipervínculos a Nuestro Contenido</h3>
                <p>Las siguientes organizaciones pueden enlazar a nuestro sitio web sin aprobación previa por escrito:</p>
                <ul class="list-disc pl-6 mt-2">
                    <li>Agencias gubernamentales</li>
                    <li>Motores de búsqueda</li>
                    <li>Organizaciones de noticias</li>
                    <li>Distribuidores de directorios en línea</li>
                </ul>
                
                <p class="mt-2">Los distribuidores de directorios en línea pueden enlazar a nuestro sitio web de la misma manera que hacen hipervínculos a los sitios web de otras empresas listadas.</p>
                
                <div class="ml-4 mt-4">
                    <h4 class="text-lg font-medium">4.1. Política de Enlaces</h4>
                    <p>Podemos considerar y aprobar solicitudes de enlace de estos tipos de organizaciones:</p>
                    <ul class="list-disc pl-6 mt-2">
                        <li>Fuentes de información de consumidores y/o empresas conocidas</li>
                        <li>Sitios comunitarios .com</li>
                        <li>Asociaciones u otros grupos que representan organizaciones benéficas</li>
                        <li>Distribuidores de directorios en línea</li>
                        <li>Portales de Internet</li>
                        <li>Firmas de contabilidad, derecho y consultoría</li>
                        <li>Instituciones educativas y asociaciones comerciales</li>
                    </ul>
                </div>
            </div>

            <div id="rights-es" class="border-l-4 border-purple-600 pl-4 mb-8 transition-all duration-300 hover:border-l-6 hover:pl-5">
                <h3 class="text-xl font-semibold mb-2">5. Reserva de Derechos</h3>
                <p>Nos reservamos el derecho de solicitar que elimine todos los enlaces o cualquier enlace particular a nuestro sitio web. Usted aprueba eliminar inmediatamente todos los enlaces a nuestro sitio web cuando se le solicite. También nos reservamos el derecho de modificar estos términos y condiciones y su política de enlaces en cualquier momento. Al vincular continuamente a nuestro sitio web, usted acepta estar vinculado y seguir estos términos y condiciones de vinculación.</p>
            </div>

            <div id="liability-es" class="border-l-4 border-purple-600 pl-4 mb-8 transition-all duration-300 hover:border-l-6 hover:pl-5">
                <h3 class="text-xl font-semibold mb-2">6. Responsabilidad del Contenido</h3>
                <p>No seremos responsables de ningún contenido que aparezca en su sitio web. Usted acepta protegernos y defendernos contra todas las reclamaciones que surjan en su sitio web. Ningún enlace(s) debe aparecer en cualquier sitio web que pueda ser interpretado como difamatorio, obsceno o criminal, o que infrinja, de otra manera viole, o defienda la infracción u otra violación de los derechos de terceros.</p>
            </div>

            <div id="disclaimer-es" class="border-l-4 border-purple-600 pl-4 mb-8 transition-all duration-300 hover:border-l-6 hover:pl-5">
                <h3 class="text-xl font-semibold mb-2">7. Renuncia de Responsabilidad</h3>
                <p>En la medida máxima permitida por la ley chilena aplicable, incluida pero no limitada a la Ley 19.628 sobre Protección de la Vida Privada, excluimos todas las representaciones, garantías y condiciones relacionadas con nuestro sitio web y el uso de este sitio web. Nada en esta renuncia de responsabilidad:</p>
                <ul class="list-disc pl-6 mt-2">
                    <li>Limitará o excluirá nuestra o su responsabilidad por muerte o lesiones personales</li>
                    <li>Limitará o excluirá nuestra o su responsabilidad por fraude o tergiversación fraudulenta</li>
                    <li>Limitará cualquiera de nuestras o sus responsabilidades de cualquier manera que no esté permitida bajo la ley chilena aplicable</li>
                    <li>Excluirá cualquiera de nuestras o sus responsabilidades que no pueden ser excluidas bajo la ley chilena aplicable</li>
                </ul>
            </div>

            <div id="limitations-es" class="border-l-4 border-purple-600 pl-4 mb-8 transition-all duration-300 hover:border-l-6 hover:pl-5">
                <h3 class="text-xl font-semibold mb-2">8. Limitaciones y Exclusiones de Responsabilidad</h3>
                <p>Las limitaciones y prohibiciones de responsabilidad establecidas en esta sección y en otras partes de esta renuncia de responsabilidad: (a) están sujetas al párrafo anterior; y (b) rigen todas las responsabilidades que surjan bajo la renuncia de responsabilidad, incluidas las responsabilidades que surjan en el contrato, en agravio y por incumplimiento de la obligación legal.</p>
                <p class="mt-2">En la medida en que el sitio web y la información y servicios en el sitio web se proporcionen de forma gratuita, no seremos responsables de ninguna pérdida o daño de cualquier naturaleza.</p>
            </div>

            <div id="changes-es" class="border-l-4 border-purple-600 pl-4 mb-8 transition-all duration-300 hover:border-l-6 hover:pl-5">
                <h3 class="text-xl font-semibold mb-2">9. Cambios a estos Términos</h3>
                <p>Estos términos y condiciones pueden ser modificados en cualquier momento. Los cambios serán publicados en este sitio web. Es su responsabilidad verificar periódicamente estos términos y condiciones para comprobar si hay cambios. Su uso continuado del sitio web después de la publicación de cambios a estos términos y condiciones constituirá su aceptación de los mismos.</p>
            </div>
        </div>

        <!-- English Content -->
        <div id="englishContent" class="space-y-8 hidden" data-aos="fade-in">
            <div id="intro-en" class="border-l-4 border-purple-600 pl-4 mb-8 transition-all duration-300 hover:border-l-6 hover:pl-5">
                <h3 class="text-xl font-semibold mb-2">1. Introduction</h3>
                <p>These terms and conditions outline the rules and regulations for the use of our website and the services offered. By accessing this website we assume you accept these terms and conditions in full. Do not continue to use our website if you do not accept all of the terms and conditions stated on this page.</p>
            </div>

            <div id="license-en" class="border-l-4 border-purple-600 pl-4 mb-8 transition-all duration-300 hover:border-l-6 hover:pl-5">
                <h3 class="text-xl font-semibold mb-2">2. License Usage</h3>
                <p>Unless otherwise stated, we and/or our licensors own the intellectual property rights for all material on our website. All intellectual property rights are reserved. You may view and/or print pages from our website for your own personal use subject to restrictions set in these terms and conditions.</p>
                
                <h4 class="text-lg font-medium mt-4">You must not:</h4>
                <ul class="list-disc pl-6 mt-2">
                    <li>Republish material from our website</li>
                    <li>Sell, rent or sub-license material from our website</li>
                    <li>Reproduce, duplicate or copy material from our website</li>
                    <li>Redistribute content from our website</li>
                </ul>
            </div>

            <div id="comments-en" class="border-l-4 border-purple-600 pl-4 mb-8 transition-all duration-300 hover:border-l-6 hover:pl-5">
                <h3 class="text-xl font-semibold mb-2">3. User Comments</h3>
                <p>Certain parts of this website offer the opportunity for users to post and exchange opinions and information in certain areas. We filter, edit and review all comments before they are published on the website through our WordPress content management system. This allows us to ensure that inappropriate content or spam is not published. Comments do not reflect the views and opinions of our company, its agents and/or affiliates. Comments reflect the views and opinions of the person who post their views and opinions.</p>
                
                <h4 class="text-lg font-medium mt-4">You are responsible for:</h4>
                <ul class="list-disc pl-6 mt-2">
                    <li>Ensuring that any comments you post comply with our terms and conditions</li>
                    <li>Note that once you post a comment, it becomes publicly available</li>
                    <li>We reserve the right to remove any comments we deem inappropriate or that violate our terms and conditions</li>
                </ul>
            </div>

            <div id="hyperlinks-en" class="border-l-4 border-purple-600 pl-4 mb-8 transition-all duration-300 hover:border-l-6 hover:pl-5">
                <h3 class="text-xl font-semibold mb-2">4. Hyperlinking to Our Content</h3>
                <p>The following organizations may link to our website without prior written approval:</p>
                <ul class="list-disc pl-6 mt-2">
                    <li>Government agencies</li>
                    <li>Search engines</li>
                    <li>News organizations</li>
                    <li>Online directory distributors</li>
                </ul>
                
                <p class="mt-2">Online directory distributors may link to our website in the same manner as they hyperlink to the websites of other listed businesses.</p>
                
                <div class="ml-4 mt-4">
                    <h4 class="text-lg font-medium">4.1. Linking Policy</h4>
                    <p>We may consider and approve link requests from these types of organizations:</p>
                    <ul class="list-disc pl-6 mt-2">
                        <li>Commonly-known consumer and/or business information sources</li>
                        <li>dot.com community sites</li>
                        <li>Associations or other groups representing charities</li>
                        <li>Online directory distributors</li>
                        <li>Internet portals</li>
                        <li>Accounting, law and consulting firms</li>
                        <li>Educational institutions and trade associations</li>
                    </ul>
                </div>
            </div>

            <div id="rights-en" class="border-l-4 border-purple-600 pl-4 mb-8 transition-all duration-300 hover:border-l-6 hover:pl-5">
                <h3 class="text-xl font-semibold mb-2">5. Reservation of Rights</h3>
                <p>We reserve the right to request that you remove all links or any particular link to our website. You approve to immediately remove all links to our website upon request. We also reserve the right to amend these terms and conditions and its linking policy at any time. By continuously linking to our website, you agree to be bound to and follow these linking terms and conditions.</p>
            </div>

            <div id="liability-en" class="border-l-4 border-purple-600 pl-4 mb-8 transition-all duration-300 hover:border-l-6 hover:pl-5">
                <h3 class="text-xl font-semibold mb-2">6. Content Liability</h3>
                <p>We shall not be hold responsible for any content that appears on your website. You agree to protect and defend us against all claims that is arising on your website. No link(s) should appear on any website that may be interpreted as libelous, obscene or criminal, or which infringes, otherwise violates, or advocates the infringement or other violation of, any third party rights.</p>
            </div>

            <div id="disclaimer-en" class="border-l-4 border-purple-600 pl-4 mb-8 transition-all duration-300 hover:border-l-6 hover:pl-5">
                <h3 class="text-xl font-semibold mb-2">7. Disclaimer</h3>
                <p>To the maximum extent permitted by applicable Chilean law, including but not limited to Law 19.628 on Protection of Private Life, we exclude all representations, warranties and conditions relating to our website and the use of this website. Nothing in this disclaimer will:</p>
                <ul class="list-disc pl-6 mt-2">
                    <li>Limit or exclude our or your liability for death or personal injury</li>
                    <li>Limit or exclude our or your liability for fraud or fraudulent misrepresentation</li>
                    <li>Limit any of our or your liabilities in any way that is not permitted under applicable Chilean law</li>
                    <li>Exclude any of our or your liabilities that may not be excluded under applicable Chilean law</li>
                </ul>
            </div>

            <div id="limitations-en" class="border-l-4 border-purple-600 pl-4 mb-8 transition-all duration-300 hover:border-l-6 hover:pl-5">
                <h3 class="text-xl font-semibold mb-2">8. Limitations and Exclusions of Liability</h3>
                <p>The limitations and prohibitions of liability set in this Section and elsewhere in this disclaimer: (a) are subject to the preceding paragraph; and (b) govern all liabilities arising under the disclaimer, including liabilities arising in contract, in tort and for breach of statutory duty.</p>
                <p class="mt-2">To the extent that the website and the information and services on the website are provided free of charge, we will not be liable for any loss or damage of any nature.</p>
            </div>

            <div id="changes-en" class="border-l-4 border-purple-600 pl-4 mb-8 transition-all duration-300 hover:border-l-6 hover:pl-5">
                <h3 class="text-xl font-semibold mb-2">9. Changes to These Terms</h3>
                <p>These terms and conditions may be modified at any time. Changes will be posted on this website. It is your responsibility to periodically check these terms and conditions for changes. Your continued use of the website following the posting of changes to these terms and conditions will constitute your acceptance of those changes.</p>
            </div>
        </div>

        <!-- Back to top button -->
        <button id="backToTopBtn" class="fixed bottom-8 right-8 bg-purple-600 text-white p-3 rounded-full shadow-lg opacity-0 transition-opacity duration-300 hover:bg-purple-700">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
            </svg>
        </button>

        <!-- Add JavaScript for toggling between languages and other interactions -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Language toggle
                const toggle = document.getElementById('languageToggle');
                const spanishContent = document.getElementById('spanishContent');
                const englishContent = document.getElementById('englishContent');
                const spanishIndex = document.getElementById('spanishIndex');
                const englishIndex = document.getElementById('englishIndex');
                
                toggle.addEventListener('click', function() {
                    if (spanishContent.classList.contains('hidden')) {
                        // Switch to Spanish
                        spanishContent.classList.remove('hidden');
                        englishContent.classList.add('hidden');
                        spanishIndex.classList.remove('hidden');
                        englishIndex.classList.add('hidden');
                        toggle.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129" /></svg>Ver en Inglés';
                    } else {
                        // Switch to English
                        spanishContent.classList.add('hidden');
                        englishContent.classList.remove('hidden');
                        spanishIndex.classList.add('hidden');
                        englishIndex.classList.remove('hidden');
                        toggle.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129" /></svg>Ver en Español';
                    }
                });

                // Back to top button functionality
                const backToTopBtn = document.getElementById('backToTopBtn');
                
                // Show/hide back to top button based on scroll position
                window.addEventListener('scroll', function() {
                    if (window.pageYOffset > 300) {
                        backToTopBtn.classList.remove('opacity-0');
                        backToTopBtn.classList.add('opacity-100');
                    } else {
                        backToTopBtn.classList.remove('opacity-100');
                        backToTopBtn.classList.add('opacity-0');
                    }
                });
                
                // Scroll to top when button is clicked
                backToTopBtn.addEventListener('click', function() {
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                });

                // Smooth scrolling for anchor links
                document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                    anchor.addEventListener('click', function(e) {
                        e.preventDefault();
                        const targetId = this.getAttribute('href');
                        const targetElement = document.querySelector(targetId);
                        
                        if (targetElement) {
                            targetElement.scrollIntoView({
                                behavior: 'smooth',
                                block: 'start'
                            });
                            
                            // Add highlight effect
                            targetElement.classList.add('bg-purple-50');
                            setTimeout(() => {
                                targetElement.classList.remove('bg-purple-50');
                            }, 2000);
                        }
                    });
                });
            });
        </script>
    </div>
</section>
@endsection
