import angular      from 'angular';

// angular modules
import constants    from './constants';
import onConfig     from './on_config';
import onRun        from './on_run';
import 'angular-ui-router';
import 'angular-foundation-6';
import 'angular-masonry';
import 'ng-dialog';
import 'angular-messages';
import 'ngstorage';
import 'angular-jwt';
import './templates';
import './filters';
import './controllers';
import './services';
import './directives';

import './assets/angular-equalizer';

// create and bootstrap application
const requires = [
// vendors in node_modules
  'ngStorage',
  'ui.router',
  'mm.foundation',
  'wu.masonry',
  'ngDialog',
  'ngMessages',
  'angular-jwt',


// vendors in ./assets
  'ngEqualizer',

  'templates',
  'app.filters',
  'app.controllers',
  'app.services',
  'app.directives'
];


// mount on window for testing
window.app = angular.module('app', requires);

angular.module('app').constant('AppSettings', constants);

angular.module('app').config(onConfig);

angular.module('app').run(onRun);

angular.bootstrap(document, ['app'], {
  strictDi: true
});
