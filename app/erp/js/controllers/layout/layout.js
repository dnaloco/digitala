function LayoutController($rootScope, LoginService, jwtHelper, $state, StatesService, $scope) {
	'ngInject';

	const vm = this;

	vm.menu = [
		{title: 'Home', uiRef: 'Home'}
	];

	vm.user = {};

	console.log('LAYOUT CONTROLLER');

	$scope.$watch('$root.iframeLoaded', function () {
		console.log('VAL', $rootScope.iframeLoaded);

		if ($rootScope.iframeLoaded) {
			LoginService.getUserEmail().then(function (result) {
				vm.user.email = result.value;
			});

			LoginService.getUserName().then(function (result) {
				vm.user.name = result.value;
			});

		}
	})

	vm.logout = function () {
		LoginService.removeToken();
		$state.go('Login');
	};

	return vm;
}

export default {
  name: 'LayoutController',
  fn: LayoutController
};
