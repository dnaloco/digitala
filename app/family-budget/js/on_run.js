function OnRun($rootScope, AppSettings, xdLocalStorage, LoginService, jwtHelper, $state) {
  'ngInject';

  xdLocalStorage.init({
      iframeUrl:'http://www.agenciadigitala.local:80/cross-domain-storage/magical-frame.html'
  }).then(function () {
    $rootScope.iframeLoaded = true;
    //$rootScope.$broadcast('iframeReady');

    LoginService.getToken().then(function(response) {
      if (response.value === undefined) {
        $state.go('Login');
        return;
      }


      if (response.value === null) {
        $state.go('Login');
        return;
      }

      if (jwtHelper.isTokenExpired(response.value)) {
        $state.go('Login');
        return;
      }

    });

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
