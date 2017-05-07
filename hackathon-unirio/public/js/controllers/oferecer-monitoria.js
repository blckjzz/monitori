app.controller('OferecerMonitoriaController', function($scope, $http) {
  var token = localStorage.getItem('Authorization');
  var aluno = localStorage.getItem('aluno');
  var aluno = JSON.parse(aluno);
  $scope.error = false;
  $http({
    method: 'GET',
    url: '/api/curso/'+aluno.curso_id+'/disciplinas',
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

  $scope.teach = function(id){
    $http.post('/api/disciplina/'+id+'/teach')
    .then(
      function(){
        $window.location.href = '#/ensinar';
      },
      function(err){
        console.log(err);
      }
    );
  };
});
