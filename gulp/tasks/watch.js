import config from '../config';
import gulp   from 'gulp';
import browserSync from 'browser-sync';


function watch(app, scriptsSrc, stylesSrc, imagesSrc, viewsWatch) {
	console.log('WATCH TASK');
	global.isWatching = true;
  // Scripts are automatically watched and rebundled by Watchify inside Browserify task
  gulp.watch(config.sourceDir + scriptsSrc, [app + 'Eslint']);
  gulp.watch(config.sourceDir + stylesSrc,  [app + 'Styles']);
  gulp.watch(config.sourceDir + imagesSrc,  [app + 'Images']);
  gulp.watch(viewsWatch, [app + 'Views']);
}

gulp.task('blogWatch', ['browserBlog'], function() {
  	return watch('blog', config.blog.scripts.src, config.blog.styles.src, config.blog.images.src, config.blog.fonts.src, config.blog.views.watch);
});

gulp.task('siteWatch', ['siteBrowser'], function() {
  	return watch('site',
      config.site.scripts.src,
      config.site.styles.src,
      config.site.images.src,
      config.site.views.watch);
});

gulp.task('erpWatch', ['erpBrowser'], function() {
    return watch('erp',
      config.erp.scripts.src,
      config.erp.styles.src,
      config.erp.images.src,
      config.erp.views.watch);
});

gulp.task('modulesWatch', ['modulesBrowser'], function() {
    return watch('modules',
      config.modules.scripts.src,
      config.modules.styles.src,
      config.modules.images.src,
      config.modules.views.watch);
});