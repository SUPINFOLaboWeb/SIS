define([
    'require', 'angular',
    'app/config', 'app/run',
    'app/resources/user',
    'app/controllers/user'
  ],

  function(
    require, angular,
    config, run
    User,
    UserController
  ) {
    'use strict';

    var app = angular.module('sis', [
      'ngRoute',
    ]);

    app.config(config);

    //load factories
    app.factory('User', User);

    //load controllers
    app.controller('UserController', UserController);

    app.run(run);

    return app;
  }
);
