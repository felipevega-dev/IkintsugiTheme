{{--
  Template Name: Mi Perfil
--}}

@extends('layouts.app')

@section('content')

<style>
  .page-template-my-account {
    padding-top: 0 !important;
  }
  
  /* Fix logo size in WooCommerce pages */
  .woocommerce img.h-14, 
  .woocommerce-page img.h-14,
  img.h-14 {
    max-width: 217px !important;
    width: auto !important;
    height: 72px !important;
  }
  
  /* WooCommerce order details styling */
  .woocommerce .woocommerce-customer-details address,
  .woocommerce .woocommerce-order-details {
    padding: 1rem;
    border-radius: 0.75rem;
    border: 1px solid #e5e7eb;
    margin-bottom: 1.5rem;
  }

  .woocommerce .woocommerce-order-details h2,
  .woocommerce .woocommerce-customer-details h2 {
    font-size: 1.25rem;
    font-weight: 700;
    color: #030D55;
    margin-bottom: 1rem;
  }

  .woocommerce-order-details__title,
  .woocommerce-column__title {
    font-size: 1.25rem !important;
    font-weight: 700 !important;
    color: #030D55 !important;
    margin-bottom: 1rem !important;
  }

  .woocommerce table.shop_table {
    border-radius: 0.75rem !important;
    border: 1px solid #e5e7eb !important;
  }

  .woocommerce table.shop_table th {
    font-weight: 600 !important;
    padding: 0.75rem !important;
    background-color: #f9fafb !important;
  }

  .woocommerce table.shop_table td {
    padding: 0.75rem !important;
    border-top: 1px solid #e5e7eb !important;
  }

  .woocommerce-order-details .order-again {
    display: none !important;
  }
</style>
<div class="py-8 md:py-16 lg:py-28 bg-gray-50">
  <div class="container mx-auto px-4 mt-16 md:mt-20 lg:mt-28">
    <!-- Verificar que el usuario esté logueado -->
    @if(is_user_logged_in())
      @php
        $current_user = wp_get_current_user();
        
        // Check if we're on view-order endpoint
        $is_view_order = function_exists('is_view_order_endpoint') && is_view_order_endpoint();
        $order_id = function_exists('get_order_id_from_endpoint') ? get_order_id_from_endpoint() : 0;
        
        // Alternative method if custom functions aren't working
        if (!$is_view_order && strpos($_SERVER['REQUEST_URI'], '/view-order/') !== false) {
          $is_view_order = true;
          $uri_parts = explode('/view-order/', $_SERVER['REQUEST_URI']);
          if (isset($uri_parts[1])) {
            $order_id_parts = explode('/', $uri_parts[1]);
            $order_id = absint($order_id_parts[0]);
          }
        }
      @endphp
      
      <!-- Modales de notificación y confirmación -->
      <div id="notification-modal" class="fixed hidden z-50 inset-0 flex items-center justify-center">
        <div class="bg-white rounded-xl shadow-xl max-w-md w-full mx-4 overflow-hidden">
          <div id="notification-header" class="bg-gradient-to-r from-[#D93280] to-[#5A0989] py-4 px-6">
            <h3 id="notification-title" class="text-xl font-bold text-white font-paytone">Notificación</h3>
          </div>
          <div class="p-6">
            <p id="notification-message" class="text-gray-700 mb-6">Mensaje de notificación</p>
            
            <div class="flex justify-end">
              <button type="button" id="notification-button" class="px-4 py-2 bg-gradient-to-r from-[#D93280] to-[#5A0989] hover:from-[#AB277A] hover:to-[#4A0979] text-white rounded-lg transition-colors">
                Aceptar
              </button>
            </div>
          </div>
        </div>
      </div>
      
      @if($is_view_order && $order_id > 0)
        <!-- Order details view -->
        <div class="mb-4 md:mb-6 lg:mb-8">
          <div class="flex items-center justify-between">
            <h1 class="text-2xl md:text-3xl font-bold text-[#030D55] mb-1 md:mb-2 font-paytone">Detalles del Pedido #{{ $order_id }}</h1>
            <a href="{{ home_url('/mis-reservas') }}" class="inline-flex items-center text-[#AB277A] hover:text-[#D93280] transition-colors">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
              </svg>
              Volver a mis reservas
            </a>
          </div>
        </div>
        
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden mb-8">
          <div class="p-4 md:p-6">
            <?php 
              // Display order details using WooCommerce's template
              if (function_exists('wc_get_order')) {
                $order = wc_get_order($order_id);
                
                // Check if order exists and belongs to current user
                if ($order && $order->get_customer_id() == get_current_user_id()) {
                  // Display order details either by WooCommerce template or custom implementation
                  if (function_exists('wc_get_template')) {
                    // Try to use WooCommerce template
                    wc_get_template('myaccount/view-order.php', array(
                      'order' => $order,
                      'order_id' => $order_id
                    ));
                  } else {
                    // Custom fallback order details display
                    echo '<div class="divide-y divide-gray-200">';
                    
                    // Order header
                    echo '<div class="pb-4">';
                    echo '<h3 class="text-lg font-bold text-gray-900 mb-2">Pedido #' . $order_id . '</h3>';
                    echo '<p class="text-sm text-gray-500">Realizado el ' . $order->get_date_created()->date_i18n(get_option('date_format') . ' ' . get_option('time_format')) . '</p>';
                    echo '<p class="text-sm text-gray-500 mt-1">Estado: <span class="font-medium">' . wc_get_order_status_name($order->get_status()) . '</span></p>';
                    echo '</div>';
                    
                    // Order items
                    echo '<div class="py-4">';
                    echo '<h4 class="text-md font-semibold text-gray-900 mb-3">Productos</h4>';
                    echo '<ul class="divide-y divide-gray-100">';
                    
                    foreach ($order->get_items() as $item_id => $item) {
                      $product = $item->get_product();
                      $image = $product ? $product->get_image(array(60, 60)) : '';
                      
                      echo '<li class="py-3 flex items-start">';
                      echo '<div class="flex-shrink-0 mr-3">' . $image . '</div>';
                      echo '<div class="flex-1">';
                      echo '<p class="font-medium text-gray-900">' . $item->get_name() . ' × ' . $item->get_quantity() . '</p>';
                      echo '<p class="text-sm text-gray-500 mt-1">' . $order->get_formatted_line_subtotal($item) . '</p>';
                      echo '</div>';
                      echo '</li>';
                    }
                    
                    echo '</ul>';
                    echo '</div>';
                    
                    // Order totals
                    echo '<div class="py-4">';
                    echo '<h4 class="text-md font-semibold text-gray-900 mb-3">Resumen del pedido</h4>';
                    echo '<div class="space-y-2">';
                    
                    // Subtotal
                    echo '<div class="flex justify-between">';
                    echo '<span class="text-gray-500">Subtotal:</span>';
                    echo '<span class="text-gray-900">' . $order->get_subtotal_to_display() . '</span>';
                    echo '</div>';
                    
                    // Shipping
                    if ($order->get_shipping_total() > 0) {
                      echo '<div class="flex justify-between">';
                      echo '<span class="text-gray-500">Envío:</span>';
                      echo '<span class="text-gray-900">' . $order->get_shipping_to_display() . '</span>';
                      echo '</div>';
                    }
                    
                    // Tax
                    if ($order->get_total_tax() > 0) {
                      echo '<div class="flex justify-between">';
                      echo '<span class="text-gray-500">Impuestos:</span>';
                      echo '<span class="text-gray-900">' . wc_price($order->get_total_tax()) . '</span>';
                      echo '</div>';
                    }
                    
                    // Total
                    echo '<div class="flex justify-between pt-2 border-t border-gray-100">';
                    echo '<span class="text-gray-900 font-bold">Total:</span>';
                    echo '<span class="text-gray-900 font-bold">' . $order->get_formatted_order_total() . '</span>';
                    echo '</div>';
                    
                    echo '</div>';
                    echo '</div>';
                    
                    echo '</div>';
                  }
                } else {
                  echo '<div class="text-center py-8">';
                  echo '<p class="text-red-600 mb-4">Lo sentimos, no tienes acceso a este pedido o no existe.</p>';
                  echo '<a href="' . home_url('/mis-reservas') . '" class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-[#D93280] to-[#5A0989] text-white rounded-lg">';
                  echo 'Volver a mis reservas</a>';
                  echo '</div>';
                }
              }
            ?>
          </div>
        </div>
      @else
        <div class="mb-4 md:mb-6 lg:mb-8">
          <h1 class="text-2xl md:text-3xl font-bold text-[#030D55] mb-1 md:mb-2 font-paytone">Mi Perfil</h1>
          <p class="text-gray-600 text-sm md:text-base">Administra tu información personal y visualiza tus reservas.</p>
        </div>
        
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 md:gap-6 lg:gap-8">
          <!-- Menú de navegación lateral -->
          <div class="col-span-1">
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden sticky top-16 md:top-20 lg:top-28">
              <div class="p-3 md:p-4 lg:p-6 bg-gradient-to-r from-[#D93280] to-[#5A0989]">
                <div class="flex items-center">
                  <div class="mr-3 md:mr-4 rounded-full border-2 border-white shadow-sm overflow-hidden h-12 w-12 md:h-16 md:w-16">
                    <?php echo get_avatar($current_user->ID, 64); ?>
                  </div>
                  <div>
                    <h2 class="text-base md:text-xl font-bold text-white font-paytone">{{ $current_user->display_name }}</h2>
                    <p class="text-white/80 text-xs md:text-sm">{{ $current_user->user_email }}</p>
                  </div>
                </div>
              </div>
              
              <div class="p-2 md:p-3 lg:p-4">
                <nav>
                  <a href="#informacion-personal" class="flex items-center py-2 md:py-3 px-3 md:px-4 rounded-lg md:rounded-xl mb-1 md:mb-2 text-[#030D55] text-sm md:text-base font-medium transition-colors duration-200 bg-gray-50 hover:bg-[#FBD5E8] hover:text-[#D93280]">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 md:h-5 md:w-5 mr-2 md:mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    Información Personal
                  </a>
                  
                  <a href="#mis-reservas" class="flex items-center py-2 md:py-3 px-3 md:px-4 rounded-lg md:rounded-xl mb-1 md:mb-2 text-[#030D55] text-sm md:text-base font-medium transition-colors duration-200 hover:bg-[#FBD5E8] hover:text-[#D93280]">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 md:h-5 md:w-5 mr-2 md:mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    Mis Reservas
                  </a>
                  
                  <a href="#cambiar-contrasena" class="flex items-center py-2 md:py-3 px-3 md:px-4 rounded-lg md:rounded-xl mb-1 md:mb-2 text-[#030D55] text-sm md:text-base font-medium transition-colors duration-200 hover:bg-[#FBD5E8] hover:text-[#D93280]">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 md:h-5 md:w-5 mr-2 md:mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                    Cambiar Contraseña
                  </a>
                  
                  <div class="border-t border-gray-100 my-2 md:my-4"></div>
                  
                  <a href="{{ wp_logout_url(home_url()) }}" class="flex items-center py-2 md:py-3 px-3 md:px-4 rounded-lg md:rounded-xl text-red-600 text-sm md:text-base font-medium transition-colors duration-200 hover:bg-red-50">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 md:h-5 md:w-5 mr-2 md:mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    Cerrar Sesión
                  </a>
                </nav>
              </div>
            </div>
          </div>
          
          <!-- Contenido principal -->
          <div class="col-span-1 lg:col-span-2">
            <!-- Sección de información personal -->
            <div id="informacion-personal" class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden mb-4 md:mb-6 lg:mb-8">
              <div class="p-4 md:p-6 border-b border-gray-100">
                <h2 class="text-lg md:text-xl font-bold text-[#030D55]">Información Personal</h2>
                <p class="text-gray-600 text-xs md:text-sm mt-1">Actualiza tu información de perfil</p>
              </div>
              
              <div class="p-4 md:p-6">
                <form id="profile-form" class="space-y-6" enctype="multipart/form-data">
                  <?php wp_nonce_field('update_user_profile', 'profile_nonce'); ?>
                  
                  <!-- Avatar upload section -->
                  <div class="flex flex-col items-center mb-4">
                    <div class="relative mb-4 group">
                      <div class="h-24 w-24 rounded-full border-4 border-[#AB277A] shadow-sm overflow-hidden cursor-pointer">
                        <?php echo get_avatar($current_user->ID, 96, '', '', ['class' => 'w-full h-full object-cover']); ?>
                        <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-40 flex items-center justify-center transition-all duration-300 opacity-0 group-hover:opacity-100">
                          <span class="text-white text-xs font-medium">Cambiar foto</span>
                        </div>
                      </div>
                      <input type="file" id="profile_image" name="profile_image" class="hidden" accept="image/*">
                    </div>
                    <button type="button" id="profile-image-button" class="px-3 py-1 bg-[#FBD5E8] text-[#D93280] rounded-lg text-sm font-medium hover:bg-[#D93280] hover:text-white transition-all">
                      Cambiar foto de perfil
                    </button>
                  </div>
                  
                  <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                      <label for="first_name" class="block text-sm font-medium text-gray-700 mb-1">Nombre</label>
                      <input type="text" id="first_name" name="first_name" value="{{ $current_user->first_name }}" class="w-full px-4 py-3 rounded-xl border-gray-300 shadow-sm focus:border-[#AB277A] focus:ring focus:ring-[#AB277A] focus:ring-opacity-30 transition-all">
                    </div>
                    
                    <div>
                      <label for="last_name" class="block text-sm font-medium text-gray-700 mb-1">Apellidos</label>
                      <input type="text" id="last_name" name="last_name" value="{{ $current_user->last_name }}" class="w-full px-4 py-3 rounded-xl border-gray-300 shadow-sm focus:border-[#AB277A] focus:ring focus:ring-[#AB277A] focus:ring-opacity-30 transition-all">
                    </div>
                  </div>
                  
                  <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Correo electrónico</label>
                    <input type="email" id="email" name="email" value="{{ $current_user->user_email }}" class="w-full px-4 py-3 rounded-xl border-gray-300 shadow-sm focus:border-[#AB277A] focus:ring focus:ring-[#AB277A] focus:ring-opacity-30 transition-all">
                  </div>
                  
                  <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Teléfono</label>
                    <input type="tel" id="phone" name="phone" value="{{ get_user_meta($current_user->ID, 'phone', true) }}" class="w-full px-4 py-3 rounded-xl border-gray-300 shadow-sm focus:border-[#AB277A] focus:ring focus:ring-[#AB277A] focus:ring-opacity-30 transition-all">
                  </div>
                  
                  <div>
                    <label for="bio" class="block text-sm font-medium text-gray-700 mb-1">Biografía</label>
                    <textarea id="bio" name="bio" rows="4" class="w-full px-4 py-3 rounded-xl border-gray-300 shadow-sm focus:border-[#AB277A] focus:ring focus:ring-[#AB277A] focus:ring-opacity-30 transition-all">{{ get_user_meta($current_user->ID, 'description', true) }}</textarea>
                    <p class="text-sm text-gray-500 mt-1">Cuéntanos un poco sobre ti. Esta información no se mostrará públicamente.</p>
                  </div>
                  
                  <div class="pt-4">
                    <button type="submit" id="profile-save-button" class="px-6 py-3 bg-gradient-to-r from-[#D93280] to-[#5A0989] hover:from-[#AB277A] hover:to-[#4A0979] text-white rounded-xl font-medium shadow-sm hover:shadow transition-all duration-300 transform hover:scale-[1.02] relative">
                      <span class="flex items-center">
                        <span class="profile-submit-text">Guardar Cambios</span>
                        <svg class="profile-spinner ml-2 h-5 w-5 text-white animate-spin hidden" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                          <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                          <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                      </span>
                    </button>
                  </div>
                </form>
              </div>
            </div>
            
            <!-- Sección de mis reservas -->
            <div id="mis-reservas" class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden mb-4 md:mb-6 lg:mb-8">
              <div class="p-4 md:p-6 border-b border-gray-100">
                <h2 class="text-lg md:text-xl font-bold text-[#030D55]">Mis Reservas</h2>
                <p class="text-gray-600 text-xs md:text-sm mt-1">Historial de tus citas y reservas</p>
              </div>
              
              <div class="p-4 md:p-6">
                @php
                  // Obtener las reservas recientes de WooCommerce
                  $customer_orders = array();
                  if (function_exists('wc_get_orders')) {
                    $customer_orders = wc_get_orders(array(
                      'customer' => get_current_user_id(),
                      'limit' => 2, // Mostrar solo las 2 más recientes
                      'orderby' => 'date',
                      'order' => 'DESC',
                      'status' => array('wc-completed', 'wc-processing', 'wc-on-hold')
                    ));
                  }
                @endphp
                
                @if(!empty($customer_orders))
                  <div class="w-full overflow-x-auto">
                    <table class="w-full divide-y divide-gray-200">
                      <thead>
                        <tr class="bg-gray-50">
                          <th class="py-3 px-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider w-1/6">Nº RESERVA</th>
                          <th class="py-3 px-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider w-1/6">FECHA</th>
                          <th class="py-3 px-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider w-2/6">PRODUCTOS</th>
                          <th class="py-3 px-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider w-1/6">TOTAL</th>
                          <th class="py-3 px-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider w-1/12">ESTADO</th>
                          <th class="py-3 px-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider w-1/12">ACCIONES</th>
                        </tr>
                      </thead>
                      <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($customer_orders as $order)
                          @php
                            $order_id = $order->get_id();
                            $status = $order->get_status();
                            $status_name = wc_get_order_status_name($status);
                            $order_date = $order->get_date_created()->date_i18n(get_option('date_format') . ' ' . get_option('time_format'));
                            $order_total = $order->get_total();
                            $order_items = $order->get_items();
                          @endphp
                          <tr class="hover:bg-gray-50">
                            <td class="py-3 px-4 text-sm font-medium text-gray-900">#{{ $order_id }}</td>
                            <td class="py-3 px-4 text-sm text-gray-500">{{ $order_date }}</td>
                            <td class="py-3 px-4 text-sm text-gray-500">
                              <ul class="list-disc list-inside">
                                @foreach($order_items as $item)
                                  <li>{{ $item->get_name() }} x {{ $item->get_quantity() }}</li>
                                @endforeach
                              </ul>
                            </td>
                            <td class="py-3 px-4 text-sm text-gray-500">{{ number_format($order_total, 0, ',', '.') }}</td>
                            <td class="py-3 px-4 text-sm">
                              <span class="px-2 py-1 text-xs font-medium rounded-full 
                                @if($status == 'completed') bg-green-100 text-green-800
                                @elseif($status == 'processing') bg-blue-100 text-blue-800
                                @elseif($status == 'on-hold') bg-yellow-100 text-yellow-800
                                @else bg-gray-100 text-gray-800 @endif">
                                {{ $status_name }}
                              </span>
                            </td>
                            <td class="py-3 px-4 text-sm">
                              <a href="{{ wc_get_endpoint_url('view-order', $order_id, wc_get_page_permalink('myaccount')) }}" class="text-[#AB277A] hover:text-[#D93280] font-medium">
                                Ver detalles
                              </a>
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                @else
                  <!-- No hay reservas -->
                  <div class="bg-gray-50 rounded-xl p-4 text-center">
                    <p class="text-gray-600">No tienes reservas recientes</p>
                  </div>
                @endif
                
                <!-- Botón para ver todas las reservas -->
                <div class="flex justify-center mt-6">
                  <a href="{{ home_url('/mis-reservas') }}" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-[#D93280] to-[#5A0989] hover:from-[#AB277A] hover:to-[#4A0979] text-white rounded-xl font-medium shadow-sm hover:shadow transition-all duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                    Ver todas mis reservas
                  </a>
                </div>
              </div>
            </div>
            
            <!-- Sección de cambiar contraseña -->
            <div id="cambiar-contrasena" class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
              <div class="p-4 md:p-6 border-b border-gray-100">
                <h2 class="text-lg md:text-xl font-bold text-[#030D55]">Cambiar Contraseña</h2>
                <p class="text-gray-600 text-xs md:text-sm mt-1">Actualiza tu contraseña de acceso</p>
              </div>
              
              <div class="p-4 md:p-6">
                <form id="password-form" class="space-y-6">
                  <?php wp_nonce_field('update_user_password', 'password_nonce'); ?>
                  
                  <div class="relative">
                    <label for="current_password" class="block text-sm font-medium text-gray-700 mb-1">Contraseña actual</label>
                    <div class="relative flex items-center">
                      <input type="password" id="current_password" name="current_password" class="w-full px-4 py-3 rounded-xl border-gray-300 shadow-sm focus:border-[#AB277A] focus:ring focus:ring-[#AB277A] focus:ring-opacity-30 transition-all">
                      <button type="button" class="password-toggle absolute right-4 text-gray-500 hover:text-gray-700" data-target="current_password">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 eye-show" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 eye-hide hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                        </svg>
                      </button>
                    </div>
                  </div>
                  
                  <div class="relative">
                    <label for="new_password" class="block text-sm font-medium text-gray-700 mb-1">Nueva contraseña</label>
                    <div class="relative flex items-center">
                      <input type="password" id="new_password" name="new_password" class="w-full px-4 py-3 rounded-xl border-gray-300 shadow-sm focus:border-[#AB277A] focus:ring focus:ring-[#AB277A] focus:ring-opacity-30 transition-all">
                      <button type="button" class="password-toggle absolute right-4 text-gray-500 hover:text-gray-700" data-target="new_password">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 eye-show" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 eye-hide hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                        </svg>
                      </button>
                    </div>
                    <p class="text-sm text-gray-500 mt-1">Usa al menos 8 caracteres con letras y números.</p>
                  </div>
                  
                  <div class="relative">
                    <label for="confirm_password" class="block text-sm font-medium text-gray-700 mb-1">Confirmar nueva contraseña</label>
                    <div class="relative flex items-center">
                      <input type="password" id="confirm_password" name="confirm_password" class="w-full px-4 py-3 rounded-xl border-gray-300 shadow-sm focus:border-[#AB277A] focus:ring focus:ring-[#AB277A] focus:ring-opacity-30 transition-all">
                      <button type="button" class="password-toggle absolute right-4 text-gray-500 hover:text-gray-700" data-target="confirm_password">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 eye-show" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 eye-hide hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                        </svg>
                      </button>
                    </div>
                  </div>
                  
                  <div class="pt-4">
                    <button type="submit" id="password-save-button" class="px-6 py-3 bg-gradient-to-r from-[#D93280] to-[#5A0989] hover:from-[#AB277A] hover:to-[#4A0979] text-white rounded-xl font-medium shadow-sm hover:shadow transition-all duration-300 transform hover:scale-[1.02] relative">
                      <span class="flex items-center">
                        <span class="password-submit-text">Cambiar Contraseña</span>
                        <svg class="password-spinner ml-2 h-5 w-5 text-white animate-spin hidden" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                          <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                          <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                      </span>
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      @endif
    @else
      <!-- Redireccionar a página de login si no está logueado -->
      <div class="bg-white rounded-2xl shadow-lg p-8 max-w-md mx-auto text-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-[#D93280] mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
        </svg>
        <h2 class="text-2xl font-bold text-[#030D55] mb-2">Acceso restringido</h2>
        <p class="text-gray-600 mb-6">Debes iniciar sesión para acceder a tu perfil</p>
        <a href="{{ home_url('/login?redirect=' . urlencode(home_url('/mi-perfil'))) }}" class="px-6 py-3 bg-gradient-to-r from-[#D93280] to-[#5A0989] hover:from-[#AB277A] hover:to-[#4A0979] text-white rounded-xl font-medium shadow-sm hover:shadow transition-all duration-300 inline-block">
          Iniciar Sesión
        </a>
      </div>
    @endif
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
  // Modal de notificación
  let notificationModal = document.getElementById('notification-modal');
  let notificationTitle = document.getElementById('notification-title');
  let notificationMessage = document.getElementById('notification-message');
  let notificationButton = document.getElementById('notification-button');
  let notificationHeader = document.getElementById('notification-header');
  
  // Función para mostrar notificaciones
  function showNotification(title, message, type = 'success') {
    notificationTitle.textContent = title;
    notificationMessage.textContent = message;
    
    // Establecer color según el tipo
    if (type === 'error') {
      notificationHeader.classList.remove('from-[#D93280]', 'to-[#5A0989]');
      notificationHeader.classList.add('from-red-500', 'to-red-700');
    } else {
      notificationHeader.classList.remove('from-red-500', 'to-red-700');
      notificationHeader.classList.add('from-[#D93280]', 'to-[#5A0989]');
    }
    
    // Mostrar modal
    notificationModal.classList.remove('hidden');
    
    // Animación de entrada
    notificationModal.classList.add('animate-fadeIn');
  }
  
  // Cerrar modal al hacer clic en el botón
  if (notificationButton) {
    notificationButton.addEventListener('click', function() {
      notificationModal.classList.add('hidden');
    });
  }
  
  // Toggle de visibilidad de contraseña
  document.querySelectorAll('.password-toggle').forEach(button => {
    button.addEventListener('click', function() {
      const targetId = this.getAttribute('data-target');
      const inputField = document.getElementById(targetId);
      const eyeShow = this.querySelector('.eye-show');
      const eyeHide = this.querySelector('.eye-hide');
      
      if (inputField.type === 'password') {
        inputField.type = 'text';
        eyeShow.classList.add('hidden');
        eyeHide.classList.remove('hidden');
      } else {
        inputField.type = 'password';
        eyeShow.classList.remove('hidden');
        eyeHide.classList.add('hidden');
      }
    });
  });
  
  // Manejo de carga de imagen de perfil
  let profileImageButton = document.getElementById('profile-image-button');
  let profileImageInput = document.getElementById('profile_image');
  
  if (profileImageButton && profileImageInput) {
    profileImageButton.addEventListener('click', function() {
      profileImageInput.click();
    });
    
    // También permitir hacer clic en la imagen actual
    document.querySelector('.h-24.w-24.rounded-full').addEventListener('click', function() {
      profileImageInput.click();
    });
    
    // Previsualizar la imagen seleccionada
    profileImageInput.addEventListener('change', function() {
      if (this.files && this.files[0]) {
        const reader = new FileReader();
        
        reader.onload = function(e) {
          const avatarContainer = document.querySelector('.h-24.w-24.rounded-full');
          const currentAvatar = avatarContainer.querySelector('img');
          
          // Reemplazar la imagen actual con la nueva
          if (currentAvatar) {
            currentAvatar.src = e.target.result;
          }
        };
        
        reader.readAsDataURL(this.files[0]);
      }
    });
  }
  
  // Formulario de actualización de perfil
  let profileForm = document.getElementById('profile-form');
  let profileSaveButton = document.getElementById('profile-save-button');
  let profileSpinner = document.querySelector('.profile-spinner');
  let profileSubmitText = document.querySelector('.profile-submit-text');
  
  if (profileForm) {
    profileForm.addEventListener('submit', function(e) {
      e.preventDefault();
      
      // Mostrar spinner y cambiar texto
      profileSpinner.classList.remove('hidden');
      profileSubmitText.textContent = 'Guardando...';
      profileSaveButton.disabled = true;
      
      const formData = new FormData(this);
      formData.append('action', 'update_user_profile');
      
      // Depuración para verificar que el archivo se esté incluyendo correctamente
      const fileInput = document.getElementById('profile_image');
      if (fileInput && fileInput.files.length > 0) {
        console.log('Archivo seleccionado:', fileInput.files[0].name);
        // El FormData ya incluye el archivo automáticamente ya que es parte del formulario
      }
      
      fetch('<?php echo admin_url('admin-ajax.php'); ?>', {
        method: 'POST',
        body: formData,
        credentials: 'same-origin'
      })
      .then(response => response.json())
      .then(data => {
        // Ocultar spinner y restaurar texto
        profileSpinner.classList.add('hidden');
        profileSubmitText.textContent = 'Guardar Cambios';
        profileSaveButton.disabled = false;
        
        if (data.success) {
          // Mostrar mensaje de éxito
          showNotification('¡Éxito!', 'Perfil actualizado correctamente', 'success');
          
          // Recargar la página después de un breve retraso para mostrar los cambios
          setTimeout(function() {
            window.location.reload();
          }, 1500);
        } else {
          // Mostrar mensaje de error
          showNotification('Error', data.data.message || 'Error al actualizar el perfil', 'error');
        }
      })
      .catch(error => {
        // Ocultar spinner y restaurar texto
        profileSpinner.classList.add('hidden');
        profileSubmitText.textContent = 'Guardar Cambios';
        profileSaveButton.disabled = false;
        
        console.error('Error:', error);
        showNotification('Error', 'Error al procesar la solicitud', 'error');
      });
    });
  }
  
  // Formulario de cambio de contraseña
  let passwordForm = document.getElementById('password-form');
  let passwordSaveButton = document.getElementById('password-save-button');
  let passwordSpinner = document.querySelector('.password-spinner');
  let passwordSubmitText = document.querySelector('.password-submit-text');
  
  if (passwordForm) {
    passwordForm.addEventListener('submit', function(e) {
      e.preventDefault();
      
      const newPassword = this.querySelector('#new_password').value;
      const confirmPassword = this.querySelector('#confirm_password').value;
      
      // Verificar que las contraseñas coinciden
      if (newPassword !== confirmPassword) {
        showNotification('Error', 'Las contraseñas no coinciden', 'error');
        return;
      }
      
      // Mostrar spinner y cambiar texto
      passwordSpinner.classList.remove('hidden');
      passwordSubmitText.textContent = 'Guardando...';
      passwordSaveButton.disabled = true;
      
      const formData = new FormData(this);
      formData.append('action', 'update_user_password');
      
      fetch('<?php echo admin_url('admin-ajax.php'); ?>', {
        method: 'POST',
        body: formData,
        credentials: 'same-origin'
      })
      .then(response => response.json())
      .then(data => {
        // Ocultar spinner y restaurar texto
        passwordSpinner.classList.add('hidden');
        passwordSubmitText.textContent = 'Cambiar Contraseña';
        passwordSaveButton.disabled = false;
        
        if (data.success) {
          // Mostrar mensaje de éxito
          showNotification('¡Éxito!', 'Contraseña actualizada correctamente', 'success');
          
          // Limpiar campos
          this.reset();
          
          // Restablecer los iconos de ojo
          document.querySelectorAll('.password-toggle').forEach(toggle => {
            const eyeShow = toggle.querySelector('.eye-show');
            const eyeHide = toggle.querySelector('.eye-hide');
            eyeShow.classList.remove('hidden');
            eyeHide.classList.add('hidden');
          });
          
          // Restablecer tipos de input
          document.querySelectorAll('input[type="text"][id$="password"]').forEach(input => {
            input.type = 'password';
          });
        } else {
          // Mostrar mensaje de error
          showNotification('Error', data.data.message || 'Error al actualizar la contraseña', 'error');
        }
      })
      .catch(error => {
        // Ocultar spinner y restaurar texto
        passwordSpinner.classList.add('hidden');
        passwordSubmitText.textContent = 'Cambiar Contraseña';
        passwordSaveButton.disabled = false;
        
        console.error('Error:', error);
        showNotification('Error', 'Error al procesar la solicitud', 'error');
      });
    });
  }
  
  // Scroll suave para navegación interna
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
      e.preventDefault();
      
      const targetId = this.getAttribute('href');
      const targetElement = document.querySelector(targetId);
      
      if (targetElement) {
        // Obtener posición del elemento
        const yOffset = -100; // Ajustar según el tamaño del header
        const y = targetElement.getBoundingClientRect().top + window.pageYOffset + yOffset;
        
        window.scrollTo({top: y, behavior: 'smooth'});
        
        // Actualizar clases activas en el menú
        document.querySelectorAll('nav a').forEach(link => {
          if (link.getAttribute('href') === targetId) {
            link.classList.add('bg-gray-50');
          } else {
            link.classList.remove('bg-gray-50');
          }
        });
      }
    });
  });
});
</script>

<style>
  /* Animaciones para el modal */
  @keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
  }
  
  .animate-fadeIn {
    animation: fadeIn 0.3s ease-in-out;
  }
  
  /* Estilo para los botones en loading */
  button:disabled {
    opacity: 0.7;
    cursor: not-allowed;
  }
  
  /* Eliminar transiciones para el texto del botón */
  .profile-submit-text, .password-submit-text {
    transition: none;
  }
  
  /* Mejoras para responsividad en móviles */
  @media (max-width: 768px) {
    table {
      display: block;
      width: 100%;
      overflow-x: auto;
    }
    
    table th, 
    table td {
      white-space: nowrap;
      padding: 0.5rem 0.75rem;
    }
    
    table.w-full {
      table-layout: auto !important;
      width: 100% !important;
    }
    
    .overflow-x-auto {
      -webkit-overflow-scrolling: touch;
    }
  }
</style>
@endsection 