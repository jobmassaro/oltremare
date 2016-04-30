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
    <div class="table-responsive" ng-controller="AmicoCtrl" id="">
        <div class="form-group">
                 <button class="well well-sm" ng-show="show_form" ng-click="nuovoAmico(details)" id="edit" >Aggiungi<span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
            </div>
            <div ng-include src="'sezione/amico/templates/addAmico.html'"></div>
            <div ng-include src="'sezione/amico/templates/editAmico.html'"></div>
            <table class="table table-hover">
            <tr>
                <th>Nome</th>
                <th>Cognome</th>
                <th>Email</th>
                <th>Telefono</th>
                <th>Facebook</th>
                <th>Whatsapp</th>
            </tr>
            <tr ng-repeat="detail in details| filter:search_query" class="well well-sm" id="generale">
                <td><span>{{detail.nome}}</span></td>
                <td >{{detail.cognome}}</td>
                <td>{{detail.email}}</td>
                <td>{{detail.telefono}}</td>
                <td>{{detail.facebook}}</td>
                <td>{{detail.whatsapp}}</td>
                <td><button class="btn btn-warning" ng-click="fnEditAmico(detail)" title="Edit"><span class="glyphicon glyphicon-edit"></span></button></td>
                <td><button class="btn btn-danger" ng-click="deleteAmico(detail)" title="Delete"><span class="glyphicon glyphicon-trash"></span></button></td>
            </tr>
        </table>
    </div>
</form>



