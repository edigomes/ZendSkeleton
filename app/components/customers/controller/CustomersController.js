app.controller('CustomersController', function($scope, $controller, $stateParams, CustomersService) {
    
    angular.extend(
        this, 
        $controller(
            'AbstractListController', {
                $scope: $scope,
                formObject: $scope.CadCliente = {},
                defaultService: CustomersService
            }
        )
    );

    $scope.show($stateParams.id);

});