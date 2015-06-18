app.service('ModalFormService', function($modal, $state) {
    
    noBack = true;
    
    this.openModal = function(modalName, options) {
        $modal.open({
            templateUrl: modalName,
            size: 'lg',
            //scope: scope,
            controller: function($scope, $modalInstance) {
                
                $scope.title = options.title;
                
                $scope.$on('$stateChangeStart', function(e, toState, toParams, fromState, fromParams) {
                    $modalInstance.close({toState: toState});
                    console.log(toState.url);
                });
                
                $scope.ok = function () {
                    $modalInstance.close($scope.selected.item);
                };
                
                $scope.cancel = function () {
                    $modalInstance.dismiss('cancel');
                    $state.go('^');
                };
    
            },
            resolve: {
                params: function() {
                    return options.params;
                }
            },
            onEnter: function($scope, $modalInstance) {
                $scope.cancel = function() {
                    $modalInstance.dismiss('cancel');
                };
            }
        }).result.then(function(result, $modalInstance) {
            console.log(result.toState.url);
            console.log("close");
            //$state.go('^');
            //window.history.back();
            //console.log($modalInstance);
        }, function() {
            $state.go('^');
        });
    };
    
});