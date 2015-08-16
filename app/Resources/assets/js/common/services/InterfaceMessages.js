angular.module('services.InterfaceMessages', [])
  .factory('InterfaceMessages', ['$interpolate', 'MESSAGES', function($interpolate, messages) {

    var handleNotFound = function (message, key) {
      return message || '?' + key + '?';
    };

    return {
      get : function (key, params) {
        var message =  messages[key];
        if (message) {
          return $interpolate(message)(params);
        } else {
          return handleNotFound(message, key);
        }
      }
    };
  }]
);
