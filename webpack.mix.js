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

mix.react('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css');
/*
let fs = require('fs');

let getFiles = function (dir) {
  // get all 'files' in this directory
  // filter directories
  return fs.readdirSync(dir).filter(file => {
    return fs.statSync(`${dir}/${file}`).isFile();
  });
};

getFiles('resources/sass/organisations').forEach(function (filepath) {
  mix.sass('resources/sass/organisations/' + filepath, 'public/css');
});
*/