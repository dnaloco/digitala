function FBBillingsService(Restangular) {
  'ngInject';

  var privateUrl = 'private/fb-billings';

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


  function edit(scope) {
    return scope.put();
  }

  function remove(scope) {
    return scope.remove();
  }

  return service;

}

export default {
  name: 'FBBillingsService',
  fn: FBBillingsService
};
