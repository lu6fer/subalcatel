var subalcatelApp = angular
    .module('subalcatelApp',
        [
            'ngAnimate',
            'ui.router',
            'mgcrea.ngStrap',
            'satellizer'
        ]
    )
    .constant('api_url', '/api')
    .constant('auth_url', '/auth')
    .constant('guest_url', '/guest')
    .constant('registred_url', '/registred')
    .constant('admin_url', '/admin')
    /*.config(function ($stateProvider, $urlRouterProvider, $authProvider) {
        // Satellizer configuration that specifies which API
        // route the JWT should be retrieved from
        $authProvider.loginUrl = '/api/authenticate';

    })*/;


/*
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
});*/


subalcatelApp.config([
    '$stateProvider',
    '$urlRouterProvider',
    '$authProvider',
    '$httpProvider',
    '$provide',
    function($stateProvider, $urlRouterProvider, $authProvider, $httpProvider, $provide) {

        function redirectWhenLoggedOut($q, $injector) {
            return {
                responseError: function(rejection) {
                    // Need to use $injector.get to bring in $state or else we get
                    // a circular dependency error
                    var $state = $injector.get('$state');
                    // Instead of checking for a status code of 400 which might be used
                    // for other reasons in Laravel, we check for the specific rejection
                    // reasons to tell us if we need to redirect to the login state
                    var rejectionReasons = ['token_not_provided', 'token_expired', 'token_absent', 'token_invalid'];
                    // Loop through each rejection reason and redirect to the login
                    // state if one is encountered
                    angular.forEach(rejectionReasons, function(value, key) {
                        if(rejection.data.error === value) {

                            // If we get a rejection corresponding to one of the reasons
                            // in our array, we know we need to authenticate the user so
                            // we can remove the current user from local storage
                            localStorage.removeItem('user');
                            // Send the user to the auth state so they can login
                            $state.go('home');
                        }
                    });
                    return $q.reject(rejection);
                }
            }
        }

        // Setup for the $httpInterceptor
        $provide.factory('redirectWhenLoggedOut', redirectWhenLoggedOut);

        // Push the new factory onto the $http interceptor array
        $httpProvider.interceptors.push('redirectWhenLoggedOut');

        // Satellizer configuration that specifies which API
        // route the JWT should be retrieved from
        $authProvider.loginUrl = '/api/auth/signin';
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

subalcatelApp.controller('main', ['$scope', function($scope){
}]);
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
/**
 * Created by florent on 25/10/15.
 */
subalcatelApp.directive('loginform', [
    'loginFactory',
    '$alert',
    function(loginFactory, $alert) {
        return {
            restrict: 'AE',
            templateUrl: 'templates/directives/loginform.html',
            replace: true,
            transclude: true,
            controller: function ($scope) {
                $scope.signin = function () {
                    loginFactory.signin($scope.credentials)
                        .then(function(response) {
                            console.log(response);
                        })
                        .catch(function(error) {
                            console.log(error);
                        });
                }
            }
        }
    }
]);
subalcatelApp.directive('logmenu', [
    '$auth',
    function($auth) {
        return {
            restrict: 'AE',
            templateUrl: 'templates/directives/logmenu.html',
            replace: true,
            transclude: true,
            controller: function ($scope) {
                $scope.isAuthenticated = function () {
                    console.log($auth.isAuthenticated());
                    return $auth.isAuthenticated();
                }
            }
        }
    }
]);
            /*link: function (scope, iElm, iAttrs, controller) {
                // login
                scope.signin = function () {
                    loginFactory.signin(scope.credentials).then(
                        function() {
                            loginFactory.ping().then(
                                function(response) {
                                    loginFactory.name = response.data.user.name;
                                    loginFactory.firstname = response.data.user.firstname;
                                    loginFactory.isAuth = true;

                                    var user = JSON.stringify(response.data.user);

                                    // Set the stringified user data into local storage
                                    localStorage.setItem('user', user);
                                },
                                function(error) {
                                    console.log(error);
                                }
                            );
                        },
                        function(error){
                            $alert({
                                title: 'Error',
                                content: error.data.error  || 'Erreur',
                                type: 'danger',
                                placement: 'top',
                                show: 'true',
                                container: 'body'
                            });
                        }
                    );
                };

                // logout
                scope.logout = function () {
                    loginFactory.logout().then(
                        function () {
                            loginFactory.isAuth = false;
                            localStorage.removeItem('user');
                        },
                        function (error) {
                            console.log(error);
                        }
                    )
                };

                // check isAuth value
                scope.check = function () {
                    return loginFactory.isAuth;
                };

                scope.dropdown = [
                    {
                        "divider": true
                    },
                    {
                        "text": "Deconnection",
                        "click": "logout()"
                    }
                ];

                // return user name from factory
                scope.getLoggedUserName = function() {
                    return loginFactory.name;
                };

                //return user firstname from factory
                scope.getLoggedUserFirstname = function() {
                    return loginFactory.firstname;
                };

                // Check auth status
                var init = function () {
                    /!*if (localStorage.getItem('user')) {
                        loginFactory.ping().then(
                            function(response) {
                                loginFactory.name = response.data.user.name;
                                loginFactory.firstname = response.data.user.firstname;
                                loginFactory.isAuth = true;

                                var user = JSON.stringify(response.data.user);

                                // Set the stringified user data into local storage
                                localStorage.setItem('user', user);
                            },
                            function(error) {
                                console.log(error);
                            }
                        );
                    }*!/
                    return loginFactory.isAuthenticated();
                };
                init();
            }
        }
    }
]);*/
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
subalcatelApp.directive('usermenu', [
    'loginFactory',
    function() {
        return {
            restrict: 'AE',
            templateUrl: 'templates/directives/usermenu.html',
            replace: true,
            transclude: true,
            controller: function (loginFactory, $scope) {
                $scope.logout = function () {
                    loginFactory.logout()
                        .then(function(response) {
                            console.log(response);
                        });
                }
            }
        }
    }
]);
//# sourceMappingURL=subalcatel.js.map