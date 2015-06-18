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
        <script src="factory/DataService.js"></script>
        <!-- CONTROLLERS -->
        <script src="controller/system/BasicDataController.js"></script>
        <script src="components/customers/service/CustomersService.js"></script>
        <script src="components/customers/controller/CustomerController.js"></script>
        <script src="components/customers/controller/CustomersListController.js"></script>
        <script src="route/routes.js"></script>
        
        
    </head>
    <body ng-app="app">
        <?php require 'view/system/menu.php'; ?>
        <div ui-view ></div>
    </body>
</html>
