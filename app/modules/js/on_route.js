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
      'leftsidebar': {
        templateUrl: 'layout/left-navbar.html',
        controller: 'NavbarController as navbar'
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
  });

}

export default OnRoute;