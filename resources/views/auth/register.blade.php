{{--
  Template Name: Registro
--}}

@extends('layouts.app')

@section('content')
<div class="lg:pt-34 md:pt-28">
  <div class="container mx-auto px-4 py-12 md:py-16">
    <div class="max-w-md mx-auto bg-white rounded-2xl shadow-lg overflow-hidden">
      <div class="bg-gradient-to-r from-[#D93280] to-[#5A0989] py-4 md:py-6 px-6 md:px-8">
        <h1 class="text-2xl font-bold text-white font-paytone">Crear cuenta</h1>
        <p class="text-white/80 text-sm mt-2">Regístrate para poder comentar en nuestro blog</p>
      </div>
      
      <div class="py-6 md:py-8 px-5 md:px-8">
        <div id="register-messages" class="mb-5 md:mb-6 hidden">
          <div class="p-3 md:p-4 rounded-xl bg-red-50 text-red-800 text-sm"></div>
        </div>
        
        <form id="register-form" class="space-y-4 md:space-y-5">
          <?php wp_nonce_field('ikintsugi_register_nonce', 'register_nonce'); ?>
          
          <div>
            <label for="username" class="block text-sm font-medium text-gray-700 mb-1">Nombre de usuario <span class="text-red-600">*</span></label>
            <input type="text" id="username" name="username" class="w-full px-3 md:px-4 py-2.5 md:py-3 rounded-xl border-gray-300 shadow-sm focus:border-[#AB277A] focus:ring focus:ring-[#AB277A] focus:ring-opacity-30 transition-all" required>
            <p class="text-xs text-gray-500 mt-1">El nombre que usarás para iniciar sesión y que se mostrará en tus comentarios.</p>
          </div>
          
          <div>
            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Correo electrónico <span class="text-red-600">*</span></label>
            <input type="email" id="email" name="email" class="w-full px-3 md:px-4 py-2.5 md:py-3 rounded-xl border-gray-300 shadow-sm focus:border-[#AB277A] focus:ring focus:ring-[#AB277A] focus:ring-opacity-30 transition-all" required>
            <p class="text-xs text-gray-500 mt-1">Tu correo electrónico no se mostrará públicamente.</p>
          </div>
          
          <div>
            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Contraseña <span class="text-red-600">*</span></label>
            <input type="password" id="password" name="password" class="w-full px-3 md:px-4 py-2.5 md:py-3 rounded-xl border-gray-300 shadow-sm focus:border-[#AB277A] focus:ring focus:ring-[#AB277A] focus:ring-opacity-30 transition-all" required>
            <p class="text-xs text-gray-500 mt-1">Usa al menos 8 caracteres con letras y números.</p>
          </div>
          
          <div>
            <label for="password_confirm" class="block text-sm font-medium text-gray-700 mb-1">Confirmar contraseña <span class="text-red-600">*</span></label>
            <input type="password" id="password_confirm" name="password_confirm" class="w-full px-3 md:px-4 py-2.5 md:py-3 rounded-xl border-gray-300 shadow-sm focus:border-[#AB277A] focus:ring focus:ring-[#AB277A] focus:ring-opacity-30 transition-all" required>
          </div>
          
          <div class="mt-2">
            <button type="submit" class="w-full flex justify-center py-2.5 md:py-3 px-4 border border-transparent rounded-xl shadow-sm text-sm font-medium text-white bg-gradient-to-r from-[#D93280] to-[#5A0989] hover:from-[#AB277A] hover:to-[#4A0979] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#AB277A] transition-all transform hover:scale-[1.02] duration-200">
              <span class="register-btn-text">Crear cuenta</span>
              <span class="register-btn-loading hidden flex items-center ml-2">
                <svg class="animate-spin h-4 w-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                  <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                  <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
              </span>
            </button>
          </div>
        </form>
        
        <div class="mt-6 md:mt-8 text-center">
          <p class="text-sm text-gray-600">
            ¿Ya tienes una cuenta? 
            <a href="{{ home_url('/login') }}" class="text-[#AB277A] hover:text-[#D93280] font-medium transition-colors">Inicia sesión</a>
          </p>
          <a href="{{ home_url('/blog') }}" class="mt-3 md:mt-4 inline-block text-sm text-gray-600 hover:text-gray-900 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M9.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L7.414 9H15a1 1 0 110 2H7.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd" />
            </svg>
            Volver al blog
          </a>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const registerForm = document.getElementById('register-form');
  const messagesDiv = document.getElementById('register-messages');
  
  if (registerForm) {
    registerForm.addEventListener('submit', function(e) {
      e.preventDefault();
      
      // Mostrar estado de carga
      const btnText = registerForm.querySelector('.register-btn-text');
      const btnLoading = registerForm.querySelector('.register-btn-loading');
      btnText.classList.add('opacity-0');
      btnLoading.classList.remove('hidden');
      
      // Ocultar mensajes anteriores
      messagesDiv.classList.add('hidden');
      
      // Verificar que las contraseñas coinciden
      const password = registerForm.querySelector('#password').value;
      const passwordConfirm = registerForm.querySelector('#password_confirm').value;
      
      if (password !== passwordConfirm) {
        messagesDiv.classList.remove('hidden');
        messagesDiv.querySelector('div').textContent = 'Las contraseñas no coinciden';
        
        // Restaurar botón
        btnText.classList.remove('opacity-0');
        btnLoading.classList.add('hidden');
        return;
      }
      
      // Preparar datos del formulario
      const formData = new FormData(registerForm);
      formData.append('action', 'ikintsugi_register_user');
      
      // Comprobar si hay un parámetro redirect en la URL
      const urlParams = new URLSearchParams(window.location.search);
      const redirect = urlParams.get('redirect');
      
      if (redirect) {
        formData.append('redirect', redirect);
      }
      
      // Enviar solicitud AJAX
      fetch('<?php echo admin_url('admin-ajax.php'); ?>', {
        method: 'POST',
        body: formData
      })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          // Redireccionar al usuario
          window.location.href = data.data.redirect;
        } else {
          // Mostrar errores
          messagesDiv.classList.remove('hidden');
          
          // Mostrar lista de errores
          if (data.data.errors && Array.isArray(data.data.errors)) {
            const errorsList = document.createElement('ul');
            errorsList.className = 'list-disc pl-5 mt-1';
            
            data.data.errors.forEach(error => {
              const li = document.createElement('li');
              li.textContent = error;
              errorsList.appendChild(li);
            });
            
            messagesDiv.querySelector('div').innerHTML = '';
            messagesDiv.querySelector('div').appendChild(document.createTextNode(data.data.message + ':'));
            messagesDiv.querySelector('div').appendChild(errorsList);
          } else {
            messagesDiv.querySelector('div').textContent = data.data.message;
          }
          
          // Restaurar botón
          btnText.classList.remove('opacity-0');
          btnLoading.classList.add('hidden');
        }
      })
      .catch(error => {
        console.error('Error:', error);
        
        // Mostrar error genérico
        messagesDiv.classList.remove('hidden');
        messagesDiv.querySelector('div').textContent = 'Error al procesar la solicitud. Inténtalo de nuevo más tarde.';
        
        // Restaurar botón
        btnText.classList.remove('opacity-0');
        btnLoading.classList.add('hidden');
      });
    });
  }
});
</script>
@endsection 