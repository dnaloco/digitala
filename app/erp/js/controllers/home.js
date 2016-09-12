function HomeController(CityService, CsrfFormService, Restangular) {
  // injetando dependência
  'ngInject';

  // ViewModel
  const vm = this;

  vm.user = {};

  vm.testeForm = function () {
    CsrfFormService.getCsrf('signupForm').then(function (csrfToken) {
    console.log(csrfToken);
    vm.user.formName = 'signupForm';
    vm.user.formToken = csrfToken;

    Restangular.all('public/users').post(vm.user).then(function(resp) {
          console.log('USER ', resp);
      }, function(error) {
          console.log('User ERROR ', error);
      });
    });
  };

  vm.callCities = function () {
    CityService.getList({
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

  console.log('ERP HOME CONTROLLER');
}


export default {
  name: 'HomeController',
  fn: HomeController
};
