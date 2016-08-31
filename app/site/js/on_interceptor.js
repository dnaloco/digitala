function OnInterceptor(
  $httpProvider,
  jwtInterceptorProvider) {

  'ngInject';

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
