import config from '../config';
import gulp   from 'gulp';
import eslint from 'gulp-eslint';

gulp.task('blogEslint', () => {
  return gulp.src([config.blog.scripts.src, '!app/blog/js/templates.js', config.blog.scripts.test, config.blog.scripts.gulp])
    .pipe(eslint())
    .pipe(eslint.format())
    .pipe(eslint.failAfterError());
});
