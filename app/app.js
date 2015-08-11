var app = angular.module('app', ['angucomplete-alt', 'ngMask', 'ui.bootstrap', 'ngRoute', 'ui.router', 'ngTable', 'ngResource', 'ngToast']).run(function($rootScope, $modalStack) {
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
app.filter('cmdate', [
    '$filter', function($filter) {
        return function(input, format) {
            if (input === null) {
                return "--";
            }
            return $filter('date')(new Date(input), format);
        };
    }
]);
app.filter('cmdcur', [
    '$filter', function($filter) {
        return function(input, format) {
            return $filter('currency')(input, format);
        };
    }
]);
app.filter('cmddec', [
    '$filter', function($filter) {
        return function(input, format) {
            return $filter('number')(input, format);
        };
    }
]);
app.directive('format', ['$filter', function ($filter) {
    return {
        require: '?ngModel',
        link: function (scope, elem, attrs, ctrl) {
            
            if (!ctrl) return;
            
            if (attrs.format === "datetime") {
                ctrl.$formatters.unshift(function (a) {
                    if (ctrl.$modelValue === undefined || ctrl.$modelValue === null) {
                        return;
                    }
                    return $filter('date')(new Date(ctrl.$modelValue), 'dd/MM/yyyy HH:mm');
                });

                ctrl.$parsers.unshift(function (viewValue) {
                    if (viewValue.indexOf("/") !== -1) {
                        var split = viewValue.split("/");
                        var splitYear = split[2].split(" ");
                        viewValue = splitYear[0]+"-"+split[1]+"-"+split[0]+" "+splitYear[1];

                    }
                    return viewValue;
                });
            
            } else if (attrs.format === "qtde") {
            
            } else {

                ctrl.$formatters.unshift(function (a) {
                    return $filter('currency')(ctrl.$modelValue, "")
                });

                ctrl.$parsers.unshift(function (viewValue) {
                    if (viewValue.length <= 3) {
                        viewValue = '00'+viewValue;
                    }
                    var value = viewValue;
                    value = value.replace(/\D/g,"");
                    value = value.replace(/(\d{2})$/,",$1");
                    value = value.replace(/(\d+)(\d{3},\d{2})$/g,"$1.$2");
                    var qtdLoop = (value.length-3)/3;
                    var count = 0;
                    while (qtdLoop > count)
                    {
                        count++;
                        value = value.replace(/(\d+)(\d{3}.*)/,"$1.$2");
                    }
                    var plainNumber = value.replace(/^(0)(\d)/g,"$2");

                    elem.val(plainNumber);
                    //return plainNumber;
                    return plainNumber.replace(".","#").replace(",",".").replace("#","");
                });

                elem.bind('blur', function () {
                    var valueFilter = elem.val();
                    valueFilter = valueFilter.replace(/\D/g,"");
                    if (attrs.zeroFilter == 'true') {
                        if (valueFilter == 0) {
                            elem.val('');
                        }
                    }
                });
                
            }
            
        }
    };
}]);
app.directive('datetime', ['$filter', function ($filter) {
    return {
        require: '?ngModel',
        link: function (scope, elem, attrs, ctrl) {
            
            if (!ctrl) return;

            ctrl.$formatters.unshift(function (a) {
                // exibição
                return $filter('currency')(ctrl.$modelValue, "")
            });

            ctrl.$parsers.unshift(function (viewValue) {
                // data
                return viewValue;
            });

            elem.bind('blur', function () {
                var valueFilter = elem.val();
                valueFilter = valueFilter.replace(/\D/g,"");
                if (attrs.zeroFilter == 'true') {
                    if (valueFilter == 0) {
                        elem.val('');
                    }
                }
            });
        }
    };
}]);
