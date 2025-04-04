<header class="bg-white shadow-md py-4">
  <div class="container mx-auto px-4 flex justify-between items-center">
    <!-- Logo/Brand -->
    <a class="text-xl font-bold text-gray-800 hover:text-blue-600 transition-colors" href="{{ home_url('/') }}">
      {!! $siteName !!}
    </a>

    <!-- Navigation -->
    @if (has_nav_menu('primary_navigation'))
      <nav class="hidden md:block" aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}">
        {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'flex space-x-6', 'echo' => false]) !!}
      </nav>
      
      <!-- Mobile menu button -->
      <button class="md:hidden p-2 rounded-md text-gray-600 hover:text-gray-900 hover:bg-gray-100">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
      </button>
    @endif
  </div>
</header>
