const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/assets/admin/js/init_admin.js', 'public/js')
    .sass('resources/assets/admin/scss/init_admin.scss', 'public/css', [
        //
    ]);

mix.options({
    processCssUrls: false
})
    .autoload({
        jquery: ['$', 'window.jQuery', 'jQuery','jquery2'],
    });
