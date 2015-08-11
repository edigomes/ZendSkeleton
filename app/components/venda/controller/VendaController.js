app.controller('VendaController', function($scope, $controller, $stateParams, VendaService, CustomersService, ToastService) {
    angular.extend(
        this,
        $controller(
            'AbstractListController', {
                $scope: $scope,
                formObject: $scope.ComVenda = {},
                defaultService: VendaService
            }
        )
    );
    
    // ???
    $scope.show($stateParams.id);
    
    // Carrega clientees
    $scope.CadCliente = CustomersService.query();
    
    // Finaliza
    $scope.finalizaVenda = function() {
        $scope.update({
            callback: function() {
                VendaService.finaliza($scope.formObject, function(data) {
                    ToastService.show(data);
                });
            } // Obrigatório: este mêtodo prepara o id e as foreign keys
            // além de atualizar o registro      
        });
    };
    
    // Finaliza
    $scope.cancelaVenda = function() {
        
        // Resolve fk (documentar isto)
        if (confirm("Voc\u00ea est\u00e1 prestes a cancelar esta venda, todo estoque ser\u00e1 retornado, clique em OK para confirmar.")) {
            VendaService.cancela($scope.resolveFK($scope.formObject), function(data) {
                ToastService.show(data);
            });
        }
        
    };
    
    // Callback autocomplete cliente
    $scope.setCadCliente = function($item) {
        if ($item) {
            $scope.formObject.CadCliente = $item.originalObject;
        }
    };
    
    //TODO: Verificar mais um nível de item na tabela
    //TODO: Verificar como vai funcionar o lance do autocomplete (por enquanto pode ser um select)
    //TODO: Verificar como vai funcionar para atualizar um registro que tenha outra entity dentro // OK
    
});