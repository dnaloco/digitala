function HomeController($scope, FBCategoriesService, FBBillingsService, $modal, lodash, ngDialog) {
    // injetando dependência
    'ngInject';
    // ViewModel
    const vm = this;
    vm.meses = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];
    vm.selectedMonth = new Date();
    vm.monthTitle = null;
    vm.yearTitle = null;

    vm.expenseCollection = {};
    vm.incomeCollection = {};

    function updateBillings(year, month, type) {
        console.log('YEAR', year);
        console.log('MONTH', month + 1);
        console.log('TYPE', type);
        FBCategoriesService.getList({
            'selectYearMonth': true,
            'year': year,
            'month': month + 1,
            'type': type
        }).then(function(response) {
            console.log('Faturas de ' + type, response);
            switch (type) {
                case 'expense':
                    console.log('DESPESAS...');
                    vm.expenseCollection = response;
                    var totalBillings = 0;
                    var totalIntendedAmount = 0;
                    var totalAmount = 0;
                    angular.forEach(vm.expenseCollection, function(category) {
                        category.subtotalBillings = category.billings.length;
                        totalBillings += category.billings.length;
                        var subamountBillings = 0;
                        angular.forEach(category.billings, function(billing) {
                            subamountBillings += parseFloat(billing.amountOutcome);
                        })
                        category.subamountBillings = subamountBillings;
                        category.subdifference = category.intendedBillAmountPerMonth - subamountBillings;
                        totalIntendedAmount += parseFloat(category.intendedBillAmountPerMonth);
                        totalAmount += subamountBillings;
                    });
                    vm.expenseCollection.totalBillings = totalBillings;
                    vm.expenseCollection.totalIntendedAmount = totalIntendedAmount;
                    vm.expenseCollection.totaldifference = totalIntendedAmount - totalAmount;
                    vm.expenseCollection.totalAmount = totalAmount;
                    break;
                case 'income':
                    console.log('RECEITAS...');
                    vm.incomeCollection = response;
                    var totalBillings = 0;
                    var totalIntendedAmount = 0;
                    var totalAmount = 0;
                    angular.forEach(vm.incomeCollection, function(category) {
                        category.subtotalBillings = category.billings.length;
                        totalBillings += category.billings.length;
                        var subamountBillings = 0;
                        angular.forEach(category.billings, function(billing) {
                            subamountBillings += parseFloat(billing.amountIncome);
                        })
                        category.subamountBillings = subamountBillings;
                        category.subdifference = subamountBillings - category.intendedBillAmountPerMonth;
                        totalIntendedAmount += parseFloat(category.intendedBillAmountPerMonth);
                        totalAmount += subamountBillings;
                    });
                    vm.incomeCollection.totalBillings = totalBillings;
                    vm.incomeCollection.totalIntendedAmount = totalIntendedAmount;
                    vm.incomeCollection.totaldifference = totalAmount - totalIntendedAmount;
                    vm.incomeCollection.totalAmount = totalAmount;
                    break;
            }

            if (vm.incomeCollection.totalAmount === undefined) vm.incomeCollection.totalAmount = 0;
            if (vm.expenseCollection.totalAmount === undefined) vm.expenseCollection.totalAmount = 0;

            vm.saldoMes = vm.incomeCollection.totalAmount - vm.expenseCollection.totalAmount;

        });
    }
    $scope.$watch('home.selectedMonth', function(val) {
        console.log('VALOR DATA', val);
        if (val) {
            var selectedDate = new Date(val);
            updateBillings(selectedDate.getFullYear(), selectedDate.getMonth(), 'income');
            updateBillings(selectedDate.getFullYear(), selectedDate.getMonth(), 'expense');
            vm.monthTitle = vm.meses[selectedDate.getMonth()];
            vm.yearTitle = selectedDate.getFullYear();
        }
    });
    vm.cliquei = function() {
        window.alert('Fui clicado!');
    }
    $scope.saveBilling = saveBilling;

    function saveBilling(size, backdrop, closeOnClick, type, billing) {
        console.log('size', size);
        console.log('backdrop', backdrop);
        console.log('closeOnClick', closeOnClick);
        console.log('type', type);
        console.log('billing', billing);
        var params = {
            templateUrl: 'modals/save-billing.html',
            controller: function($scope, $modalInstance, FBBillingsService, FBCategoriesService, lodash) {
                'ngInject';
                $scope.editing = false;
                var where = [];
                where.push({
                    key: 'type',
                    value: type
                });
                $scope.billing = {};
                //crédito', 'débito', 'dinheiro
                $scope.paymentMethods = [{
                    id: 1,
                    value: 'crédito',
                }, {
                    id: 2,
                    value: 'débito'
                }, {
                    id: 3,
                    value: 'dinheiro'
                }];

                FBCategoriesService.getList({
                    'where[]': where
                }).then(function(categories) {
                    console.log('Categorias de ' + type, categories);
                    $scope.categories = categories;
                    $scope.categoriesLoaded = true;
                })
                if (type === 'expense') {
                    $scope.type = 'Despesa';
                }
                if (type === 'income') {
                    $scope.type = 'Receita';
                }
                if (billing !== undefined) {
                    FBBillingsService.getOne(billing.id).then(function(result) {
                        console.log('BILLING RESULT', result);
                        $scope.billing = result.data;
                        $scope.billing.paymentDate = new Date($scope.billing.paymentDate);
                        console.log('BILLING SCOPE', $scope.billing);
                        $scope.editing = true;
                        if (type == 'expense') {
                            $scope.billing.amount = parseFloat($scope.billing.amountOutcome);
                        } else {
                            $scope.billing.amount = parseFloat($scope.billing.amountIncome);
                        }
                        $scope.billing.paymentMethod = lodash.find($scope.paymentMethods, function(pm) {
                            return $scope.billing.paymentMethod === pm.value
                        });
                        $scope.$watch('categoriesLoaded', function(val) {
                            if (val == true) {
                                console.log('$scope.categories', $scope.categories[0].id);
                                console.log('$scope.billing.category.id}', $scope.billing.category.id);
                                $scope.billing.category = lodash.find($scope.categories, function(c) {
                                    return c.id === $scope.billing.category.id
                                });
                            }
                        });
                    })
                }
                $scope.reposition = function() {
                    $modalInstance.reposition();
                };
                $scope.ok = function() {
                    // LOGICA DE SALVAR A ENTIDADE
                    if (billing !== undefined) {
                        FBBillingsService.edit($scope.billing.id, $scope.billing).then(function(result) {
                            console.log('RESULTADO EDIÇÃO...', result);
                            $modalInstance.close(result.data);
                        });
                    } else {
                        FBBillingsService.save($scope.billing).then(function(result) {
                            console.log('RESULTADO SALVAMENTO...', result);
                            $modalInstance.close(result.data);
                        });
                    }
                    //$modalInstance.close($scope.selected.item);
                };
                $scope.cancel = function() {
                    $modalInstance.dismiss('cancel');
                };
                $scope.openNestedCategory = function() {
                    saveCategory();
                };
            }
        };
        if (angular.isDefined(size)) {
            params.size = size;
        }
        if (angular.isDefined(backdrop)) {
            params.backdrop = backdrop;
        }
        if (angular.isDefined(closeOnClick)) {
            params.closeOnClick = closeOnClick;
        }
        var modalInstance = $modal.open(params);

        modalInstance.result.then(function(savedItem) {
            if (type === 'expense') {
                updateBillings(vm.selectedMonth.getFullYear(), vm.selectedMonth.getMonth(), 'expense');;
            }
            if (type === 'income') {
                updateBillings(vm.selectedMonth.getFullYear(), vm.selectedMonth.getMonth(), 'income');
            }
        }, function() {
            console.log('Modal dismissed at: ' + new Date());
        });
    };

    $scope.deleteBilling = deleteBilling;

    function deleteBilling(id, type) {
      ngDialog.openConfirm({
          template:
              '<div class="callout secondary confirm-to-remove"><p>Você tem certeza de quer excluir esta fatura?</p>' +
              '<div class="button-group expanded">' +
                '<button type="button" class="secondary button" ng-click="closeThisDialog(0)">Não&nbsp;' +
                '<button type="button" class="alert button" ng-click="confirm(1)">Sim' +
              '</button></div></div>',
          plain: true,
          className: 'ngdialog-theme-default'
      }).then(function (value) {
          FBBillingsService.remove(id).then(function () {
            if (type === 'expense') {
                updateBillings(vm.selectedMonth.getFullYear(), vm.selectedMonth.getMonth(), 'expense');;
            }
            if (type === 'income') {
                updateBillings(vm.selectedMonth.getFullYear(), vm.selectedMonth.getMonth(), 'income');
            }
          });

      }, function (value) {
          //Do something 
      });
    }

    $scope.saveCategory = saveCategory;

    function saveCategory(size, backdrop, closeOnClick, type, category) {
        var params = {
            templateUrl: 'modals/save-category.html',
            controller: function($scope, $modalInstance, FBCategoriesService, lodash) {
                'ngInject';
                $scope.editing = false;
                $scope.category = {};
                if (type === 'expense') {
                    $scope.type = 'Despesa';
                    $scope.category.type = type;
                }
                if (type === 'income') {
                    $scope.type = 'Receita';
                    $scope.category.type = type;
                }

                $scope.types = [{
                    id: 1,
                    value: 'expense',
                }, {
                    id: 2,
                    value: 'income',
                }];

                if (category !== undefined) {
                    FBCategoriesService.getOne(category.id).then(function(result) {
                        $scope.category = result.data;

                        console.log('category SCOPE', $scope.category);
                        $scope.editing = true;
                        $scope.category.intendedBillAmountPerMonth = parseFloat(result.data.intendedBillAmountPerMonth);
                        $scope.category.type = lodash.find($scope.types, function(t) {
                            return $scope.category.type === t.value
                        });

                    })
                }
                $scope.reposition = function() {
                    $modalInstance.reposition();
                };
                $scope.ok = function() {

                    // LOGICA DE SALVAR A ENTIDADE
                    if (category !== undefined) {
                        FBCategoriesService.edit($scope.category.id, $scope.category).then(function(result) {
                            console.log('RESULTADO EDIÇÃO...', result);
                            $modalInstance.close(result.data);
                        });
                    } else {
                        FBCategoriesService.save($scope.category).then(function(result) {
                            console.log('RESULTADO SALVAMENTO...', result);
                            $modalInstance.close(result.data);
                        });
                    }
                };
                $scope.cancel = function() {
                    $modalInstance.dismiss('cancel');
                };
            }
        };
        if (angular.isDefined(size)) {
            params.size = size;
        }
        if (angular.isDefined(backdrop)) {
            params.backdrop = backdrop;
        }
        if (angular.isDefined(closeOnClick)) {
            params.closeOnClick = closeOnClick;
        }
        var modalInstance = $modal.open(params);
        modalInstance.result.then(function(savedItem) {
          if (type === 'expense') {
                updateBillings(vm.selectedMonth.getFullYear(), vm.selectedMonth.getMonth(), 'expense');;
            }
            if (type === 'income') {
                updateBillings(vm.selectedMonth.getFullYear(), vm.selectedMonth.getMonth(), 'income');
            }
        }, function() {
            console.log('Modal dismissed at: ' + new Date());
        });
    };

    $scope.deleteCategory = deleteCategory;

    function deleteCategory(id) {
      ngDialog.openConfirm({
          template:
              '<div class="callout secondary confirm-to-remove"><p>Você tem certeza de quer excluir esta categoria?</p>' +
              '<div class="button-group expanded">' +
                '<button type="button" class="secondary button" ng-click="closeThisDialog(0)">Não&nbsp;' +
                '<button type="button" class="alert button" ng-click="confirm(1)">Sim' +
              '</button></div></div>',
          plain: true,
          className: 'ngdialog-theme-default'
      }).then(function (value) {
          FBCategoriesService.remove(id);

      }, function (value) {
          //Do something 
      });
    }
}
export default {
    name: 'HomeController',
    fn: HomeController
};