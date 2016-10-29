import gulp        from 'gulp';
import runSequence from 'run-sequence';

gulp.task('siteDev', ['clean'], function(cb) {

  global.isProd = false;

  runSequence(
    'crossDomainStorage',
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
  	'fonts', 'fontsWatch', 'indexFile', 'uploadsDir', 'erpWatch', cb);

});

gulp.task('modulesDev', ['clean'], function(cb) {

  global.isProd = false;

  runSequence(
    'crossDomainStorage',
    ['baseStyles', 'baseImages', 'baseViews'],
    'baseBrowserify',
    ['modulesStyles', 'modulesImages', 'modulesViews'],
    'modulesBrowserify',
    'fonts', 'indexFile', 'uploadsDir', 'baseWatch', 'modulesWatch', cb);

});

gulp.task('dev', ['clean'], function(cb) {
	global.isProd = false;

  runSequence(
    'crossDomainStorage',
  	['erpStyles', 'erpImages', 'erpViews'],
  	'erpBrowserify',
    ['modulesStyles', 'modulesImages', 'modulesViews'],
    'modulesBrowserify',
  	'fonts', 'indexFile', 'uploadsDir',
    'erpWatch',
    'modulesWatch',
    cb);
})