const mix = require('laravel-mix');

mix.js('resources/js/index.jsx', 'public/js')
    .babelConfig({
        presets: ['@babel/preset-env'], // You can define Babel presets if needed
    })
    .postCss('resources/css/app.css', 'public/css', [
        // Add any PostCSS plugins here if needed
    ]);
