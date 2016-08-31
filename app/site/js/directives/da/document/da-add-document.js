function daAddDocument ($compile) {
	'ngInject';

	return {
		restrict: 'A',
		link: function (scope, element, attrs) {
			element.bind('click', function () {
				angular.element(document.getElementById('section-to-documents')).prepend($compile('<da-document data-document-type="' + scope.documentTypeSelected.toLowerCase() + '"></div>')(scope));
			})
		}
	};

}

export default {
  name: 'daAddDocument',
  fn: daAddDocument
};