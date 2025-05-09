{{--
  Template Name: Recuperar Contraseña
--}}

@extends('layouts.app')

@section('content')
<div class="py-16 md:py-24 lg:py-28 bg-gray-50">
  <div class="container mx-auto px-4 mt-12 md:mt-20 lg:mt-28">
    <div class="max-w-md mx-auto">
      <!-- Mensaje de éxito -->
      <div id="success-message" class="mb-6 <?php echo isset($_GET['reset-link-sent']) ? '' : 'hidden'; ?>">
        <div class="p-4 rounded-xl bg-green-50 border border-green-200">
          <div class="flex">
            <div class="flex-shrink-0">
              <svg class="h-5 w-5 text-green-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
              </svg>
            </div>
            <div class="ml-3">
              <p class="text-sm font-medium text-green-800">
                Hemos enviado un enlace de recuperación a tu correo electrónico. Por favor, revisa tu bandeja de entrada y sigue las instrucciones.
              </p>
            </div>
          </div>
        </div>
      </div>

      <div class="bg-white rounded-xl shadow-lg overflow-hidden" style="border: 4px solid transparent; border-radius: 0.75rem; background-image: linear-gradient(white, white), linear-gradient(to right, #D93280, #5A0989); background-origin: border-box; background-clip: padding-box, border-box;">
        
        <?php
        // Detectamos si estamos en el formulario de reset con token o en el formulario inicial
        $key = isset($_GET['key']) ? sanitize_text_field($_GET['key']) : '';
        $login = isset($_GET['login']) ? sanitize_text_field($_GET['login']) : '';
        $id = isset($_GET['id']) ? absint($_GET['id']) : 0;
        $is_reset_form = ($key && $login && $id);
        ?>
        
        <div class="bg-gradient-to-r from-[#D93280] to-[#5A0989] py-4 md:py-6 px-6 md:px-8">
          <h1 class="text-2xl font-bold text-white font-paytone">
            <?php echo $is_reset_form ? 'Establecer nueva contraseña' : 'Recuperar contraseña'; ?>
          </h1>
          <p class="text-white/80 text-sm mt-2">
            <?php echo $is_reset_form ? 'Crea una nueva contraseña para tu cuenta' : 'Ingresa tu correo electrónico para restablecer tu contraseña'; ?>
          </p>
        </div>
        
        <div class="py-6 md:py-8 px-5 md:px-8">
          <?php if ($is_reset_form): ?>
            
            <!-- Formulario para establecer nueva contraseña -->
            <div id="reset-messages" class="mb-5 md:mb-6 hidden">
              <div class="p-3 md:p-4 rounded-xl bg-red-50 text-red-800 text-sm"></div>
            </div>
            
            <form method="post" id="reset-password-form" class="woocommerce-ResetPassword reset_password space-y-4 md:space-y-5">
              <?php wp_nonce_field('reset_password', 'woocommerce-reset-password-nonce'); ?>
              
              <input type="hidden" name="reset_key" value="<?php echo esc_attr($key); ?>" />
              <input type="hidden" name="reset_login" value="<?php echo esc_attr($login); ?>" />
              
              <div>
                <label for="password_1" class="block text-sm font-medium text-gray-700 mb-1">Nueva contraseña <span class="text-red-600">*</span></label>
                <div class="relative">
                  <input type="password" id="password_1" name="password_1" class="w-full px-3 md:px-4 py-2.5 md:py-3 pr-10 rounded-xl border-gray-300 shadow-sm focus:border-[#AB277A] focus:ring focus:ring-[#AB277A] focus:ring-opacity-30 transition-all" required>
                  <button type="button" class="absolute top-1/2 right-3 transform -translate-y-1/2 text-gray-400 hover:text-gray-600" id="toggle-password-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 eye-open" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 eye-closed hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18" />
                    </svg>
                  </button>
                </div>
                <p class="text-xs text-gray-500 mt-1">Usa al menos 8 caracteres con letras y números.</p>
              </div>
              
              <div>
                <label for="password_2" class="block text-sm font-medium text-gray-700 mb-1">Confirmar contraseña <span class="text-red-600">*</span></label>
                <div class="relative">
                  <input type="password" id="password_2" name="password_2" class="w-full px-3 md:px-4 py-2.5 md:py-3 pr-10 rounded-xl border-gray-300 shadow-sm focus:border-[#AB277A] focus:ring focus:ring-[#AB277A] focus:ring-opacity-30 transition-all" required>
                  <button type="button" class="absolute top-1/2 right-3 transform -translate-y-1/2 text-gray-400 hover:text-gray-600" id="toggle-password-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 eye-open" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 eye-closed hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18" />
                    </svg>
                  </button>
                </div>
              </div>
              
              <div class="mb-6">
                <?php do_action('resetpass_form'); ?>
              </div>
              
              <button type="submit" 
                      class="w-full flex justify-center py-2.5 md:py-3 px-4 border border-transparent rounded-xl shadow-sm text-sm font-medium text-white bg-gradient-to-r from-[#D93280] to-[#5A0989] hover:from-[#AB277A] hover:to-[#4A0979] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#AB277A] transition-all transform hover:scale-[1.02] duration-200">
                <span class="reset-btn-text">Establecer nueva contraseña</span>
                <span class="reset-btn-loading hidden flex items-center ml-2">
                  <svg class="animate-spin h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                  </svg>
                </span>
              </button>
              
              <input type="hidden" name="wc_reset_password" value="true">
              <input type="hidden" name="reset_password" value="true">
              <?php wp_nonce_field('reset_password', 'woocommerce-reset-password-nonce'); ?>
            </form>
            
          <?php else: ?>
            
            <!-- Formulario para solicitar recuperación -->
            <form method="post" id="lostpassword-form" class="woocommerce-ResetPassword lost_reset_password space-y-4 md:space-y-5">
              <?php wp_nonce_field('lost_password', 'woocommerce-lost-password-nonce'); ?>
              
              <div>
                <label for="user_login" class="block text-sm font-medium text-gray-700 mb-1">
                  Correo electrónico o nombre de usuario
                </label>
                <input type="text" name="user_login" id="user_login" autocomplete="username" 
                       class="w-full px-3 md:px-4 py-2.5 md:py-3 rounded-xl border-gray-300 shadow-sm focus:border-[#AB277A] focus:ring focus:ring-[#AB277A] focus:ring-opacity-30 transition-all" required>
              </div>

              <div class="mb-6">
                <?php do_action('lostpassword_form'); ?>
              </div>

              <button type="submit" 
                      class="w-full flex justify-center py-2.5 md:py-3 px-4 border border-transparent rounded-xl shadow-sm text-sm font-medium text-white bg-gradient-to-r from-[#D93280] to-[#5A0989] hover:from-[#AB277A] hover:to-[#4A0979] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#AB277A] transition-all transform hover:scale-[1.02] duration-200">
                <span class="submit-btn-text">Restablecer contraseña</span>
                <span class="submit-btn-loading hidden">
                  <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                  </svg>
                </span>
              </button>

              <input type="hidden" name="wc_reset_password" value="true">
              <?php wp_nonce_field('lost_password', 'woocommerce-lost-password-nonce'); ?>
            </form>
            
          <?php endif; ?>

          <div class="mt-6 md:mt-8 text-center">
            <a href="{{ home_url('/login') }}" class="text-sm text-[#AB277A] hover:text-[#D93280] transition-colors">
              ← Volver a iniciar sesión
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
  // Toggle password visibility for password fields
  const togglePassword1 = document.getElementById('toggle-password-1');
  const togglePassword2 = document.getElementById('toggle-password-2');
  
  if (togglePassword1) {
    togglePassword1.addEventListener('click', function() {
      const passwordInput = document.getElementById('password_1');
      const eyeOpen = this.querySelector('.eye-open');
      const eyeClosed = this.querySelector('.eye-closed');
      
      if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        eyeOpen.classList.add('hidden');
        eyeClosed.classList.remove('hidden');
      } else {
        passwordInput.type = 'password';
        eyeOpen.classList.remove('hidden');
        eyeClosed.classList.add('hidden');
      }
    });
  }
  
  if (togglePassword2) {
    togglePassword2.addEventListener('click', function() {
      const passwordInput = document.getElementById('password_2');
      const eyeOpen = this.querySelector('.eye-open');
      const eyeClosed = this.querySelector('.eye-closed');
      
      if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        eyeOpen.classList.add('hidden');
        eyeClosed.classList.remove('hidden');
      } else {
        passwordInput.type = 'password';
        eyeOpen.classList.remove('hidden');
        eyeClosed.classList.add('hidden');
      }
    });
  }
  
  // Validar que las contraseñas coincidan
  const resetForm = document.getElementById('reset-password-form');
  const messagesDiv = document.getElementById('reset-messages');
  
  if (resetForm) {
    resetForm.addEventListener('submit', function(e) {
      const password1 = document.getElementById('password_1').value;
      const password2 = document.getElementById('password_2').value;
      
      if (password1 !== password2) {
        e.preventDefault();
        messagesDiv.classList.remove('hidden');
        messagesDiv.querySelector('div').textContent = 'Las contraseñas no coinciden';
        return;
      }
      
      // Mostrar estado de carga
      const btnText = resetForm.querySelector('.reset-btn-text');
      const btnLoading = resetForm.querySelector('.reset-btn-loading');
      
      if (btnText && btnLoading) {
        btnText.classList.add('opacity-0');
        btnLoading.classList.remove('hidden');
      }
    });
  }

  // Manejar el envío del formulario
  const lostpasswordForm = document.getElementById('lostpassword-form');
  if (lostpasswordForm) {
    lostpasswordForm.addEventListener('submit', function(e) {
      e.preventDefault();
      
      // Mostrar estado de carga
      const btnText = this.querySelector('.submit-btn-text');
      const btnLoading = this.querySelector('.submit-btn-loading');
      
      if (btnText && btnLoading) {
        btnText.classList.add('opacity-0');
        btnLoading.classList.remove('hidden');
      }

      // Enviar formulario vía AJAX
      const formData = new FormData(this);
      
      fetch(this.action, {
        method: 'POST',
        body: formData,
        credentials: 'same-origin'
      })
      .then(response => response.text())
      .then(() => {
        // Mostrar mensaje de éxito
        document.getElementById('success-message').classList.remove('hidden');
        
        // Limpiar formulario
        this.reset();
        
        // Restaurar botón
        if (btnText && btnLoading) {
          btnText.classList.remove('opacity-0');
          btnLoading.classList.add('hidden');
        }
        
        // Scroll al mensaje
        document.getElementById('success-message').scrollIntoView({ behavior: 'smooth' });
      })
      .catch(error => {
        console.error('Error:', error);
        // Restaurar botón
        if (btnText && btnLoading) {
          btnText.classList.remove('opacity-0');
          btnLoading.classList.add('hidden');
        }
      });
    });
  }
});
</script>
@endsection 