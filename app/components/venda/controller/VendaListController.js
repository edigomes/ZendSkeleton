app.controller("VendaListController", function($controller, $scope, VendaService) {
    
    $scope.ComVenda = {};
    
    angular.extend(
        this,
        $controller(
            'AbstractListController', {
                $scope: $scope,
                formObject: $scope.ComVenda,
                defaultService: VendaService
            }
        )
    );

    $scope.VendaList = $scope.loadList();
    
});