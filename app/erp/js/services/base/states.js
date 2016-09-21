function StatesService(Restangular) {
  'ngInject';


  var publicUrl = 'public/states';
  var privateUrl = 'private/states';

  const service = {
    getStates: getStates,
    getState: getState
  };

  function getStates(options) {
    return Restangular.all(privateUrl).getList(options);
  }

  function getState(cityId, options) {
    return Restangular.one(privateUrl, cityId).get(options);
  }

  return service;

}

export default {
  name: 'StateService',
  fn: StateService
};
