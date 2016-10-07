'use strict';

var gulp = require('gulp');
var sass = require('gulp-sass');
var sourcemaps = require('gulp-sourcemaps');
var bower = require('gulp-bower');
var notify = require('gulp-notify');
var concat = require('gulp-concat');

var config = {
    sassPath: './sass',
    bowerDir: './bower_components'
}

var jsFiles = [
    config.bowerDir + '/jquery/dist/jquery.min.js',
    './js/jquery-noconflict-open.js',
    config.bowerDir + '/bootstrap-sass/assets/javascripts/bootstrap.min.js',
    './js/jquery-noconflict-close.js',
]

//gulp.task('bower', function() {
//    return bower().pipe(gulp.dest(config.bowerDir));
//})

gulp.task('sass', function () {
  return gulp.src(config.sassPath + '/pureliving.scss')
    .pipe(sourcemaps.init())
    .pipe(sass({
        style: 'compressed',
        includePaths: [
            './resources/sass',
            config.bowerDir + '/bootstrap-sass/assets/stylesheets',
        ]
    }).on('error', notify.onError(function(error){
        return "Error: " + error.message;
    })))
    .pipe(sourcemaps.write())
    .pipe(gulp.dest('../css/'));
});

gulp.task('icons', function(){
    return gulp.src(config.bowerDir + '/bootstrap-sass/assets/fonts/**/**.*')
        .pipe(gulp.dest('../fonts'))
})

gulp.task('js', function() {
    return gulp.src(jsFiles)
        .pipe(concat('all.js'))
        .pipe(gulp.dest('../js/'));
});


gulp.task('sass:watch', function () {
  gulp.watch(config.sassPath + '/**/*.scss', ['sass']);
});

gulp.task('default', ['js', 'icons', 'sass', 'sass:watch']);