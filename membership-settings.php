<?php 
//PROTECT THIS PAGE - REQUIRE LOGIN TO ACCESS
include('auth/protect.php');
//REDIRECT IF NOT ADMIN LEVEL 1 USER
if($user_level!='1'){header('Location: dashboard');}

include('data/data-functions.php');
include('lang/translate.php');
include('data/visitor-stats-log.php');
//SITE SETTINGS
list($meta_title, $meta_description, $site_title, $site_email, $site_logo) = all_settings();
list($public_reg, $require_cap, $require_email, $require_terms, $default_level, $min_password, $redirect_login, $redirect_logout, $gc_key) = rl_settings();
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
											<span class="title"><?php echo $lang['ADD_MEMBERSHIP'];?></span>
										</div>
										<div class="panel-content">
											<div>
												<form class="form-horizontal" method="post" action="data/add-membership">
													<fieldset>
													<div class="control-group">
														<label class="col-lg-2 control-label" for="">Membership Name</label>
														<div class="col-lg-10 controls">
															<input id="" name="title" type="text" placeholder="Bronze Plan" class="settings-input input-large" style="width:150px;">
														</div>
													</div>	
													<div class="control-group">
														<label class="col-lg-2 control-label" for="">Trial Period</label>
														<div class="col-lg-10 controls">
															<input id="" name="trial_period" type="number" placeholder="30" class="settings-input input-large" style="width:150px;"> (# of days - set to 0 for no trial)
														</div>
													</div>	
													<div class="control-group">
														<label class="col-lg-2 control-label" for="">Trial Cost</label>
														<div class="col-lg-10 controls">
															<input id="" name="trial_cost" type="number" step="any" placeholder="1.99" class="settings-input input-large" style="width:150px;"> (set to 0 for free)
														</div>
													</div>
													<div class="control-group">
														<label class="col-lg-2 control-label" for="">Membership Cost</label>
														<div class="col-lg-10 controls">
															<input id="" name="membership_cost" type="number" step="any" placeholder="19.99" class="settings-input input-large" style="width:150px;"> (set to 0 for free)
														</div>
													</div>	
													<div class="control-group">
														<label class="col-lg-2 control-label" for="">Memembership Reoccurs</label>
														<div class="col-lg-10 controls">
															<select class="settings-input" name="recurring_period" style="width:150px;">
																<option value="0">Never, One-time Fee</option>
																<option value="daily">Daily</option>
																<option value="weekly">Weekly</option>
																<option value="biweekly">Bi-Weekly</option>
																<option value="monthly">Monthly</option>
																<option value="quarterly">Quarterly</option>
																<option value="semi-annually">Semi-Annually</option>
																<option value="annually">Annually</option>
															</select>
														</div>
													</div>	
													<div class="control-group">
														<label class="col-lg-2 control-label" for="">Assigned User Level</label>
														<div class="col-lg-10 controls">
															<select class="settings-input" name="user_level" style="width:150px;">
																<?php permission_select();?>
															</select>
														</div>
													</div>		
													
													<div class="control-group">
														<label class="col-lg-2 control-label" for=""></label>
														<div class="col-lg-10 controls">
														<input type="submit" class="settings-input  btn btn-success" value="Add Membership">
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
											<span class="title">
												<?php echo $lang['MEMBERSHIP_PLANS'];?>
											</span>
										</div>
										
										<div class="panel-content">
											<div>
												<div id="status"></div>
												<table id="memberships" class="row-border" cellspacing="0" width="100%">
												<thead>
													<tr>
														<th><?php echo $lang['NAME'];?></th>
														<th><?php echo $lang['TRIAL_PERIOD'];?></th>
														<th><?php echo $lang['TRIAL_COST'];?></th>
														<th><?php echo $lang['MEMBERSHIP_COST'];?></th>
														<th><?php echo $lang['RECURRING'];?></th>
														<th><?php echo $lang['USER_LEVEL'];?></th>
														<th><?php echo $lang['FEATURES'];?></th>
														<th><?php echo $lang['ACTION'];?></th>
													</tr>
												</thead>

												<tbody>
													<?php membership_plans_table(); ?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
								<!-- End Panel -->
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
	$(document).ready(function() {
    $('#memberships').DataTable();
	} );	
	<?php 
	if(isset($_SESSION['action_updated'])){ echo 'swal("Good Job", "Your membership plan has been updated", "success")';}
	unset($_SESSION['action_updated']);
	if(isset($_SESSION['action_deleted'])){ echo 'swal("Removed!", "Your membership plan has been deleted", "success")';}
	unset($_SESSION['action_deleted']);
	?>	
	</script>

</body>
</html>
