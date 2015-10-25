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