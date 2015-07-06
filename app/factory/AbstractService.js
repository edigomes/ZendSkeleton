app.service('AbstractService', function() {

    // Show the fornecedor in a form
    this.show = function(id, service, callback) {
        if (!id || !service || !callback) {
            throw new Error("Verifique os parametros", this, 15);
        }
        service.show({id: id}, function(object) {
            callback(object);
        });
    };
    
    // Create new fornecedor
    /*$scope.create = function() {
        console.log($scope.defaultObject);
        $scope.defaultService.create($scope.defaultObject, function(data){
            if (data.status) {
                $.notify(data.message, {globalPosition: "bottom right", className: 'success'});
                $scope.$root.$broadcast("updateList");
                $scope.reset();
            }
        });
    };
    
    // Update fornecedor
    $scope.update = function() {
        
        var id = null;
        var object = $scope.defaultObject;
        
        // First item
        if (Object.keys(object)[0].substring(0,2) === "PK") {
            id = object[Object.keys(object)[0]];
        }

        if (id !== null) {
            object.id = id; // Sets id
            $scope.defaultService.update(object, function(data) {
                if (data.status) {
                    $scope.$root.$broadcast("updateList");
                    $.notify(data.message, {globalPosition: "bottom right", className: 'success'});
                    $scope.reset();
                    console.log($scope.defaultObject);
                }
            });
        } else {
            $scope.create();
        }
    };
    
    $scope.loadList = function(where, service) {
        
        if (!service) {
            service = $scope.defaultService;
        }
        
        // Load initial data
        var list = new ngTableParams({
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
        
        // Update some list witch this controller have
        $scope.$on('updateList', function() {
            list.reload();
        });
        
        return list;

    };
    
    $scope.reset = function() {
        $scope.defaultObject = angular.copy($scope.masterDefaultObject);
    };*/
    
});