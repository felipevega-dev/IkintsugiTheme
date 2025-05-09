{{--
  Template Name: Mis Reservas
--}}

@extends('layouts.app')

@section('content')
<div class="py-20 md:py-24 lg:py-28 bg-gray-50">
  <div class="container mx-auto px-4 mt-20 md:mt-24 lg:mt-28">
    <!-- Verificar que el usuario esté logueado -->
    @if(is_user_logged_in())
      @php
        $current_user = wp_get_current_user();
      @endphp
      
      <div class="mb-6 md:mb-8">
        <h1 class="text-2xl md:text-3xl font-bold text-[#030D55] mb-2 font-paytone">Mis Reservas</h1>
        <p class="text-gray-600">Gestiona tus citas y reservas de servicios.</p>
      </div>
      
      <!-- Reservas de Terapias -->
      <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-4 md:p-6 border-b border-gray-100 flex flex-col md:flex-row md:justify-between md:items-center gap-4">
          <div>
            <h2 class="text-xl font-bold text-[#030D55]">Reservas de Terapias</h2>
            <p class="text-gray-600 text-sm mt-1">Visualiza tus próximas citas y el historial</p>
          </div>
          
          <a href="{{ home_url('/reservar-cita') }}" class="inline-flex items-center justify-center px-5 py-2 bg-[#FBD5E8] text-[#D93280] rounded-xl font-medium hover:bg-[#D93280] hover:text-white transition-all duration-300 text-sm">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            Reservar nueva cita
          </a>
        </div>
        
        <div class="w-full">
          <!-- Reservas de terapias y productos -->
          @php
            // Obtener el usuario actual y su email
            $current_user = wp_get_current_user();
            $user_email = $current_user->user_email;
            
            // Intentar vincular pedidos no vinculados
            if (function_exists('wc_get_orders')) {
              $args = array(
                'billing_email' => $user_email,
                'customer_id'   => 0, // Pedidos sin usuario vinculado
                'limit'         => -1,
                'return'        => 'ids',
              );
              
              $order_ids = wc_get_orders($args);
              
              foreach ($order_ids as $order_id) {
                $order = wc_get_order($order_id);
                if ($order) {
                  // Vincular el pedido al usuario
                  $order->set_customer_id(get_current_user_id());
                  $order->save();
                }
              }
            }
            
            // Obtener los pedidos del usuario (ahora ya deberían estar todos vinculados)
            $customer_orders = array();
            if (function_exists('wc_get_orders')) {
              $customer_orders = wc_get_orders(array(
                'customer' => get_current_user_id(),
                'limit' => -1,
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
            <!-- Integración con Bookly -->
            @if(function_exists('bookly_print_customer_cabinet'))
              <?php 
                echo do_shortcode('[bookly-appointments-list show_column_date="1" show_column_time="1" show_column_service="1" show_column_staff="1" show_column_price="1" show_column_status="1" show_column_cancel="1"]'); 
              ?>
            @else
              <div class="py-8 text-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-300 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <h3 class="text-lg font-medium text-gray-700 mb-2">No se encontraron citas de terapia</h3>
                <p class="text-gray-500 max-w-md mx-auto mb-6">No tienes citas de terapia programadas o el sistema de reservas no está disponible en este momento.</p>
                <a href="{{ home_url('/reservar-cita') }}" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-[#D93280] to-[#5A0989] hover:from-[#AB277A] hover:to-[#4A0979] text-white rounded-xl font-medium shadow-sm hover:shadow transition-all duration-300">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                  Reservar una cita
                </a>
              </div>
            @endif
          @endif
        </div>
      </div>
      
      <!-- Enlace a perfil completo -->
      <div class="mt-8 text-center">
        <a href="{{ home_url('/mi-perfil') }}" class="inline-flex items-center text-[#AB277A] hover:text-[#D93280] transition-colors">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
          </svg>
          Volver a mi perfil completo
        </a>
      </div>
    @else
      <!-- Redireccionar a página de login si no está logueado -->
      <div class="bg-white rounded-2xl shadow-lg p-8 max-w-md mx-auto text-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-[#D93280] mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
        </svg>
        <h2 class="text-2xl font-bold text-[#030D55] mb-2">Acceso restringido</h2>
        <p class="text-gray-600 mb-6">Debes iniciar sesión para acceder a tus reservas</p>
        <a href="{{ home_url('/login?redirect=' . urlencode(home_url('/mis-reservas'))) }}" class="px-6 py-3 bg-gradient-to-r from-[#D93280] to-[#5A0989] hover:from-[#AB277A] hover:to-[#4A0979] text-white rounded-xl font-medium shadow-sm hover:shadow transition-all duration-300 inline-block">
          Iniciar Sesión
        </a>
      </div>
    @endif
  </div>
</div>

<style>
  /* Estilos para mejorar la apariencia de la tabla de Bookly */
  .bookly-appointments-table {
    width: 100%;
    border-collapse: separate;
    border-spacing: 0;
    margin-bottom: 1rem;
    border-radius: 0.75rem;
    overflow: hidden;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
  }
  
  .bookly-appointments-table th {
    background-color: #f9fafb;
    font-weight: 600;
    text-align: left;
    padding: 0.75rem 1rem;
    color: #030D55;
    font-size: 0.875rem;
    border-bottom: 1px solid #e5e7eb;
  }
  
  .bookly-appointments-table td {
    padding: 0.75rem 1rem;
    border-bottom: 1px solid #e5e7eb;
    color: #4b5563;
    font-size: 0.875rem;
  }
  
  .bookly-appointments-table tr:last-child td {
    border-bottom: none;
  }
  
  .bookly-appointments-table tr:hover td {
    background-color: #f9fafb;
  }
  
  /* Estilos para los estados de las citas */
  .bookly-appointments-table .status-approved {
    color: #059669;
    background-color: #d1fae5;
    border-radius: 9999px;
    padding: 0.25rem 0.5rem;
    font-size: 0.75rem;
    font-weight: 500;
    display: inline-block;
  }
  
  .bookly-appointments-table .status-pending {
    color: #d97706;
    background-color: #fef3c7;
    border-radius: 9999px;
    padding: 0.25rem 0.5rem;
    font-size: 0.75rem;
    font-weight: 500;
    display: inline-block;
  }
  
  .bookly-appointments-table .status-cancelled {
    color: #dc2626;
    background-color: #fee2e2;
    border-radius: 9999px;
    padding: 0.25rem 0.5rem;
    font-size: 0.75rem;
    font-weight: 500;
    display: inline-block;
  }
  
  /* Botón de cancelar cita */
  .bookly-appointments-table .cancel-button {
    background-color: #fee2e2;
    color: #dc2626;
    border: none;
    border-radius: 0.375rem;
    padding: 0.375rem 0.75rem;
    font-size: 0.75rem;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.2s;
  }
  
  .bookly-appointments-table .cancel-button:hover {
    background-color: #fecaca;
  }
  
  /* Mejoras para responsividad en móviles */
  @media (max-width: 768px) {
    table, .bookly-appointments-table {
      display: block;
      width: 100%;
      overflow-x: auto;
      -webkit-overflow-scrolling: touch;
    }
    
    table th, 
    table td,
    .bookly-appointments-table th, 
    .bookly-appointments-table td {
      white-space: nowrap;
      padding: 0.5rem 0.75rem;
    }
    
    table.w-full, 
    table.min-w-full {
      table-layout: auto !important;
      width: 100% !important;
    }
    
    /* Ajustar espacio en móviles */
    .container.mx-auto.px-4 {
      padding-left: 1rem;
      padding-right: 1rem;
    }
    
    /* Mejorar la presentación de los productos en la tabla */
    ul.list-disc.list-inside li {
      margin-bottom: 0.25rem;
    }
    
    /* Asegurar que el botón de acción sea fácil de tocar en móviles */
    td a.text-\[\#AB277A\] {
      padding: 0.25rem 0;
      display: inline-block;
    }
  }
</style>
@endsection 