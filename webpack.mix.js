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
    .sass('resources/sass/app.scss', 'public/css')
    .sourceMaps();

mix.sass('resources/css-copy/app.scss', 'public/css')
    .sass('resources/css-copy/style.scss', 'public/css');

mix.copyDirectory('resources/assets', 'public/assets')
    .copyDirectory('resources/contactform', 'public/contactform')
    .copyDirectory('resources/img', 'public/img')
    .copyDirectory('resources/js-copy','public/js')
    .copyDirectory('resources/lib','public/lib');