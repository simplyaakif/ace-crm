const mix = require('laravel-mix');
// var LiveReloadPlugin = require('webpack-livereload-plugin');
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


mix.webpackConfig({
    output: {
        // Chunks in webpack
        publicPath: '/',
        chunkFilename: 'js/components/[name].js',
    },
});

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/bracket.scss', 'public/css')
    .sass('resources/sass/table.scss', 'public/css');

mix.disableSuccessNotifications();


mix.browserSync('http://127.0.0.1:8000/');

// mix.webpackConfig({
//    plugins: [new LiveReloadPlugin()]
// });
// MediaManager
mix.sass('resources/assets/vendor/MediaManager/sass/manager.scss', 'public/assets/vendor/MediaManager/style.css')
    .copyDirectory('resources/assets/vendor/MediaManager/dist', 'public/assets/vendor/MediaManager')