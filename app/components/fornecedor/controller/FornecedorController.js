app.controller('FornecedorController', function($scope, $controller, $stateParams, FornecedorService) {
    
    $scope.CadFornecedor = {};
    
    angular.extend(
        this, 
        $controller(
            'AbstractListController', {
                $scope: $scope,
                formObject: $scope.CadFornecedor,
                defaultService: FornecedorService
            }
        )
    );

    $scope.show($stateParams.id);

});