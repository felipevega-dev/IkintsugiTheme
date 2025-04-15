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
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl md:text-3xl font-bold">Política de Privacidad</h2>
            <button id="languageToggle" class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-md transition-all duration-300">
                Ver en Inglés
            </button>
        </div>

        <!-- Spanish Content -->
        <div id="spanishContent" class="space-y-6">
            <div class="border-l-4 border-purple-600 pl-4 mb-8">
                <h3 class="text-xl font-semibold mb-2">1. Introducción</h3>
                <p>Agradecemos su confianza y su negocio. Somos una empresa con sede en Chipre, creando productos para mejorar su experiencia de construcción de sitios web. Por favor, lea esta Política de Privacidad y proporcione su consentimiento para poder utilizar nuestros servicios.</p>
            </div>

            <div class="border-l-4 border-purple-600 pl-4 mb-8">
                <h3 class="text-xl font-semibold mb-2">2. Datos Recopilados</h3>
                
                <h4 class="text-lg font-medium mt-4">Ubicación de Almacenamiento de Datos</h4>
                <p>Somos una empresa con sede en Chipre y operamos servidores web alojados en Alemania. Nuestro proveedor de hosting Hetzner Online GmbH se adhiere al "Privacy Shield" de la UE/EE.UU., asegurando que sus datos se almacenan de forma segura y cumplen con el RGPD. Para más información sobre la política de privacidad de Hetzner Online GmbH, consulte aquí: Política de Privacidad de Hetzner.</p>
                
                <h4 class="text-lg font-medium mt-4">Datos de Registro</h4>
                <p>Si se registra en nuestro sitio web, almacenamos su nombre de usuario elegido, su dirección de correo electrónico y cualquier información personal adicional añadida a su perfil de usuario. Puede ver, editar o eliminar su información personal en cualquier momento (excepto cambiar su nombre de usuario). Los administradores del sitio web también pueden ver y editar esta información.</p>
                
                <h4 class="text-lg font-medium mt-4">Datos de Compra</h4>
                <p>Para recibir soporte de productos, debe tener uno o más códigos de compra de Envato/AncoraThemes en nuestro sitio web. Estos códigos de compra se almacenarán junto con las fechas de vencimiento del soporte y los datos de su usuario. Esto es necesario para proporcionarle descargas, soporte de productos y otros servicios al cliente.</p>
                
                <h4 class="text-lg font-medium mt-4">Datos de Soporte</h4>
                <p>Si se ha registrado en nuestro sitio web y tiene una cuenta de soporte válida, puede enviar tickets de soporte para obtener asistencia. Los envíos del formulario de soporte se envían a nuestro sistema de tickets de terceros Ticksy. Solo se envían los datos que usted proporciona explícitamente, y se le solicita su consentimiento cada vez que desea crear un nuevo ticket de soporte. Ticksy se adhiere al "Privacy Shield" de la UE/EE.UU. y puede ver su política de privacidad aquí: Política de Privacidad de Ticksy.</p>
                
                <h4 class="text-lg font-medium mt-4">Comentarios</h4>
                <p>Cuando deja comentarios en el sitio web, recopilamos los datos mostrados en el formulario de comentarios, así como la dirección IP y la cadena del agente de usuario del navegador para ayudar a la detección de spam.</p>
                
                <h4 class="text-lg font-medium mt-4">Formulario de Contacto</h4>
                <p>La información enviada a través del formulario de contacto en nuestro sitio se envía a nuestro correo electrónico de empresa, alojado por Zoho. Zoho se adhiere a la política "Privacy Shield" de la UE/EE.UU. y puede encontrar más información sobre esto aquí: Política de Privacidad de Zoho. Estos envíos se mantienen solo para fines de servicio al cliente, nunca se utilizan para fines de marketing ni se comparten con terceros.</p>
                
                <h4 class="text-lg font-medium mt-4">Google Analytics</h4>
                <p>Utilizamos Google Analytics en nuestro sitio para informes anónimos de uso del sitio. Por lo tanto, no se almacenan datos personalizados. Si desea optar por no participar en la monitorización de Google Analytics de su comportamiento en nuestro sitio web, utilice este enlace: Exclusión de Google Analytics.</p>
                
                <h4 class="text-lg font-medium mt-4">Casos de Uso de los Datos Personales</h4>
                <p>Utilizamos su información personal en los siguientes casos:</p>
                <ul class="list-disc pl-6 mt-2">
                    <li>Verificación/identificación del usuario durante el uso del sitio web;</li>
                    <li>Proporcionar asistencia técnica;</li>
                    <li>Envío de actualizaciones a nuestros usuarios con información importante para informar sobre noticias/cambios;</li>
                    <li>Comprobación de la actividad de las cuentas para prevenir transacciones fraudulentas y garantizar la seguridad de la información personal de nuestros clientes;</li>
                    <li>Personalizar el sitio web para hacer su experiencia más personal y atractiva;</li>
                    <li>Garantizar el rendimiento general y el funcionamiento sin problemas de las funciones administrativas.</li>
                </ul>
            </div>

            <div class="border-l-4 border-purple-600 pl-4 mb-8">
                <h3 class="text-xl font-semibold mb-2">3. Contenido Incrustado</h3>
                <p>Las páginas de este sitio pueden incluir contenido incrustado, como videos de YouTube, por ejemplo. El contenido incrustado de otros sitios web se comporta exactamente de la misma manera que si visitara el otro sitio web. Estos sitios web pueden recopilar datos sobre usted, utilizar cookies, incrustar seguimiento adicional de terceros y supervisar su interacción con ese contenido incrustado, incluido el seguimiento de su interacción con el contenido incrustado si tiene una cuenta y ha iniciado sesión en ese sitio web. A continuación puede encontrar una lista de los servicios que utilizamos:</p>
                
                <h4 class="text-lg font-medium mt-4">Facebook</h4>
                <p>El complemento de página de Facebook se utiliza para mostrar nuestra línea de tiempo de Facebook en nuestro sitio. Facebook tiene sus propias políticas de cookies y privacidad sobre las que no tenemos control. No hay instalación de cookies de Facebook y su IP no se envía a un servidor de Facebook hasta que usted lo consienta. Consulte su política de privacidad aquí: Política de Privacidad de Facebook.</p>
                
                <h4 class="text-lg font-medium mt-4">Twitter</h4>
                <p>Utilizamos la API de Twitter para mostrar nuestra línea de tiempo de tweets en nuestro sitio. Twitter tiene sus propias políticas de cookies y privacidad sobre las que no tenemos control. Su IP no se envía a un servidor de Twitter hasta que usted lo consienta. Consulte su política de privacidad aquí: Política de Privacidad de Twitter.</p>
                
                <h4 class="text-lg font-medium mt-4">Youtube</h4>
                <p>Utilizamos videos de YouTube incrustados en nuestro sitio. YouTube tiene sus propias políticas de cookies y privacidad sobre las que no tenemos control. No hay instalación de cookies de YouTube y su IP no se envía a un servidor de YouTube hasta que usted lo consienta. Consulte su política de privacidad aquí: Política de Privacidad de YouTube.</p>
            </div>

            <div class="border-l-4 border-purple-600 pl-4 mb-8">
                <h3 class="text-xl font-semibold mb-2">4. Cookies</h3>
                <p>Este sitio utiliza cookies – pequeños archivos de texto que se colocan en su máquina para ayudar al sitio a proporcionar una mejor experiencia de usuario. En general, las cookies se utilizan para retener las preferencias del usuario, almacenar información para cosas como carritos de compras y proporcionar datos de seguimiento anonimizados a aplicaciones de terceros como Google Analytics. Las cookies generalmente existen para mejorar su experiencia de navegación. Sin embargo, es posible que prefiera deshabilitar las cookies en este sitio y en otros. La forma más efectiva de hacer esto es deshabilitar las cookies en su navegador. Sugerimos consultar la sección de ayuda de su navegador.</p>
                
                <h4 class="text-lg font-medium mt-4">Cookies Necesarias (todos los visitantes del sitio)</h4>
                <p>cfduid: Se utiliza para nuestro CDN CloudFlare para identificar clientes individuales detrás de una dirección IP compartida y aplicar configuraciones de seguridad por cliente. Vea más información sobre privacidad aquí: Política de Privacidad de CloudFlare.</p>
                <p>PHPSESSID: Para identificar su sesión única en el sitio web.</p>
                
                <h4 class="text-lg font-medium mt-4">Cookies Necesarias (Adicionales para Clientes Conectados)</h4>
                <p>wp-auth: Utilizado por WordPress para autenticar a los visitantes conectados, autenticación de contraseña y verificación de usuario.</p>
                <p>wordpress_logged_in_{hash}: Utilizado por WordPress para autenticar a los visitantes conectados, autenticación de contraseña y verificación de usuario.</p>
                <p>wordpress_test_cookie Utilizado por WordPress para asegurar que las cookies están funcionando correctamente.</p>
                <p>wp-settings-[UID]: WordPress establece algunas cookies wp-settings-[UID]. El número al final es su ID de usuario individual de la tabla de la base de datos de usuarios. Esto se utiliza para personalizar su vista de la interfaz de administración, y posiblemente también la interfaz principal del sitio.</p>
                <p>wp-settings-[UID]: WordPress también establece algunas cookies wp-settings-{time}-[UID]. El número al final es su ID de usuario individual de la tabla de la base de datos de usuarios. Esto se utiliza para personalizar su vista de la interfaz de administración, y posiblemente también la interfaz principal del sitio.</p>
            </div>

            <div class="border-l-4 border-purple-600 pl-4 mb-8">
                <h3 class="text-xl font-semibold mb-2">5. Quién Tiene Acceso a Sus Datos</h3>
                <p>Si no es un cliente registrado para nuestro sitio, no hay información personal que podamos retener o ver sobre usted. Si es un cliente con una cuenta registrada, su información personal puede ser accedida por:</p>
                <ul class="list-disc pl-6 mt-2">
                    <li>Nuestros administradores de sistema.</li>
                    <li>Nuestros colaboradores cuando (para proporcionar soporte) necesitan obtener la información sobre las cuentas de los clientes y el acceso.</li>
                </ul>
            </div>

            <div class="border-l-4 border-purple-600 pl-4 mb-8">
                <h3 class="text-xl font-semibold mb-2">6. Acceso de Terceros a Sus Datos</h3>
                <p>No compartimos sus datos con terceros de manera que revelen cualquier información personal suya como correo electrónico, nombre, etc. Las únicas excepciones a esa regla son para socios con los que tenemos que compartir datos limitados con el fin de proporcionar los servicios que usted espera de nosotros. Por favor, vea a continuación:</p>
                
                <h4 class="text-lg font-medium mt-4">Envato Pty Ltd</h4>
                <p>Con el propósito de validar y obtener su información de compra con respecto a las licencias para este tema, enviamos sus tokens proporcionados y claves de compra a Envato Pty Ltd y utilizamos la respuesta de su API para registrar sus datos de soporte validados. Consulte la política de privacidad de Envato aquí: Política de Privacidad de Envato.</p>
                
                <h4 class="text-lg font-medium mt-4">Ticksy</h4>
                <p>Ticksy proporciona la plataforma de tickets de soporte que utilizamos para manejar solicitudes de soporte. Los datos que reciben se limitan a los datos que usted proporciona explícitamente y consiente que se establezcan cuando crea un ticket de soporte. Ticksy se adhiere al "Privacy Shield" de la UE/EE.UU. y puede ver su política de privacidad aquí: Política de Privacidad de Ticksy.</p>
            </div>

            <div class="border-l-4 border-purple-600 pl-4 mb-8">
                <h3 class="text-xl font-semibold mb-2">7. Cuánto Tiempo Conservamos Sus Datos</h3>
                <p>Cuando envía un ticket de soporte o un comentario, sus metadatos se conservan hasta que (si) nos pide que los eliminemos. Utilizamos estos datos para poder reconocerlo y aprobar sus comentarios automáticamente en lugar de mantenerlos para moderación. Si se registra en nuestro sitio web, también almacenamos la información personal que proporciona en su perfil de usuario. Puede ver, editar o eliminar su información personal en cualquier momento (excepto cambiar su nombre de usuario). Los administradores del sitio web también pueden ver y editar esa información.</p>
            </div>

            <div class="border-l-4 border-purple-600 pl-4 mb-8">
                <h3 class="text-xl font-semibold mb-2">8. Medidas de Seguridad</h3>
                <p>Utilizamos el protocolo SSL/HTTPS en todo nuestro sitio. Esto cifra nuestras comunicaciones con los servidores para que la información de identificación personal no sea capturada/secuestrada por terceros sin autorización. En caso de una violación de datos, los administradores del sistema tomarán inmediatamente todas las medidas necesarias para garantizar la integridad del sistema, contactarán a los usuarios afectados e intentarán restablecer las contraseñas si es necesario.</p>
            </div>

            <div class="border-l-4 border-purple-600 pl-4 mb-8">
                <h3 class="text-xl font-semibold mb-2">9. Sus Derechos de Datos</h3>
                
                <h4 class="text-lg font-medium mt-4">Derechos Generales</h4>
                <p>Si tiene una cuenta registrada en este sitio web o ha dejado comentarios, puede solicitar un archivo exportado de los datos personales que conservamos, incluidos los datos adicionales que nos ha proporcionado. También puede solicitar que eliminemos cualquier dato personal que hayamos almacenado. Esto no incluye ningún dato que estemos obligados a mantener por razones administrativas, legales o de seguridad. En resumen, no podemos borrar datos que son vitales para que usted sea un cliente activo (es decir, información básica de la cuenta como una dirección de correo electrónico). Si desea que todos sus datos sean borrados, ya no podremos ofrecerle soporte u otros servicios relacionados con el producto.</p>
                
                <h4 class="text-lg font-medium mt-4">Derechos RGPD</h4>
                <p>Su privacidad es de vital importancia para nosotros. Avanzando con el RGPD, nuestro objetivo es apoyar el estándar RGPD. Permitimos a los residentes de la Unión Europea utilizar nuestro Servicio. Por lo tanto, es la intención de nuestra empresa cumplir con el Reglamento General de Protección de Datos Europeo. Para más detalles, consulte aquí: Portal de Información del RGPD de la UE.</p>
            </div>

            <div class="border-l-4 border-purple-600 pl-4 mb-8">
                <h3 class="text-xl font-semibold mb-2">10. Sitios Web de Terceros</h3>
                <p>Podemos publicar enlaces a sitios web de terceros en este sitio web. Estos sitios web de terceros no son examinados para el cumplimiento de la privacidad o la seguridad por nuestra empresa, y usted nos libera de cualquier responsabilidad por la conducta de estos sitios web de terceros. Todos los enlaces para compartir en redes sociales, ya sea que se muestren como enlaces de texto o iconos de redes sociales, no lo conectan a ninguna de las terceras partes asociadas a menos que haga clic explícitamente en ellos. Tenga en cuenta que esta Política de Privacidad, y cualquier otra política vigente, además de cualquier enmienda, no crea derechos exigibles por terceros ni requiere la divulgación de ninguna información personal relacionada con los miembros del Servicio o Sitio. Nuestra empresa no asume ninguna responsabilidad por la información recopilada o utilizada por cualquier anunciante o sitio web de terceros. Revise la política de privacidad y los términos de servicio de cada sitio que visite a través de enlaces de terceros.</p>
            </div>

            <div class="border-l-4 border-purple-600 pl-4 mb-8">
                <h3 class="text-xl font-semibold mb-2">11. Divulgación de Sus Datos para Fines Legales</h3>
                <p>En ocasiones, puede ser necesario o deseable para nuestra empresa, con fines legales, divulgar su información en respuesta a una solicitud de una agencia gubernamental o un litigante privado. Usted acepta que podemos divulgar su información a un tercero cuando creemos, de buena fe, que es deseable hacerlo para los fines de una acción civil, investigación criminal u otro asunto legal. En el caso de que recibamos una citación que afecte su privacidad, podemos optar por notificarle para darle la oportunidad de presentar una moción para anular la citación, o podemos intentar anularla nosotros mismos, pero no estamos obligados a hacer ninguna de las dos cosas. También podemos informar proactivamente sobre usted y divulgar su información a terceros cuando creemos que es prudente hacerlo por razones legales, como nuestra creencia de que ha participado en actividades fraudulentas. Usted nos libera de cualquier daño que pueda surgir o relacionarse con la divulgación de su información a una solicitud de agencias de aplicación de la ley o litigantes privados. Cualquier transmisión de datos personales para fines legales solo se realizará de conformidad con las leyes del país en el que reside.</p>
            </div>
        </div>

        <!-- English Content -->
        <div id="englishContent" class="space-y-6 hidden" data-aos="fade-in">
            <div class="border-l-4 border-purple-600 pl-4 mb-8">
                <h3 class="text-xl font-semibold mb-2">1. Introduction</h3>
                <p>ThemeRex (website url address: https://themerex.net) appreciates your business and trust. We are Cyprus based company, creating products to enhance your website building experience. Please read this Privacy Policy, providing consent to both documents in order to have permission to use our services.</p>
            </div>

            <div class="border-l-4 border-purple-600 pl-4 mb-8">
                <h3 class="text-xl font-semibold mb-2">2. Data Collected</h3>
                
                <h4 class="text-lg font-medium mt-4">Data Storage Location</h4>
                <p>We are a Cyprus based company and operate web servers hosted in Germany. Our hosting provider Hetzner Online GmbH adheres to the EU/US "Privacy Shield", ensuring that your data is securely stored and GDPR compliant. For more information on Hetzner Online GmbH privacy policy, please see here: Hetzner Data Privacy Policy</p>
                
                <h4 class="text-lg font-medium mt-4">Registration Data</h4>
                <p>If you register on our website, we store your chosen username and your email address and any additional personal information added to your user profile. You can see, edit, or delete your personal information at any time (except changing your username). Website administrators can also see and edit this information.</p>
                
                <h4 class="text-lg font-medium mt-4">Purchase Data</h4>
                <p>To receive product support, you have to have one or more Envato/AncoraThemes purchase codes on our website. These purchase codes will be stored together with support expiration dates and your user data. This is required for us to provide you with downloads, product support, and other customer services.</p>
                
                <h4 class="text-lg font-medium mt-4">Support Data</h4>
                <p>If you have registered on our website and have a valid support account, you can submit support tickets for assistance. Support form submissions are sent to our third party Ticksy ticketing system. Only the data you explicitly provided is sent, and you are asked for consent, each time you want to create a new support ticket. Ticksy adheres to the EU/US "Privacy Shield" and you can see their privacy policy here: Ticksy Privacy Policy.</p>
                
                <h4 class="text-lg font-medium mt-4">Comments</h4>
                <p>When you leave comments on the website we collect the data shown in the comments form, and also the IP address and browser user agent string to help spam detection.</p>
                
                <h4 class="text-lg font-medium mt-4">Contact Form</h4>
                <p>Information submitted through the contact form on our site is sent to our company email, hosted by Zoho. Zoho adheres to the EU/US "Privacy Shield" policy and you can find more information about this here: Zoho Privacy Policy. These submissions are only kept for customer service purposes they are never used for marketing purposes or shared with third parties.</p>
                
                <h4 class="text-lg font-medium mt-4">Google Analytics</h4>
                <p>We use Google Analytics on our site for anonymous reporting of site usage. So, no personalized data is stored. If you would like to opt-out of Google Analytics monitoring your behavior on our website please use this link: Google Analytics Opt-out.</p>
                
                <h4 class="text-lg font-medium mt-4">Cases for Using the Personal Data</h4>
                <p>We use your personal information in the following cases:</p>
                <ul class="list-disc pl-6 mt-2">
                    <li>Verification/identification of the user during website usage;</li>
                    <li>Providing Technical Assistance;</li>
                    <li>Sending updates to our users with important information to inform about news/changes;</li>
                    <li>Checking the accounts' activity in order to prevent fraudulent transactions and ensure the security over our customers' personal information;</li>
                    <li>Customize the website to make your experience more personal and engaging;</li>
                    <li>Guarantee overall performance and administrative functions run smoothly.</li>
                </ul>
            </div>

            <div class="border-l-4 border-purple-600 pl-4 mb-8">
                <h3 class="text-xl font-semibold mb-2">3. Embedded Content</h3>
                <p>Pages on this site may include embedded content, like YouTube videos, for example. Embedded content from other websites behaves in the exact same way as if you visited the other website. These websites may collect data about you, use cookies, embed additional third-party tracking, and monitor your interaction with that embedded content, including tracking your interaction with the embedded content if you have an account and are logged in to that website. Below you can find a list of the services we use:</p>
                
                <h4 class="text-lg font-medium mt-4">Facebook</h4>
                <p>The Facebook page plugin is used to display our Facebook timeline on our site. Facebook has its own cookie and privacy policies over which we have no control. There is no installation of cookies from Facebook and your IP is not sent to a Facebook server until you consent to it. See their privacy policy here: Facebook Privacy Policy.</p>
                
                <h4 class="text-lg font-medium mt-4">Twitter</h4>
                <p>We use the Twitter API to display our tweets timeline on our site. Twitter has its own cookie and privacy policies over which we have no control. Your IP is not sent to a Twitter server until you consent to it. See their privacy policy here: Twitter Privacy Policy.</p>
                
                <h4 class="text-lg font-medium mt-4">Youtube</h4>
                <p>We use YouTube videos embedded on our site. YouTube has its own cookie and privacy policies over which we have no control. There is no installation of cookies from YouTube and your IP is not sent to a YouTube server until you consent to it. See their privacy policy here: YouTube Privacy Policy.</p>
            </div>

            <div class="border-l-4 border-purple-600 pl-4 mb-8">
                <h3 class="text-xl font-semibold mb-2">4. Cookies</h3>
                <p>This site uses cookies – small text files that are placed on your machine to help the site provide a better user experience. In general, cookies are used to retain user preferences, store information for things like shopping carts, and provide anonymised tracking data to third party applications like Google Analytics. Cookies generally exist to make your browsing experience better. However, you may prefer to disable cookies on this site and on others. The most effective way to do this is to disable cookies in your browser. We suggest consulting the help section of your browser.</p>
                
                <h4 class="text-lg font-medium mt-4">Necessary Cookies (all site visitors)</h4>
                <p>cfduid: Is used for our CDN CloudFlare to identify individual clients behind a shared IP address and apply security settings on a per-client basis. See more information on privacy here: CloudFlare Privacy Policy.</p>
                <p>PHPSESSID: To identify your unique session on the website.</p>
                
                <h4 class="text-lg font-medium mt-4">Necessary Cookies (Additional for Logged in Customers)</h4>
                <p>wp-auth: Used by WordPress to authenticate logged-in visitors, password authentication and user verification.</p>
                <p>wordpress_logged_in_{hash}: Used by WordPress to authenticate logged-in visitors, password authentication and user verification.</p>
                <p>wordpress_test_cookie Used by WordPress to ensure cookies are working correctly.</p>
                <p>wp-settings-[UID]: WordPress sets a few wp-settings-[UID] cookies. The number on the end is your individual user ID from the users database table. This is used to customize your view of admin interface, and possibly also the main site interface.</p>
                <p>wp-settings-[UID]:WordPress also sets a few wp-settings-{time}-[UID] cookies. The number on the end is your individual user ID from the users database table. This is used to customize your view of admin interface, and possibly also the main site interface.</p>
            </div>

            <div class="border-l-4 border-purple-600 pl-4 mb-8">
                <h3 class="text-xl font-semibold mb-2">5. Who Has Access To Your Data</h3>
                <p>If you are not a registered client for our site, there is no personal information we can retain or view regarding yourself. If you are a client with a registered account, your personal information can be accessed by:</p>
                <ul class="list-disc pl-6 mt-2">
                    <li>Our system administrators.</li>
                    <li>Our supporters when they (in order to provide support) need to get the information about the client accounts and access.</li>
                </ul>
            </div>

            <div class="border-l-4 border-purple-600 pl-4 mb-8">
                <h3 class="text-xl font-semibold mb-2">6. Third Party Access to Your Data</h3>
                <p>We don't share your data with third-parties in a way as to reveal any of your personal information like email, name, etc. The only exceptions to that rule are for partners we have to share limited data with in order to provide the services you expect from us. Please see below:</p>
                
                <h4 class="text-lg font-medium mt-4">Envato Pty Ltd</h4>
                <p>For the purpose of validating and getting your purchase information regarding licenses for this theme, we send your provided tokens and purchase keys to Envato Pty Ltd and use the response from their API to register your validated support data. See the Envato privacy policy here: Envato Privacy Policy.</p>
                
                <h4 class="text-lg font-medium mt-4">Ticksy</h4>
                <p>Ticksy provides the support ticketing platform we use to handle support requests. The data they receive is limited to the data you explicitly provide and consent to being set when you create a support ticket. Ticksy adheres to the EU/US "Privacy Shield" and you can see their privacy policy here: Ticksy Privacy Policy.</p>
            </div>

            <div class="border-l-4 border-purple-600 pl-4 mb-8">
                <h3 class="text-xl font-semibold mb-2">7. How Long We Retain Your Data For</h3>
                <p>When you submit a support ticket or a comment, its metadata is retained until (if) you tell us to remove it. We use this data so that we can recognize you and approve your comments automatically instead of holding them for moderation. If you register on our website, we also store the personal information you provide in your user profile. You can see, edit, or delete your personal information at any time (except changing your username). Website administrators can also see and edit that information.</p>
            </div>

            <div class="border-l-4 border-purple-600 pl-4 mb-8">
                <h3 class="text-xl font-semibold mb-2">8. Security Measures</h3>
                <p>We use the SSL/HTTPS protocol throughout our site. This encrypts our user communications with the servers so that personally identifiable information is not captured/hijacked by third parties without authorization. In case of a data breach, system administrators will immediately take all needed steps to ensure system integrity, will contact affected users and will attempt to reset passwords if needed.</p>
            </div>

            <div class="border-l-4 border-purple-600 pl-4 mb-8">
                <h3 class="text-xl font-semibold mb-2">9. Your Data Rights</h3>
                
                <h4 class="text-lg font-medium mt-4">General Rights</h4>
                <p>If you have a registered account on this website or have left comments, you can request an exported file of the personal data we retain, including any additional data you have provided to us. You can also request that we erase any of the personal data we have stored. This does not include any data we are obliged to keep for administrative, legal, or security purposes. In short, we cannot erase data that is vital to you being an active customer (i.e. basic account information like an email address). If you wish that all of your data is erased, we will no longer be able to offer any support or other product-related services to you.</p>
                
                <h4 class="text-lg font-medium mt-4">GDPR Rights</h4>
                <p>Your privacy is critically important to us. Going forward with the GDPR we aim to support the GDPR standard. AncoraThemes permits residents of the European Union to use its Service. Therefore, it is the intent of AncoraThemes to comply with the European General Data Protection Regulation. For more details please see here: EU GDPR Information Portal.</p>
            </div>

            <div class="border-l-4 border-purple-600 pl-4 mb-8">
                <h3 class="text-xl font-semibold mb-2">10. Third Party Websites</h3>
                <p>ThemeREX may post links to third party websites on this website. These third party websites are not screened for privacy or security compliance by AncoraThemes, and you release us from any liability for the conduct of these third party websites. All social media sharing links, either displayed as text links or social media icons do not connect you to any of the associated third parties unless you explicitly click on them. Please be aware that this Privacy Policy, and any other policies in place, in addition to any amendments, does not create rights enforceable by third parties or require disclosure of any personal information relating to members of the Service or Site. AncoraThemes bears no responsibility for the information collected or used by any advertiser or third party website. Please review the privacy policy and terms of service for each site you visit through third party links.</p>
            </div>

            <div class="border-l-4 border-purple-600 pl-4 mb-8">
                <h3 class="text-xl font-semibold mb-2">11. Release of Your Data for Legal Purposes</h3>
                <p>At times it may become necessary or desirable to AncoraThemes, for legal purposes, to release your information in response to a request from a government agency or a private litigant. You agree that we may disclose your information to a third party where we believe, in good faith, that it is desirable to do so for the purposes of a civil action, criminal investigation, or other legal matter. In the event that we receive a subpoena affecting your privacy, we may elect to notify you to give you an opportunity to file a motion to quash the subpoena, or we may attempt to quash it ourselves, but we are not obligated to do either. We may also proactively report you, and release your information to, third parties where we believe that it is prudent to do so for legal reasons, such as our belief that you have engaged in fraudulent activities. You release us from any damages that may arise from or relate to the release of your information to a request from law enforcement agencies or private litigants. Any passing on of personal data for legal purposes will only be done in compliance with laws of the country you reside in.</p>
            </div>
        </div>

        <!-- Add JavaScript for toggling between languages -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const toggle = document.getElementById('languageToggle');
                const spanishContent = document.getElementById('spanishContent');
                const englishContent = document.getElementById('englishContent');
                
                toggle.addEventListener('click', function() {
                    if (spanishContent.classList.contains('hidden')) {
                        // Switch to Spanish
                        spanishContent.classList.remove('hidden');
                        englishContent.classList.add('hidden');
                        toggle.textContent = 'Ver en Inglés';
                    } else {
                        // Switch to English
                        spanishContent.classList.add('hidden');
                        englishContent.classList.remove('hidden');
                        toggle.textContent = 'Ver en Español';
                    }
                });
            });
        </script>
    </div>
</section>
@endsection
