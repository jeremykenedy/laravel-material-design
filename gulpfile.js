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

    mix.sass([
		'app.scss'
    ], 'public/css/app.css');

    mix.scripts([
		'alerts.js',
        'dialogs.js',
        'spinners.js',
        'mdl-selectfield.js'
    ], 'public/js/app.js');

    mix.version([
    	'css/app.css',
    	'js/app.js'
    ]);

});