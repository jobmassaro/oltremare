<?php 
//PROTECT THIS PAGE - REQUIRE LOGIN TO ACCESS
include('auth/protect.php');
include('data/data-functions.php');
include('lang/translate.php');
if($user_level!='1'){include('data/visitor-stats-log.php');}
//SITE SETTINGS
list($meta_title, $meta_description, $site_title, $site_email, $site_logo) = all_settings();
list($timeout_enabled, $warning_title, $warning_message, $inactivity_timer, $inactivity_warning)= inactivity_settings();
?>
<!DOCTYPE html>
<html lang="it">

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
 		<link type="text/css" rel="stylesheet" href="assets/css/plugins/jquery-ui-1.10.0.custom.css"/>
 		<link href="assets/css/FooTable.css"  rel="stylesheet" type="text/css" />
 		<link href="assets/css/dashboard.css" rel="stylesheet" type="text/css" />
 		  <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/angular_material/1.0.0/angular-material.min.css">
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
							<?php // CHECK IF ACCOUNT STATUS IS ACTIVE
							if(empty($status) || $status!='active'){ ?>
																									
								

									

							<?php }else{ ?>
							
								<?php if($user_level=='1'){
								include('assets/comp/stat-boxes.php');?>
								<div class="row">
								<!-- Start Panel -->
									<div class="col-lg-6">
										<div class="panel">
											<div class="panel-content">
												<?php  include("todolist/index.php"); ?>
											</div>
										</div>
									</div>
									<!-- End Panel -->
									<!-- Start Panel -->
									<div class="col-lg-6">
										<div class="panel">
											<div class="panel-content">
												<label for="income" style="width:100%;" >Traffic History<br />
												<canvas id="income" style="width:100%;" height="150"></canvas>
												</label>
											</div>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="panel">
											<div class="panel-content">
												<label for="dt" style="width:100%;">Device Type Breakdown<br />
												<canvas id="dt" style="width:100%;" height="150"></canvas>
												</label>
											</div>
										</div>
									</div>
									
										
									<!-- End Panel -->
								</div>
								<?php } ?>

								<!-- USER -->

								<?php 
									if($user_level=='2')
									{
										include 'members/user.php';
									}
								?>

								<?php 
									if($user_level=='3')
									{
										include 'members/tutor.php';
									}
								?>	
								<?php 
									if($user_level=='3')
									{
										include 'members/fornitore.php';
											
									 }
								?>									

									<!-- End Panel -->
									<!-- Start Panel -->
								
								<?php } //SHOW ALL CONTENT BEFORE IF ACCOUNT IS IN AN ACTIVE STATUS EXAMPLE ?>
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
	<!-- Charts -->
	<script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.js"></script>
	<?php if($timeout_enabled=='1'){?>
	<!-- Inactivity Timeout Functions -->
	<script src="assets/js/plugins/jquery-ui-1.10.0.custom.min.js" type="text/javascript"></script>
	<script src="assets/js/plugins/store.min.js" type="text/javascript"></script>
  <script src="assets/js/plugins/jquery-idleTimeout.min.js" type="text/javascript"></script>

  
	<script type="text/javascript" charset="utf-8">
    $(document).ready(function (){
      $(document).idleTimeout({
      redirectUrl: 'access/logout.php',
      idleTimeLimit: <?php echo $inactivity_timer;?>, // 'No activity' time limit in seconds. 1200 = 20 Minutes
      idleCheckHeartbeat: 2, // Frequency to check for idle timeouts in seconds
      customCallback: false,   
      activityEvents: 'click keypress scroll wheel mousewheel mousemove', 
      enableDialog: true, // set to false for logout without warning dialog
      dialogDisplayLimit: <?php echo $inactivity_warning;?>, // Time to display the warning dialog before logout (and optional callback) in seconds. 180 = 3 Minutes
      dialogTitle: '<?php echo $warning_title;?>',
      dialogText: '<?php echo $warning_message;?>',
      dialogTimeRemaining: 'Time remaining',
      dialogStayLoggedInButton: 'Stay Logged In',
      dialogLogOutNowButton: 'Log Out Now',
      errorAlertMessage: 'Please disable "Private Mode", or upgrade to a modern browser. Or perhaps a dependent file missing. Please see: https://github.com/marcuswestin/store.js',
      sessionKeepAliveTimer: 600,   // ping the server at this interval in seconds.
      sessionKeepAliveUrl: window.location.href
      });
    });
  </script>
	<?php } ?>
	<script>
	var pieData = [
		{
			label: 'Desktop',
			value: <?php $device_type = '1'; total_device_type($device_type);?>,
			color:"#0487DE"
		},
		{
			label: 'Phone',
			value : <?php $device_type = '2'; total_device_type($device_type);?>,
			color : "#FC6900"
		},
		{
			label: 'Tablet',
			value : <?php $device_type = '3'; total_device_type($device_type);?>,
			color : "#1BAB25"
		}
	];
	var pieOptions = {
    segmentShowStroke : true,
    segmentStrokeColor : "#ccc",
    segmentStrokeWidth : 1,
		animateScale : true,
    onAnimationComplete: function()
    {
        this.showTooltip(this.segments, true);
    },
    tooltipEvents: [],
    showTooltips: true
	}
	var dt = document.getElementById("dt").getContext("2d");
	new Chart(dt).Pie(pieData, pieOptions);
	var barData = {
	labels : [<?php get_recent_dates();?>],
	datasets : [
		{
			fillColor : "#0487DE",
			strokeColor : "#0660A1",
			data : [<?php bar_chart_unqiue_visits();?>]
		},
		{
			fillColor : "#FC6900",
			strokeColor : "#FF2F00",
			data : [<?php bar_chart_page_views();?>]
		}
		]
	}
	var income = document.getElementById("income").getContext("2d");
	new Chart(income).Bar(barData);
</script>

<script src="bower_components/angular/angular.min.js"></script>
<script src="bower_components/angular-route/angular-route.js"></script>
<script src="bower_components/underscore/underscore-min.js"></script>
 <script src="bower_components/angular-modal-service/dst/angular-modal-service.min.js"></script>  
 <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular-animate.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular-aria.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular-messages.min.js"></script>

  <!-- Angular Material Library -->
  <script src="http://ajax.googleapis.com/ajax/libs/angular_material/1.0.0/angular-material.min.js"></script>
  <script src="bower_components/moment/moment.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/angular-moment/0.9.0/angular-moment.min.js"></script>
<script src="todolist/app.js"></script>
</body>
</html>
