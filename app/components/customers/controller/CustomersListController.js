app.controller("CustomersListController", function($controller, $scope, CustomersService) {
    
    // Load abstract
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
    
    $scope.customersList = $scope.loadList();
    
});