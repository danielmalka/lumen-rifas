const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss');

mix.autoload({
    jquery: [
        '$',
        'window.jQuery'
    ]
});

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application, as well as bundling up your JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .webpackConfig({
        resolve: {
            modules: [
                'node_modules'
            ],
            alias: {
                jquery: 'jquery/src/jquery'
            }
        }
    })
    .options({
        processCssUrls: false,
        postCss: [tailwindcss('./tailwind.config.js')],
    });

