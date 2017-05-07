app.controller('MenuController', ['$scope', '$location', function($scope, $location) {
    $scope.location = $location;
    console.log($location.path());
}]);