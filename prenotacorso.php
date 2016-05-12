<?php
//PROTECT THIS PAGE - REQUIRE LOGIN TO ACCESS
include('auth/protect.php');
//REDIRECT IF NOT ADMIN LEVEL 1 USER

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

	

  $sql = "SELECT * from cv_formazione WHERE attivo = 'True' ORDER BY nome_corso ASC " ;
  $result = $mysqli->query($sql);
  $arr = array();
    if(mysqli_num_rows($result) != 0) 
    {  
       while($row = mysqli_fetch_assoc($result)) 
       {
           $arr[] = $row;
       }

       $myfile = fopen("sezione/prenotacorso/corsi_attivi.json", "w") or die("Unable to open file!");
       $txt =json_encode($arr);
       fwrite($myfile, $txt);
       fclose($myfile);
    }

    $sql = "SELECT id, id_utente, name, surname, email FROM oltremare.cv_members WHERE id = ". $user_id ." OR surname='" .$user_surname ."' AND email='" .$user_email ."'";
    $result = $mysqli->query($sql);
    $arr = array();
    if(mysqli_num_rows($result) != 0) 
    {  
       while($row = mysqli_fetch_assoc($result)) 
       {
           $arr[] = $row;
       }
       unlink("sezione/prenotacorso/utente.json");
       $myfile = fopen("sezione/prenotacorso/utente.json", "w") or die("Unable to open file!");
       $txt =json_encode($arr);
       fwrite($myfile, $txt);
       fclose($myfile);
    }








?>
<!DOCTYPE html>
<html ng-app="prcorsi">
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
	<div id="wrapper" ng-controller="PrCorsiCtrl">
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
												<?php echo 'PRENOTA CORSO';?>
												<div class="pull-right">
                         
												</div>
											</span>
										</div>
									
<p></p>
		<div >
	   
<style>
    button { 
	    border:1px solid #474747; 
	    background:#ccc; 
	    -moz-border-radius:5px; 
	    -webkit-border-radius:5px; 
	    padding:10px; 
	    margin:10px; 
	    font-weight:bold; 
	    font-size:200%; 
	} 
	
	button:hover { 
    	background:#ececec; 
    	cursor:pointer; 
	}
</style>

    <!-- -->
     <div class="row">

	
	
<div ng-repeat="n in user">
    <div class="col-md-10">
      
		<form class="form-horizontal" id="" ng-submit="prenotaCorso(n)" >
      <div class="col-md-10">
				<div class="form-group">
    	      	<label for="tipo"  class="col-sm-3 control-label">Nome:</label>
	        	    <div class="col-sm-4">
	        	    	<input type="text" class="form-control" ng-model="n.name" value="{{ n.name }}">
        	    	</div>
    			</div>
    		</div>
    		<div class="col-md-10">
				<div class="form-group">
    	      	<label for="tipo"  class="col-sm-3 control-label">Cognome:</label>
	        	    <div class="col-sm-4">
    	        	    <input type="text" class="form-control" ng-model="n.surname" value="{{ n.surname }}">
        	    	</div>
    			</div>
    		</div>
    		<div class="col-md-10">
				<div class="form-group">
    	      	<label for="tipo"  class="col-sm-3 control-label">Email:</label>
	        	    <div class="col-sm-4">
    	        	    <input type="text" class="form-control" ng-model="n.email" value="{{ n.email }}">
        	    	</div>
    			</div>
    		</div>
    	<div class="col-md-10">
	     	<div class="form-group">
    	    	  <label for="tipo"  class="col-sm-3 control-label">Corsi Disponibili:</label>
        	    	<div class="col-sm-4">
            	    	<select class="form-control" ng-model="n.nome_corso">
                		    <option ng-repeat="x in details">{{x.nome_corso}}</option>
                		</select>
            		</div>
    		</div>
		</div>
	
		<div class="col-md-10">
	    	 <div class="form-group">
    	    	  <label for="tipo"  class="col-sm-3 control-label">Periodo :</label>
        	    	<div class="col-sm-4">
            	    	<select class="form-control" ng-model="n.stagione" >
                	    	<option value="primavera">Primavera</option>
                			<option value="estate">Estate</option>
	                		<option value="autunno">Autunno</option>
    	            		<option value="inverno">Inverno</option>
        	        	</select>
            		</div>
    		</div>
		</div>
	 <p></p>
	 <div class="form-group">
	 	<div class="col-md-6">
    		<button class="" ng-disabled="n.$invalid">Prenota</button>
    	</div>
  </div>
</form>
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
 // location.reload(); 
</script>

<script type="text/javascript">
  
var app = angular.module('prcorsi',['ngMaterial']);

/**
Copyright 2016 Google Inc. All Rights Reserved. 
Use of this source code is governed by an MIT-style license that can be in foundin the LICENSE file at http://material.angularjs.org/license.
**/

</script>

<script src="sezione/prenotacorso/prenotacorso.js"></script>	



</body>
</html>