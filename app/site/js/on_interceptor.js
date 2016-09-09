function OnInterceptor(
  $httpProvider,
  jwtInterceptorProvider,
  RestangularProvider) {

  'ngInject';

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
