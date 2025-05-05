{{--
  Template Name: Mis Reservas
--}}

@extends('layouts.app')

@section('content')
<div class="py-28 bg-gray-50">
  <div class="container mx-auto px-4 mt-28">
    <!-- Verificar que el usuario esté logueado -->
    @if(is_user_logged_in())
      @php
        $current_user = wp_get_current_user();
      @endphp
      
      <div class="mb-8">
        <h1 class="text-3xl font-bold text-[#030D55] mb-2 font-paytone">Mis Reservas</h1>
        <p class="text-gray-600">Gestiona tus citas y reservas.</p>
      </div>
      
      <!-- Contenido principal -->
      <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="p-6 border-b border-gray-100 flex justify-between items-center">
          <div>
            <h2 class="text-xl font-bold text-[#030D55]">Historial de Citas</h2>
            <p class="text-gray-600 text-sm mt-1">Visualiza tus próximas citas y el historial</p>
          </div>
          
          <a href="{{ home_url('/reservar-cita') }}" class="inline-flex items-center px-5 py-2 bg-[#FBD5E8] text-[#D93280] rounded-xl font-medium hover:bg-[#D93280] hover:text-white transition-all duration-300 text-sm">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            Reservar nueva cita
          </a>
        </div>
        
        <div class="p-6">
          <!-- Integración con Bookly -->
          @if(function_exists('bookly_print_customer_cabinet'))
            <?php 
              echo do_shortcode('[bookly-appointments-list show_column_date="1" show_column_time="1" show_column_service="1" show_column_staff="1" show_column_price="1" show_column_status="1" show_column_cancel="1"]'); 
            ?>
          @else
            <div class="py-12 text-center">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-300 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
              </svg>
              <h3 class="text-lg font-medium text-gray-700 mb-2">No se encontraron reservas</h3>
              <p class="text-gray-500 max-w-md mx-auto mb-6">No tienes citas programadas o el sistema de reservas no está disponible en este momento.</p>
              <a href="{{ home_url('/reservar-cita') }}" class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-[#D93280] to-[#5A0989] hover:from-[#AB277A] hover:to-[#4A0979] text-white rounded-xl font-medium shadow-sm hover:shadow transition-all duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                Reservar una cita
              </a>
            </div>
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
</style>
@endsection 