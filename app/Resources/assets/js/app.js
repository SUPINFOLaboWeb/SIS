//Declare module
angular.module('sis', [
  'ngRoute',
  'restangular',
  'ui.bootstrap',

  'security'
])

  .constant('API_CONFIG', {
    api: {
      url: 'sis.app',
      protocol: 'http://'
    }
  })

  .config(['$routeProvider', '$locationProvider', 'RestangularProvider', 'API_CONFIG', function($routeProvider, $locationProvider, RestangularProvider, API_CONFIG) {
      $locationProvider.html5Mode(false);
      $locationProvider.hashPrefix('!');

      $routeProvider.otherwise({ redirectTo:'/' });

      RestangularProvider.setBaseUrl(API_CONFIG.api.protocol + API_CONFIG.api.url);
      RestangularProvider.setDefaultHttpFields({cache: true});
    }]
  )

  .run(['security', function(security) {
    security.requestCurrentUser();

    security.showLogin();
  }])

  .controller('AppCtrl', ['$scope', function($scope) {
      $scope.$on('$routeChangeError', function(event, current, previous, rejection){
        // Custom error notification
      });
    }]
  )

  .controller('HeaderCtrl', ['$scope', 'security', function($scope, security) {
      $scope.login = function() {
        security.showLogin();
      };

      $scope.logout = function() {
        security.logout();
      };

      $scope.isAuthenticated = security.isAuthenticated;
      $scope.user = security.user;
    }]
  )
;
