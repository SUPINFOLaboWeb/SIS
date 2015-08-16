angular.module('security.service', [
  'ngStorage',
  'ui.bootstrap.modal',

  'security.retryQueue',
  'security.login'
]).factory('security', ['$http', '$q', '$location', '$localStorage', 'securityRetryQueue', '$modal', 'API_CONFIG', function($http, $q, $location, $storage, queue, $modal, API_CONFIG) {

    function redirect(url) {
      url = url || '/';
      $location.path(url);
    }

    var loginDialog = null;

    var openLoginDialog = function() {
      if(loginDialog) {
        throw new Error('Trying to open a dialog that is already open!');
      }

      loginDialog = $modal.open({
        templateUrl: '/user/login',
        controller: 'LoginFormCtrl'
      });

      loginDialog.result.then(onLoginDialogClose);
    };

    var closeLoginDialog = function(success) {
      if(loginDialog) {
        loginDialog.close(success);
      }
    };

    var onLoginDialogClose = function(success) {
      loginDialog = null;

      if (success) {
        queue.retryAll();
      } else {
        queue.cancelAll();
        redirect();
      }
    };

    queue.onItemAddedCallbacks.push(function(retryItem) {
      if (queue.hasMore()) {
        service.showLogin();
      }
    });

    $storage.user = $storage.user || null;

    var service = {
      user: null,

      token: null,

      showLogin: function() {
        openLoginDialog();
      },

      cancelLogin: function() {
        closeLoginDialog();

        redirect();
      },

      login: function(username, password, token) {
        var request = $http.post(API_CONFIG.api.protocol + API_CONFIG.api.url + '/user/login_check', {
          username: username,
          password: password,
          token: token
        });

        return request.then(function(response) {
          $storage.user = response.data;

          service.requestCurrentUser();

          if (service.isAuthenticated()) {
            closeLoginDialog(true);
          }

          return service.isAuthenticated();
        });
      },

      logout: function() {
        $storage.user = null;

        redirect();
      },

      requestCurrentUser: function() {
        if(service.isAuthenticated() && !!service.user) {
          return $q.when(service.user);
        } else {
          return $http.get(API_CONFIG.api.protocol + API_CONFIG.api.url + '/me').then(function(response) {
            $storage.user = response.data;

            return $storage.user;
          });
        }
      },

      isAuthenticated: function() {
        return !!$storage.user;
      }
    };

    return service;
  }]
);
