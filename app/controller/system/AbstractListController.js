//app.controller("AbstractListController", function($rootScope, $location, $scope, defaultService, ngTableParams, ModalFormService) {
app.controller("AbstractListController", function($rootScope, $location, $stateParams, $scope, formObject, defaultService, ngTableParams) {
    
    // Sets active tab on menu
    $rootScope.activetab = $location.path();
    $scope.keywords = "";
    
    // Required
    $scope.defaultService = defaultService;
    $scope.masterDefaultObject = function() { return formObject; }(); // Stores original object
    $scope.formObject = formObject;

    // Show the fornecedor in a form
    $scope.show = function(id) {
        if (!id) return; 
        $scope.defaultService.show({id: id}, function(obj) {
            $scope.formObject = obj;
        });
    };
    
    // Create new fornecedor
    $scope.create = function() {
        $scope.defaultService.create($scope.formObject, function(data){
            if (data.status) {
                
                if ($scope.$parent.formObject === undefined) {
                    $stateParams.id = data.insertId;
                }
                
                //console.log($scope.getId());
                $.notify(data.message, {globalPosition: "bottom right", className: 'success'});
                $scope.$root.$broadcast("updateList");
                $scope.reset();
            }
        });
    };
    
    // Update fornecedor
    $scope.update = function() {
        
        //var id = null;
        var object = function() { return $scope.formObject; }();

        // TODO: Redundant...
        // resolve foreign keys
        for (prop in $scope.masterDefaultObject) {
            if (typeof $scope.masterDefaultObject[prop] === 'function') {
                //console.log($scope.masterDefaultObject[prop]());
                object[prop] = $scope.masterDefaultObject[prop]();
                console.warn($scope.masterDefaultObject[prop]());
            }
        }
        
        console.warn($scope.masterDefaultObject);
        //return;
        //console.warn($scope.formObject); return;
        //return;

        // First item
        //if (Object.keys(object)[0].substring(0,2) === "PK" || Object.keys(object)[0].substring(0,2) === "pk") {
            //id = object[Object.keys(object)[0]];
        //}

        if ($scope.getId() !== undefined) {
            object.id = $scope.getId(); // Sets id
            $scope.defaultService.update(object, function(data) {
                if (data.status) {
                    $scope.$root.$broadcast("updateList");
                    $.notify(data.message, {globalPosition: "bottom right", className: 'success'});
                    //$scope.reset();
                }
            });
        } else {
            $scope.create();
        }
    };
    
    $scope.loadList = function(_where, service) {
        
        // Const (entender pq essa merda agora assume as variaveis a antes não assumia.....)
        var where = function() { return _where; }();
        
        // TODO: redundant
        for (prop in where) {
            if (typeof where[prop] === 'function') {
                where[prop] = where[prop]();
                if (where[prop] === undefined) {
                    where[prop] = null;
                }
            }
        }
        
        console.log(where);
        
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
                    console.log(data.result);
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
    
    $scope.getId = function() {
        
        if ($scope.$parent.formObject === undefined) {
            return $stateParams.id;
        } else {
            if (Object.keys($scope.formObject)[0].substring(0,2) === "PK" || Object.keys($scope.formObject)[0].substring(0,2) === "pk") {
                return $scope.formObject[Object.keys($scope.formObject)[0]];
            } else {
                return undefined;
            }
        }

    };
    
    $scope.logId = function() {
        console.log($scope.getId());
        console.log($scope.masterDefaultObject);
        console.log($stateParams.id);
    };
    
    // Autoload object if id is defined
    
});