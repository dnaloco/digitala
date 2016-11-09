function OnRun($rootScope, xdLocalStorage) {
  'ngInject';

  xdLocalStorage.init({
      iframeUrl:'http://www.agenciadigitala.local:80/cross-domain-storage/magical-frame.html'
  }).then(function () {

      $rootScope.iframeLoaded = true;

  });



}

export default OnRun;
