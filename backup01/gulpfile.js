'use strict';

var gulp = require('gulp'),
	clean = require('gulp-clean'),
	browserify = require('gulp-browserify'),
	concat = require('gulp-concat');
//import yaml     	from 'js-yaml';

/*function loadConfig () {
	let ymlFile = fs.readFileSync('config.yml', 'utf8');
	return yaml.load(ymlFile);
}*/

gulp.task('clean', function () {
	gulp.src('public/build/*')
		.pipe(clean({force: true}));
	gulp.src('public/dist/*')
		.pipe(clean({force: true}));
});

gulp.task('browserify', function () {
	gulp.src(['public/src/js/blog/main.js'])
		.pipe(browserify({
			insertGlobals: true,
			debug: true
		}))
		.pipe(concat('bundled.js'))
		.pipe(gulp.dest('public/dist/js/blog/'));
});