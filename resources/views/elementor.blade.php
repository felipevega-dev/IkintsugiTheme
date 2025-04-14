{{--
  Template Name: Elementor
--}}

@extends('layouts.app')

@section('content')
<section class="relative bg-white overflow-hidden">
    <div class="container mx-auto px-4 relative z-10 mt-10">
    </div>
</section>
<section class="py-6 mt-6 bg-white md:mt-14 md:py-14 lg:mt-16 lg:py-16 xl:mt-20 xl:py-20">
    <div class="elementor-content-area">
        {!! the_content() !!}
    </div>
</section>
@endsection
