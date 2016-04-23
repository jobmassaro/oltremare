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
    <div class="col-md-10">
        <div class="table-responsive" ng-controller="ContabilitaCtrl" >
            <div class="form-group">
                 <button class="well well-sm" ng-show="show_form" ng-click="clkNuovoSaldo(details)" id="edit" >Aggiungi<span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
            </div>
            <!-- Include form template which is used to insert data into database -->
            <div class="col-md-6">
                <div ng-include src="'sezione/contabilita/templates/addNuovoSaldo.html'"></div>

            <!-- -->
                <div ng-include src="'sezione/contabilita/templates/editCotabilita.html'"></div>

            </div>
            <table class="table table-hover">
            <tr>
                <th>Nome </th>
                <th>Cognome </th>
                <th>Data</th>
                <th>Desrizione </th>
                <th>Acconto </th>
                <th>Saldo</th>
                <td>STAMPA</td>
            </tr>
            <tr ng-repeat="detail in details| filter:search_query" class="well well-sm" id="generale">
                <td><span>{{detail.name}}</span></td>
                <td >{{detail.surname}}</td>
                <td >{{detail.data_conatbile}}</td>
                <td>{{detail.descrizione}}</td>
                <td>{{detail.acconto}}</td>
                <td>{{detail.saldo}}</td>
                <td><a href="#"><span class="glyphicon glyphicon-file" aria-hidden="true"></span></td>
                <td><button class="btn btn-warning" ng-click="editContabilita(detail)" title="Edit"><span class="glyphicon glyphicon-edit"></span></button></td>
                <td><button class="btn btn-danger" ng-click="deleteContabilita(detail)" title="Delete"><span class="glyphicon glyphicon-trash"></span></button></td>
            </tr>
        </table>
    </div>
</form>

