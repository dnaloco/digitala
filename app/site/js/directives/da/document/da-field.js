function daField($compile, $parse) {
	'ngInject';

	return {
		restrict: 'A',
		priority: 9999,
		terminal: true,
		compile: function (el, attr) {
			console.log('ELEMENT', el);
			console.log('ATTRIBUTS', attr);

			attr.$set('type', 'text');

			attr.$set('ngModel', 'documentsModel[' + attr.docIndex +']["' + attr.model +'"]');

			var ngModelLink = $compile(el, null, 9999);

			return function (scope) {
				ngModelLink(scope);
			};
		}
	};
}

export default {
  name: 'daField',
  fn: daField
};
