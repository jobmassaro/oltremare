app.controller("PrCorsiCtrl",function($http, $scope, filterFilter) {
getInfoPrCorsi()

function getInfoPrCorsi(){
    $http.get('sezione/prenotacorso/corsi_attivi.json').success(function(data){
      $scope.details = data;

    }).error(function(data){
      console.log("data");
    });
  }


$scope.prenotaCorso = function(info)
{
	console.log(info);
	$http.post('sezione/prenotacorso/prCorso.php',{"nome_corso":info.nome_corso, "stagione":info.stagione}).success(function(data)
			{
			if (data == true) 
				{
					location.reload(); 
					
				}
			});
}
});