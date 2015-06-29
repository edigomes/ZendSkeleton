app.controller('EstoqueController', function($scope, $controller, EstoqueService) {
    angular.extend(
        this,
        $controller(
            'AbstractController', {
                $scope: $scope,
                defaultObject: $scope.EstItem = {},
                defaultService: EstoqueService
            }
        )
    );
    
});