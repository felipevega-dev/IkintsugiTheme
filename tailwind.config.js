export default {
      content: [
        './resources/views/**/*.blade.php',
        './resources/scripts/**/*.js',
      ],
      theme: {
        extend: {
          colors: {
            'kintsugi-gold': '#D4AF37',
            'kintsugi-blue': '#1E3A8A',
            'kintsugi-black': '#111827',
            'kintsugi-gray': '#6B7280',
            'kintsugi-light': '#F3F4F6',
          },
          fontFamily: {
            'sans': ['Inter', 'system-ui', 'sans-serif'],
            'display': ['Playfair Display', 'serif'],
          },
        },
      },
      plugins: [],
    }