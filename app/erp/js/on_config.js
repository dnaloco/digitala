function OnConfig(
  $locationProvider,
  $compileProvider,
  RestangularProvider,
  AppSettings,
  $httpProvider
  ) {

  'ngInject';
  

  if (process.env.NODE_ENV === 'production') {
    $compileProvider.debugInfoEnabled(false);
  }

  $locationProvider.html5Mode(true);

  // RestangularProvider.setDefaultHttpFields({withCredentials: true});
  // RestangularProvider.setDefaultHeaders({'Access-Control-Allow-Origin' : 'http://erp.agenciadigitala.local:80'});
  RestangularProvider.setBaseUrl(AppSettings.apiUrl);

  // $httpProvider.defaults.useXDomain = true;
  // $httpProvider.defaults.withCredentials = true;
  // delete $httpProvider.defaults.headers.common["X-Requested-With"];
  // $httpProvider.defaults.headers.common["Accept"] = "application/json";
  // $httpProvider.defaults.headers.common["Content-Type"] = "application/json";

}

export default OnConfig;
