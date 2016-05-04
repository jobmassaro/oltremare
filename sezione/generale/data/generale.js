
app.controller("dbController",function($scope, $http){
	getInfo();
	getProvicie();


	$('#editForm').css('display', 'none');

	function getInfo(){
		$http.get('sezione/generale/generale.json').success(function(data){
			$scope.details = data;

		}).error(function(data){
			console.log("data");
		});

		}
		

		function getProvicie(){
		$http.get('sezione/generale/province.json').success(function(data){
			$scope.province = data;
		}).error(function(data){
			console.log("data");
		});		






		$scope.currentUser = {};
		$scope.editInfo = function(info)
		{
			$scope.currentUser = info;
			$('#editForm').slideToggle();
			console.log(info);
		}

		$scope.deleteInfo = function(info){
			console.log( info);
		}


		$scope.UpdateInfo = function(info){
			var dataFormat  = moment(info.data_nascita).format('MM/DD/YYYY');
			$http.post('sezione/generale/updateDetails.php',{"id": info.id, "id_utente":info.id_utente, "nome":info.name,
				"cognome":info.surname,"username":info.username,"data_nascita":dataFormat,
				 "via":info.via, "civico":info.civico,"cap": info.cap, "comune":info.comune,
				"provincia":info.provincia, "cod_fiscale": info.cod_fiscale, "cod_piva": info.cod_piva,
				"sesso": info.sesso, "sposato": info.sposato, "figli": info.figli, "professione": info.professione
			}).success(function(data){
			

				if (data == true) 
				{
					getInfo();

					$('#empForm').css('display', 'none');
					location.reload(); 
				}
			})
		}



		

	}
})