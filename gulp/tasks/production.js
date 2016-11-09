import gulp        from 'gulp';
import runSequence from 'run-sequence';

gulp.task('prod', ['clean'], function(cb) {

  cb = cb || function() {};

  global.isProd = true;

  runSequence(
  	'crossDomainStorage',
  	['erpStyles', 'erpImages', 'erpViews'],
  	'erpBrowserify',
  	['siteStyles', 'siteImages', 'siteViews'],
  	'siteBrowserify',
  	['modulesStyles', 'modulesImages', 'modulesViews'],
    'modulesBrowserify',
  	'fonts', 'indexFile', 'uploadsDir', 'gzip', cb);

/*  runSequence(
  	['siteStyles', 'siteImages', 'siteFonts', 'siteViews'],
  	'siteBrowserify',
  	'indexFile', 'gzip', cb);*/

});

gulp.task('fbProd', ['clean'], function(cb) {

  cb = cb || function() {};

  global.isProd = true;

  runSequence(
    'crossDomainStorage',
    'baseStyles',
    ['fbStyles', 'fbImages', 'fbViews'],
    'fbBrowserify',
    'fonts', 'fontsWatch', 'indexFile', 'uploadsDir', 'gzip', cb);

/*  runSequence(
    ['siteStyles', 'siteImages', 'siteFonts', 'siteViews'],
    'siteBrowserify',
    'indexFile', 'gzip', cb);*/

});
