var gulp      = require('gulp'),
    sass      = require('gulp-sass'),
    minify    = require('gulp-minify-css'),
    concat    = require('gulp-concat'),
    uglify    = require('gulp-uglify'),
    rename    = require('gulp-rename');

path = {
    'sass': 'resources/assets/style/app.sass',
    'vendor': 'resources/assets/style/vendor/**/*.*'
};

gulp.task('css', function () {
    return gulp.src([path.vendor, path.sass])
        .pipe(sass({onError: console.error.bind(console, 'SASS ERROR')}))
        .pipe(minify())
        .pipe(concat('style.min.css'))
        .pipe(gulp.dest('public/assets/css'));
});

gulp.task('modernizr', function () {
    return gulp.src('resources/assets/js/vendor/modernizr.min.js')
        .pipe(gulp.dest('public/assets/js'));
});


gulp.task('js', function () {
    return gulp.src(['resources/assets/js/vendor/jquery.min.js', 'resources/assets/js/vendor/bootstrap.min.js', 'resources/assets/js/vendor/xdsoft_datetimepicker.js', 'resources/assets/js/app.js'])
        .pipe(uglify())
        .pipe(concat('script.min.js'))
        .pipe(gulp.dest('public/assets/js'))
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

gulp.task('makecss', ['sass', 'css', 'style']);