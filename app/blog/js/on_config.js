function OnConfig(
  $stateProvider,
  $locationProvider,
  $urlRouterProvider,
  $compileProvider,
  $httpProvider,
  jwtInterceptorProvider) {

  'ngInject';

  jwtInterceptorProvider.tokenGetter = ['jwtHelper', '$http', function(jwtHelper, $http) {
    var idToken = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczovL3NhbXBsZXMuYXV0aDAuY29tLyIsInN1YiI6ImZhY2Vib29rfDEwMTU0Mjg3MDI3NTEwMzAyIiwiYXVkIjoiQlVJSlNXOXg2MHNJSEJ3OEtkOUVtQ2JqOGVESUZ4REMiLCJleHAiOjE0MTIyMzQ3MzAsImlhdCI6MTQxMjE5ODczMH0.7M5sAV50fF1-_h9qVbdSgqAnXVF7mz3I6RjS6JiH0H8';
    var refreshToken = localStorage.getItem('refresh_token');
    if (jwtHelper.isTokenExpired(idToken)) {
      // This is a promise of a JWT id_token
      return $http({
        url: 'http://www.agenciadigitala.local/api/test',
        // This makes it so that this request doesn't send the JWT
        skipAuthorization: true,
        method: 'POST',
        data: {
            grant_type: 'refresh_token',
            refresh_token: refreshToken
        }
      }).then(function(response) {
        console.log('RESPONSE', response);
        var id_token = response.data.id_token;
        localStorage.setItem('id_token', id_token);
        return id_token;
      });
    } else {
      return idToken;
    }
  }];

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

  $urlRouterProvider.otherwise('/nao-encontrada');

}

export default OnConfig;
