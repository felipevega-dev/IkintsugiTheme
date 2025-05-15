{{--
  Template Name: Política de Privacidad
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
            <h2 class="text-2xl md:text-3xl font-bold mb-4 md:mb-0">Política de Privacidad</h2>
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
                <a href="#data-collected-es" class="text-purple-600 hover:text-purple-800 transition-colors duration-200">2. Datos Recopilados</a>
                <a href="#embedded-content-es" class="text-purple-600 hover:text-purple-800 transition-colors duration-200">3. Contenido Incrustado</a>
                <a href="#cookies-es" class="text-purple-600 hover:text-purple-800 transition-colors duration-200">4. Cookies</a>
                <a href="#access-es" class="text-purple-600 hover:text-purple-800 transition-colors duration-200">5. Quién Tiene Acceso a Sus Datos</a>
                <a href="#third-party-es" class="text-purple-600 hover:text-purple-800 transition-colors duration-200">6. Acceso de Terceros a Sus Datos</a>
                <a href="#retention-es" class="text-purple-600 hover:text-purple-800 transition-colors duration-200">7. Cuánto Tiempo Conservamos Sus Datos</a>
                <a href="#security-es" class="text-purple-600 hover:text-purple-800 transition-colors duration-200">8. Medidas de Seguridad</a>
                <a href="#rights-es" class="text-purple-600 hover:text-purple-800 transition-colors duration-200">9. Sus Derechos de Datos</a>
                <a href="#third-websites-es" class="text-purple-600 hover:text-purple-800 transition-colors duration-200">10. Sitios Web de Terceros</a>
                <a href="#disclosure-es" class="text-purple-600 hover:text-purple-800 transition-colors duration-200">11. Divulgación de Sus Datos para Fines Legales</a>
                <a href="#updates-es" class="text-purple-600 hover:text-purple-800 transition-colors duration-200">12. Actualizaciones a Esta Política</a>
                <a href="#contact-es" class="text-purple-600 hover:text-purple-800 transition-colors duration-200">13. Contacto</a>
            </div>
            
            <div id="englishIndex" class="grid grid-cols-1 md:grid-cols-2 gap-2 hidden">
                <a href="#intro-en" class="text-purple-600 hover:text-purple-800 transition-colors duration-200">1. Introduction</a>
                <a href="#data-collected-en" class="text-purple-600 hover:text-purple-800 transition-colors duration-200">2. Data Collected</a>
                <a href="#embedded-content-en" class="text-purple-600 hover:text-purple-800 transition-colors duration-200">3. Embedded Content</a>
                <a href="#cookies-en" class="text-purple-600 hover:text-purple-800 transition-colors duration-200">4. Cookies</a>
                <a href="#access-en" class="text-purple-600 hover:text-purple-800 transition-colors duration-200">5. Who Has Access To Your Data</a>
                <a href="#third-party-en" class="text-purple-600 hover:text-purple-800 transition-colors duration-200">6. Third Party Access to Your Data</a>
                <a href="#retention-en" class="text-purple-600 hover:text-purple-800 transition-colors duration-200">7. How Long We Retain Your Data For</a>
                <a href="#security-en" class="text-purple-600 hover:text-purple-800 transition-colors duration-200">8. Security Measures</a>
                <a href="#rights-en" class="text-purple-600 hover:text-purple-800 transition-colors duration-200">9. Your Data Rights</a>
                <a href="#third-websites-en" class="text-purple-600 hover:text-purple-800 transition-colors duration-200">10. Third Party Websites</a>
                <a href="#disclosure-en" class="text-purple-600 hover:text-purple-800 transition-colors duration-200">11. Release of Your Data for Legal Purposes</a>
                <a href="#updates-en" class="text-purple-600 hover:text-purple-800 transition-colors duration-200">12. Updates to This Policy</a>
                <a href="#contact-en" class="text-purple-600 hover:text-purple-800 transition-colors duration-200">13. Contact</a>
            </div>
        </div>

        <!-- Spanish Content -->
        <div id="spanishContent" class="space-y-8">
            <div id="intro-es" class="border-l-4 border-purple-600 pl-4 mb-8 transition-all duration-300 hover:border-l-6 hover:pl-5">
                <h3 class="text-xl font-semibold mb-2">1. Introducción</h3>
                <p>Agradecemos su confianza en nuestro sitio web. Esta Política de Privacidad está diseñada para informarle sobre cómo recopilamos, utilizamos y protegemos su información personal cuando utiliza nuestro sitio web y los servicios que ofrecemos. Esta política se ha desarrollado en conformidad con la Ley 19.628 sobre Protección de la Vida Privada de Chile. Al acceder a este sitio web, asumimos que acepta esta Política de Privacidad en su totalidad. Por favor, léala cuidadosamente antes de proporcionar cualquier información personal.</p>
            </div>

            <div id="data-collected-es" class="border-l-4 border-purple-600 pl-4 mb-8 transition-all duration-300 hover:border-l-6 hover:pl-5">
                <h3 class="text-xl font-semibold mb-2">2. Datos Recopilados</h3>
                
                <h4 class="text-lg font-medium mt-4">Ubicación de Almacenamiento de Datos</h4>
                <p>Nuestro sitio web está alojado en servidores seguros en Chile o países con niveles adecuados de protección de datos. Nos aseguramos de que sus datos se almacenen de forma segura y en cumplimiento con la Ley 19.628 sobre Protección de la Vida Privada de Chile.</p>
                
                <h4 class="text-lg font-medium mt-4">Datos de Registro</h4>
                <p>Si se registra en nuestro sitio web, almacenamos su nombre, dirección de correo electrónico y cualquier información personal adicional que añada a su perfil de usuario. Puede ver, editar o eliminar su información personal en cualquier momento (excepto cambiar su nombre de usuario). Los administradores del sitio web también pueden ver y editar esta información cuando sea necesario para brindarle soporte.</p>
                
                <h4 class="text-lg font-medium mt-4">Datos de Compra y Reserva</h4>
                <p>Cuando realiza una compra a través de nuestro sistema WooCommerce o una reserva mediante Bookly, recopilamos la información necesaria para procesar su transacción o reserva, incluyendo su nombre, información de contacto y detalles de pago. Esta información se almacena de forma segura y es necesaria para proporcionarle nuestros productos y servicios.</p>
                
                <h4 class="text-lg font-medium mt-4">Datos de Pago</h4>
                <p>Utilizamos WebPay Plus para procesar los pagos. Cuando realiza un pago, la transacción es manejada directamente por WebPay Plus, que tiene sus propias políticas de privacidad y seguridad. Nosotros no almacenamos sus datos completos de tarjeta de crédito en nuestros servidores.</p>
                
                <h4 class="text-lg font-medium mt-4">Comunicación por WhatsApp</h4>
                <p>Si utiliza nuestro botón de WhatsApp proporcionado por el plugin de Ninja Team, acepta ser redirigido al servicio de WhatsApp. La comunicación a través de WhatsApp está sujeta a las políticas de privacidad de WhatsApp. Solo utilizamos esta información para responder a sus consultas y mejorar nuestro servicio al cliente.</p>
                
                <h4 class="text-lg font-medium mt-4">Comentarios</h4>
                <p>Cuando deja comentarios en el sitio web, recopilamos los datos mostrados en el formulario de comentarios, así como la dirección IP y la cadena del agente de usuario del navegador para ayudar a la detección de spam.</p>
                
                <h4 class="text-lg font-medium mt-4">Formulario de Contacto</h4>
                <p>La información enviada a través del formulario de contacto en nuestro sitio se envía a nuestro correo electrónico empresarial. Esta información se mantiene solo para fines de servicio al cliente, nunca se utiliza para fines de marketing no solicitados ni se comparte con terceros sin su consentimiento.</p>
                
                <h4 class="text-lg font-medium mt-4">Datos de Navegación y Análisis</h4>
                <p>Recopilamos datos anónimos sobre cómo los visitantes interactúan con nuestro sitio para mejorar la experiencia del usuario. Estos datos no contienen información de identificación personal.</p>
                
                <h4 class="text-lg font-medium mt-4">Casos de Uso de los Datos Personales</h4>
                <p>Utilizamos su información personal en los siguientes casos:</p>
                <ul class="list-disc pl-6 mt-2">
                    <li>Para procesar sus compras y reservas</li>
                    <li>Para proporcionar y mejorar nuestros servicios</li>
                    <li>Para verificar su identidad cuando accede a su cuenta</li>
                    <li>Para proporcionar asistencia técnica y atención al cliente</li>
                    <li>Para enviar actualizaciones e información importante sobre nuestros servicios</li>
                    <li>Para prevenir transacciones fraudulentas y garantizar la seguridad de nuestro sitio</li>
                    <li>Para personalizar su experiencia en nuestro sitio web</li>
                    <li>Para cumplir con obligaciones legales según la legislación chilena</li>
                </ul>
            </div>

            <div id="embedded-content-es" class="border-l-4 border-purple-600 pl-4 mb-8 transition-all duration-300 hover:border-l-6 hover:pl-5">
                <h3 class="text-xl font-semibold mb-2">3. Contenido Incrustado</h3>
                <p>Las páginas de este sitio pueden incluir contenido incrustado, como videos de YouTube, mapas de Google Maps, imágenes de Instagram u otros recursos. El contenido incrustado de otros sitios web se comporta exactamente de la misma manera que si visitara el otro sitio web. Estos sitios web pueden recopilar datos sobre usted, utilizar cookies, incrustar seguimiento adicional de terceros y supervisar su interacción con ese contenido incrustado, incluido el seguimiento de su interacción con el contenido incrustado si tiene una cuenta y ha iniciado sesión en ese sitio web. A continuación puede encontrar una lista de los servicios que utilizamos:</p>
                
                <h4 class="text-lg font-medium mt-4">Facebook</h4>
                <p>Podemos mostrar contenido de Facebook en nuestro sitio. Facebook tiene sus propias políticas de cookies y privacidad sobre las que no tenemos control. No hay instalación de cookies de Facebook y su IP no se envía a un servidor de Facebook hasta que usted interactúe con este contenido. Consulte su política de privacidad aquí: <a href="https://www.facebook.com/policy.php" class="text-purple-600 hover:underline" target="_blank">Política de Privacidad de Facebook</a>.</p>
                
                <h4 class="text-lg font-medium mt-4">WhatsApp</h4>
                <p>Utilizamos un plugin de WhatsApp desarrollado por Ninja Team para facilitar la comunicación directa con nuestros clientes. Al utilizar esta función, su interacción está sujeta a la política de privacidad de WhatsApp. Puede consultar su política de privacidad aquí: <a href="https://www.whatsapp.com/legal/privacy-policy" class="text-purple-600 hover:underline" target="_blank">Política de Privacidad de WhatsApp</a>.</p>
                
                <h4 class="text-lg font-medium mt-4">Instagram</h4>
                <p>Mostramos imágenes y feeds de Instagram en nuestro sitio para compartir nuestro contenido visual. Instagram tiene sus propias políticas de cookies y privacidad sobre las que no tenemos control. Su información no se comparte con Instagram hasta que usted interactúe con el contenido incrustado. Consulte su política de privacidad aquí: <a href="https://help.instagram.com/519522125107875" class="text-purple-600 hover:underline" target="_blank">Política de Privacidad de Instagram</a>.</p>

                <h4 class="text-lg font-medium mt-4">LinkedIn</h4>
                <p>Incluimos contenido de LinkedIn en nuestro sitio para compartir información profesional y noticias del sector. LinkedIn tiene sus propias políticas de cookies y privacidad sobre las que no tenemos control. Sus datos no se comparten con LinkedIn hasta que usted interactúe con estos elementos. Consulte su política de privacidad aquí: <a href="https://www.linkedin.com/legal/privacy-policy" class="text-purple-600 hover:underline" target="_blank">Política de Privacidad de LinkedIn</a>.</p>

                <h4 class="text-lg font-medium mt-4">Spotify</h4>
                <p>Incrustamos reproductores de Spotify en nuestro sitio para compartir contenido de audio relevante. Spotify tiene sus propias políticas de cookies y privacidad. No se comparte información con Spotify hasta que usted interactúe con el reproductor. Consulte su política de privacidad aquí: <a href="https://www.spotify.com/legal/privacy-policy/" class="text-purple-600 hover:underline" target="_blank">Política de Privacidad de Spotify</a>.</p>

                <h4 class="text-lg font-medium mt-4">TikTok</h4>
                <p>Mostramos contenido de TikTok en nuestro sitio para compartir videos cortos relacionados con nuestros servicios. TikTok tiene sus propias políticas de cookies y privacidad. No hay transferencia de datos a TikTok hasta que usted interactúe con el contenido incrustado. Consulte su política de privacidad aquí: <a href="https://www.tiktok.com/legal/privacy-policy" class="text-purple-600 hover:underline" target="_blank">Política de Privacidad de TikTok</a>.</p>
                
                <h4 class="text-lg font-medium mt-4">Youtube</h4>
                <p>Incluimos videos de YouTube incrustados en nuestro sitio para mostrar contenido educativo y demostraciones. YouTube tiene sus propias políticas de cookies y privacidad sobre las que no tenemos control. No hay instalación de cookies de YouTube y su IP no se envía a un servidor de YouTube hasta que usted interactúe con el video. Consulte su política de privacidad aquí: <a href="https://policies.google.com/privacy" class="text-purple-600 hover:underline" target="_blank">Política de Privacidad de YouTube</a>.</p>
                
                <h4 class="text-lg font-medium mt-4">Google Maps</h4>
                <p>Utilizamos Google Maps para mostrar la ubicación de nuestras instalaciones. Google tiene sus propias políticas de privacidad y cookies. Al interactuar con mapas incrustados, está sujeto a la política de privacidad de Google. Consulte su política de privacidad aquí: <a href="https://policies.google.com/privacy" class="text-purple-600 hover:underline" target="_blank">Política de Privacidad de Google</a>.</p>
            </div>

            <div id="cookies-es" class="border-l-4 border-purple-600 pl-4 mb-8 transition-all duration-300 hover:border-l-6 hover:pl-5">
                <h3 class="text-xl font-semibold mb-2">4. Cookies</h3>
                <p>Este sitio utiliza cookies – pequeños archivos de texto que se colocan en su dispositivo para ayudar al sitio a proporcionar una mejor experiencia de usuario. En general, las cookies se utilizan para retener las preferencias del usuario, almacenar información para cosas como carritos de compras y proporcionar datos de seguimiento anonimizados para mejorar nuestra web. Las cookies generalmente existen para mejorar su experiencia de navegación. Sin embargo, es posible que prefiera deshabilitar las cookies en este sitio y en otros. La forma más efectiva de hacer esto es deshabilitar las cookies en su navegador. Sugerimos consultar la sección de ayuda de su navegador.</p>
                
                <h4 class="text-lg font-medium mt-4">Cookies Necesarias (todos los visitantes del sitio)</h4>
                <p>WordPress y WooCommerce utilizan cookies esenciales para el funcionamiento básico del sitio, como las siguientes:</p>
                <ul class="list-disc pl-6 mt-2">
                    <li>PHPSESSID: Para identificar su sesión única en el sitio web.</li>
                    <li>woocommerce_cart_hash: Ayuda a WooCommerce a determinar cuándo cambia el contenido del carrito.</li>
                    <li>woocommerce_items_in_cart: Ayuda a WooCommerce a determinar cuándo cambia el contenido del carrito.</li>
                    <li>wp_woocommerce_session_: Contiene un código único para cada cliente para que sepa dónde encontrar los datos del carrito en la base de datos.</li>
                    <li>cookielawinfo-checkbox-necessary: Se utiliza para recordar su elección sobre aceptar cookies.</li>
                    <li>cookielawinfo-checkbox-functional: Se utiliza para recordar su elección sobre aceptar cookies funcionales.</li>
                </ul>
                
                <h4 class="text-lg font-medium mt-4">Cookies Adicionales para Usuarios Registrados</h4>
                <ul class="list-disc pl-6 mt-2">
                    <li>wp-auth: Utilizado por WordPress para autenticar a los visitantes conectados, autenticación de contraseña y verificación de usuario.</li>
                    <li>wordpress_logged_in_{hash}: Utilizado por WordPress para autenticar a los visitantes conectados.</li>
                    <li>wordpress_test_cookie: Utilizado por WordPress para asegurar que las cookies están funcionando correctamente.</li>
                    <li>wp-settings-[UID]: WordPress utiliza estas cookies para personalizar su vista de la interfaz de administración y posiblemente también la interfaz principal del sitio.</li>
                </ul>
                
                <h4 class="text-lg font-medium mt-4">Cookies de Bookly</h4>
                <p>Nuestro sistema de reservas Bookly utiliza cookies para guardar la información de su sesión y facilitar el proceso de reserva.</p>
            </div>

            <div id="access-es" class="border-l-4 border-purple-600 pl-4 mb-8 transition-all duration-300 hover:border-l-6 hover:pl-5">
                <h3 class="text-xl font-semibold mb-2">5. Quién Tiene Acceso a Sus Datos</h3>
                <p>Si no es un cliente registrado para nuestro sitio, la información personal que recopilamos es limitada. Si es un cliente con una cuenta registrada, su información personal puede ser accedida por:</p>
                <ul class="list-disc pl-6 mt-2">
                    <li>Nuestros administradores del sitio web y personal autorizado.</li>
                    <li>Nuestro personal de atención al cliente cuando necesitan acceder a la información para proporcionarle asistencia.</li>
                    <li>Nuestros procesadores de pago, únicamente para procesar sus transacciones.</li>
                    <li>Nuestro sistema de reservas Bookly, para gestionar sus citas.</li>
                </ul>
                <p>Todos los miembros de nuestro equipo que tienen acceso a sus datos han sido formados para mantener la confidencialidad de la información del cliente.</p>
            </div>

            <div id="third-party-es" class="border-l-4 border-purple-600 pl-4 mb-8 transition-all duration-300 hover:border-l-6 hover:pl-5">
                <h3 class="text-xl font-semibold mb-2">6. Acceso de Terceros a Sus Datos</h3>
                <p>No compartimos sus datos con terceros de manera que revelen cualquier información personal suya como correo electrónico, nombre, etc., excepto cuando sea necesario para proporcionarle nuestros servicios. Las siguientes son las entidades de terceros con las que podemos compartir datos limitados:</p>
                
                <h4 class="text-lg font-medium mt-4">WooCommerce</h4>
                <p>Utilizamos WooCommerce para gestionar nuestras ventas online. WooCommerce procesa los datos de su pedido para facilitar las compras en nuestro sitio. Puede consultar la política de privacidad de WooCommerce aquí: <a href="https://woocommerce.com/privacy-policy/" class="text-purple-600 hover:underline" target="_blank">Política de Privacidad de WooCommerce</a>.</p>
                
                <h4 class="text-lg font-medium mt-4">WebPay Plus</h4>
                <p>Utilizamos WebPay Plus para procesar pagos seguros. Cuando realiza un pago, se comparten los datos necesarios para procesar la transacción. Puede consultar su política de privacidad para obtener más información sobre cómo manejan sus datos.</p>
                
                <h4 class="text-lg font-medium mt-4">Bookly</h4>
                <p>Utilizamos Bookly para gestionar las reservas y citas. Los datos que proporciona durante el proceso de reserva se almacenan en nuestro sistema para administrar sus citas.</p>
                
                <h4 class="text-lg font-medium mt-4">WordPress</h4>
                <p>Nuestro sitio está construido sobre WordPress, que puede recopilar cierta información para el funcionamiento del sitio. WordPress está comprometido con la privacidad del usuario. Puede consultar más información en: <a href="https://wordpress.org/about/privacy/" class="text-purple-600 hover:underline" target="_blank">Política de Privacidad de WordPress</a>.</p>
            </div>

            <div id="retention-es" class="border-l-4 border-purple-600 pl-4 mb-8 transition-all duration-300 hover:border-l-6 hover:pl-5">
                <h3 class="text-xl font-semibold mb-2">7. Cuánto Tiempo Conservamos Sus Datos</h3>
                <p>Para usuarios que se registran en nuestro sitio web (si los hay), almacenamos la información personal que proporcionan en su perfil de usuario. Todos los usuarios pueden ver, editar o eliminar su información personal en cualquier momento (excepto que no pueden cambiar su nombre de usuario). Los administradores del sitio web también pueden ver y editar esa información.</p>
                <p>Para pedidos realizados a través de WooCommerce, conservamos la información del pedido para fines de contabilidad, fiscales y de servicio al cliente durante el tiempo requerido por la ley.</p>
                <p>Para las citas reservadas a través de Bookly, mantenemos los registros para gestionar sus citas actuales y futuras, y para referencia histórica de servicios proporcionados.</p>
                <p>Si deja comentarios, estos y sus metadatos se conservan indefinidamente. Esto es para que podamos reconocer y aprobar automáticamente cualquier comentario de seguimiento en lugar de mantenerlos en una cola de moderación.</p>
            </div>

            <div id="security-es" class="border-l-4 border-purple-600 pl-4 mb-8 transition-all duration-300 hover:border-l-6 hover:pl-5">
                <h3 class="text-xl font-semibold mb-2">8. Medidas de Seguridad</h3>
                <p>Utilizamos el protocolo SSL/HTTPS en todo nuestro sitio. Esto cifra nuestras comunicaciones con los servidores para que la información de identificación personal no sea capturada por terceros sin autorización. Tomamos medidas razonables para proteger su información personal contra pérdida, robo, uso indebido, acceso no autorizado, divulgación, alteración y destrucción.</p>
                <p>En caso de una violación de datos, nuestros administradores tomarán inmediatamente todas las medidas necesarias para garantizar la integridad del sistema, contactarán a los usuarios afectados e intentarán mitigar cualquier impacto potencial.</p>
                <p>Para las transacciones de pago, utilizamos WebPay Plus, que cumple con los estándares de seguridad de la industria para el procesamiento de pagos.</p>
            </div>

            <div id="rights-es" class="border-l-4 border-purple-600 pl-4 mb-8 transition-all duration-300 hover:border-l-6 hover:pl-5">
                <h3 class="text-xl font-semibold mb-2">9. Sus Derechos de Datos</h3>
                
                <h4 class="text-lg font-medium mt-4">Derechos Generales</h4>
                <p>Si tiene una cuenta en este sitio o ha dejado comentarios, puede solicitar recibir un archivo exportado de los datos personales que tenemos sobre usted, incluyendo cualquier dato que nos haya proporcionado. También puede solicitar que eliminemos cualquier dato personal que tengamos sobre usted. Esto no incluye ningún dato que estemos obligados a conservar por razones administrativas, legales o de seguridad.</p>
                <p>Conforme a la Ley 19.628 sobre Protección de la Vida Privada de Chile, sus derechos incluyen:</p>
                <ul class="list-disc pl-6 mt-2">
                    <li>Derecho de acceso: Tiene derecho a solicitar y obtener información sobre sus datos personales, su origen y destinatarios, el propósito para el cual se almacenan y la identidad de las personas u organismos a los cuales se transmiten regularmente</li>
                    <li>Derecho de modificación: Puede solicitar la corrección o modificación de sus datos personales cuando sean erróneos, inexactos, equívocos o incompletos</li>
                    <li>Derecho de cancelación o eliminación: Tiene derecho a exigir que sus datos sean cancelados o eliminados cuando su almacenamiento carezca de fundamento legal o cuando estén caducos</li>
                    <li>Derecho de bloqueo: Puede solicitar el bloqueo temporal de sus datos cuando su exactitud no pueda ser establecida o su vigencia sea dudosa</li>
                    <li>Derecho a oponerse: Tiene derecho a oponerse a la utilización de sus datos personales para fines de publicidad, marketing o encuestas</li>
                </ul>
                
                <h4 class="text-lg font-medium mt-4">Protección de Datos en Chile</h4>
                <p>Su privacidad es de vital importancia para nosotros. Nos comprometemos a cumplir con la Ley 19.628 sobre Protección de la Vida Privada y otras regulaciones aplicables en Chile relacionadas con la protección de datos personales. Para ejercer cualquiera de sus derechos o para más información sobre sus derechos bajo la ley chilena, puede consultar: <a href="https://www.bcn.cl/leychile/navegar?idNorma=141599" class="text-purple-600 hover:underline" target="_blank">Ley 19.628 sobre Protección de la Vida Privada</a> o contactarnos directamente a través de los medios indicados en la sección de contacto.</p>
            </div>

            <div id="third-websites-es" class="border-l-4 border-purple-600 pl-4 mb-8 transition-all duration-300 hover:border-l-6 hover:pl-5">
                <h3 class="text-xl font-semibold mb-2">10. Sitios Web de Terceros</h3>
                <p>Nuestro sitio web puede contener enlaces a sitios web externos que no son operados por nosotros. Si hace clic en un enlace de terceros, será dirigido al sitio de ese tercero. Le recomendamos encarecidamente que revise la Política de Privacidad de cada sitio que visite.</p>
                <p>No tenemos control ni asumimos responsabilidad alguna por el contenido, las políticas de privacidad o las prácticas de sitios web o servicios de terceros. Todos los enlaces para compartir en redes sociales, ya sea que se muestren como enlaces de texto o iconos de redes sociales, no lo conectan a ninguna de las terceras partes asociadas a menos que haga clic explícitamente en ellos.</p>
            </div>

            <div id="disclosure-es" class="border-l-4 border-purple-600 pl-4 mb-8 transition-all duration-300 hover:border-l-6 hover:pl-5">
                <h3 class="text-xl font-semibold mb-2">11. Divulgación de Sus Datos para Fines Legales</h3>
                <p>Puede que tengamos que divulgar su información personal en ciertas circunstancias:</p>
                <ul class="list-disc pl-6 mt-2">
                    <li>Para cumplir con un requisito legal, como una ley, regulación, proceso legal, o solicitud gubernamental aplicable.</li>
                    <li>Para hacer cumplir nuestras condiciones de servicio, incluida la investigación de posibles violaciones.</li>
                    <li>Para detectar, prevenir o abordar fraude, problemas de seguridad o técnicos.</li>
                    <li>Para proteger contra daños a los derechos, propiedad o seguridad de nuestra empresa, nuestros usuarios o el público, según lo requiera o permita la ley.</li>
                </ul>
                <p>Cualquier transmisión de datos personales para fines legales solo se realizará de conformidad con las leyes aplicables de protección de datos.</p>
            </div>
            
            <div id="updates-es" class="border-l-4 border-purple-600 pl-4 mb-8 transition-all duration-300 hover:border-l-6 hover:pl-5">
                <h3 class="text-xl font-semibold mb-2">12. Actualizaciones a Esta Política</h3>
                <p>Podemos actualizar nuestra Política de Privacidad de vez en cuando. Le notificaremos cualquier cambio publicando la nueva Política de Privacidad en esta página y, si los cambios son significativos, le proporcionaremos un aviso más prominente.</p>
                <p>Le recomendamos que revise esta Política de Privacidad periódicamente para cualquier cambio. Los cambios a esta Política de Privacidad son efectivos cuando se publican en esta página.</p>
            </div>
            
            <div id="contact-es" class="border-l-4 border-purple-600 pl-4 mb-8 transition-all duration-300 hover:border-l-6 hover:pl-5">
                <h3 class="text-xl font-semibold mb-2">13. Contacto</h3>
                <p>Si tiene alguna pregunta sobre esta Política de Privacidad, puede contactarnos:</p>
                <ul class="list-disc pl-6 mt-2">
                    <li>A través de nuestro formulario de contacto en el sitio web</li>
                    <li>Por WhatsApp utilizando el botón de chat en nuestro sitio</li>
                    <li>Por correo electrónico a la dirección proporcionada en nuestra sección de contacto</li>
                </ul>
            </div>
        </div>

        <!-- English Content -->
        <div id="englishContent" class="space-y-8 hidden" data-aos="fade-in">
            <div id="intro-en" class="border-l-4 border-purple-600 pl-4 mb-8 transition-all duration-300 hover:border-l-6 hover:pl-5">
                <h3 class="text-xl font-semibold mb-2">1. Introduction</h3>
                <p>We appreciate your trust in our website. This Privacy Policy is designed to inform you about how we collect, use, and protect your personal information when you use our website and the services we offer. This policy has been developed in accordance with Law 19.628 on Protection of Private Life in Chile. By accessing this website, we assume you accept this Privacy Policy in full. Please read it carefully before providing any personal information.</p>
            </div>

            <div id="data-collected-en" class="border-l-4 border-purple-600 pl-4 mb-8 transition-all duration-300 hover:border-l-6 hover:pl-5">
                <h3 class="text-xl font-semibold mb-2">2. Data Collected</h3>
                
                <h4 class="text-lg font-medium mt-4">Data Storage Location</h4>
                <p>Our website is hosted on secure servers in Chile or countries with adequate levels of data protection. We ensure that your data is stored securely and in compliance with Law 19.628 on Protection of Private Life in Chile.</p>
                
                <h4 class="text-lg font-medium mt-4">Registration Data</h4>
                <p>If you register on our website, we store your name, email address, and any additional personal information you add to your user profile. You can view, edit, or delete your personal information at any time (except changing your username). Website administrators can also view and edit this information.</p>
                
                <h4 class="text-lg font-medium mt-4">Purchase and Booking Data</h4>
                <p>When you make a purchase through our WooCommerce system or a booking through Bookly, we collect the information necessary to process your transaction or booking, including your name, contact information, and payment details. This information is stored securely and is necessary to provide you with our products and services.</p>
                
                <h4 class="text-lg font-medium mt-4">Payment Data</h4>
                <p>We use WebPay Plus to process payments. When you make a payment, the transaction is handled directly by WebPay Plus, which has its own privacy and security policies. We do not store your complete credit card data on our servers.</p>
                
                <h4 class="text-lg font-medium mt-4">WhatsApp Communication</h4>
                <p>If you use our WhatsApp button provided by the Ninja Team plugin, you agree to be redirected to the WhatsApp service. Communication through WhatsApp is subject to WhatsApp's privacy policies. We only use this information to respond to your inquiries and improve our customer service.</p>
                
                <h4 class="text-lg font-medium mt-4">Comments</h4>
                <p>When you leave comments on the website, we collect the data shown in the comments form, as well as your IP address and browser user agent string to help with spam detection.</p>
                
                <h4 class="text-lg font-medium mt-4">Contact Form</h4>
                <p>Information submitted through the contact form on our site is sent to our business email. This information is kept only for customer service purposes, never used for unsolicited marketing purposes, and not shared with third parties without your consent.</p>
                
                <h4 class="text-lg font-medium mt-4">Browsing and Analytics Data</h4>
                <p>We collect anonymous data about how visitors interact with our site to improve the user experience. This data does not contain personally identifiable information.</p>
                
                <h4 class="text-lg font-medium mt-4">Cases for Using the Personal Data</h4>
                <p>We use your personal information in the following cases:</p>
                <ul class="list-disc pl-6 mt-2">
                    <li>To process your purchases and bookings</li>
                    <li>To provide and improve our services</li>
                    <li>To verify your identity when accessing your account</li>
                    <li>To provide technical assistance and customer service</li>
                    <li>To send updates and important information about our services</li>
                    <li>To prevent fraudulent transactions and ensure the security of our site</li>
                    <li>To personalize your experience on our website</li>
                    <li>To comply with legal obligations under Chilean legislation</li>
                </ul>
            </div>

            <div id="embedded-content-en" class="border-l-4 border-purple-600 pl-4 mb-8 transition-all duration-300 hover:border-l-6 hover:pl-5">
                <h3 class="text-xl font-semibold mb-2">3. Embedded Content</h3>
                <p>Pages on this site may include embedded content, such as YouTube videos, Google Maps, Instagram images, or other resources. Embedded content from other websites behaves in the exact same way as if you visited the other website. These websites may collect data about you, use cookies, embed additional third-party tracking, and monitor your interaction with that embedded content, including tracking your interaction with the embedded content if you have an account and are logged in to that website. Below you can find a list of the services we use:</p>
                
                <h4 class="text-lg font-medium mt-4">Facebook</h4>
                <p>We may display Facebook content on our site. Facebook has its own cookie and privacy policies over which we have no control. No Facebook cookies are installed and your IP is not sent to a Facebook server until you interact with this content. See their privacy policy here: <a href="https://www.facebook.com/policy.php" class="text-purple-600 hover:underline" target="_blank">Facebook Privacy Policy</a>.</p>
                
                <h4 class="text-lg font-medium mt-4">WhatsApp</h4>
                <p>We use a WhatsApp plugin developed by Ninja Team to facilitate direct communication with our customers. By using this feature, your interaction is subject to WhatsApp's privacy policy. You can view their privacy policy here: <a href="https://www.whatsapp.com/legal/privacy-policy" class="text-purple-600 hover:underline" target="_blank">WhatsApp Privacy Policy</a>.</p>
                
                <h4 class="text-lg font-medium mt-4">Instagram</h4>
                <p>We display Instagram images and feeds on our site to share our visual content. Instagram has its own cookie and privacy policies over which we have no control. Your information is not shared with Instagram until you interact with the embedded content. See their privacy policy here: <a href="https://help.instagram.com/519522125107875" class="text-purple-600 hover:underline" target="_blank">Instagram Privacy Policy</a>.</p>

                <h4 class="text-lg font-medium mt-4">LinkedIn</h4>
                <p>We include LinkedIn content on our site to share professional information and industry news. LinkedIn has its own cookie and privacy policies over which we have no control. Your data is not shared with LinkedIn until you interact with these elements. See their privacy policy here: <a href="https://www.linkedin.com/legal/privacy-policy" class="text-purple-600 hover:underline" target="_blank">LinkedIn Privacy Policy</a>.</p>

                <h4 class="text-lg font-medium mt-4">Spotify</h4>
                <p>We embed Spotify players on our site to share relevant audio content. Spotify has its own cookie and privacy policies. No information is shared with Spotify until you interact with the player. See their privacy policy here: <a href="https://www.spotify.com/legal/privacy-policy/" class="text-purple-600 hover:underline" target="_blank">Spotify Privacy Policy</a>.</p>

                <h4 class="text-lg font-medium mt-4">TikTok</h4>
                <p>We display TikTok content on our site to share short videos related to our services. TikTok has its own cookie and privacy policies. No data is transferred to TikTok until you interact with the embedded content. See their privacy policy here: <a href="https://www.tiktok.com/legal/privacy-policy" class="text-purple-600 hover:underline" target="_blank">TikTok Privacy Policy</a>.</p>
                
                <h4 class="text-lg font-medium mt-4">Youtube</h4>
                <p>We include YouTube videos embedded on our site to show educational content and demonstrations. YouTube has its own cookie and privacy policies over which we have no control. No YouTube cookies are installed and your IP is not sent to a YouTube server until you interact with the video. See their privacy policy here: <a href="https://policies.google.com/privacy" class="text-purple-600 hover:underline" target="_blank">YouTube Privacy Policy</a>.</p>
                
                <h4 class="text-lg font-medium mt-4">Google Maps</h4>
                <p>We use Google Maps to display the location of our facilities. Google has its own privacy and cookie policies. When interacting with embedded maps, you are subject to Google's privacy policy. See their privacy policy here: <a href="https://policies.google.com/privacy" class="text-purple-600 hover:underline" target="_blank">Google Privacy Policy</a>.</p>
            </div>

            <div id="cookies-en" class="border-l-4 border-purple-600 pl-4 mb-8 transition-all duration-300 hover:border-l-6 hover:pl-5">
                <h3 class="text-xl font-semibold mb-2">4. Cookies</h3>
                <p>This site uses cookies – small text files that are placed on your device to help the site provide a better user experience. In general, cookies are used to retain user preferences, store information for things like shopping carts, and provide anonymized tracking data to improve our website. Cookies generally exist to make your browsing experience better. However, you may prefer to disable cookies on this site and on others. The most effective way to do this is to disable cookies in your browser. We suggest consulting the help section of your browser.</p>
                
                <h4 class="text-lg font-medium mt-4">Necessary Cookies (all site visitors)</h4>
                <p>WordPress and WooCommerce use essential cookies for the basic functioning of the site, such as the following:</p>
                <ul class="list-disc pl-6 mt-2">
                    <li>PHPSESSID: To identify your unique session on the website.</li>
                    <li>woocommerce_cart_hash: Helps WooCommerce determine when cart contents change.</li>
                    <li>woocommerce_items_in_cart: Helps WooCommerce determine when cart contents change.</li>
                    <li>wp_woocommerce_session_: Contains a unique code for each customer so it knows where to find the cart data in the database.</li>
                    <li>cookielawinfo-checkbox-necessary: Used to remember your choice about accepting cookies.</li>
                    <li>cookielawinfo-checkbox-functional: Used to remember your choice about accepting functional cookies.</li>
                </ul>
                
                <h4 class="text-lg font-medium mt-4">Additional Cookies for Registered Users</h4>
                <ul class="list-disc pl-6 mt-2">
                    <li>wp-auth: Used by WordPress to authenticate logged-in visitors, password authentication, and user verification.</li>
                    <li>wordpress_logged_in_{hash}: Used by WordPress to authenticate logged-in visitors.</li>
                    <li>wordpress_test_cookie: Used by WordPress to ensure cookies are working correctly.</li>
                    <li>wp-settings-[UID]: WordPress uses these cookies to customize your view of the admin interface and possibly also the main site interface.</li>
                </ul>
                
                <h4 class="text-lg font-medium mt-4">Bookly Cookies</h4>
                <p>Our Bookly reservation system uses cookies to save your session information and facilitate the booking process.</p>
            </div>

            <div id="access-en" class="border-l-4 border-purple-600 pl-4 mb-8 transition-all duration-300 hover:border-l-6 hover:pl-5">
                <h3 class="text-xl font-semibold mb-2">5. Who Has Access To Your Data</h3>
                <p>If you are not a registered customer for our site, the personal information we collect is limited. If you are a customer with a registered account, your personal information can be accessed by:</p>
                <ul class="list-disc pl-6 mt-2">
                    <li>Our website administrators and authorized personnel.</li>
                    <li>Our customer service staff when they need to access information to provide you with assistance.</li>
                </ul>
            </div>

            <div id="third-party-en" class="border-l-4 border-purple-600 pl-4 mb-8 transition-all duration-300 hover:border-l-6 hover:pl-5">
                <h3 class="text-xl font-semibold mb-2">6. Third Party Access to Your Data</h3>
                <p>We don't share your data with third parties in a way that would reveal any of your personal information like email, name, etc., except when necessary to provide you with our services. The following are the third-party entities with which we may share limited data:</p>
                
                <h4 class="text-lg font-medium mt-4">WooCommerce</h4>
                <p>We use WooCommerce to manage our online sales. WooCommerce processes your order data to facilitate purchases on our site. You can view WooCommerce's privacy policy here: <a href="https://woocommerce.com/privacy-policy/" class="text-purple-600 hover:underline" target="_blank">WooCommerce Privacy Policy</a>.</p>
                
                <h4 class="text-lg font-medium mt-4">WebPay Plus</h4>
                <p>We use WebPay Plus to process secure payments. When you make a payment, the necessary data to process the transaction is shared. You can view their privacy policy for more information on how they handle your data.</p>
                
                <h4 class="text-lg font-medium mt-4">Bookly</h4>
                <p>We use Bookly to manage bookings and appointments. The data you provide during the booking process is stored in our system to manage your appointments.</p>
                
                <h4 class="text-lg font-medium mt-4">WordPress</h4>
                <p>Our site is built on WordPress, which may collect certain information for the operation of the site. WordPress is committed to user privacy. You can find more information at: <a href="https://wordpress.org/about/privacy/" class="text-purple-600 hover:underline" target="_blank">WordPress Privacy Policy</a>.</p>
            </div>

            <div id="retention-en" class="border-l-4 border-purple-600 pl-4 mb-8 transition-all duration-300 hover:border-l-6 hover:pl-5">
                <h3 class="text-xl font-semibold mb-2">7. How Long We Retain Your Data For</h3>
                <p>For users who register on our website (if any), we store the personal information they provide in their user profile. All users can see, edit, or delete their personal information at any time (except they cannot change their username). Website administrators can also see and edit that information.</p>
                <p>For orders placed through WooCommerce, we retain order information for accounting, tax, and customer service purposes for the time required by law.</p>
                <p>For appointments booked through Bookly, we maintain records to manage your current and future appointments, and for historical reference of services provided.</p>
                <p>If you leave comments, the comments and their metadata are retained indefinitely. This is so we can recognize and approve any follow-up comments automatically instead of holding them in a moderation queue.</p>
            </div>

            <div id="security-en" class="border-l-4 border-purple-600 pl-4 mb-8 transition-all duration-300 hover:border-l-6 hover:pl-5">
                <h3 class="text-xl font-semibold mb-2">8. Security Measures</h3>
                <p>We use SSL/HTTPS protocol throughout our site. This encrypts our communications with the servers so that personally identifiable information is not captured by unauthorized third parties. We take reasonable measures to protect your personal information against loss, theft, misuse, unauthorized access, disclosure, alteration, and destruction.</p>
                <p>In case of a data breach, our administrators will immediately take all necessary steps to ensure system integrity, contact affected users, and attempt to mitigate any potential impact.</p>
                <p>For payment transactions, we use WebPay Plus, which complies with industry security standards for payment processing.</p>
            </div>

            <div id="rights-en" class="border-l-4 border-purple-600 pl-4 mb-8 transition-all duration-300 hover:border-l-6 hover:pl-5">
                <h3 class="text-xl font-semibold mb-2">9. Your Data Rights</h3>
                
                <h4 class="text-lg font-medium mt-4">General Rights</h4>
                <p>If you have an account on this site or have left comments, you can request to receive an exported file of the personal data we hold about you, including any data you have provided to us. You can also request that we erase any personal data we hold about you. This does not include any data we are obliged to keep for administrative, legal, or security purposes.</p>
                <p>According to Law 19.628 on Protection of Private Life in Chile, your rights include:</p>
                <ul class="list-disc pl-6 mt-2">
                    <li>Right of access: You have the right to request and obtain information about your personal data, its origin and recipients, the purpose for which it is stored, and the identity of the persons or organizations to which it is regularly transmitted</li>
                    <li>Right to modification: You can request correction or modification of your personal data when it is erroneous, inaccurate, misleading, or incomplete</li>
                    <li>Right to cancellation or deletion: You have the right to demand that your data be canceled or deleted when its storage lacks legal basis or when the data is expired</li>
                    <li>Right to blocking: You can request the temporary blocking of your data when its accuracy cannot be established or its validity is doubtful</li>
                    <li>Right to object: You have the right to object to the use of your personal data for advertising, marketing, or survey purposes</li>
                </ul>
                
                <h4 class="text-lg font-medium mt-4">Data Protection in Chile</h4>
                <p>Your privacy is critically important to us. We are committed to complying with Law 19.628 on Protection of Private Life and other applicable regulations in Chile related to the protection of personal data. To exercise any of your rights or for more information about your rights under Chilean law, you can visit: <a href="https://www.bcn.cl/leychile/navegar?idNorma=141599" class="text-purple-600 hover:underline" target="_blank">Law 19.628 on Protection of Private Life</a> or contact us directly through the means indicated in the contact section.</p>
            </div>

            <div id="third-websites-en" class="border-l-4 border-purple-600 pl-4 mb-8 transition-all duration-300 hover:border-l-6 hover:pl-5">
                <h3 class="text-xl font-semibold mb-2">10. Third Party Websites</h3>
                <p>Our website may contain links to external websites that are not operated by us. If you click on a third-party link, you will be directed to that third party's site. We strongly advise you to review the Privacy Policy of every site you visit.</p>
                <p>We have no control over and assume no responsibility for the content, privacy policies, or practices of any third-party sites or services. All social media sharing links, whether displayed as text links or social media icons, do not connect you to any of the associated third parties unless you explicitly click on them.</p>
            </div>

            <div id="disclosure-en" class="border-l-4 border-purple-600 pl-4 mb-8 transition-all duration-300 hover:border-l-6 hover:pl-5">
                <h3 class="text-xl font-semibold mb-2">11. Release of Your Data for Legal Purposes</h3>
                <p>We may have to disclose your personal information in certain circumstances:</p>
                <ul class="list-disc pl-6 mt-2">
                    <li>To comply with a legal requirement, such as an applicable law, regulation, legal process, or government request.</li>
                    <li>To enforce our terms of service, including investigating potential violations.</li>
                    <li>To detect, prevent, or address fraud, security, or technical issues.</li>
                    <li>To protect against harm to the rights, property, or safety of our company, our users, or the public as required or permitted by law.</li>
                </ul>
                <p>Any disclosure of personal data for legal purposes will only be done in accordance with applicable data protection laws.</p>
            </div>
            
            <div id="updates-en" class="border-l-4 border-purple-600 pl-4 mb-8 transition-all duration-300 hover:border-l-6 hover:pl-5">
                <h3 class="text-xl font-semibold mb-2">12. Updates to This Policy</h3>
                <p>We may update our Privacy Policy from time to time. We will notify you of any changes by posting the new Privacy Policy on this page and, if the changes are significant, we will provide a more prominent notice.</p>
                <p>We encourage you to review this Privacy Policy periodically for any changes. Changes to this Privacy Policy are effective when they are posted on this page.</p>
            </div>
            
            <div id="contact-en" class="border-l-4 border-purple-600 pl-4 mb-8 transition-all duration-300 hover:border-l-6 hover:pl-5">
                <h3 class="text-xl font-semibold mb-2">13. Contact</h3>
                <p>If you have any questions about this Privacy Policy, you can contact us:</p>
                <ul class="list-disc pl-6 mt-2">
                    <li>Through our contact form on the website</li>
                    <li>By WhatsApp using the chat button on our site</li>
                    <li>By email at the address provided in our contact section</li>
                </ul>
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
