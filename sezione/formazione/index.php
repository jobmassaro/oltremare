<style type="text/css">
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
    
</style>

<div class="row">
<p></p>
<p></p>
    <div class="table-responsive" ng-controller="FormazioneCtrl" id="formazioneForm">
        <div class="form-group">
                 <button class="well well-sm" ng-show="show_form" ng-click="nuovoCorso(details)" id="edit" >Aggiungi<span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
        </div>
            <div ng-include src="'sezione/formazione/templates/addFormazione.html'"></div>
            <div ng-include src="'sezione/formazione/templates/editFormazione.html'"></div>
            



             <!-- Include form template which is used to insert data into database -->
                
               
            <!-- -->
              

            <table class="table table-hover">

            <tr>
                <th>Nome</th>
                <th>Cognome</th>
                <th>Scuola</th>
                <th>Corso</th>
                <th>Data</th>
                <th>Scuola non Oltremare</th>
                <th>Corso Scuola</th>
                <th>Data</th>
                <th>Abilitazionioni</td>
            </tr>
            <tr ng-repeat="detail in details| filter:search_query" class="well well-sm" id="generale">
                <td><span>{{detail.nome}}</span></td>
                <td >{{detail.cognome}}</td>
                <td>{{detail.sede}}</td>
                <td>{{detail.corsi_oltremare}}</td>
                <td>{{detail.data_corso_oltremare}}</td>
                <td>{{detail.scuola_extra}}</td>
                <td>{{detail.corso_extra}}</td>
                <td>{{detail.data_extra}}</td>
                <td>{{detail.abilitazionioni}}</td>
                <td><button class="btn btn-warning" ng-click="editFormazione(detail)" title="Edit"><span class="glyphicon glyphicon-edit"></span></button></td>
                <td><button class="btn btn-danger" ng-click="deleteFormazione(detail)" title="Delete"><span class="glyphicon glyphicon-trash"></span></button></td>
            </tr>
        </table>
    </div>
</form>



