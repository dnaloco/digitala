function HomeController(CityService) {
  // injetando dependência
  'ngInject';

  // ViewModel
  const vm = this;

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
