function CitiesService(Restangular) {
  'ngInject';


  var publicUrl = 'public/cities';
  var privateUrl = 'private/cities';

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
  name: 'CitiesService',
  fn: CitiesService
};
