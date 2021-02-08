var Encore = require('@symfony/webpack-encore');

Encore
// the project directory where compiled assets will be stored
    .setOutputPath('public/bundles/adminlte/')
    .setPublicPath('/bundles/adminlte/')
    .cleanupOutputBeforeBuild()

    // add debug data in development
    .enableSourceMaps(!Encore.isProduction())

    // uncomment to create hashed filenames (e.g. app.abc123.css)
    .enableVersioning(Encore.isProduction())

    // generate only two files: app.js and app.css
    .addEntry('adminlte', './assets/adminlte-demo.js')

    .copyFiles({ from: './assets/images', to: 'images/[path][name].[ext]' })

    // show OS notifications when builds finish/fail
    .enableBuildNotifications()

    // because we need $/jQuery as a global variable
    .autoProvidejQuery()

    // see https://symfony.com/doc/current/frontend/encore/bootstrap.html
    .enableSassLoader(function(sassOptions) {}, {
        resolveUrlLoader: false
    })

    .disableSingleRuntimeChunk()
;

module.exports = Encore.getWebpackConfig();
