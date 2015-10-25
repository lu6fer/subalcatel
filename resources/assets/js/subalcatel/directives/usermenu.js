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