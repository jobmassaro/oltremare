app.controller("PrenotatiCtrl",function($http, $scope, filterFilter) {
getCorsiPrenotati();
$('#corsiPrenotati').css('display', 'none');


function getCorsiPrenotati(){
    $http.get('sezione/prenotacorso/corsi_prenotati.json').success(function(data){
      $scope.details = data;

    }).error(function(data){
      console.log("data");
    });
  }

  $scope.modificaPrenotazione = function(info){
  	$scope.corsipr = info;
	$('#corsiPrenotati').slideToggle();
  }

  $scope.UpdatePrenotazione = function(info){

  	 	$http.post('sezione/prenotacorso/updatecorso.php',{"id": info.id, "id_utente":info.id_utente, "nome":info.nome, "cognome": info.cognome, "email": info.email , "corso_prenotato": info.corso_prenotato ,"periodo_prenotato": info.periodo_prenotato, "indata":info.indata}).success(function(data)
		{
			if (data == true) 
			{
				
				location.reload(); 
			}
		});
  }

	$scope.cancellazionePrenotazione = function(info){
		$http.post('sezione/prenotacorso/cancellacorso.php',{"id": info.id, "id_utente":info.id_utente }).success(function(data)
		{
			if (data == true) 
			{
				alert('Cancellato');
				location.reload(); 
			}
		});
	}



})