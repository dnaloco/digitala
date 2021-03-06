import config         from '../config';
import gulp           from 'gulp';
import merge          from 'merge-stream';
import templateCache  from 'gulp-angular-templatecache';
import rename         from 'gulp-rename';

function views(index, src, dest, layoutSrc, layoutDest) {
  const indexFile = gulp.src(config.sourceDir + index)
      .pipe(rename(layoutSrc))
      .pipe(gulp.dest(layoutDest));

  // Process any other view files from app/views
  const views = gulp.src([
      config.sourceDir + src,
      config.sourceDir + config.base.views.src
    ])
    .pipe(templateCache({
      standalone: true
    }))
    .pipe(gulp.dest(config.sourceDir + dest));

  var merged = merge(indexFile, views);

  /*const baseViews = gulp.src(config.sourceDir + config.base.views.src)
    .pipe(templateCache({
      standalone: true
    }))
    .pipe(gulp.dest(config.sourceDir + dest));

  merged.add(baseViews);*/

  return merged;
}

gulp.task('blogViews', function() {

  return views(
    config.blog.views.index, 
    config.blog.views.src, 
    config.blog.views.dest);
});

gulp.task('siteViews', function() {

  return views(
    config.site.layout.src,
    config.site.views.src,
    config.site.views.dest,
    config.site.layout.phpLayout,
    config.php.layout.site);
});

gulp.task('erpViews', function() {

  return views(
    config.erp.layout.src,
    config.erp.views.src,
    config.erp.views.dest,
    config.erp.layout.phpLayout,
    config.php.layout.erp);
});

gulp.task('modulesViews', function() {

  return views(
    config.modules.layout.src,
    config.modules.views.src,
    config.modules.views.dest,
    config.modules.layout.phpLayout,
    config.php.layout.modules);
});

gulp.task('fbViews', function() {

  return views(
    config.fb.layout.src,
    config.fb.views.src,
    config.fb.views.dest,
    config.fb.layout.phpLayout,
    config.php.layout.fb);
});

