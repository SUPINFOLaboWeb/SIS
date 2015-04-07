define([], function() {
  'use strict';

  return ['$httpProvider', '$routeProvider', '$locationProvider', 
    function($httpProvider, $routeProvider, $locationProvider) {
      $locationProvider.html5Mode({
        enabled:false,
        requireBase: false
      });

      $locationProvider.hashPrefix('!');
    }
  ];
});
