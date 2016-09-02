function daGetField (tag, index, model, $compile, scope) {
	var field;
	switch (tag) {
		case 'input':
			field = $compile('<input da-field data-doc-index="' + index + '" data-model="' + model +'">')(scope);
			break;
	}

	return field;
}


function daDocumentController($scope) {
	'ngInject';

	var vm = this;

	vm.verForm = function () {
		console.log($scope.form);
	}
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

			var fieldSection = element.find('section.fields-section');

			angular.forEach(DocumentsConfig.form[attrs.documentType].fields, function (value, key) {
				var field, label, bodyMessages;

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

				if (!angular.isDefined(value.name)) {
					moreErrorInfo = 'Undefined "value.name" on da-document for ' + attrs.documentType + '".';
					throw new ErrorsConfig.document.ConfigRequired.type(ErrorsConfig.document.configRequired.msg.concat(moreErrorInfo));
				}

				
				label = $compile('<label>' + value.label + '</label>')(scope);

				field = daGetField(value.tag, scope.documentIndex, value.model, $compile, scope);

				//field.attr('shared-another-dynamic-name','asdasa');
				//$compile(field)(scope);
				console.log('field', field);
				label.append(field);

				var result = fieldSection.append(label);

				$compile(result)(scope);
				/*scope.fieldAttributes = value.attributes;

				label = $compile('<label>' + value.label + '</label>')(scope);

				field = daGetField(value.tag, value.name, scope.documentIndex, value.model, $compile, scope);

				label.append(field);

				scope.daNgMessages = value.daNgMessages;

				console.log('FORM NAME', scope.form.$name);

				bodyMessages = $compile('<div da-body-messages data-doc-form="' + scope.form.$name + '" data-doc-index="' + scope.documentIndex + '" data-doc-name="' + value.name + '"></div>')(scope);

				label.append(bodyMessages);


				fieldSection.append(label);*/
			});


			console.log('SCOPE', scope);
		}

	};
}

export default {
  name: 'daDocument',
  fn: daDocument
};


/*function daGetField (tag, name, index, model, $compile, scope) {
	var field;
	switch (tag) {
		case 'input':
			field = $compile('<input da-field data-doc-index="' + index + '" data-doc-model="' + model +'">')(scope);
			break;
	}

	return field;
}*/

