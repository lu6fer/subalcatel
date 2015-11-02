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
        $authProvider.loginUrl = '/api/auth/login';
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
        /**
         * Create loginFactory object
         * @type {{}}
         */
        var loginFact = {};

        /**
         * Return logged user info
         * @returns {{isAuth: boolean, user: {name: null, firstname: null, slug: null}, menu: Array}}
         */
        loginFact.getUser = function() {
            return JSON.parse(localStorage.getItem('logged_user'));
        };

        /**
         * Set logged user info
         * @param new_user
         */
        loginFact.setUser = function(user) {
            localStorage.setItem('logged_user', JSON.stringify(user));
        };

        /**
         * Log user to backend
         * @param credentials
         * @returns promise
         */
        loginFact.login = function (credentials) {
            var logpromise = $auth.login(credentials).then(function(user) {
                loginFact.setUser({
                    isAuth: true,
                    user: {
                        name: user.data.user.name,
                        firstname: user.data.user.firstname,
                        slug: user.data.user.slug
                    },
                    menu: loginFact.getMenu()
                });
            });

            return logpromise;
        };

        /**
         * Logout user
         * @returns promise
         */
        loginFact.logout = function () {
            return $auth.logout();
        };

        /**
         * Check if user is authenticated
         * @returns boolean
         */
        loginFact.isAuthenticated = function() {
            return $auth.isAuthenticated();
        };

        /**
         * Get user menu from backend
         * @returns {Array}
         */
        loginFact.getMenu = function() {
            if ($auth.isAuthenticated()) {
                var user_menu = [];
                var logout_menu = [
                    {
                        "divider": true
                    },
                    {
                        "text": "Deconnection",
                        "click": "logout()"
                    }
                ];
                /*$http.get(api_url + auth_url + '/getMenu').success(function(menu) {
                    user_menu = menu;
                });*/
                user_menu.push.apply(user_menu, logout_menu);

                return user_menu;
            }
        };

        /**
         *
         * @returns {{isAuth: boolean, user: {name: null, firstname: null, slug: null}, menu: Array}}
         */
        loginFact.setUserInfo = function() {
            $http.get(api_url + auth_url + '/getAuthUser').then(function(user) {
                loginFact.setUser({
                    isAuth: true,
                    user: {
                        name: user.data.user.name,
                        firstname: user.data.user.firstname,
                        slug: user.data.user.slug
                    },
                    menu: loginFact.getMenu()
                });

                return loginFact.getUser();
            });
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
                    loginFactory.login($scope.credentials)
                        .then(function() {
                            var logged_user = loginFactory.getUser();
                            $alert({
                                title: 'Bienvenue',
                                content: 'Bienvenue ' + logged_user.user.firstname + ' ' + logged_user.user.name,
                                type: 'success',
                                placement: 'top',
                                show: 'true',
                                container: 'body',
                                duration: 2
                            });
                        })
                        .catch(function(error) {
                            $alert({
                                title: 'Erreur',
                                content: error.data.error,
                                type: 'danger',
                                placement: 'top',
                                show: 'true',
                                container: 'body',
                                duration: 5
                            });
                        });
                }
            }
        }
    }
]);
subalcatelApp.directive('logmenu', [
    'loginFactory',
    function(loginFactory) {
        return {
            restrict: 'AE',
            templateUrl: 'templates/directives/logmenu.html',
            replace: true,
            transclude: true,
            controller: function ($scope) {
                $scope.isAuthenticated = function () {
                    var user = loginFactory.getUser();
                    if (user) {
                        if (loginFactory.isAuthenticated() && user.isAuth) {
                            return true;
                        }
                    }
                    return false;
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
                };

                /*var user = loginFactory.getUser();
                if ( ! user.isAuth && loginFactory.isAuthenticated()) {
                    console.log("user as token but no data");
                    user = loginFactory.setUserInfo();
                }

                $scope.logged_user = user;*/

                $scope.logged_user = loginFactory.getUser();
            }
        }
    }
]);
//# sourceMappingURL=subalcatel.js.map
