app.controller("EntradaItemController", function($controller, $scope, EntradaItemService, EstoqueService) {

    $scope.EntradaItem = {
        fkEntrada: function() { 
            return $scope.$parent.getId(); 
        }
    };

    angular.extend(this,
        $controller(
            'AbstractListController', {
                $scope: $scope, 
                formObject: $scope.EntradaItem, 
                defaultService: EntradaItemService
            }
        )
    );
    
    $scope.EntradaItemList = $scope.loadList($scope.EntradaItem);
        
    // Load itens on select
    $scope.EstItem = EstoqueService.query();

});