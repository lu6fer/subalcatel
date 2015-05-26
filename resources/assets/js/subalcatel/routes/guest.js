subalcatelApp.config([
    '$stateProvider',
    '$urlRouterProvider',
    function($stateProvider, $urlRouterProvider) {
        // Guest routes
        $stateProvider
            .state('home',
                {
                    url: '/',
                    templateUrl: 'templates/guest/index.html'
                }
            )
            .state('informations',
                {
                    url: '/informations',
                    abstract: true,
                    template: '<ui-view/>'
                }
            )
            .state('informations.contact',
                {
                    url: '/contact',
                    templateUrl: 'templates/guest/informations/contact.html'
                }
            )
            .state('informations.a-propos',
                {
                    url: '/a-propos',
                    templateUrl: 'templates/guest/informations/apropos.html'
                }
            )
        ;
        // Default route
        $urlRouterProvider.otherwise('/');
    }
]);