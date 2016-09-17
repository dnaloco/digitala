function HomeController($scope, ModulesService, $rootScope) {
  // injetando dependência
  'ngInject';

  // ViewModel
  const vm = this;

  $rootScope.$on('iframeReady', function () {
    ModulesService.getModules().then(function (modules) {
        vm.modules = modules;
        console.log('modules', modules);
    }, function (error) {
      console.error('ERROR', error);
    });
  });

  
}


export default {
  name: 'HomeController',
  fn: HomeController
};
