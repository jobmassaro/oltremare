<?php
//PROTECT THIS PAGE - REQUIRE LOGIN TO ACCESS
include('auth/protect.php');
//REDIRECT IF NOT ADMIN LEVEL 1 USER
if($user_level!='1'){header('Location: dashboard.php');}

include('data/data-functions.php');
include('lang/translate.php');
//SITE SETTINGS
list($meta_title, $meta_description, $site_title, $site_email, $site_logo) = all_settings();



  $servername = "localhost";
  $username = "root";
  $password = "developer";
  $dbname = "oltremare";
  

  $mysqli = new mysqli($servername, $username, $password, $dbname);
  

  if ($mysqli->connect_errno) {
      echo "Connessione fallita: ". $mysqli->connect_error . ".";
      exit();
  }


// For storing errors:
$pass_errors = array();

$q = "SELECT pass FROM cv_members WHERE id=" .$user_id;	
var_dump($q);
die();

if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{

	// Check for the existing password:
	if (!empty($_POST['current'])) {
		$current = $_POST['current'];
	} else {
		$pass_errors['current'] = 'Inserisci la password corrente!';
	}

	if (preg_match('/^(\w*(?=\w*\d)(?=\w*[a-z])(?=\w*[A-Z])\w*){6,}$/', $_POST['pass1']) ) {
		if ($_POST['pass1'] == $_POST['pass2']) {
			$p = $_POST['pass1'];
		} else {
			$pass_errors['pass2'] = 'Le password inserite non coincidono!';
		}
	} else {
		$pass_errors['pass1'] = 'Inserisci una password valida!';
	}


	if (empty($pass_errors)) { // If everything's OK.
	
		// Check the current password:
		$q = "SELECT pass FROM cv_members WHERE id=" .$uid;	
		$result = $mysqli->query($sql);
		list($hash) = mysqli_fetch_array($result, MYSQLI_NUM);
		// Validate the password:
		// Include the password_compat library, if necessary:
		// include('./includes/lib/password.php');
		if (password_verify($current, $hash)) { // Correct!

			// Define the query:
			$q = "UPDATE users SET pass='"  .  password_hash($p, PASSWORD_BCRYPT) .  "' WHERE id={$_SESSION['user_id']} LIMIT 1";	
			if ($r = mysqli_query($dbc, $q)) { // If it ran OK.

				// Send an email, if desired.

				// Let the user know the password has been changed:
				echo '<h1>Your password has been changed.</h1>';
				include('./includes/footer.html'); // Include the HTML footer.
				exit();

			} else { // If it did not run OK.

				trigger_error('Your password could not be changed due to a system error. We apologize for any inconvenience.'); 

			}

		} else { // Invalid password.
			$pass_errors['current'] = 'Your current password is incorrect!';
		}

	} // End of empty($pass_errors) IF.




}

  

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="">
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
		<script src="//code.jquery.com/jquery-1.10.2.js"></script>		
		<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/cupertino/jquery-ui.css">
		  <!-- Angular Material CSS now available via Google CDN; version 0.11.2 used here -->
	<style>
.table tbody tr:hover td, .table tbody tr:hover th {
    background-color: #eeeeea;
}
	</style>
</head>
<body>
<?php include('assets/comp/top-nav.php');?>
	<div id="wrapper" ng-controller="CorsiCtrl">
		<!-- Side Wrapper -->
        <div id="side-wrapper">
            <ul class="side-nav">
                <?php include('assets/comp/side-nav.php');?>
			</ul>
        </div><!-- End Main Navigation --> 

        <div id="page-content-wrapper">
            <div class="container-fluid">
				<?php include('assets/comp/stat-boxes.php');?>
					<div class="row">
					<!-- Start Panel -->
						<div class="col-lg-12">
							<div class="col-md-6 col-md-offset-2" style="background-color:white;">
								<?php require_once('./common/form_functions.inc.php'); ?>
								<h1>Cambia Password</h1>
								<p>Usa il modulo sotto per modificare la password!</p>
								<form action="change_password.php" method="post" accept-charset="utf-8">
								<?php
									create_form_input('current', 'password', 'Password Corrente', $pass_errors);
									create_form_input('pass1', 'password', 'Password', $pass_errors);
									echo '<span class="help-block">Deve avere almeno 6 caratteri di cui una maiuscola una minuscola ed un numero.</span>';
									create_form_input('pass2', 'password', 'Conferma Password', $pass_errors); 
								?>
								<input type="submit" name="submit_button" value="Cambia &rarr;" id="submit_button" class="btn btn-success" />
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<!-- Bootstrap -->
<script src="assets/js/bootstrap.min.js"></script>
<!-- Base Theme JS -->
<script src="assets/js/base.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular.min.js"></script>
<script src="assets/js/ui-bootstrap-tpls-1.2.4.min.js"></script>
<script src="node_modules/angular/angular.min.js"></script>



</body>
</html>