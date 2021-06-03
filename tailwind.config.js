const colors = require('tailwindcss/colors')

module.exports = {
  mode: 'jit',
  purge: [
    './templates/**/*.php',
  ],
  darkMode: 'media',
  theme: {
    colors: {
      transparent: 'transparent',
      current: 'currentColor',
      black: colors.black,
      white: colors.white,
      gray: colors.trueGray,
      green: colors.emerald,
      blue: {
        100: '#E6F0FA',
        200: '#ACDAF7',
        300: '#73C4F4',
        400: '#39AEF1',
        500: '#0099EE',
        600: '#007AC2',
        700: '#005B97',
        800: '#003C6C',
        900: '#001E42',
      },
      red: colors.red,
    },
  },
  variants: {
    extend: {},
  },
  plugins: [
    require('@tailwindcss/forms'),
  ],
}
