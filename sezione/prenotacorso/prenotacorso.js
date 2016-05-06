app.controller("PrCorsiCtrl",function($http, $scope, filterFilter) {
getInfoPrCorsi();
getUser();

function getInfoPrCorsi(){
    $http.get('sezione/prenotacorso/corsi_attivi.json').success(function(data){
      $scope.details = data;

    }).error(function(data){
      console.log("data");
    });
  }

function getUser(){
    $http.get('sezione/prenotacorso/utente.json').success(function(data){
      $scope.user = data;

    }).error(function(data){
      console.log("data");
    });
  }


$scope.prenotaCorso = function(info)
{
		console.log(info);
		
	  	var d = new Date();
		var giorno = d.getDate();
		var mese = d.getMonth();
		var anno = d.getFullYear();
		var indata = giorno+"/"+mese+"/"+anno;
//		console.log(indata);

	  	$http.post('sezione/prenotacorso/prenotaCorso.php',{"id": info.id, "id_utente":info.id_utente, "nome":info.name, "cognome": info.surname, "email": info.email , "corso": info.nome_corso ,"stagione": info.stagione, "indata":indata}).success(function(data)
			{
			if (data == true) 
				{
					alert('Corso Prenotato');
					location.href = 'http://localhost/oltremare/dashboard.php';
					
				}
			});
}
});