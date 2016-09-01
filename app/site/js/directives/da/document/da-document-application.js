function daDocumentApplicationController($scope) {
      'ngInject';

      var vm = this;

      vm.removeOption = function (option) {
        var indexOfOption =  $scope.documentTypes.indexOf(option);
        $scope.documentTypes.splice(indexOfOption, 1);
        vm.documentTypeSelected = option;
        $scope.documentTypeSelected = null;
      }
  }

function daDocumentApplication(DocumentsConfig) {
	'ngInject';

	return {
		restrict: 'E',
		templateUrl: 'directives/da/document/application.html',
		replace: true,
		controller : daDocumentApplicationController,
		controllerAs: 'daDocApp',
		scope: {
			documentsModel: '=',
			form: '='
		},
		link: function (scope, element, attrs) {
			scope.documentTypes = DocumentsConfig.types[attrs.documentType];
		}

	};
}

export default {
  name: 'daDocumentApplication',
  fn: daDocumentApplication
};

