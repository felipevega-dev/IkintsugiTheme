{{--
  Template Name: Lost Password
--}}

@extends('layouts.app')

@section('content')
<div class="py-28 bg-gray-50">
  <div class="container mx-auto px-4 mt-28">
    <div class="max-w-md mx-auto">
      <div class="bg-white rounded-xl shadow-lg overflow-hidden" style="border: 4px solid transparent; border-radius: 0.75rem; background-image: linear-gradient(white, white), linear-gradient(to right, #D93280, #5A0989); background-origin: border-box; background-clip: padding-box, border-box;">
        <div class="bg-gradient-to-r from-[#D93280] to-[#5A0989] py-6 px-8">
          <h1 class="text-2xl font-bold text-white font-paytone">Recuperar contraseña</h1>
          <p class="text-white/80 text-sm mt-2">Ingresa tu correo electrónico para restablecer tu contraseña</p>
        </div>
        
        <div class="p-8">
          <form method="post" action="<?php echo esc_url(wp_lostpassword_url()); ?>" class="woocommerce-ResetPassword lost_reset_password">
            <?php wp_nonce_field('lost_password', 'woocommerce-lost-password-nonce'); ?>
            
            <div class="mb-6">
              <label for="user_login" class="block text-sm font-medium text-gray-700 mb-1">
                Correo electrónico o nombre de usuario
              </label>
              <input type="text" name="user_login" id="user_login" autocomplete="username" 
                     class="w-full px-4 py-3 rounded-xl border-gray-300 shadow-sm focus:border-[#AB277A] focus:ring focus:ring-[#AB277A] focus:ring-opacity-30 transition-all" required>
            </div>

            <div class="mb-6">
              <?php do_action('lostpassword_form'); ?>
            </div>

            <button type="submit" 
                    class="w-full flex justify-center py-3 px-4 border border-transparent rounded-xl shadow-sm text-sm font-medium text-white bg-gradient-to-r from-[#D93280] to-[#5A0989] hover:from-[#AB277A] hover:to-[#4A0979] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#AB277A] transition-all transform hover:scale-[1.02] duration-200">
              Restablecer contraseña
            </button>

            <input type="hidden" name="wc_reset_password" value="true">
            <?php wp_nonce_field('lost_password', 'woocommerce-lost-password-nonce'); ?>
          </form>

          <div class="mt-6 text-center">
            <a href="{{ home_url('/mi-cuenta') }}" class="text-sm text-[#AB277A] hover:text-[#D93280] transition-colors">
              ← Volver a iniciar sesión
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection 