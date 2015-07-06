<?php
//header("Content-Type: text/html; charset=ISO-8859-1",true);
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <title>CRONOS</title>
        <meta name="MobileOptimized" content="480">
        <link rel="stylesheet" href="view/css/bootstrap.min.css">
        <link rel="stylesheet" href="view/css/style.css">
        <script src="libs/jquery.min.js"></script>
        <script src="libs/angular.js"></script>
        <script src="libs/angular-ui-router.js"></script>
        <script src="libs/angular-route.js"></script>
        <script src="libs/ui-bootstrap-tpls-0.12.0.min.js"></script>
        <script src="libs/bootstrap.min.js"></script>
        <script src="libs/notify.min.js"></script>
        <script src="modules/ng-table/ng-table.js"></script>
        <script src="modules/angular-resource.min.js"></script>

        <!-- APP -->
        <script src="app.js"></script>

        <!-- SERVICES -->
        <script src="factory/ModalFormService.js"></script>
        <script src="factory/AbstractService.js"></script>
        
        <!-- CONTROLLERS -->
        <script src="controller/system/AbstractListController.js"></script>
        
        <script src="components/customers/service/CustomersService.js"></script>
        <script src="components/customers/controller/CustomersController.js"></script>
        <script src="components/customers/controller/CustomersListController.js"></script>
        
        <script src="components/fornecedor/service/FornecedorService.js"></script>
        <script src="components/fornecedor/controller/FornecedorController.js"></script>
        <script src="components/fornecedor/controller/FornecedorListController.js"></script>
        
        <script src="components/fornecedor/service/ContatoFornecedorService.js"></script>
        <!--<script src="components/fornecedor/controller/FornecedorController.js"></script>-->
        <script src="components/fornecedor/controller/ContatoFornecedorListController.js"></script>
        
        <script src="components/estoque/service/EstoqueService.js"></script>
        <script src="components/estoque/controller/EstoqueController.js"></script>
        <script src="components/estoque/controller/EstoqueListController.js"></script>
        
        
        <script src="route/routes.js"></script>

    </head>
    <body ng-app="app">
        <?php require 'view/system/menu.php'; ?>
        <div ui-view ></div>
    </body>
</html>
