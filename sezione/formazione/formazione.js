
app.controller("FormazioneCtrl",function($scope, $http){

	getFormazione();
	$('#frmUpdate').css('display', 'none');

	$scope.datepickerConfig = {
            allowFuture: false,
            dateFormat: 'DD/MM/YYYY'
        };

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


	$scope.updateFormazione = function(info)
	{
	//	console.log(info);

		$http.post('sezione/formazione/updateFormazione.php',{"id": info.id, "id_utente":info.id_utente, "nome":info.nome,
				"cognome":info.cognome,"attivita":info.attivita,"scuola":info.scuola,
				 "sede": info.sede,"anno":info.anno, "abilitazione":info.abilitazione, "presso_scuola":info.presso_scuola, "nellanno":info.nellanno
			}).success(function(data)
			{
			

				if (data == true) 
				{
					$('#frmUpdate').css('display', 'none');
					getFormazione();
					location.reload(); 
					
				}
			});



	}

	$scope.deleteFormazione = function(info)
	{
		$http.post('sezione/formazione/deleteFormazione.php',{"id": info.id, "id_utente":info.id_utente}).success(function(data){
  			if (data == true) 
				{
					location.reload(); 
					
				}
  		})

	}


})


