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
  
  // Ocultar el título del resumen de pedido y ajustar espacios
  const fixOrderSummaryDisplay = function() {
    // Ocultar el título para evitar el espacio en blanco
    const orderReviewHeading = document.querySelector('#order_review_heading, h3:contains("Tu pedido")');
    if (orderReviewHeading) {
      orderReviewHeading.style.display = 'none';
    }
    
    // Ajustar espacios en el resumen de pedido
    const orderReview = document.querySelector('#order_review');
    if (orderReview) {
      orderReview.style.marginTop = '0';
      orderReview.style.paddingTop = '0';
    }
  };
  
  // Organizar los campos de facturación y envío en grupos para un diseño de dos columnas
  const organizeCheckoutFields = function() {
    // Seleccionar los formularios de facturación y envío
    const billingFields = document.querySelectorAll('.woocommerce-billing-fields__field-wrapper .form-row');
    
    // Crear contenedores flexibles para cada grupo
    if (billingFields.length > 0) {
      const billingWrapper = document.querySelector('.woocommerce-billing-fields__field-wrapper');
      if (billingWrapper) {
        billingWrapper.classList.add('checkout-form-grid');
        
        // Asignar clases específicas a ciertos campos para controlar el ancho
        billingFields.forEach(field => {
          // Nueva organización de campos - todos los que no son dirección como media columna
          if (field.id.includes('billing_address_1') || 
              field.id.includes('billing_address_2') || 
              field.id.includes('billing_company')) {
            field.classList.add('form-row-full');
          } else {
            field.classList.add('form-row-half');
          }
          
          // Asignar orden específico a cada campo para garantizar el orden correcto
          if (field.id.includes('billing_first_name')) {
            field.style.order = '1';
          } else if (field.id.includes('billing_last_name')) {
            field.style.order = '2';
          } else if (field.id.includes('billing_email')) {
            field.style.order = '3';
          } else if (field.id.includes('billing_phone')) {
            field.style.order = '4';
          } else if (field.id.includes('billing_address_1')) {
            field.style.order = '5';
          } else if (field.id.includes('billing_address_2')) {
            field.style.order = '6';
          } else if (field.id.includes('billing_city')) {
            field.style.order = '7';
          } else if (field.id.includes('billing_state')) {
            field.style.order = '8';
          } else if (field.id.includes('billing_country')) {
            field.style.order = '9';
          } else if (field.id.includes('billing_postcode')) {
            field.style.order = '10';
          }
        });
      }
    }
    
    // Ocultar completamente la sección de envío
    const shippingFields = document.querySelector('.woocommerce-shipping-fields');
    if (shippingFields) {
      shippingFields.style.display = 'none';
      
      // También buscar y ocultar el div.woocommerce-shipping-fields incluso si tiene clase diferente
      const allDivs = document.querySelectorAll('div');
      allDivs.forEach(div => {
        if (div.className && div.className.includes('shipping-fields')) {
          div.style.display = 'none';
        }
      });
    }
    
    // Ocultar el div.col-2 vacío que contiene woocommerce-shipping-fields
    const col2 = document.querySelector('#customer_details .col-2');
    if (col2) {
      col2.style.display = 'none';
    }
    
    // Mover sección de información adicional al final y con ancho completo
    const moveAdditionalFields = function() {
      const additionalFields = document.querySelector('.woocommerce-additional-fields');
      const checkoutForm = document.querySelector('form.checkout');
      
      if (additionalFields && checkoutForm) {
        // Crear un nuevo contenedor para la sección de información adicional
        const fullWidthContainer = document.createElement('div');
        fullWidthContainer.className = 'checkout-full-width-section';
        
        // Mover la sección después del formulario principal pero antes del botón de pago
        const paymentSection = document.querySelector('#payment');
        if (paymentSection) {
          checkoutForm.insertBefore(fullWidthContainer, paymentSection);
        } else {
          checkoutForm.appendChild(fullWidthContainer);
        }
        
        // Mover la sección de información adicional al nuevo contenedor
        fullWidthContainer.appendChild(additionalFields);
        
        // Añadir estilo específico
        additionalFields.classList.add('full-width-additional');
      }
    };
    
    // Intentar mover la sección de información adicional
    moveAdditionalFields();
    
    // También añadir clases a los campos adicionales si existen
    const additionalFields = document.querySelectorAll('.woocommerce-additional-fields__field-wrapper .form-row');
    if (additionalFields.length > 0) {
      const additionalWrapper = document.querySelector('.woocommerce-additional-fields__field-wrapper');
      if (additionalWrapper) {
        additionalWrapper.classList.add('checkout-form-grid');
        
        // Hacer que todos los campos adicionales tengan ancho completo
        additionalFields.forEach(field => {
          field.classList.add('form-row-full');
        });
      }
    }
    
    // Añadir botón para volver al carrito
    const addBackToCartButton = function() {
      // Verificar si ya existe el botón para no duplicarlo
      if (document.querySelector('.back-to-cart-button')) {
        return;
      }
      
      const billingFields = document.querySelector('.woocommerce-billing-fields');
      if (billingFields) {
        const backButtonContainer = document.createElement('div');
        backButtonContainer.className = 'back-to-cart-button-container';
        
        const backButton = document.createElement('a');
        backButton.href = '{{ home_url("/carrito") }}';
        backButton.className = 'button back-to-cart-button';
        backButton.innerHTML = '&larr; Volver al carrito';
        
        backButtonContainer.appendChild(backButton);
        
        // Añadir el botón antes del formulario de facturación
        const parent = billingFields.parentNode;
        parent.insertBefore(backButtonContainer, billingFields);
      }
    };
    
    addBackToCartButton();
  };
  
  // Ejecutar las funciones
  fixHeaderLogo();
  fixReturnButton();
  fixOrderSummaryDisplay();
  organizeCheckoutFields();
  
  // Esperar un poco más para el resumen del pedido (puede cargarse después)
  setTimeout(function() {
    fixOrderReview();
    fixOrderSummaryDisplay();
    organizeCheckoutFields();
  }, 1000);
  
  // Ejecutar nuevamente después de que se cargue completamente la página
  window.addEventListener('load', function() {
    fixHeaderLogo();
    fixReturnButton();
    fixOrderReview();
    fixOrderSummaryDisplay();
    organizeCheckoutFields();
  });
  
  // En caso de que haya componentes dinámicos, intentar cada 1 segundo durante 5 segundos
  let attempts = 0;
  const interval = setInterval(function() {
    fixHeaderLogo();
    fixReturnButton();
    fixOrderSummaryDisplay();
    organizeCheckoutFields();
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

/* Estilos para el botón de volver al carrito */
.back-to-cart-button-container {
  margin-bottom: 1.5rem;
}

.back-to-cart-button {
  display: inline-block;
  background-color: transparent !important;
  color: #D93280 !important;
  border: 1px solid #D93280 !important;
  padding: 0.75rem 1rem !important;
  border-radius: 0.5rem !important;
  text-decoration: none !important;
  font-weight: 500 !important;
  transition: all 0.3s ease !important;
}

.back-to-cart-button:hover {
  background-color: rgba(217, 50, 128, 0.1) !important;
  text-decoration: none !important;
}

/* Estilos para la distribución de campos en el checkout */
.checkout-form-grid {
  display: grid;
  grid-template-columns: repeat(1, minmax(0, 1fr));
  gap: 1rem;
}

@media (min-width: 768px) {
  .checkout-form-grid {
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 1.5rem;
  }

  .form-row-full {
    grid-column: span 2 / span 2;
  }

  .form-row-half {
    grid-column: span 1 / span 1;
  }
}

/* Ocultar explícitamente la sección de envío */
.woocommerce-shipping-fields,
div[class*="shipping-fields"],
#customer_details .col-2:empty {
  display: none !important;
}

/* Sección de información adicional a ancho completo */
.checkout-full-width-section {
  grid-column: 1 / -1;
  width: 100%;
  margin-top: 2rem;
  margin-bottom: 2rem;
}

.full-width-additional {
  width: 100%;
  max-width: none;
}

/* Mejorar el espaciado entre secciones del checkout */
.woocommerce-billing-fields {
  margin-bottom: 2rem;
  padding: 1.5rem;
  background-color: #f9fafb;
  border-radius: 0.5rem;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
}

.woocommerce-additional-fields {
  margin-bottom: 2rem;
  padding: 1.5rem;
  background-color: #f9fafb;
  border-radius: 0.5rem;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
  width: 100%;
}

/* Mejorar la apariencia de títulos de secciones */
.woocommerce-billing-fields h3,
.woocommerce-additional-fields h3 {
  color: #030D55;
  font-size: 1.25rem;
  font-weight: 600;
  margin-bottom: 1.5rem;
  padding-bottom: 0.75rem;
  border-bottom: 1px solid #e5e7eb;
}

/* Ajustes para pantallas desktop */
@media (min-width: 1024px) {
  body.woocommerce-checkout .header-container {
    background-color: rgba(255, 255, 255, 0.95) !important;
  }
  
  /* Estructura básica de dos columnas para el checkout con información adicional abajo */
  .woocommerce-checkout form.checkout {
    display: grid;
    grid-template-columns: 3fr 2fr;
    gap: 2rem;
  }
  
  .woocommerce-checkout #customer_details {
    grid-column: 1;
    display: flex;
    flex-direction: column;
  }
  
  .woocommerce-checkout #customer_details .col-1 {
    width: 100%;
  }
  
  .woocommerce-checkout .woocommerce-additional-fields {
    grid-column: 1 / -1;
    order: 3;
  }
  
  .woocommerce-checkout #order_review,
  .woocommerce-checkout #order_review_heading {
    grid-column: 2;
    align-self: start;
    position: sticky;
    top: 120px;
  }
}

/* Estilos para el resumen de pedido generado por JS */
.order-review-wrapper {
  background-color: #f9f9f9;
  border: 1px solid #e5e7eb;
  border-radius: 0.5rem;
  padding: 1.5rem !important;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
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

/* Ocultar título de resumen y eliminar espacios */
#order_review_heading {
  display: none !important;
}

#order_review {
  margin-top: 0 !important;
  padding-top: 0 !important;
  background-color: #f9fafb;
  border-radius: 0.5rem;
  padding: 1.5rem !important;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
}

/* Estilos para formularios de checkout */
form.checkout input[type="text"],
form.checkout input[type="tel"],
form.checkout input[type="email"],
form.checkout input[type="password"],
form.checkout select,
form.checkout textarea,
.woocommerce-input-wrapper input[type="text"],
.woocommerce-input-wrapper input[type="tel"],
.woocommerce-input-wrapper input[type="email"],
.woocommerce-input-wrapper input[type="password"],
.woocommerce-input-wrapper select,
.woocommerce-input-wrapper textarea {
  width: 100%;
  padding: 0.75rem 1rem;
  border: 1px solid #e5e7eb;
  border-radius: 0.5rem;
  background-color: white;
  transition: all 0.3s ease;
  height: 45px !important;
  line-height: 1.5;
}

/* Ajuste específico para textarea */
form.checkout textarea,
.woocommerce-input-wrapper textarea {
  height: auto !important;
  min-height: 120px;
}

/* Ajuste para Select2 (selector de regiones) */
.select2-container--default .select2-selection--single {
  height: 45px !important;
  line-height: 45px !important;
  padding: 0 0.75rem;
  border: 1px solid #e5e7eb !important;
  border-radius: 0.5rem !important;
}

.select2-container--default .select2-selection--single .select2-selection__rendered {
  line-height: 45px !important;
  color: #030D55;
}

.select2-container--default .select2-selection--single .select2-selection__arrow {
  height: 43px !important;
  right: 10px;
}

form.checkout input[type="text"]:focus,
form.checkout input[type="tel"]:focus,
form.checkout input[type="email"]:focus,
form.checkout input[type="password"]:focus,
form.checkout select:focus,
form.checkout textarea:focus,
.woocommerce-input-wrapper input[type="text"]:focus,
.woocommerce-input-wrapper input[type="tel"]:focus,
.woocommerce-input-wrapper input[type="email"]:focus,
.woocommerce-input-wrapper input[type="password"]:focus,
.woocommerce-input-wrapper select:focus,
.woocommerce-input-wrapper textarea:focus {
  outline: none;
  border-color: #D93280;
  box-shadow: 0 0 0 2px rgba(217, 50, 128, 0.2);
  background-color: white;
}

.woocommerce-checkout label {
  font-weight: 500;
  margin-bottom: 0.5rem;
  display: block;
  color: #030D55;
}

/* Reducir el espacio entre la etiqueta y el campo */
.form-row {
  margin-bottom: 1.25rem;
}

/* Estilo para los campos obligatorios */
.form-row .required {
  color: #D93280;
  font-weight: 700;
}

/* Mejor estilo para errores de validación */
.woocommerce-invalid-required-field input,
.woocommerce-invalid-required-field select,
.woocommerce-invalid-required-field textarea {
  border-color: #EF4444 !important;
  background-color: #FEF2F2 !important;
}

.woocommerce form .form-row.woocommerce-invalid label {
  color: #EF4444;
}

/* Estilo para el botón de finalizar compra */
#place_order,
.checkout-button,
.woocommerce button.button.alt {
  background: linear-gradient(to right, #D93280, #5A0989) !important;
  color: white !important;
  font-weight: 600 !important;
  padding: 0.75rem 1.5rem !important;
  border-radius: 0.5rem !important;
  border: none !important;
  transition: all 0.3s ease !important;
  display: block !important;
  width: 100% !important;
  text-align: center !important;
  margin-top: 1rem !important;
}

#place_order:hover,
.checkout-button:hover,
.woocommerce button.button.alt:hover {
  background: linear-gradient(to right, #AB277A, #4A0979) !important;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1) !important;
  transform: translateY(-2px) !important;
}

/* Mejorar tabla de resumen del pedido */
.woocommerce-checkout-review-order-table {
  width: 100%;
  border-collapse: collapse;
  border-radius: 0.5rem;
  overflow: hidden;
  margin-bottom: 1.5rem;
  border: 1px solid #e5e7eb;
  background-color: white;
}

.woocommerce-checkout-review-order-table th,
.woocommerce-checkout-review-order-table td {
  padding: 0.75rem 1rem;
  border-bottom: 1px solid #e5e7eb;
}

.woocommerce-checkout-review-order-table thead {
  background-color: #f3f4f6;
}

.woocommerce-checkout-review-order-table thead th {
  font-weight: 600;
  color: #030D55;
}

.woocommerce-checkout-review-order-table tfoot {
  background-color: #f9fafb;
}

.woocommerce-checkout-review-order-table tfoot th {
  font-weight: 500;
  text-align: left;
}

.woocommerce-checkout-review-order-table tfoot tr:last-child {
  border-top: 2px solid #D93280;
}

.woocommerce-checkout-review-order-table tfoot tr:last-child th,
.woocommerce-checkout-review-order-table tfoot tr:last-child td {
  font-weight: 700;
  color: #D93280;
  font-size: 1.1rem;
}

/* Mejorar áreas de pago */
.woocommerce-checkout #payment {
  background-color: white;
  border-radius: 0.5rem;
  border: 1px solid #e5e7eb;
  margin-top: 1.5rem;
}

.woocommerce-checkout #payment ul.payment_methods {
  padding: 1rem;
  border-bottom: 1px solid #e5e7eb;
}

.woocommerce-checkout #payment div.payment_box {
  background-color: #f3f4f6;
  color: #030D55;
  padding: 1rem;
  margin: 0.5rem 0;
  border-radius: 0.5rem;
}

.woocommerce-checkout #payment div.form-row {
  padding: 1rem;
}

/* Mejora para dispositivos móviles */
@media (max-width: 768px) {
  .woocommerce-checkout form.checkout {
    display: flex;
    flex-direction: column;
  }
  
  .woocommerce-checkout #customer_details {
    order: 1;
  }
  
  .woocommerce-checkout #order_review {
    order: 0;
    margin-bottom: 2rem;
  }
  
  .woocommerce-billing-fields, 
  .woocommerce-additional-fields {
    padding: 1rem;
  }
}

/* Espaciado para la casilla de verificación de términos y condiciones */
.woocommerce-terms-and-conditions-wrapper {
  margin: 1.5rem 0;
  padding: 1rem;
  border-radius: 0.5rem;
  background-color: #f9fafb;
  border: 1px solid #e5e7eb;
}

/* Estilo para las etiquetas de radio buttons y checkboxes */
.woocommerce-checkout .woocommerce-form__label-for-checkbox,
.woocommerce-checkout .woocommerce-form__label-for-radio {
  display: flex;
  align-items: center;
  cursor: pointer;
}

.woocommerce-checkout .woocommerce-form__input-checkbox,
.woocommerce-checkout .woocommerce-form__input-radio {
  margin-right: 0.5rem;
}

/* Estilo para WebPay y métodos de pago */
.payment_method_webpay_plus img,
.payment_method_webpay img {
  max-height: 32px;
  vertical-align: middle;
  margin: 0 0.5rem;
}

/* Compatibilidad con temas que usan Flexbox */
.woocommerce-billing-fields__field-wrapper {
  display: flex;
  flex-wrap: wrap;
  margin: -0.5rem;
}

.woocommerce-additional-fields__field-wrapper {
  display: flex;
  flex-wrap: wrap;
  margin: -0.5rem;
}

.woocommerce-billing-fields__field-wrapper > p,
.woocommerce-additional-fields__field-wrapper > p {
  padding: 0.5rem;
  margin: 0 !important;
  box-sizing: border-box;
}

@media (min-width: 768px) {
  .woocommerce-billing-fields__field-wrapper > p {
    flex: 0 0 50%;
    max-width: 50%;
    margin-bottom: 1rem !important;
  }
  
  /* Campos que deberían ocupar todo el ancho */
  #billing_address_1_field,
  #billing_address_2_field,
  #billing_company_field {
    flex: 0 0 100%;
    max-width: 100%;
  }
  
  /* Orden específico para los campos */
  #billing_first_name_field { order: 1; }
  #billing_last_name_field { order: 2; }
  #billing_email_field { order: 3; }
  #billing_phone_field { order: 4; }
  #billing_address_1_field { order: 5; }
  #billing_address_2_field { order: 6; }
  #billing_city_field { order: 7; }
  #billing_state_field { order: 8; }
  #billing_country_field { order: 9; }
  #billing_postcode_field { order: 10; }
  
  /* Hacer que todos los campos de información adicional usen ancho completo */
  .woocommerce-additional-fields__field-wrapper > p,
  #order_comments_field {
    flex: 0 0 100%;
    max-width: 100%;
  }
}

/* Ajustar el formulario para que las notas estén abajo */
.woocommerce-checkout .woocommerce-additional-fields {
  order: 999;
  margin-top: 2rem;
}
</style>
@endsection