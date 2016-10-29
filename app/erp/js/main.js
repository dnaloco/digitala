import angular      from 'angular';

//import angular      from 'angular2';
//import 'angular-component';

// angular modules
import constants    from './constants';
import documentsConfig    from './configs/documents';
import errorsConfig    from './configs/errors';
import onConfig     from './on_config';
import onInterceptor     from './on_interceptor';
import onRoute     from './on_route';
import onRun        from './on_run';

import 'angular-ui-router';

import 'angular-masonry';
import 'ng-dialog';
import 'angular-messages';
import 'ngstorage';
import 'angular-jwt';
import 'angular-input-masks';
import 'ngCart';
import 'ng-file-upload';
import 'restangular';
import 'angular-google-analytics';
import 'angular-translate';
import 'angular-translate-loader-url';
import 'angular-translate-loader-static-files';
import 'angular-smart-table';
import 'ng-sortable';
import 'angular-loading-bar';
import 'ng-autocomplete';
import 'angular-xeditable';
import 'angular-busy';
import 'ng-lodash';
import 'angular-smart-table';
import 'ng-xdLocalStorage';
import 'angular-scroll';
import 'angular-animate';
import 'angular-aria';
import 'angular-foundation';
import 'angular-material';
import 'ngEqualizer';
import 'sir-accordion';
import 'angular-material-sidemenu';
import 'angular-breadcrumb';

import './templates';
import './filters';
import './controllers';
import './services';
import './directives';


// create and bootstrap application
const requires = [
// vendors in node_modules
  'ui.router',
  'wu.masonry',
  'ngDialog',
  'ngMessages',
  'ngStorage',
  'angular-jwt',
  'ui.utils.masks',
  'ngFileUpload',
  'restangular',
  'angular-google-analytics',
  'pascalprecht.translate',
  'smart-table',
  'as.sortable',
  'angular-loading-bar',
  'ngAutocomplete',
  'xeditable',
  'cgBusy',
  'ngLodash',
  'smart-table',
  'xdLocalStorage',
  'duScroll',
  'ngAnimate',
  'ngAria',
  'mm.foundation',
  'ngMaterial',
  'ngEqualizer',
  'sir-accordion',
  'ngMaterialSidemenu',
  'ncy-angular-breadcrumb',
  'myApp.baseModule',

  'templates',
  'app.filters',
  'app.controllers',
  'app.services',
  'app.directives'
];


// mount on window for testing
window.myApp = angular.module('myApp', requires);

angular.module('myApp').constant('AppSettings', constants);
angular.module('myApp').constant('DocumentsConfig', documentsConfig);
angular.module('myApp').constant('ErrorsConfig', errorsConfig);

angular.module('myApp').config(onConfig);
angular.module('myApp').config(onInterceptor);
angular.module('myApp').config(onRoute);

angular.module('myApp').run(onRun);

angular.bootstrap(document, ['myApp'], {
  strictDi: true
});
