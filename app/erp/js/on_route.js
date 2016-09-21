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
  })
  .state('Login', {
    url: '/login',
    views: {
        'middlecontent@': {
            templateUrl: 'pages/login.html',
            controller: 'LoginController as login',
        }
    },
    title: 'Login'
  })
  .state('Produtos', {
    url: '/produtos',
    views: {
        'middlecontent@': {
            templateUrl: 'pages/products/home.html',
            controller: 'HomeProductsController as home',
        },
    },
    title: 'Produtos'
  })
  .state('Produtos.novo', {
    url: '/novo',
    views: {
        'new@Produtos': {
            templateUrl: 'pages/products/new.html',
            controller: 'NewProductController as new',
        },
    },
    title: 'Novo Produto'
  });

}

export default OnRoute;