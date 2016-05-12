<?php
include_once('../auth/db-connect.php');
//PASSWORD COMPATIABLITY FALLBACK
include('../auth/password.php');
include_once('../auth/access-functions.php');
include('../data/visitor-stats-log.php');
secure_session_start(); 
$get_settings = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT redirect_login FROM ".$prefix."rl_settings WHERE id = 1"));
$redirect_login = $get_settings['redirect_login']; 

if(isset($_POST['email'], $_POST['p'])){
	$username_email = $_POST['email'];
	$password = $_POST['p'];
	
	//IF EMAIL IS USED
	if(strpos($username_email, '@') !== FALSE){
		
	$login = login_with_email($username_email, $password, $mysqli, $prefix);
	if($login === true){
			//LOGIN SUCCESSFUL
			$last_login = date("Y-m-d H:i:s");
			$ud = $mysqli->prepare("UPDATE ".$prefix."members SET last_login = ? WHERE email = '".$username_email."'"); 
			$ud->bind_param('s', $last_login);
			$ud->execute();
			$ud->close();
			$get_settings = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT require_email_activation FROM ".$prefix."rl_settings WHERE id = 1"));
			$require_email = $get_settings['require_email_activation'];
			$get_data = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT email_confirmed FROM ".$prefix."members WHERE email = '".$username_email."'"));
			$email_confirmed = $get_data['email_confirmed'];
			$user_level = $_SESSION['user_level'];

			$get_redirect = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT redirect_login FROM ".$prefix."permission_levels WHERE level = $user_level"));
			$ld_redirect_login = $get_redirect['redirect_login']; 
			

			
			if($ld_redirect_login==''){$ld_redirect_login='../dashboard.php';}
			if($ld_redirect_login!=''){
					$redirecting = $ld_redirect_login;
					
			}else{
					$redirecting = $redirect_login;
			}

			if($require_email=='1' && $email_confirmed!='1')
			{


					header('Location: ../verify-email.php');
				//	header('Location: ../');
			}
			else{
					header('Location: '.$redirecting);
			}  
    }else{
			//LOGIN FAILED
			header('Location: ../login.php?error='.$login.'');
    }

	}else{
		
	//LOGIN WITH USERNAME INSTEAD
	$login = login_with_username($username_email, $password, $mysqli, $prefix);
	if($login === true){

		//LOGIN SUCCESSFUL
		$last_login = date("Y-m-d H:i:s");
			$ud = $mysqli->prepare("UPDATE ".$prefix."members SET last_login = ? WHERE username = '".$username_email."'"); 
			$ud->bind_param('s', $last_login);
			$ud->execute();
			$ud->close();
			$get_settings = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT require_email_activation FROM ".$prefix."rl_settings WHERE id = 1"));
			$require_email = $get_settings['require_email_activation'];
			$get_data = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT email_confirmed FROM ".$prefix."members WHERE username = '".$username_email."'"));
			$email_confirmed = $get_data['email_confirmed'];
			$user_level = $_SESSION['user_level'];
			$get_redirect = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT redirect_login FROM ".$prefix."permission_levels WHERE level = $user_level"));
			$ld_redirect_login = $get_redirect['redirect_login'];
			if($ld_redirect_login==''){$ld_redirect_login='../dashboard.php';}
			if($ld_redirect_login!=''){
					$redirecting = $ld_redirect_login;
				}else{
					$redirecting = $redirect_login;
				}	
				if($require_email=='1' && $email_confirmed!='1'){header('Location: ../verify-email.php');}else{header('Location: '.$redirecting);} 
    }else{
			//LOGIN FAILED
			header('Location: ../login.php?error='.$login.'');
    }		
	}  
}	    