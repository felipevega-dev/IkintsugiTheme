export default {
      content: [
            './app/**/*.php',
            './resources/**/*.{php,vue,js}',
            './resources/views/**/*.blade.php',
            './resources/views/sections/**/*.blade.php',
            './resources/scripts/**/*.js',
      ],
      theme: {
        extend: {
          colors: {
            // Paleta Institucional (azul)
            'kintsugi-blue': {
              900: '#002060', // Azul institucional principal
              800: '#0F3A7D',
              700: '#1E468E',
              600: '#2D54A0'
            },
            // Paleta Redes Sociales (morados/púrpuras)
            'kintsugi-purple': {
              900: '#362766', // Morado oscuro principal
              800: '#4C3A91',
              700: '#5D46AC',
              600: '#7251D4',
              500: '#8868DD',
              400: '#A182E8',
              300: '#BDAAF0'
            },
            // Paleta de rosados/fucsias
            'kintsugi-pink': {
              900: '#B7006E',
              800: '#C31A7F',
              700: '#D93280', // Fucsia principal
              600: '#EC4899',
              500: '#F472B6',
              400: '#F9A8D4',
              300: '#FBD5E8'
            },
            // Paleta complementaria (naranjas/amarillos)
            'kintsugi-orange': {
              900: '#F57600',
              800: '#F7941D',
              700: '#F9A01D',
              600: '#FDBE21'
            },
            // Escala de grises
            'kintsugi-gray': {
              900: '#1A1A1A',
              800: '#333333',
              700: '#4D4D4D',
              600: '#666666',
              500: '#808080',
              400: '#999999',
              300: '#B3B3B3',
              200: '#CCCCCC',
              100: '#E6E6E6',
              50: '#F2F2F2'
            }
          },
          fontFamily: {
            'roboto': ['Roboto', 'sans-serif'],
            'hugamour': ['Hugamour', 'cursive'],
            'playfair': ['"Playfair Display"', 'serif'],
            'sans': ['Roboto', 'system-ui', 'sans-serif'],
            'display': ['Hugamour', 'cursive'],
          },
        },
      },
      plugins: [],
    }