<!-- Form used to add new entries of employee in database -->

<form class="form-horizontal alert alert-warning" name="notaList" id="empForm" ng-submit="insertInfo(listaInfo);" hidden>
<h3 class="text-center">Inserisci NOTA:</h3>

	<div class="form-group">
		<label for="Name">Titolo:</label>
		<input type="text" name="lista_titolo" class="form-control" placeholder="nota...." ng-model="listaInfo.titolo" value="" autofocus required />
	</div>
	<div class="form-group">
		<p class="text-danger" ng-show="notaList.lista_titolo.$invalid && notaList.lista_titolo.$dirty">Il campo non è valido!</p>
	</div>

	<div class="form-group">
		<label for="Name">Descrizione:</label>
		<input type="text" name="lista_descrizione" class="form-control" placeholder="nota...." ng-model="listaInfo.descrizione" value="" autofocus required />
	</div>
	<div class="form-group">
		<p class="text-danger" ng-show="notaList.lista_descrizione.$invalid && notaList.lista_descrizione.$dirty">Il campo non è valido!</p>
	</div>
	
	<div class="form-group">
		<label for="Address">Data:</label>
		<!--<input type="text" name="lista_data" class="form-control" placeholder="Enter Employee Address" ng-model="listaInfo.ladata" autofocus required /> -->
		 <md-datepicker ng-model="listaInfo.date"></md-datepicker>		

	</div>
	<div class="form-group">
		<p class="text-danger" ng-show="notaList.lista_data.$invalid && notaList.lista_data.$dirty">Il campo non è valido!</p>
	</div>
	<div class="form-group">
		<button class="btn btn-warning" ng-disabled="notaList.$invalid">Aggiungi</button>
	</div>
</form>
