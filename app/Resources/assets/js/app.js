angular.module('sis', [
  'ngRoute'
]);

angular.module('sis').config(['$locationProvider', function($locationProvider) {
  $locationProvider.html5Mode({
    enabled: true,
    requireBase: false
  });

  $locationProvider.hashPrefix('!');
}]);

angular.module('sis').controller('AppCtrl', ['$scope', function($scope) {

}]);
