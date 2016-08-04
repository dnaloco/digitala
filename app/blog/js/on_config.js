function OnConfig($stateProvider, $locationProvider, $urlRouterProvider, $compileProvider) {
  'ngInject';

    console.log('SHIIIIT');

  if (process.env.NODE_ENV === 'production') {
    $compileProvider.debugInfoEnabled(false);
  }

  $locationProvider.html5Mode(true);

  $stateProvider
  .state('Home', {
    url: '/',
    controller: 'ExampleCtrl as home',
    templateUrl: 'home.html',
    title: 'Home'
  })
  .state('NotFound', {
    url: '/nao-encontrada',
    //controller: 'ExampleCtrl as home',
    templateUrl: 'notfound.html',
    title: 'Não Encontrada'
  });

  $urlRouterProvider.otherwise('/nao-encontrada');

}

export default OnConfig;
