subalcatelApp.directive('footer', [ function(){
    return {
        restrict: 'A',
        templateUrl: 'templates/layout/footer.html',
        replace: true,
        transclude: true
    };
}]);