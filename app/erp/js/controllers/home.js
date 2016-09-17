function HomeController(
  $scope,
  CityService,
  StateService,
  CsrfFormService,
  UserService,
  LoginService,
  xdLocalStorage,
  $rootScope) {
  // injetando dependência
  'ngInject';

  // ViewModel
  const vm = this;

  /*$rootScope.$on('crossDomainIFrame', function () {
    console.log('crossDomainIFramecrossDomainIFramecrossDomainIFramecrossDomainIFramecrossDomainIFrame');
    xdLocalStorage.setItem('teste', 'Esse é um teste de cross domain');
  })
*/
/*  xdLocalStorage.setItem('teste', 'Esse é um teste de cross domain', function (data) {
          if(data.success) {
              console.log('Your data has been successfully stored.');
          } else {
              console.log('Ops, could not store your data.');
          }
      });*/

  vm.user = {
    person: {
      gender: 'male'
    }
  };

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

  vm.testFormUser = function () {
    console.log('Enviando usuário ->', vm.user);
    UserService.saveUser(vm.user).then(function(resp) {
      console.log('USER ', resp);
    }, function(error) {
      console.log('User ERROR ', error);
    });
  };

  vm.testLogin = function () {
    LoginService.post(vm.login).then( function (resp) {
      console.log('Resp login', resp);
      LoginService.setToken(resp.token);
    }, function (error) {
      console.log('login ERROR ', error);
    })
  }

  vm.callCities = function () {
    CityService.getCities({
      'limit': 10,
      'offset': 0,
      'where[]': [],
      'options[]': []
    }).then(function (cities) {
        vm.cities = cities;
        console.log('CIDADES', cities);
    }, function (error) {
      console.error('ERROR', error);
    });
  };

  vm.callPrivateStates = function () {
    StateService.getStates({
      'limit': 10,
      'offset': 0,
      'where[]': [],
      'options[]': []
    }).then(function (states) {
        vm.states = states;
        console.log('STATES', states);
    }, function (error) {
      console.error('ERROR', error);
    });
  };
}


export default {
  name: 'HomeController',
  fn: HomeController
};
