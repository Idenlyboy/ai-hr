const mix = require('laravel-mix');
const path = require('path');

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
    .vue()
    .sass('resources/scss/app.scss', 'public/css')
    .setPublicPath('public')
    .options({
        processCssUrls: false,
        postCss: [require('postcss-import'), require('autoprefixer')],
    })
    .webpackConfig({
        stats: {
            children: true
        },
        resolve: {
            alias: {
                '@storage': path.join(__dirname, 'resources/js/storage'),
                '@composables': path.join(__dirname, 'resources/js/composables'),
                '@components': path.join(__dirname, 'resources/js/components'),
            }
        },
    })
    .copy('resources/images/', 'public/images/');

mix.minify('public/css/app.css');

// if (mix.inProduction()) {
//     mix.version();
// }