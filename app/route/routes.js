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
                {title: "Editar Cliente"}
            );
        }
    }).state('customers.new', {
        url: "/new",
        onEnter: function (ModalFormService) {
            ModalFormService.openModal(
                'components/customers/view/CustomersFormView.html', 
                {title: "Novo Cliente"}
            );
        }
    })
    
    /*********************************************************/
    
    .state('fornecedor', {
        url: "/fornecedor",
        templateUrl: 'components/fornecedor/view/FornecedorListView.html',
        controller: 'FornecedorListController'
    }).state('fornecedor.edit', {
        url: "/edit/{id}",
        onEnter: function ($stateParams, ModalFormService) {
            ModalFormService.openModal(
                'components/fornecedor/view/FornecedorFormView.html', 
                {title: "Editar Fornecedor"}
            );
        }
    }).state('fornecedor.new', {
        url: "/new",
        onEnter: function (ModalFormService) {
            ModalFormService.openModal(
                'components/fornecedor/view/FornecedorFormView.html', 
                {title: "Novo Fornecedor"}
            );
        }
    })
    
    /*********************************************************/
    
    .state('estoque', {
        url: "/estoque",
        templateUrl: 'components/estoque/view/EstoqueListView.html',
        controller: 'EstoqueListController'
    }).state('estoque.edit', {
        url: "/edit/{id}",
        onEnter: function ($stateParams, ModalFormService) {
            ModalFormService.openModal(
                'components/estoque/view/EstoqueFormView.html', 
                {title: "Editar Estoque"}
            );
        }
    }).state('estoque.new', {
        url: "/new",
        onEnter: function (ModalFormService) {
            ModalFormService.openModal(
                'components/estoque/view/EstoqueFormView.html', 
                {title: "Novo Estoque"}
            );
        }
    });
    
});