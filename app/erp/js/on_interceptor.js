function OnInterceptor(
  $httpProvider,
  jwtOptionsProvider,
  RestangularProvider) {

  'ngInject';


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
      //whiteListedDomains: ['api.agenciadigitala.local', 'api.agenciadigitala.com.br'],
      tokenGetter: ['options', 'PublicTokenService', 'jwtHelper', function(options, PublicTokenService, jwtHelper) {

        var publicApi = new RegExp("/api/public/");
        var privateApi = new RegExp("/api/private/");
        var refreshToken = function () {
          PublicTokenService.get().then(function(token) {
            //console.log('Token valido até ' + jwtHelper.getTokenExpirationDate(token));
            return token;
          }).then(function(err) {
            console.error('Error', err);
            throw 'Where the hell is the fuckin\' token? Error: ' + err;
          });;
        }

        if (options.url.substr(options.url.length - 5) == '.html' && !publicApi.test(options.url) && !privateApi.test(options.url)) {
          return null;
        }
        // public api...
        if (publicApi.test(options.url)) {
          //return refreshToken();
          //console.log('tenho token?');
          if (!localStorage.getItem('publicToken') || localStorage.getItem('publicToken') === null) {
            //console.log('Viiiiishh, que descuido o meu, estou sem token. Deixa eu providenciar um novinho em folha para você, meu caro.');
            return refreshToken();
          }

          if (jwtHelper.isTokenExpired(localStorage.getItem('publicToken'))) {
            //console.log('Tenho, mas ele já expirou. Calma ai que eu vou preparar um quentinho só pra você...');
            return refreshToken();
          }
          //console.log('Ufa! Tenho sim, segura!');
          return localStorage.getItem('publicToken');
        }

        if (privateApi.test(options.url)) {
          //return localStorage.getItem('privateToken');
        }

      }]
  });

  $httpProvider.interceptors.push('jwtInterceptor');

}

export default OnInterceptor;
