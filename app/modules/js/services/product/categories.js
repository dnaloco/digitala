function ProductCategoriesService(Restangular) {
  'ngInject';

  var privateUrl = 'private/product/categories';

  const service = {
    getList:   getList,
    getOne:    getOne,
    save:   save,
    edit:   edit,
    remove: remove
  };

  function getList(options) {
    return Restangular.all(publicUrl).getList(options);
  }

  function getOne(userId, options) {
    return Restangular.one(publicUrl, userId).get(options);
  }

  function save(scope) {
    return Restangular.all(publicUrl).post(scope);
  }


  function edit(scope) {
    return scope.put();
  }

  function remove(scope) {
    return scope.remove();
  }

  return service;

}

export default {
  name: 'ProductCategoriesService',
  fn: ProductCategoriesService
};
