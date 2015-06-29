app.controller("FornecedorListController", function($controller, $scope, FornecedorService) {
    
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
    
    $scope.defaultList = $scope.loadList();
    
});