subalcatelApp.factory('loginFactory', [
    '$http',
    'api_url',
    function($http, api_url) {
        var loginFact = {};

        loginFact.isAuth = false;

        loginFact.signin = function (credentials) {
            return $http.post(api_url + '/auth/signin', credentials);
        };

        loginFact.ping = function() {
            return $http.get(api_url + '/auth/ping');
        };

        return loginFact;
    }
]);