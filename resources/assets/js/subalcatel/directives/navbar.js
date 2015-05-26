subalcatelApp.directive('navbar', [ function(){
    return {
        restrict: 'A',
        templateUrl: 'templates/layout/navbar.html',
        replace: true,
        transclude: true,
        controller: [
            '$scope',
            '$location',
            function($scope, $location) {
                $scope.navigation = {
                    title: 'Navigation',
                    content: 'Test'
                };
                $scope.menu = {
                    title: 'Menu',
                    content: 'Test'
                };

                $scope.navbar_menu = "templates/layout/navbar-menu.html";
                $scope.offcanvas_menu = "templates/layout/offcanvas-menu.html";
        }]
    };
}]);