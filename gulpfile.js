var gulp   = require('gulp'),
    sass   = require('gulp-sass'),
    minify = require('gulp-minify-css'),
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify'),
    rename = require('gulp-rename');

var path = {
    'res': {
        'sass': 'resources/assets/sass/**/*.sass',
        'js': 'resources/assets/js/*.js',
        'vendor': 'resources/assets/vendor/'
    },
    'pub': {
        'css': 'public/assets/css',
        'js': 'public/assets/js'
    },
    'watch': '.resources/assets/sass/**/*.scss'
};

gulp.task('sass', function () {
    return gulp.src(path.res.sass)
        .pipe(sass({onError: console.error.bind(console, 'SASS ERROR')}))
        .pipe(minify())
        .pipe(rename({basename: 'main', suffix: '.min'}))
        .pipe(gulp.dest(path.pub.css));
});

gulp.task('js', function () {
    return gulp.src(path.res.js)
        .pipe(uglify())
        .pipe(rename({basename: 'main', suffix: '.min'}))
        .pipe(gulp.dest(path.pub.js))
});

gulp.task('vendor', function () {
    return gulp.src('./resources/assets/vendor/*.css')
        .pipe(minify())
        .pipe(rename({basename: 'main', suffix: '.min'}))
        .pipe(gulp.dest('./public/assets/vendor'))
});

gulp.task('watch', function () {
    gulp.watch(path.res.sass, ['sass']);
    //gulp.watch(path.res.js, ['js']);
    //gulp.watch('./resources/assets/vendor/*.css', ['boiler'])
});

gulp.task('default', ['js', 'watch']);