import gulp        from 'gulp';
import runSequence from 'run-sequence';

gulp.task('prod', ['clean'], function(cb) {

  cb = cb || function() {};

  global.isProd = true;

  runSequence(
  	['blogStyles', 'blogImages', 'blogFonts', 'blogViews'],
  	'blogBrowserify',
  	['siteStyles', 'siteImages', 'siteFonts', 'siteViews'],
  	'siteBrowserify',
  	'indexFile', 'gzip', cb);

});