<?php
//PROTECT THIS PAGE - REQUIRE LOGIN TO ACCESS
include('auth/protect.php');
//REDIRECT IF NOT ADMIN LEVEL 1 USER
if($user_level!='1'){header('Location: dashboard');}

include('data/data-functions.php');
include('lang/translate.php');
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
		<link href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.css" rel="stylesheet" media="all">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
 	<script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.js"></script>	
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
							<?php include('assets/comp/traffic-stat-boxes.php');?>

							<div class="row">
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
								<!-- End Panel -->
								<!-- Start Panel -->
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
							<div class="row">
							<!-- Start Panel -->
								<div class="col-lg-12">
									<div class="panel">
										<div class="panel-heading panel-primary">
											<span class="title">
												<?php echo $lang['TRAFFIC_STATISTICS'];?>
											</span>
										</div>
										
										<div class="panel-content">
											<div>
												<div id="status"></div>
												<table id="users" class="row-border" cellspacing="0" width="100%">
												<thead>
													<tr>
														<th><?php echo $lang['IP'];?></th>
														<th><?php echo $lang['BROWSER'];?></th>
														<th><?php echo $lang['DEVICE_TYPE'];?></th>
														<th><?php echo $lang['OS'];?></th>
														<th><?php echo $lang['COUNTRY'];?></th>
														<th><?php echo $lang['DATETIME'];?></th>
														<th><?php echo $lang['ACTION'];?></th>
													</tr>
												</thead>

												<tbody>
													<?php traffic_table(); ?>
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

  <!-- Bootstrap -->
  <script src="assets/js/bootstrap.min.js"></script>
  <!-- Base Theme JS -->
  <script src="assets/js/base.js"></script>
	
	<!-- SweetAlert -->
	<script src="assets/js/plugins/sweetalert.min.js"></script>
	<!-- Datatables -->
	<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
	
	
	<script>
	$(document).ready(function() {
    $('#users').DataTable();
	} );
		
	<?php 
	if(isset($_SESSION['action_saved'])){ echo 'swal("Awesome", "User privileges have been updated", "success")';}
	unset($_SESSION['action_saved']);
	?>		
	</script>
	
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
	
</body>
</html>
