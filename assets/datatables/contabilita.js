var app = angular.module('demo',[]);


app.controller('sign_up', function($scope, $http){
	$scope.check_credentials = function () {
		document.getElementById("message").textContent = "";

		console.log();

		var request = $http({
			method:"post",
			url:"process_data.php",
			data:{
				email: $scope.email,
				pass: $scope.password
			},
			headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
		});

		request.success(function(data){
			document.getElementById("message").textContent = "yu have login with success!!";
		});
	}
});