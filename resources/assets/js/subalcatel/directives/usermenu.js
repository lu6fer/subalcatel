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