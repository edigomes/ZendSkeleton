app.controller("ContatoFornecedorListController", function($controller, $scope, $stateParams, ContatoFornecedorService) {

    $scope.ContatoCadFornecedor = {FK_fornecedor: $stateParams.id}
    
    angular.extend(this,
        $controller(
            'AbstractListController', {$scope: $scope, defaultObject: $scope.ContatoCadFornecedor, defaultService: ContatoFornecedorService}
        )
    );
    
    $scope.contatoList = $scope.loadList({FK_fornecedor: $stateParams.id});

});