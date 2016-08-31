const DocumentConfig = {
	types: {
		physical: [
			'rg',
			'cpf',
			'passport'
		]
	},
	fields: {
		rg: {
			tag: 'input',
			attributes: [
				{'name': 'nome'},
				{'ng-model': 'documentsModel[index].field1'}
			]
		}
	}
};

export default DocumentConfig;