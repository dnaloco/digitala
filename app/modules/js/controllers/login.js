function LoginController(
  $scope, CsrfFormService, LoginService, $state, $rootScope, $facebook) {
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


  $scope.login = function() {
      // From now on you can use the Facebook service just as Facebook api says
      $facebook.api("/").then( 
      function(response) {
        console.log('facebook RESPONSE', response);
        $scope.welcomeMsg = "Welcome " + response.name;
      },
      function(err) {
        console.log('facebook ERROR', err);
        $scope.welcomeMsg = "Please log in";
      });
    };


}


export default {
  name: 'LoginController',
  fn: LoginController
};
