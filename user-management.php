<?php
//PROTECT THIS PAGE - REQUIRE LOGIN TO ACCESS
include('auth/protect.php');
//REDIRECT IF NOT ADMIN LEVEL 1 USER
if($user_level!='1'){header('Location: dashboard');}

include('data/data-functions.php');
include('lang/translate.php');
//SITE SETTINGS
list($meta_title, $meta_description, $site_title, $site_email, $site_logo) = all_settings();

unlink("sezione/generale/generale.json");
unlink("sezione/amministrativa/amministrativa.json");
unlink("sezione/contabilita/contabilita.json");
unlink("sezione/formazione/formazione.json");
unlink("sezione/infobanca/infobanca.json");
//unlink("sezione/socio/socio.json");


?>
<!DOCTYPE html>
<html lang="en" ng-app="oltremare">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
		<link href="bower_components/angular-ui-grid/ui-grid.css">
    	<link href="bower_components/angular-ui-grid/ui-grid.css">
    	<link href="assets/css/ng-grid.min.css" rel="stylesheet">
		<!-- Datatables Plugin -->
		<!--<link href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.css" rel="stylesheet" media="all"> -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
 
</head>

<body>
	<!-- Start Top Navigation -->
	<?php include('assets/comp/top-nav.php');?>
    <!-- Start Main Wrapper --> 
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
												<?php echo $lang['USERS_MANAGEMENT'];?>
												<div class="pull-right">
													<a href="#" data-toggle="modal" data-target="#myModal" class="btn btn-sm btn-success" style="margin-right:10px;"><i class="fa fa-plus-circled"></i> <?php echo $lang['ADD_USER'];?></a>
												</div>
											</span>
										</div>
										
										<div class="panel-content" ng-controller="listMemberCtrl">
											<div>
												<div id="status"></div>
												<div class="col-md-6">
													<form class="form-inline">
                									<div class="form-group">
                  										<label>Cerca </label>
                  										<input type="text" ng-model="search.$" class="form-control" placeholder="Cerca" size="55"/>
                									</div>            
												</form>
												</div>
												<table id="users" class="table table-striped table-hover" cellspacing="0" width="100%" style="color:black; text-align:center">
												<thead>
													<tr>
														<th ng-click="sort(id)" ><?php echo $lang['IMAGE'];?></th>
														<th ng-click="sort(id)"><?php echo $lang['NAME'];?></th>
														<th ng-click="sort(id)"><?php echo $lang['SURNAME'];?></th>
														<!--<th ng-click="sort(id)"><?php echo $lang['USERNAME'];?></th>-->
														<th ng-click="sort(id)"><?php echo $lang['EMAIL'];?></th>
														<th ng-click="sort(id)"><?php echo $lang['EMAIL_CONFIRMED'];?></th>
														<th ng-click="sort(id)"><?php echo $lang['ACCEPTED_TERMS'];?></th>
														<th ng-click="sort(id)"><?php echo $lang['USER_LEVEL'];?></th>
														<th ng-click="sort(id)"><?php echo $lang['REG_DATE'];?></th>
														<!--<th ng-click="sort(id)"><?php echo $lang['CERT_MEDICO'];?></th>-->
														<th ng-click="sort(id)"><?php echo $lang['COMPLETE'];?></th>
														<th ng-click="sort(id)"><?php echo $lang['LAST_LOGIN'];?></th>
														<th ng-click="sort(id)"><?php echo $lang['DELETE'];?></th>
														<th ng-click="sort(id)"><?php echo $lang['MODIFY'];?></th>
													</tr>
												</thead>

												<tbody>
													<tr dir-paginate="list in details|itemsPerPage:10| filter: search : sortKey=reverse">
															<td><a href="#" target="_black"><img src="{{list.foto}}" alt="" width="50" height="50"></a></td>
															<td>{{list.name}}</td>
															<td>{{list.surname}}</td>
															<!--<td>{{list.username}}</td>-->
															<td>{{list.email}}</td>
															<td>{{list.email_confirmed}}</td>
															<td>{{list.terms}}</td>
															<td>

																<form method="post" action="data/change-user-level.php">
																<input type="hidden" name="m" value="{{list.id}}">
																	<!--<select name="l" onchange="this.form.submit()">
																		<?php //echo permission_select_selected($user_level); ?>
																	</select>-->
																	<select name="l" onchange="this.form.submit()" id="mySelect" ng-model="list.level"  convert-to-number>
																		<option value="1">Admin</option>
  																		<option value="2">Utente</option>
  																		<option value="3">Istruttore</option>
  																		<option value="4">Fornitore</option>
																	</select>
																</form>
															</td>
															<td>{{list.reg_date}}</td>
															<!--<td>{{list.certificato}}</td>-->
															<td>30%</td>
															<td>{{list.last_login}}</td>
															<td>
																<form method="post" action="data/delete-user.php">
																	<input type="hidden" name="m" value="{{list.id}}">
																	<input type="submit" class="btn btn-sm btn-danger" value="Cancella">
																</form>
															</td>
															<td>
																<!--<form method="post" action="manager-users.php">
																	<input type="hidden" name="m" value="{{list.id }}">
																	<input type="submit" class="btn btn-sm btn-info" value="Dettagli Vecchio">
																</form>  -->
																<form method="post" action="sezione.php">
																	<input type="hidden" name="m" value="{{list.id_utente }}">
																	<input type="submit" class="btn btn-sm btn-info" value="Dettagli">
																</form> 
															</td>
														</tr>	
													<?php //user_table_complete2(); ?>
												</tbody>
												 <dir-pagination-controls max-size=10 direction-links="true" boundary-links="10"></dir-pagination-controls>
											</table>
										</div>
									</div>
								</div>
								<!-- End Panel -->
							</div>
            </div>
        </div>
        <!-- End Page Content -->

		</div><!-- End Main Wrapper  -->
  <!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
		   <form method="post" action="data/add-user.php">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title" id="myModalLabel"><?php echo $lang['CREATE_USER'];?></h4>
		  </div>
		  <div class="modal-body" style="min-height:170px;">
			 <br>
			 	<div class="form-group">
					<label class="col-md-3 control-label" for="textinput"><?php echo $lang['NAME'];?></label>  
					<div class="col-md-9">
						<input id="textinput" name="name" id="name" type="text" placeholder="" class="form-control input-md" required>
					</div><br><br>
					<label class="col-md-3 control-label" for="textinput"><?php echo $lang['SURNAME'];?></label>  
					<div class="col-md-9">
						<input id="textinput" name="surname" id="name" type="text" placeholder="" class="form-control input-md" required>
					</div><br><br>
				 <label class="col-md-3 control-label" for="textinput"><?php echo $lang['EMAIL'];?></label>  
					<div class="col-md-9">
						<input id="textinput" name="email" type="text" placeholder="" class="form-control input-md" style="width:100%;">
					</div><br><br>
					 <label class="col-md-3 control-label" for="textinput"><?php echo $lang['USERS_TELEFONO'];?></label>  
					<div class="col-md-9">
						<input id="textinput" name="phone" type="text" placeholder="" class="form-control input-md" style="width:100%;">
					</div><br><br>
					<label class="col-md-3 control-label" for="textinput"><?php echo $lang['USERNAME'];?></label>  
					<div class="col-md-9">
						<input id="textinput" name="username" type="text" placeholder="" class="form-control input-md" style="width:100%;" required>
					</div>
					<br><br><br>
					<span style="margin-left:160px;"><?php echo $lang['RANDOM_PASS_NOTE_IT'];?></span>
				</div>
		  </div>
			<br><br><br>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $lang['CLOSE_IT'];?></button>
			<button type="submit" class="btn btn-primary"><?php echo $lang['CREATE_USER'];?></button>
			</form>
		  </div>
		</div>
	  </div>
	</div>
			
  <!-- jQuery -->
  <script src="assets/js/jquery.js"></script>

  <!-- Bootstrap -->
  <script src="assets/js/bootstrap.min.js"></script>
  <!-- Base Theme JS -->
  <script src="assets/js/base.js"></script>
	<!-- SweetAlert -->
	<script src="assets/js/plugins/sweetalert.min.js"></script>
	<!-- Datatables -->
	<!--<script type="text/javascript" charset="utf8" src="assets/datatables/media/js/jquery.dataTables.min.js"></script>-->
	<script src="bower_components/angular/angular.min.js"></script>
    <script src="node_modules/angular-utils-pagination/dirPagination.js"></script>
    <script src="assets/js/ng-grid-2.0.14.min.js"></script>
    
    <script src="bower_components/angular-ui-grid/ui-grid.js"></script>
    
    <script src="assets/app.js"></script>
			
	<script>
/*	$(document).ready(function() {
    $('#users').DataTable();
	} );
*/		
	<?php 
	if(isset($_SESSION['action_saved'])){ echo 'swal("OK", "Profilo aggiornato!", "success")';}
	unset($_SESSION['action_saved']);
	?>		
	</script>
	

	
</body>
</html>
