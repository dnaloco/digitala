import gulp        from 'gulp';
import runSequence from 'run-sequence';

gulp.task('blogProd', ['blogClean'], function(cb) {

  cb = cb || function() {};

  global.isProd = true;

  runSequence(['blogStyles', 'blogImages', 'blogFonts', 'blogViews'], 'blogBrowserify', 'gzip', cb);

});

gulp.task('adminProd', ['blogClean'], function(cb) {

  cb = cb || function() {};

  global.isProd = true;

  runSequence(['adminStyles', 'adminImages', 'adminFonts', 'adminViews'], 'adminBrowserify', 'gzip', cb);

});
