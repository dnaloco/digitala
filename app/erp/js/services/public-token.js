function PublicTokenService($http) {
  'ngInject';

  const service = {};

  service.getToken = function() {
    return new Promise((resolve, reject) => {
      $http({
        url: '/api/public/public-token',
        skipAuthorization: true,
        method: 'GET'
      }).success((data) => {
        console.info('novo token gerado...');
        var token = data.token;
        resolve(token);
      }).error((err, status) => {
        console.error('Erro ao gerar token', 'Erro: ' + err + ' | Status: ' + status);
        reject(err, status);
      });
    });
  };

  return service;

}

export default {
  name: 'PublicTokenService',
  fn: PublicTokenService
};



