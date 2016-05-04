 <style type="text/css">
        .label-container {
            margin: 5px 0;
        }

        span[id^="combo"] {
            margin-right: 15px;
        }

        #state, #stateCascading {
            display: none;
        }

        .group-container {
            padding: 10px;
            margin-bottom: 10px;
            clear: both;
        }

        .group-title {
            font-weight: bold;
        }

        .comboGroup {
            float: left;
        }

        .overHidden {
            overflow: hidden;
        }
    </style>

<div class="group-container overHidden form-horizontal" id="frmArmatore" hidden>
  
        <div class="overHidden">
            <div class="comboGroup">
                <div>Modello</div>
                <span id="comboCountry"></span>
            </div>
            <div class="comboGroup">
                <div id="state">State</div>
                <div id="district">District</div>
                <span id="comboDistrict"></span>
            </div>
            <div class="comboGroup">
                <div>Town</div>
                <span id="comboTown"></span>
            </div>
        </div>
  
  </div>

    <script>

        var dsCountry, dsCascTowns, dsCountryCascading,
            dsCountryCascading, dsStatesUSCascading, dsDistrictBGCascading;

          dsCountry = [
            { "id": 1, "modello": "Derive" },
            { "id": 2, "modello": "Multi Cab" },
            { "id": 3, "modello": "Monotipi" },
            { "id": 4, "modello": "Multi Sport" },
            { "id": 5, "modello": "Cabinati" },
          ];

          var dsCascDistrict= [];
          $.getJSON('sezione/barche/modello.json', function (data) {
              /*console.log(data);*/
              dsCascDistrict = data;
          });
          

     /*   dsCountry = [
      { txtCountry: "United States", valCountry: "US" },
      { txtCountry: "Bulgaria", valCountry: "BG" }
        ];

        dsCascDistrict = [
      { keyCountry: "US", txtDistrict: "New Jersey", valDistrict: "NJ" },
      { keyCountry: "US", txtDistrict: "California", valDistrict: "CA" },
      { keyCountry: "US", txtDistrict: "Illinois", valDistrict: "IL" },
      { keyCountry: "US", txtDistrict: "New York", valDistrict: "NY" },
      { keyCountry: "US", txtDistrict: "Florida", valDistrict: "FL" },
      { keyCountry: "BG", txtDistrict: "Sofia", valDistrict: "SA" },
      { keyCountry: "BG", txtDistrict: "Plovdiv", valDistrict: "PV" },
      { keyCountry: "BG", txtDistrict: "Varna", valDistrict: "V" },
      { keyCountry: "BG", txtDistrict: "Yambol", valDistrict: "Y" }
        ];

        dsCascTowns = [
      { keyDistrict: "NJ", textTown: "Atlantic City", valTown: "AtlanticCity" },
      { keyDistrict: "NJ", textTown: "Dover", valTown: "Dover" },
      { keyDistrict: "CA", textTown: "Los Angeles", valTown: "LosAngeles" },
      { keyDistrict: "CA", textTown: "San Francisco", valTown: "San Francisco" },
      { keyDistrict: "CA", textTown: "San Diego", valTown: "SanDiego" },
      { keyDistrict: "IL", textTown: "Chicago", valTown: "Chicago" },
            { keyDistrict: "NY", textTown: "New York", valTown: "NewYork" },
      { keyDistrict: "NY", textTown: "Buffalo", valTown: "Buffalo" },
      { keyDistrict: "FL", textTown: "Miami", valTown: " Miami" },
      { keyDistrict: "FL", textTown: "Orlando", valTown: "Orlando" },
      { keyDistrict: "SA", textTown: "Sofia", valTown: "Sofia" },
      { keyDistrict: "SA", textTown: "Pernik", valTown: "Pernik" },
      { keyDistrict: "PV", textTown: "Plovdiv", valTown: "Plovdiv" },
      { keyDistrict: "PV", textTown: "Asenovgrad", valTown: "Asenovgrad" },
      { keyDistrict: "V", textTown: "Varna", valTown: "Varna" },
      { keyDistrict: "V", textTown: "Kavarna", valTown: "Kavarna" },
      { keyDistrict: "V", textTown: "Balchik", valTown: "Balchik" },
      { keyDistrict: "Y", textTown: "Yambol", valTown: "Yambol" },
      { keyDistrict: "Y", textTown: "Kermen", valTown: "Kermen" },
      { keyDistrict: "Y", textTown: "Elhovo", valTown: "Elhovo" },
      { keyDistrict: "Y", textTown: "Bolyarovo", valTown: "Bolqrovo" },
        ];
*/
     /*   $(function () {

            $("#comboCountry").igCombo({
                textKey: "txtCountry",
                valueKey: "valCountry",
                dataSource: dsCountry,
                selectionChanged: function (evt, ui) {
                    var filteredCascDistrict = [];
                    if (ui.items && ui.items[0]) {
                        var itemData = ui.items[0].data;
                        if (itemData.valCountry == "US") {
                            $("#state").css("display", "block");
                            $("#district").css("display", "none");
                        }
                        else {
                            $("#state").css("display", "none");
                            $("#district").css("display", "block");
                        }

                        filteredCascDistrict = dsCascDistrict.filter(function (district) {
                            return district.keyCountry == itemData.valCountry;
                        });
                    }

                    var $comboDistrict = $("#comboDistrict");
                    $comboDistrict.igCombo("deselectAll", {}, true);
                    $comboDistrict.igCombo("option", "dataSource", filteredCascDistrict);
                    $comboDistrict.igCombo("dataBind");

                    var disableChildCombo = filteredCascDistrict.length == 0;
                    $comboDistrict.igCombo("option", "disabled", disableChildCombo);
                },
                itemsRendered: function (evt, ui) {
                    ui.owner.deselectAll();
                }
            });

            $("#comboDistrict").igCombo({
                valueKey: "valDistrict",
                textKey: "txtDistrict",
                dataSource: [],
                disabled: true,
                selectionChanged: function (evt, ui) {
                    var filteredCascTown = [];

                    if (ui.items && ui.items[0]) {
                        var itemData = ui.items[0].data;

                        var filteredCascTown = dsCascTowns.filter(function (town) {
                            return town.keyDistrict == itemData.valDistrict;
                        });
                    }

                    var $comboTown = $("#comboTown");
                    $comboTown.igCombo("deselectAll");
                    $comboTown.igCombo("option", "dataSource", filteredCascTown);
                    $comboTown.igCombo("dataBind");

                    var disableChildCombo = filteredCascTown.length == 0;
                    $comboTown.igCombo("option", "disabled", disableChildCombo);
                }
            });

            $("#comboTown").igCombo({
                valueKey: "valTown",
                textKey: "textTown",
                disabled: true
            });
        });



*/


$(function () {

            $("#comboCountry").igCombo({
                textKey: "modello",
                valueKey: "id",
                dataSource: dsCountry,
                selectionChanged: function (evt, ui) {
                    var filteredCascDistrict = [];
                    if (ui.items && ui.items[0]) {
                        var itemData = ui.items[0].data;
                        if (itemData.valCountry == "1") {
                            $("#state").css("display", "block");
                            $("#district").css("display", "none");
                        }
                        else {
                            $("#state").css("display", "none");
                            $("#district").css("display", "block");
                        }

                        filteredCascDistrict = dsCascDistrict.filter(function (district) {
                          return district.keyCountry == itemData.valCountry;
                        });
                    }

                    var $comboDistrict = $("#comboDistrict");
                    $comboDistrict.igCombo("deselectAll", {}, true);
                    $comboDistrict.igCombo("option", "dataSource", filteredCascDistrict);
                    $comboDistrict.igCombo("dataBind");

                    var disableChildCombo = filteredCascDistrict.length == 0;
                    $comboDistrict.igCombo("option", "disabled", disableChildCombo);
                },
                itemsRendered: function (evt, ui) {
                    ui.owner.deselectAll();
                }
            });

            $("#comboDistrict").igCombo({
                valueKey: "id",
                textKey: "nome_cantiere",
                dataSource: [],
                disabled: true,
                selectionChanged: function (evt, ui) {
                    var filteredCascTown = [];

                    if (ui.items && ui.items[0]) {
                        var itemData = ui.items[0].data;

                        var filteredCascTown = dsCascTowns.filter(function (town) {
                            return town.keyDistrict == itemData.valDistrict;
                        });
                    }

                    var $comboTown = $("#comboTown");
                    $comboTown.igCombo("deselectAll");
                    $comboTown.igCombo("option", "dataSource", filteredCascTown);
                    $comboTown.igCombo("dataBind");

                    var disableChildCombo = filteredCascTown.length == 0;
                    $comboTown.igCombo("option", "disabled", disableChildCombo);
                }
            });

            $("#comboTown").igCombo({
                valueKey: "valTown",
                textKey: "textTown",
                disabled: true
            });
        });
















    </script>



<!--

<div ng-repeat="n in newArmatore">
<form class="form-horizontal alert alert-warning"  id="frmArmatore" ng-submit="addArmatore(n)" hidden>
  <div class="form-group">
    <label for="tipo"  class="col-sm-2 control-label">Nome:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" ng-model="n.nome" value="{{n.nome}}">
    </div>
  </div>
  <div class="form-group">
    <label for="tipo"  class="col-sm-2 control-label">Cognome:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" ng-model="n.cognome" value="{{n.cognome}}">
    </div>
  </div>
  <div class="form-group">
    <label for="tipo"  class="col-sm-2 control-label">Armatore:</label>
    <div class="col-sm-4">
      <select name="singleSelect" ng-model="n.armatore"  class="form-control">
            <option value="si">SI</option>
            <option value="no">NO</option>
        </select>
    </div>
  </div>

  <div class="form-group">
    <label for="tipo"  class="col-sm-2 control-label">Tipo:</label>
    <div class="col-sm-4"> 
      <select name="singleSelect" ng-model="n.tipo"  class="form-control">
            <option value="motore">Motore</option>
            <option value="vela">Vela</option>
        </select>
       <!-- <tt>singleSelect = {{armatore.tipo}}</tt> -->
<!--      </div>
  </div>


<!--
  <div class="form-group">
      <label for="country" class="col-sm-2 control-label">Modello </label>
      <div class="col-sm-4">             
        <select ng-model="n.nomecant"                
                ng-options="obj.id as obj.modello for obj in countries"
                ng-change="getCountryStates()"
                class="form-control" 
                ng-required="true"
                id="country">
          <option value="">-- Scegli Modello --</option>
        </select>      
      </div>
    </div>

    <div class="form-group">
      <label for="state" class="col-sm-2 control-label">Cantiere </label>
      <div class="col-sm-4">       
        <select ng-model="n.nome_cantiere" 
                ng-options="x.id as x.cantiere for x in sates"
                ng-change = "getStateCities()"
                class="form-control"
                ng-required="true"
                id="state">
          <option value="">-- Scegli Cantiere --</option>
        </select>      
      </div>
    </div>
    <!-- -->

  <!--  <div class="group-container overHidden">
        <div class="overHidden">
            <div class="comboGroup">
                <div>Country</div>
                <span id="comboCountry"></span>
            </div>
            <div class="comboGroup">
                <div id="state">State</div>
                <div id="district">District</div>
                <span id="comboDistrict"></span>
            </div>
            <div class="comboGroup">
                <div>Town</div>
                <span id="comboTown"></span>
            </div>
        </div>
    </div>

    <!-- -->

   <!-- <div class="form-group">
    <label for="tipo"  class="col-sm-2 control-label">Metri:</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" ng-model="n.metri" value="{{n.metri}}">
    </div>
  </div>

  <div class="form-group">
    <button class="btn btn-warning" ng-disabled="n.$invalid">Aggiungi</button>
  </div>
</form>
</div>

/**/








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