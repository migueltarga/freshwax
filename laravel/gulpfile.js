var elixir = require('laravel-elixir');
require('laravel-elixir-sass-compass');
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
	mix.compass("screen.scss", "public/styles/css",{
		style: "compressed",
		sass: "public/styles/sass",
		font: "public/styles/font", 
		image: "public/styles/img", 
		javascript: "public/styles/js", 
		sourcemap: true
	});
//	.publish('pickadate/lib/picker.js', 'public/styles/js')
}); 
