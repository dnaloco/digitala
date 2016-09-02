const DocumentsConfig = {
	types: {
		physical: [
			{id: 'rg', title: 'rg'},
			{id: 'cpf', title: 'cpf'}
		],
		orgaos: [
			{id: 'SSP-SP', title: 'SSP-SP'},
			{id: 'SSP-RJ', title: 'SSP-RJ'},
			{id: 'SSP-PR', title: 'SSP-PR'},
			{id: 'SSP-MG', title: 'SSP-MG'}
		]
	},
	form: {
		cpf: {
			structure: {
				twelvecol: {
					column: '<div class="medium-12 columns"></div>',
					fieldsName: ['cpf_numero'],
					maxFields: 1
				}
			},
			pristineModel: {
				type: 'cpf',
				field1: null
			},
			fields: [
				{
					model: 'field1',
					label: {
						title: 'Número',
						attributes: {}
					},
					tag: 'input',
					name: 'cpf_numero',
					attributes: [
						{attr: 'type', val: 'text'},
						{attr: 'ng-required', val: true}
					],
					daNgMessages: {
						required: 'O campo número é necessario!'
					}
				}
			]
		},
		rg: {
			structure: {
/*				threecol: {
					column: '<div class="medium-3 columns"></div>',
					fieldsName: [],
					maxFields: 4
				},
				fourcol: {
					column: '<div class="medium-4 columns"></div>',
					fieldsName: [],
					maxFields: 3
				},
				sixcol: {
					column: '<div class="medium-6 columns"></div>',
					fieldsName: [],
					maxFields: 2
				},
				twelvecol: {
					column: '<div class="medium-12 columns"></div>',
					fieldsName: [],
					maxFields: 1
				},
				threeninecol: {
					custom: true,
					columns: [
						'<div class="medium-3 columns"></div>',
						'<div class="medium-9 columns"></div>'
					],
					fieldsName: [],
					maxFields: 2,
				},*/
				ninethreecol: {
					custom: true,
					columns: [
						'<div class="medium-9 columns"></div>',
						'<div class="medium-3 columns"></div>'
					],
					fieldsName: ['rg_numero', 'rg_emissor'],
					maxFields: 2,
				}
			},
			pristineModel: {
				type: 'rg',
				field1: null,
				field2: null,
			},
			fields: [
				{
					model: 'field1',
					label: {
						title: 'Número',
						attributes: {}
					},
					tag: 'input',
					name: 'rg_numero',
					attributes: [
						{attr: 'type', val: 'text'},
						{attr: 'ng-required', val: true}
					],
					daNgMessages: {
						required: 'O campo número é necessario!'
					}
				},
				{
					model: 'field2',
					label: {
						title: 'Emissor',
						attributes: {}
					},
					tag: 'input',
					name: 'rg_emissor',
					attributes: [
						{attr: 'type', val: 'text'},
						{attr: 'ng-required', val: true}
					],
					daNgMessages: {
						required: 'O campo emissor é necessario!'
					}
				}
/*				{
					model: 'field2',
					label: {
						title: 'Orgão',
						attributes: {}
					},
					tag: 'select',
					name: 'rg_orgao',
					attributes: [
						{attr: 'ng-options', val: 'rgOrgao'}
					]
				},
				{
					model: 'field3',
					label: {
						title: 'Field 3',
						attributes: {}
					},
					tag: 'input',
					name: 'rg_field3',
					attributes: [
						{attr: 'type', val: 'text'},
					]
				},
				,
				{
					model: 'field4',
					label: {
						title: 'Field 4',
						attributes: {}
					},
					tag: 'input',
					name: 'rg_field4',
					attributes: [
						{attr: 'type', val: 'text'},
					]
				}*/
			]
		}
	}
};

export default DocumentsConfig;