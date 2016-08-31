function daDocumentApplication(DocumentConfig) {
	'ngInject';

	return {
		restrict: 'E',
		templateUrl: 'directives/da/document/application.html',
		replace: true,
		scope: {
			documentsModel: '=',
			form: '='
		},
		link: function (scope, element, attrs) {
			scope.documentTypes = DocumentConfig.types[attrs.documentType];
		}

	};
}

export default {
  name: 'daDocumentApplication',
  fn: daDocumentApplication
};

