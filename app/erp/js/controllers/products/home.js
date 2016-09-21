function HomeProductsController() {
  // injetando dependência
  'ngInject';

  // ViewModel
  const vm = this;

  console.log('HomeProductsController');

  vm.tabs = [
    { title:"Produtos", content:"pages/products/list.html" },
    { title:"Fabricantes", content:"pages/products/manufacturers.html" },
    { title:"Departamentos", content:"pages/products/departments.html" },
    { title:"Categorias", content:"pages/products/categories.html" },
    { title:"Características", content:"pages/products/features.html" },
    { title:"Cupons", content:"pages/products/coupons.html" },
    { title:"Mix de Produtos", content:"pages/products/mix-products.html" },
  ];

}


export default {
  name: 'HomeProductsController',
  fn: HomeProductsController
};
