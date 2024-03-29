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
//
// mix.js('resources/js/app.js', 'public/js')
//     .vue()
//     .sass('resources/sass/app.scss', 'public/css');


mix.js('resources/js/web/index.js', 'public/compiled/js')
    .js('resources/js/web/type-writter.js', 'public/compiled/js')
    .js('resources/js/web/cv.js', 'public/compiled/js')
    .js('resources/js/web/custompages.js', 'public/compiled/js')
    .js('resources/js/web/create_question.js', 'public/compiled/js')
    .js('resources/js/web/answer.js', 'public/compiled/js')
    .js('resources/js/web/pagination.js', 'public/compiled/js')
    .css('resources/css/web/index.css', 'public/compiled/css')
    .css('resources/css/web/pages.css', 'public/compiled/css')
    .css('resources/css/web/blog.css', 'public/compiled/css')
    .css('resources/css/web/navigation.css', 'public/compiled/css')
    .css('resources/css/web/cv.css', 'public/compiled/css')
    .css('resources/css/web/type-writter.css', 'public/compiled/css')
    .css('resources/css/web/learn-more.css', 'public/compiled/css');

mix.copy('node_modules/sweetalert2/dist/sweetalert2.min.js', 'public/compiled/js/sweetalert2.min.js')
    .copy('node_modules/sweetalert2/dist/sweetalert2.min.css', 'public/compiled/css/sweetalert2.min.css');

mix.copy('node_modules/jquery/dist/jquery.min.js', 'public/compiled/js/jquery.min.js');
