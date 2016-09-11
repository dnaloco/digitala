import gulp        from 'gulp';
import runSequence from 'run-sequence';

gulp.task('siteDev', ['clean'], function(cb) {

  global.isProd = false;

  runSequence(['siteStyles', 'siteImages', 'siteViews', 'siteBrowserify'], 'fonts', 'indexFile', 'uploadsDir', 'siteWatch', cb);

});

gulp.task('erpDev', ['clean'], function(cb) {

  global.isProd = false;

  runSequence(['erpStyles', 'erpImages', 'erpViews'], 'erpBrowserify', 'fonts', 'indexFile', 'uploadsDir', 'erpWatch', cb);

});