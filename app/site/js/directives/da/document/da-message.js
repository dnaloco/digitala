function daMessage($compile) {
	'ngInject';

	return {
		restrict: 'A',
		priority: 9999,
		terminal: true,
		compile: function (el, attr) {

			var setMessage = function (scope) {
				attr.$set('ngMessage', attr.docKey);
				return $compile(el, null, 9999);
			};

			return function (scope) {
				setMessage(scope);
			};
		}
	};
}

export default {
  name: 'daMessage',
  fn: daMessage
};
