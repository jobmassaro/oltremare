var app = angular.module('oltremare',['ngGrid','angularUtils.directives.dirPagination']);

app.factory('provincieService', function($http){
    var baseUrl = 'services/';
    return {
        getProvincie:function(){
             return $http.get(baseUrl + 'getProvincie.php');
        }
    };
});


app.controller('listMemberCtrl', function($scope, $http){
	$http.post('services/getMembers.php').success(function(data){
            $scope.details= data;

            if($scope.details.email_confirmed == "1")
                $scope.details.email_confirmed ="SI";
            else
                $scope.details.email_confirmed ="NO";
    
            $scope.sort = function(keyname){
           	 $scope.sortKey = keyname;
            	$scope.reverse = !$scope.reverse;
        }
	});
});