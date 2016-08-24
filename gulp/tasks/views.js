import config        from '../config';
import gulp          from 'gulp';
import merge         from 'merge-stream';
import templateCache from 'gulp-angular-templatecache';



function views(index, src, dest) {
  console.log('IS PROD', global.isProd);
  // Put our index.html in the dist folder
  

  // Process any other view files from app/views
  const views = gulp.src(config.sourceDir + src)
    .pipe(templateCache({
      standalone: true
    }))
    .pipe(gulp.dest(config.buildDir + dest));

  if (global.isProd) {
    return views;

  } else {
    const indexFile = gulp.src(config.sourceDir + index)
      .pipe(gulp.dest(config.buildDir));
    return merge(indexFile, views);
  }
}


gulp.task('blogViews', function() {

  return views(config.blog.views.index, config.blog.views.src, config.blog.views.dest);
});

gulp.task('siteViews', function() {

  return views(config.site.views.index, config.site.views.src, config.site.views.dest);
});

