app.controller('HomeController', function($scope, $http) {
  var token = localStorage.getItem('Authorization');
  $http({
    method: 'GET',
    url: 'http://localhost:8000/api/user/auth',
    headers: {
      'Authorization': 'Bearer ' + token
    }
  }).then(
    function(data){
      console.log(data);
    },
    function(error){
      if(error.status == 401){
        console.log('Login Inválido');
      }
    }
  );
});
