import config      from '../config';
import changed     from 'gulp-changed';
import gulp        from 'gulp';
import browserSync from 'browser-sync';

gulp.task('blogFonts', function() {

  return gulp.src(config.blog.fonts.src)
    .pipe(changed(config.blog.fonts.dest)) // Ignore unchanged files
    .pipe(gulp.dest(config.blog.fonts.dest))
    .pipe(browserSync.stream());

});

gulp.task('adminFonts', function() {

  return gulp.src(config.admin.fonts.src)
    .pipe(changed(config.admin.fonts.dest)) // Ignore unchanged files
    .pipe(gulp.dest(config.admin.fonts.dest))
    .pipe(browserSync.stream());

});
