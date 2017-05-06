angular.module('monitori', ['ngRoute'])
.config(function($routeProvider){
  $routeProvider
  .when('/',{
      templateUrl: 'views/login.html'
  });
});
