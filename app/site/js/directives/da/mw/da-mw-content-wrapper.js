function daMwContentWrapper() {
  return {
    restrict: 'C',
    link: (scope, element) => {
      console.log('daMwContentWrapper');
    }
  };
}

export default {
  name: 'daMwContentWrapper',
  fn: daMwContentWrapper
};
