<?php
include('auth/protect.php');
include('data/data-functions.php');
include('lang/translate.php');
include('data/visitor-stats-log.php');


//SITE SETTINGS
list($meta_title, $meta_description, $site_title, $site_email, $site_logo) = all_settings();
//RETRIEVE PLAN SETTINGS
$get_plan = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT plan_id FROM ".$prefix."members WHERE id = $user_id"));
$plan_id = $get_plan['plan_id'];
$get_data = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT title, trial_period, trial_cost, membership_cost, recurring_period FROM ".$prefix."memberships WHERE id=$plan_id"));
$plan_title = $get_data['title'];
$trial_period = $get_data['trial_period'];
$trial_cost = $get_data['trial_cost'];
$membership_cost = $get_data['membership_cost'];
$recurring_period = $get_data['recurring_period'];

$uid = filter_input(INPUT_POST, 'm', FILTER_SANITIZE_STRING);


if($recurring_period=='0'){$one_time='1';}
//PAYPAL SPECIFIC EXAMPLE (DAILY = D, WEEKLY = W....)
if($recurring_period=='daily'){$reoccur_unit = '1'; $reoccurs='D';}
if($recurring_period=='weekly'){$reoccur_unit = '1'; $reoccurs='W';}
if($recurring_period=='biweekly'){$reoccur_unit = '2'; $reoccurs='W';}
if($recurring_period=='monthly'){$reoccur_unit = '1'; $reoccurs='M';}
if($recurring_period=='quarterly'){$reoccur_unit = '3'; $reoccurs='M';}
if($recurring_period=='yearly'){$reoccur_unit = '1'; $reoccurs='Y';}
?>

<!DOCTYPE html>
<html lang="en">

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
		<link href='https://fonts.googleapis.com/css?family=Noto+Sans:400,700' rel='stylesheet' type='text/css'>
		<!-- Animation Effects -->
		<link href="assets/css/plugins/hover.css" rel="stylesheet" media="all">
		<!-- SweetAlert Plugin -->
		<link href="assets/css/plugins/sweetalert.css" rel="stylesheet" media="all">
		<!-- Datatables Plugin -->
		<link href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.css" rel="stylesheet" media="all">
		
		<link rel="stylesheet" href="assets/css/select-theme-chosen.css" />
		<link rel="stylesheet" href="assets/css/select-theme-dark.css" />
		<link rel="stylesheet" href="assets/css/select-theme-default.css" />
		
		<link href="assets/css/styles/jqx.base.css"  rel="stylesheet"/>
		 <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
		<!--<link href="https://cdn.rawgit.com/angular-ui/bower-ui-grid/master/ui-grid.min.css" rel="stylesheet" /> -->
		
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    
 <style type="text/css">
	.error{
		color:red;
	}


form#contact  {font-family:arial;font-size:100%;color:#000;}
form#contact label  {float:left;display:block;margin:3px 0;clear:both;}
form#contact input  {color:#000;margin:0 0 7px 0;border:1px solid #d8d8d8;width:220px;float:right;-moz-border-radius:9px;-webkit-border-radius:9px;background: url('gradient_white.png') repeat-x top left #efefef;padding:3px 10px;}
 
form#contact select {color:#000;margin:0 0 7px 0;border:1px solid #d8d8d8;width:240px;float:right;-moz-border-radius:9px;-webkit-border-radius:9px;background: url('gradient_white.png') repeat-x top left #efefef;padding:3px 5px 3px 10px;}
form#contact option {display:block;color:#666;}
 
form#contact textarea {color:#666; float:right;font-size:110%;font-family:arial;height:80px;border:1px solid #d8d8d8;width:220px;-moz-border-radius:12px;-webkit-border-radius:12px;background: url('gradient_white.png') repeat-x top left #efefef;padding:2px 10px;margin-bottom:10px;}
#send {background: url('gradient_black.png') repeat-x top left #a80329; clear:both;-moz-border-radius:15px;-webkit-border-radius:15px;border:0;cursor:pointer;color:#fff;margin-top:15px;float:right;font-weight:bold;font-size:110%;padding:5px 15px;}
.faulty_field{background:#fff4f4 !important;color:#ff0000;border:1px solid #ff0000 !important;}
label span {color:#ff0000;font-size:85%; }
 
#main{ width:500px; height:400px; margin:0 auto; padding:0;}




 </style>
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
							<div class="row">
								<!-- Start Panel -->
									
										<div class="panel">
											<div class="panel-heading panel-warning">
												<span class="title">Informazioni Utente</span>
											</div>
											<div class="panel-content" style="color:black;">
												<div class="row">
												<?php
													
													$reg_errors = array();

															

													if ($_SERVER['REQUEST_METHOD'] === 'POST') 
													{
														
														if(!empty($_POST['idmember']))
														{
															$idmember = $_POST['idmember'];
															//echo $idmember;	
														}

														if(!empty($_POST['tutor']))
														{
															$idtutor = $_POST['tutor'];
															
														}else
														{
															$idtutor = 0;
														}

														if(!empty($_POST['username']))
														{
															$username = $_POST['username'];
														//	echo $username;	
														}

														if(!empty($_POST['email']))
														{
															$email = $_POST['username'];
														//	echo $email;	
														}

														if(!empty($_POST['codfiscale']))
														{
															$codicefiscale = $_POST['codfiscale'];
														//	echo $cf;	
														}
														if(!empty($_POST['partitaiva']))
														{
															$partitaiva = $_POST['partitaiva'];
															//echo $piva;	
														}


														if(!empty($_POST['datanascita']))
														{
															$datanascita = $_POST['datanascita'];
															//echo $datanascita .'<br />';		
														}else 
														{
															$reg_errors['datanascita'] = 'invalida data di nascita !';
														}

														if(!empty($_POST['sesso']))
														{
															$sesso = $_POST['sesso'];
															//echo $sesso .'<br />';		
														}else 
														{
															$reg_errors['sesso'] = 'invalido sesso !';
														}

														if(!empty($_POST['professione']))
														{
															$professione = $_POST['professione'];
															//echo $professione .'<br />';	
														}else 
														{
															$reg_errors['professione'] = 'professione invalida!';
														}

														// Dati personali 
														if(!empty($_POST['via']))
														{
															$via = $_POST['via'];
															//echo $via .'<br />';	
														}else 
														{
															$reg_errors['via'] = 'invalida  via!';
														}

														if(!empty($_POST['civico']))
														{
															$civico = $_POST['civico'];
															//echo $civico .'<br />';
														}else 
														{
															$reg_errors['civico'] = 'numero civico invalido!';
														}

														if(!empty($_POST['cap']))
														{
															$cap = $_POST['cap'];
															//echo $cap .'<br />';

														}else 
														{
															$reg_errors['cap'] = 'numero cap invalido!';
														}

														if(!empty($_POST['comune']))
														{
															$comune = $_POST['comune'];
															//echo $comune .'<br />';
														}else 
														{
															$reg_errors['comune'] = 'comune invalido!';
														}

														if(!empty($_POST['provincia']))
														{
															$provincia = $_POST['provincia'];
															//echo $provincia .'<br />';
														}else 
														{
															$reg_errors['provincia'] = 'provincia invalida!';
														}

														if(!empty($_POST['numtelefono']))
														{
															$numtelefono = $_POST['numtelefono'];
															//echo $numtelefono .'<br />';
														}else 
														{
															$reg_errors['numtelefono'] = 'numtelefono invalido!';
														}

														if(!empty($_POST['mobile']))
														{
															$mobile = $_POST['mobile'];
															//echo $mobile .'<br />';
														}else 
														{
															$reg_errors['mobile'] = 'numero mobile invalido!';
														}

														if(!empty($_POST['tshirt']))
														{
															$tshirt = $_POST['tshirt'];
															//echo $tshirt .'<br />';
														}else 
														{
															$reg_errors['tshirt'] = 'tshirt invalido!';
														}

														if(!empty($_POST['caparra']))
														{
															$caparra = $_POST['caparra'];
															//echo $caparra .'<br />';
														}else 
														{
															$reg_errors['caparra'] = 'caparra invalida!';
														}

														if(!empty($_POST['iban']))
														{
															$iban = $_POST['iban'];
															//echo $iban .'<br />';
														}else 
														{
															$reg_errors['iban'] = 'iban invalido!';
														}

														if(!empty($_POST['numerocartacredito']))
														{
															$numerocartacredito = $_POST['numerocartacredito'];
															//echo $numerocartacredito .'<br />';
														}else 
														{
															$reg_errors['numerocartacredito'] = 'numerocartacredito invalido!';
														}

														if(!empty($_POST['codicefornitore']))
														{
															$codicefornitore = $_POST['codicefornitore'];
															//echo $codicefornitore .'<br />';
														}else 
														{
															$reg_errors['codicefornitore'] = 'codicefornitore invalido!';
														}

														if(!empty($_POST['attivitafornitore']))
														{
															$attivitafornitore = $_POST['attivitafornitore'];
															//echo $attivitafornitore .'<br />';
														}else 
														{
															$reg_errors['attivitafornitore'] = 'attivitafornitore invalido!';
														}

														if(!empty($_POST['numuisp']))
														{
															$numuisp = $_POST['numuisp'];
															//echo $numuisp .'<br />';
															
														}else 
														{
															$reg_errors['numuisp'] = 'numuisp invalido!';
														}

														if(!empty($_POST['datarilascio']))
														{
															$datarilascio = $_POST['datarilascio'];
															//echo $datarilascio .'<br />';
														}else 
														{
															$reg_errors['datarilascio'] = 'datarilascio invalido!';
														}

														if(!empty($_POST['certificatomedico']))
														{
															$certificatomedico = $_POST['certificatomedico'];
															///echo $certificatomedico .'<br />';
														}else 
														{
															$reg_errors['certificatomedico'] = 'certificatomedico invalido!';
														}

														
														if(!empty($_POST['datarilasciomedico']))
														{
															$datarilasciomedico = $_POST['datarilasciomedico'];
															//echo $datarilasciomedico .'<br />';
														}else 
														{
															$reg_errors['datarilasciomedico'] = 'datarilasciomedico invalido!';
														}

														if(!empty($_POST['prezzotessera']))
														{
															$prezzotessera = $_POST['prezzotessera'];
															//echo $prezzotessera .'<br />';
														}else 
														{
															$reg_errors['prezzotessera'] = 'prezzotessera invalido!';
														}

														if(!empty($_POST['pagatoil']))
														{
															$pagatoil = $_POST['pagatoil'];
															//echo $pagatoil .'<br />';
														}else 
														{
															$reg_errors['pagatoil'] = 'pagatoil invalido!';
														}

														if(!empty($_POST['modalitapagamento']))
														{
															$modalitapagamento = $_POST['modalitapagamento'];
															//echo $modalitapagamento .'<br />';
														}else 
														{
															$reg_errors['modalitapagamento'] = 'modalitapagamento invalido!';
														}

														if(!empty($_POST['fattura']))
														{
															$fattura = $_POST['fattura'];
															//echo $fattura .'<br />';
														}else 
														{
															$reg_errors['fattura'] = 'fattura invalido!';
														}


														if(!empty($_POST['numfattura']))
														{
															$numfattura = $_POST['numfattura'];
															//echo $numfattura .'<br />';
														}else 
														{
															$reg_errors['numfattura'] = 'numfattura invalido!';
														}

														if(!empty($_POST['datafattura']))
														{
															$datafattura = $_POST['datafattura'];
															//echo $datafattura .'<br />';
														}else 
														{
															$reg_errors['datafattura'] = 'datafattura invalido!';
														}

														$q ="SELECT id FROM ".$prefix. "profile_complete" .
														" WHERE idmember = " . $idmember;
														//echo $q;

														if ($result = $mysqli->query($q))
														{
															$num_results = mysqli_num_rows($result);

															if($num_results > 0)
															{
																while($row = $result->fetch_assoc())
																{
																	$id = $row['id'];
																	//echo '<h2>' . $id .'</h2>';
																}

																//UPDATE

																	$query = "UPDATE ".$prefix. "profile_complete" .
														" SET  " .
														"id = null,
														 idmember = " 	.$idmember .","
														 ."idtutor = " 	.$idtutor .","
														 ."photo = '" 	.$photo ."',"
														 ."codicefiscale = '" 	. $codicefiscale ."'," 
														 ."partitaiva = '" 		. $partitaiva ."'," 
														 ."datanascita = '" 	. $datanascita ."'," 
														 ."stato = '" 			. $stato ."'," 
														 ."sposato = '" 		. $sposato ."'," 
														 ."professione = '" 	. $professione ."'," 
														 ."sesso = '" 			. $sesso ."'," 
														 ."via = '" 			. $via ."'," 
														 ."civico = '" 			. $civico ."'," 
														 ."cap = '" 			. $cap ."'," 
														 ."comune = '" 			. $comune ."'," 
														 ."provincia = '" 		. $provincia ."'," 
														 ."numtelefono = '" 	. $numtelefono ."'," 
														 ."mobile = '" 			. $mobile ."'," 
														 ."tshirt = '" 			. $tshirt ."'," 
														 ."caparra = '" 		. $caparra ."'," 
														 ."iban = '" 			. $iban ."'," 
														 ."numerocartacredito = " 			. $numerocartacredito ."," 
														 ."codicefornitore = '" 			. $codicefornitore ."'," 
														 ."attivitafornitore = '" 			. $attivitafornitore ."'," 
														 ."numuisp = '" 					. $numuisp ."'," 
														 ."datarilascio = '" 				. $datarilascio ."'," 
														 ."certificatomedico = '" 			. $certificatomedico ."'," 
														 ."datarilasciomedico = '" 			. $datarilasciomedico ."'," 
														 ."prezzotessera = '" 				. $prezzotessera ."'," 
														 ."pagatoil = '" 					. $pagatoil ."'," 
														 ."modalitapagamento = '" 			. $modalitapagamento ."'," 
														 ."fattura = '" 					. $fattura ."'," 
														 ."numfattura = '" 					. $numfattura ."'," 
														 ."datafattura = '" 				. $datafattura ."' WHERE id = " . $id ;

															if ($mysqli->query($query) === TRUE) 
															{
														    echo '<h2 class="bg-success">Aggiornato </h2><br>';
														    header("refresh: 1;");
														    
															} else {
														      echo '<h2 class="bg-error">Errore nella registrazione</h2>';
															}

															


															}else
															{
																

																$query = "INSERT INTO ".$prefix. "profile_complete (`id`,
																				`idmember`,
																				`codicefiscale`,
																				`partitaiva`,
																				`datanascita`,
																				`stato`,
																				`sposato`,
																				`professione`,
																				`sesso`,
																				`via`,
																				`civico`,
																				`cap`,
																				`comune`,
																				`provincia`,
																				`numtelefono`,
																				`mobile`,
																				`tshirt`,
																				`caparra`,
																				`iban`,
																				`numerocartacredito`,
																				`codicefornitore`,
																				`attivitafornitore`,
																				`numuisp`,
																				`datarilascio`,
																				`certificatomedico`,
																				`datarilasciomedico`,
																				`prezzotessera`,
																				`pagatoil`,
																				`modalitapagamento`,
																				`fattura`,
																				`numfattura`,
																				`datafattura`)
																				VALUES (
																						null,
																						" .$idmember .",'" 
																						. $codicefiscale ."','" 
																						. $partitaiva ."','"
																						. $datanascita ."','"
																						. $stato ."','"
																						. $sposato ."','"
																						. $professione ."','"
																						. $sesso ."','"
																						. $via ."','"
																						. $civico ."','"
																						. $cap ."','"
																						. $comune ."','"
																						. $provincia ."','"
																						. $numtelefono ."','"
																						. $mobile ."','"
																						. $tshirt ."','"
																						. $caparra ."','"
																						. $iban ."','"
																						. $numerocartacredito ."','"
																						. $codicefornitore ."','"
																						. $attivitafornitore ."','"
																						. $numuisp ."','"
																						. $datarilascio ."','"
																						. $certificatomedico ."','"
																						. $datarilasciomedico ."','"
																						. $prezzotessera ."','"
																						. $pagatoil ."','"	
																						. $modalitapagamento ."','"	
																						. $fattura ."','"	
																						. $numfattura ."','"	
																						. $datafattura ."');";

																					//echo $query;


																					if ($mysqli->query($query) === TRUE) {
																					    echo '<h2 class="bg-success">Aggiunto al database</h2>';
																					    header( "refresh:3;url=user-management.php" );
																					} else {
																					      echo '<h2 class="bg-error">Errore nella registrazione</h2>';
																					}





															}

															
															
															
														}


														


													/*	*/

														 							
																						


														
	


													/*	if (empty($reg_errors)) 
														{ 

															echo '<h3>' .$username .'</h3><<br />';
															echo '<h3>' .$email .'</h3><br />';
															echo '<h3>' .$codfiscale .'</h3><br />';
															echo '<h3>' .$partitaiva .'</h3><<br />';
															echo '<h3>' .$datanascita .'</h3><br />';
															echo '<h3>' .$stato .'</h3><br />';
															echo '<h3>' .$sposato .'</h3><br />';
															echo '<h3>' .$professione .'</h3><br />';
															echo '<h3>' .$sesso .'</h3><br />';
															echo '<h3>' .$via .'</h3><br />';
															echo '<h3>' .$civico .'</h3><br />';
															echo '<h3>' .$cap .'</h3><br />';
															echo '<h3>' .$comune .'</h3><br />';
															echo '<h3>' .$provincia .'</h3><br />';
															echo '<h3>' .$numtelefono .'</h3><br />';
															echo '<h3>' .$mobile .'</h3><br />';
															echo '<h3>' .$tshirt .'</h3><br />';
															echo '<h3>' .$caparra .'</h3><br />';
															echo '<h3>' .$iban .'</h3><br />';
															echo '<h3>' .$numerocartacredito .'</h3><br />';
															echo '<h3>' .$codicefornitore .'</h3><br />';
															echo '<h3>' .$attivitafornitore .'</h3><br />';
															echo '<h3>' .$numuisp .'</h3><br />';
															echo '<h3>' .$datarilascio .'</h3><br />';
															echo '<h3>' .$certificatomedico .'</h3><br />';
															echo '<h3>' .$uploadcertificato .'</h3><br />';
															echo '<h3>' .$datarilasciomedico .'</h3><br />';
															echo '<h3>' .$prezzotessera .'</h3><br />';
															echo '<h3>' .$pagatoil .'</h3><br />';
															echo '<h3>' .$modalitapagamento .'</h3><br />';
															echo '<h3>' .$fattura .'</h3><br />';
															echo '<h3>' .$numfattura .'</h3><br />';
															echo '<h3>' .$datafattura .'</h3><br />';
														

													
														}else
														{
															
														}*/

													}

												?>
												<br><br>
												<?php

													$fname = '';
													$lname = '';
													$username = '';
													$email = '';

													
													if($user_level=='1')
													{
														$query = "SELECT * FROM ".$prefix."members WHERE id =". $uid ." LIMIT 1";
														if ($result = $mysqli->query($query))
														{
																while($row = $result->fetch_assoc())
																{
																	$fname = $row['name'];
																	$lname = $row['surname'];
																	$username = $row['username'];
																	$email = $row['email'];
																	$phone = $row['numtelefono'];
																	$codfiscale = $row['codicefiscale'];
																	$partitaiva  = $row['partitaiva'];
																	$datanascita  = $row['datanascita'];
																	$certificatomedico = $row['certificatomedico'];
																}
														}

														$query = "SELECT * FROM ".$prefix."profile_complete WHERE idmember = " .$uid ." LIMIT 1";
														if($result = $mysqli->query($query))
														{
															$num_results = mysqli_num_rows($result);
															if(!$num_results == 0 || !$num_results == null)
															{
																while($row = $result->fetch_assoc())
																{
																	
																	$stato = $row['stato'];
    																$sposato =$row['sposato'];
    																$professione =$row['professione'];
																	$sesso = $row['sesso'];
																	$via =  $row['via'];
																	$civico = $row['civico'];
																	$cap  = $row['cap'];
																	$comune  =  $row['comune'];
																	$provincia = $row['provincia'];
																	$numtelefono = $row['numtelefono'];
																	$mobile =  $row['mobile'];
																	$tshirt = $row['tshirt'];
																	$caparra = $row['caparra'];
																	$iban = $row['iban'];
																	$numerocartacredito =  $row['numerocartacredito'];
																	$codicefornitore = $row['codicefornitore'];
																	$attivitafornitore = $row['attivitafornitore'];
																	$numuisp =  $row['numuisp'];
																	$datarilascio = $row['datarilascio'];
																	$uploadcertificato = $row['uploadcertificato'];	
  																	$datarilasciomedico = $row['datarilasciomedico'];
    																$prezzotessera = $row['prezzotessera']; 
    																$pagatoil = $row['pagatoil'];				 
     																$modalitapagamento = $row ['modalitapagamento'];
    					 											$fattura = $row['fattura'];
    																$numfattura = $row['numfattura'];							
    																$datafattura  =$row['datafattura'];							
    														 
     															}
																
															}
														}	


													}
		


												?>




<div class="col-md-6">
  <div class="panel panel-default">
	<div class="panel-body">
    	<h1 class="h3">Dati registrazione</h1>
    </div>
    <div class="panel-footer">
   <section class="panel-body">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group" >
                <label class="" for="first-name">Nome:</label>
                <input type="text" class="form-control" required="required" id="inputFName" value="<?php echo !empty($fname)?$fname:''; ?>">
                 <label><span>(richiesto)</span></label><a name="codfiscale"></a></label>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group ">
                <label class="" for="last-name">Cognome:</label>
                <input type="text" class="form-control" required="required" id="lname" value="<?php echo !empty($lname)?$lname:''; ?>" name="lname" placeholder="Cognome">
	              <label><span>(richiesto)</span></label><a name="codfiscale"></a></label>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group ">
                <label class="" for="username">Username</label>
                <div class="input-group">
                  <div class="input-group-addon">@</div>
                  <input type="text" class="form-control" required="required" id="username" value="<?php echo !empty($username)?$username:''; ?>" name="username" placeholder="Username">
	             </div>
                  <label><span>(richiesto)</span></label><a name="codfiscale"></a></label>
               
              </div>
            </div>
          </div>
		<div class="row">
            <div class="col-md-4">
              <div class="form-group" >
                <label class="" for="first-name">Codice Fiscale:<span>(richiesto)</span><a name="codfiscale"></a></label>
                <input type="text" class="form-control" required id="codfiscale" value="<?php echo !empty($codfiscale)?$codfiscale:'000'; ?>" name="codfiscale" placeholder="CodiceFiscale">
              </div>
            </div>

<?php 
	if($user_level== 1 || $user_level == 4) { ?>
            <div class="col-md-4">
              <div class="form-group ">
                <label for="partitaiva">PartitaIva: <span>(richiesto)</span><a name="partitaiva"></a></label>
	<input type="text" class="form-control" required="required" id="partitaiva" value="<?php echo !empty($partitaiva)?$partitaiva:'000'; ?>" name="partitaiva" placeholder="Partita Iva">
              </div>
            </div>

<?php } ?>
            <div class="col-md-4">
              <div class="form-group ">
                <label for="datanascita">Data Nascita: <span>(richiesto)</span><a name="datanascita"></a></label><br />
				<input type="text" id="datanascita" value="<?php echo !empty($datanascita)?$datanascita:''; ?>" name="datanascita" placeholder="Data Nascita" />
               
              </div>
            </div>
          </div>	

		


<div class="form-group has-feedback"> 
	<label for="email">Email:</label>
	<input type="text" class="form-control" required="required" id="email" value="<?php echo !empty($email)?$email:''; ?>" name="email" placeholder="Email">
</div>

</div>
</div>
</div>
<!-- END Dati registrazione -->


<!-- DATi PERSONALI -->
												
<div class="col-md-6" >
	<div class="panel panel-default">
		<div class="panel-body">
    		<h1 class="h3">Dati Personali</h1>
    	</div>
    <div class="panel-footer">
   <section class="panel-body">
          <div class="row">
			<div class="col-md-4">
            	<div class="form-group ">
                	<label for="via">Via: <span>(richiesto)</span><a name="via"></a></label>
					<input type="text" class="form-control" required="required" id="via" value="<?php echo !empty($via)?$via:''; ?>" name="via" placeholder="via">
            	</div>
          	</div>

		<div class="col-md-4">
			<div class="form-group">		
				<label for="civico">Num.Civico: <span>(richiesto)</span><a name="civico"></a></label>
				<input type="text" maxlength="4" size="4" class="form-control" required="required" id="civico" value="<?php echo !empty($civico)?$civico:''; ?>" name="civico" placeholder="numero civico" >
			</div>
		</div>

		<div class="col-md-4">
			<div class="form-group">		
				<label for="cap">Cap: <span>(richiesto)</span><a name="cap"></a></label>
				<input type="text" class="form-control" required="required" id="cap" value="<?php echo !empty($cap)?$cap:''; ?>" name="cap" placeholder="cap">
			</div>
		</div>

	<div class="col-md-4">
		<div class="form-group">
		<?php

    							$table_name = $prefix . "provincie";
								$column_name = "";

								$query = "SELECT * FROM " . $table_name .' ORDER BY comune ASC; ' ;

								echo "<label for='regioni'>Comune:</label><br />";
								echo '<select id="regioni" class="showcase themes select-theme-default" placeholder="">';
								$result = $mysqli->query($query);

								if($result) 
								{
									while($row = mysqli_fetch_assoc($result)){
										echo '<option value=' . $row['provincia'] . '>' .$row['comune'] .'</option>';	

									}
								}


   	 							echo "</select>";

    				?>
    		
				
			<!--<label for="comune">Comune: <span>(richiesto)</span><a name="comune"></a></label>
			<input type="text" class="form-control" required="required" id="comune" value="<?php echo !empty($comune)?$comune:''; ?>" name="comune" placeholder="comune"> -->
		</div>
	</div>


	
	<div class="col-md-4">
		<div class="form-group">
			
				<?php

    							$table_name = $prefix . "provincie";
								$column_name = "";

								$query = "SELECT * FROM " . $table_name .' ORDER BY provincia ASC; ' ;

								echo "<label for='regioni'>Provincia di:</label><br />";
								echo '<select id="regioni" class="" placeholder="" style="margin-left:15px;">';					
								$result = $mysqli->query($query);

								if($result) 
								{
									while($row = mysqli_fetch_assoc($result)){
										echo '<option value=' . $row['provincia'] . '>' .$row['provincia'] .'</option>';	

									}
								}


   	 							echo "</select>";

    				?>
			</select>
		<!--		
			<label for="provincia">Provincia: <span>(richiesto)</span><a name="provincia"></a></label>
			<input type="text" class="form-control" required="required" id="provincia" value="<?php echo !empty($provincia)?$provincia:''; ?>" name="provincia" placeholder="provincia"> -->
		</div>
	</div>
<div class="col-md-2" style="boder:1px solid red;">
		<div class="form-group" style="boder:1px solid red;">
		<?php 

			$table_name = $prefix . "profile_complete";
			$column_name = "sesso";

			$query = "SELECT COLUMN_TYPE  FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = '$table_name' AND COLUMN_NAME = '$column_name'";
	
			echo "<label for='sesso'>Sesso:</label><br />";
			echo "<select name=\"$column_name\" id='sesso'>";

			$result = $mysqli->query($query);

			$row = $result->fetch_assoc();
				$enumList = explode(",", str_replace("'", "", substr($row['COLUMN_TYPE'], 5, (strlen($row['COLUMN_TYPE'])-6))));

			foreach($enumList as $value)
			{
				echo "<option value=\"$value\">$value</option>";
			}
   	 			

   	 		echo "</select>";
		?>
		</div>
	</div>
	<div class="col-md-4">
		<div class="form-group ">
			<label for="professione">Professione:<span>(richiesto)</span><a name="datanascita"></a></label>
			<input type="text" class="form-control" required="required" id="professione" value="<?php echo !empty($professione)?$professione:''; ?>" name="professione" placeholder="professione">
		</div>
	</div>
<div class="col-md-3">
		<div class="form-group ">
			<label for="telefono">Telefono: <span>(richiesto)</span><a name="phone"></a></label>
			<input type="text" class="form-control" required="required" id="phone" value="<?php echo !empty($phone)?$phone:''; ?>" name="phone" placeholder="telefono">
		</div>
	</div>

	<div class="col-md-4">
		<div class="form-group ">
			<label for="mobile">Mobile: <span>(richiesto)</span><a name="inputMobile"></a></label>
			<input type="text" class="form-control" required="required" id="inputMobile" value="<?php echo !empty($mobile)?$mobile:''; ?>" name="mobile" placeholder="phone">
		</div>
	</div>

	
</div>

</div>
</div>
</div>

<div class="col-md-12">
<div class="col-md-6" style="">
	<div class="panel panel-default">
		<div class="panel-body">
    		<h1 class="h3">Dati Economici</h1>
    	</div>
    <div class="panel-footer">
   <section class="panel-body">
          <div class="row">
			<div class="col-md-4">
            	<div class="form-group ">
            		<label for="iban">IBAN: <span>(richiesto)</span><a name="iban"></a></label></label>
					<input type="text" class="form-control" required="required" id="iban" value="<?php echo !empty($iban)?$iban:''; ?>" name="iban" placeholder="IT60X0542811101000000123456">
				</div>
          	</div>
			<div class="col-md-4">
            	<div class="form-group ">
					<label for="numerocartacredito">Carta Credito: <span>(richiesto)</span><a name="numerocartacredito"></a></label></label>
					<input type="text" class="form-control" required="required" id="numerocartacredito" value="<?php echo !empty($numerocartacredito)?$numerocartacredito:''; ?>" name="numerocartacredito" placeholder="4222222222222">
				</div>
			</div>


		
	
	

	
</div>

</div>
</div>


</div>
<div class="col-md-6" style="">

	<div class="panel panel-default">
		<div class="panel-body">
    		<h1 class="h3">Socio UISP</h1>
    	</div>
    <div class="panel-footer">
   <section class="panel-body">
          <div class="row">
			<div class="col-md-4">
            	<div class="form-group ">
					<label for="numuisp">Num UISP: <span>(richiesto)</span><a name="numerocartacredito"></a></label></label>
					<input type="text" class="form-control" id="numuisp" value="<?php echo !empty($numuisp)?$numuisp:''; ?>" name="numuisp" placeholder="numero uisp">
				</div>
			</div>
		
		<div class="col-md-4">
      		<div class="form-group ">
		<label for="datarilascio">Data Rilascio: <span>(richiesto)</span><a name="numerocartacredito"></a></label></label>
		<input type="text" class="form-control" id="datarilascio" value="<?php echo !empty($datarilascio)?$datarilascio:''; ?>" name="datarilascio" placeholder="data rilascio">
		</div>
	</div>


<div class="col-md-2">
      		<div class="form-group ">
      			<label for='certificatomedico'>Cert.medico:</label><br />
      			<input type="text" class="form-control" id="certificatomedico" value="<?php if($certificatomedico ==''||$certificatomedico == 0){echo 'No';}else{echo 'Si';} ?>" name="certificatomedico" placeholder="certificato medico">


	</div>
</div>
</div>

<div class="row">
<div class="col-md-4">
      		<div class="form-group ">
		<label for="datarilasciomedico">Data Rilascio Medico: <span>(richiesto)</span><a name="numerocartacredito"></a></label></label>
		<input type="text" class="form-control" id="datarilasciomedico" value="<?php echo !empty($datarilasciomedico)?$datarilasciomedico:''; ?>" name="datarilasciomedico" placeholder="data rilascio">
		</div>
	</div>

<div class="col-md-4">
      		<div class="form-group ">
		<label for="prezzotessera">Prezzo Tessera: <span>(richiesto)</span><a name="numerocartacredito"></a></label></label></label>
		<input type="text" class="form-control" id="prezzotessera" value="<?php echo !empty($prezzotessera)?$prezzotessera:''; ?>" name="prezzotessera" placeholder="Prezzo Tessera">
		</div>
	</div>
	
	<div class="col-md-4">
      		<div class="form-group ">
		<label for="pagatoil">Pagato il: <span>(richiesto)</span><a name="numerocartacredito"></a></label></label></label>
		<input type="text" class="form-control" id="pagatoil" value="<?php echo !empty($pagatoil)?$pagatoil:''; ?>" name="pagatoil" placeholder="Pagato il">
		</div>
	</div>

<div class="col-md-4">
	<div class="form-group ">
<?php 

	$table_name = $prefix . "profile_complete";
	$column_name = "modalitapagamento";

	$query = "SELECT COLUMN_TYPE  FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = '$table_name' AND COLUMN_NAME = '$column_name'";
	
		echo "<label for='modalitapagamento'>Modalita pagamento:</label><br />";
		echo "<select name=\"$column_name\" id='modalitapagamento'>";

			$result = $mysqli->query($query);

	$row = $result->fetch_assoc();
		$enumList = explode(",", str_replace("'", "", substr($row['COLUMN_TYPE'], 5, (strlen($row['COLUMN_TYPE'])-6))));

	foreach($enumList as $value)
	   	 echo "<option value=\"$value\">$value</option>";

	echo "</select>	<span class='help-block'></span>";

?>
</div>
</div>

<div class="col-md-4">
	<div class="form-group ">
		<label for="numfattura">Fattura Num: <span>(richiesto)</span><a name="numerocartacredito"></a></label></label></label>
		<input type="text" class="form-control" id="numfattura" value="<?php echo !empty($numfattura)?$numfattura:''; ?>" name="numfattura" placeholder="Fattura">
	</div>
</div>

<div class="col-md-4">
	<div class="form-group ">
		<label for="datafattura">Data Fattura: <span>(richiesto)</span><a name="numerocartacredito"></a></label></label></label>
		<input type="text" class="form-control" id="datafattura" value="<?php echo !empty($datafattura)?$datafattura:''; ?>" name="datafattura" placeholder="Fattura">
	</div>
</div>

		</div>
	</div>

	
</div>

</div>
</div>
</div> 

<!--
<form method="POST" action="edit-user.php" id="edit-form">
<div class="container">
<div class="col-sm-12">
<div class="row">
<h3></h3>

</div>	
</div>
</div>-->






        																	</form>
  
													<!-- SIMULATE PAYMENT - REMOVE ME FOR PRODUCTION-->
													
											</div>
										</div>
									</div>
									<!-- End Panel -->
								</div>
							</div>
            </div>
        </div>
        <!-- End Page Content -->

	</div><!-- End Main Wrapper  -->
   
  <!-- jQuery -->
 <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <!-- Bootstrap -->
  <script src="assets/js/bootstrap.min.js"></script>
  <!-- Base Theme JS -->
  <script src="assets/js/base.js"></script>
	<!-- SweetAlert -->

	<script src="assets/js/plugins/sweetalert.min.js"></script>
	<!-- Datatables -->
	<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
	
	<script src="http://jqueryvalidation.org/files/dist/jquery.validate.min.js"></script>
    <script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>
    

    <!-- Load jQuery UI Main JS  -->

    <!-- Load jQuery UI Main JS  -->
    
    <script src="assets/js/reg-edit-validate.js"></script>
    <script src="assets/js/tether.min.js"></script>
	<script src="assets/js/select.min.js"></script>
	
	<!--<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.3/angular.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.3/angular-touch.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.3/angular-animate.js"></script>
    <script src="http://ui-grid.info/docs/grunt-scripts/csv.js"></script>
    <script src="http://ui-grid.info/docs/grunt-scripts/pdfmake.js"></script>
    <script src="http://ui-grid.info/docs/grunt-scripts/vfs_fonts.js"></script>
	<script src="https://cdn.rawgit.com/angular-ui/bower-ui-grid/master/ui-grid.min.js"></script> 
	<script> 
		var app = angular.module('app', ['ngTouch', 'ui.grid']);
 
		app.controller('MainCtrl', ['$scope', function ($scope) {
 
  		$scope.myData = [
    	{
        	"firstName": "Cox",
        	"lastName": "Carney",
        	"company": "Enormo",
        	"employed": true
    	},
    	{
        	"firstName": "Lorraine",
        	"lastName": "Wise",
        	"company": "Comveyer",
        	"employed": false
    	},
    	{
        	"firstName": "Nancy",
	        "lastName": "Waters",
    	    "company": "Fuelton",
        	"employed": false
    	}
	];
}]);


	</script> -->
	<!--<script src="assets/js/select2.js"></script>
	<script>
        $(document).ready(function() { 
            $("#regioni").select2({
                    placeholder: "Comune",
                    allowClear: true
             }); 
        });

	</script> -->
	
</body>
</html>
