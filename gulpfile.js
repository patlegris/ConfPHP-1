var gulp   = require('gulp'),
    sass   = require('gulp-sass'),
    minify = require('gulp-minify-css'),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify'),
    rename = require('gulp-rename');

styles = {
    'bootstrap': 'resources/assets/style/vendor/bootstrap.min.css',
    'xdsoft': 'resources/assets/style/vendor/xdsoft-datetimepicker.css',
    'app': 'resources/assets/style/app.sass',
    'sass': 'resources/assets/style/**/*.sass'
};

scripts = {
    'jquery': 'resources/assets/js/vendor/jquery-1.11.3.min.js',
    'bootstrap': 'resources/assets/js/vendor/bootstrap.min.js',
    'modernizr': 'resources/assets/js/vendor/modernizr.min.js',
    'xdsoft': 'resources/assets/js/vendor/xdsoft-datetimepicker.js',
    'analytics': 'resources/assets/js/vendor/google-analytics.js',
    'app': 'resources/assets/js/app.js'
};

gulp.task('style', function () {
    return gulp.src([styles.bootstrap, styles.xdsoft, styles.app])
        .pipe(sass({onError: console.error.bind(console, 'SASS ERROR')}))
        .pipe(minify())
        .pipe(concat('style.min.css'))
        .pipe(gulp.dest('public/assets/css'));
});

gulp.task('script', function () {
    return gulp.src([scripts.modernizr, scripts.jquery, scripts.bootstrap, scripts.xdsoft, scripts.app, scripts.analytics])
        .pipe(uglify())
        .pipe(concat('script.min.js'))
        .pipe(gulp.dest('public/assets/js'))
});

gulp.task('watch', function () {
    gulp.watch(styles.sass, ['style']);
    gulp.watch(scripts.app, ['script']);
});

gulp.task('default', ['style', 'script', 'watch']);