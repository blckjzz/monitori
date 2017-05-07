app.controller('HomeController', function($scope, $http) {
  var token = localStorage.getItem('Authorization');
  $scope.error = false;
  $http({
    method: 'GET',
    url: '/api/user/auth',
    headers: {
      'Authorization': 'Bearer ' + token
    }
  }).then(
    function(response){
      localStorage.setItem('aluno', JSON.stringify(response.data));
      var aluno = localStorage.getItem('aluno');
      var aluno = JSON.parse(aluno);
      console.log(aluno);
    },
    function(err){
      if(err.status == 401){
        $scope.error = true;
      }
    }
  );
});
