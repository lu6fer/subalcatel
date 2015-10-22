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

        return loginFact;
    }
]);