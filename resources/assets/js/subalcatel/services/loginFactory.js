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