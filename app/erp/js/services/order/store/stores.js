function StoresService(Restangular) {
  'ngInject';

  var privateUrl = 'private/order-store/stores';

  const service = {
    getList:   getList,
    getOne:    getOne,
    save:   save,
    edit:   edit,
    delete: delete,
  };

  function getList(options) {
    return Restangular.all(privateUrl).getList(options);
  }

  function getOne(id, options) {
    return Restangular.one(privateUrl, id).get(options);
  }

  return service;

}

export default {
  name: 'OrderssService',
  fn: OrderssService
};
