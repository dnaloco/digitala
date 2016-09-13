function UserService(Restangular) {
  'ngInject';

  const service = Restangular.service('public/users');;

  return service;

}

export default {
  name: 'UserService',
  fn: UserService
};