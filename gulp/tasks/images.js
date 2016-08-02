import config      from '../config';
import changed     from 'gulp-changed';
import gulp        from 'gulp';
import gulpif      from 'gulp-if';
import imagemin    from 'gulp-imagemin';
import browserSync from 'browser-sync';

gulp.task('blogImages', function() {

  return gulp.src(config.blog.images.src)
    .pipe(changed(config.blog.images.dest)) // Ignore unchanged files
    .pipe(gulpif(global.isProd, imagemin())) // Optimize
    .pipe(gulp.dest(config.blog.images.dest))
    .pipe(browserSync.stream());

});

gulp.task('adminImages', function() {

  return gulp.src(config.admin.images.src)
    .pipe(changed(config.admin.images.dest)) // Ignore unchanged files
    .pipe(gulpif(global.isProd, imagemin())) // Optimize
    .pipe(gulp.dest(config.admin.images.dest))
    .pipe(browserSync.stream());

});
