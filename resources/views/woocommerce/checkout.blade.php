{{--
Template Name: Checkout Template
--}}

@extends('layouts.app')

@section('styles')
<style>
  /* Fix oversized logo in header - centralizado en un solo lugar */
  #main-header .header-logo,
  #main-header a.flex img {
    max-width: 200px !important;
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
    <div class="text-center pt-16 md:pt-20 lg:pt-24 mt-10">
      <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-[#030D55] mb-8 font-playfair">Finalizar Compra</h1>
    </div>

    <div class="woocommerce checkout-wrapper max-w-7xl mx-auto">
      {!! do_shortcode('[woocommerce_checkout]') !!}
    </div>
  </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
  // Función central que ejecuta todas las mejoras
  const applyAllFixes = function() {
    fixReturnButton();
    fixOrderSummaryDisplay();
    organizeCheckoutFields();
  };
  
  // Modificar botón "Volver a la tienda" (eliminados selectores inválidos con :contains)
  const fixReturnButton = function() {
    // Buscar todos los posibles botones/enlaces de "volver"
    const selectors = [
      'a.button.wc-backward', 
      'a[href*="/shop"]'
    ];
    
    selectors.forEach(selector => {
      const elements = document.querySelectorAll(selector);
      if (elements.length > 0) {
        elements.forEach(el => {
          // Solo modificar los que son botones de "volver a la tienda"
          if (el.textContent.toLowerCase().includes('volver') || 
              el.textContent.includes('tienda') || 
              (el.href && el.href.includes('/shop'))) {
            el.setAttribute('href', '{{ home_url("/carrito") }}');
            el.textContent = 'Volver al carrito';
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
          
          // Asegurarse de que los select tienen la altura y alineación correctas
          if (field.id.includes('billing_country') || field.id.includes('billing_state')) {
            const select = field.querySelector('select');
            if (select) {
              select.style.height = '45px';
              select.style.lineHeight = '1.5';
              select.style.paddingTop = '0';
              select.style.paddingBottom = '0';
            }
            
            // También para los campos Select2 (usados a menudo para regiones)
            const select2 = field.querySelector('.select2-container');
            if (select2) {
              select2.style.height = '45px';
              
              // Buscar el elemento de span que muestra el valor seleccionado
              const renderedSpan = select2.querySelector('.select2-selection__rendered');
              if (renderedSpan) {
                renderedSpan.style.lineHeight = '43px';
                renderedSpan.style.paddingTop = '0';
                renderedSpan.style.paddingBottom = '0';
                renderedSpan.style.display = 'flex';
                renderedSpan.style.alignItems = 'center';
              }
            }
          }
        });
      }
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
        
        // Asegurarse de que el título de la sección sea visible
        const additionalTitle = additionalFields.querySelector('h3');
        if (additionalTitle) {
          additionalTitle.style.display = 'block';
        }
        
        // También procesar los campos de información adicional
        const additionalFieldsInputs = additionalFields.querySelectorAll('.woocommerce-additional-fields__field-wrapper .form-row');
        if (additionalFieldsInputs.length > 0) {
          const additionalWrapper = additionalFields.querySelector('.woocommerce-additional-fields__field-wrapper');
          if (additionalWrapper) {
            additionalWrapper.classList.add('checkout-form-grid', 'full-width-fields');
            
            // Hacer que todos los campos adicionales tengan ancho completo
            additionalFieldsInputs.forEach(field => {
              field.classList.add('form-row-full');
            });
          }
        }
        
        // Si no hay campos de notas, intenta añadirlo
        if (additionalFieldsInputs.length === 0) {
          const wrapper = additionalFields.querySelector('.woocommerce-additional-fields__field-wrapper');
          if (wrapper) {
            wrapper.classList.add('checkout-form-grid', 'full-width-fields');
            
            // Verificar si necesitamos crear el campo de notas
            if (!wrapper.querySelector('#order_comments_field')) {
              // Comprobar si existe un textarea para order_comments en otro lugar
              const existingTextarea = document.querySelector('#order_comments');
              if (!existingTextarea) {
                console.log('Intentando crear el campo de notas del pedido');
                // Crear el campo de notas
                const notesField = document.createElement('p');
                notesField.className = 'form-row notes';
                notesField.id = 'order_comments_field';
                
                const label = document.createElement('label');
                label.htmlFor = 'order_comments';
                label.textContent = 'Notas del pedido (opcional)';
                
                const span = document.createElement('span');
                span.className = 'woocommerce-input-wrapper';
                
                const textarea = document.createElement('textarea');
                textarea.name = 'order_comments';
                textarea.id = 'order_comments';
                textarea.placeholder = 'Notas sobre tu pedido, por ejemplo, notas especiales para la entrega.';
                textarea.rows = 5;
                textarea.cols = 5;
                textarea.className = 'input-text';
                
                span.appendChild(textarea);
                notesField.appendChild(label);
                notesField.appendChild(span);
                
                wrapper.appendChild(notesField);
              }
            }
          }
        }
      }
    };
    
    moveAdditionalFields();
    
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
  
  // Ejecutar todas las mejoras inicialmente
  applyAllFixes();
  
  // Intentar el fix de Order Review una vez después de un segundo
  setTimeout(function() {
    fixOrderReview();
    applyAllFixes();
  }, 1000);
  
  // Ejecutar nuevamente después de que se cargue completamente la página
  window.addEventListener('load', function() {
    applyAllFixes();
    fixOrderReview();
  });
  
  // En caso de que haya componentes dinámicos, intentar cada segundo durante 3 segundos
  let attempts = 0;
  const interval = setInterval(function() {
    applyAllFixes();
    if (attempts === 1) {
      fixOrderReview();
    }
    attempts++;
    if (attempts >= 3) {
      clearInterval(interval);
    }
  }, 1000);
});
</script>

<style>
/* --- CONFIGURACIÓN GLOBAL --- */
/* Estilos para arreglar el tema del header */
#main-header .header-logo,
#main-header a.flex img {
  max-width: 200px !important;
  height: auto !important;
}

#main-header .header-container {
  padding-top: 0.5rem !important;
  padding-bottom: 0.5rem !important;
}

/* --- ESTRUCTURA DEL CHECKOUT --- */
/* Ocultar explícitamente la sección de envío */
.woocommerce-shipping-fields,
div[class*="shipping-fields"],
#customer_details .col-2:empty,
#customer_details .col-2 {
  display: none !important;
}

/* Fix margin issues with block checkout */
.wc-block-checkout {
  margin-top: 2rem !important; 
}

.wc-block-components-sidebar {
  margin-top: 0 !important;
}

/* Estructura básica de dos columnas para el checkout */
@media (min-width: 1024px) {
  body.woocommerce-checkout .header-container {
    background-color: rgba(255, 255, 255, 0.95) !important;
  }
  
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
  
  .woocommerce-checkout #order_review,
  .woocommerce-checkout #order_review_heading {
    grid-column: 2;
    align-self: start;
    position: sticky;
    top: 120px;
  }
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

/* --- SECCIONES DEL CHECKOUT --- */
/* Mejorar el espaciado entre secciones del checkout */
.woocommerce-billing-fields {
  margin-bottom: 2rem;
  padding: 1.5rem;
  background-color: #f9fafb;
  border-radius: 0.5rem;
  border: 4px solid transparent;
  background-image: linear-gradient(white, white), linear-gradient(to right, #D93280, #5A0989);
  background-origin: border-box;
  background-clip: padding-box, border-box;
}

/* Sección de información adicional a ancho completo */
.checkout-full-width-section {
  grid-column: 1 / -1;
  width: 100%;
  margin-top: 2rem;
  margin-bottom: 2rem;
}

.full-width-additional {
  width: 100% !important;
  max-width: 100% !important;
  margin-bottom: 2rem;
  padding: 1.5rem;
  background-color: #f9fafb;
  border-radius: 0.5rem;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
}

.full-width-fields {
  width: 100% !important;
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

/* --- DISTRIBUCIÓN DE CAMPOS --- */
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
  
  /* Asegurar ancho completo para campos de notas adicionales */
  .full-width-fields {
    grid-template-columns: repeat(1, minmax(0, 1fr)) !important;
    width: 100% !important;
  }
}

/* Compatibilidad con temas que usan Flexbox */
.woocommerce-billing-fields__field-wrapper,
.woocommerce-additional-fields__field-wrapper {
  display: flex;
  flex-wrap: wrap;
  margin: -0.5rem;
  width: 100%;
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
  
  /* Hacer que todos los campos de información adicional usen ancho completo */
  .woocommerce-additional-fields__field-wrapper > p,
  #order_comments_field {
    flex: 0 0 100%;
    max-width: 100%;
    width: 100%;
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
}

/* Ajustar el formulario para que las notas estén abajo */
.woocommerce-checkout .woocommerce-additional-fields {
  order: 999;
  margin-top: 2rem;
  width: 100% !important;
}

/* --- ESTILOS DE CAMPOS --- */
/* Estilos unificados para formularios de checkout */
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
  display: flex;
  align-items: center;
}

/* Corrección específica para los selects (país y región) */
form.checkout select, 
.woocommerce-input-wrapper select {
  appearance: none;
  -webkit-appearance: none;
  -moz-appearance: none;
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='%23666' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14L2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 01.753 1.659l-4.796 5.48a1 1 0 01-1.506 0z'/%3E%3C/svg%3E");
  background-repeat: no-repeat;
  background-position: calc(100% - 12px) center;
  padding-right: 35px !important;
  text-align-last: left;
  display: flex;
  align-items: center;
}

/* Ajuste específico para textarea */
form.checkout textarea,
.woocommerce-input-wrapper textarea {
  height: auto !important;
  min-height: 120px;
  padding: 0.75rem 1rem;
}

/* Ajuste para Select2 (selector de regiones) */
.select2-container--default .select2-selection--single {
  height: 45px !important;
  border: 1px solid #e5e7eb !important;
  border-radius: 0.5rem !important;
  display: flex !important;
  align-items: center !important;
}

.select2-container--default .select2-selection--single .select2-selection__rendered {
  line-height: normal !important;
  padding-left: 1rem !important;
  color: #030D55;
  display: flex !important;
  align-items: center !important;
  height: 100% !important;
}

.select2-container--default .select2-selection--single .select2-selection__arrow {
  height: 100% !important;
  right: 8px !important;
  display: flex !important;
  align-items: center !important;
}

/* Estados de campos */
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

/* --- RESUMEN DE PEDIDO --- */
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
  border: 4px solid transparent;
  background-image: linear-gradient(white, white), linear-gradient(to right, #D93280, #5A0989);
  background-origin: border-box;
  background-clip: padding-box, border-box;
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
}

/* --- ÁREA DE PAGO --- */
/* Mejorar áreas de pago */
.woocommerce-checkout #payment {
  background-color: white;
  border-radius: 0.5rem;
  padding: 1.5rem;
  margin-top: 1.5rem;
}

.woocommerce-checkout #payment ul.payment_methods {
  padding: 1rem;
  border-bottom: 1px solid rgba(217, 50, 128, 0.2);
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

/* Espaciado para la casilla de verificación de términos y condiciones */
.woocommerce-terms-and-conditions-wrapper {
  margin: 1.5rem 0;
  padding: 1rem;
  border-radius: 0.5rem;
  background-color: #f8f9fa;
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

/* --- COMPONENTES WEB PAY --- */
/* Estilo para WebPay y métodos de pago */
.payment_method_webpay_plus,
.payment_method_webpay {
  padding: 1rem;
  background-color: #f8f9fa;
  border-radius: 0.5rem;
  margin-bottom: 0.5rem;
}

.payment_method_webpay_plus img,
.payment_method_webpay img {
  max-height: 36px;
  vertical-align: middle;
  margin: 0.5rem;
}

.payment_method_webpay_plus label,
.payment_method_webpay label {
  display: flex !important;
  align-items: center !important;
  font-weight: 600 !important;
  color: #030D55 !important;
}

/* Mejora para el contenedor de WebPay */
.woocommerce-checkout #payment ul.payment_methods li.wc_payment_method.payment_method_webpay_plus > label,
.woocommerce-checkout #payment ul.payment_methods li.wc_payment_method.payment_method_webpay > label {
  display: flex !important;
  align-items: center !important;
  gap: 0.5rem;
}

/* Estilo para la descripción de método de pago */
.payment_box.payment_method_webpay_plus p,
.payment_box.payment_method_webpay p {
  color: #030D55;
  font-size: 0.875rem;
  padding: 0.5rem;
  background-color: rgba(217, 50, 128, 0.05);
  border-left: 3px solid #D93280;
  border-radius: 0.25rem;
  margin: 0.5rem 0 !important;
}

/* Sección de términos y condiciones */
.woocommerce-terms-and-conditions-wrapper {
  margin: 1.5rem 0;
  padding: 1rem;
  border-radius: 0.5rem;
  background-color: #f8f9fa;
  border: 1px solid #e5e7eb;
}

.woocommerce-privacy-policy-text p {
  font-size: 0.875rem;
  color: #4b5563;
  margin-bottom: 1rem;
}

.woocommerce-terms-and-conditions-checkbox-text {
  font-weight: 500;
  color: #030D55;
}

/* Campo de notas del pedido */
#order_comments_field {
  margin-top: 0 !important;
  width: 100% !important;
}

#order_comments_field label {
  font-weight: 500;
  color: #030D55;
  margin-bottom: 0.5rem;
}

#order_comments {
  min-height: 120px;
  width: 100% !important;
  padding: 0.75rem 1rem;
  border: 1px solid #e5e7eb;
  border-radius: 0.5rem;
  background-color: white;
  transition: all 0.3s ease;
  color: #030D55;
}

.woocommerce-additional-fields h3 {
  display: block !important;
  margin-bottom: 1rem !important;
  font-size: 1.125rem !important;
}

/* Asegurarse de que el contenedor de campos adicionales tenga ancho completo */
.woocommerce-additional-fields__field-wrapper {
  width: 100% !important;
  max-width: 100% !important;
  display: block !important;
}

/* --- BOTONES --- */
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

/* Estilo para el botón de volver al carrito */
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

/* Estilos para el mensaje de login */
.woocommerce-form-login-toggle .woocommerce-info,
.woocommerce-form-coupon-toggle .woocommerce-info {
  background: linear-gradient(to right, #D93280, #5A0989) !important;
  color: white !important;
  border: none !important;
  border-radius: 0.5rem !important;
  padding: 1.25rem 1.25rem 1.25rem 3rem !important;
  margin-bottom: 1.5rem !important;
  display: flex !important;
  align-items: center !important;
  position: relative !important;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1) !important;
}

.woocommerce-form-login-toggle .woocommerce-info::before,
.woocommerce-form-coupon-toggle .woocommerce-info::before {
  color: white !important;
  opacity: 0.9 !important;
  position: absolute !important;
  left: 1.25rem !important;
  top: 50% !important;
  transform: translateY(-50%) !important;
}

.woocommerce-form-login-toggle .woocommerce-info a,
.woocommerce-form-coupon-toggle .woocommerce-info a {
  color: white !important;
  text-decoration: underline !important;
  font-weight: 600 !important;
  transition: all 0.2s ease !important;
  margin-left: 0.5rem !important;
}

.woocommerce-form-login-toggle .woocommerce-info a:hover,
.woocommerce-form-coupon-toggle .woocommerce-info a:hover {
  opacity: 0.9 !important;
  text-decoration: none !important;
}

/* Formulario de login en checkout */
.woocommerce-form-login {
  background-color: white !important;
  border: 4px solid transparent !important;
  border-radius: 0.5rem !important;
  background-image: linear-gradient(white, white), linear-gradient(to right, #D93280, #5A0989) !important;
  background-origin: border-box !important;
  background-clip: padding-box, border-box !important;
  padding: 1.5rem !important;
  margin-bottom: 2rem !important;
}

/* Ajuste de espaciado para iconos y texto */
.woocommerce-info {
  line-height: 1.5 !important;
  display: flex !important;
  align-items: center !important;
  gap: 0.5rem !important;
}

/* Asegurar que el texto no se superponga con el icono */
.woocommerce-info > * {
  margin: 0 !important;
  padding: 0 !important;
}

/* --- ESTILOS PARA LA PÁGINA DE CONFIRMACIÓN DE PEDIDO (ORDER RECEIVED) --- */

/* Estilizar la confirmación del pedido recibido */
.woocommerce-order-received main,
.woocommerce-checkout.woocommerce-order-received section {
  background-color: white;
}

/* Contenedor principal de la orden recibida */
.woocommerce-thankyou-order-received {
  background-color: #E6F7EC !important;
  color: #0A6937 !important;
  padding: 1.25rem !important;
  border-radius: 0.5rem !important;
  margin-bottom: 2rem !important;
  font-weight: 500 !important;
  text-align: center !important;
  border-left: 4px solid #0A6937 !important;
}

/* Tabla de detalles del pedido */
.shop_table.order_details,
table.woocommerce-table--order-details {
  width: 100% !important;
  border-collapse: collapse !important;
  margin-bottom: 2rem !important;
  border: 1px solid #e5e7eb !important;
  border-radius: 0.5rem !important;
  overflow: hidden !important;
}

.shop_table.order_details th,
.shop_table.order_details td,
.woocommerce-table--order-details th,
.woocommerce-table--order-details td {
  padding: 1rem !important;
  text-align: left !important;
  border-bottom: 1px solid #e5e7eb !important;
}

.shop_table.order_details thead th,
.woocommerce-table--order-details thead th {
  background-color: #f3f4f6 !important;
  font-weight: 600 !important;
  color: #030D55 !important;
}

.shop_table.order_details tfoot,
.woocommerce-table--order-details tfoot {
  background-color: #f9fafb !important;
}

.shop_table.order_details tfoot th,
.woocommerce-table--order-details tfoot th {
  font-weight: 500 !important;
  text-align: right !important;
}

.shop_table.order_details tfoot tr:last-child,
.woocommerce-table--order-details tfoot tr:last-child {
  border-top: 2px solid #D93280 !important;
}

.shop_table.order_details tfoot tr:last-child th,
.shop_table.order_details tfoot tr:last-child td,
.woocommerce-table--order-details tfoot tr:last-child th,
.woocommerce-table--order-details tfoot tr:last-child td {
  font-weight: 700 !important;
  color: #D93280 !important;
}

/* Número de orden y detalles */
.woocommerce-order-overview,
.woocommerce-thankyou-order-details {
  list-style: none !important;
  margin: 0 0 2rem 0 !important;
  padding: 1.5rem !important;
  background-color: #f9fafb !important;
  border-radius: 0.5rem !important;
  display: flex !important;
  flex-wrap: wrap !important;
  gap: 1rem !important;
  border: 4px solid transparent !important;
  background-image: linear-gradient(white, white), linear-gradient(to right, #D93280, #5A0989) !important;
  background-origin: border-box !important;
  background-clip: padding-box, border-box !important;
}

.woocommerce-order-overview li,
.woocommerce-thankyou-order-details li {
  flex: 1 1 calc(50% - 1rem) !important;
  padding: 0.75rem !important;
  background-color: white !important;
  border-radius: 0.5rem !important;
  box-shadow: 0 1px 3px rgba(0,0,0,0.1) !important;
}

@media (min-width: 768px) {
  .woocommerce-order-overview li,
  .woocommerce-thankyou-order-details li {
    flex: 1 1 calc(25% - 1rem) !important;
  }
}

.woocommerce-order-overview li strong,
.woocommerce-thankyou-order-details li strong {
  display: block !important;
  font-size: 1.1rem !important;
  color: #030D55 !important;
  margin-top: 0.25rem !important;
}

/* Título de secciones en la página de orden recibida */
.woocommerce-order-received h2 {
  color: #030D55 !important;
  font-size: 1.5rem !important;
  font-weight: 600 !important;
  margin: 2rem 0 1rem 0 !important;
  padding-bottom: 0.75rem !important;
  border-bottom: 1px solid #e5e7eb !important;
}

/* Detalles del pago y dirección */
.woocommerce-customer-details address,
.woocommerce-column--billing-address address,
.woocommerce-column--shipping-address address {
  padding: 1.5rem !important;
  border: 1px solid #e5e7eb !important;
  border-radius: 0.5rem !important;
  background-color: white !important;
  line-height: 1.6 !important;
}

.woocommerce-customer-details {
  margin-top: 2rem !important;
}

/* Detalles adicionales */
.woocommerce-order-details {
  margin-bottom: 2rem !important;
}

/* Mensaje del estado de la orden */
.woocommerce-message {
  padding: 1rem 1.5rem !important;
  margin-bottom: 1.5rem !important;
  background-color: #E6F7EC !important;
  color: #0A6937 !important;
  border-radius: 0.5rem !important;
  border-left: 4px solid #0A6937 !important;
}

/* Paginado y botones */
nav.woocommerce-pagination ul {
  display: flex !important;
  justify-content: center !important;
  list-style: none !important;
  margin: 2rem 0 !important;
  padding: 0 !important;
}

nav.woocommerce-pagination ul li {
  margin: 0 0.25rem !important;
}

nav.woocommerce-pagination ul li a,
nav.woocommerce-pagination ul li span {
  display: block !important;
  padding: 0.5rem 1rem !important;
  background-color: #f3f4f6 !important;
  color: #030D55 !important;
  border-radius: 0.25rem !important;
  text-decoration: none !important;
}

nav.woocommerce-pagination ul li span.current {
  background-color: #D93280 !important;
  color: white !important;
}

/* Mensajes de alerta */
.woocommerce-message,
.woocommerce-error,
.woocommerce-notice--success {
  margin: 1.5rem 0 !important;
}

/* Estilos para alertas y notificaciones */
.woocommerce-notice--success {
  background-color: #E6F7EC !important;
  color: #0A6937 !important;
  padding: 1.25rem !important;
  border-radius: 0.5rem !important;
  border-left: 4px solid #0A6937 !important;
}

.woocommerce-error {
  background-color: #FEE2E2 !important;
  color: #B91C1C !important;
  padding: 1.25rem !important;
  border-radius: 0.5rem !important;
  margin-bottom: 1.5rem !important;
  border-left: 4px solid #B91C1C !important;
  list-style-position: inside !important;
}

/* Estilo para los detalles de pago */
#payment_details {
  margin-top: 2rem !important;
  margin-bottom: 1.5rem !important;
  font-weight: 600 !important;
  color: #030D55 !important;
  font-size: 1.25rem !important;
}

/* Clase RT para el número de orden */
.RT {
  font-family: monospace !important;
  color: #5A0989 !important;
  font-weight: 600 !important;
}

/* Tabla responsive para la confirmación */
@media (max-width: 767px) {
  .shop_table.order_details,
  .woocommerce-table--order-details {
    display: block !important;
    width: 100% !important;
    overflow-x: auto !important;
  }
  
  .woocommerce-order-overview,
  .woocommerce-thankyou-order-details {
    flex-direction: column !important;
  }
  
  .woocommerce-order-overview li,
  .woocommerce-thankyou-order-details li {
    flex: 1 1 100% !important;
  }
}

/* Clases para los mensajes específicos */
.woocommerce-notice {
  margin-bottom: 1.5rem !important;
}

/* Estilos para el botón de volver a comprar */
.woocommerce-order-received .button {
  display: inline-block !important;
  background: linear-gradient(to right, #D93280, #5A0989) !important;
  color: white !important;
  font-weight: 500 !important;
  padding: 0.75rem 1.5rem !important;
  border-radius: 0.5rem !important;
  text-decoration: none !important;
  margin-top: 1rem !important;
  transition: all 0.3s ease !important;
}

.woocommerce-order-received .button:hover {
  background: linear-gradient(to right, #AB277A, #4A0979) !important;
  transform: translateY(-2px) !important;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1) !important;
}

/* Estilos adicionales específicos para la página de confirmación de pedido */
.woocommerce-order {
  max-width: 1000px !important;
  margin: 0 auto !important;
  padding: 2rem 1rem !important;
}

/* Ajuste específico para texto en el mensaje de confirmación */
.woocommerce-notice--success.woocommerce-thankyou-order-received {
  font-size: 1.1rem !important;
  text-align: center !important;
  padding: 1.5rem !important;
}

/* Estilos para la tabla de detalles en la confirmación */
.woocommerce-table.woocommerce-table--order-details.shop_table.order_details {
  margin-top: 1rem !important;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05) !important;
}

/* Mejorar visualmente el número de pedido */
.woocommerce-order-overview__order.order {
  font-weight: 500 !important;
}

.woocommerce-order-overview__order.order strong {
  color: #5A0989 !important;
  font-weight: 700 !important;
}

/* Estilos específicos para la tabla de datos de transacción */
.woocommerce-order-details td,
.woocommerce-order-details th,
.woocommerce-table--order-details td,
.woocommerce-table--order-details th {
  padding: 0.75rem 1rem !important;
  vertical-align: middle !important;
}

/* Estilos para títulos dentro de la tabla de confirmación */
h2.woocommerce-order-details__title,
h2.woocommerce-column__title {
  color: #030D55 !important;
  font-size: 1.25rem !important;
  margin-bottom: 1.25rem !important;
}

/* Destacar información importante */
.woocommerce-order p {
  margin-bottom: 1rem !important;
  line-height: 1.6 !important;
  color: #4B5563 !important;
}

/* Mensajes de transacciones */
.woocommerce-message--info {
  background-color: #EFF6FF !important;
  color: #1E40AF !important;
  border-left: 4px solid #1E40AF !important;
}

/* Estilos específicos para tipos de alertas */
.woocommerce-message[role="alert"],
.woocommerce-message[tabindex="-1"] {
  display: flex !important;
  align-items: center !important;
  padding: 1rem 3.5rem !important;
  border-radius: 0.5rem !important;
  margin: 1rem 0 !important;
}

/* Detalles del pago */
#payment_details {
  background-color: #F9FAFB !important;
  padding: 0.75rem 1rem !important;
  border-radius: 0.5rem !important;
  margin-bottom: 1.5rem !important;
  border-left: 4px solid #D93280 !important;
}

/* Estilos para la tabla de detalles de transacción */
table {
  width: 100% !important;
  border-collapse: collapse !important;
  margin-bottom: 1.5rem !important;
}

/* Estilo para la tabla de detalles del pago */
table:has(th[scope="row"]) {
  border: 1px solid #e5e7eb !important;
  border-radius: 0.5rem !important;
  overflow: hidden !important;
  background-color: white !important;
}

/* Estilar filas impares para mejor legibilidad */
table tr:nth-child(odd) {
  background-color: #f9fafb !important;
}

/* Estilos específicos para la transacción aprobada */
.transaccion-aprobada {
  display: flex !important;
  align-items: center !important;
  background-color: #E6F7EC !important;
  color: #0A6937 !important;
  padding: 0.75rem 1rem !important;
  border-radius: 0.5rem !important;
  margin-bottom: 1.5rem !important;
}

.transaccion-aprobada:before {
  content: "✓" !important;
  display: inline-block !important;
  width: 20px !important;
  height: 20px !important;
  margin-right: 0.5rem !important;
  background-color: #0A6937 !important;
  color: white !important;
  border-radius: 50% !important;
  text-align: center !important;
  line-height: 20px !important;
  font-size: 12px !important;
}

@media (max-width: 767px) {
  .woocommerce-order-overview li,
  .woocommerce-thankyou-order-details li {
    flex: 1 1 100% !important;
    margin-bottom: 0.5rem !important;
  }
  
  .woocommerce-order {
    padding: 1rem !important;
  }
  
  /* Mejorar visualización de tablas en móvil */
  .woocommerce-table--order-details,
  .shop_table.order_details {
    font-size: 0.9rem !important;
  }
  
  /* Datos de la transacción más legibles en móvil */
  table.woocommerce-table--order-details td,
  table.shop_table td {
    padding: 0.5rem 0.75rem !important;
  }
}

/* Estilos para la tabla de detalles de transacción */
table.woocommerce-table--order-details th[scope="row"],
table.shop_table th[scope="row"] {
  text-align: left !important;
  font-weight: 600 !important;
  color: #030D55 !important;
  background-color: #F9FAFB !important;
  width: 45% !important;
}

/* Contenedor del checkout y finalización */
.container.mx-auto.px-4 {
  max-width: 1200px !important;
  padding: 0 1rem !important;
}

/* Mejorar el espacio del título principal */
.text-center.mb-12.pt-16.md\\:pt-20.lg\\:pt-24.mt-10 {
  margin-bottom: 2rem !important;
}

/* Texto específico para la confirmación */
.text-center.mb-12 h1 {
  margin-bottom: 1rem !important;
}

/* Formato para código de autorización y otros valores específicos */
.woocommerce-table--order-details tr:nth-child(2) td,
.woocommerce-table--order-details .authorization-code {
  font-family: monospace !important;
  font-weight: 500 !important;
}

/* Estilo para tipo de pago */
.woocommerce-table--order-details tr:nth-child(5) td,
.payment-type {
  font-weight: 500 !important;
  color: #030D55 !important;
}

/* Estilo para precio total */
.woocommerce-table--order-details tfoot tr:last-child td,
.woocommerce-Price-amount.amount {
  font-weight: 700 !important;
  color: #D93280 !important;
}

/* Estilos específicos para la tabla de detalles de transacción */
table {
  width: 100% !important;
  border-collapse: collapse !important;
  margin-bottom: 1.5rem !important;
}

/* Estilo para la tabla de detalles del pago */
.shop_table, 
.woocommerce-table--order-details,
table.woocommerce-table,
#payment_details + table {
  border: 1px solid #e5e7eb !important;
  border-radius: 0.5rem !important;
  overflow: hidden !important;
  background-color: white !important;
}

/* Estilar filas impares para mejor legibilidad */
table tr:nth-child(odd) {
  background-color: #f9fafb !important;
}
</style>
@endsection