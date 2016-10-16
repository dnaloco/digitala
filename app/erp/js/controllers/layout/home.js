function HomeController($scope, $rootScope, $modal, $log) {
  // injetando dependência
  'ngInject';

  // ViewModel
  const vm = this;

  console.log('HOME CONTROLLER');

  vm.open = open;

    function open(size, backdrop, itemCount, closeOnClick) {

        vm.items = [];

        var count = itemCount || 3;

        for(var i = 0; i < count; i++){
            vm.items.push('item ' + i);
        }

        var params = {
            templateUrl: 'modals/modalTest.html',
            resolve: {
                items: function() {
                    return vm.items;
                },
            },
            controller: function($scope, $modalInstance, items) {
            	'ngInject';
                $scope.items = items;
                $scope.selected = {
                    item: $scope.items[0],
                };

                $scope.reposition = function() {
                    $modalInstance.reposition();
                };

                $scope.ok = function() {
                    $modalInstance.close($scope.selected.item);
                };

                $scope.cancel = function() {
                    $modalInstance.dismiss('cancel');
                };

                $scope.openNested = function() {
                    open();
                };
            }
        };

        if(angular.isDefined(closeOnClick)){
            params.closeOnClick = closeOnClick;
        }

        if(angular.isDefined(size)){
            params.size = size;
        }

        if(angular.isDefined(backdrop)){
            params.backdrop = backdrop;
        }

        var modalInstance = $modal.open(params);

        modalInstance.result.then(function(selectedItem) {
            vm.selected = selectedItem;
        }, function() {
            $log.info('Modal dismissed at: ' + new Date());
        });
    };

  vm.items = [
    "The first choice!",
    "And another choice for you.",
    "but wait! A third!"
  ];
  vm.linkItems = {
    "Google": "http://google.com",
    "AltaVista": "http://altavista.com"
  };

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

  vm.oneAtATime = true;

    vm.groups = [{
        title: "Dynamic Group Header - 1",
        content: "Dynamic Group Body - 1"
    }, {
        title: "Dynamic Group Header - 2",
        content: "Dynamic Group Body - 2"
    }];

    vm.items = ['Item 1', 'Item 2', 'Item 3'];

    vm.addItem = function() {
        var newItemNo = vm.items.length + 1;
        vm.items.push('Item ' + newItemNo);
    };
}


export default {
  name: 'HomeController',
  fn: HomeController
};
