app.controller('LoginController', function($scope, $location, $http, $window) {

    $scope.logIn = function () {
      console.log($scope.matricula);
      var data = {
        matricula: $scope.matricula,
        password: $scope.password
      };
      $http.post('/api/login', data).then(
        function(data){
          localStorage.setItem("Authorization", data.data.token);
          var token = localStorage.getItem("Authorization");
          console.log(token);
          $window.location.href = '#/home';
        },
        function(error){
          if(error.status == 401){
            $scope.error = true;
          }
        }
      );
    };

});
