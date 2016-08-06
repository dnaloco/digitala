function SignupCtrl(RememberMeService, $scope, $timeout, $http) {
  'ngInject';

  const vm = this;

  vm.submit = function () {

  };

  const restUrl = 'http://www.agenciadigitala.local/api/test';

  vm.msgSignin = 'Formulario de Login';
  vm.msgSignup = 'Formulario de Registro';

  console.log('LOGIN CONTROLLER');

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
  name: 'SignupCtrl',
  fn: SignupCtrl
};
