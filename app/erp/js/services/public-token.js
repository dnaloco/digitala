function PublicTokenService($http) {
  'ngInject';

  const service = {};

  service.get = function() {
    return new Promise((resolve, reject) => {
      $http({
        url: '/api/public/public-token',
        skipAuthorization: true,
        method: 'GET'
      }).success((data) => {
        var token = data.token;
        localStorage.setItem('publicToken', token);
        console.log('TOKEN FROM PUBLIC TOKEN SERVICE', token);
        resolve(token);
      }).error((err, status) => {
        reject(err, status);
      })
    });
  };

  return service;

}

export default {
  name: 'PublicTokenService',
  fn: PublicTokenService
};



