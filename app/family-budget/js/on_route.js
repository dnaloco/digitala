function OnRoute(
  $stateProvider
  ) {

  'ngInject';

  $stateProvider
  .state('Home', {
    url: '/',
    views: {
      'header': {
        templateUrl: 'layout/header.html'
      },
      'middlecontent': {
        templateUrl: 'layout/home.html',
        controller: 'HomeController as home'
      },
      'footer':{
        templateUrl: 'layout/footer.html',
        controller: 'FooterController as footer'
      }
    },
    title: 'Home'
  })
  .state('Login', {
    url: '/login',
    views: {
        'header@': {
          template: ''
        },
        'footer@': {
          template: ''
        },
        'middlecontent@': {
            templateUrl: 'pages/login.html',
            controller: 'LoginController as login',
        }
    },
    title: 'Login'
  });

}

export default OnRoute;