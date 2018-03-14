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

mix.js('resources/assets/js/app.js', 'public/js')

   // .sass('resources/assets/sass/app.scss', 'public/css')
   // .copy('resources/assets/css', 'public/css', false)
   // .copy('resources/assets/images', 'public/images', false)
    .copy('node_modules/jquery/dist/jquery.min.js', 'public/js', false)
    .copy('node_modules/vue/dist/vue.min.js', 'public/js', false)
   // .copy('resources/assets/fonts', 'public/css/fonts', false)

   //.sass('resources/assets/sass/admin/admin.scss', 'public/css/admin', false)
   //.sass('resources/assets/sass/web/web.scss', 'public/css/web', false)
   //.sass('resources/assets/sass/web/product.scss', 'public/css/web', false)

   //.js('resources/assets/js/web/web.js', 'public/js/web')
   // .js('resources/assets/js/web/product.js', 'public/js/web')
   // .js('resources/assets/js/admin/images.js', 'public/js/admin')
   // .js('resources/assets/js/admin/admin.js', 'public/js/admin')
   // .js('resources/assets/js/admin/product.js', 'public/js/admin')
   // .js('resources/assets/js/admin/article.js', 'public/js/admin')
   // .js('resources/assets/js/admin/support.js', 'public/js/admin')
   // .js('resources/assets/js/admin/video.js', 'public/js/admin')
   // .js('resources/assets/js/admin/order.js', 'public/js/admin')
   // .js('resources/assets/js/web/cart.js', 'public/js/web')
   ;
