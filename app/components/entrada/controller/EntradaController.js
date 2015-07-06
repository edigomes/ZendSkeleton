app.controller('EntradaController', function($scope, $controller, $stateParams, EntradaService) {
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
    
});