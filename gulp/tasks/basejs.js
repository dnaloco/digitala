import gulp   from 'gulp';
import moduleDependencies from 'gulp-angular-module-dependencies';

gulp.task('baseLibrary', function () {
	return gulp.src('./app/base/js/main.js')
		.pipe(moduleDependencies('erpApp'))
		.pipe(gulp.dest('./build/library'));
});