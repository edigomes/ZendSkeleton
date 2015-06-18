var app = angular.module('app', ['ui.bootstrap', 'ngRoute', 'ui.router', 'ngTable', 'ngResource']).run(function($rootScope, $modalStack) {
  $modalStack. dismissAll();
}); 
