
app.controller("FormazioneCtrl",function($scope, $http){

	getFormazione();
	$('#frmUpdate').css('display', 'none');
		

	function getFormazione(){
		$http.get('sezione/formazione/formazione.json').success(function(data){
			console.log(data);
			$scope.details = data;

		}).error(function(data){
			console.log("data");
		});
	}




	$scope.editFormazione = function(info){
		$scope.editform = info;
		console.log(info);
		$('#frmUpdate').slideToggle();
	}

	$scope.deleteFormazione = function(info){

	}


})


