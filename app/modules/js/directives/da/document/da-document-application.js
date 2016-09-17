function daDocumentApplicationController($scope) {
    'ngInject';

    var vm = this;

    vm.removeDocOption = function(option) {

        var getOption = $scope.documentTypes.filter(function(type) {
            return type.title.toLowerCase() == option.toLowerCase();
        })

        var indexOfOption = $scope.documentTypes.indexOf(getOption[0]);


        if (indexOfOption > -1) {
            $scope.documentTypes.splice(indexOfOption, 1);
            $scope.documentTypeSelected = null;
            vm.documentTypeSelected = option;
        }
    };

    vm.resetDocOptions = function() {
        scope.documentTypes = angular.copy(scope.pristineDocTypes);
    };

    vm.addDocOption = function(docType) {
        scope.documentTypes.push(docType);
        scope.documentTypes.sort();
    };

    vm.verForm = function() {
        console.log($scope.docForm);
    }

}

function daDocumentApplication(DocumentsConfig) {
    'ngInject';

    return {
        restrict: 'E',
        templateUrl: 'directives/da/document/application.html',
        replace: true,
        controller: daDocumentApplicationController,
        controllerAs: 'daDocApp',
        scope: {
            documentsModel: '=',
        },
        link: function(scope, element, attrs) {
            scope.pristineDocTypes = DocumentsConfig.types[attrs.documentType];
            scope.documentTypes = angular.copy(scope.pristineDocTypes);
            scope.documentTypes.sort();
            element.removeAttr('data-document-type');
            element.removeAttr('data-documents-model');
        }

    };
}

export
default {
    name: 'daDocumentApplication',
    fn: daDocumentApplication
};