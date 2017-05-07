app.controller('LoginController', function($scope, $location, $http, $window) {

    $scope.logIn = function () {
      console.log($scope.matricula);
      var data = {
        matricula: $scope.matricula,
        password: $scope.password
      };
      $http.get('http://127.0.0.1:8000/api/login?matricula='+data.matricula+'&password='+data.password).then(
        function(data){
          localStorage.setItem("Authorization", data.data.token);
          var token = localStorage.getItem("Authorization");
           $window.location.href = '#/home';
        },
        function(error){
          if(error.status == 401){
            console.log('Login Inválido');
          }
        }
      );
    };

});
