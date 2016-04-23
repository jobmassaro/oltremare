

<div id="tabs-">
	<div class="container">
		<div class="col-md-6">
			<p></p>
			<button class="btn btn-primary" ng-show="show_form" ng-click="formToggle()">Attivita Oltremare <span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
			<p></p>
			<button class="btn btn-primary" ng-show="show_form" ng-click="formToggle()">Attivita Oltremare <span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>

		</div>
		<div class="col-md-5">
			<form class="form-inline">
                <div class="form-group">
                  <label>Cerca</label>
                  <input type="text" ng-model="search" class="form-control" placeholder="Cerca" />
                </div>            
			</form>
		</div>
	</div>
	<div class="table-responsive">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Attività:</th> 	
					<th>Data:</th>
					<th>Istruttore:</th>
					<th>Valutazione del Corso:</th>
					<th>Note:</th>
				</tr>
			</thead>
			<tbody>
				<td></td>
				<td>
	
<button class="btn btn-warning" ng-click="editInfo(detail)" title="Edit"><span class="glyphicon glyphicon-edit"></span></button>
</td>
<td>
<button class="btn btn-danger" ng-click="deleteInfo(detail)" title="Delete"><span class="glyphicon glyphicon-trash"></span></button>
</td>
				</td>
			</tbody>
		</table>
	</div>
</div>

