function ProductFeaturesService(Restangular) {
  'ngInject';

  var privateUrl = 'private/product/features';

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
  name: 'FeaturesService',
  fn: FeaturesService
};
