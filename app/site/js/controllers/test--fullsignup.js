function TestFullsignupController(ngDialog) {
  // injetando dependência
  'ngInject';

  // ViewModel
  const vm = this;

  var _address = {
  	type: null,
  	city: null,
  	address1: null,
  	address2: null,
  	number: null,
  	residentialArea: null,
  	postalCode: null
  };

  var _telephone = {
  	answerable: null,
  	type: null,
  	number: null,
  	mobileOperator: null,
  	DDD: null,
  	noter: null
  };

  var _email = {
  	anwserable: null,
  	address: null
  };

  var _socialNetwork = {
  	type: null,
  	address:null
  };

  var _document = {
  	field1: null,
  	field2: null,
  	field3: null,
  	field4: null,
  	field5: null,
  	images: [],
  	files: [],
  };

  var _goodTag = {
  	name: null,
  	description: null
  };

  vm.user = {
  	user: null,
  	password: null,
  	person: {
  		name: null,
  		gender: null,
  		birthdate: null,
  		description: null,
  		photo: null,
  		addresses: [],
  		telephones: [],
  		emails: [],
  		socialNetworks: [],
  		documents: [],
  		website: null
  	},
  	company: {
  		tradingName: null,
  		companyName: null,
  		category: null,
  		website: null,
  		telephones: [],
  		documents: [],
  		emails: [],
  		socialNetworks: [],
  		addresses: [],
  		description: null,
  		logo: null,
  		goodTags: []
  	}
  }
}


export default {
  name: 'TestFullsignupController',
  fn: TestFullsignupController
};
