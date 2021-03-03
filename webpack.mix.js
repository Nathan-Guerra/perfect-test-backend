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

mix.styles('resources/css/bootstrap.css', 'public/css/app.css')
    .js('resources/js/produtos/produto_form.js', 'public/js')
    .js('resources/js/clientes/cliente_form.js', 'public/js')
    .js('resources/js/vendas/venda_form.js', 'public/js')
    .js('resources/js/dashboard.js', 'public/js');
