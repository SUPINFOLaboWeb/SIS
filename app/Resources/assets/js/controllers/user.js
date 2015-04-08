define([], function() {
  'use strict';

  return ['$scope', '$stateParams', '$location', 'User',
    function($scope, $stateParams, $location, $session, User) {
      $scope.show = function() {

      };

      $scope.edit = function() {


        this.saveEdit = function() {

        };
      };
    }
  ];
});
