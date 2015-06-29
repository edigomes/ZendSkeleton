app.controller("CustomersListController", function($rootScope, $location, $scope, ngTableParams, ModalFormService, CustomersService) {
    
    console.log("CustomersListController are loaded.");
    
    // Sets active tab on menu
    $rootScope.activetab = $location.path();
    $scope.keywords = "";
    
    $scope.new = function() {
        ModalFormService.openModal('../components/customers/CustomersFormView.html', $scope, {id: id});
    };
    
    $scope.edit = function(id) {
        ModalFormService.openModal('../components/customers/CustomersFormView.html', $scope, {id: id});
    };
   
    // Load list of customers
    $scope.loadList = function() {
        // Load initial data
        $scope.customersList = new ngTableParams({
            page: 1,            // show first page
            count: 5,
            sorting: {
                xNome: 'ASC'     // initial sorting
            }
        }, {
            total: 0,           // length of data
            getData: function($defer, params) {
                CustomersService.query({page : params.page(), count: params.count(), keywords: $scope.keywords}, function(data) {
                    // update table params
                    console.log(params.count);
                    params.total(data.pageCount*params.count());
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