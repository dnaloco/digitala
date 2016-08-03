function ExampleCtrl() {

  // ViewModel
  const vm = this;

  vm.title = 'AngularJS, Gulp, and Browserify! Written with keyboards and love!';
  vm.number = 1234;

  vm.mensagem = 'ISSO É UM TESTE';

  vm.teste = function() {
    console.log('ISSO É UM TESTE');
  }
}

export default {
  name: 'ExampleCtrl',
  fn: ExampleCtrl
};
