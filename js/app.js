var app = angular.module('monitori', ['ngRoute'])
.config(function($routeProvider, $locationProvider){
  $routeProvider.when('/',{
      templateUrl: 'views/login.html',
      controller: 'LoginController'
  }).when('/home', {
      templateUrl: 'views/home.html',
      controller: 'HomeController'
  }).when('/buscar-monitoria', {
      templateUrl: 'views/buscar-monitoria.html'
  });
  $locationProvider.hashPrefix('');
});
