function OnConfig(
  $locationProvider,
  $compileProvider,
  RestangularProvider,
  AppSettings
  ) {

  'ngInject';

  if (process.env.NODE_ENV === 'production') {
    $compileProvider.debugInfoEnabled(false);
  }

  $locationProvider.html5Mode(true);

  RestangularProvider.setBaseUrl(AppSettings.apiUrl);


}

export default OnConfig;
