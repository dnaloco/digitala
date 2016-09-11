function CityService(Restangular) {
  'ngInject';

  const service = Restangular.service('public/cities');;

/*  service.get = function() {
    return new Promise((resolve, reject) => {
      $http.get('http://api.agenciadigitala.local/api/public/cities').success((data) => {
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
