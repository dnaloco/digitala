import gulp        from 'gulp';
import runSequence from 'run-sequence';

gulp.task('prod', ['clean'], function(cb) {

  cb = cb || function() {};

  global.isProd = true;

  runSequence(
  	['erpStyles', 'erpImages', 'erpViews'],
  	'erpBrowserify',
  	'fonts', 'indexFile', 'uploadsDir', 'gzip', cb);

/*  runSequence(
  	['siteStyles', 'siteImages', 'siteFonts', 'siteViews'],
  	'siteBrowserify',
  	'indexFile', 'gzip', cb);*/

});
