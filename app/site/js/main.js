import angular      from 'angular';

//import angular      from 'angular2';
//import 'angular-component';

// angular modules
import constants    from './constants';
import documentsConfig    from './configs/documents';
import errorsConfig    from './configs/errors';
import onConfig     from './on_config';
//import onInterceptor     from './on_interceptor';
import onRoute     from './on_route';
import onRun        from './on_run';

import 'angular-ui-router';
import 'angular-foundation-6';
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

import 'ngEqualizer';

import './templates';
import './filters';
import './controllers';
import './services';
import './directives';

// assets
//import 'angular-equalizer';


// modules
//import 'modules/myModule/myModule';

//import '../assets/angular-equalizer';


// create and bootstrap application
const requires = [
// vendors in node_modules
  'ui.router',
  'mm.foundation',
  'wu.masonry',
  'ngDialog',
  'ngMessages',
  'ngStorage',
  'angular-jwt',
  'ui.utils.masks',
  'ngCart',
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

  'ngEqualizer',
/*  'ngStorage',
  'ui.router',
  'mm.foundation',
  'wu.masonry',
  'ngDialog',
  'ngMessages',
  'angular-jwt',*/
  //'ui.utils.masks',

  //assets
  //'ngEqualizer',
  
  //'ngCart',
  //'myModule',

  'templates',
  'app.filters',
  'app.controllers',
  'app.services',
  'app.directives'
];


// mount on window for testing
window.app = angular.module('app', requires);

angular.module('app').constant('AppSettings', constants);
angular.module('app').constant('DocumentsConfig', documentsConfig);
angular.module('app').constant('ErrorsConfig', errorsConfig);

angular.module('app').config(onConfig);
//angular.module('app').config(onInterceptor);
angular.module('app').config(onRoute);

angular.module('app').run(onRun);

angular.bootstrap(document, ['app'], {
  strictDi: true
});

