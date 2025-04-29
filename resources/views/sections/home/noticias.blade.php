<!-- Sección 1: Noticias destacadas en el carrusel -->
<section class="bg-white py-4 overflow-hidden">
    <div class="w-full max-w-5xl mx-auto px-4">
      <h2 class="text-3xl md:text-4xl font-bold text-[#030D55] mb-8 text-left font-paytone" style="line-height: 1.1;">¿Nos viste en la prensa?</h2>
      
      <!-- Contenedor del carrusel con estilos personalizados -->
      <div class="max-w-[1000px] mx-auto">
        {!! do_shortcode('[simple_carousel]') !!}
      </div>
      <div class="flex justify-center mt-4">
        <a href="{{ home_url('/prensa') }}" class="vernoticias">Ver todas las noticias</a>
      </div>
    </div>
</section>
<style>
    .vernoticias {
        background-color: #030D55;
        color: white;
        padding: 10px 20px;
        border-radius: 5px;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        font-weight: bold;
        text-align: center;
        transition: background-color 0.3s ease;
    }
    .vernoticias:hover {
        background-color: #AB277A;
    }
</style>