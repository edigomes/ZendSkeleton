app.controller('cadastros', function($rootScope, $location, $scope, $http, ngTableParams, ModalFormService) {

    $rootScope.activetab = $location.path();
    $scope.loadList = function() {
        
        $scope.num = 2;
        
        $scope.tableParams = new ngTableParams({
            page: 1,            // show first page
            count: 1,          // count per page
            sorting: {
                name: 'asc'     // initial sorting
            }
        }, {
            total: 0,           // length of data
            getData: function($defer, params) {
                console.log(params.url());
                $http.get('../public/system/CAD_cliente',{
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
        
        $rootScope.$on('someEvent', function() {
            console.log('update!!');
            $scope.tableParams.reload();
        });
        
    };
    
    $scope.loadList();

    $scope.edit = function(PK) {
        ModalFormService.openModal('cadastros/cliente/ClientesForm', $scope, {PK: PK});
    };
   
});