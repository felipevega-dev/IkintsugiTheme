// Contenido para ikintsugi-theme/resources/views/blocks/testimonials.blade.php
@php
$title = get_field('title') ?: 'Lo que dicen nuestros pacientes';
$testimonials = get_field('testimonials');
// Si no hay testimonios, crear ejemplos predeterminados
if (!$testimonials) {
    $testimonials = [
        [
            'name' => 'María López',
            'content' => 'La terapia EMDR me ayudó a superar un trauma que había estado arrastrando durante años. Estoy muy agradecida por el apoyo y profesionalismo recibido.',
            'position' => 'Paciente'
        ],
        [
            'name' => 'Carlos Rodríguez',
            'content' => 'El enfoque de la terapia fue fundamental para mi recuperación. Recomendaría este servicio a cualquiera que esté lidiando con traumas o ansiedad.',
            'position' => 'Paciente'
        ],
        [
            'name' => 'Laura Sánchez',
            'content' => 'La atención personalizada y el ambiente de confianza me permitieron avanzar en mi proceso de curación. Excelentes profesionales.',
            'position' => 'Paciente'
        ]
    ];
}
@endphp

<section class="py-16 bg-gray-50">
  <div class="container mx-auto px-4">
    <h2 class="text-3xl font-bold text-center text-[#362766] mb-12">{{ $title }}</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
      @foreach($testimonials as $testimonial)
        <div class="bg-white p-6 rounded-lg shadow-md">
          <div class="mb-4 text-[#E93D82]">
            <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 32 32" aria-hidden="true">
              <path d="M9.352 4C4.456 7.456 1 13.12 1 19.36c0 5.088 3.072 8.064 6.624 8.064 3.36 0 5.856-2.688 5.856-5.856 0-3.168-2.208-5.472-5.088-5.472-.576 0-1.344.096-1.536.192.48-3.264 3.552-7.104 6.624-9.024L9.352 4zm16.512 0c-4.896 3.456-8.352 9.12-8.352 15.36 0 5.088 3.072 8.064 6.624 8.064 3.264 0 5.856-2.688 5.856-5.856 0-3.168-2.304-5.472-5.184-5.472-.576 0-1.248.096-1.44.192.48-3.264 3.456-7.104 6.528-9.024L25.864 4z" />
            </svg>
          </div>
          <p class="text-gray-700 mb-4">{{ $testimonial['content'] }}</p>
          <div class="flex items-center">
            <div class="flex-shrink-0">
              <div class="w-10 h-10 rounded-full bg-[#362766] flex items-center justify-center text-white font-bold">
                {{ substr($testimonial['name'], 0, 1) }}
              </div>
            </div>
            <div class="ml-3">
              <p class="text-base font-medium text-gray-900">{{ $testimonial['name'] }}</p>
              <p class="text-sm text-gray-500">{{ $testimonial['position'] }}</p>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>