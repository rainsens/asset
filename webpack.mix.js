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

mix.setPublicPath(path.resolve('./'))
   .js('resources/js/app.js', 'public/rainsens/app.js').version()
   .sass('resources/sass/app.scss', 'public/rainsens/app.css').version();

mix.copyDirectory('resources/theme', 'public/rainsens/theme');
