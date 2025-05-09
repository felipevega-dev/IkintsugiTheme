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
    <div class="text-center mb-6 mt-10">
      <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-[#030D55] mb-8 font-playfair">Carrito de Compra</h1>
    </div>
    
    <div class="woocommerce bg-white p-6 rounded-lg shadow-sm max-w-5xl mx-auto" style="border: 4px solid transparent; border-radius: 0.5rem; background-image: linear-gradient(white, white), linear-gradient(to right, #D93280, #5A0989); background-origin: border-box; background-clip: padding-box, border-box;">
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
  
  // Ocultar columnas de cantidad y habilitar imagen del profesional
  const fixCartLayout = function() {
    // Ocultar columna de cantidad
    const quantityHeader = document.querySelector('.woocommerce-cart-form__cart-item .product-quantity, .shop_table .product-quantity');
    if (quantityHeader) {
      quantityHeader.style.display = 'none';
    }
    
    // Ocultar todas las celdas de cantidad
    const quantityCells = document.querySelectorAll('.product-quantity');
    quantityCells.forEach(cell => {
      cell.style.display = 'none';
    });
    
    // Limpiar la imagen del producto y mostrar imagen del profesional si existe
    const productImages = document.querySelectorAll('.product-thumbnail img');
    productImages.forEach(img => {
      // Obtener el nombre del profesional desde el texto del producto
      const productRow = img.closest('tr');
      if (productRow) {
        const productName = productRow.querySelector('.product-name');
        if (productName) {
          const profesionalMatch = productName.textContent.match(/Profesional: ([^\n]+)/);
          if (profesionalMatch && profesionalMatch[1]) {
            const profesionalName = profesionalMatch[1].trim();
            // Intentar encontrar una imagen de perfil para este profesional
            fetch('{{ home_url("/wp-json/ikintsugi/v1/staff-photo?name=") }}' + encodeURIComponent(profesionalName))
              .then(response => response.json())
              .then(data => {
                if (data.success && data.photo_url) {
                  img.setAttribute('src', data.photo_url);
                  img.setAttribute('alt', 'Profesional: ' + profesionalName);
                  img.style.borderRadius = '50%';
                  img.style.border = '2px solid #D93280';
                }
              })
              .catch(error => {
                console.error('Error fetching professional photo:', error);
              });
          }
        }
      }
    });
    
    // Prevenir que los enlaces de productos hagan algo al hacer clic
    const productLinks = document.querySelectorAll('.product-name a, .product-thumbnail a');
    productLinks.forEach(link => {
      // Primero, obtener el texto y mantenerlo
      const text = link.textContent;
      
      // Opción 1: Reemplazar el enlace por el texto
      const parent = link.parentNode;
      if (parent) {
        parent.innerHTML = text;
      }
      
      // Opción 2: Si la opción 1 no funciona, prevenir el comportamiento de clic
      link.addEventListener('click', function(e) {
        e.preventDefault();
        return false;
      });
      
      // Opción 3: También cambiar el href a javascript:void(0)
      link.setAttribute('href', 'javascript:void(0)');
      link.style.cursor = 'default';
      link.style.textDecoration = 'none';
    });
  };
  
  // Ejecutar las funciones
  fixHeaderLogo();
  fixReturnButton();
  fixCartLayout();
  
  // Ejecutar nuevamente después de que se cargue completamente la página
  window.addEventListener('load', function() {
    fixHeaderLogo();
    fixReturnButton();
    fixCartLayout();
  });
  
  // En caso de que haya componentes dinámicos, intentar cada 1 segundo durante 5 segundos
  let attempts = 0;
  const interval = setInterval(function() {
    fixHeaderLogo();
    fixReturnButton();
    fixCartLayout();
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
  display: block !important;
  width: 100% !important;
  text-align: center !important;
  margin: 1rem auto !important;
  max-width: 300px !important;
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

/* Estilos para la tabla del carrito */
.woocommerce-cart table.cart {
  border-collapse: collapse;
  width: 100%;
  margin-bottom: 1.5rem;
  border-radius: 0.5rem;
  overflow: hidden;
  border: 1px solid #e5e7eb;
}

.woocommerce-cart table.cart th {
  background-color: #f3f4f6;
  color: #030D55;
  font-weight: 600;
  text-align: left;
  padding: 1rem;
  border-bottom: 1px solid #e5e7eb;
}

.woocommerce-cart table.cart td {
  padding: 1rem;
  border-bottom: 1px solid #e5e7eb;
  vertical-align: middle;
}

.woocommerce-cart table.cart img {
  width: 80px;
  height: 80px;
  border-radius: 0.25rem;
  object-fit: cover;
}

.woocommerce-cart table.cart .product-name a {
  color: #030D55;
  font-weight: 500;
  text-decoration: none;
}

.woocommerce-cart table.cart .product-name a:hover {
  color: #D93280;
}

.woocommerce-cart table.cart .product-price,
.woocommerce-cart table.cart .product-subtotal {
  font-weight: 500;
}

/* Ocultar columna de cantidad */
.woocommerce-cart table.cart .product-quantity {
  display: none !important;
}

/* Estilos para input de cantidad */
.woocommerce-cart table.cart td.product-quantity .quantity input {
  width: 4rem;
  padding: 0.5rem;
  border: 1px solid #e5e7eb;
  border-radius: 0.25rem;
  text-align: center;
}

/* Botón de actualizar carrito */
.woocommerce-cart table.cart td.actions .button {
  background-color: #f3f4f6 !important;
  color: #030D55 !important;
  border: 1px solid #e5e7eb !important;
  padding: 1rem 1rem !important;
  border-radius: 0.5rem !important;
  font-weight: 500 !important;
  transition: all 0.3s ease !important;
}

.woocommerce-cart table.cart td.actions .button:hover {
  background-color: #e5e7eb !important;
}

/* Estilos para el botón de cupón */
.woocommerce-cart table.cart td.actions .coupon .button {
  background: linear-gradient(to right, #D93280, #5A0989) !important;
  color: white !important;
  border: none !important;
}

.woocommerce-cart table.cart td.actions .coupon .button:hover {
  background: linear-gradient(to right, #AB277A, #4A0979) !important;
}

/* Input de cupón */
.woocommerce-cart table.cart td.actions .coupon .input-text {
  width: 155px;
  padding: 0.75rem 1rem;
  border: 1px solid #e5e7eb;
  border-radius: 0.5rem;
  margin-right: 0.5rem;
}

/* Totales del carrito */
.woocommerce-cart .cart-collaterals {
  margin-top: 2rem;
}

.woocommerce-cart .cart-collaterals h2 {
  font-size: 1.25rem;
  font-weight: 600;
  color: #030D55;
  margin-bottom: 1rem;
}

.woocommerce-cart .cart_totals table {
  width: 100%;
  border-collapse: collapse;
  border: 1px solid #e5e7eb;
  border-radius: 0.5rem;
  overflow: hidden;
}

.woocommerce-cart .cart_totals table th {
  background-color: #f3f4f6;
  color: #030D55;
  font-weight: 500;
  text-align: left;
  padding: 0.75rem 1rem;
  border-bottom: 1px solid #e5e7eb;
  width: 40%;
}

.woocommerce-cart .cart_totals table td {
  padding: 0.75rem 1rem;
  border-bottom: 1px solid #e5e7eb;
  text-align: right;
}

.woocommerce-cart .cart_totals .order-total th,
.woocommerce-cart .cart_totals .order-total td {
  font-weight: 700;
  color: #D93280;
  border-top: 2px solid #D93280;
}

/* Botón proceder al pago */
.woocommerce-cart .wc-proceed-to-checkout .checkout-button {
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
  text-decoration: none !important;
}

.woocommerce-cart .wc-proceed-to-checkout .checkout-button:hover {
  background: linear-gradient(to right, #AB277A, #4A0979) !important;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1) !important;
  transform: translateY(-2px) !important;
}

/* Estilo para el botón de volver a la tienda */
.woocommerce-cart .return-to-shop .button {
  background: transparent !important;
  color: #D93280 !important;
  border: 2px solid #D93280 !important;
  padding: 0.75rem 1.5rem !important;
  border-radius: 0.5rem !important;
  font-weight: 500 !important;
  transition: all 0.3s ease !important;
  text-decoration: none !important;
}

.woocommerce-cart .return-to-shop .button:hover {
  background-color: rgba(217, 50, 128, 0.1) !important;
  transform: translateY(-2px) !important;
}

/* Carrito vacío */
.woocommerce-cart .cart-empty {
  text-align: center;
  padding: 2rem;
  font-size: 1.25rem;
  color: #6B7280;
}

/* Mensajes de notificación */
.woocommerce-cart .woocommerce-message,
.woocommerce-cart .woocommerce-info,
.woocommerce-cart .woocommerce-error {
  padding: 1rem 1.5rem;
  margin-bottom: 1.5rem;
  border-radius: 0.5rem;
  border-left: 4px solid;
}

.woocommerce-cart .woocommerce-message {
  background-color: #F0FDF4;
  border-color: #10B981;
  color: #065F46;
  padding-left: 3rem;
}

.woocommerce-cart .woocommerce-info {
  background-color: #EFF6FF;
  border-color: #3B82F6;
  color: #1E40AF;
}

.woocommerce-cart .woocommerce-error {
  background-color: #FEF2F2;
  border-color: #EF4444;
  color: #B91C1C;
}

/* Estilos específicos para los enlaces de productos */
.woocommerce-cart table.cart .product-name a,
.woocommerce-cart table.cart .product-thumbnail a {
  pointer-events: none !important;
  cursor: default !important;
  text-decoration: none !important;
}

/* Ajustes para botones en mobile */
@media (max-width: 768px) {
  .woocommerce-cart table.cart td.actions {
    padding: 1rem !important;
  }

  .woocommerce-cart table.cart td.actions .coupon {
    display: flex !important;
    flex-direction: column !important;
    gap: 0.5rem !important;
    margin-bottom: 1rem !important;
  }

  .woocommerce-cart table.cart td.actions .coupon .input-text {
    width: 100% !important;
    margin-right: 0 !important;
    margin-bottom: 0.5rem !important;
  }

  .woocommerce-cart table.cart td.actions .coupon .button,
  .woocommerce-cart table.cart td.actions .button {
    width: 100% !important;
    margin: 0 !important;
  }

  .woocommerce-cart .wc-proceed-to-checkout {
    padding: 0 !important;
  }

  .woocommerce-cart .wc-proceed-to-checkout .checkout-button {
    margin: 1rem 0 !important;
    padding: 1rem !important;
  }

  .woocommerce-cart .return-to-shop {
    text-align: center !important;
    padding: 0 1rem !important;
  }
}

/* Ajustes generales de espaciado */
.woocommerce-cart .cart-collaterals {
  margin-top: 1rem !important;
  padding: 0 1rem !important;
}

.woocommerce-cart .cart_totals table {
  margin-bottom: 1rem !important;
}

.woocommerce-notices-wrapper {
  padding: 0 1rem !important;
}
</style>
@endsection