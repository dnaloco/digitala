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
  .state('Cadastro', {
    url: '/cadastro',
    controller: 'TestFullsignupController as signup',
    templateUrl: 'pages/fullsignup.html',
    title: 'Cadastro Teste'
  })
  .state('Tabela', {
    url: '/tabela',
    controller: 'TestTabelaController as tabela',
    templateUrl: 'pages/tabela.html',
    title: 'Tabela Teste'
  });

}


export default OnRoute;