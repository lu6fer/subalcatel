subalcatelApp.factory('loginFactory', [
    '$auth',
    'api_url',
    'auth_url',
    '$http',
    function ($auth, api_url, auth_url, $http) {
        var loginFact = {
            isAuth: false,
            name: null,
            firstname: null
        };

        loginFact.signin = function (credentials) {
            return $auth.login(credentials);
        };

        loginFact.ping = function() {
            return $http.get(api_url + auth_url + '/ping');
        };

        loginFact.logout = function () {
            return $auth.logout();
        };

        loginFact.isAuthenticated = function() {
            var auth = $auth.isAuthenticated();
            if (auth) {
                $http.get(api_url + auth_url + '/ping')
                    .success(function(response) {
                       loginFact = {
                           isAuth: true,
                           name: response.user.name,
                           firstname: response.user.firstname
                       };
                    });
            }
            console.log($auth.getToken());
            console.log('authenticated : '+auth);
            return auth;
        };

        return loginFact;
    }
]);