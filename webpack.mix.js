let mix = require('laravel-mix');

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

mix
  .js('resources/assets/js/app.js', 'public/js')
  .sass('resources/assets/sass/app.scss', 'public/css')
  //.options({
    //postCss: [
      //require('postcss-import'),
      //require('postcss-css-variables'),
      //require('postcss-conditionals'),
      //require('postcss-custom-media'),
      //require('css-mqpacker'),
      //require('autoprefixer')
    //]
  //})
	//.extract(['axios', 'buefy', 'lodash', 'vue']);
  .disableSuccessNotifications();

mix.browserSync({
  browser: 'google chrome',
  host: 'westpoint.dev',
  open: 'external',
  proxy: 'westpoint.dev',
});
