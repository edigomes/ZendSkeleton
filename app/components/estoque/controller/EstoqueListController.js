app.controller("EstoqueListController", function($controller, $scope, EstoqueService) {

    angular.extend(
        this,
        $controller(
            'AbstractListController', {
                $scope: $scope,
                defaultService: EstoqueService
            }
        )
    );

    $scope.defaultList = $scope.loadList(EstoqueService);

});