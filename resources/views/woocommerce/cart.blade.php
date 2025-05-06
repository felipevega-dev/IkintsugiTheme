{{--
Template Name: Cart Template
--}}

@extends('layouts.app')

@section('styles')
<style>
  /* Fix oversized logo in header */
  #main-header .header-logo {
    max-width: 160px !important;
    height: auto !important;
  }
  
  #main-header .header-container {
    padding-top: 0.5rem !important;
    padding-bottom: 0.5rem !important;
  }
</style>
@endsection

@section('content')
<section class="py-6 bg-white md:py-8 lg:py-12">
  <div class="container mx-auto px-4">
    <div class="text-center mb-12 pt-16 md:pt-20 lg:pt-24 mt-10">
      <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-[#030D55] mb-8 font-playfair">Carrito de Compra</h1>
    </div>
    
    <div class="woocommerce bg-white p-6 rounded-lg shadow-sm max-w-5xl mx-auto">
      {!! do_shortcode('[woocommerce_cart]') !!}
    </div>
  </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
  // Arreglar el logo del header
  const fixHeaderLogo = function() {
    const headerLogo = document.querySelector('#main-header a.flex img');
    if (headerLogo) {
      headerLogo.style.maxWidth = '200px';
      headerLogo.style.height = 'auto';
    }
    
    const headerContainer = document.querySelector('#main-header .header-container');
    if (headerContainer) {
      headerContainer.style.paddingTop = '0.5rem';
      headerContainer.style.paddingBottom = '0.5rem';
    }
  };
  
  // Modificar botón "Volver a la tienda"
  const fixReturnButton = function() {
    // Para el shortcode tradicional
    const returnButton = document.querySelector('.return-to-shop .button');
    if (returnButton) {
      returnButton.setAttribute('href', '{{ home_url("/reservar-cita") }}');
      returnButton.textContent = 'Volver a reservar cita';
    }
    
    // Para bloques de Gutenberg
    const blockReturnButtons = document.querySelectorAll('.wp-block-button a:contains("Volver a la tienda"), .wc-block-components-button:contains("tienda")');
    if (blockReturnButtons.length > 0) {
      blockReturnButtons.forEach(button => {
        button.setAttribute('href', '{{ home_url("/reservar-cita") }}');
        button.textContent = 'Volver a reservar cita';
      });
    }
    
    // Intenta encontrar botones por atributos
    const allLinks = document.querySelectorAll('a');
    allLinks.forEach(link => {
      if (link.href && link.href.includes('/shop') && (link.textContent.toLowerCase().includes('tienda') || link.textContent.toLowerCase().includes('shop'))) {
        link.setAttribute('href', '{{ home_url("/reservar-cita") }}');
        link.textContent = 'Volver a reservar cita';
      }
    });
  };
  
  // Ejecutar las funciones
  fixHeaderLogo();
  fixReturnButton();
  
  // Ejecutar nuevamente después de que se cargue completamente la página
  window.addEventListener('load', function() {
    fixHeaderLogo();
    fixReturnButton();
  });
  
  // En caso de que haya componentes dinámicos, intentar cada 1 segundo durante 5 segundos
  let attempts = 0;
  const interval = setInterval(function() {
    fixHeaderLogo();
    fixReturnButton();
    attempts++;
    if (attempts >= 5) {
      clearInterval(interval);
    }
  }, 1000);
});
</script>

<style>
/* Estilos para arreglar el tema del header */
#main-header a.flex img {
  max-width: 200px !important;
  height: auto !important;
}


/* Estilos para botones de volver a la tienda */
.return-to-shop .button,
.wp-block-button__link,
.wc-block-components-button:not(.is-link) {
  background-color: #D93280 !important;
  color: white !important;
  display: inline-block !important;
}

/* Eliminar contenido before del botón */
.wc-backward::before,
.wc-block-components-button::before {
  content: none !important;
}

/* Ajustes para pantallas desktop */
@media (min-width: 1024px) {
  
  body.woocommerce-cart .header-container {
    background-color: rgba(255, 255, 255, 0.95) !important;
  }
}
</style>
@endsection