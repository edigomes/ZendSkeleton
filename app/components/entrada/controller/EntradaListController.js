app.controller("EntradaListController", function($controller, $scope, EntradaService) {
    
    $scope.EstEntrada = {};
    
    angular.extend(
        this,
        $controller(
            'AbstractListController', {
                $scope: $scope,
                formObject: $scope.EstEntrada,
                defaultService: EntradaService
            }
        )
    );

    $scope.EntradaList = $scope.loadList();
    
});