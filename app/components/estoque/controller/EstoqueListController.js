app.controller("EstoqueListController", function($controller, $scope, EstoqueService) {
    
    $scope.EstItem = {};
    
    angular.extend(
        this,
        $controller(
            'AbstractListController', {
                $scope: $scope,
                formObject: $scope.EstItem,
                defaultService: EstoqueService
            }
        )
    );

    $scope.EstoqueList = $scope.loadList();
    
    
});