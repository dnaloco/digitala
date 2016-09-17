const requires = [
  'xdLocalStorage',
  'restangular'
];

window.daAuthentication = angular.module('daAuthentication', requires);

angular.module('daAuthentication').run(['xdLocalStorage', function (xdLocalStorage) {
	xdLocalStorage.init({
      iframeUrl:'http://www.agenciadigitala.local:80/cross-domain-storage/magical-frame.html'
  }).then(function () {
    console.log('Got iframe ready');
  });

}]);

angular.module('daAuthentication').factory('DaAuthLogin', ['Restangular', function (Restangular, xdLocalStorage) {
	const service = Restangular.service('public/login');

	  service.hasToken = function () {
	    return xdLocalStorage.key('privateToken');
	    //return localStorage.getItem('privateToken') !== null && localStorage.getItem('privateToken') !== undefined;
	  }

	  service.getToken = function () {
	    return xdLocalStorage.getItem('privateToken');
	  	//return localStorage.getItem('privateToken');
	  };

	  service.setToken = function (token) {
	    return xdLocalStorage.setItem('privateToken', token);
	    //localStorage.setItem('privateToken', token);
	  };

	  service.removeToken = function () {
	    return xdLocalStorage.removeItem('privateToken');
	  	//localStorage.removeItem('privateToken');
	  }

	  return service;
	}

])