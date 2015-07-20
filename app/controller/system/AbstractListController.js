//app.controller("AbstractListController", function($rootScope, $location, $scope, defaultService, ngTableParams, ModalFormService) {
app.controller("AbstractListController", function($rootScope, $location, $stateParams, $scope, formObject, defaultService, ngTableParams) {
    
    // Sets active tab on menu
    $rootScope.activetab = $location.path();
    $scope.keywords = "";
    
    // Required
    $scope.defaultService = defaultService;
    //$scope.masterDefaultObject = formObject; // Stores original object
    $scope.masterDefaultObject = angular.copy(formObject); // Stores original object
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
                    $scope.setId(data.insertId);
                    $scope.formObject = data.insertObject;
                }
                
                $.notify(data.message, {globalPosition: "bottom right", className: 'success'});
                $scope.$root.$broadcast("updateList");
                if (!$scope.isParent()) {
                    $scope.reset();
                }
            }
        });
    };
    
    // Peforms a deletion of object
    $scope.remove = function(id) {
        if (id === undefined) { 
            alert('Please pass the id!');
            return;
        } 
        if (confirm("Excluir item "+id+"?")) {
            $scope.defaultService.delete(id, function(data){
                if (data.status) {
                    $.notify(data.message, {globalPosition: "bottom right", className: 'success'});
                    $scope.$root.$broadcast("updateList");
                }
            });
        }
    };
    
    // Update
    $scope.update = function(callback) {
        
        //var toUpdate = $scope.resolveFK($scope.formObject);
        $scope.formObject = $scope.resolveFK($scope.formObject);

        if ($scope.getId() !== undefined) {
            $scope.formObject.id = $scope.getId(); // Sets id
            $scope.defaultService.update($scope.formObject, function(data) {
                if (data.status) {
                    // Update all lists
                    $scope.$root.$broadcast("updateList");
                    
                    // Reset form if not parent
                    if (!$scope.isParent()) {
                        $scope.reset();
                    }
                    
                    // If callback
                    if (callback) {
                        callback();
                    } else {   
                        $.notify(data.message, {globalPosition: "bottom right", className: 'success'});
                    }
                    
                } else {
                    $.notify(data.message, {globalPosition: "bottom right", className: 'error'});
                }
            });
        } else {
            $scope.create();
        }
    };
    
    $scope.loadList = function(_where, service) {
        
        var where = angular.copy(_where);
        
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
                service.query({page : params.page(), count: params.count(), keywords: $scope.keywords, where: $scope.resolveFK(where)}, function(data) {
                    // update table params
                    params.total(data.pageCount*params.count());
                    
                    if (data.result.length < 10) {
                        params.settings().counts = 0;
                    }

                    //Log return data
                    //console.log(data.result);
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
    
    $scope.isParent = function() {
        if ($scope.$parent.formObject === undefined) {
            return true;
        } else {
            return false;
        }
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
    };
    
    $scope.setId = function(id) {
        if ($scope.$parent.formObject === undefined) {
            $stateParams.id = id;
        }
    };
    
    $scope.logDefault = function () {
        console.log($scope.masterDefaultObject);
    };
    
    /**
     * Transforma funções do objeto nos valores de seus retornos
     * @param {type} objToResolve
     * @returns {undefined}
     */
    $scope.resolveFK = function(objToResolve) {
        
        var toResolve = angular.copy(objToResolve);
        
        for (prop in toResolve) {
            if (typeof toResolve[prop] === 'function') {
                
                if (angular.uppercase(prop.substring(0,2)) === "FK") {
                    //console.log(prop);
                    var value = toResolve[prop]();
                    if (value !== undefined) {
                        toResolve[prop] = value;
                    } else {
                        toResolve[prop] = null;
                    }
                }
            }
        }
        
        return toResolve;
        
    };
    
    // Autoload object if id is defined
    $scope.getTotal = function(object, column, column2) {
        if (object === undefined || object.length === 0) {
            return;
        }
        var sum = 0;
        for (value in object) {
            if (column2) {
                sum += object[value][column] * object[value][column2];
            } else {
                sum += object[value][column];
            }
        }
        return sum;
    };
    
});