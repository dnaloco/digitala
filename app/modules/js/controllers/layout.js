function LayoutController($rootScope, LoginService, jwtHelper, $state) {
	'ngInject';

	const vm = this;

	vm.menu = [
		{title: 'Home', uiRef: 'Home'}
	];

	console.log('LAYOUT CONTROLLER');

	vm.logged = false;

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
		$state.go('Login');
	};

	return vm;
}

export default {
  name: 'LayoutController',
  fn: LayoutController
};
