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