<div class="row" ng-controller="AmministrazioneCtrl" >
    <div ng-repeat="a in amm" >
        <div class="col-md-5" >
            <div class="form-group">
                <div class="well well-sm" id="generale">Banca :&nbsp;<strong>{{a.banca}}</strong></div>
            </div>
            <div class="form-group">
                 <div class="well well-sm" id="generale">Abi :&nbsp;<strong>{{a.abi}}</strong></div>
            </div>
            <div class="form-group">
                 <div class="well well-sm" id="generale">Cab: &nbsp;<strong>{{a.cab}}</strong></div>
            </div>
           <div class="form-group">
                 <div class="well well-sm" id="generale">Cin :&nbsp;<strong>{{a.cin}}</strong></div>
            </div>
            <div class="form-group">
                 <div class="well well-sm" id="generale">C/C : &nbsp;<strong>{{a.cc}}</strong></div>
            </div>
             <div class="form-group">
                 <div class="well well-sm" id="generale">Iban : &nbsp;<strong>{{a.iban}}</strong><!--<md-datepicker ng-model="myDate" md-placeholder="Enter date"></md-datepicker>--></div>
            </div>
             <div class="form-group">
                 <div class="well well-sm" id="generale">Carta Credito :&nbsp;<strong>{{a.carta_credito}}</strong><!--<md-datepicker ng-model="myDate" md-placeholder="Enter date"></md-datepicker>--></div>
            </div>
             <div class="form-group">
                 <div class="well well-sm" id="generale">Data di scadenza : &nbsp;<strong>{{a.data_scadenza}}</strong><!--<md-datepicker ng-model="myDate" md-placeholder="Enter date"></md-datepicker>--></div>
            </div>
             <div class="form-group">
                 <div class="well well-sm" id="generale">CCV :&nbsp;<strong>{{a.ccv}}</strong></div>
            </div>
    </div>

     <div class="col-md-2">
        <div class="form-group">
           <button class="well well-sm" ng-click="editInfo(a)" id="edit">Modifica <span class="glyphicon glyphicon-edit" aria-hidden="true"></span></button>
        </div>  
           <button class="well well-sm" ng-click="deleteInfo(a)" id="trash">Cancella <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
        </div>    
   
        <div class="col-md-4">
            <div ng-include src="'sezione/amministrativa/templates/editForm.html'"></div>
        </div>
    </div>
</div>

