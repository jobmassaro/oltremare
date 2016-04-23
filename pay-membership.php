<?php include('auth/db-connect.php');
include_once('auth/access-functions.php');
include('data/data-functions.php');
include('data/visitor-stats-log.php');
secure_session_start(); 
//SITE SETTINGS
list($meta_title, $meta_description, $site_title, $site_email, $site_logo) = all_settings();
//RETRIEVE PLAN SETTINGS
$plan_id = $_SESSION['new_member_plan_id'];
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
//NEW USER ID - PASS THIS INTO A CUSTOM INPUT FIELD SO YOU CAN MARK AN ACCOUNT AS ACTIVE
$new_member_id = $_SESSION['new_member_id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo $meta_description;?>">
    <meta name="author" content="">

    <title><?php echo $site_title;?></title>

    <!-- Bootstrap Core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="assets/css/base.css" rel="stylesheet">
		<link href="assets/css/login.css" rel="stylesheet">
		<link href="assets/fonts/css/fa.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Page Content -->
    <div class="container">
			
        <div class="row">
						<div class="col-sm-12 col-md-6 col-md-offset-3">
							<div class="form-horizontal login-form">

							<fieldset>

									<img src="assets/logos/<?php echo $site_logo;?>" style="width:50%;"><br>
											
										<h4>Pay for your membership (include your payment gateway here, such as PayPal)</h4>
											<br><br>
											<!-- THIS IS AN EXAMPLE PAYPAL FORM THAT YOU COULD USE, 
											IN PRODUCTION YOU WILL WANT TO USE PAYPAL IPN OR SIMLIAR SERVICE 
											FOR YOUR GATEWAY TO VERIFY PAYMENTS AND CANCELLATIONS -->
											<form name="_xclick" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" style="text-align:center;">
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
												<input type="hidden" name="custom" value="<?php echo $new_member_id;?>">
												<input type="hidden" name="notify_url" value="http://yourdomain.com/login-pro/data/paypal-ipn-example.php">
												<input type="image" src="https://www.paypalobjects.com/webstatic/en_US/btn/btn_checkout_pp_142x27.png" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
											</form>
											<!-- SIMULATE PAYMENT - REMOVE ME FOR PRODUCTION-->
											<form method="post" action="data/mark-paid">
												<input type="hidden" name="custom" value="<?php echo $new_member_id;?>">
												<div class="control-group">
													<div class="controls">
													<input type="submit" class="btn btn-primary btn-block login-btn" value="Simulate Payment">
													</div>
												</div>
											</form>
							</fieldset>
							</div>
            </div>
        </div>
    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="assets/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="assets/js/bootstrap.min.js"></script>

</body>

</html>
