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

mix.scripts([
        'public/client/js/jquery.min.js',
        'public/client/js/bootstrap.min.js',
        'public/client/js/slick.min.js',
        'public/client/js/nouislider.min.js',
        'public/client/js/jquery.zoom.min.js',
        'public/backend/assets/scripts/sweetalert.min.js',
        'public/client/js/main.js',
    ], 'public/client/js/all.js')
    .styles([
        'public/client/css/bootstrap.min.css',
        'public/client/css/slick.css',
        'public/client/css/slick-theme.css',
        'public/client/css/nouislider.min.css',
    ], 'public/client/css/all.css');
