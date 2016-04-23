<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="author" content="">

    <title>Login Pro Updater</title>

    <!-- Bootstrap Core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

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

        <div id="page-content-wrapper">
            <div class="container-fluid">
							<div class="row">
							<!-- Start Panel -->
								<div class="col-lg-12">
									<div class="panel">
										<div class="panel-heading panel-primary">
											<span class="title">Updater System</span>
										</div>
										<div class="panel-content">
											<?php include('data/check-version.php');?>
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
	<!-- SweetAlert -->
	<script src="assets/js/plugins/sweetalert.min.js"></script>
	<script>
	<?php 
	if(isset($_SESSION['action_saved'])){ echo 'swal("Cool!", "Your settings have been saved!", "success")';}
	unset($_SESSION['action_saved']);
	?>	
	</script>

</body>
</html>
