function OnRoute(
  $stateProvider
  ) {

  'ngInject';
  
  $stateProvider
  .state('Home', {
    url: '/',
    views: {
      'header': {
        templateUrl: 'layout/header.html',
        controller: 'HeaderController as header'
      },
      'banner': {
        templateUrl: 'layout/banner.html',
        controller: 'BannerController as banner'
      },
      'content': {
        templateUrl: 'layout/home.html',
        controller: 'HomeController as home'
      },
      'sidebar': {
        templateUrl: 'layout/sidebar.html',
        controller: 'SidebarController as sidebar'
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
        'content@': {
            templateUrl: 'pages/login.html',
            controller: 'LoginController as login',
        }
    },
    title: 'Login'
  });

}


export default OnRoute;