app.controller("CustomersListController", function($rootScope, $location, $scope, ngTableParams, ModalFormService, CustomersService) {
    
    console.log("CustomersListController are loaded.");
    
    // Sets active tab on menu
    $rootScope.activetab = $location.path();
    
    $scope.new = function() {
        ModalFormService.openModal('../components/customers/CustomersFormView.html', $scope, {PK: PK_cliente});
    };
    
    $scope.edit = function(PK_cliente) {
        ModalFormService.openModal('../components/customers/CustomersFormView.html', $scope, {PK: PK_cliente});
    };
   
    // Load list of customers
    $scope.loadList = function() {
        // Load initial data
        $scope.customersList = new ngTableParams({
            page: 1,            // show first page
            count: 1,          // count per page
            sorting: {
                xNome: 'ASC'     // initial sorting
            }
        }, {
            total: 0,           // length of data
            getData: function($defer, params) {
                CustomersService.query({page : params.page()}, function(data) {
                    // update table params
                    params.total(data.pageCount);
                    //console.log(params.page());
                    //console.log(params.count());
                    // set new data
                    $defer.resolve(data.result);
                });
            }
        });
    }; 
    
    $scope.loadList();
    
    // Update some list witch this controller have
    $scope.$on('updateList', function() {
        $scope.customersList.reload();
    });
   
});