<?php include_once '../auth/db-connect.php';
$member_id = filter_input(INPUT_POST, 'custom', FILTER_SANITIZE_STRING);
$status = 'active';

	$update_one = $mysqli->prepare("UPDATE ".$prefix."members SET status = ? WHERE id = $member_id"); 
	$update_one->bind_param('s', $status);
	$update_one->execute();
	$update_one->close();


	//LOOKUP IF EMAIL VERIFICATION IS STILL REQUIRED
	$get_settings = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT require_email_activation, default_user_level, redirect_login FROM ".$prefix."rl_settings WHERE id = 1"));
	$require_email = $get_settings['require_email_activation'];
	$default_user_level = $get_settings['default_user_level'];
	$redirect_login = $get_settings['redirect_login'];
echo $redirect_login;
	if($require_email=='1'){
		//IS EMAIL VERIFIED?
		$get_data = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT email_confirmed FROM ".$prefix."members WHERE id = $member_id"));
		$email_confirmed = $get_data['email_confirmed'];
	}
	$get_redirect = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT redirect_login FROM ".$prefix."permission_levels WHERE level = $default_user_level"));
	$ld_redirect_login = $get_redirect['redirect_login']; 
		if($ld_redirect_login!=''){
			$redirecting = $ld_redirect_login;
		}else{
			$redirecting = $redirect_login;
		}	
	if($require_email=='1' && $email_confirmed=='0'){header('Location: ../verify-email.php');}else{header('Location: '.$redirecting);} 
	
?>