function ModulesService(Restangular) {
  'ngInject';

  var privateUrl = 'private/modules';

  const service = {
    getModules: getModules,
    getModule: getModule
  };

  function getModules(options) {
    return Restangular.all(privateUrl).getList(options);
  }

  function getModule(moduleId, options) {
    return Restangular.one(privateUrl, moduleId).get(options);
  }

  return service;

}

export default {
  name: 'ModulesService',
  fn: ModulesService
};
