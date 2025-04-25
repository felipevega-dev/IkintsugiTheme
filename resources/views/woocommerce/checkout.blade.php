{{--
Template Name: Checkout Template
--}}

@extends('layouts.app')

@section('content')
<section class="py-6 bg-white md:py-8 lg:py-12">
  <div class="container mx-auto px-4">
    <div class="text-center mt-22 md:mt-26 lg:mt-30">
      <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-[#030D55] mb-8 font-playfair">Finalizar Compra</h1>
    </div>

    <div class="woocommerce grid grid-cols-1 lg:grid-cols-12 gap-8 max-w-7xl mx-auto">
      <!-- Columna del formulario -->
      <div class="lg:col-span-8">
        <div class="bg-white p-6 rounded-lg shadow-sm">
          {!! do_shortcode('[woocommerce_checkout]') !!}
        </div>
      </div>
      
      <!-- Columna del resumen -->
      <div class="lg:col-span-4">
        <div class="bg-white p-6 rounded-lg shadow-sm sticky top-4">
          <h2 class="text-xl font-bold mb-4 text-[#030D55]">Resumen del Pedido</h2>
          <div class="checkout-order-review">
            {!! do_shortcode('[woocommerce_order_review]') !!}
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection