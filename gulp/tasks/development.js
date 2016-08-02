import gulp        from 'gulp';
import runSequence from 'run-sequence';

gulp.task('blogDev', ['blogClean'], function(cb) {

  global.isProd = false;

  runSequence(['blogStyles', 'blogImages', 'blogFonts', 'blogViews'], 'blogBrowserify', 'blogWatch', cb);

});

gulp.task('adminDev', ['adminClean'], function(cb) {

  global.isProd = false;

  runSequence(['adminStyles', 'adminImages', 'adminFonts', 'adminViews'], 'adminBrowserify', 'adminWatch', cb);

});
