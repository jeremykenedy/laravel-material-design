var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {

    mix.copy('node_modules/simpleweather/jQuery.simpleWeather.js', 'resources/assets/js/jQuery.simpleWeather.js');

    mix.sass([
		'app.scss'
    ], 'public/css/app.css');

    mix.scripts([
		'alerts.js',
        'dialogs.js',
        'spinners.js',
        'mdl-selectfield.js',
        'jQuery.simpleWeather.js'
    ], 'public/js/app.js');

    mix.version([
    	'css/app.css',
    	'js/app.js'
    ]);

});