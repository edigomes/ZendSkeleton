app.controller('ClientesController', function($rootScope, $location, $stateParams, $scope, ngTableParams, DataService) {
    
    // Verifica se é para popular um registro
    if ($stateParams.id !== undefined) {
        // Carrega dados do cliente
        DataService.getData(
            $stateParams.id,
            'system/CAD_cliente',
            function(result) { 
                $scope.cliente = result.data;
                console.log(result);
            }
        );
    }
    
   
});