var myModule = angular.module('myModule',[]);

myModule.directive('myDirective', function () {
	return {
		template: "<h2>Hello, world!</h2>"
	};
});

