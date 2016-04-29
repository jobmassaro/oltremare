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

	$scope.editRecapiti = function(info){
		$scope.currentUser = info;
		$('#updateRecapiti').slideToggle();
		
	}



	$scope.updateRecapiti = function(info){
		console.log('info');
		console.log(info);
		$http.post('sezione/recapiti/updateRecapiti.php',{"id": info.id, "id_utente":info.id_utente, "nome":info.nome,
				"cognome":info.cognome,"telefono":info.telefono,"cellulare":info.cellulare,
				 "email":info.email, "whatsapp":info.whatsapp,"facebook": info.facebook, "twitter":info.twitter
			}).success(function(data){
			

				if (data == true) 
				{
					$('#updateRecapiti').css('display', 'none');
					location.reload(); 
				}
			})
		}
	
})

