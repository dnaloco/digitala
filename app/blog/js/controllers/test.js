function TestCtrl(RememberMeService, $scope, $timeout, $http, ngDialog) {
  'ngInject';

  const vm = this;

  vm.signupModal = function () {
    ngDialog.open({
      template: 'login/signup.html',
      controller: 'SignupCtrl as signup',
      className: 'ngdialog-theme-signup-form ngdialog-theme-default',
    });
  };

  // Signin Controller...

  const restUrl = 'http://www.agenciadigitala.local/api/test';

  $http({
    method: 'GET',
    url: restUrl
  }).then(function successCallback(response) {
    console.log('SUCCESS', response);
    // this callback will be called asynchronously
    // when the response is available
  }, function errorCallback(response) {
    console.log('ERROR', response);
    // called asynchronously if an error occurs
    // or server returns response with an error status.
  });

  var LoginException = function (message) {
    this.message= message;
    this.name = 'Login Exception';
  }

  vm.user = {
    username: null,
    password: null
  };

  vm.rememberMe = false;

  if (RememberMeService.getMyDecision() !== undefined) {
    var user = RememberMeService.getMyDecision();
    vm.user.username = user.username;
    vm.user.password = user.password;
    vm.rememberMe = true;
  }

  var rememberMe = function (data) {
    RememberMeService.myDecision(true, data);
  }

  vm.signin = function () {
    $timeout(function() {
      console.log('Usuário logado');

      var response = {};
      response.success = true;

      response.msg = 'Usuário';

      if (vm.rememberMe) {


        if (vm.user.username === undefined) throw new LoginException("Usuário não informado");
        if (vm.user.password === undefined) throw new LoginException("Senha não informada");

        RememberMeService.myDecision(vm.rememberMe, vm.user);
      } else {
        RememberMeService.myDecision(vm.rememberMe);
      }


    }, 2000);


  };

  /*
  $scope.$watch('test.rememberMe', function (newVal) {
    console.log('CHK rememberMe', newVal);
  });*/
}

export default {
  name: 'TestCtrl',
  fn: TestCtrl
};
