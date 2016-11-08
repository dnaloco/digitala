function OnRun($rootScope, xdLocalStorage) {
  'ngInject';

  xdLocalStorage.init({
      iframeUrl:'http://www.agenciadigitala.local:80/cross-domain-storage/magical-frame.html'
  }).then(function () {
      console.log('Got iframe ready to site');

      $rootScope.iframeLoaded = true;

  });



}

export default OnRun;
