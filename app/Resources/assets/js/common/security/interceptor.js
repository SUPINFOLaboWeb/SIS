angular.module('security.interceptor', ['security.retryQueue'])
  .factory('securityInterceptor', ['$injector', '$q', 'securityRetryQueue', function($injector, $q, queue) {

    return {
      // Intercept failed requests
      'responseError': function(response) {
        if(response.status === 401 || response.status === 403) {
          // The request bounced because it was not authorized - add a new request to the retry queue
          promise = queue.pushRetryFn('unauthorized-server', function retryRequest() {
            // We must use $injector to get the $http service to prevent circular dependency
            return $injector.get('$http')(response.config);
          });
        }

        return $q.reject(response);
      }
    };
  }]
).config(['$httpProvider', function($httpProvider) {
    $httpProvider.interceptors.push('securityInterceptor');
  }]
);
