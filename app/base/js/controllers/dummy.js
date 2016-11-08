function DummyController(moment) {
  // injetando dependência
  'ngInject';

  // ViewModel
  const vm = this;

  console.log(moment());

  console.log('DUMMY CONTROLLER');
}


export default {
  name: 'DummyController',
  fn: DummyController
};
