app.controller('CorsiCtrl', function($scope, $http){

	getInfoCorsi();
	$('#editCorso').css('display', 'none');
	$('#newCorso').css('display', 'none');
  
	

	function getInfoCorsi(){
		$http.get('sezione/corsi/corsi.json').success(function(data){
			$scope.details = data;

		}).error(function(data){
			console.log("data");
		});
	}

	$scope.show_form = true;
	
	$scope.aggiornamentoCorso = function(info){
		
		$scope.corso = info;
		$('#editCorso').slideToggle();
		console.log("update");
		console.log(info);
	}

	$scope.cancellazioneCorso = function(info){
		$http.post('sezione/corsi/cancellaCorso.php',{"id" : info.id }).success(function(data)
			{
			

				if (data == true) 
				{
					location.reload(); 
					
				}
			});
	}

	$scope.addCorso = function(info){

		$('#newCorso').slideToggle();

	}
	
	$scope.newCorso = function(info){

			if(info.attivo == 'si')
				attivo = 'True';
			else
				attivo = 'False';



		$http.post('sezione/corsi/addNuovoCorso.php',{"nome_corso":info.nomecorso,
				"attivo": attivo}).success(function(data)
			{
			

				if (data == true) 
				{
					$('#newCorso').css('display', 'none');
					location.reload(); 
					
				}
			});
		
		
	}


	$scope.aggCorso = function(info){
		var attivo;


		if(info.attivo == 'si')
			attivo = 'True';
		else
			attivo = 'False';

		console.log(info.nomecorso);

		$http.post('sezione/corsi/updateCorsi.php',{"id": info.id, "nome_corso":info.nomecorso,
				"attivo":attivo}).success(function(data)
			{
			

				if (data == true) 
				{
					$('#editCorso').css('display', 'none');
					location.reload(); 
					
				}
			});
		
	}

});