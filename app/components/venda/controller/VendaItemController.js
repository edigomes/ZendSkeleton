app.controller("VendaItemController", function($controller, $scope, VendaItemService, EstoqueService) {

    $scope.VendaItem = {
        ComVenda: function() { 
            return $scope.$parent.getId(); 
        }
    };

    // Extends default controller
    angular.extend(this,
        $controller(
            'AbstractListController', {
                $scope: $scope, 
                formObject: $scope.VendaItem, 
                defaultService: VendaItemService
            }
        )
    );
    
    // Load itens list
    $scope.VendaItemList = $scope.loadList($scope.VendaItem);
        
    // Load itens on select
    $scope.EstItem = EstoqueService.query();
    
    // Callback autocomplete fornecedor
    $scope.setEstItem = function($item) {
        if ($item) {
            $scope.formObject.EstItem = $item.originalObject;
        }
    };
    
});