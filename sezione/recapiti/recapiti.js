app.controller("RecapitiCtrl",function($scope, $http){
	getInfo();

	function getInfo(){
		$http.get('sezione/recapiti/recapiti.json').success(function(data){
			console.log(data);
			$scope.details = data;

		}).error(function(data){
			console.log("data");
		});
	}
})

