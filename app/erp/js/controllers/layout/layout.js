function LayoutController($rootScope, LoginService, jwtHelper, $state, StatesService) {
	'ngInject';

	const vm = this;

	vm.menu = [
		{title: 'Home', uiRef: 'Home'}
	];

	console.log('LAYOUT CONTROLLER');

	vm.logged = false;

	StatesService.getList().then(function(result) {
		console.log('RESULT', result);
	})

	$rootScope.$on('isLogged', function(value) {
		vm.logged = true;
	})

	$rootScope.$on('iframeReady', function () {
	    LoginService.getToken().then(function(response) {
	    	console.log('Login token resp', response);
	    	console.log('Login token isTokenExpired', jwtHelper.isTokenExpired(response.value));
	    	console.log('Login token undefined', response.value === undefined);
	    	if (response.value === undefined) $state.go('Login');
	    	if (response.value === null) $state.go('Login');
	    	if (jwtHelper.isTokenExpired(response.value)) $state.go('Login');

	    	vm.logged = true;
	    })
	  });

	vm.logout = function () {
		LoginService.removeToken();
		vm.logged = false;
		$state.go('Login');
	};

	return vm;
}

export default {
  name: 'LayoutController',
  fn: LayoutController
};
