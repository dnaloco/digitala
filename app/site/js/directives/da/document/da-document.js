function daGetField (tag, index, model, $compile, scope) {
	var field;
	switch (tag) {
		case 'input':
			field = $compile('<input da-field data-doc-index="' + index + '" data-model="' + model +'">')(scope);
			break;
	}

	return field;
}

function daAddAttributes(field, attributes) {
	angular.forEach(attributes, function (attribute) {
		field.attr(attribute.attr, attribute.val);
	});

	return field;
}

function daGetNgMessages(form, ngMessages, $compile, scope, controller) {
	//var ngMessagesBody = $compile()(scope);
	var bodyNgMsgs;
	

	return bodyNgMsgs;
}

function daDocumentController() {
	var vm = this;
}

function daDocument(DocumentsConfig, $compile, ErrorsConfig) {
	'ngInject';

	return {
		restrict: 'E',
		scope: true,
		controller : daDocumentController,
		controllerAs: 'daDoc',
		require: ['^daDocumentApplication', 'daDocument'],
		templateUrl: 'directives/da/document/document.html',
		link: function (scope, element, attrs, controllers) {

			if (!angular.isDefined(DocumentsConfig.form[attrs.documentType])) {
				moreErrorInfo = 'The config for "' + attrs.documentType + '"" type!'
				throw new ErrorsConfig.document.ConfigNotFound.type(ErrorsConfig.document.configNotFound.msg.concat(moreErrorInfo));
			}

			scope.documentsModel.push(DocumentsConfig.form[attrs.documentType].pristineModel)
			scope.documentIndex = scope.documentsModel.length - 1;

			console.log('INDEX OF INSERTED ONE', scope.documentIndex);

			console.log('SCOPE DOC MODEL', scope.documentsModel);

			var fieldSection = element.find('section.fields-section');

			angular.forEach(DocumentsConfig.form[attrs.documentType].fields, function (value, key) {
				var field;
				console.log('KEY', key);
				console.log('VALUE', value);

				if (!angular.isDefined(value.model)) {
					moreErrorInfo = 'Undefined "value.model" on da-document for "' + attrs.documentType + '".';
					throw new ErrorsConfig.document.ConfigRequired.type(ErrorsConfig.document.configRequired.msg.concat(moreErrorInfo));
				}

				if (!angular.isDefined(value.label)) {
					moreErrorInfo = 'Undefined "value.label" on da-document for "' + attrs.documentType + '".';
					throw new ErrorsConfig.document.ConfigRequired.type(ErrorsConfig.document.configRequired.msg.concat(moreErrorInfo));
				}

				if (!angular.isDefined(value.tag)) {
					moreErrorInfo = 'Undefined "value.tag" on da-document for "' + attrs.documentType + '".'
					throw new ErrorsConfig.document.ConfigRequired.type(ErrorsConfig.document.configRequired.msg.concat(moreErrorInfo) );
				}

				if (!angular.isDefined(value.attributes)) {
					moreErrorInfo = 'Undefined "value.attributes" on da-document for ' + attrs.documentType + '".';
					throw new ErrorsConfig.document.ConfigRequired.type(ErrorsConfig.document.configRequired.msg.concat(moreErrorInfo));
				}

				field = daGetField(value.tag, scope.documentIndex, value.model, $compile, scope);

				console.log('FIELD', field);

				fieldSection.append(field);
			});



			//fieldSection.append($compile('<input da-field data-type="' +  + '"></input')(scope));
			//console.log('FORM', scope.form);
			/*var moreErrorInfo = null;

			console.log(scope);

			if (!angular.isDefined(DocumentsConfig.fields[attrs.documentType])) {
				moreErrorInfo = 'The config for "' + attrs.documentType + '"" type!'
				throw new ErrorsConfig.document.ConfigNotFound.type(ErrorsConfig.document.configNotFound.msg.concat(moreErrorInfo));
			}

			angular.forEach(DocumentsConfig.fields[attrs.documentType], function (value, key) {
				var label, field, bodyNgMsgs;
				if (!angular.isDefined(value.label)) {
					moreErrorInfo = 'Undefined "value.label" on da-document for "' + attrs.documentType + '".';
					throw new ErrorsConfig.document.ConfigRequired.type(ErrorsConfig.document.configRequired.msg.concat(moreErrorInfo));
				}
				if (!angular.isDefined(value.tag)) {
					moreErrorInfo = 'Undefined "value.tag" on da-document for "' + attrs.documentType + '".'
					throw new ErrorsConfig.document.ConfigRequired.type(ErrorsConfig.document.configRequired.msg.concat(moreErrorInfo) );
				}

				if (!angular.isDefined(value.attributes)) {
					moreErrorInfo = 'Undefined "value.attributes" on da-document for ' + attrs.documentType + '".';
					throw new ErrorsConfig.document.ConfigRequired.type(ErrorsConfig.document.configRequired.msg.concat(moreErrorInfo));
				}
				label = $compile('<label>' + value.label + '</label>')(scope);

				field = daGetField(value.tag, $compile, scope);

				if (!field) {
					moreErrorInfo = 'Required tag "' + value.tag + '".';
					throw new ErrorsConfig.document.fieldNotFound.type(ErrorsConfig.document.fieldNotFound.msg.concat(moreErrorInfo))
				}

				field = daAddAttributes(field, value.attributes);

				label.append(field);

				element.append(label);

				console.log('LABEL', label);

				if (angular.isDefined(value.ngMessages)) {
					angular.forEach(value.ngMessages, function(value, key) {
						angular.forEach(value, function(value2, fieldName) {
							console.log('form', scope.form);
							//label.append($compile('<div ng-messages="' + scope.form"></div>')(scope));
							angular.forEach(value2, function(message, messageType) {
								//bodyNgMsgs.append($compile('<div data-ng-message="' +  messageType + '">' + message + '</div>')(scope));
							});
						});
					});
				}

				scope.$apply();

				console.log('form 2', scope.form);
			});*/

		}

	};
}

export default {
  name: 'daDocument',
  fn: daDocument
};
