
app.controller("BarcheCtrl",function($scope, $http, CustomerService){
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

	$scope.addArmatore = function(info){

		console.log(info);
		/*
		$http.post('databaseFiles/insertDetails.php',{"name":info.name,"email":info.email,"address":info.address,"gender":info.gender}).success(function(data){
			if (data == true) 
			{
				getInfoBarche();
			$('#empForm').css('display', 'none');
			}
		});*/
	}



	$scope.updateArmatore = function(info){
		console.log("update");
		console.log(info);
	}


	$scope.editArmatore = function(info)
	{
		$scope.armatore = info;
		$('#armatoreForm').slideToggle();
		console.log(info);
	}

	$scope.show_form = true;
	$scope.clkArmatore= function(add){	
		$scope.newArmatore = add;
		$('#frmArmatore').slideToggle();
	
	}
  
	    
  	$scope.countries = CustomerService.getCountry();
    
  	$scope.getCountryStates = function(){
    	$scope.sates = CustomerService.getCountryState($scope.customer.Country);
    	$scope.cities =[];
  	}
  
	$scope.insertInfo = function(info){
		
		var tt = CustomerService.getUserInfo();
		console.log(tt.userInformazioni);
		console.log(info);
	}


  
 
});

app.factory("CustomerService", function($filter, $http ){
 var service = {};
  
  
  var countrylist = [
            { "id": 1, "modello": "Derive" },
            { "id": 2, "modello": "Multi Cab" },
            { "id": 3, "modello": "Monotipi" },
            { "id": 4, "modello": "Multi Sport" },
            { "id": 5, "modello": "Cabinati" },
    ];
  
 	var statelist;
 	$http.get('sezione/barche/modello.json').success(function(data) {
        statelist = data;
    });    

	var userInformazioni;
	$http.get('sezione/recapiti/recapiti.json').success(function(data) {
        userInformazioni = data;
    });    	

	service.getCountry = function(){    
    	return countrylist;
  	};

  	service.getUserInfo = function(){
  		return userInformazioni;
  	}

  
	service.getCountryState = function(countryId){
		var states = ($filter('filter')(statelist, {id_modello: countryId }));
    return states;
  };
 
  
  
  
  return service;
  
  
});