app.service('AbstractControllerService', function() {
    
    this.update = function(object) {
        
        //var toUpdate = $scope.resolveFK($scope.formObject);
        $scope.formObject = $scope.resolveFK($scope.formObject);

        if ($scope.getId() !== undefined) {
            $scope.formObject.id = $scope.getId(); // Sets id
            $scope.defaultService.update($scope.formObject, function(data) {
                if (data.status) {
                    $scope.$root.$broadcast("updateList");
                    $.notify(data.message, {globalPosition: "bottom right", className: 'success'});
                    if (!$scope.isParent()) {
                        $scope.reset();
                    }
                }
            });
        } else {
            $scope.create();
        }
    };
    
});