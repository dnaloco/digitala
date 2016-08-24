function OnConfig(
  $stateProvider,
  $locationProvider,
  $urlRouterProvider,
  $compileProvider,
  $httpProvider,
  jwtInterceptorProvider) {

  'ngInject';

  jwtInterceptorProvider.tokenGetter = ['config', function(config) {
    var patt = new RegExp("/api/");
    if (config.url.substr(config.url.length - 5) == '.html' || !patt.test(config.url)) {
      return null;
    }
    return localStorage.getItem('JWT');
  }];

  $httpProvider.interceptors.push('RestInterceptor');
  $httpProvider.interceptors.push('jwtInterceptor');



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
  .state('Teste', {
    url: '/teste',
    controller: 'TestCtrl as test',
    templateUrl: 'test.html',
    title: 'Test View'
  })
  .state('NotFound', {
    url: '/nao-encontrada',
    //controller: 'ExampleCtrl as home',
    templateUrl: 'notfound.html',
    title: 'Não Encontrada'
  });

  //$urlRouterProvider.otherwise('/nao-encontrada');

}

export default OnConfig;
