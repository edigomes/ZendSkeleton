app.controller('FornecedorController', function($scope, $controller, $stateParams, FornecedorService) {
    
    $scope.CadFornecedor = {fk:1};
    
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