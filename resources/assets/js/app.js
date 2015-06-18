var subalcatelApp = angular.module('subalcatelApp',
    [
        'ngAnimate',
        'ui.router',
        'mgcrea.ngStrap',
        'angular-jwt'
    ]
);

subalcatelApp.constant(
    'api_url', '/api'
);

subalcatelApp.config(function Config($httpProvider, jwtInterceptorProvider) {
    jwtInterceptorProvider.tokenGetter = [
        'config',
        'jwtHelper',
        '$alert',
        '$http',
        function(config, jwtHelper, $alert, $http) {
            var token = localStorage.getItem('id_token');
            var refreshToken = localStorage.getItem('refresh_token');
            // Skip authentication for any requests ending in .html
            if (config.url.substr(config.url.length - 5) == '.html') {
                return null;
            }

            if (!token || token == "undefined") {
                var token_error = $alert({
                    title: 'Token Error',
                    content: 'You are not log in',
                    type: 'danger',
                    placement: 'top',
                    show: 'true',
                    container: 'body'
                });
            }
            else if (jwtHelper.isTokenExpired(token)) {
                // This is a promise of a JWT id_token
                return $http({
                    url: '/delegation',
                    // This makes it so that this request doesn't send the JWT
                    skipAuthorization: true,
                    method: 'POST',
                    data: {
                        grant_type: 'refresh_token',
                        refresh_token: refreshToken
                    }
                }).then(function(response) {
                    var token = response.data.token;
                    localStorage.setItem('id_token', token);
                    return token;
                });
            }
            else {
                return token;
            }

            return token;
        }
    ];

    $httpProvider.interceptors.push('jwtInterceptor');
});