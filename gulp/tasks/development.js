import gulp        from 'gulp';
import runSequence from 'run-sequence';

gulp.task('blogDev', ['clean'], function(cb) {

  global.isProd = false;

  runSequence(['blogStyles', 'blogImages', 'blogFonts', 'blogViews'], 'blogBrowserify', 'blogWatch', 'indexFile', cb);

});

gulp.task('siteDev', ['clean'], function(cb) {

  global.isProd = false;

  runSequence(['siteStyles', 'siteImages', 'siteFonts', 'siteViews'], 'siteBrowserify', 'siteWatch', cb);

});
