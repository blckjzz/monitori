app.controller('MenuController', function($scope, $location) {
    $scope.location = $location;
    var aluno = localStorage.getItem('aluno');
    $scope.aluno = JSON.parse(aluno);
});
