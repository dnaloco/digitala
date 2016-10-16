function ProductsTabController(StatesService) {
  // injetando dependência
  'ngInject';

  StatesService.getList().then(function(data) {
    console.log('DATA: ', data);
  })
  // ViewModel
  const vm = this;



  console.log('ProductsTabController');
}


function ManufacturersTabController() {
  // injetando dependência
  'ngInject';

  // ViewModel
  const vm = this;

  console.log('ManufacturersTabController');
}

function DepartmentsTabController() {
  // injetando dependência
  'ngInject';

  // ViewModel
  const vm = this;

  console.log('DepartmentsTabController');
}

function CategoriesTabController() {
  // injetando dependência
  'ngInject';

  // ViewModel
  const vm = this;

  console.log('CategoriesTabController');
}

function FeaturesTabController() {
  // injetando dependência
  'ngInject';

  // ViewModel
  const vm = this;

  console.log('FeaturesTabController');
}

function PromotionsTabController() {
  // injetando dependência
  'ngInject';

  // ViewModel
  const vm = this;

  console.log('PromotionsTabController');
}


function HomeProductsController() {
  // injetando dependência
  'ngInject';

  // ViewModel
  const vm = this;

  console.log('HomeProductsController');

  vm.tabs = [
    { title:"Produtos", content:"pages/products/tab-products.html", ngController: ProductsTabController },
    { title:"Fabricantes", content:"pages/products/tab-manufacturers.html", ngController: ManufacturersTabController },
    { title:"Departamentos", content:"pages/products/tab-departments.html", ngController: DepartmentsTabController },
    { title:"Categorias", content:"pages/products/tab-categories.html", ngController: CategoriesTabController },
    { title:"Características", content:"pages/products/tab-features.html", ngController: FeaturesTabController },
    { title:"Promoções", content:"pages/products/tab-promotions.html", ngController: PromotionsTabController },
  ];

}


export default {
  name: 'HomeProductsController',
  fn: HomeProductsController
};
