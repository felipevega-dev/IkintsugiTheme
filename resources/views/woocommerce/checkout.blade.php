{{--
Template Name: Checkout Template
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
      <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-[#030D55] mb-8 font-playfair">Finalizar Compra</h1>
    </div>

    <div class="woocommerce checkout-wrapper max-w-7xl mx-auto">
      {!! do_shortcode('[woocommerce_checkout]') !!}
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
  };
  
  // Modificar botón "Volver a la tienda"
  const fixReturnButton = function() {
    // Buscar todos los posibles botones/enlaces de "volver"
    const selectors = [
      'a.button.wc-backward', 
      'a:contains("Volver a la tienda")', 
      '.wc-block-components-link-button:contains("Volver")',
      'a[href*="/shop"]'
    ];
    
    selectors.forEach(selector => {
      const elements = document.querySelectorAll(selector);
      if (elements.length > 0) {
        elements.forEach(el => {
          // Solo modificar los que son botones de "volver a la tienda"
          if (el.textContent.includes('tienda') || 
              el.textContent.toLowerCase().includes('volver') || 
              (el.href && el.href.includes('/shop'))) {
            el.setAttribute('href', '{{ home_url("/reservar-cita") }}');
            el.textContent = 'Volver a reservar cita';
          }
        });
      }
    });
  };
  
  // Fix para el resumen de pedido vacío
  const fixOrderReview = function() {
    // Verificar si el resumen del pedido está vacío
    const orderReviewText = document.querySelector('#order_review');
    const emptyOrderReview = document.querySelector('.woocommerce-order-review:empty, #order_review:empty, .wc-block-components-sidebar:empty');
    
    if (emptyOrderReview || (orderReviewText && !orderReviewText.textContent.trim())) {
      console.log('Resumen de pedido vacío detectado, intentando reconstruir');
      
      // Buscar elementos del carrito para mostrar en el resumen
      fetch('{{ home_url("/wp-json/wc/store/cart") }}')
        .then(response => response.json())
        .then(data => {
          // Crear el resumen del pedido manualmente
          let html = '<div class="order-review-wrapper p-4 rounded-lg shadow-sm">';
          html += '<h3 class="text-xl font-bold mb-4">Resumen del Pedido</h3>';
          html += '<table class="w-full mb-4"><thead><tr>';
          html += '<th class="text-left">Producto</th><th class="text-right">Subtotal</th>';
          html += '</tr></thead><tbody>';
          
          let subtotal = 0;
          
          if (data && data.items && data.items.length > 0) {
            data.items.forEach(item => {
              html += `<tr><td>${item.name} × ${item.quantity}</td><td class="text-right">${item.totals.line_total.formatted_value}</td></tr>`;
              subtotal += parseFloat(item.totals.line_total.value);
            });
          } else {
            html += '<tr><td colspan="2" class="text-center py-2">No hay productos en el carrito</td></tr>';
          }
          
          html += '</tbody><tfoot>';
          html += `<tr><th>Subtotal</th><td class="text-right">${data?.totals?.total_items?.formatted_value || '0'}</td></tr>`;
          
          if (data?.totals?.total_shipping) {
            html += `<tr><th>Envío</th><td class="text-right">${data.totals.total_shipping.formatted_value}</td></tr>`;
          }
          
          html += `<tr class="font-bold"><th>Total</th><td class="text-right text-xl text-[#D93280]">${data?.totals?.total_price?.formatted_value || '0'}</td></tr>`;
          html += '</tfoot></table>';
          html += '</div>';
          
          // Insertar el resumen en el contenedor apropiado
          if (emptyOrderReview) {
            emptyOrderReview.innerHTML = html;
          } else {
            // Si no hay un contenedor de resumen vacío, buscar donde insertarlo
            const checkoutForm = document.querySelector('.woocommerce-checkout');
            if (checkoutForm) {
              const sidebarContainer = document.createElement('div');
              sidebarContainer.className = 'checkout-sidebar mt-8 lg:mt-0';
              sidebarContainer.innerHTML = html;
              
              // Intentar crear un layout de dos columnas si no existe
              const checkoutRow = document.querySelector('.checkout-columns');
              if (!checkoutRow) {
                const row = document.createElement('div');
                row.className = 'grid grid-cols-1 lg:grid-cols-12 gap-8 checkout-columns';
                
                const formCol = document.createElement('div');
                formCol.className = 'lg:col-span-7';
                
                const sidebarCol = document.createElement('div');
                sidebarCol.className = 'lg:col-span-5';
                sidebarCol.appendChild(sidebarContainer);
                
                // Mover el formulario a la columna
                checkoutForm.parentNode.insertBefore(row, checkoutForm);
                formCol.appendChild(checkoutForm);
                row.appendChild(formCol);
                row.appendChild(sidebarCol);
              }
            }
          }
        })
        .catch(error => {
          console.error('Error al obtener datos del carrito:', error);
        });
    }
  };
  
  // Ejecutar las funciones
  fixHeaderLogo();
  fixReturnButton();
  
  // Esperar un poco más para el resumen del pedido (puede cargarse después)
  setTimeout(fixOrderReview, 1000);
  
  // Ejecutar nuevamente después de que se cargue completamente la página
  window.addEventListener('load', function() {
    fixHeaderLogo();
    fixReturnButton();
    fixOrderReview();
  });
  
  // En caso de que haya componentes dinámicos, intentar cada 1 segundo durante 5 segundos
  let attempts = 0;
  const interval = setInterval(function() {
    fixHeaderLogo();
    fixReturnButton();
    if (attempts === 2) fixOrderReview(); // Intentar arreglar el resumen en el segundo intento
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

#main-header .header-container {
  padding-top: 0.5rem !important;
  padding-bottom: 0.5rem !important;
}

/* Estilos para botones de volver */
.wc-block-components-link-button,
.wc-block-components-button:not(.is-link) {
  color: #D93280 !important;
}

/* Botones principales */
.wc-block-components-button:not(.is-link) {
  background-color: #D93280 !important;
  color: white !important;
}

/* Fix margin issues with block checkout */
.wc-block-checkout {
  margin-top: 2rem !important; 
}

.wc-block-components-sidebar {
  margin-top: 0 !important;
}

/* Ajustes para pantallas desktop */
@media (min-width: 1024px) {
  body.woocommerce-checkout .main {
    margin-top: 40px;
  }
  
  body.woocommerce-checkout .header-container {
    background-color: rgba(255, 255, 255, 0.95) !important;
  }
}

/* Estilos para el resumen de pedido generado por JS */
.order-review-wrapper {
  background-color: #f9f9f9;
  border: 1px solid #e5e7eb;
}

.order-review-wrapper h3 {
  color: #030D55;
  padding-bottom: 0.5rem;
  border-bottom: 1px solid #e5e7eb;
}

.order-review-wrapper table {
  border-collapse: collapse;
}

.order-review-wrapper th, 
.order-review-wrapper td {
  padding: 0.75rem 0;
  border-bottom: 1px solid #e5e7eb;
}

.order-review-wrapper tfoot tr:last-child {
  border-top: 2px solid #e5e7eb;
}

/* Ajustar el layout de columnas cuando se usa el shortcode */
@media (min-width: 1024px) {
  .woocommerce-checkout form.checkout {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 2rem;
  }
  
  .woocommerce-checkout #customer_details {
    grid-column: 1;
  }
  
  .woocommerce-checkout #order_review,
  .woocommerce-checkout #order_review_heading {
    grid-column: 2;
  }
  
  .woocommerce-checkout #order_review_heading {
    margin-top: 0;
  }
}
</style>
@endsection