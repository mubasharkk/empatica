let mix = require('laravel-mix');

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

mix.react([
        'resources/assets/js/app.js',
        'resources/assets/js/components/DashboardApp.jsx',
        'resources/assets/js/components/InfoGraph.jsx',
        'resources/assets/js/components/LineGraph.jsx',
    ], 'public/js/app.js')
    .sass('resources/assets/sass/app.scss', 'public/css');
