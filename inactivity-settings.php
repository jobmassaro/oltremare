<?php 
//PROTECT THIS PAGE - REQUIRE LOGIN TO ACCESS
include('auth/protect.php');
//REDIRECT IF NOT ADMIN LEVEL 1 USER
if($user_level!='1'){header('Location: dashboard');}

include('data/data-functions.php');
include('lang/translate.php');
//SITE SETTINGS
list($meta_title, $meta_description, $site_title, $site_email, $site_logo) = all_settings();
list($timeout_enabled, $warning_title, $warning_message, $inactivity_timer, $inactivity_warning)= inactivity_settings();
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
		<link href="assets/css/bootstrap-switch.min.css" rel="stylesheet" media="all">
    <!-- Custom CSS -->
   	<link href="assets/css/base.css" rel="stylesheet">
	
		<!-- Elusive and Font Awesome Icons -->
    <link href="assets/fonts/css/elusive.css" rel="stylesheet">
		<link href="assets/fonts/css/fa.css" rel="stylesheet">
		<!-- Webfont -->
		<link href='http://fonts.googleapis.com/css?family=Archivo+Narrow:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
		<!-- SweetAlert Plugin -->
		<link href="assets/css/plugins/sweetalert.css" rel="stylesheet" media="all">
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
							<div class="row">
							<!-- Start Panel -->
								<div class="col-lg-12">
									<div class="panel">
										<div class="panel-heading panel-primary">
											<span class="title"><?php echo $lang['INACTIVITY_SETTINGS'];?></span>
										</div>
										<div class="panel-content">
											<div>
												<form class="form-horizontal" method="post" action="data/update-inactivity-settings">
													<fieldset>
													<div class="control-group">
														<div class="settings-toggle controls">
															<label class="col-lg-2 control-label" for=""><?php echo $lang['INACTIVITY_TIMEOUT'];?> <br><span class="small">(auto logout if inactive)</span></label> 
															<input type="checkbox" name="timeout_enabled" value="1" data-on-color="success" data-off-color="danger" <?php if($timeout_enabled=='1'){echo 'checked';}?>>
														</div>
													</div>
													<div class="control-group">
														<label class="col-lg-2 control-label" for=""><?php echo $lang['TIMEOUT_TIMER'];?></label>
														<div class="col-lg-10 controls">
															<input id="" name="inactivity_timer" type="number" placeholder="" class="settings-input input-large" value="<?php echo $inactivity_timer;?>" style="width:105px;"> (in seconds)
														</div>
													</div>	
													<div class="control-group">
														<label class="col-lg-2 control-label" for=""><?php echo $lang['WARNING_TIMER'];?></label>
														<div class="col-lg-10 controls">
															<input id="" name="inactivity_warning" type="text" placeholder="" class="settings-input input-large" value="<?php echo $inactivity_warning;?>" style="width:105px;"> (in seconds)
														</div>
													</div>
													<div class="control-group">
														<label class="col-lg-2 control-label" for=""><?php echo $lang['WARNING_TITLE'];?></label>
														<div class="col-lg-10 controls">
															<input id="" name="warning_title" type="text" placeholder="" class="settings-input input-large" value="<?php echo $warning_title;?>" style="width:50%;">
														</div>
													</div>
													<div class="control-group">
														<label class="col-lg-2 control-label" for=""><?php echo $lang['WARNING_MESSAGE'];?></label>
														<div class="col-lg-10 controls">
															<input id="" name="warning_message" type="text" placeholder="" class="settings-input input-large" value="<?php echo $warning_message;?>" style="width:50%;">
														</div>
													</div>	
													<div class="control-group">
														<label class="col-lg-2 control-label" for=""></label>
														<div class="col-lg-10 controls">
														<input type="submit" class="settings-input  btn btn-success" value="Save Settings">
														</div>
													</div>	
												</form>
											</div>	
									</div>
								</div>
								<!-- End Panel -->
							</div>
            </div>
        </div>
        <!-- End Page Content -->

		</div><!-- End Main Wrapper  -->
   
		<!-- jQuery -->
		<script src="assets/js/jquery.js"></script>
		<!-- Base JS -->
		<script src="assets/js/base.js"></script>
		<!-- Bootstrap -->
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/bootstrap-switch.min.js"></script>
		<!-- SweetAlert -->
		<script src="assets/js/plugins/sweetalert.min.js"></script>
		<script>
		$("[name='timeout_enabled']").bootstrapSwitch();
		<?php 
		if(isset($_SESSION['action_saved'])){ echo 'swal("Cool!", "Your settings have been saved!", "success")';}
		unset($_SESSION['action_saved']);
		?>	
		</script>

</body>
</html>
