app.controller('FornecedorController', function($scope, $controller, $stateParams, FornecedorService) {

    angular.extend(
        this, 
        $controller(
            'AbstractListController', {
                $scope: $scope,
                defaultObject: $scope.CadFornecedor = {},
                defaultService: FornecedorService
            }
        )
    );
    
    $scope.show($stateParams.id);

});