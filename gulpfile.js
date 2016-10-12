var elixir = require('laravel-elixir');

require('laravel-elixir-webpack');

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
  var bpath = 'node_modules/bootstrap-sass/assets';
  var jqueryPath = 'resources/assets/vendor/jquery';

// mix.webpack('app.js');
mix.sass('app.scss') 
      .copy(jqueryPath + '/dist/jquery.min.js', 'public/js')
      .copy(bpath + '/fonts', 'public/fonts') 
      .copy(bpath + '/javascripts/bootstrap.min.js', 'public/js');  
});
