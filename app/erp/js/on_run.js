function OnRun($rootScope, AppSettings, xdLocalStorage) {
  'ngInject';

  xdLocalStorage.init({
      iframeUrl:'http://www.agenciadigitala.local:80/cross-domain-storage/magical-frame.html'
  }).then(function () {
    console.log('Got iframe ready to erp');
  });

  // change page title based on state
  $rootScope.$on('$stateChangeSuccess', (event, toState) => {
    $rootScope.pageTitle = '';

    if (toState.title) {
      $rootScope.pageTitle += toState.title;
      $rootScope.pageTitle += ' \u2014 '; //
    }

    $rootScope.pageTitle += AppSettings.appTitle;
  });

}

export default OnRun;
