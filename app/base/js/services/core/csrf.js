function CsrfFormService($http) {
  'ngInject';

  const service = {};

  service.getCsrf = function(formToken) {
    return new Promise((resolve, reject) => {
      $http({
        url: '/api/public/csrf-form',
        skipAuthorization: true,
        method: 'GET',
        params: {'formName': formToken}
      }).success((data) => {

        resolve(data.formToken);
      }).error((err, status) => {

        reject(err, status);
      });
    });
  };

  return service;

}

export default {
  name: 'CsrfFormService',
  fn: CsrfFormService
};
