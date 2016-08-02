import config from '../config';
import gulp   from 'gulp';
import del    from 'del';

gulp.task('blogClean', function() {

  return del([config.blog.buildDir]);

});

gulp.task('adminClean', function() {

  return del([config.admin.buildDir]);

});
