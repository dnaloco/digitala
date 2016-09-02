function daGetField(tag, name, index, model, scope, attributes, options) {
    var field;

    switch (tag) {
        case 'input':
            field = angular.element('<input />');
            break;
        case 'select':
            field = angular.element('<select></select>');
            break;
    }

    field.attr('name', name);
    field.attr('ng-model', 'documentsModel[' + index + ']["' + model + '"]');

    attributes.forEach(function(attribute) {
        console.log('Attribute', attribute);
        if (attribute.attr == 'ng-options') {
        	field.prepend(angular.element('<option value="">--- Selecione uma opção ---</option>'));
        	field.attr(attribute.attr, 'item.id as item.title for item in docApplicationOptions["' + attribute.val + '"] track by item.id');
        } else {
            field.attr(attribute.attr, attribute.val)
        }
    });

    return field;
}

function daGetFieldMessages(messages, name, index, scope) {

    //var dirtyField = angular.element('<div></div>');

    var fieldMessages = angular.element('<div></div>');


    // form['doc_rg_nome['+index+']'].$error
    var fieldForm = "docForm." + name;
    var hasError = fieldForm + '.$error';
    var isDirty = fieldForm + '.$dirty';

    fieldMessages.attr('ng-messages', hasError);
    fieldMessages.attr('ng-show', isDirty);
    //dirtyField.attr('ng-if', isDirty);

    angular.forEach(messages, function(msg, key) {
        fieldMessages.append(angular.element('<div ng-message="' + key + '">' + msg + '</div>'));
        //$compile(result)(scope);
    })

    //var result = dirtyField.append(fieldMessages);

    return fieldMessages;


}

function daDocumentController($scope) {
    'ngInject';

    var vm = this;
}

function generateRow($compile, scope, rowId) {
    return $compile('<div id="' + rowId + '" class="row"></div>')(scope);
}

function daDocument(DocumentsConfig, $compile, ErrorsConfig) {
    'ngInject';

    return {
        restrict: 'E',
        scope: true,
        controller: daDocumentController,
        controllerAs: 'daDoc',
        require: ['^daDocumentApplication', 'daDocument'],
        templateUrl: 'directives/da/document/document.html',
        link: function(scope, element, attrs, controllers) {

            var moreErrorInfo;

            var fieldSection = element.find('section.fields-section');

            var counterFieldsByRow = 0;

            var counterRows = 1;

            var selectedColumn, maxFieldsByRow, rowId;
            var rowEl;

            scope.docApplicationOptions = {
                rgOrgao: DocumentsConfig.types.orgaos
            };

            console.log('docApplicationOptions', scope.docApplicationOptions);

            if (!angular.isDefined(DocumentsConfig.form[attrs.documentType])) {
                moreErrorInfo = 'The config for "' + attrs.documentType + '"" type!'
                throw new ErrorsConfig.document.configNotFound.type(ErrorsConfig.document.configNotFound.msg.concat(moreErrorInfo));
            }

            scope.documentsModel.push(DocumentsConfig.form[attrs.documentType].pristineModel)
            scope.documentIndex = scope.documentsModel.length - 1;

            scope.documentTitle = 'DOCUMENTO ' + (scope.documentIndex + 1) + ': ' + attrs.documentType.toUpperCase();

            angular.forEach(DocumentsConfig.form[attrs.documentType].fields, function(value, key) {
                var columnEl, fieldEl, labelEl, fieldMessagesEl;

                var modelVal, labelVal, tagVal, nameVal, structureVal, attributesVal, optionsVal;

                // este valor será usado para o campo de formulário (fn daGetField) usado para ngModel
                if (!angular.isDefined(value.model)) {
                    moreErrorInfo = 'Undefined "value.model" on da-document for "' + attrs.documentType + '".';
                    throw new ErrorsConfig.document.configRequired.type(ErrorsConfig.document.configRequired.msg.concat(moreErrorInfo));
                }

                modelVal = value.model;

                // este valor será usado para o título da label
                if (!angular.isDefined(value.label.title)) {
                    moreErrorInfo = 'Undefined "value.label.title" on da-document for "' + attrs.documentType + '".';
                    throw new ErrorsConfig.document.configRequired.type(ErrorsConfig.document.configRequired.msg.concat(moreErrorInfo));
                }

                labelVal = value.label.title;

                if (!angular.isDefined(value.tag)) {
                    moreErrorInfo = 'Undefined "value.tag" on da-document for "' + attrs.documentType + '".'
                    throw new ErrorsConfig.document.configRequired.type(ErrorsConfig.document.configRequired.msg.concat(moreErrorInfo));
                }

                tagVal = value.tag;

                if (!angular.isDefined(value.name)) {
                    moreErrorInfo = 'Undefined "value.name" on da-document for ' + attrs.documentType + '".';
                    throw new ErrorsConfig.document.configRequired.type(ErrorsConfig.document.configRequired.msg.concat(moreErrorInfo));
                }

                nameVal = value.name + '_' + scope.documentIndex;

                if (!angular.isDefined(DocumentsConfig.form[attrs.documentType].structure)) {
                    moreErrorInfo = 'Undefined "structure" on da-document for ' + attrs.documentType + '".';
                    throw new ErrorsConfig.document.configRequired.type(ErrorsConfig.document.configRequired.msg.concat(moreErrorInfo));
                }

                structureVal = DocumentsConfig.form[attrs.documentType].structure;

                if (angular.isDefined(value.attributes)) {
                    attributesVal = value.attributes;
                }

                if (angular.isDefined(value.options)) {
                    optionsVal = value.options;
                }

                if (angular.isDefined(structureVal.threecol) && counterFieldsByRow == 0) {
                    if (structureVal.threecol.fieldsName.indexOf(value.name) != -1) {
                        rowId = 'doc_row_id_' + counterRows;
                        rowEl = generateRow($compile, scope, rowId);
                        maxFieldsByRow = structureVal.threecol.maxFields;
                        selectedColumn = structureVal.threecol.column;
                    }
                }

                if (angular.isDefined(structureVal.fourcol) && counterFieldsByRow == 0) {
                    if (structureVal.fourcol.fieldsName.indexOf(value.name) != -1) {
                        rowId = 'doc_row_id_' + counterRows;
                        rowEl = generateRow($compile, scope, rowId);
                        maxFieldsByRow = structureVal.fourcol.maxFields;
                        selectedColumn = structureVal.fourcol.column;
                    }
                }

                if (angular.isDefined(structureVal.sixcol) && counterFieldsByRow == 0) {

                    if (structureVal.sixcol.fieldsName.indexOf(value.name) != -1) {
                        rowId = 'doc_row_id_' + counterRows;
                        rowEl = generateRow($compile, scope, rowId);
                        maxFieldsByRow = structureVal.sixcol.maxFields;
                        selectedColumn = structureVal.sixcol.column;
                    }
                }

                if (angular.isDefined(structureVal.twelvecol) && counterFieldsByRow == 0) {
                    if (structureVal.twelvecol.fieldsName.indexOf(value.name) != -1) {
                        rowId = 'doc_row_id_' + counterRows;
                        rowEl = generateRow($compile, scope, rowId);
                        maxFieldsByRow = structureVal.twelvecol.maxFields;
                        selectedColumn = structureVal.twelvecol.column;
                    }
                }

                if (angular.isDefined(structureVal.threeninecol)) {
                    if (structureVal.threeninecol.fieldsName.indexOf(value.name) != -1) {
                        if (counterFieldsByRow == 0) {
                            rowId = 'doc_row_id_' + counterRows;
                            rowEl = generateRow($compile, scope, rowId);
                            maxFieldsByRow = structureVal.threeninecol.maxFields;
                        }
                        selectedColumn = structureVal.threeninecol.columns[counterFieldsByRow]
                    }
                }

                if (angular.isDefined(structureVal.ninethreecol)) {
                    if (structureVal.ninethreecol.fieldsName.indexOf(value.name) != -1) {
                        if (counterFieldsByRow == 0) {
                            rowId = 'doc_row_id_' + counterRows;
                            rowEl = generateRow($compile, scope, rowId);
                            maxFieldsByRow = structureVal.ninethreecol.maxFields;
                        }
                        selectedColumn = structureVal.ninethreecol.columns[counterFieldsByRow]
                    }
                }

                if (!angular.isDefined(rowId)) {
                    moreErrorInfo = 'Undefined "rowId" on da-document.';
                    throw new ErrorsConfig.generic.notDefined.type(ErrorsConfig.generic.notDefined.msg.concat(moreErrorInfo));
                }

                columnEl = angular.element(selectedColumn);

                labelEl = angular.element('<label>' + labelVal + '</label>');

                fieldEl = daGetField(tagVal, nameVal, scope.documentIndex, modelVal, scope, attributesVal, optionsVal);

                labelEl.append(fieldEl);

                if (angular.isDefined(value.daNgMessages)) {
                    fieldMessagesEl = daGetFieldMessages(value.daNgMessages, nameVal, scope.documentIndex, scope);

                    labelEl.append(fieldMessagesEl);
                }

                columnEl.append(labelEl);

                rowEl.append(columnEl);

                counterFieldsByRow++;

                if (counterFieldsByRow == maxFieldsByRow) {
                    fieldSection.append(rowEl);
                    counterFieldsByRow = 0;
                    counterRows++;
                }

            });

			$compile(fieldSection)(scope);
        }

    };
}

export
default {
    name: 'daDocument',
    fn: daDocument
};