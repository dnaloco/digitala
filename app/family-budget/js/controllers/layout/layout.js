function LayoutController($rootScope, LoginService, jwtHelper, $state, StatesService, $scope, $location) {
	'ngInject';

	const vm = this;

	vm.menu = [
		{title: 'Home', uiRef: 'Home'}
	];

	vm.user = {};

	console.log('LAYOUT CONTROLLER');

	vm.user.email = null;
	vm.user.name = null;

	function updateUser() {
		LoginService.getUserEmail().then(function (result) {
			vm.user.email = result.value;
		});

		LoginService.getUserName().then(function (result) {
			console.log('VALOR NOME LAYOUT', result.value);
			vm.user.name = result.value;
		})
	}

	$scope.$watch('$root.iframeLoaded', function () {
		console.log('VAL', $rootScope.iframeLoaded);
		if ($rootScope.iframeLoaded) {
			updateUser();
		}
	})

	vm.logout = function () {
		LoginService.removeToken();
		$state.go('Login');
	};

	$rootScope.$on('refreshPage', function () {
		console.log('ATUALIZAR PÁGINA');
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