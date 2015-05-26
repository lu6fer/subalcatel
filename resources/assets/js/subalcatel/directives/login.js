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