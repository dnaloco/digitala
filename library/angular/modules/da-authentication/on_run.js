function OnRun($rootScope, AppSettings, xdLocalStorage) {
  'ngInject';

  xdLocalStorage.init({
      iframeUrl:'http://www.agenciadigitala.local:80/cross-domain-storage/magical-frame.html'
  }).then(function () {
    console.log('Got iframe ready');
  });
}

export default OnRun;
