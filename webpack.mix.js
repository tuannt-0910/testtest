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

mix.styles([
    'public/Admin/assets/css/font.css',
    'public/Admin/assets/css/icons/icomoon/styles.css',
    'public/Admin/assets/css/bootstrap.css',
    'public/Admin/assets/css/core.css',
    'public/Admin/assets/css/components.css',
    'public/Admin/assets/css/colors.css',
    'public/Admin/assets/css/icheck/icheck-material.min.css',
    'public/Admin/assets/css/toastr/toastr.min.css',
    'public/Admin/assets/css/app.css',
], 'public/css/admin.css')
.js([
    'public/Admin/assets/js/plugins/loaders/pace.min.js',
    'public/Admin/assets/js/core/libraries/bootstrap.min.js',
    'public/Admin/assets/js/plugins/loaders/blockui.min.js',
    'public/Admin/assets/js/plugins/visualization/d3/d3.min.js',
    'public/Admin/assets/js/plugins/forms/styling/uniform.min.js',
    'public/Admin/assets/js/plugins/forms/selects/bootstrap_multiselect.js',
    'public/Admin/assets/js/plugins/uploaders/fileinput/plugins/purify.min.js',
    'public/Admin/assets/js/plugins/uploaders/fileinput/plugins/sortable.min.js',
    'public/Admin/assets/js/plugins/uploaders/fileinput/fileinput.min.js',
    'public/Admin/assets/js/plugins/forms/inputs/duallistbox.min.js',
    'public/Admin/assets/js/core/app.js',
    'public/Admin/assets/js/pages/dashboard.js',
    'public/Admin/assets/js/pages/uploader_bootstrap.js',
    'public/Admin/assets/js/pages/form_dual_listboxes.js',
    'public/Admin/assets/js/charts/c3/c3_lines_areas.js',
    'public/Admin/assets/js/core/libraries/jquery_ui/effects.min.js',
    'public/Admin/assets/js/core/libraries/jquery_ui/interactions.min.js',
    'public/Admin/assets/js/plugins/trees/fancytree_all.min.js',
    'public/Admin/assets/js/pages/extra_trees.js',
], 'public/js/admin.js')
.options({
    processCssUrls: false
});

mix.autoload({
    jquery: ['$', 'jQuery', 'window.jQuery'],
});

mix.styles([
    'public/Client/fonts/front.css',
    'public/Client/fonts/icomoon/style.css',
    'public/Client/css/bootstrap.min.css',
    'public/Client/css/jquery-ui.css',
    'public/Client/css/owl.carousel.min.css',
    'public/Client/css/owl.theme.default.min.css',
    'public/Client/css/owl.theme.default.min.css',
    'public/Client/css/jquery.fancybox.min.css',
    'public/Client/css/bootstrap-datepicker.css',
    'public/Client/fonts/flaticon/font/flaticon.css',
    'public/Client/css/aos.css',
    'public/Client/css/style.css',
], 'public/css/client.css')
.js([
    'public/Client/js/jquery-3.3.1.min.js',
    'public/Client/js/jquery-migrate-3.0.1.min.js',
    'public/Client/js/jquery-ui.js',
    'public/Client/js/popper.min.js',
    'public/Client/js/bootstrap.min.js',
    'public/Client/js/owl.carousel.min.js',
    'public/Client/js/jquery.stellar.min.js',
    'public/Client/js/jquery.countdown.min.js',
    'public/Client/js/bootstrap-datepicker.min.js',
    'public/Client/js/jquery.easing.1.3.js',
    'public/Client/js/aos.js',
    'public/Client/js/jquery.fancybox.min.js',
    'public/Client/js/jquery.sticky.js',
    'public/Client/js/main.js',
], 'public/js/client.js')
.options({
    processCssUrls: false
});
