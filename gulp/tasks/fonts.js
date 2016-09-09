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

gulp.task('fonts', function() {
  return fonts(config.fonts.src, config.fonts.dest);
});
