<?php 
//PROTECT THIS PAGE - REQUIRE LOGIN TO ACCESS
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
											<div class="panel-heading panel-warning">
												<span class="title">Renew/Activate Account</span>
											</div>
											<div class="panel-content">
												<h4>Pay for your membership (include your payment gateway here, such as PayPal)</h4>
												<br><br>
													<!-- THIS IS AN EXAMPLE PAYPAL FORM THAT YOU COULD USE, 
													IN PRODUCTION YOU WILL WANT TO USE PAYPAL IPN OR SIMLIAR SERVICE 
													FOR YOUR GATEWAY TO VERIFY PAYMENTS AND CANCELLATIONS -->
													<form name="_xclick" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
														<input type="hidden" name="cmd" value="_xclick<?php if($one_time!='1'){echo'-subscriptions';}?>">
														<input type="hidden" name="business" value="me@mybusiness.com">
														<input type="hidden" name="currency_code" value="USD">
														<input type="hidden" name="item_name" value="<?php echo $plan_title;?>">
														<?php if($one_time=='1'){?>
														<input type="hidden" name="amount" value="<?php echo $membership_cost;?>">
														<?php }else{?>
														<input type="hidden" name="a1" value="<?php echo $trial_cost;?>">
														<input type="hidden" name="p1" value="<?php echo $trial_period;?>">
														<input type="hidden" name="t1" value="D">
														<input type="hidden" name="a3" value="<?php echo $membership_cost;?>">
														<input type="hidden" name="p3" value="<?php echo $reoccur_unit; // 1, 2, 3...?>">
														<input type="hidden" name="t3" value="<?php echo $reoccurs; // D = Daily, W = Weekly....?>">
														<?php }?>
														<input type="hidden" name="custom" value="<?php echo $user_id;?>">
														<input type="hidden" name="notify_url" value="http://yourdomain.com/login-pro/data/paypal-ipn-example.php">
														<input type="image" src="https://www.paypalobjects.com/webstatic/en_US/btn/btn_checkout_pp_142x27.png" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
													</form>
													<!-- SIMULATE PAYMENT - REMOVE ME FOR PRODUCTION-->
													<form method="post" action="data/mark-paid-indash">
														<input type="hidden" name="custom" value="<?php echo $user_id;?>">
														<div class="control-group">
															<div class="controls">
															<input type="submit" class="btn btn-primary btn-block login-btn" value="Simulate Payment">
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
        </div>
        <!-- End Page Content -->

	</div><!-- End Main Wrapper  -->
   
  <!-- jQuery -->
  <script src="assets/js/jquery.js"></script>

  <!-- Bootstrap -->
  <script src="assets/js/bootstrap.min.js"></script>
  <!-- Base Theme JS -->
  <script src="assets/js/base.js"></script>
	<!-- SweetAlert -->
	<script src="assets/js/plugins/sweetalert.min.js"></script>
	<!-- Datatables -->
	<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
	
</body>
</html>
