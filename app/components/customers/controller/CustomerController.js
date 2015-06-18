app.controller('CustomerController', function($rootScope, $location, $scope, $state, $stateParams, ModalFormService, CustomersService) {

    // Sets active tab on menu
    $rootScope.activetab = $location.path();
    
    // Create new customer
    $scope.create = function() {
        CustomersService.create({customer: $scope.customer}, function(data){
            if (data.status) {
                $stateParams.id = data.id;
                $.notify(data.message, {globalPosition: "bottom right", className: 'success'});
                $scope.$root.$broadcast("updateList");
            }
        });
        //$state.go('customers.edit', {id : 1});
    };
    
    // Update customer
    $scope.update = function() {
        if ($stateParams.id) {
            CustomersService.update({id: $stateParams.id, customer: $scope.customer}, function(data) {
                if (data.status) {
                    $scope.$root.$broadcast("updateList");
                    $.notify(data.message, {globalPosition: "bottom right", className: 'success'});
                }
            });
        } else {
            $scope.create();
        }
    };
    
    // Show the customer in a form
    $scope.show = function(PK_cliente) {
        CustomersService.show({id: PK_cliente}, function(data) {
            $scope.customer = data.result[0];
        });
    };
    
    // Delete a customer
    $scope.delete = function(PK_cliente) {
        //$modalInstance.dismiss('cancel');
    };
    
    // Show the customer if {:id} was passed in params
    if ($stateParams.id) {
        $scope.customer = $scope.show($stateParams.id);
    } else {
        $scope.customer = {};
    }
   
});