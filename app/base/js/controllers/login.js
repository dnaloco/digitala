function LoginController($scope, CsrfFormService, LoginService, $state, $rootScope) {
  // injetando dependência
  'ngInject';

  // ViewModel
  const vm = this;

  vm.login = {};

  console.log('LOGIN CONTROLLER');

  $rootScope.$broadcast('loginPage', true);

  vm.getToken = function(formName, scope) {

    var tokenName = formName + 'Token';

    CsrfFormService.getCsrf(tokenName).then(function (csrfToken) {
      console.log('Form Name', formName);
      scope[tokenName] = csrfToken;
      scope.tokenName = tokenName;
      console.log('FORM TOKEN' , scope[tokenName]);
      $scope[formName][tokenName].$setValidity('required', true);
    });
  }

  vm.testLogin = function () {
    LoginService.post(vm.login).then( function (resp) {
      console.log('Resp login', resp);
      LoginService.setToken(resp.token);

      LoginService.getUserName().then(function (result) {
        console.log('VALOR NOME LOGIN', result.value);
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
