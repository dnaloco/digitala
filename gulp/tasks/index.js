import gulp        from 'gulp';
import config      from '../config';

gulp.task('indexFile', function() {
  return gulp.src(config.indexFile)
    .pipe(gulp.dest(config.buildDir));

});