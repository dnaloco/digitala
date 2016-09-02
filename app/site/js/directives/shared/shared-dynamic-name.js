function sharedDynamicName($compile, $parse) {
  'ngInject';

  return {
    restrict: 'A',
    terminal: false,
    priority: 100000,
    compile: function (el, attr) {
      var name = $parse(el.attr('shared-dynamic-name'));
      el.attr('name', name);

      var fieldName = $compile(el, null, 9999);

      return function (scope) {
        fieldName(scope);
      };
    }
  };
}

export default {
  name: 'sharedDynamicName',
  fn: sharedDynamicName
};



/*angular.module('test').directive('dynamicName', function($compile, $parse) {
  return {
    restrict: 'A',
    terminal: true,
    priority: 100000,
    link: function(scope, elem) {
      var name = $parse(elem.attr('dynamic-name'))(scope);
      // $interpolate() will support things like 'skill'+skill.id where parse will not
      elem.removeAttr('dynamic-name');
      elem.attr('name', name);
      $compile(elem)(scope);
    }
  };
});*/