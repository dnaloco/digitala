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

gulp.task('siteBrowser', function() {
  return browserSyncSubdomain('www');
});


gulp.task('erpBrowser', function() {
  return browserSyncSubdomain('erp');
});

gulp.task('modulesBrowser', function() {
  return browserSyncSubdomain('modules');
});

gulp.task('fbBrowser', function() {
  return browserSyncSubdomain('budget');
});
