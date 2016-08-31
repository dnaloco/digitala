function daDocument(DocumentConfig) {
	'ngInject';

	return {
		restrict: 'E',
		link: function (scope, element, attrs) {
			
			
		},
		compile: function (element, attrs) {
			console.log('Document fields', DocumentConfig.fields[attrs.documentType]);
			angular.forEach(DocumentConfig.fields[attrs.documentType], function (value, key) {
				console.log('VALUE', value);
				console.log('KEY', key);
			});
		}

	};
}

export default {
  name: 'daDocument',
  fn: daDocument
};

