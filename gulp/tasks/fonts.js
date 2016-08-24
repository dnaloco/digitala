import config      from '../config';
import changed     from 'gulp-changed';
import gulp        from 'gulp';
import browserSync from 'browser-sync';

function fonts(src, dest) {
	return gulp.src(config.sourceDir + src)
    .pipe(changed(config.buildDir + dest)) // Ignore unchanged files
    .pipe(gulp.dest(config.buildDir + dest))
    .pipe(browserSync.stream());
}

gulp.task('blogFonts', function() {
  return fonts(config.blog.fonts.src, config.blog.fonts.dest);
});

gulp.task('siteFonts', function() {
  return fonts(config.site.fonts.src, config.site.fonts.dest);
});
