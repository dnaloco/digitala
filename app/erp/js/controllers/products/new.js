function NewProductController($document) {
  // injetando dependência
  'ngInject';

  // ViewModel
  const vm = this;

  var newProductView = angular.element(document.getElementById('da-product-new'));
  console.log('NewProductController');

  $document.scrollToElement(newProductView, 0, 1000);

}


export default {
  name: 'NewProductController',
  fn: NewProductController
};
