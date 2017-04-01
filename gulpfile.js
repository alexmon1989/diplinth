const elixir = require('laravel-elixir');

//require('laravel-elixir-vue');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(mix => {
    //   .webpack('app.js');
    mix.copy('resources/assets/unify-1.9.6', 'public/unify')
        .copy('resources/assets/img', 'public/img')
        .copy('resources/bower_components/AdminLte/bootstrap', 'public/adminlte/bootstrap')
        .copy('resources/bower_components/AdminLte/dist', 'public/adminlte/dist')
        .copy('resources/bower_components/AdminLte/plugins', 'public/adminlte/plugins')
        .copy('resources/bower_components/lightbox2/dist', 'public/adminlte/plugins/lightbox2')
        .copy('resources/bower_components/lightbox2/dist', 'public/unify/plugins/lightbox2')
        .sass('app.scss', 'public/css/custom.css')
});
