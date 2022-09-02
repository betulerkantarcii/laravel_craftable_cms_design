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

mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        //
    ]);
    mix.copy('resources/css/all.css', 'public/css')
    .copy('resources/css/animate.css', 'public/css')
    .copy('resources/css/bootstrap.min.css', 'public/css')
    .copy('resources/css/jquery.mmenu.all.css', 'public/css')
    .copy('resources/css/owl.carousel.min.css', 'public/css')
    .copy('resources/css/owl.theme.default.min.css', 'public/css')
    .copy('resources/css/style.css', 'public/css')
    .copy('resources/css/jssocials-1.4.0', 'public/css/jssocials')
    .copy('resources/js/jssocials-1.4.0', 'public/js/jssocials')
    .copy('resources/js/bootstrap.min.js', 'public/js')
    .copy('resources/js/jquery.mmenu.all.js', 'public/js')
    .copy('resources/js/owl.carousel.js', 'public/js')
    .copy('resources/js/popper.min.js', 'public/js')
    .copy('resources/js/scriptler.js', 'public/js')
    .copy('resources/js/wow.min.js', 'public/js');



mix
    .js(["resources/js/admin/admin.js"], "public/js")
    .sass("resources/sass/admin/admin.scss", "public/css")
    .vue();

if (mix.inProduction()) {
    mix.version();
}