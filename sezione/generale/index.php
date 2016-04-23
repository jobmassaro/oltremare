<style>
	#generale
	{
		background-color:white; 
		font-size:1.5em	
	}

    #edit
    {
        background-color: #2d89ef;
        color: white;
        font-weight: bold;
        text-shadow: 1px 1px #2d89ef;
        font-size: 15px;
        box-shadow: 0 1px 0 rgba(255, 255, 255, 0.5) inset;
        -moz-box-shadow: 0 1px 0 rgba(255, 255, 255, 0.5) inset;
        -webkit-box-shadow: 0 1px 0 rgba(255, 255, 255, 0.5) inset;
    }

     #trash
    {
        background-color: #d43632;
        color: white;
        font-weight: bold;
        text-shadow: 1px 1px #d43632;
        font-size: 15px;
        box-shadow: 0 1px 0 rgba(255, 255, 255, 0.5) inset;
        -moz-box-shadow: 0 1px 0 rgba(255, 255, 255, 0.5) inset;
        -webkit-box-shadow: 0 1px 0 rgba(255, 255, 255, 0.5) inset;
    }


    #edit:hover
    {
        background-color: #e1e1e1;
    }

     #trash:hover
    {
        background-color: #e1e1e1;
    }


</style>

<div class="row"  ng-controller="dbController" >

    <div ng-repeat="detail in details">
     <div class="col-md-5">
        <div class="form-group">
           <div class="well well-sm" id="generale">Nome: &nbsp;<strong>{{detail.name}}</strong></div>
        </div>

        <div class="form-group">
             <div class="well well-sm" id="generale">Cognome: &nbsp;<strong>{{detail.surname}}</strong></div>
        </div>
        <div class="form-group">
             <div class="well well-sm" id="generale">Nickname: &nbsp;<strong>{{detail.username}}</strong></div>
        </div>
         <div class="form-group">
             <div class="well well-sm" id="generale">Data Nascita: &nbsp;<strong>{{detail.data_nascita}}</strong>
             	<!--<md-datepicker ng-model="myDate" md-placeholder="Enter date"></md-datepicker>--></div>
        </div>
        <div class="form-group">
             <div class="well well-sm" id="generale">Indirizzo: &nbsp;<strong>{{detail.via}}</strong></div>
        </div>
         <div class="form-group">
             <div class="well well-sm" id="generale">Num.Civico: &nbsp;<strong>{{detail.civico}}</strong></div>
        </div>
         <div class="form-group">
             <div class="well well-sm" id="generale">Cap: &nbsp;<strong>{{detail.cap}}</strong></div>
        </div>
         <div class="form-group">
             <div class="well well-sm" id="generale">Citta: &nbsp;<strong>{{detail.comune}}</strong></div>
        </div>
         <div class="form-group">
             <div class="well well-sm" id="generale">Provincia: &nbsp;<strong>{{detail.provincia}}</strong></div>
        </div>
         <div class="form-group">
             <div class="well well-sm" id="generale">Cod.Fiscale: &nbsp;<strong>{{detail.cod_fiscale}}</strong></div>
        </div>
         <div class="form-group">
             <div class="well well-sm" id="generale">Part.Iva: &nbsp;<strong>{{detail.cod_piva}}</strong></div>
        </div>
        <div class="form-group">
             <div class="well well-sm" id="generale">Sesso: &nbsp;<strong>{{detail.sesso}}</strong></div>
        </div>
        <div class="form-group">
             <div class="well well-sm" id="generale">Sposato: &nbsp;<strong>{{detail.sposato}}</strong></div>
        </div>
        <div class="form-group">
             <div class="well well-sm" id="generale">Figli: &nbsp;<strong>{{detail.figli}}</strong></div>
        </div>
         <div class="form-group">
             <div class="well well-sm" id="generale">Professione: &nbsp;<strong>{{detail.professione}}</strong></div>
        </div>
         
    </div>
    <div class="col-md-2">
        <div class="form-group">
           <button class="well well-sm" ng-click="editInfo(detail)" id="edit">Modifica <span class="glyphicon glyphicon-edit" aria-hidden="true"></span></button>
        </div>  
        <div class="form-group">
           <button class="well well-sm" ng-click="deleteInfo(detail)" id="trash">Cancella <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
        </div>    
    </div>
     <div class="col-md-4">
            <div ng-include src="'sezione/generale/templates/editForm.html'"></div>
        </div>
    </div>
</div>
