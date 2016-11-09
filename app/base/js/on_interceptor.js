function OnInterceptor(
  RestangularProvider,
  $httpProvider,
  jwtOptionsProvider
  ) {

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
      whiteListedDomains: ['api.agenciadigitala.local', 'api.agenciadigitala.com.br'],
      tokenGetter: ['options', 'PublicTokenService', 'LoginService', 'jwtHelper', '$q', '$state', '$rootScope',

        function(options, PublicTokenService, LoginService, jwtHelper, $q, $state, $rootScope) {

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


          if (publicApi.test(options.url)) {

            if (localStorage.getItem('publicToken') === null || localStorage.getItem('publicToken') === undefined) {
              return refreshToken();
            }

            if (jwtHelper.isTokenExpired(localStorage.getItem('publicToken'))) {
              return refreshToken();
            }

            return localStorage.getItem('publicToken');
          }

          if (privateApi.test(options.url)) {

            var deferred = $q.defer();

            $rootScope.$watch('iframeLoaded', function (val) {
              if (val) {
                LoginService.getToken().then(function(response) {
                  if (response.value === undefined) {
                    deferred.resolve(localStorage.getItem('publicToken'));
                    $state.go('Login');
                    return;
                  }

                  if (response.value === null) {
                    deferred.resolve(localStorage.getItem('publicToken'));
                    $state.go('Login');
                    return;
                  }

                  if (jwtHelper.isTokenExpired(response.value)) {
                    deferred.resolve(localStorage.getItem('publicToken'));
                    $state.go('Login');
                    return;
                  }

                  deferred.resolve(response.value);
                });
              }
            });

            return deferred.promise;

          }

        }]
    });

  $httpProvider.interceptors.push('jwtInterceptor');

}

export default OnInterceptor;
