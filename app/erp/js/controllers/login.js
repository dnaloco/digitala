function LoginController($scope, CsrfFormService, LoginService, $state, $rootScope) {
  // injetando dependência
  'ngInject';

  // ViewModel
  const vm = this;

  vm.login = {};

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
      $state.go('Home');
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
