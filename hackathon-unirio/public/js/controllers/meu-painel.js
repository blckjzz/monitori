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
    function(data){
      if(data){
        console.log('entrou');
        console.log(data);
        var solicitacao = data.data[0];
        solicitacao.aceita = null;
        $scope.solicitacao = solicitacao;
        console.log(solicitacao);

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
