// Contenido para ikintsugi-theme/resources/views/blocks/features-section.blade.php
@php
$title = get_field('title') ?: 'Psicoterapia EMDR orientada al trauma';
$description = get_field('description') ?: 'Los traumas de la vida, desde la infancia afectan profundamente la vida de las personas: aparecen síntomas como disociación, despersonalización, ansiedad, depresión, estrés postraumático, falta de límites, dificultades relacionales, labilidad emocional, baja autoestima y más.';
$schedule = get_field('schedule') ?: 'LUN-VIE: 10:00 - 12:00 / 15:00 - 20:00 HRS.';
$button_text = get_field('button_text') ?: 'Reservar Cita';
$button_link = get_field('button_link') ?: '/reservar-cita';
$image = get_field('image');
$image_url = $image ? $image['url'] : get_theme_file_uri('resources/images/therapy.jpg');
@endphp

<section class="py-16 bg-white">
  <div class="container mx-auto px-4">
    <div class="flex flex-col md:flex-row items-center gap-12">
      <div class="md:w-1/2">
        <h2 class="text-3xl font-bold text-[#362766] mb-6">{{ $title }}</h2>
        <p class="text-gray-700 mb-6">{{ $description }}</p>
        <p class="font-medium text-[#E93D82] mb-8">{{ $schedule }}</p>
        <a href="{{ $button_link }}" class="inline-block bg-gradient-to-r from-[#E93D82] to-[#F26EB6] hover:from-[#E93D82] hover:to-[#F58EC7] text-white px-6 py-2 rounded-full font-medium transition-all duration-300">
          {{ $button_text }}
        </a>
      </div>
      <div class="md:w-1/2">
        <div class="rounded-full overflow-hidden border-8 border-pink-100 transform md:translate-x-4">
          <img src="{{ $image_url }}" alt="Therapy Image" class="w-full h-auto">
        </div>
      </div>
    </div>
  </div>
</section>