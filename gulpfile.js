var elixir = require('laravel-elixir');

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

elixir(function(mix) {
    mix.styles([
    	'bootstrap.min.css',
    	'font-awesome.min.css',
    	'prettyPhoto.css',
    	'animate.css',
    	'main.css',
    	'price-range.css',
    	'responsive.css'],'public/css/app.css');
    mix.scripts([
    	'jquery.js',
    	'bootstrap.min.js',
    	'jquery.scrollUp.min.js',
    	'price-range.js',
    	'jquery.prettyPhoto.js',
    	'main.js',
    	'contact.js',
    	'gmaps.js',
    	'html5shiv.js'],'public/js/app.js');
    mix.version(['css/app.css','js/app.js']);
    mix.copy('resources/assets/fonts','public/build/fonts');
    mix.copy('resources/assets/font','public/build/font');
    mix.copy('resources/assets/images','public/build/images');
});
