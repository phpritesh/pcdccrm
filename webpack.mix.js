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


	
mix.js('resources/assets/js/app.js', 'public/lmix/js')
 .js([
        'resources/assets/js/bootstrap-datetimepicker.min.js',
        'resources/assets/js/adminlte.js',
        'resources/assets/js/common/application.js',
    ], 'public/lmix/js/theme.js')
    .extract([
        'jquery', 'bootstrap', 'icheck', 'jquery-validation',
        'datatables.net', 'datatables.net-bs', 'datatables.net-responsive-bs'
    ])
    .sass('resources/assets/sass/vendor.scss', 'public/lmix/css')
	.styles([
        'resources/assets/css/style.css',
        'resources/assets/css/custom.css',
        'resources/assets/css/bootstrap-datetimepicker.min.css',
        'resources/assets/css/bootstrap-toggle.min.css'
    ], 'public/lmix/css/theme.css')
	 .styles('resources/assets/css/pace.css', 'public/lmix/css/pace.css')
    .autoload({
        jquery: ['$', 'window.jQuery', 'jQuery', 'jquery'],
    });


mix.options({
    processCssUrls: true,
    purifyCss: false,
    clearConsole: false
});
