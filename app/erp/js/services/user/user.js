function UserService(Restangular) {
  'ngInject';


  var publicUrl = 'public/users';
  var privateUrl = 'private/users';

  const service = {
    getUsers: getUsers,
    getUser: getUser,
    saveUser: saveUser,
    editUser: editUser,
    deleteUser: deleteUser,
  };

  function getUsers(options) {
    return Restangular.all(publicUrl).getList(options);
  }

  function getUser(userId, options) {
    return Restangular.one(publicUrl, userId).get(options);
  }

  function saveUser(scope) {
  	return Restangular.all(publicUrl).post(scope);
  }


  function editUser(scope) {
  	return scope.put();
  }

  function deleteUser(scope) {
  	return scope.remove();
  }

  return service;

}

export default {
  name: 'UserService',
  fn: UserService
};