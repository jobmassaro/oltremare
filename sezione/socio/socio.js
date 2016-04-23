
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
		var dataRilascio  = moment(info.datarilascio).format('MM/DD/YYYY');
		var scadenzaFIV  = moment(info.fiv_scadenza).format('MM/DD/YYYY');
		var datascadenzapatente  = moment(info.data_scadenza_patente).format('MM/DD/YYYY');

			$http.post('sezione/socio/updateSocio.php',{"id": info.id, "id_utente":info.id_utente, "tess_uisp":info.tess_uisp,
				"uisp_numero":info.uisp_numero,"datarilascio":dataRilascio,"certificato":info.certificato,
				 "patente":info.patente, "patente_tipo":info.patente_tipo,"data_scadenza_patente": datascadenzapatente, "fiv_scadenza":info.scadenzaFIV,
			}).success(function(data){
			

				if (data == true) 
				{
					getSocio();
					$('#socioForm').css('display', 'none');
				}
			})
		}



});





