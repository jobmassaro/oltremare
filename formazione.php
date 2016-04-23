<?php
//PROTECT THIS PAGE - REQUIRE LOGIN TO ACCESS
include('auth/protect.php');
//REDIRECT IF NOT ADMIN LEVEL 1 USER
if($user_level!='1'){header('Location: dashboard.php');}

include('data/data-functions.php');
include('lang/translate.php');
//SITE SETTINGS
list($meta_title, $meta_description, $site_title, $site_email, $site_logo) = all_settings();



  $servername = "localhost";
  $username = "root";
  $password = "developer";
  $dbname = "oltremare";
  

  $mysqli = new mysqli($servername, $username, $password, $dbname);
  

  if ($mysqli->connect_errno) {
      echo "Connessione fallita: ". $mysqli->connect_error . ".";
      exit();
  }




  $sql = "SELECT * from cv_formazione_oltremare";
  $result = $mysqli->query($sql);
  $arr = array();
    if(mysqli_num_rows($result) != 0) 
    {  
       while($row = mysqli_fetch_assoc($result)) 
       {
           $arr[] = $row;
       }

       //$myfile = fopen("sezione/corsi/corsi.json", "w") or die("Unable to open file!");
       //$txt =json_encode($arr);
       //fwrite($myfile, $txt);
       //fclose($myfile);
    }


?>
<!DOCTYPE html>
<html ng-app="corsi">
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
	<style>
.table tbody tr:hover td, .table tbody tr:hover th {
    background-color: #eeeeea;
}
	</style>
</head>
<body>
<?php include('assets/comp/top-nav.php');?>
	<div id="wrapper" ng-controller="CorsiCtrl">
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
												<?php echo 'FORMAZIONE';?>
												<div class="pull-right">
													<a href="#" data-toggle="modal" data-target="#myModal" class="btn btn-sm btn-success" style="margin-right:10px;"><i class="fa fa-plus-circled"></i> <?php echo 'Aggiungi Nuovo Corso';?></a> 
												</div>
											</span>
										</div>
									
<p></p>
		<div >
	
	<table class="table table-hover">
    <tr>
        <th>Corso </th>
        <th>Attivo </th>
        <th>Azioni </th>
        
    </tr>
    <tr ng-repeat="detail in details| filter:search_query" class="well well-sm" id="generale">
        <td><span>{{detail.nome_corso}}</span></td>
        <td >{{detail.attivo}}</td>
        <td><button class="btn btn-warning" ng-click="aggiornamentoCorso(detail)" title="Edit"><span class="glyphicon glyphicon-edit"></span></button></td>
        <td><button class="btn btn-danger" ng-click="cancellazioneCorso(detail)" title="Delete"><span class="glyphicon glyphicon-trash"></span></button></td>
    </tr>
    </table>
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
<script src="node_modules/angular/angular.min.js"></script>
 <script src="node_modules/angular-animate/angular-animate.js"></script>
 <script src="node_modules/angular-aria/angular-aria.js"></script>
 <script src="node_modules/angular-material/angular-material.js"></script>
 <script src="node_modules/moment/moment.js"></script>
<script type="text/javascript">
  
var app = angular.module('corsi',['ngMaterial']);

/**
Copyright 2016 Google Inc. All Rights Reserved. 
Use of this source code is governed by an MIT-style license that can be in foundin the LICENSE file at http://material.angularjs.org/license.
**/

</script>

<script src="sezione/corsi/corso.js"></script>	



</body>
</html>