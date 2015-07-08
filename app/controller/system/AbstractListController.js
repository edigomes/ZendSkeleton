//app.controller("AbstractListController", function($rootScope, $location, $scope, defaultService, ngTableParams, ModalFormService) {
app.controller("AbstractListController", function($rootScope, $location, $stateParams, $scope, formObject, defaultService, ngTableParams) {
    
    // Sets active tab on menu
    $rootScope.activetab = $location.path();
    $scope.keywords = "";
    
    // Required
    $scope.defaultService = defaultService;
    $scope.masterDefaultObject = formObject; // Stores original object
    $scope.formObject = formObject;
    
    // Show the fornecedor in a form
    $scope.show = function(id) {
        $scope.defaultService.show({id: id}, function(obj) {
            $scope.formObject = obj;
        });
    };
    
    // Create new fornecedor
    $scope.create = function() {
        console.log($scope.formObject);
        $scope.defaultService.create($scope.formObject, function(data){
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
        var object = $scope.formObject;
        
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
                    //$scope.reset();
                    console.log($scope.formObject);
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
                    
                    if (data.result.length < 10) {
                        params.settings().counts = 0;
                    }
                    
                    //Log return data
                    console.log(data);
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
        $scope.formObject = angular.copy($scope.masterDefaultObject);
    };
    
});