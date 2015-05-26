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
    function(loginFactory, jwtHelper) {
        return {
            restrict: 'AE   ',
            templateUrl: 'templates/directives/login.html',
            replace: true,
            transclude: true,
            link: function(scope, elem, attr) {
                scope.login = function() {
                    loginFactory.signin(scope.credentials).
                        success(function(login) {
                            console.log(jwtHelper.decodeToken(login.token));
                            console.log(jwtHelper.getTokenExpirationDate(login.token));
                        });
                }
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

//# sourceMappingURL=subalcatel.js.map