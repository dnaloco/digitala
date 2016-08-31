function RestInterceptor($q, $localStorage) {
  'ngInject';

  const service = {};

  service.request = function(config) {
    console.log('INTERCEPTOR CALLED', config.url);
    var patt = new RegExp("/api/");

      // we need filter the config object to ensure only check our API response.
      if(patt.test(config.url)) {
          console.log('REST API INTERCEPTED...');

          localStorage.setItem('JWT', 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiIxMjM0NTY3ODkwIiwibmFtZSI6IkpvaG4gRG9lIiwiYWRtaW4iOnRydWV9.TJVA95OrM7E2cBab30RMHrHDcEfxjoYZgeFONFh7HgQ');
          //response.status = 400;

          //return $q.reject(response);
      }

      return config || $q.when(config);
  }

  return service;

}

export default {
  name: 'RestInterceptor',
  fn: RestInterceptor
};
