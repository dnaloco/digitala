function daAddDocument ($compile) {
	'ngInject';

	return {
		restrict: 'A',
		require: '^daDocumentApplication',
		link: function (scope, element, attrs, daDocumentApplicationController) {
			element.bind('click', function () {
				angular.element(document.getElementById('section-to-documents')).prepend($compile('<da-document data-document-type="' + daDocumentApplicationController.documentTypeSelected.toLowerCase() + '"></div>')(scope));
			})
		}
	};

}

export default {
  name: 'daAddDocument',
  fn: daAddDocument
};