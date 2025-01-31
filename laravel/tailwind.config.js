/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
      './resources/**/*.js',    // Existing line for JavaScript files
      './resources/**/*.jsx',   // Added line for JSX files
      './resources/**/*.html', 
    ],
    theme: {
      extend: {},
    },
    plugins: [],
  }
  