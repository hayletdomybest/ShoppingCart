const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css');

mix.copy('node_modules/bootstrap-imageupload/dist/css/bootstrap-imageupload.min.css', 'public/css/bootstrap-imageupload.min.css');
mix.copy('node_modules/bootstrap-imageupload/dist/js/bootstrap-imageupload.min.js', 'public/js/bootstrap-imageupload.min.js');
