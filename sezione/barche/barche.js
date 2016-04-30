app.controller("BarcheCtrl",function($http, $scope, filterFilter) {

 	getInfoBarche();
  	$('#armatoreForm').css('display', 'none');
  	$('#frmArmatore').css('display', 'none');

  
  function getInfoBarche(){
    $http.get('sezione/barche/barche.json').success(function(data){
      $scope.details = data;

    }).error(function(data){
      console.log("data");
    });
  }


	$scope.customer = [];

	$scope.show_form = true;
	$scope.nuovaBarca= function(add){  
	    $scope.newArmatore = add;
	    $('#frmArmatore').slideToggle();
  
  	}


  	$scope.addArmatore = function(info){

  		$http.post('sezione/barche/addBarche.php',{"id": info.id, "id_utente":info.id_utente, "nome":info.nome,
				"cognome":info.cognome,"tipo":info.tipo,"armatore":info.armatore,
				 "modello": info.modello.modello,"cantiere":info.modello.cantiere, "nome_cantiere":info.modello.nome_cantiere, "metri":info.metri
			}).success(function(data)
			{
			

				if (data == true) 
				{
					$('#frmArmatore').css('display', 'none');
					location.reload(); 
					
				}
			});
		/*console.log('info');
		console.log(info);
  		console.log(info.modello.cantiere);*/
  	}


  	$scope.editArmatore = function(info){

  		console.log(info);
  		$scope.currentUser = info;
		$('#armatoreForm').slideToggle();
		/*
  		$http.post('sezione/barche/updateBarche.php',{"id": info.id, "id_utente":info.id_utente, "nome":info.nome,
				"cognome":info.cognome,"tipo":info.tipo,"armatore":info.armatore,
				 "modello": info.modello.modello,"cantiere":info.modello.cantiere, "nome_cantiere":info.modello.nome_cantiere, "metri":info.metri
			}).success(function(data)
			{
			

				if (data == true) 
				{
					$('#frmArmatore').css('display', 'none');
					location.reload(); 
					
				}
			});
		/*console.log('info');
		console.log(info);
  		console.log(info.modello.cantiere);*/
  	}


	$scope.updateArmatore = function(info){

	$http.post('sezione/barche/updateBarche.php',{"id": info.id, "id_utente":info.id_utente, "nome":info.nome,
				"cognome":info.cognome,"tipo":info.tipo,"armatore":info.armatore,
				 "modello": info.modello.modello,"cantiere":info.modello.cantiere, "nome_cantiere":info.modello.nome_cantiere, "metri":info.metri
			}).success(function(data)
			{
			

				if (data == true) 
				{
					$('#frmArmatore').css('display', 'none');
					location.reload(); 
					
				}
			});
	}

  	$scope.deleteArmatore = function(info){
  		$http.post('sezione/barche/deleteBarche.php',{"id": info.id, "id_utente":info.id_utente}).success(function(data){
  			if (data == true) 
				{
					$('#frmArmatore').css('display', 'none');
					location.reload(); 
					
				}
  		})
  	}



$scope.parentItems = [
{
	 "id": 1,
     "modello": "Derive"
},{
	 "id": 2,
     "modello": "Multi Cab"
},{
	 "id": 3,
     "modello": "Monotipi"
},{
	"id": 4,
    "modello": "Multi Sport"

},{
	"id": 5,
	"modello": "Cabinati"
}];


$scope.selectedParentItem = $scope.parentItems[0];

$scope.childItems = [];
$http.get('sezione/barche/modello.json').success(function(data){
    $scope.childItems = data;
});

$scope.filteredArray = [];
$scope.$watch("id_modello", function (newValue) {
	console.log("newValue");
	console.log(newValue);
    $scope.filteredArray = filterFilter($scope.childItems, newValue);
    $scope.selectedChildItem = $scope.filteredArray[0];
},true);

});






