app.controller('EntradaController', function($scope, $controller, $stateParams, EntradaService, FornecedorService, ToastService) {
    angular.extend(
        this,
        $controller(
            'AbstractListController', {
                $scope: $scope,
                formObject: $scope.EstEntrada = {},
                defaultService: EntradaService
            }
        )
    );
    
    // ???
    $scope.show($stateParams.id);
    
    // Carrega fornecedores
    $scope.CadFornecedor = FornecedorService.query();
    
    // Finaliza
    $scope.finalizaEntrada = function() {
        $scope.update({
            callback: function() {
                EntradaService.finaliza($scope.formObject, function(data) {
                    ToastService.show(data);
                });
            } // Obrigat�rio: este m�todo prepara o id e as foreign keys
            // al�m de atualizar o registro      
        });
    };
    
    // Finaliza
    $scope.cancelaEntrada = function() {
        
        // Resolve fk (documentar isto)
        if (confirm("Voc\u00ea est\u00e1 prestes a cancelar esta entrada, todo estoque ser\u00e1 retornado, clique em OK para confirmar.")) {
            EntradaService.cancela($scope.resolveFK($scope.formObject), function(data) {
                ToastService.show(data);
            });
        }
        
    };
    
    // Callback autocomplete fornecedor
    $scope.setCadFornecedor = function($item) {
        if ($item) {
            $scope.formObject.CadFornecedor = $item.originalObject;
        }
    };
    
    //TODO: Verificar mais um n�vel de item na tabela
    //TODO: Verificar como vai funcionar o lance do autocomplete (por enquanto pode ser um select)
    //TODO: Verificar como vai funcionar para atualizar um registro que tenha outra entity dentro // OK
    
});