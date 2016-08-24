console.log('HELLO');
function ExampleCtrl(ngDialog, RememberMeService) {
  'ngInject';
  // ViewModel
  const vm = this;

  vm.title = 'AngularJS, Gulp, and Browserify! Written with keyboards and love!';
  vm.number = 1234;

  vm.mensagem = 'ISSO É UM TESTE';

  vm.alerts = [
    { type: 'alert', msg: 'Oh snap! Change a few things up and try submitting again.' },
    { type: 'success round', msg: 'Well done! You successfully read this important alert message.' }
  ];

  vm.addAlert = function() {
    vm.alerts.push({type: 'alert', msg: "Another alert!"});
  };

  vm.closeAlert = function(index) {
    vm.alerts.splice(index, 1);
  };

  vm.teste = function() {
    console.log('ISSO É UM TESTE');
  }



  //ngDialog.open({ template: 'partials/popup.html', className: 'ngdialog-theme-default' });
}

export default {
  name: 'ExampleCtrl',
  fn: ExampleCtrl
};
