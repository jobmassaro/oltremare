app.controller("AmicoCtrl",function($scope, $http){
	getInfo();
	$('#amicoForm').css('display', 'none');
	$('#editAmicoForm').css('display', 'none');
  
	function getInfo(){
		$http.get('sezione/amico/amico.json').success(function(data){
			console.log(data);
			$scope.details = data;

		}).error(function(data){
			console.log("data");
		});
	}

	$scope.show_form = true;
	$scope.nuovoAmico = function(info){
		if(!info)
			$scope.nuovoAmico = info;

		$('#amicoForm').slideToggle();
	}


	$scope.fnEditAmico = function(info){
		if(info)
		{

			$scope.infoAmico = info;
			console.log($scope.infoAmico);
			$('#editAmicoForm').slideToggle();		
		}
		
	}

	$scope.editFormAmico = function(info){

		$http.post('sezione/amico/updateAmico.php',{"id": info.id, "id_utente": info.id_utente, "nome":info.nome,
				"cognome":info.cognome,"email":info.email,"telefono":info.telefono,
				 "facebook": info.facebook,"whatsapp":info.whatsapp
			}).success(function(data)
			{
			if (data == true) 
			{
					$('#amicoForm').css('display', 'none');
					location.reload(); 
					
				}
			});	
	}


	$scope.addAmico = function(info){
		$http.post('sezione/amico/addAmico.php',{"id": info[0].id, "id_utente": info[0].id_utente, "nome":info.nome,
				"cognome":info.cognome,"email":info.email,"telefono":info.telefono,
				 "facebook": info.facebook,"whatsapp":info.whatsapp
			}).success(function(data)
			{
			if (data == true) 
			{
					$('#amicoForm').css('display', 'none');
					location.reload(); 
					
				}
			});
		
	}

});