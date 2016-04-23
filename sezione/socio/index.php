<div class="row" ng-controller="SocioCtrl" >
    <div ng-repeat="det in dettagli">
        <div class="col-md-5" >
        <div class="form-group">
           <div class="well well-sm" id="generale">Tessera UISP: &nbsp;<strong>{{det.tess_uisp}}</strong></div>
        </div>

        <div class="form-group">
             <div class="well well-sm" id="generale">UISP numero: &nbsp;<strong>{{det.uisp_numero}}</strong></div>
        </div>
        <div class="form-group">
             <div class="well well-sm" id="generale">Data di rilascio UISP : &nbsp;<strong>{{det.datarilascio}}</strong></div>
        </div>
       <div class="form-group">
             <div class="well well-sm" id="generale">Certificato Medico: &nbsp;<strong>{{det.certificato}}</strong></div>
        </div>
         <div class="form-group">
             <div class="well well-sm" id="generale">Doc Certificato Medico :  &nbsp;<strong>{{det.foto_cert}}</strong></div>
        </div>
         <div class="form-group">
             <div class="well well-sm" id="generale">Tessera F.I.V: &nbsp;<strong>{{det.fiv}}</strong><!--<md-datepicker ng-model="myDate" md-placeholder="Enter date"></md-datepicker>--></div>
        </div>
         <div class="form-group">
             <div class="well well-sm" id="generale">Scadenza F.I.V:&nbsp;<strong>{{det.fiv_scadenza}}</strong><!--<md-datepicker ng-model="myDate" md-placeholder="Enter date"></md-datepicker>--></div>
        </div>
         <div class="form-group">
             <div class="well well-sm" id="generale">Certificato F.I.V: &nbsp;<strong>{{det.fiv_certificato}}</strong><!--<md-datepicker ng-model="myDate" md-placeholder="Enter date"></md-datepicker>--></div>
        </div>
         <div class="form-group">
             <div class="well well-sm" id="generale">Patente: &nbsp;<strong>{{det.patente}}</strong></div>
        </div>
         <div class="form-group">
             <div class="well well-sm" id="generale">Patente Tipo:  &nbsp;<strong>{{det.patente_tipo}}</strong></div>
        </div>
        <div class="form-group">
             <div class="well well-sm" id="generale">Data di scadenza della patente: &nbsp;<strong>{{det.data_scadenza_patente}}</strong><!--<md-datepicker ng-model="myDate" md-placeholder="Enter date"></md-datepicker>--></div>
        </div>
    </div>

        <div class="col-md-2">
        <div class="form-group">
           <button class="well well-sm" ng-click="editInfo(det)" id="edit">Modifica <span class="glyphicon glyphicon-edit" aria-hidden="true"></span></button>
        </div>  
           <button class="well well-sm" ng-click="deleteInfo(det)" id="trash">Cancella <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
        </div>    
   
        <div class="col-md-4">
            <div ng-include src="'sezione/socio/templates/socioForm.html'"></div>
        </div>
    </div>
</div>
