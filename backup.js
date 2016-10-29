var section = angular.element(document.getElementById('section-to-fields'));

			var label = null;
			var field = null;

			angular.forEach(DocumentsConfig.fields[attrs.documentType], function (value, key) {
				if (!angular.isDefined(value.label)) {
					throw new ErrorsConfig.document.ConfigRequired.type(ErrorsConfig.document.ConfigRequired.msg + ' Undefined "value.label" on da-document for ' + attrs.documentType);
				}

				if (!angular.isDefined(value.tag)) {
					throw new ErrorsConfig.document.ConfigRequired.type(ErrorsConfig.document.ConfigRequired.msg + ' Undefined "value.tag" on da-document for ' + attrs.documentType);
				}

				if (!angular.isDefined(value.attributes)) {
					throw new ErrorsConfig.document.ConfigRequired.type(ErrorsConfig.document.ConfigRequired.msg + ' Undefined "value.attributes" on da-document for ' + attrs.documentType);
				}

				label = $compile('<label>' + value.label + '</label>')(scope);

				switch (value.tag) {
						case 'input':
							field = $compile('<input>')(scope);
							label.append(field);
							break;
					}

					angular.forEach(value.attributes, function (attribute) {
						field.attr(attribute.attr, attribute.val);

					});

				

				section.append(label);

			});

			element.prepend(section);