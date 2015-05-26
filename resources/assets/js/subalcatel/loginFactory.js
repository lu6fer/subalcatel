subalcatelApp.factory('loginFactory', [
    '$http',
    'api_url',
    function($http, api_url) {
        var loginFact = {};

        loginFact.signin = function (credentials) {
            return $http.post(api_url + '/signin', credentials);
        };

        return loginFact;
    }
]);