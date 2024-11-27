const mix = require('laravel-mix');

mix.js('resources/js/bootstrap.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        require('postcss-import'),
        require('autoprefixer'),
    ]);