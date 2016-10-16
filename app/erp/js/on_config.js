function OnConfig(
  $locationProvider,
  $compileProvider,
  RestangularProvider,
  AppSettings,
  cfpLoadingBarProvider
  ) {

  'ngInject';

  if (process.env.NODE_ENV === 'production') {
    $compileProvider.debugInfoEnabled(false);
  }
  cfpLoadingBarProvider.parentSelector = '#loading-bar-container';
  cfpLoadingBarProvider.spinnerTemplate = '<div class="loading-bar-block"><span class="fa fa-spinner">Carregando...</div>';

  $locationProvider.html5Mode(true);

  RestangularProvider.setBaseUrl(AppSettings.apiUrl);


}

export default OnConfig;
