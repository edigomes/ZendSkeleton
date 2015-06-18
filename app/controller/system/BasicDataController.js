app.controller('BasicDataController', function($rootScope, $http, $modalInstance, $scope, $filter, $stateParams, ModalFormService, ngTableParams, params) {

    $scope.loadData = function() {
        
        if (typeof $scope.cliente === 'undefined') {
            $scope.cliente = {};
        }
        
        if (params.PK) {

            var get = $http.get('system/CAD_cliente/'+params.PK);
            get.success(function (data, status, headers, config) {
                $scope.cliente = data.data;
            });
            get.error(function (data, status, headers, config) {
                // Some code has gone here
            });

            var getList = $http.get('../system/CAD_contato');
            getList.success(function (data, status, headers, config) {

                data = data.result;
                console.log(data);
                $scope.tableParams2 = new ngTableParams({
                    page: 1,            // show first page
                    count: 10           // count per page
                }, {
                    total: data.total, // length of data
                    getData: function($defer, params) {
                        $defer.resolve(data.slice((params.page() - 1) * params.count(), params.page() * params.count()));
                    }
                });

            });

            getList.error(function (data, status, headers, config) {
                // Some code has gone here
            });

        }

    };

    $scope.saveData = function() {

        console.log($scope.cliente);

        if (params.PK) {

            return $http.put('../system/CAD_cliente/'+params.PK,
                $scope.cliente
            ).then(function (status) {
                $.notify(status.data.message, {globalPosition: "bottom right", className: 'success'});
                $scope.tableParams.reload();
                return status.data;
            });

        } else {
            
            return $http.post('../system/CAD_cliente',
                $scope.cliente
            ).then(function (status) {
                $.notify(status.data.message, {globalPosition: "bottom right", className: 'success'});
                $scope.tableParams.reload();
                return status.data;
            });
            
        }

    };
    
    $scope.cancel = function () {
        $modalInstance.dismiss('cancel');
    };
   
});