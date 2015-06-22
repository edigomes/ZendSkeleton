var app = angular.module('app', ['ui.bootstrap', 'ngRoute', 'ui.router', 'ngTable', 'ngResource']).run(function($rootScope, $modalStack) {
  $modalStack. dismissAll();
});
app.directive('ngEnter', function () {
    return function (scope, element, attrs) {
        element.bind("keydown keypress", function (event) {
            if(event.which === 13) {
                scope.$apply(function (){
                    scope.$eval(attrs.ngEnter);
                });

                event.preventDefault();
            }
        });
    };
});
