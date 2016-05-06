app.controller("ExtraCtrl",function($scope, $http){
getScuoleExtra();

$scope.show_form = true;
function getScuoleExtra(){
		$http.get('sezione/corsi/extra/extra.json').success(function(data){
			$scope.details = data;

		}).error(function(data){
			console.log("data");
		});
	}


})