app.controller('MainController', function($rootScope, $location, $scope, $modal, $modalInstance, ModalFormService, CustomersService, params) {
    
    $scope.$on('$routeChangeStart', function (event, newUrl, oldUrl) {
        console.log('Remove modal popup if necessary!');
        // if modal instance difined, dismiss window
        if ($scope.modalInstance) {
            $scope.modalInstance.dismiss('cancel');
        }
    });
   
});