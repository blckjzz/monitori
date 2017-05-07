app.controller('LoginController', function($scope, $location, $http) {

    $scope.logIn = function () {
      console.log($scope.matricula);
      var data = {
        matricula: $scope.matricula,
        password: $scope.password
      };
      $http.get('http://127.0.0.1:8000/api/login?matricula='+data.matricula+'&password='+data.password).then(function(){
        console.log('pegou');
      });
    };

});
