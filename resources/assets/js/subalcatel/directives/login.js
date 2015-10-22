subalcatelApp.directive('authenticate', [
    'loginFactory',
    '$alert',
    function(loginFactory, $alert) {
        return {
            restrict: 'AE',
            templateUrl: 'templates/directives/login.html',
            replace: true,
            transclude: true,
            link: function (scope, iElm, iAttrs, controller) {
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
                    if (localStorage.getItem('user')) {
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
                    }
                };
                init();
            }
        }
    }
]);