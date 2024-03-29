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


mix.js('resources/assets/js/app.js', 'public/js')
   .js('resources/assets/js/common.js', 'public/js')
   .js('resources/assets/js/admin.js', 'public/js')
   .js('resources/assets/js/homepage.js', 'public/js')
   .js('resources/assets/js/associations.js', 'public/js')
   .js('resources/assets/js/activities.js', 'public/js')
   .js('resources/assets/js/docs.js', 'public/js')
   .js('resources/assets/js/pages.js', 'public/js')
   .js('resources/assets/js/altea-decideix.js', 'public/js')
   .vue()
   .sass('resources/assets/sass/app.scss', 'public/css')
   .sass('resources/assets/sass/admin.scss', 'public/css')
   .copyDirectory('resources/assets/images', 'public/images');

if (mix.inProduction) {
    mix.version();
}
