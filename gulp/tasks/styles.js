import config       from '../config';
import gulp         from 'gulp';
import gulpif       from 'gulp-if';
import sourcemaps   from 'gulp-sourcemaps';
import sass         from 'gulp-sass';
import handleErrors from '../util/handleErrors';
import browserSync  from 'browser-sync';
import autoprefixer from 'gulp-autoprefixer';

function styles(src, dest) {
  const createSourcemap = !global.isProd || config.generalStyle.prodSourcemap;

  return gulp.src(config.sourceDir + src)
    .pipe(gulpif(createSourcemap, sourcemaps.init()))
    .pipe(sass({
      sourceComments: !global.isProd,
      outputStyle: global.isProd ? 'compressed' : 'nested',
      includePaths: config.generalStyle.sassIncludePaths
    }))
    .on('error', handleErrors)
    .pipe(autoprefixer({
      browsers: ['last 2 versions', '> 1%', 'ie 8']
    }))
    .pipe(gulpif(
      createSourcemap,
      sourcemaps.write( global.isProd ? './' : null ))
    )
    .pipe(gulp.dest(config.buildDir + dest))
    .pipe(browserSync.stream());
}

gulp.task('blogStyles', function() {
  return styles(config.blog.styles.src, config.blog.styles.dest);
});

gulp.task('siteStyles', function() {
  return styles(config.site.styles.src, config.site.styles.dest);
});

gulp.task('erpStyles', function() {
  return styles(config.erp.styles.src, config.erp.styles.dest);
});

gulp.task('modulesStyles', function() {
  return styles(config.modules.styles.src, config.modules.styles.dest);
});
