function sharedAnotherDynamicName($compile, $parse) {
  'ngInject';

  return {
    restrict:"A",
    terminal:true,
    priority:1000,
    link:function(scope,element,attrs){
        element.attr('name', scope.$eval(attrs.dynamicName));
        element.removeAttr("dynamic-name");
        $compile(element)(scope);
    }
  };
}

export default {
  name: 'sharedAnotherDynamicName',
  fn: sharedAnotherDynamicName
};










/*myApp.directive("dynamicName",function($compile){
  return {
      restrict:"A",
      terminal:true,
      priority:1000,
      link:function(scope,element,attrs){
          element.attr('name', scope.$eval(attrs.dynamicName));
          element.removeAttr("dynamic-name");
          $compile(element)(scope);
      }
   };
});*/