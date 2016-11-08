function daBaseCompany () {
	'ngInject';

	return {
		restrict: 'E',
		templateUrl: 'directives/forms/company.html',
		link: function (scope, element, attrs) {
			console.log('DA BASE COMPANY');
		}
	};

}

export default {
  name: 'daBaseCompany',
  fn: daBaseCompany
};
