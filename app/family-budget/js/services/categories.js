function FBCategoriesService(Restangular) {
  'ngInject';

  var privateUrl = 'private/fb-categories';

  const service = {
    getList:   getList,
    getOne:    getOne,
    save:   save,
    edit:   edit,
    remove: remove
  };

  function getList(options) {
    return Restangular.all(privateUrl).getList(options);
  }

  function getOne(userId, options) {
    return Restangular.one(privateUrl, userId).get(options);
  }

  function save(scope) {
    return Restangular.all(privateUrl).post(scope);
  }


  function edit(id, scope) {
    return Restangular.one(privateUrl, id).customPUT(scope);
  }

  function remove(id) {
    return Restangular.one(privateUrl, id).remove();
  }

  return service;

}

export default {
  name: 'FBCategoriesService',
  fn: FBCategoriesService
};