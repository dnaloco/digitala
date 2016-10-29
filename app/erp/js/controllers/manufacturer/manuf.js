function ManufacturersController($scope, $modal, ManufacturersService) {
  // injetando dependência
  'ngInject';

  // ViewModel
  const vm = this;

  vm.saveManufacturer = saveManufacturer;

  vm.rowCollection = [];

  vm.savePageTitle = 'Adicionar Novo Fabricante';

  ManufacturersService.getList().then(function (result) {
    vm.rowCollection = result;
    vm.manufacturersColl = [].concat(vm.rowCollection);
  });

  $scope.$watch('manuf.manufacturersColl', function(coll) {
    vm.selectedEntity = null;
    coll.filter(function (row) {
      if (row.isSelected) {
        vm.selectedEntity = row;
        console.log('Selected Row', row);
      }
    });

    if (vm.selectedEntity) {
      vm.savePageTitle = 'Editar Fabricante ID: ' + vm.selectedEntity.id;
    } else {
      vm.savePageTitle = 'Adicionar Novo Fabricante';
    }
  }, true);

  function saveManufacturer (size) {
  	var params = {
  		templateUrl: 'forms/manufacturer/save-manufacturer.html',
  		resolve: {
  			entity: function() {
  				return vm.selectedEntity
  			}
  		},
  		controller: function($scope, $modalInstance, entity) {
  			'ngInject';
  			console.log('Controle para salvar/criar fabricante...');
        console.log('Entity', entity);
        $scope.pageTitle = 'Adicionando Novo Fabricante';
        $scope.newEntity = true;
        if (entity) {
          $scope.newEntity = false;
          $scope.pageTitle = 'Editando Fabricante: ' + entity.company.tradingName;
        }
  		}
  	};

  	if (angular.isDefined(size)) {
  		params.size = size;
  	}

  	var modalInstance = $modal.open(params);

  	modalInstance.result.then(function(entity) {
        //$scope.selected = selectedItem;
    }, function() {
        //$log.info('Modal dismissed at: ' + new Date());
    });
  }

  console.log('ManufacturersController');
}


export default {
  name: 'ManufacturersController',
  fn: ManufacturersController
};
