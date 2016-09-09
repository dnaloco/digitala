function CityService(Restangular) {
  'ngInject';

  const service = Restangular.service('public/cities');

/*  service.get = function() {
    return new Promise((resolve, reject) => {
      $http.get('apiPath').success((data) => {
        resolve(data);
      }).error((err, status) => {
        reject(err, status);
      });
    });
  };*/

  return service;

}

export default {
  name: 'CityService',
  fn: CityService
};
