const mix = require('laravel-mix');

const postCssConfig = [require('tailwindcss')('./tailwind.config.js')];

if (process.env.NODE_ENV === 'production') {
    postCssConfig.push(
        require('@fullhuman/postcss-purgecss')({
            content: [
                './resources/js/**/*.vue',
                './resources/js/**/*.js',
                './resources/sass/**/*.scss',
                './resources/views/**/*.php'
            ],
            defaultExtractor: content =>
                content.match(/[A-Za-z0-9-_:/]+/g) || []
        })
    );
}

mix.webpackConfig({
    module: {
        rules: [
            {
                test: /\.jsx?$/,
                exclude: /(node_modules\/(?!(strict-uri-encode|query-string)\/).*|bower_components)/,
                use: [
                    {
                        loader: 'babel-loader',
                        options: Config.babel()
                    }
                ]
            }
        ]
    }
});


mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/nepal.js', 'public/js')
    .js('resources/js/mc.js', 'public/js')
    .js('resources/js/frontcountry.js', 'public/js')
    .js('resources/js/region.js', 'public/js')
    .js('resources/js/activity.js', 'public/js')
    .js('resources/js/reviews.js', 'public/js')
    .js('resources/js/blogs.js', 'public/js')
    .js('resources/js/faqs.js', 'public/js')
    .js('resources/js/about.js', 'public/js')
    // .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/itin.scss', 'public/css')
    .sass('resources/sass/add.scss', 'public/css')

    // .sass('resources/sass/other.scss', 'public/css')
   .options({
        processCssUrls: false,
        postCss: postCssConfig
    })
    .version();





    mix.combine([
        'public/js/jquery.js',
        'public/vendors/gdpr/gdpr.js',
        'public/js/frontend.js',
        'public/js/lozad.js',


    ], 'public/js/vendor.min.js');



    mix.combine([
        'public/css/itin.css',
        'public/css/add.css',

    ], 'public/css/new.min.css');






