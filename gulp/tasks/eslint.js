import config from '../config';
import gulp   from 'gulp';
import eslint from 'gulp-eslint';

function scriptEslint(src, test) {
	console.log('ESLINT TASK');
	return gulp.src([config.sourceDir + src, '!app/' + src + '/templates.js', test, config.gulpDir])
    .pipe(eslint())
    .pipe(eslint.format())
    .pipe(eslint.failAfterError());
}

gulp.task('blogEslint', function() {
  return scriptEslint(config.blog.scripts.src, config.blog.scripts.test);
});

gulp.task('siteEslint', function() {
  return scriptEslint(config.site.scripts.src, config.site.scripts.test);
});

gulp.task('erpEslint', function() {
  return scriptEslint(config.erp.scripts.src, config.erp.scripts.test);
});