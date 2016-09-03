function TestTabelaController($scope, CityService, lodash) {
    'ngInject';

    // ViewModel
    const vm = this;

    vm.displayed = [];

    vm.callServer = function callServer(tableState) {
        vm.isLoading = true;

        console.log('TABLE STATE', tableState);

        var pagination = tableState.pagination;

        var start = pagination.start || 0;
        var number = pagination.number || 10;

        var where = [];
        var options = [];

        console.log('tableState.search.predicateObject', tableState.search.predicateObject);

        if (lodash.size(tableState.search.predicateObject) > 0) {
            angular.forEach(tableState.search.predicateObject, function (value, key) {
                if (key == 'state') {
                    where.push({key: key, value: value.code});
                } else {
                    where.push({key: key, value: value});
                }
            });
        }

        CityService.getList({
            'limit': number,
            'offset': start,
            'where[]': where,
            'options[]': options
        }).then(function (response) {
            vm.displayed = response;
            vm.totalPaginas = Math.ceil(response.total / number);
            tableState.pagination.numberOfPages = vm.totalPaginas;
            vm.isLoading = false;
        });
    }
}

export
default {
    name: 'TestTabelaController',
    fn: TestTabelaController
};