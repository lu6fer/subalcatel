subalcatelApp.directive('content', [function(){
    return {
        restrict: 'A',
        templateUrl: 'templates/layout/content.html',
        replace: true,
        transclude: true
    };
}]);