app.controller("EntradaItemController", function($controller, $scope, $stateParams, EntradaItemService, EstoqueService) {

    $scope.EntradaItem = {FK_entrada: $stateParams.id}
    
    angular.extend(this,
        $controller(
            'AbstractListController', {
                $scope: $scope, 
                formObject: $scope.EntradaItemController, 
                defaultService: EntradaItemService
            }
        )
    );
    
    $scope.itemList = $scope.loadList();
        
    // Load itens
    $scope.EstItem = EstoqueService.query();

});