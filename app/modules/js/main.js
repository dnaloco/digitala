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
import 'angular-foundation';
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

import 'ngEqualizer';

import './templates';
import './filters';
import './controllers';
import './services';
import './directives';


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

  'ngEqualizer',

  'templates',
  'app.filters',
  'app.controllers',
  'app.services',
  'app.directives'
];


// mount on window for testing
window.modulesApp = angular.module('modulesApp', requires);

angular.module('modulesApp').constant('AppSettings', constants);
angular.module('modulesApp').constant('DocumentsConfig', documentsConfig);
angular.module('modulesApp').constant('ErrorsConfig', errorsConfig);

angular.module('modulesApp').config(onConfig);
angular.module('modulesApp').config(onInterceptor);
angular.module('modulesApp').config(onRoute);

angular.module('modulesApp').run(onRun);

angular.bootstrap(document, ['modulesApp'], {
  strictDi: true
});
