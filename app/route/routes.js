app.config(function($stateProvider, $urlRouterProvider){

    // For any unmatched url, send to /route1
    $urlRouterProvider.otherwise("/home")

    $stateProvider
    .state('home', {
        url: "/home",
        template: 'HOME'
    })

    .state('customers', {
        url: "/customers",
        templateUrl: 'components/customers/view/CustomersListView.html',
        controller: 'CustomersListController'
    }).state('customers.edit', {
        url: "/edit/{id}",
        onEnter: function ($stateParams, ModalFormService) {
            ModalFormService.openModal(
                'components/customers/view/CustomersFormView.html', 
                {title: "Edit Customer"}
            );
        }
    }).state('customers.new', {
        url: "/new",
        onEnter: function (ModalFormService) {
            ModalFormService.openModal(
                'components/customers/view/CustomersFormView.html', 
                {title: "New Customer"}
            );
        }
    });
    
});