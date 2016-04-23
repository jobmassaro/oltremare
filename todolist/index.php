<div ng-app="todolist">

<div ng-controller="listController" style="color:black;">
	
	<button class="btn btn-primary" ng-show="show_form" ng-click="formToggle()">Cose da Fare 
		<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
	</button>

	<div ng-include src="'todolist/views/todolist.php'"></div>

	<ul class="list-group">
		<li ng-repeat="item in lista" class="list-group-item text-center clearfix">
			
	<button type="button" class="btn btn-sm btn-success pull-left" href ng-click="toggleModal(item)" >Info
		<span class="glyphicon glyphicon-info-sign"></span>
	</button>

	<span ng-class="{ strike:item.completato }" style="font-weight:bold;">{{item.titolo}} </span>
	|
	<span ng-class="{ strike:item.completato }" style="font-weight:bold; color:grey">{{ item.date }}</span></span> 



	<button type="button" class="btn btn-sm btn-danger pull-right" ng-click="remove(item)">
		<span class="glyphicon glyphicon-trash"></span>
	</button>
	<!--<a href="#/addItem/edit/{{item.id}}" class="btn btn-sm btn-default pull-right">
		<span class="glyphicon glyphicon-pencil"></span>
	</a>-->
 

		</li>

	</ul>

<modal title="Descrizione"  visible="showModal">
    {{ lista.descrizione }}
  </modal>

 
	
	</div>
</div><!-- todo list -->