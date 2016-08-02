import config        from '../config';
import gulp          from 'gulp';
import merge         from 'merge-stream';
import templateCache from 'gulp-angular-templatecache';

// Views task
gulp.task('blogViews', function() {

  // Put our index.html in the dist folder
  const indexFile = gulp.src(config.blog.views.index)
    .pipe(gulp.dest(config.blog.buildDir));

  // Process any other view files from app/views
  const views = gulp.src(config.blog.views.src)
    .pipe(templateCache({
      standalone: true
    }))
    .pipe(gulp.dest(config.blog.views.dest));

  return merge(indexFile, views);

});

gulp.task('adminViews', function() {

  // Put our index.html in the dist folder
  const indexFile = gulp.src(config.admin.views.index)
    .pipe(gulp.dest(config.admin.buildDir));

  // Process any other view files from app/views
  const views = gulp.src(config.admin.views.src)
    .pipe(templateCache({
      standalone: true
    }))
    .pipe(gulp.dest(config.admin.views.dest));

  return merge(indexFile, views);

});
