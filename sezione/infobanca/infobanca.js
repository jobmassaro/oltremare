app.controller("AmministrazioneCtrl",function($scope, $http){
	getAmministrazione();
	$('#amministrazioneForm').css('display', 'none');


	$scope.datepickerConfig = {
            allowFuture: true,
            dateFormat: 'DD/MM/YYYY'
        };

	function getAmministrazione(){
		$http.get('sezione/infobanca/infobanca.json').success(function(data){
			$scope.details = data;
			console.log("AMM");
			console.log(data);

		}).error(function(data){
			console.log("data");
		});
	}


	$scope.ammUser = {};
	$scope.editInfo = function(info)
	{
		$scope.ammUser = info;
		$('#amministrazioneForm').slideToggle();
		console.log("UTENBTE");
		console.log(info.id_utente);
		console.log(info);
	}


	$scope.UpdateAmm = function(info)
	{
			$http.post('sezione/infobanca/updateAmm.php',{"id": info.id, "id_utente":info.id_utente, "banca":info.banca,
				"abi":info.abi,"cab":info.cab,"cin":info.cin,"cc":info.cc,"iban":info.iban,"carta_credito": info.carta_credito,"data_scadenza":info.data_scadenza,"ccv":info.ccv
			}).success(function(data){
			
			if (data == true) 
				{
					getAmministrazione();
					$('#amministrazioneForm').css('display', 'none');
					location.reload(); 
				}
			})
	}




})