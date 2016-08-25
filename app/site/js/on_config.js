function OnConfig(
  $locationProvider,
  $compileProvider,
  ) {

  'ngInject';

  if (process.env.NODE_ENV === 'production') {
    $compileProvider.debugInfoEnabled(false);
  }

  $locationProvider.html5Mode(true);


}

export default OnConfig;
