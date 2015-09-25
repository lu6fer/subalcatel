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