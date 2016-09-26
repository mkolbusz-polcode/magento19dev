require('es6-promise').polyfill();
var gulp = require('gulp');
var $    = require('gulp-load-plugins')();
var argv = require('yargs').argv;
var cleanCSS = require('gulp-clean-css');

// Check for --production flag
var isProduction = !!(argv.production);

// Browsers to target when prefixing CSS.
var COMPATIBILITY = ['last 2 versions', 'ie >= 9'];

// File paths to various assets are defined here.
var PATHS = {

  sass: [

  ],
  javascript: [

  ]
};


// Compile Foundation Sass into CSS. In production, the CSS is compressed
gulp.task('sass', function() {

  return gulp.src('scss/fresh.scss')
    .pipe($.sourcemaps.init())
    .pipe($.sass({
      includePaths: PATHS.sass
    })
      .on('error', $.sass.logError))
    .pipe($.autoprefixer({
      browsers: COMPATIBILITY
    }))
    // .pipe(cleanCSS({compatibility: 'ie8'}))
    .pipe($.if(!isProduction, $.sourcemaps.write()))
    .pipe(gulp.dest('../css'));
});

// Build the "dist" folder by running all of the above tasks
gulp.task('build', ['sass']);


gulp.task('default', ['sass',], function() {
  gulp.watch(['scss/**/*.scss'], ['sass']);
});
