const mix = require('laravel-mix');
const $ = require('jquery');
require('select2');
mix.js('resources/js/app.js', 'public/js')
   .vue()
   .postCss('resources/css/app.css', 'public/css', [
       require('tailwindcss'),
   ]);
// Expose jQuery globally
mix.autoload({
    jquery: ['$', 'window.jQuery', 'jQuery']
  });