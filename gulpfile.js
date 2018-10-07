var gulp = require('gulp');
var sass = require('gulp-sass');
var concat = require('gulp-concat');
var csso = require('gulp-csso');
var rename = require('gulp-rename');
var wait = require('gulp-wait');

gulp.task('sass', function() {
    return gulp.src('scss/*.scss')
    .pipe(wait(1500))
    .pipe(sass())
    .pipe(concat('style.css'))
    .pipe(gulp.dest('./'))
    .pipe(csso())
    .pipe(rename({ extname: '.min.css' }))
    .pipe(gulp.dest('./'));
});

gulp.task('watch', function() {
    gulp.watch('scss/**/*.scss', ['sass']);
});