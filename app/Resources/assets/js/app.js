define([
    'require', 'angular',
    'app/config', 'app/run'
  ],

  function(
    require, angular,
    config, run
  ) {
    'use strict';

    var app = angular.module('sis', [
      'ngRoute',
    ]);

    app.config(config);

    //load factories

    //load controllers

    app.run(run);

    return app;
  }
);
