const { mix } = require('laravel-mix');
require('laravel-mix-merge-manifest');

mix.setPublicPath('../../public').mergeManifest();

mix.sass( __dirname + '/Resources/assets/sass/question.scss', 'css/forum/question.css');

if (mix.inProduction()) {
    mix.version();
}