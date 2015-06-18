app.service('ngTableService', function($routeParams, $state) {
    
    this.getData = function(service, filter) {
        
        $rootScope.$on('someEvent', function() {
            console.log('update!!');
            $scope.tableParams.reload();
        });
        
        return new ngTableParams({
            page: 1,            // show first page
            count: 1,          // count per page
            sorting: {
                name: 'asc'     // initial sorting
            }
        }, {
            total: 0,           // length of data
            getData: function($defer, params) {
                console.log(params.url());
                $http.get('../system/CAD_cliente',{
                    params : params.url()
                }).success(function(data){
                    console.log(data);
                    // update table params
                    params.total(data.total);
                    // set new data
                    $defer.resolve(data.result);
                });
            }
        });

    };

    this.refresh = function() {

    };
    
});