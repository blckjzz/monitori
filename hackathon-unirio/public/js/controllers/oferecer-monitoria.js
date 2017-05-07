app.controller('OferecerMonitoriaController', function($scope, $http) {
  var token = localStorage.getItem('Authorization');
  var aluno = localStorage.getItem('aluno');
  var aluno = JSON.parse(aluno);
  $scope.error = false;
  atualizaDisciplinas();
  getDisciplinas();

  function getDisciplinas(){
    $http({
    method: 'GET',
    url: '/api/curso/'+aluno.curso_id+'/disciplinas',
    headers: {
      'Authorization': 'Bearer ' + token
    }
  }).then(
    function(response){
      console.log(response);
      var disciplinas = [];
      for (disciplina in response.data) {
        if ($scope.ofertadas.indexOf(disciplina) == -1) {
          disciplinas.push(disciplina);
        }
      }
      $scope.disciplinas = response.data;

    },
    function(err){
      if(err.status == 401){
        console.log('Deu erro');
      }
    }
  );
}
function atualizaDisciplinas(){
  $http({
  method: 'GET',
  url: '/api/user/auth/ofertadas',
  headers: {
    'Authorization': 'Bearer ' + token
  }
}).then(
  function(response){
    if(response.data.length === 0){
      $scope.semdisciplinas = true;
    }else{
        $scope.semdisciplinas = false;
    }
    $scope.ofertadas = response.data;
  },
  function(err){
    if(err.status == 401){
      console.log('Deu erro');
    }
  }
);
}
  $scope.teach = function(id){
    $http({
      method: 'POST',
      url:'/api/disciplina/'+id+'/toggle',
      headers: {
        'Authorization': 'Bearer ' + token
      }
  }).then(
      function(){
        atualizaDisciplinas();
        getDisciplinas();
      },
      function(err){
        console.log(err);
      }
    );
  };
  $scope.unteach = function(id){
    $http({
      method: 'POST',
      url:'/api/disciplina/'+id+'/toggle',
      headers: {
        'Authorization': 'Bearer ' + token
      }
  }).then(
      function(){
        atualizaDisciplinas();
      },
      function(err){
        console.log(err);
      }
    );
  };
});
