function StatesService(Restangular) {
  'ngInject';


  var publicUrl = 'public/states';
  var privateUrl = 'private/states';

  const service = {
    getList:   getList,
    getOne:    getOne,
    save:   save,
    edit:   edit,
    remove: remove,
  };

  function getList(options) {
    return Restangular.all(privateUrl).getList(options);
  }

  function getOne(id, options) {
    return Restangular.one(privateUrl, id).get(options);
  }

  function save(id, data) {

  }

  function edit(id, data) {

  }

  function remove(id) {

  }

  return service;

}

export default {
  name: 'StatesService',
  fn: StatesService
};
