import config      from '../config';
import url         from 'url';
import browserSync from 'browser-sync';
import gulp        from 'gulp';

function browserSyncSubdomain(subdomain) {
  browserSync.init({
    open: 'external',
    host: subdomain + '.agenciadigitala.local',
    proxy: subdomain + '.agenciadigitala.local',
    port: 8080
  });
}

gulp.task('browserSite', function() {
  return browserSyncSubdomain('www');
});

gulp.task('browserErp', function() {
  return browserSyncSubdomain('erp');
});
