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
import 'angular-moment';


// add to module
import 'angular-ui-sortable';

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
  'angularMoment',

  'templates',
  'base.filters',
  'base.controllers',
  'base.services',
  'base.directives'
];

if (window.myApp === undefined) {
	window.myApp = {};
}

window.myApp.baseModule = angular.module('myApp.baseModule', requires);

angular.module('myApp.baseModule').constant('AppSettings', constants);
angular.module('myApp.baseModule').constant('DocumentsConfig', documentsConfig);
angular.module('myApp.baseModule').constant('ErrorsConfig', errorsConfig);

angular.module('myApp.baseModule').config(onConfig);
angular.module('myApp.baseModule').config(onInterceptor);

angular.module('myApp.baseModule').run(onRun);

