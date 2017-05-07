app.controller('BuscarMonitoriaController', function($scope, $http) {
  var token = localStorage.getItem('Authorization');
  var aluno = localStorage.getItem('aluno');
  var aluno = JSON.parse(aluno);

  $scope.error = false;
  $http({
    method: 'GET',
    url: '/api/curso/'+aluno.curso_id+'/disciplinas?apenas_com_monitores=1',
    headers: {
      'Authorization': 'Bearer ' + token
    }
  }).then(
    function(response){
      console.log(response);
      $scope.disciplinas = response.data;
    },
    function(err){
      if(err.status == 401){
        console.log('Deu erro');
      }
    }
  );

  $scope.learn = function(id){
    var aluno = localStorage.getItem('aluno');
    var aluno = JSON.parse(aluno);
    var data = {
      'id_aluno': aluno.id,
      'id_disciplina': id
    };
    $http({
      method: 'POST',
      url:'/api/mentoria/solicitar',
      headers: {
        'Authorization': 'Bearer ' + token
      },
      data: data
    })
    .then(
      function(data){
        
        console.log(data);
      },
      function(err){
        console.log(err);
      }
    );
  };
});
