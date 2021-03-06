app.controller('EstoqueController', function($scope, $controller, $stateParams, EstoqueService) {
    angular.extend(
        this,
        $controller(
            'AbstractListController', {
                $scope: $scope,
                formObject: $scope.EstItem = {},
                defaultService: EstoqueService
            }
        )
    );
    
    $scope.show($stateParams.id);
    
});