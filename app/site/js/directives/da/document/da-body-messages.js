function daBodyMessages($compile) {
	'ngInject';

	return {
		restrict: 'A',
		priority: 9999,
		terminal: true,
		compile: function (el, attr) {


			var setMessages = function (scope) {

				console.log('DA BODY MESSAGES SCOPE', scope);

				var fieldForm = attr.docForm + "['" + attr.docName + "['" + attr.docIndex + "']']";
				var hasError = fieldForm + '.$error';
				var isDirty = fieldForm + '.$dirty';
				attr.$set('ngMessages', hasError);
				//attr.$set('ngIf', isDirty );

				angular.forEach(scope.daNgMessages, function(msg, key) {
					//var message = $compile('<div da-message da-doc-key="' + key +'">' + msg + '</div>')(scope);
					el.append(angular.element('<div da-message da-doc-key="' + key +'">' + msg + '</div>'));
					//$compile(messageResult);
				});

				return $compile(el, null, 9999);
			};

			return function (scope) {
				
				setMessages(scope);
			};
		}
	};
}

export default {
  name: 'daBodyMessages',
  fn: daBodyMessages
};
