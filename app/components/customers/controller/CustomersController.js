app.controller('CustomersController', function($rootScope, $location, $scope, $state, $stateParams, ModalFormService, CustomersService) {

    // Sets active tab on menu
    $rootScope.activetab = $location.path();
    
    // Create new cliente
    $scope.create = function() {
        CustomersService.create($scope.cliente, function(data){
            if (data.status) {
                $stateParams.id = data.id;
                $.notify(data.message, {globalPosition: "bottom right", className: 'success'});
                $scope.$root.$broadcast("updateList");
            }
        });
        //$state.go('clientes.edit', {id : 1});
    };
    
    // Update cliente
    $scope.update = function() {
        if ($stateParams.id) {
            // Seta o id que será atualizado
            $scope.cliente.id = $stateParams.id;
            CustomersService.update($scope.cliente, function(data) {
                if (data.status) {
                    $scope.$root.$broadcast("updateList");
                    $.notify(data.message, {globalPosition: "bottom right", className: 'success'});
                }
            });
        } else {
            $scope.create();
        }
    };
    
    // Show the cliente in a form
    $scope.show = function(id) {
        CustomersService.show({id: id}, function(data) {
            console.log(data);
            $scope.cliente = data.result;
        });
    };
    
    // Delete a cliente
    $scope.delete = function(PK_cliente) {
        //$modalInstance.dismiss('cancel');
    };
    
    // Show the cliente if {:id} was passed in params
    if ($stateParams.id) {
        $scope.cliente = $scope.show($stateParams.id);
    } else {
        $scope.cliente = {};
    }
   
});