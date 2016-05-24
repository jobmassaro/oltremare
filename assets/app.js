var app = angular.module('oltremare',['ngGrid','angularUtils.directives.dirPagination']);

app.filter('startFrom', function() {
    return function(input, start) {
        if(input) {
            start = +start; //parse to int
            return input.slice(start);
        }
        return [];
    }
});






app.factory('provincieService', function($http){
    var baseUrl = 'services/';
    return {
        getProvincie:function(){
             return $http.get(baseUrl + 'getProvincie.php');
        }
    };
});


app.controller('listMemberCtrl', function($scope, $http, filterFilter){
	$http.post('services/getMembers.php').success(function(data){
            $scope.details= data;
            

            $scope.currentPage = 1; //current page
            $scope.maxSize = 10; //pagination max size
            $scope.entryLimit = 10; //max rows for data table

            /* init pagination with $scope.list */
            $scope.noOfPages = Math.ceil($scope.details.length/$scope.entryLimit);
    
            $scope.$watch('search', function(term) {
            // Create $scope.filtered and then calculat $scope.noOfPages, no racing!
                $scope.filtered = filterFilter($scope.details, term);
                $scope.noOfPages = Math.ceil($scope.filtered.length/$scope.entryLimit);
            });

            $scope.sort = function(keyname){
           	 $scope.sortKey = keyname;
            $scope.reverse = !$scope.reverse;
        }
	});
});