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
   .sass('resources/sass/app.scss', 'public/css');
   
mix
  .scripts('node_modules/highlightjs/highlight.pack.js', 'public/js/temp.js')
  .scripts([
    'node_modules/highlightjs/highlight.pack.js',
    'public/js/app.js',
  ], 'public/js/app.js');

mix.copy('node_modules/font-awesome/fonts', 'public/fonts');

// 캐시 버스팅
if(mix.inProduction()) {
   mix.version();
}

// 브라우저 싱크
mix.browserSync({
  proxy: 'localhost:8000',
  files: [
    // 'app/**/*',
    'public/css/*',
    // 'public/js/*',
    // 'resources/views/**/*.*',
    // 'routes/**/*'
   ],
   watchOptions: {
      ignored: ['/node_modules/', '/vendor/*', 'public/fonts/*' ]
    }
});