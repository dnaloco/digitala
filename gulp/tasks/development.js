import gulp        from 'gulp';
import runSequence from 'run-sequence';

gulp.task('siteDev', ['clean'], function(cb) {

  global.isProd = false;

  runSequence(
  	['siteStyles', 'siteImages', 'siteViews'],
  	'siteBrowserify',
  	'fonts', 'indexFile', 'uploadsDir', 'siteWatch', cb);

});

gulp.task('erpDev', ['clean'], function(cb) {

  global.isProd = false;

  runSequence(
    'crossDomainStorage',
    ['erpStyles', 'erpImages', 'erpViews'],
  	'erpBrowserify',
  	'fonts', 'indexFile', 'uploadsDir', 'erpWatch', cb);

});

gulp.task('modulesDev', ['clean'], function(cb) {

  global.isProd = false;

  runSequence(
    'crossDomainStorage',
    ['modulesStyles', 'modulesImages', 'modulesViews'],
    'modulesBrowserify',
    'fonts', 'indexFile', 'uploadsDir', 'modulesWatch', cb);

});

gulp.task('dev', ['clean'], function(cb) {
	global.isProd = false;

  runSequence(
    'crossDomainStorage',
  	['erpStyles', 'erpImages', 'erpViews'],
  	'erpBrowserify',
  	['siteStyles', 'siteImages', 'siteViews'],
  	'siteBrowserify',
    ['modulesStyles', 'modulesImages', 'modulesViews'],
    'modulesBrowserify',
  	'fonts', 'indexFile', 'uploadsDir',
    'erpWatch',
    'siteWatch',
    'modulesWatch',
    cb);
})