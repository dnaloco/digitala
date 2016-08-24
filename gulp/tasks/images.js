import config      from '../config';
import changed     from 'gulp-changed';
import gulp        from 'gulp';
import gulpif      from 'gulp-if';
import imagemin    from 'gulp-imagemin';
import browserSync from 'browser-sync';

function images(src, dest) {
    return gulp.src(config.sourceDir + src)
        .pipe(changed(config.buildDir + dest)) // Ignore unchanged files
        .pipe(gulpif(global.isProd, imagemin())) // Optimize
        .pipe(gulp.dest(config.buildDir + dest))
        .pipe(browserSync.stream());
}

gulp.task('blogImages', function() {
  return images(config.blog.images.src, config.blog.images.dest);
});

gulp.task('siteImages', function() {
  return images(config.site.images.src, config.site.images.dest);
});
