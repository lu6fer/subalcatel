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