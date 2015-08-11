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
                {title: "Alterar Item"}
            );
        }
    }).state('estoque.new', {
        url: "/new",
        onEnter: function (ModalFormService) {
            ModalFormService.openModal(
                'components/estoque/view/EstoqueFormView.html', 
                {title: "Novo Item"}
            );
        }
    })
    
    /*********************************************************/
    
    .state('entrada', {
        url: "/entrada",
        templateUrl: 'components/entrada/view/EntradaListView.html',
        controller: 'EntradaListController'
    }).state('entrada.edit', {
        url: "/edit/{id}",
        onEnter: function ($stateParams, ModalFormService) {
            ModalFormService.openModal(
                'components/entrada/view/EntradaFormView.html', 
                {title: "Editar Entrada"}
            );
        }
    }).state('entrada.new', {
        url: "/new",
        onEnter: function (ModalFormService) {
            ModalFormService.openModal(
                'components/entrada/view/EntradaFormView.html', 
                {title: "Novo Entrada"}
            );
        }
    })
    
    /*********************************************************/
    
    .state('venda', {
        url: "/venda",
        templateUrl: 'components/venda/view/VendaListView.html',
        controller: 'VendaListController'
    }).state('venda.edit', {
        url: "/edit/{id}",
        onEnter: function ($stateParams, ModalFormService) {
            ModalFormService.openModal(
                'components/venda/view/VendaFormView.html', 
                {title: "Editar Venda"}
            );
        }
    }).state('venda.new', {
        url: "/new",
        onEnter: function (ModalFormService) {
            ModalFormService.openModal(
                'components/venda/view/VendaFormView.html', 
                {title: "Nova Venda"}
            );
        }
    });
    
});