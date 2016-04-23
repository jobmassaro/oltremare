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
 <script src="//cdn.ckeditor.com/4.5.6/standard/ckeditor.js"></script>
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
											<span class="title"><?php echo $lang['EMAIL_SETTINGS'];?></span>
										</div>
										<div class="panel-content">
											<div class="alert alert-info">
												You can use the following codes in your emails:<br>
												{$fullname}<br>
												{$username}<br>
												{$link}
											</div>
											<form method="post" action="email-settings">
												<select name="email_type" id="dynamic_select">
												<option value="email-welcome.php" selected>Welcome (Email Verification)</option>
												<option value="email-forgot.php">Forgot Password Email</option>
											</select>	
											</form>
											
											</p>
												<form class="form-horizontal" method="post" action="data/update-email-content">
													<input type="hidden" name="et" value="email_activation">
													<fieldset>
													<div class="control-group">
														<label class="control-label" for="">Email Content</label>
														<div class="controls">
														<textarea name="ec" id="editor1" rows="10" cols="80">
																<?php	$email_type = "email_activation"; get_email_content($email_type);?>
															</textarea>
															<script>
																	CKEDITOR.replace('editor1');
															</script>
													</div>
													<div class="control-group">
														<label class="control-label" for=""></label>
														<div class="controls">
														<button type="submit" class="btn btn-success">Save</button>
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
	<!-- SweetAlert -->
	<script src="assets/js/plugins/sweetalert.min.js"></script>
	<script>
    $(function(){
      // bind change event to select
      $('#dynamic_select').on('change', function () {
          var url = $(this).val(); // get selected value
          if (url) { // require a URL
              window.location = url; // redirect
          }
          return false;
      });
    });
	</script>
	<script>
	<?php 
	if(isset($_SESSION['action_saved'])){ echo 'swal("Cool!", "Your settings have been saved!", "success")';}
	unset($_SESSION['action_saved']);
	?>	
	</script>

</body>
</html>
