app.controller('EntradaController', function($scope, $controller, $stateParams, EntradaService, FornecedorService, EstoqueService) {
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
    
    $scope.show($stateParams.id);
    
    // Load providers
    $scope.CadFornecedor = FornecedorService.query();
    
    // Finaliza
    $scope.finalizaEntrada = function() {
        $scope.update(function() {
            EntradaService.finaliza($scope.formObject, function(data) {
                //$.notify(data.message, {globalPosition: "bottom right", className: 'success'});
                if (data.status) {
                    $.notify(data.message, {globalPosition: "bottom right", className: 'success'});
                } else {
                    $.notify(data.message, {globalPosition: "bottom right", className: 'error'});
                }
            });
        }); // Obrigat�rio: este m�todo prepara o id e as foreign keys
            // al�m de atualizar o registro      
    };
    
    //TODO: Verificar mais um n�vel de item na tabela
    //TODO: Verificar como vai funcionar o lance do autocomplete (por enquanto pode ser um select)
    //TODO: Verificar como vai funcionar para atualizar um registro que tenha outra entity dentro
    
});