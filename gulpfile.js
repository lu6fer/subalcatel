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
    mix
        .sass('subalcatel.scss')
        .scripts(
        [
            'app.js',
            'subalcatel/routes/**',
            'subalcatel/main.js',
            'subalcatel/services/**',
            'subalcatel/directives/**'
        ],
        'public/js/subalcatel.js')
       .version(['css/subalcatel.css', 'js/subalcatel.js'])
       ;
});
