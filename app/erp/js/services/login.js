function LoginService(Restangular) {
  'ngInject';

  var publicSrv = Restangular.service('public/login');

  const service = Restangular.service('public/login');

  service.hasToken = function () {
    return localStorage.getItem('privateToken') !== null && localStorage.getItem('privateToken') !== undefined;
  }

  service.getToken = function () {
  	return localStorage.getItem('privateToken');
  };

  service.setToken = function (token) {
    localStorage.setItem('privateToken', token);
  };

  service.removeToken = function () {
  	localStorage.removeItem('privateToken');
  }

  return service;

}

export default {
  name: 'LoginService',
  fn: LoginService
};