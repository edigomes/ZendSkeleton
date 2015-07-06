app.controller("ContatoFornecedorListController", function($controller, $scope, $stateParams, ContatoFornecedorService) {

    $scope.ContatoCadFornecedor = {FK_fornecedor: $stateParams.id}
    
    angular.extend(this,
        $controller(
            'AbstractListController', {
                $scope: $scope, 
                formObject: $scope.ContatoCadFornecedor, 
                defaultService: ContatoFornecedorService
            }
        )
    );
    
    $scope.contatoList = $scope.loadList($scope.ContatoCadFornecedor);

});