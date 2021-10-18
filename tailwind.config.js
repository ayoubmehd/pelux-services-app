const colors = require('tailwindcss/colors')

module.exports = {
  purge: ['./index.html', './src/**/*.{vue,js,ts,jsx,tsx}'],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      colors: {
        primary: '#7E22CE',
        'page-bg': '#FBFBFB',
        dark: '#374151',
        light: '#F3F4F6'
      },
      outline: {
        0: ['none !important']
      },
      boxShadow: {
        0: ['none !important']
      }
    },
  },
  variants: {
    extend: {
      opacity: ['disabled'],
      cursor: ['disabled'],
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
  ],
}
