function HomeController(ngDialog, xdLocalStorage) {
  // injetando dependência
  'ngInject';

  // ViewModel
  const vm = this;

  console.log('HOME CONTROLLER');

  
  //console.log('xdLocalStorage', xdLocalStorage.getItem('teste'));
}


export default {
  name: 'HomeController',
  fn: HomeController
};
