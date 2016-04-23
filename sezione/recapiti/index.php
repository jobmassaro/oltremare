<style>
    #generale
    {
        background-color:white; 
        font-size:1.5em 
    }

    
</style>

<form class="col-md-12 well">
<div class="row"  ng-controller="RecapitiCtrl" >
    <div class="col-md-6" ng-repeat="detail in details" >
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
</form>
