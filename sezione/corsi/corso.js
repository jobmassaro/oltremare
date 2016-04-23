app.controller('CorsiCtrl', function($scope, $http){

	getInfoCorsi();
	

	function getInfoCorsi(){
		$http.get('sezione/corsi/corsi.json').success(function(data){
			$scope.details = data;

		}).error(function(data){
			console.log("data");
		});
	}


	$scope.nuovoCorso = function(info){

		console.log(info);
		/*
		$http.post('databaseFiles/insertDetails.php',{"name":info.name,"email":info.email,"address":info.address,"gender":info.gender}).success(function(data){
			if (data == true) 
			{
				getInfoBarche();
			$('#empForm').css('display', 'none');
			}
		});*/
	}

	$scope.aggiornamentoCorso = function(info){

	}

	$scope.cancellazioneCorso = function(info){
		console.log("update");
		console.log(info);
	}

});