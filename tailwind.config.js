/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './web/app/themes/bedrock-theme/**/*.php',
    './web/app/themes/bedrock-theme/src/**/*.js',
  ],
  theme: {
    extend: {
      colors: {
        primary: '#333',
        secondary: '#666',
        accent: '#0073aa',
      },
    },
  },
  plugins: [],
}
