function LoginController($scope, CsrfFormService, LoginService, $state, $rootScope) {
  // injetando dependência
  'ngInject';

  // ViewModel
  const vm = this;

  vm.login = {};

  $rootScope.$broadcast('loginPage', true);

  vm.getToken = function(formName, scope) {

    var tokenName = formName + 'Token';

    CsrfFormService.getCsrf(tokenName).then(function (csrfToken) {
      scope[tokenName] = csrfToken;
      scope.tokenName = tokenName;
      $scope[formName][tokenName].$setValidity('required', true);
    });
  }

  vm.testLogin = function () {
    LoginService.post(vm.login).then( function (resp) {
      LoginService.setToken(resp.token);

      LoginService.getUserName().then(function (result) {

        $state.go('Home', {}, {reload: true});
        $rootScope.$broadcast('refreshPage', true);
      })

      $rootScope.$broadcast('isLogged');
    }, function (error) {
      console.log('login ERROR ', error);
    })
  }

}


export default {
  name: 'LoginController',
  fn: LoginController
};
