angular.module('security.login.form', ['services.InterfaceMessages'])
  .controller('LoginFormCtrl', ['$scope', 'security', 'InterfaceMessages', function($scope, security, interfaceMessages) {

    $scope.user = {};

    $scope.authError = null;

    $scope.login = function() {
      $scope.authError = null;

      security.login($scope.user.email, $scope.user.password, $scope.token).then(function(loggedIn) {
        if(!loggedIn) {
          $scope.authError = interfaceMessages.get('login.error.invalidCredentials');
        }
      }, function(error) {
        $scope.authError = interfaceMessages.get('serverError');
      });
    };
  }]
);
