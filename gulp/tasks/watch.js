import config from '../config';
import gulp   from 'gulp';

gulp.task('blogWatch', ['blogBrowserSync'], function() {

  global.isWatching = true;

  // Scripts are automatically watched and rebundled by Watchify inside Browserify task
  gulp.watch(config.blog.scripts.src, ['blogEslint']);
  gulp.watch(config.blog.styles.src,  ['blogStyles']);
  gulp.watch(config.blog.images.src,  ['blogImages']);
  gulp.watch(config.blog.fonts.src,   ['blogFonts']);
  gulp.watch(config.blog.views.watch, ['blogViews']);

});

gulp.task('adminWatch', ['adminBrowserSync'], function() {

  global.isWatching = true;

  // Scripts are automatically watched and rebundled by Watchify inside Browserify task
  gulp.watch(config.admin.scripts.src, ['eslint']);
  gulp.watch(config.admin.styles.src,  ['styles']);
  gulp.watch(config.admin.images.src,  ['images']);
  gulp.watch(config.admin.fonts.src,   ['fonts']);
  gulp.watch(config.admin.views.watch, ['views']);

});
