function OnInterceptor(
  $httpProvider,
  jwtOptionsProvider,
  RestangularProvider) {

  'ngInject';
  console.log('INTERCEPTOR');
  // TODO: melhorar o interceptador da resposta...
  RestangularProvider.addResponseInterceptor(function (data, operation, what, url, response, deferred) {
    console.log('RestangularProvider response', response);
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

/*
  jwtInterceptorProvider.tokenGetter = ['config', function(config) {
    var patt = new RegExp("/api/");
    
    if (config.url.substr(config.url.length - 5) == '.html' || !patt.test(config.url)) {
      return null;
    }
    console.log('CONFIG', config);
    //return localStorage.getItem('JWT');
  }];
  $httpProvider.interceptors.push('jwtInterceptor');
*/
  jwtOptionsProvider.config({
      tokenGetter: ['options', 'PublicTokenService', function(options, PublicTokenService) {

      var publicApi = new RegExp("/api/public/");
      var privateApi = new RegExp("/api/private/");

      if (options.url.substr(options.url.length - 5) == '.html' || !publicApi.test(options.url)) {
        return null;
      }

      if (publicApi.test(options.url)) {
        PublicTokenService.get();
        return localStorage.getItem('publicToken');
      }

      if (privateApi.test(options.url)) {
        //return localStorage.getItem('privateToken');
      }

    }]
  });

  $httpProvider.interceptors.push('jwtInterceptor');

  // jwtInterceptorProvider.tokenGetter = ['config', function(config) {
  //   var patt = new RegExp("/api/");
  //   if (config.url.substr(config.url.length - 5) == '.html' || !patt.test(config.url)) {
  //     return null;
  //   }
  //   return localStorage.getItem('JWT');
  // }];

  // $httpProvider.interceptors.push('RestInterceptor');
  // $httpProvider.interceptors.push('jwtInterceptor')

}

export default OnInterceptor;
