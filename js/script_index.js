const app = angular.module("myApp", []);

app.constant('maxLengthComment', 50000); 

app.controller('myController', ['$scope', 'maxLengthComment', function($scope, maxLengthComment){
  $scope.comment = '';
  
  $scope.validateComment = function(){
    return ($scope.comment.length > 50000);
  };
  
  $scope.commentLengthPercentage = function(){
    let percentage = Math.floor(($scope.comment.length / maxLengthComment) * 100);
    
    return (percentage >= 100) ? 100 : percentage;
  }
  
  $scope.setProgressWidth = function(){
    return {
      'width':$scope.commentLengthPercentage() + "%"
    };
  }
  
  $scope.progressOver50 = function(){
    return ($scope.commentLengthPercentage() >= 50);
  };
  
  $scope.progressOver75 = function(){
    return ($scope.commentLengthPercentage() >= 75);
  }
}]);