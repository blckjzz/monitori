angular.module('monitori', ['ngRoute'])
.config(function($routeProvider, $locationProvider){
  $routeProvider.when('/',{
      templateUrl: 'views/login.html'
  });
  $locationProvider.hashPrefix('');
});
