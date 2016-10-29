import config from '../config';
import gulp   from 'gulp';
import mainBowerFiles from 'main-bower-files';
//import bowerOverrides from 'gulp-bower-overrides';
import plugins from 'gulp-load-plugins';

gulp.task('bowerFiles', function() {

gulp.src(mainBowerFiles())
        .pipe(gulp.dest('./build/bower_components'));

/*gulp.src('./bower.json')
    .pipe(bowerOverrides())
    .pipe(gulp.dest('./build/bower_components'));*/
 /*gulp.src(mainBowerFiles())
        .pipe(gulp.dest('./build/bower_components'));*/

 //gulp.pipe(plugins.inject(bower, {relative: true, name: 'bower'}))

});

