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
    <div class="table-responsive" ng-controller="FormazioneCtrl" >
        <div class="form-group">
            <div ng-include src="'sezione/formazione/templates/editFormazione.html'"></div>



             <!-- Include form template which is used to insert data into database -->
                
               
            <!-- -->
              








             



            <table class="table table-hover">
            <tr>
                <th>Nome</th>
                <th>Cognome</th>
                <th>Attivita</th>
                <th>Scuola</th>
                <th>Sede</th>
                <th>Anno</th>
                <th>Abilitazione</th>
                <th>Presso Scuola</th>
                <th>Anno</th>
            </tr>
            <tr ng-repeat="detail in details| filter:search_query" class="well well-sm" id="generale">
                <td><span>{{detail.nome}}</span></td>
                <td >{{detail.cognome}}</td>
                <td>{{detail.attivita}}</td>
                <td>{{detail.scuola}}</td>
                <td>{{detail.sede}}</td>
                <td>{{detail.anno}}</td>
                <td>{{detail.abilitazione}}</td>
                <td>{{detail.presso_scuola}}</td>
                <td>{{detail.nellanno}}</td>
                <td><button class="btn btn-warning" ng-click="editFormazione(detail)" title="Edit"><span class="glyphicon glyphicon-edit"></span></button></td>
                <td><button class="btn btn-danger" ng-click="deleteFormazione(detail)" title="Delete"><span class="glyphicon glyphicon-trash"></span></button></td>
            </tr>
        </table>
    </div>
</form>



