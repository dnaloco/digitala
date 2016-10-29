function CsrfFormService($http) {
  'ngInject';
  console.log('CsrfFormService from base module');
  const service = {};

  service.getCsrf = function(formToken) {
    return new Promise((resolve, reject) => {
      $http({
        url: '/api/public/csrf-form',
        skipAuthorization: true,
        method: 'GET',
        params: {'formName': formToken}
      }).success((data) => {
        console.info('novo csrf gerado...');
        resolve(data.formToken);
      }).error((err, status) => {
      	console.error('Csrf com problema...')
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
