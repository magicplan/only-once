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
      blue: colors.blue,
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
