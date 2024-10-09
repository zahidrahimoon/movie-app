/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      fontFamily: {
        'playfair': ['Playfair Display', 'serif'],
      },
      colors: {
        'primary': '#04152d',
        'secondary': '#1a2c4e',
        'accent': '#da2f68',
        'text': '#ffffff',
        'muted': '#c3c3c3',
      },
    },
  },
  plugins: [],
}