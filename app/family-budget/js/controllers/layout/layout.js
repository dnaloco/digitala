function LayoutController($rootScope, LoginService, jwtHelper, $state, StatesService, $scope, $location) {
	'ngInject';

	const vm = this;

	vm.menu = [
		{title: 'Home', uiRef: 'Home'}
	];

	vm.user = {};


	vm.user.email = null;
	vm.user.name = null;

	function updateUser() {
		LoginService.getUserEmail().then(function (result) {
			vm.user.email = result.value;
		});

		LoginService.getUserName().then(function (result) {
			vm.user.name = result.value;
		})
	}

	$scope.$watch('$root.iframeLoaded', function () {
		if ($rootScope.iframeLoaded) {
			updateUser();
		}
	})

	vm.logout = function () {
		LoginService.removeToken();
		$state.go('Login');
	};

	$rootScope.$on('refreshPage', function () {
		$state.go('Home', {}, {reload: true});
		vm.user.email = null;
		vm.user.name = null;
		window.location.reload(); 
	})

	return vm;
}

export default {
  name: 'LayoutController',
  fn: LayoutController
};