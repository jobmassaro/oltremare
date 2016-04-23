
app.controller("AmministrazioneCtrl",function($scope, $http){
	getAmministrazione();
	$('#amministrazioneForm').css('display', 'none');

	function getAmministrazione(){
		$http.get('sezione/amministrativa/amministrativa.json').success(function(data){
			$scope.amm = data;

		}).error(function(data){
			console.log("data");
		});
	}


	$scope.ammUser = {};
	$scope.editInfo = function(info)
	{
		$scope.ammUser = info;
		$('#amministrazioneForm').slideToggle();
		console.log(info);
	}





})