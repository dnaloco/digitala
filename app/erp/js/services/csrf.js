function CsrfFormService(Restangular) {
  'ngInject';

  const service = Restangular.service('public/csrf');

  return service;

}

export default {
  name: 'CsrfFormService',
  fn: CsrfFormService
};
