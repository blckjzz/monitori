app.controller('MeuPainelController', function($scope, $http) {
  var token = localStorage.getItem('Authorization');
  $scope.error = false;
  $http({
    method: 'GET',
    url: '/api/mentoria/listar',
    headers: {
      'Authorization': 'Bearer ' + token
    }
  }).then(
    function(response){
      console.log(response);
      if(response.data.length === 0){
        $scope.alert = true;
      }else{
        $scope.monitorias = true;
      }
    },
    function(err){
      if(err.status == 401){
        console.log('Deu erro');
      }
    }
  );
});
