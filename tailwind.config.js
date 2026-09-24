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
        display: ['Hind Siliguri', 'sans-serif'],
        sans: ['Hind Siliguri', 'sans-serif'],
      },
    },
  },
  plugins: [],
}
