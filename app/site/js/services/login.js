function LoginService(Restangular, xdLocalStorage) {
  'ngInject';

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

export default {
  name: 'LoginService',
  fn: LoginService
};