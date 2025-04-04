@props([
  'variant' => 'primary',
  'size' => 'md',
  'href' => null,
])

@php
  $baseClasses = 'inline-flex items-center justify-center font-medium rounded-md transition-colors focus:outline-none focus:ring-2 focus:ring-offset-2';
  
  $variantClasses = match ($variant) {
    'primary' => 'bg-kintsugi-gold text-white hover:bg-yellow-600 focus:ring-yellow-500',
    'secondary' => 'bg-kintsugi-blue text-white hover:bg-blue-800 focus:ring-blue-700',
    'outline' => 'bg-transparent text-kintsugi-black border border-gray-300 hover:bg-gray-50 focus:ring-gray-500',
    'dark' => 'bg-kintsugi-black text-white hover:bg-gray-800 focus:ring-gray-700',
    default => 'bg-kintsugi-gold text-white hover:bg-yellow-600 focus:ring-yellow-500',
  };
  
  $sizeClasses = match ($size) {
    'sm' => 'px-3 py-1.5 text-sm',
    'md' => 'px-4 py-2 text-base',
    'lg' => 'px-6 py-3 text-lg',
    default => 'px-4 py-2 text-base',
  };
  
  $classes = "{$baseClasses} {$variantClasses} {$sizeClasses}";
@endphp

@if ($href)
  <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
  </a>
@else
  <button {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
  </button>
@endif 