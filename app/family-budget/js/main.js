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
import 'ng-dialog';
import 'ngstorage';
import 'angular-jwt';
import 'restangular';
import 'angular-loading-bar';
import 'ng-lodash';
import 'ng-xdLocalStorage';
import 'angular-animate';
import 'angular-aria';
import 'angular-foundation';
import 'angular-material';
import 'angular-breadcrumb';
import 'v-accordion';
import 'angular-locale-pt';

import './templates';
import './filters';
import './controllers';
import './services';
import './directives';


// create and bootstrap application
const requires = [
// vendors in node_modules
  'ui.router',
  'ngDialog',
  'ngStorage',
  'angular-jwt',
  'restangular',
  'angular-loading-bar',
  'ngLodash',
  'xdLocalStorage',
  'ngAnimate',
  'ngAria',
  'mm.foundation',
  'ngMaterial',
  'ncy-angular-breadcrumb',
  'vAccordion',

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
