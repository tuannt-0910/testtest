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
    'public/Client/css/style.css',
    'public/Client/css/fix.css',
], 'public/css/client.css')
.options({
    processCssUrls: false
});
