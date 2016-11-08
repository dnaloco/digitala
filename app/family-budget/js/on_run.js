function OnRun($rootScope, AppSettings, xdLocalStorage, LoginService, jwtHelper, $state) {
  'ngInject';

  xdLocalStorage.init({
      iframeUrl:'http://www.agenciadigitala.local:80/cross-domain-storage/magical-frame.html'
  }).then(function () {
    console.log('Got iframe ready to ERP');
    $rootScope.iframeLoaded = true;
    //$rootScope.$broadcast('iframeReady');

    LoginService.getToken().then(function(response) {
    console.log('LoginService Verificando token privado response', response);
      if (response.value == null) {
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
