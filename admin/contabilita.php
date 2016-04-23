<script src="assets/js/angular.min.js"></script>
<script src="assets/js/app.js"></script>
<?php
include('auth/protect.php');
//REDIRECT IF NOT ADMIN LEVEL 1 USER
if($user_level!='1'){header('Location: ../dashboard.php');}

?>
<div id="tabs-4" ng-app="ContApp" ng-controller="DbController">
	<table class="table table-hover">
		<thead>
			<tr>
				<div class="col-md-3">
				<button class="btn btn-primary" ng-show="show_form" ng-click="formToggle()">Nuova Entrata 
					<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
				</button>
				</div>				
			</tr>
			<tr>
				<div class="col-md-6">
					<input type="text" class="form-control" placeholder="Cerca nel database..."  ng-model="search_query">				
				</div>
			</tr>
		</thead>
		<tbody>
			<div class="col-md-6 col-md-offset-3">
					<!-- Include form template which is used to insert data into database -->
				<div ng-include src="'templates/form.html'"></div>
					<!-- Include form template which is used to edit and update data into database -->
				<div ng-include src="'templates/editForm.html'"></div>
			</div>
		</tbody>
	</table>
<div class="table-responsive">
	<table id="tblcont" class="table table-hover sortable">
      <thead>
        <tr>
          <th data-sort=\"name\">Nome</th>
          <th data-sort=\"surname\">Cognome</th>
          <th data-sort=\"date\">Data</th>
          <th data-sort=\"prodotto\">Fattura</th>
          <th data-sort=\"name\">Descrizione</th>
          <th data-sort=\"quantita\">Quantita</th>
          <th data-sort=\"importo\">Importo </th>
          <th data-sort=\"acconto\">Acconto </th>
          <th data-sort=\"acconto\">Iva %</th>
          <th data-sort=\"totale\">Totale EUR</th>
          <th>Aggiorna</th>
          <th>Cancella</th>
          <th>Stampa</th>
        </tr>
      </thead>
      <tbody>
        <tr ng-repeat="detail in details| filter:search_query">
          <td>{{ detail.name}}</td>
          <td>{{ detail.surname}}</td>
        	<td>{{ detail.data_contabile}}</td>
        	<td>{{ detail.prodotto}}</td>
        	<td>{{ detail.descrizione}}</td>
        	<td><input type="text" ng:model="detail.quantita"class="input-small"></td>
        	<td><input type="text" ng:model="detail.importo"class="input-small"></td>
        	<td><input type="text" ng:model="detail.acconto"class="input-small"></td>
        	<td>{{ detail.iva}}</td>
        	<td><b>{{ detail.quantita * detail.importo- detail.acconto * 22/100 | currency: "Euro "  }}</b></td>
          <td><button class="btn btn-warning" ng-click="editInfo(detail)" title="Edit"><span class="glyphicon glyphicon-edit"></span></button></td>
          <td><button class="btn btn-danger" ng-click="deleteInfo(detail)" title="Delete"><span class="glyphicon glyphicon-trash"></span></button></td>
    			<td><a href=\"#\"><i class=\"fa fa-print\"></i>Ricevuta</a></td>
        </tr>
       </tbody>
      </table>
	</div>
</div>































<?php


/*

echo "<div id=\"tabs-4\">\n";
  echo '<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#nuovaModal">
  	Nuova Entrata
</button>';
//

echo '<div class="modal fade" id="nuovaModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Nuova Entrata</h4>
      </div>
      <div class="modal-body">
      	<div class="row">
      		<div class="col-md-8">';

      printf("<div class=\"form-group\"><label for=\"data_contabile\">Data</label><input type=\"text\" name=\"data_contabile\" id=\"data_contabile\"  class=\"form-control\" value=\"%s\" size=\"10\" maxlength=\"10\"></div>",!empty($data_contabile)?$data_contabile:'');
      printf("<div class=\"form-group\"><label for=\"data_contabile\">Fattura</label><input type=\"text\" name=\"prodotto\" id=\"prodotto\"  class=\"form-control\" value=\"%s\" size=\"10\" maxlength=\"10\"></div>",!empty($prodotto)?$prodotto:'');
      printf("<div class=\"form-group\"><label for=\"descrizione\">Descrizione</label><input type=\"text\" name=\"descrizione\" id=\"descrizione\"  class=\"form-control\" value=\"%s\" size=\"55\" maxlength=\"55\"></div>",!empty($descrizione)?$descrizione:'');
      printf("<div class=\"form-group\"><label for=\"quantita\">Quantita</label><input type=\"text\" name=\"quantita\" id=\"quantita\"  class=\"form-control\" value=\"%s\" size=\"10\" maxlength=\"10\"></div>",!empty($quantita)?$quantita:'');
      printf("<div class=\"form-group\"><label for=\"importo\">Importo EUR:</label><input type=\"text\" name=\"importo\" id=\"importo\"  class=\"form-control\" value=\"%s\" size=\"10\" maxlength=\"10\"></div>",!empty($importo)?money_format('%.2n', $importo):'');
      printf("<div class=\"form-group\"><label for=\"acconto\">Acconto EUR:</label><input type=\"text\" name=\"acconto\" id=\"acconto\"  class=\"form-control\" value=\"%s\" size=\"10\" maxlength=\"10\"></div>",!empty($acconto)?money_format('%.2n', $acconto):'');
      printf("<div class=\"form-group\"><label for=\"iva\">Iva</label><input type=\"text\" name=\"iva\" id=\"iva\"  class=\"form-control\" value=\"%s\" size=\"10\" maxlength=\"10\" readonly></div>",!empty($iva)?$iva:'');

      // CAMPO Totale ------------------------------------------------------------------------------------

      printf("<div class=\"form-group\"><label for=\"totale\">Totale EUR:</label><input type=\"text\" name=\"totale\" id=\"totale\"  class=\"form-control\" value=\"%s\" size=\"10\" maxlength=\"10\"></div>");








echo '		</div>
		</div>
	</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Chiudi</button>
        <button type="button" class="btn btn-primary">Salva cambiamenti</button>
      </div>
    </div>
  </div>
</div>';

//-- Modal -


echo'
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Nuova Entrata</h4>
      </div>
      <div class="modal-body">
      	<div class="row">
      		<div class="col-md-8">';
    // 	------------
 
      printf("<div class=\"form-group\"><label for=\"data_contabile\">Data</label><input type=\"text\" name=\"data_contabile\" id=\"data_contabile\"  class=\"form-control\" value=\"%s\" size=\"10\" maxlength=\"10\"></div>",!empty($data_contabile)?$data_contabile:'');
      printf("<div class=\"form-group\"><label for=\"data_contabile\">Fattura</label><input type=\"text\" name=\"prodotto\" id=\"prodotto\"  class=\"form-control\" value=\"%s\" size=\"10\" maxlength=\"10\"></div>",!empty($prodotto)?$prodotto:'');
      printf("<div class=\"form-group\"><label for=\"descrizione\">Descrizione</label><input type=\"text\" name=\"descrizione\" id=\"descrizione\"  class=\"form-control\" value=\"%s\" size=\"55\" maxlength=\"55\"></div>",!empty($descrizione)?$descrizione:'');
      printf("<div class=\"form-group\"><label for=\"quantita\">Quantita</label><input type=\"text\" name=\"quantita\" id=\"quantita\"  class=\"form-control\" value=\"%s\" size=\"10\" maxlength=\"10\"></div>",!empty($quantita)?$quantita:'');
      printf("<div class=\"form-group\"><label for=\"importo\">Importo EUR:</label><input type=\"text\" name=\"importo\" id=\"importo\"  class=\"form-control\" value=\"%s\" size=\"10\" maxlength=\"10\"></div>",!empty($importo)?money_format('%.2n', $importo):'');
      printf("<div class=\"form-group\"><label for=\"acconto\">Acconto EUR:</label><input type=\"text\" name=\"acconto\" id=\"acconto\"  class=\"form-control\" value=\"%s\" size=\"10\" maxlength=\"10\"></div>",!empty($acconto)?money_format('%.2n', $acconto):'');
      printf("<div class=\"form-group\"><label for=\"iva\">Iva</label><input type=\"text\" name=\"iva\" id=\"iva\"  class=\"form-control\" value=\"%s\" size=\"10\" maxlength=\"10\" readonly></div>",!empty($iva)?$iva:'');

      // CAMPO Totale ------------------------------------------------------------------------------------
if(!empty($quantita))
	if(!empty($importo)){
		$totale = (($quantita * $importo) *$iva/100) +(($quantita * $importo) -$acconto);

		}



      printf("<div class=\"form-group\"><label for=\"totale\">Totale EUR:</label><input type=\"text\" name=\"totale\" id=\"totale\"  class=\"form-control\" value=\"%s\" size=\"10\" maxlength=\"10\"></div>",!empty($totale)?money_format('%.2n', $totale) :'');








echo '		</div>
		</div>
	</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Chiudi</button>
        <button type="button" class="btn btn-primary">Salva cambiamenti</button>
      </div>
    </div>
  </div>
</div>';




//--- END MODAL








































  echo " <p></p><table id=\"tblcont\" class=\"table table-hover sortable\">
      <thead>
        <tr>
          <th data-sort=\"date\">Data</th>
          <th data-sort=\"prodotto\">Fattura</th>
          <th data-sort=\"name\">Descrizione</th>
          <th data-sort=\"quantita\">Quantita</th>
          <th data-sort=\"importo\">Importo EUR</th>
          <th data-sort=\"acconto\">Acconto EUR</th>
          <th data-sort=\"acconto\">Iva %</th>
          <th data-sort=\"totale\">Totale EUR</th>
          <th>Stampa</th>
        </tr>
      </thead>
      <tbody>
        <tr>";


// CAMPO Data ------------------------------------------------------------------------------------
    if($data_contabile=="0000-00-00 00:00:00")
    {
		$data_contabile = 'Non dichiarata';
    }
printf("<td><button type=\"button\" id=\"link\" data-toggle=\"modal\" data-target=\"#myModal\"><i class=\"fa fa-plus\"></i></button><input type=\"text\" name=\"data_contabile\" id=\"data_contabile\" value=\"%s\" size=\"10\" maxlength=\"10\" readonly></td>", !empty($data_contabile)?$data_contabile:'');

// CAMPO Fattura ------------------------------------------------------------------------------------
printf("<td><input type=\"text\" name=\"prodotto\" id=\"prodotto\" value=\"%s\" size=\"10\" maxlength=\"10\" readonly></td>", !empty($prodotto)?$prodotto:'');

// CAMPO Descrizione ------------------------------------------------------------------------------------
printf("<td><input type=\"text\" name=\"descrizione\" id=\"descrizione\" value=\"%s\" size=\"22\" maxlength=\"22\"readonly></td>", !empty($descrizione)?$descrizione:'');

// CAMPO Quantita ------------------------------------------------------------------------------------
printf("<td><input type=\"text\" name=\"quantita\" id=\"quantita\" value=\"%s\" size=\"3\" maxlength=\"3\"readonly></td>", !empty($quantita)?$quantita:'');

// CAMPO Importo ------------------------------------------------------------------------------------
printf("<td><input type=\"text\" name=\"importo\" id=\"importo\" value=\"%s\" size=\"8\" maxlength=\"8\"readonly></td>", !empty($importo)?money_format('%.2n', $importo):'');


// CAMPO Acconto ------------------------------------------------------------------------------------
printf("<td><input type=\"text\" name=\"acconto\" id=\"acconto\" value=\"%s\" size=\"8\" maxlength=\"8\"readonly></td>", !empty($acconto)?money_format('%.2n', $acconto):'');

// CAMPO Acconto ------------------------------------------------------------------------------------
printf("<td><input type=\"text\" name=\"iva\" id=\"iva\" value=\"%s\" size=\"8\" maxlength=\"8\" readonly></td>", !empty($iva)?$iva:'');

// CAMPO Totale ------------------------------------------------------------------------------------
if(!empty($quantita))
	if(!empty($importo)){
		$totale = (($quantita * $importo) *$iva/100) +(($quantita * $importo) -$acconto);

		}


printf("<td><input type=\"text\" name=\"totale\" id=\"totale\" value=\"%s\" size=\"10\" maxlength=\"10\"readonly></td>", !empty($totale)? money_format('%.2n', $totale) :'');

echo "<td><a href=\"#\"><i class=\"fa fa-print\"></i>Ricevuta</a></td></tr>";
echo "</tbody>
    </table>";
  echo "</div>";