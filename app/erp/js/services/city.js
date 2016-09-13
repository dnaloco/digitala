function CityService(Restangular) {
  'ngInject';


  var publicUrl = 'public/cities';
  var privateUrl = 'private/cities';

  const service = {
    getCities: getCities,
    getCity: getCity
  };

  function getCities(options) {
    return Restangular.all(privateUrl).getList(options);
  }

  function getCity(cityId, options) {
    return Restangular.one(publicUrl, cityId).get(options);
  }

  return service;

}

export default {
  name: 'CityService',
  fn: CityService
};
