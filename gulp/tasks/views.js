import config         from '../config';
import gulp           from 'gulp';
import merge          from 'merge-stream';
import templateCache  from 'gulp-angular-templatecache';
import rename         from 'gulp-rename';

function views(index, src, dest, layout) {
  console.log('IS PROD', global.isProd);
  // Put our index.html in the dist folder
  const indexFile = gulp.src(config.sourceDir + index)
      .pipe(rename(layout))
      .pipe(gulp.dest(config.php.layout.site));

  // Process any other view files from app/views
  const views = gulp.src(config.sourceDir + src)
    .pipe(templateCache({
      standalone: true
    }))
    .pipe(gulp.dest(config.sourceDir + dest));

  return merge(indexFile, views);
}


gulp.task('blogViews', function() {

  return views(config.blog.views.index, config.blog.views.src, config.blog.views.dest);
});

gulp.task('siteViews', function() {

  return views(config.site.layout.site01.src, config.site.views.src, config.site.views.dest, config.site.layout.site01.phpLayout);
});

