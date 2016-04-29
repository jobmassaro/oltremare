app.controller("StampaCtrl",function($scope, $http){
	getInfo();

	function getInfo(){
		$http.get('sezione/stampa/cv.json').success(function(data){
			console.log(data);
			$scope.details = data;

		}).error(function(data){
			console.log("data");
		});
	}





	
})

