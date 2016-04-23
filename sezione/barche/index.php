
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
        <div class="table-responsive" ng-controller="BarcheCtrl" >
            <div class="form-group">
                 <button class="well well-sm" ng-show="show_form" ng-click="clkArmatore(details)" id="edit" >Aggiungi<span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
            </div>
            <!-- Include form template which is used to insert data into database -->
                <div ng-include src="'sezione/barche/templates/addArmatore.html'"></div>

            <!-- -->
                <div ng-include src="'sezione/barche/templates/editForm.html'"></div>

            <table class="table table-hover">
            <tr>
                <th>Nome </th>
                <th>Cognome </th>
                <th>Armatore </th>
                <th>Tipo </th>
                <th>Cantiere </th>
                <th>Modello </th>
                <th>Metri </th>
            </tr>
            <tr ng-repeat="detail in details| filter:search_query" class="well well-sm" id="generale">
                <td><span>{{detail.nome}}</span></td>
                <td >{{detail.cognome}}</td>
                <td>{{detail.armatore}}</td>
                <td>{{detail.tipo}}</td>
                <td>{{detail.nome_cantiere}}</td>
                <td>{{detail.nomecant }}</td>
                <td>{{detail.metri }}</td>
                <td><button class="btn btn-warning" ng-click="editArmatore(detail)" title="Edit"><span class="glyphicon glyphicon-edit"></span></button></td>
                <td><button class="btn btn-danger" ng-click="deleteArmatore(detail)" title="Delete"><span class="glyphicon glyphicon-trash"></span></button></td>
            </tr>
        </table>
    </div>
</form>

