
app.controller("FormazioneCtrl",function($scope, $http){
	getScuolaOltremare();
	getScuoleExtra();
	getFormazione();
	$('#frmUpdate').css('display', 'none');
	$('#frmAdd').css('display', 'none');

	$scope.datepickerConfig = {
            allowFuture: true,
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


	function getScuoleExtra(){
		$http.get('sezione/corsi/extra/extra.json').success(function(data){
			$scope.extra = data;

		}).error(function(data){
			console.log("data");
		});
	}



	function getScuolaOltremare(){
		$http.get('sezione/corsi/corsi.json').success(function(data){
			$scope.corsi = data;

		}).error(function(data){
			console.log("data");
		});	
	}

	function getScuolaExtra(){
		$http.get('sezione/corsi/corsi.json').success(function(data){
			$scope.corsi = data;

		}).error(function(data){
			console.log("data");
		});	
	}

	$scope.show_form = true;
	$scope.editFormazione = function(info){
		$scope.editform = info;
		console.log(info);
		$('#frmUpdate').slideToggle();
	}


	$scope.nuovoCorso = function(info){
		console.log(info);
		$scope.formazionedetails = info;
		$('#frmAdd').slideToggle();
	}

	$scope.addFormazione = function(info){
		$http.post('sezione/formazione/addFormazione.php',{"id": info.id, "id_utente":info.id_utente, "nome":info.nome,
				"cognome":info.cognome,"sede":info.sede,"scuola":info.scuola,
				 "corsi_oltremare": info.corsi_oltremare,"data_corso_oltremare":info.data_corso_oltremare, "scuola_extra":info.scuola_extra, "corso_extra":info.corso_extra, "data_extra":info.data_extra, "abilitazionioni":info.abilitazionioni
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

	$scope.updateFormazione = function(info)
	{
	//	console.log(info);

		$http.post('sezione/formazione/updateFormazione.php',{"id": info.id, "id_utente":info.id_utente, "nome":info.nome,
				"cognome":info.cognome,"sede":info.sede,"scuola":info.scuola,
				 "corsi_oltremare": info.corsi_oltremare,"data_corso_oltremare":info.data_corso_oltremare, "scuola_extra":info.scuola_extra, "corso_extra":info.corso_extra, "data_extra":info.data_extra, "abilitazionioni":info.abilitazionioni
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


