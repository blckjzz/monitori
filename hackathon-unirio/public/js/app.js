var app = angular.module('monitori', ['ngRoute'])
.config(function($routeProvider, $locationProvider){
  $routeProvider.when('/',{
      templateUrl: 'views/login.html',
      controller: 'LoginController'
  }).when('/home', {
      templateUrl: 'views/home.html',
      controller: 'HomeController'
  }).when('/aprender', {
      templateUrl: 'views/buscar-monitoria.html'
  }).when('/ensinar', {
      templateUrl: 'views/oferecer-monitoria.html',
      controller: 'OferecerMonitoriaController'
  }).when('/meu-painel', {
      templateUrl: 'views/meu-painel.html',
      controller: 'MeuPainelController'
  });
  $locationProvider.html5Mode(true);
});
