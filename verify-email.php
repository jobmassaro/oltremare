<?php
//EMAIL VERIFICATION
include('data/email-verification.php');
include('data/data-functions.php');
include('data/visitor-stats-log.php');
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
						
                <form method="post" action="data/resend-email-verification.php" class="form-horizontal login-form">
								<fieldset>
									<img src="assets/logos/<?php echo $site_logo;?>" style="width:50%;"><br>
											
											<h2>Verifica Indirizzo Email</h2>
											<p>Abbiamo inviato una mail all'indirizzo fornito. Per favore controlla la tua email e clicca  il link di attivazione account</p>
									
											<hr>
											Non riesci a verificare email? Prova a inserire nuovamente la tua email.
											<div class="control-group">
												<label class="control-label" for="textinput"></label>
												<div class="controls">
												<input id="textinput" name="email" type="text" placeholder="me@myexample.com" class="input-xlarge">
												</div>
											</div>
									
											<!-- Submit-->
											<div class="control-group">
												<div class="controls">
												<input type="submit" class="btn btn-primary btn-block login-btn" value="Resend Email">
												</div>
											</div>		
											
								</fieldset>
							</form> 
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
