subalcatelApp.directive('usermenu', [
    'loginFactory',
    function() {
        return {
            restrict: 'AE',
            templateUrl: 'templates/directives/usermenu.html',
            replace: true,
            transclude: true,
            controller: function (loginFactory, $scope) {
                /**
                 * Logout function
                 */
                $scope.logout = function () {
                    loginFactory.logout()
                        .then(function(response) {
                            console.log(response);
                        });
                };

                /**
                 * Set user info
                 * @type {{isAuth: boolean, user: {name: null, firstname: null, slug: null}, menu: Array}}
                 */
                $scope.logged_user = loginFactory.getUser();
            }
        }
    }
]);