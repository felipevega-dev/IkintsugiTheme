// Contenido para ikintsugi-theme/resources/views/blocks/cta-section.blade.php
@php
$title = get_field('title') ?: '¿Listo para comenzar tu proceso de sanación?';
$description = get_field('description') ?: 'Contáctanos hoy mismo para agendar tu primera sesión de terapia EMDR y dar el primer paso hacia la recuperación.';
$button_text = get_field('button_text') ?: 'Reservar Cita';
$button_link = get_field('button_link') ?: '/reservar-cita';
$background_color = get_field('background_color') ?: '#362766';
@endphp

<section class="py-16" style="background-color: {{ $background_color }}">
  <div class="container mx-auto px-4">
    <div class="max-w-3xl mx-auto text-center text-white">
      <h2 class="text-3xl font-bold mb-6">{{ $title }}</h2>
      <p class="text-lg mb-8">{{ $description }}</p>
      <a href="{{ $button_link }}" class="inline-block bg-gradient-to-r from-[#E93D82] to-[#F26EB6] hover:from-[#E93D82] hover:to-[#F58EC7] text-white px-6 py-3 rounded-full font-medium transition-all duration-300 transform hover:scale-105">
        {{ $button_text }}
      </a>
    </div>
  </div>
</section>