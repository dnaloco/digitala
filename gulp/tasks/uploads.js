import gulp        from 'gulp';
import config      from '../config';

gulp.task('uploadsDir', function() {
  return gulp.src('./app/uploads/**')
    .pipe(gulp.dest(config.buildDir + '/uploads/'));

});