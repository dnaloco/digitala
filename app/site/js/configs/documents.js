const DocumentsConfig = {
	types: {
		physical: [
			'rg',
			'cpf',
			'passport'
		]
	},
	form: {
		rg: {
			pristineModel: {
				type: 'rg',
				field1: null,
			},
			fields: [
				{
					model: 'field1',
					label: 'Número',
					tag: 'input',
					name: 'rg_numero',
					attributes: [
						{attr: 'type', val: 'text'},
						{attr: 'required', val: true},
					],
					daNgMessages: {
						required: 'O campo nome é necessario!'
					}
				}
			]
		}
	}
};

export default DocumentsConfig;