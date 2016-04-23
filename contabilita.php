<?php
//PROTECT THIS PAGE - REQUIRE LOGIN TO ACCESS
include('auth/protect.php');
//REDIRECT IF NOT ADMIN LEVEL 1 USER
if($user_level!='1'){header('Location: dashboard.php');}

include('data/data-functions.php');
include('lang/translate.php');
//SITE SETTINGS
list($meta_title, $meta_description, $site_title, $site_email, $site_logo) = all_settings();

?>
<!DOCTYPE html>
<html ng-app="ContApp">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="">
	<meta name="description" content="<?php echo $meta_description;?>">
    <meta name="author" content="">

    <title><?php echo $meta_title;?></title>

	 <!-- Bootstrap Core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<!-- Custom CSS -->
   	<link href="assets/css/base.css" rel="stylesheet">
	
		<!-- Font Awesome Icons -->
		<link href="assets/fonts/css/fa.css" rel="stylesheet">
		<!-- Webfont -->
		<link href='http://fonts.googleapis.com/css?family=Archivo+Narrow:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
		<!-- SweetAlert Plugin -->
		<link href="assets/css/plugins/sweetalert.css" rel="stylesheet" media="all">
		<!-- Datatables Plugin -->
		<script src="//code.jquery.com/jquery-1.10.2.js"></script>		
		<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/cupertino/jquery-ui.css">
		  <!-- Angular Material CSS now available via Google CDN; version 0.11.2 used here -->
	
</head>
<body>
<?php include('assets/comp/top-nav.php');?>
	<div id="wrapper">
		<!-- Side Wrapper -->
        <div id="side-wrapper">
            <ul class="side-nav">
                <?php include('assets/comp/side-nav.php');?>
			</ul>
        </div><!-- End Main Navigation --> 

        <div id="page-content-wrapper">
            <div class="container-fluid">
							<?php include('assets/comp/stat-boxes.php');?>
							<div class="row">
							<!-- Start Panel -->
								<div class="col-lg-12">
									<div class="panel">
										<div class="panel-heading panel-primary">
											<span class="title">
												<?php echo $lang['USERS_CONTABILITA'];?>
												<div class="pull-right">
													<!--<a href="#" data-toggle="modal" data-target="#myModal" class="btn btn-sm btn-success" style="margin-right:10px;"><i class="fa fa-plus-circled"></i> <?php echo $lang['ADD_USER'];?></a> -->
												</div>
											</span>
										</div>
									
<p></p>
<div  ng-controller="DbController">
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
          <td><input type="text" ng-model="detail.data_contabile" jqdatepicker size="10"/></td>
          	<td><input type="text" ng-model="detail.prodotto" class="input-small"></td>
        	<td><input type="text" ng-model="detail.descrizione" class="input-small"></td>
        	<td><input type="text" ng-model="detail.quantita"class="input-small" size="5"></td>
        	<td><input type="text" ng-model="detail.importo" class="input-small" size="7" ></td>
        	<td><input type="text" ng-model="detail.acconto" class="input-small" size="7"></td>
        	<td>{{ detail.iva}}</td>
        	<td><b>{{ detail.quantita * detail.importo- detail.acconto * 22/100 | currency: "Euro "  }}</b></td>
          	<td><button class="btn btn-warning" ng-click="editInfo(detail)" title="Edit"><span class="glyphicon glyphicon-edit"></span></button></td>
          	<td><button class="btn btn-danger" ng-click="deleteInfo(detail)" title="Delete"><span class="glyphicon glyphicon-trash"></span></button></td>
    		<td><button class="btn btn-info"><i class="fa fa-print"></i>Ricevuta</button></td>
        </tr>
       </tbody>
      </table>
	</div>
</div>
</div>
</nav>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<!-- Bootstrap -->
<script src="assets/js/bootstrap.min.js"></script>
<!-- Base Theme JS -->
<script src="assets/js/base.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular.min.js"></script>
<script src="assets/js/ui-bootstrap-tpls-1.2.4.min.js"></script>

<script src="assets/js/app.js"></script>	



</body>
</html>