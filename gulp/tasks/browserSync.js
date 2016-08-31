import config      from '../config';
import url         from 'url';
import browserSync from 'browser-sync';
import gulp        from 'gulp';

gulp.task('browserSync', function() {
  //const DEFAULT_FILE = 'index.html';
  //const ASSET_EXTENSION_REGEX = new RegExp(`\\b(?!\\?)\\.(${config.assetExtensions.join('|')})\\b(?!\\.)`, 'i');


  browserSync.init({
    //localOnly: true,
    //proxy:"localhost:3001",
    open: 'external',
    host: 'www.agenciadigitala.local',
    proxy: 'www.agenciadigitala.local',
    port: 8080
    /*server: {
      baseDir: config.buildDir,
      middleware: function(req, res, next) {
        let fileHref = url.parse(req.url).href;

        if ( !ASSET_EXTENSION_REGEX.test(fileHref) ) {
          req.url = '/' + DEFAULT_FILE;
        }

        return next();
      }
    },*/
  	//port: config.browserPort,
  	/*ui: {
    	port: config.UIPort
    },*/
/*    ghostMode: {
      links: false
    }*/
  });

  //gulp.watch(['**/*.html', '**/*.js', '**/*.css']).on('change', browserSync.reload);

});