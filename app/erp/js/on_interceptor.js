function OnInterceptor(
  $httpProvider,
  jwtOptionsProvider,
  RestangularProvider) {

  'ngInject';

  localStorage.removeItem('publicToken');

  // TODO: melhorar o interceptador da resposta...
  RestangularProvider.addResponseInterceptor(function (data, operation, what, url, response, deferred) {
    if (operation == "getList") {
      var responseData = response.data;
      if (responseData.total == undefined) return responseData.data;
      var newResponse = responseData.data;
      newResponse.total = responseData.total;

      return newResponse;
        //return { pagingInfo: responseData.paginginfo, data: responseData.result };
    }
    if (operation != "get") {
        //var item = { status: response.status };
        //feedBackFactory.showFeedBack(item);
    }

    return response.data;
  });



  jwtOptionsProvider.config({
      whiteListedDomains: ['api.agenciadigitala.local', 'api.agenciadigitala.com.br'],
      tokenGetter: ['options', 'PublicTokenService', 'LoginService', 'jwtHelper', '$q', function(options, PublicTokenService, LoginService, jwtHelper, $q) {

        var publicApi = new RegExp("/api/public/");
        var privateApi = new RegExp("/api/private/");

        var refreshToken = function() {
          var deferred = $q.defer();

          PublicTokenService.getToken().then(function(token) {
            localStorage.setItem('publicToken', token);
            deferred.resolve(token);
          });

          return deferred.promise;
        }


        if (options.url.substr(options.url.length - 5) == '.html' && !publicApi.test(options.url) && !privateApi.test(options.url)) {
          return null;
        }

        
        //return localStorage.getItem('publicToken');
        // public api...
        if (publicApi.test(options.url)) {
          

          //return refreshToken();
          console.log('tenho token publico?', localStorage.getItem('publicToken'));

          if (localStorage.getItem('publicToken') === null || localStorage.getItem('publicToken') === undefined) {
            console.log('Não. Gerando um novo.');
            return refreshToken();
          }

          if (jwtHelper.isTokenExpired(localStorage.getItem('publicToken'))) {
            console.log('Tenho, mas expirou.');
            return refreshToken();
          }
          console.log('Tenho.');
          return localStorage.getItem('publicToken');
        }

        if (privateApi.test(options.url)) {
          var deferred = $q.defer();
          LoginService.hasToken().then(function(response) {
            console.log('Tenho token privado?', response.success);
            LoginService.getToken().then(function(response) {
              console.log('Valor do token privado', response.value);
              deferred.resolve(response.value);
            })
          });

          return deferred.promise;

        }

      }]
  });

  $httpProvider.interceptors.push('jwtInterceptor');

}

export default OnInterceptor;
