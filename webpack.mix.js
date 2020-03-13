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

mix.js('resources/js/app.js', 'public/js')
	.sass('resources/sass/app.scss', 'public/css')
	.styles([
		'node_modules/grapesjs/dist/css/grapes.min.css',
		'node_modules/grapesjs-preset-webpage/dist/grapesjs-preset-webpage.min.css'
	], 'public/css/all.css')
	.scripts([
		'node_modules/grapesjs/dist/grapes.min.js', 'public/js/grapes.min.js',
		'node_modules/grapesjs-preset-webpage/dist/grapesjs-preset-webpage.min.js'
	], 'public/js/all.js');
