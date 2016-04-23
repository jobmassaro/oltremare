
app.controller("ContabilitaCtrl",function($scope, $http){
    getInfoContabilita();
    $('#cntForm').css('display', 'none');
    $('#cntAddForm').css('display', 'none');

    function getInfoContabilita(){
        $http.get('sezione/contabilita/contabilita.json').success(function(data){
            $scope.details = data;
            console.log('contabilita');
            console.log(data);

        }).error(function(data){
            console.log("data");
        });
    }

    
    $scope.editContabilita = function(info)
    {   
        console.log(info);
        $scope.contabilita = info;
        $('#cntForm').slideToggle();

    }

     $scope.deleteContabilita = function()
    {
        
    }
    
    $scope.show_form = true;
    $scope.clkNuovoSaldo = function(info)
    {
        $scope.contabilita = info;
        $('#cntAddForm').slideToggle();
    }
  
});