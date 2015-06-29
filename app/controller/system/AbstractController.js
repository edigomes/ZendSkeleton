app.controller('AbstractController', function($rootScope, $location, $scope, defaultService, $stateParams, ngTableParams) {
    
    // Sets active tab on menu
    $rootScope.activetab = $location.path();
    $scope.keywords = "";
    $scope.em = {};
    
    // Set at each controller
    $scope.defaultService = defaultService;

    // Create new fornecedor
    $scope.create = function() {
        $scope.defaultService.create($scope.defaultData, function(data){
            if (data.status) {
                $stateParams.id = data.id;
                $.notify(data.message, {globalPosition: "bottom right", className: 'success'});
                $scope.$root.$broadcast("updateList");
            }
        });
        //$state.go('fornecedors.edit', {id : 1});
    };

    // Update fornecedor
    $scope.update = function(data) {
        if ($stateParams.id) {
            // Seta o id que será atualizado
            data.id = $stateParams.id;
            $scope.defaultService.update(data, function(data) {
                if (data.status) {
                    $scope.$root.$broadcast("updateList");
                    $.notify(data.message, {globalPosition: "bottom right", className: 'success'});
                }
            });
        } else {
            $scope.create();
        }
    };

    // Show the fornecedor in a form
    $scope.show = function(id) {
        $scope.defaultService.show({id: id}, function(obj) {
            $scope.em = obj;
        });
    };

    // Delete a fornecedor
    $scope.delete = function(id) {
        //$modalInstance.dismiss('cancel');
    };
    
    // Show the fornecedor if {:id} was passed in params
    if ($stateParams.id) {
        $scope.defaultData = $scope.show($stateParams.id);
    } else {
        //$scope.defaultData = {};
    }
    
    $scope.loadList = function(service, where) { 
        // Load initial data
        return new ngTableParams({
            page: 1,            // show first page
            count: 5
            //sorting: {
            //    xNome: 'ASC'     // initial sorting
            //}
        }, {
            total: 0,           // length of data
            getData: function($defer, params) {
                service.query({page : params.page(), count: params.count(), keywords: $scope.keywords, where: where}, function(data) {
                    // update table params
                    params.total(data.pageCount*params.count());
                    // set new data
                    $defer.resolve(data.result);
                });
            }
        });
    };
    
    // Update some list witch this controller have
    //$scope.$on('updateList', function() {
    //    $scope.defaultList.reload();
    //});
   
});