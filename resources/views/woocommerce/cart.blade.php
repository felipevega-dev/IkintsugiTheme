{{--
Template Name: Cart Template
--}}

@extends('layouts.app')

@section('content')
<section class="py-6 bg-white md:py-8 lg:py-12">
  <div class="container mx-auto px-4">
    <div class="text-center mt-22 md:mt-26 lg:mt-30">
      <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-[#030D55] mb-8 font-playfair">Carrito de Compra</h1>
    </div>
    
    <div class="woocommerce bg-white p-6 rounded-lg shadow-sm max-w-5xl mx-auto">
      {!! do_shortcode('[woocommerce_cart]') !!}
    </div>
  </div>
</section>
@endsection