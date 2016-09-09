function daMwMenuWrapper() {
  return {
    restrict: 'E',
    replace: true,
    scope: {
      menu: '='
    },
    templateUrl: 'directives/da/mw/menu.html', 
    link: (scope, element, attributes) => {
      $('#damwMenuToggle, .damw-menu-close').on('click', function () {
        $('#damwMenuToggle').toggleClass('active');
        $('#damwTheContent').toggleClass('content-push-toleft foggy');
        $('#damwTheMenu').toggleClass('menu-open');
      })

      $('#damwTheContent').on('click', function () {
        $('#damwMenuToggle').removeClass('active');
        $('#damwTheContent').removeClass('content-push-toleft foggy');
        $('#damwTheMenu').removeClass('menu-open');
      })
    }
  };
}

export default {
  name: 'daMwMenuWrapper',
  fn: daMwMenuWrapper
};
