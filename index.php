<?php include('auth/db-connect.php');
include('auth/register.php');
include('data/data-functions.php');
include('data/visitor-stats-log.php');
list($public_reg, $require_cap, $require_email, $require_terms, $default_level, $min_password, $require_plans, $gc_key) = registration_settings();
//SITE SETTINGS
list($meta_title, $meta_description, $site_title, $site_email, $site_logo) = all_settings();
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
	
	<link href="assets/css/login.css" rel="stylesheet"> 
	<!--<link href="assets/fonts/css/fa.css" rel="stylesheet"> -->
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/form-elements.css">
    <link href="assets/css/style.css" rel="stylesheet">

    
   

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
     <div class="row" style="margin-top:-85px;">
             <?php include 'common/nav.php'; ?>
         </div>
	<!-- Page Content -->
    <div class="container">

      
         <div class="row">
            <!--<div class="col-lg-3">
				<!--<?php //include 'login-home.php'; ?>-->
				<!--<img src="assets/img/iphone1.png" alt="">-->
		<!--	</div>-->
			<div class="col-md-12" style="margin-top:-50px;" >
            		<?php include 'nregistration-home.php'; ?>		
					<?php if($public_reg=='1'){?>
							<!--<div class="signup-description">
								<h1><i class="fa fa-help-circled"></i> Why Join our Awesome Website?</h1>
								<ul>
									<li><i class="fa fa-ok-circled2"></i> It's Completely 100% free to join now!<li>
									<li><i class="fa fa-ok-circled2"></i> JQuery and Server form Validations<li>
									<li><i class="fa fa-ok-circled2"></i> Includes an easy installer for fast setup!<li>
									<li><i class="fa fa-ok-circled2"></i> Password Reset, Inactivity Auto-Logoff and More<li>
									<li><i class="fa fa-ok-circled2"></i> Membership Plans / Dynamic Pricing Tables<li>
								</ul>
								<div class="signup-arrow">
									<i class="fa fa-reply"></i>
								</div>
								<br>
							</div> -->
							<?php } ?>
            </div>
           <!-- <div class="col-lg-3">
                
            </div>-->
        </div>
    </div>
    <!-- /.container -->
<?php include 'common/footer.php'; ?>
   
    
