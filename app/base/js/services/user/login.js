function LoginService(Restangular, xdLocalStorage, jwtHelper) {
  'ngInject';

  const service = Restangular.service('public/login');


  service.getUserEmail = function () {
    return xdLocalStorage.getItem('userEmail');
  }

  service.getUserName = function () {
    return xdLocalStorage.getItem('userName');
  }


  service.getToken = function () {
    return xdLocalStorage.getItem('privateToken');
    //return localStorage.getItem('privateToken');
  };

  service.setToken = function (token) {
    var tokenPayload = jwtHelper.decodeToken(token);
    console.log('tokenPayload', tokenPayload);
    xdLocalStorage.setItem('userEmail', tokenPayload.email);
    xdLocalStorage.setItem('userName', tokenPayload.name);

    return xdLocalStorage.setItem('privateToken', token);
    //localStorage.setItem('privateToken', token);
  };

  service.removeToken = function () {
    xdLocalStorage.removeItem('user');
    xdLocalStorage.removeItem('userEmail');
    xdLocalStorage.removeItem('userName');
    return xdLocalStorage.removeItem('privateToken');
    //localStorage.removeItem('privateToken');
  }

  return service;

}

export default {
  name: 'LoginService',
  fn: LoginService
};

