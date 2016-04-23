<?php
include_once 'db-connect.php';
include_once 'config.inc.php';
include 'password.php';
include_once 'access-functions.php';
secure_session_start(); 
$error_msg = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
	$recaptcha=$_POST['g-recaptcha-response'];
		if(!empty($recaptcha))
		{
			function getCurlData($url)
				{
					$curl = curl_init();
					curl_setopt($curl, CURLOPT_URL, $url);
					curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
					curl_setopt($curl, CURLOPT_TIMEOUT, 10);
					$curlData = curl_exec($curl);
					curl_close($curl);
					return $curlData;
				}
			//GET SETTINGS
			$get_settings = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT gc_secret, require_email_activation, require_terms, require_plans, default_user_level, redirect_login FROM ".$prefix."rl_settings WHERE id = 1"));
			$require_terms = $get_settings['require_terms'];
			$default_user_level = $get_settings['default_user_level'];
			$require_email = $get_settings['require_email_activation'];
			$redirect_login = $get_settings['redirect_login'];
			$require_plans = $get_settings['require_plans'];
			$gc_secret = $get_settings['gc_secret'];
			
			$google_url="https://www.google.com/recaptcha/api/siteverify";
			$secret=$gc_secret;
			$ip=$_SERVER['REMOTE_ADDR'];
			$url=$google_url."?secret=".$secret."&response=".$recaptcha."&remoteip=".$ip;
			$res=getCurlData($url);
			$res= json_decode($res, true);
			//RECPATCHA SUCCESS

			var_dump('Register.recap.inc');
			exit();
			if($res['success'])
			{
			
				if(isset($_POST['fullname'], $_POST['username'])) {
	
					
					//DATA REQUIRED
					$fullname = filter_input(INPUT_POST, 'fullname', FILTER_SANITIZE_STRING);
					$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
					$terms = filter_input(INPUT_POST, 'terms', FILTER_SANITIZE_STRING);
					$plan = filter_input(INPUT_POST, 'plan', FILTER_SANITIZE_STRING);
					$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
					$email = filter_var($email, FILTER_VALIDATE_EMAIL);
					//SERVER CHECK - VALID EMAIL?
					if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
							$error_msg .= '<p class="error" style="color:red;">The email address you entered is not valid</p>';
					}

					$pw = $_POST['p'];
					$prep_stmt = "SELECT id FROM ".$prefix."members WHERE email = ? LIMIT 1";
					$stmt = $mysqli->prepare($prep_stmt);
					if($stmt) {
							$stmt->bind_param('s', $email);
							$stmt->execute();
							$stmt->store_result();
							//SERVER CHECK - DUPLICATE EMAIL?
							if($stmt->num_rows == 1) {
									$error_msg .= '<p class="error" style="color:red;">A user with this email address already exists.</p>';
							}
				}
				$prep_stmt = "SELECT id FROM ".$prefix."members WHERE username = ? LIMIT 1";
					$stmt = $mysqli->prepare($prep_stmt);
					if($stmt) {
							$stmt->bind_param('s', $username);
							$stmt->execute();
							$stmt->store_result();
							//SERVER CHECK - DUPCLIATE USERNAMES?
							if($stmt->num_rows == 1) {
									$error_msg .= '<p class="error" style="color:red;">This username already exists.</p>';
							}
					}else{
							$error_msg .= '<p class="error">Account Administrator - Please check DB credientials</p>';
					}
				//SERVER CHECK - IS TERMS BOX CHECKED?	
				if($terms!='1' && $require_terms=='1'){$error_msg .= '<p class="error" style="color:red;">You must accept our terms of use and privacy policy.</p>';}
				if($terms==''){$terms='0';}	
				if($plan==''){$plan='0';}
					$int_status = 'inactive';
					if(empty($error_msg)) {
					if($require_email=='1'){$email_key = randomizer();}else{$email_key='0';}
					$reg_date = date("Y-m-d H:i:s");
					$hash = password_hash($pw, PASSWORD_DEFAULT, array("cost" => 10));
							if($insert_stmt = $mysqli->prepare("INSERT INTO ".$prefix."members (fullname, username, email, password, terms, email_key, user_level, reg_date, status, plan_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)")) {
									$insert_stmt->bind_param('ssssssssss', $fullname, $username, $email, $hash, $terms, $email_key, $default_user_level, $reg_date, $int_status, $plan);
									if(! $insert_stmt->execute()){
											header('Location: ../error.php');
									}
							}
				$new_member_id = $mysqli->insert_id;
				$prep_stmt = "SELECT id FROM ".$prefix."members WHERE username = ? LIMIT 1";
				$stmt = $mysqli->prepare($prep_stmt);

				if($stmt) {
				 mysqli_stmt_bind_param($stmt, "s", $username);
				 mysqli_stmt_execute($stmt);
				 mysqli_stmt_bind_result($stmt, $users_id);
				 mysqli_stmt_fetch($stmt);
				 mysqli_stmt_close($stmt);
				}

				if($require_email=='1'){
					//CONFIRM EMAIL ADDRESS - SEND VALIDATION EMAIL	
					$get_settings = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT site_title, site_email FROM ".$prefix."settings WHERE id=1"));
					$site_title = $get_settings['site_title'];
					$site_email = $get_settings['site_email'];
					$get_ec = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * FROM ".$prefix."email_content WHERE id=1"));
					$email_content = $get_ec['email_activation'];
					$encoded_email = urlencode($email);
					$link = '<a href="http://'.$_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']).'/verify-email.php?v='.$email_key.'&e='.$encoded_email.'">http://'.$_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']).'/verify-email.php?v='.$email_key.'&e='.$encoded_email.'</a>';
					$string_processed = preg_replace_callback(
						'~\{\$(.*?)\}~si',
						function($match) use ($fullname, $username, $link)
						{
								return eval('return $' . $match[1] . ';');
						},
						$email_content);
					/*
					$to = $email;
					$subject = 'Email Verification - '.$site_title;

					$headers = "From: ".$site_email." \r\n";
					$headers .= "Reply-To: ".$site_email." \r\n";
					$headers .= "MIME-Version: 1.0\r\n";
					$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

					$message = '<html><body>';
					$message .= $string_processed;
					$message .= "</body></html>";
					mail($to, $subject, $message, $headers); */


					ini_set('SMTP','mail.triosoft.it');
					ini_set('smtp_port','10025'); 
					ini_set('sendmail_from','oltremare@triosoft.it');
  					$message = "This is a test!"; 
    				$to = "jobmassaro@gmail.com"; 
    				$subject = "Email from oltremare.cloudapp.net/"; 
    				$headers = "From: oltremare.cloudapp.net/\r\n"; 
   					
   					if (mail($to, $subject, $message, $headers)) 
					{ 
						echo("<p>Email successfully sent!</p>"); 
					}
					else{
						 echo("<p>Email delivery failed…</p>"); 
					}	 
				}
						
				//MEMBERSHIP PAYMENT
				if($require_plans=='1'){
					$get_plan = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT membership_cost FROM ".$prefix."memberships WHERE id = $plan"));
					$membership_cost = $get_plan['membership_cost'];
					if($membership_cost=='' || $membership_cost=='0.00'){
					//IF FREE UPDATE STATUS AS ACTIVE
					$status = 'active';
					$update_one = $mysqli->prepare("UPDATE ".$prefix."members SET status = ? WHERE id = $new_member_id"); 
					$update_one->bind_param('s', $status);
					$update_one->execute();
					$update_one->close();
					}else{
					//IF PAID REDIRECT TO PAYMENT PORTAL
					$_SESSION['new_member_id'] = $new_member_id;
					$_SESSION['new_member_plan_id'] = $plan;			
					header('Location: pay-membership');
					exit;
					}
				}else{
					//NO MEMBERSHIP REQUIREMENT
					$status = 'active';
					$update_one = $mysqli->prepare("UPDATE ".$prefix."members SET status = ? WHERE id = $new_member_id"); 
					$update_one->bind_param('s', $status);
					$update_one->execute();
					$update_one->close();
				}
					
				// XSS PROTECTION
				$users_id = preg_replace("/[^0-9]+/", "", $users_id);
				$_SESSION['user_id'] = $users_id;
				$username = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $username);
				$_SESSION['username'] = $username;
				$owner = $users_id;
				$user_browser = $_SERVER['HTTP_USER_AGENT'];
				$user_id = preg_replace("/[^0-9]+/", "", $users_id);
				$_SESSION['user_id'] = $user_id;
				$_SESSION['fullname'] = $fullname;
				$_SESSION['email_address'] = $email;
				$_SESSION['user_level'] = $default_user_level;
				$_SESSION['username'] = $username;
					//SET BROWSER INFORMATION
					$stmtB = $mysqli->prepare("UPDATE ".$prefix."members SET browser = ? WHERE id=$user_id"); 
					$stmtB->bind_param('s', $user_browser);
					$stmtB->execute();
					$stmtB->close();
						
				//SUCCESSFUL REGISTRATION		
				$get_redirect = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT redirect_login FROM ".$prefix."permission_levels WHERE level = $default_user_level"));
				$ld_redirect_login = $get_redirect['redirect_login']; 
				if($ld_redirect_login!=''){
					$redirecting = $ld_redirect_login;
				}else{
					$redirecting = $redirect_login;
				}	
				if($redirecting==''){$redirecting='dashboard';}	
				if($require_email=='1'){header('Location: verify-email.php');}else{header('Location: '.$redirecting);} 
				}
			}
				
			//RECAPTCHA ERROR		
		}else{ $error_msg = "Please re-enter your reCAPTCHA."; }
	}else{ $error_msg = "Please re-enter your reCAPTCHA.";}
}		
	