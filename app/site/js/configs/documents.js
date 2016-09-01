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
					label: 'Nome',
					tag: 'input',
					attributes: [
						{attr: 'type', val: 'text'},
						{attr: 'name', val: 'numero'},
						{attr: 'required', val: true},
					],
					ngMessages: [
						{
							numero: {
								required: 'O campo nome é necessario!'
							}
						}
					]
				}
			]
		}
	}
};

export default DocumentsConfig;