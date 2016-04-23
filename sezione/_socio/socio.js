
app.controller("SocioCtrl",function($scope, $http)
{
	getSocio();
	$('#socioForm').css('display', 'none');


	function getSocio(){
		$http.get('sezione/socio/socio.json').success(function(data){
		$scope.dettagli = data;
		}).error(function(data){
			console.log("data");
		});
	}

	$scope.socioUser = {};
	$scope.editInfo = function(info)
	{
		$scope.socioUser = info;
		$('#socioForm').slideToggle();
		console.log(info);
	}


	$scope.UpdateSocio = function(info)
	{
		console.log("SOCIO");	
		console.log(info);	
	}



});





