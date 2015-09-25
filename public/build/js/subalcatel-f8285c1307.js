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
            //console.log(config.url);
            if ((config.url.substr(config.url.length - 5) == '.html') || config.url.match(/signin/g)) {
                console.log('Macth "html" || "signin"');
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

            //return token;
        }
    ];

    $httpProvider.interceptors.push('jwtInterceptor');
});
subalcatelApp.controller('main', ['$scope', function($scope){

}]);
subalcatelApp.directive('content', [function(){
    return {
        restrict: 'A',
        templateUrl: 'templates/layout/content.html',
        replace: true,
        transclude: true
    };
}]);
subalcatelApp.directive('footer', [ function(){
    return {
        restrict: 'A',
        templateUrl: 'templates/layout/footer.html',
        replace: true,
        transclude: true
    };
}]);
subalcatelApp.directive('login', [
    'loginFactory',
    'jwtHelper',
    '$alert',
    function(loginFactory, jwtHelper, $alert) {
        return {
            restrict: 'AE   ',
            templateUrl: 'templates/directives/login.html',
            replace: true,
            transclude: true,
            link: function(scope, elem, attr) {
                scope.login = function() {
                    loginFactory.signin(scope.credentials).
                        success(function(login) {
                            localStorage.setItem('id_token', login.token);
                            loginFactory.isAuth = true;
                            console.log(login);
                        })
                        .error(function(error) {
                            var alert_error = $alert({
                                title: 'Error',
                                content: error.error  || 'Erreur',
                                type: 'danger',
                                placement: 'top',
                                show: 'true',
                                container: 'body'
                            });
                        });
                };

                scope.ping = function() {
                    loginFactory.ping()
                        .success(function(data) {
                            console.log('User is auth :' + loginFactory.isAuth);
                            console.log(data);
                        })
                        .error(function(err) {
                            console.log('User is auth :' + loginFactory.isAuth);
                            console.log(err);
                        });
                };

                scope.isAuth = loginFactory.isAuth;
            }
        }
    }
]);
subalcatelApp.directive('navbar', [ function(){
    return {
        restrict: 'A',
        templateUrl: 'templates/layout/navbar.html',
        replace: true,
        transclude: true,
        controller: [
            '$scope',
            '$location',
            function($scope, $location) {
                $scope.navigation = {
                    title: 'Navigation',
                    content: 'Test'
                };
                $scope.menu = {
                    title: 'Menu',
                    content: 'Test'
                };

                $scope.navbar_menu = "templates/layout/navbar-menu.html";
                $scope.offcanvas_menu = "templates/layout/offcanvas-menu.html";
        }]
    };
}]);

subalcatelApp.config([
    '$stateProvider',
    '$urlRouterProvider',
    function($stateProvider, $urlRouterProvider) {
        // Guest routes
        $stateProvider
            .state('home',
                {
                    url: '/',
                    templateUrl: 'templates/guest/index.html'
                }
            )
            .state('informations',
                {
                    url: '/informations',
                    abstract: true,
                    template: '<ui-view/>'
                }
            )
            .state('informations.contact',
                {
                    url: '/contact',
                    templateUrl: 'templates/guest/informations/contact.html'
                }
            )
            .state('informations.a-propos',
                {
                    url: '/a-propos',
                    templateUrl: 'templates/guest/informations/apropos.html'
                }
            )
        ;
        // Default route
        $urlRouterProvider.otherwise('/');
    }
]);

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
//# sourceMappingURL=subalcatel.js.map