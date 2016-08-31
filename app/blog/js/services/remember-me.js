function RememberMeService($localStorage) {
  'ngInject';

  const service = {};

  var setData = function(data) {
    $localStorage.rememberMe = data;
  };

  var unsetData = function(data) {
     delete $localStorage.rememberMe;
  }

  var DataUserException = function(message) {
    this.message = message;
    this.name = 'DataUserException';
  };

  service.getMyDecision = function() {
    return $localStorage.rememberMe;
  }

  service.myDecision = function(decision, data) {
    if (decision) {
      if (data.username === 'undefined') throw new DataUserException('Usuário não definido');
      if (data.password === 'undefined') throw new DataUserException('Senha não definida');
      setData(data);
    } else {
      unsetData();
    }

  }

  return service;

}

export default {
  name: 'RememberMeService',
  fn: RememberMeService
};
