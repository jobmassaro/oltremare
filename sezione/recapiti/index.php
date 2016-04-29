<style>
    #generale
    {
        background-color:white; 
        font-size:1.5em 
    }

    
</style>

<div class="row"  ng-controller="RecapitiCtrl" >
    <div ng-repeat="detail in details">
    <div class="col-md-6"  >
        <div class="form-group">
           <div class="well well-sm" id="generale">Nome: &nbsp;<strong>{{detail.nome}}</strong></div>
        </div>

        <div class="form-group">
             <div class="well well-sm" id="generale">Cognome: &nbsp;<strong>{{detail.cognome}}</strong></div>
        </div>
        <div class="form-group">
             <div class="well well-sm" id="generale">Telefono: &nbsp;<strong>{{detail.telefono}}</strong></div>
        </div>
         <div class="form-group">
             <div class="well well-sm" id="generale">Cellulare: &nbsp;<strong>{{detail.cellulare}}</strong>
                <!--<md-datepicker ng-model="myDate" md-placeholder="Enter date"></md-datepicker>--></div>
        </div>
        <div class="form-group">
             <div class="well well-sm" id="generale">Email: &nbsp;<strong>{{detail.email}}</strong></div>
        </div>
         <div class="form-group">
             <div class="well well-sm" id="generale">Whatsapp: &nbsp;<strong>{{detail.whatsapp}}</strong></div>
        </div>
         <div class="form-group">
             <div class="well well-sm" id="generale">Facebook: &nbsp;<strong>{{detail.facebook}}</strong></div>
        </div>
         <div class="form-group">
             <div class="well well-sm" id="generale">Twitter: &nbsp;<strong>{{detail.twitter}}</strong></div>
        </div>
         
         
    </div>
     <div class="col-md-2">
        <div class="form-group">
           <button class="well well-sm" ng-click="editRecapiti(detail)" id="edit">Modifica <span class="glyphicon glyphicon-edit" aria-hidden="true"></span></button>
        </div>
    </div>
     <div class="col-md-4">
            <div ng-include src="'sezione/recapiti/templates/editRecapiti.html'"></div>
        </div>
    </div>  
</div>
</div>