function OnInterceptor(
  $httpProvider,
  jwtOptionsProvider,
  RestangularProvider) {

  'ngInject';

  localStorage.removeItem('publicToken');

  // TODO: melhorar o interceptador da resposta...
  RestangularProvider.addResponseInterceptor(function (data, operation, what, url, response, deferred) {
    console.log('RESTANGULAR RESPONSE', response);
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

}

export default OnInterceptor;
