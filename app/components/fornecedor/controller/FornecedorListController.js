app.controller("FornecedorListController", function($controller, $scope, FornecedorService) {
    
    $scope.CadFornecedor = {};

    // Load abstract
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
    
    $scope.defaultList = $scope.loadList();
    
});