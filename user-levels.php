<?php 
//PROTECT THIS PAGE - REQUIRE LOGIN TO ACCESS
include('auth/protect.php');
//REDIRECT IF NOT ADMIN LEVEL 1 USER
if($user_level!='1'){header('Location: dashboard');}

//REQUIRED FUNCTIONS FOR LOGIN PRO ADMIN PANEL
include('data/data-functions.php');
include('lang/translate.php');
//SITE SETTINGS
list($meta_title, $meta_description, $site_title, $site_email, $site_logo) = all_settings();
list($public_reg, $require_cap, $require_email, $require_terms, $default_level, $min_password, $redirect_login, $redirect_logout) = rl_settings();
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
		<!-- Datatables Plugin -->
		<link href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.css" rel="stylesheet" media="all">
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
											<span class="title"><?php echo $lang['ADD_PERMISSION_LEVELS'];?></span>
										</div>
										<div class="panel-content">
											<div>
												<form class="form-horizontal" method="post" action="data/add-permission-level">
													<fieldset>
													<div class="control-group">
														<label class="col-lg-2 control-label" for="">Name</label>
														<div class="col-lg-10 controls">
															<input id="" name="lname" type="text" class="settings-input input-large" placeholder="Specialists" style="width:105px;">
														</div>
													</div>
													<div class="control-group">
														<label class="col-lg-2 control-label" for="">Level</label>
														<div class="col-lg-10 controls">
															<input id="" name="level" placeholder="3" type="number" class="settings-input input-large" value="<?php echo $suggested_level;?>" style="width:105px;">
															<?php if($_GET['e']=='1'){echo '<span class="red">User Level already exists.  Try a different level.</span>';}?>
														</div>
													</div>	
													<div class="control-group">
														<label class="col-lg-2 control-label" for="">Redirect after Login </label>
														<div class="col-lg-10 controls">
															<input id="" name="redirect_login" type="text" placeholder="" class="settings-input input-large" value="<?php echo $redirect_login;?>" style="width: 50%;">
															<span class="help">(leave blank to use default)</span>
														</div>
													</div>
													<div class="control-group">
														<label class="col-lg-2 control-label" for=""></label>
														<div class="col-lg-10 controls">
														<input type="submit" class="settings-input  btn btn-success" value="<?php echo $lang['ADD_LEVEL'];?>">
														</div>
													</div>	
												</form>
											</div>	
									</div>
								</div>
								<!-- End Panel -->
							</div>
            </div>
						<div class="row">
					<!-- Start Panel -->
						<div class="col-lg-12">
							<div class="panel">
								<div class="panel-heading panel-primary">
									<span class="title"><?php echo $lang['PERMISSION_LEVELS'];?></span>
									</div>
								<div class="panel-content">
									<?php if($_GET['e']=='2'){echo '<span class="red">Changes have not been made.  User Level already exists.</span>';}?>
										<div id="status"></div>
										<table id="user-level" class="row-border" cellspacing="0" width="100%">
										<thead>
											<tr>
												<th><?php echo $lang['NAME'];?></th>
												<th><?php echo $lang['LEVEL'];?></th>
												<th><?php echo $lang['REDIRECT_LOGIN'];?></th>
												<th><?php echo $lang['NUMBER_OF_USERS'];?></th>
												<th><?php echo $lang['ACTION'];?></th>
											</tr>
										</thead>

										<tbody>
											<?php permission_levels_table($language); ?>
										</tbody>
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
   
  <!-- jQuery -->
  <script src="assets/js/jquery.js"></script>
	<!-- Base JS -->
  <script src="assets/js/base.js"></script>
  <!-- Bootstrap -->
  <script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/bootstrap-switch.min.js"></script>
	<!-- SweetAlert -->
	<script src="assets/js/plugins/sweetalert.min.js"></script>
	<!-- Datatables -->
	<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
	
	<script>
	$(document).ready( function() {
    $('#user-level').dataTable({
        /* Disable initial sort */
        "aaSorting": []
    });
	});	
	<?php 
	if(isset($_SESSION['action_saved'])){ echo 'swal("Added!", "User Permission Level has been added!", "success")';}
	unset($_SESSION['action_saved']);
	if(isset($_SESSION['action_updated'])){ echo 'swal("Saved!", "User Permission Level has been saved!", "success")';}
	unset($_SESSION['action_updated']);
	if(isset($_SESSION['action_deleted'])){ echo 'swal("Removed!", "User Permission Level has been deleted!", "success")';}
	unset($_SESSION['action_deleted']);
	?>	
	</script>

</body>
</html>
