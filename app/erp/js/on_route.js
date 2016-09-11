function OnRoute(
  $stateProvider
  ) {

  'ngInject';
  
  $stateProvider
  .state('Home', {
    url: '/',
    controller: 'HomeController as home',
    templateUrl: 'pages/home.html',
    title: 'Home'
  })
  .state('Login', {
    url: '/login',
    controller: 'LoginController as login',
    templateUrl: 'pages/login.html',
    title: 'Home'
  });

}


export default OnRoute;