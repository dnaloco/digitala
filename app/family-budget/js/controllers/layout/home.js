function HomeController($scope, FBCategoriesService) {
  // injetando dependência
  'ngInject';

  // ViewModel
  const vm = this;

  

  vm.collection = [
    {
      title: '[TÍTULO DA CATEGORIA]',
      topContent: '[TOP CONTENT]',
      bottomContent: '[BOTTOM CONTENT]',
      subCollection: []
    },
    {
      title: '[TÍTULO DA CATEGORIA]',
      topContent: '[TOP CONTENT]',
      bottomContent: '[BOTTOM CONTENT]',
      subCollection: []
    },
    {
      title: '[TÍTULO DA CATEGORIA]',
      topContent: '[TOP CONTENT]',
      bottomContent: '[BOTTOM CONTENT]',
      subCollection: []
    }
  ];

  vm.meses = [
    'Janeiro',
    'Fevereiro',
    'Março',
    'Abril',
    'Maio',
    'Junho',
    'Julho',
    'Agosto',
    'Setembro',
    'Outubro',
    'Novembro',
    'Dezembro'
  ];

  vm.selectedMonth = new Date();

  vm.monthTitle = null;

  function updateBillings(year, month, type) {
    console.log('YEAR', year);
    console.log('MONTH', month + 1);
    FBCategoriesService.getList({
          'selectYearMonth': true,
          'year': year,
          'month': month + 1,
          'type': type
      }).then(function (response) {
          console.log('Faturas de ' + type, response);
          switch(type) {
            case 'expense':
              console.log('DESPESAS...');
              vm.expenseCollection = response;
              break;
            case 'income':
              console.log('RECEITAS...');
              vm.incomeCollection = response;
              break;
          }
      });
  }

  $scope.$watch('home.selectedMonth', function (val) {
    console.log('VALOR DATA', val);

    if (val) {
      var selectedDate = new Date(val);

      updateBillings(selectedDate.getFullYear(), selectedDate.getMonth(), 'income');
      updateBillings(selectedDate.getFullYear(), selectedDate.getMonth(), 'expense');

      vm.monthTitle = vm.meses[selectedDate.getMonth()];
    }
  })


  vm.monthChanged = function (date) {
    console.log('VAL', date)
  }


  vm.cliquei = function () {
    window.alert('Fui clicado!');
  }
}




export default {
  name: 'HomeController',
  fn: HomeController
};
