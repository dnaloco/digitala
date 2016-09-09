function HomeController(ngDialog, CityService) {
  // injetando dependência
  'ngInject';

  // ViewModel
  const vm = this;

  CityService.getList({
        'limit': 10,
        'offset': 0,
        'where[]': [],
        'options[]': []
    }).then(function (response) {
        console.log('CITIES', response);
    });
  console.log('ERP HOME CONTROLLER');
}


export default {
  name: 'HomeController',
  fn: HomeController
};
