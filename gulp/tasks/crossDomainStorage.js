import config         from '../config';
import gulp           from 'gulp';
import merge          from 'merge-stream';
import templateCache  from 'gulp-angular-templatecache';
import rename         from 'gulp-rename';

function crossDomainStorage() {
  gulp.src('./app/cross-domain-storage/**/*')
      .pipe(gulp.dest('./build/cross-domain-storage'));
}


gulp.task('crossDomainStorage', function() {
  return crossDomainStorage();
});


