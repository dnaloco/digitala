function LayoutController() {
	'ngInject';

	const vm = this;

	vm.menu = [
		{title: 'Home', uiRef: 'Home'}
	];

	return vm;
}

export default {
  name: 'LayoutController',
  fn: LayoutController
};
