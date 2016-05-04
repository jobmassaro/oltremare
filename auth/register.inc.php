

<?php
include_once('db-connect.php');
include('password.php');
include_once('access-functions.php');
include("./email/class.phpmailer.php");

secure_session_start(); 

$reg_error = "";

if(isset($_POST['name'], $_POST['surname'], $_POST['username'])){

		//GET SETTINGS
		$get_settings = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT require_terms, default_user_level, redirect_login, require_email_activation FROM ".$prefix."rl_settings WHERE id = 1"));
		$require_terms = $get_settings['require_terms'];
		$default_user_level = $get_settings['default_user_level'];
		$require_email = $get_settings['require_email_activation'];
		$redirect_login = $get_settings['redirect_login'];
		//$require_plans = $get_settings['require_plans'];
		//DATA REQUIRED
		$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
		$surname = filter_input(INPUT_POST, 'surname', FILTER_SANITIZE_STRING);
		$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
		$terms = filter_input(INPUT_POST, 'terms', FILTER_SANITIZE_STRING);
		//$plan = filter_input(INPUT_POST, 'plan', FILTER_SANITIZE_STRING);
		$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
		$email = filter_var($email, FILTER_VALIDATE_EMAIL);
		//SERVER CHECK - VALID EMAIL?
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$reg_error .= '<p class="error" style="color:red;">The email address you entered is not valid</p>';
		}
		$pw = $_POST['p'];
		$query = "SELECT id FROM ".$prefix."members WHERE email = ? LIMIT 1";
		$stmt = $mysqli->prepare($query);
			if($stmt)
			{
				$stmt->bind_param('s', $email);
				$stmt->execute();
				$stmt->store_result();

				//SERVER CHECK - DUPLICATE EMAIL?
				if($stmt->num_rows == 1)
				{
						$reg_error .= '<p class="error" style="color:red;">Email presente nel database!.</p>';
				}
			}



		$query = "SELECT id FROM ".$prefix."members WHERE username = ? LIMIT 1";
		$stmt = $mysqli->prepare($query);
		if($stmt)
		{
			$stmt->bind_param('s', $username);
			$stmt->execute();
			$stmt->store_result();
			//SERVER CHECK - DUPCLIATE USERNAMES?
			if($stmt->num_rows == 1) 
			{
				$reg_error .= '<p class="error" style="color:red;">This username already exists.</p>';
			}
		}else
		{
					$reg_error .= '<p class="error">Account Administrator - Please check DB credientials</p>';
		}
		//SERVER CHECK - IS TERMS BOX CHECKED?	
		if($terms!='1' && $require_terms=='1')
		{
			$error_msg .= '<p class="error" style="color:red;">You must accept our terms of use and privacy policy.</p>';
		}
		
		if($terms=='')
		{
			$terms='0';
		}	
		
		if($plan=='')
		{
			$plan='0';
		}
		
		//$int_status = 'inactive';
		$int_status = 'active';
			
		if(empty($reg_error))
		{
			if($require_email=='1')
			{
				$email_key = randomizer();
			}
			else
			{
				$email_key='0';
			}	
				
			$reg_date = date("Y-m-d H:i:s");
		
			$hash = password_hash($pw, PASSWORD_DEFAULT, array("cost" => 10));


			$sql = "SELECT max(id_utente)+5 as max  FROM cv_members";
			$result = $mysqli->query($sql);
			while($row = mysqli_fetch_assoc($result)) 
        	{
        		$id_utente = $row['max'];
        	}

			if(empty($id_utente))
				$id_utente = 50000;

			$sql = "INSERT INTO ". $prefix ."members (id, id_utente,username, name, surname, email, password, terms, email_key, user_level, reg_date, status, plan_id) VALUES (null ," .$id_utente .",'".$username ."', '" . $name ."', '" . $surname ."','" .$email ."','" .$hash ."','" .$terms ."','" . $email_key ."','" . $default_user_level ."','" . $reg_date ."','" . $int_status ."','". $plan ."')";
			
			if (!mysqli_query($mysqli, $sql)) {
					header('Location: ../error.php');    					
				}




			/*	//printf($sql );
				if($insert_stmt = $mysqli->prepare("INSERT INTO ".$prefix."members (username, name, surname, email, password, terms, email_key, user_level, reg_date, status, plan_id) VALUES (? ,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)")) {
				$insert_stmt->bind_param('ssssss',$username, $name, $surname, $email, $hash, $terms, $email_key, $default_user_level, $reg_date, $int_status, $plan);
				if(! $insert_stmt->execute()){
				header('Location: ../error.php');
				}
							} */
				
			$new_member_id = $mysqli->insert_id;


			if($require_email=='1')
			{

				//CONFIRM EMAIL ADDRESS - SEND VALIDATION EMAIL	
				$get_settings = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT site_title, site_email FROM ".$prefix."settings WHERE id=1"));
				$site_title = $get_settings['site_title'];
				$get_ec = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * FROM ".$prefix."email_content WHERE id=1"));
				$email_content = $get_ec['email_activation'];
				$encoded_email = urlencode($email);
				$link = '<a href="http://'.$_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']).'/verify-email.php?v='.$email_key.'&e='.$encoded_email.'">http://'.$_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']).'/verify-email.php?v='.$email_key.'&e='.$encoded_email.'</a>';
					
				
				$string_processed = preg_replace_callback('~\{\$(.*?)\}~si',function($match) use ($name, $username, $link)
				{
					return eval('return $' . $match[1] . ';');
				},$email_content);

					$to = $email;
					$email = 	"oltremare@triosoft.it";

					$message = 	'<html><body><p></p>';
					$message .= 'Ciao <b>' . $name .'</b> <p> Ti ringraziamo per esserti iscritto a CV.OLTREMARE. Cortesemente verifica la mail qui sotto.</p>';
					$message .= 	'<p></p>' . $link ;
					$message .= "</body></html>";

					

					$mail = new PHPMailer();
					$mail->IsSMTP();
					$mail->Host = "mail.triosoft.it";  // specify main and backup server
					$mail->SMTPAuth = true;     // turn on SMTP authentication
					$mail->Username = "oltremare@triosoft.it";  // SMTP username
					$mail->Password = "OlTrE2016?"; // SMTP password
					$mail->SMTPAuth = true;     // turn on SMTP authentication
					$mail->Username = "oltremare@triosoft.it";  // SMTP username
					$mail->Password = "OlTrE2016?"; // SMTP password
					$mail->From = $email;
					$mail->AddAddress($to, "OLTREMARE");
					$mail->WordWrap = 50;
					$mail->IsHTML(true);
					$mail->Subject = "'Verifica la tua Email - '.$site_title;";
					$mail->Body    = $message;
					$mail->AltBody = $message;
					


					if(!$mail->Send())
					{
					   echo "Message could not be sent. <p>";
					   echo "Mailer Error: " . $mail->ErrorInfo;
					   exit;
					}

					header('Location: email/send_email.php');

					exit;

					//mail($to, $subject, $message, $headers);
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
				if($redirecting==''){$redirecting='dashboard.php';}	
				//if($require_email=='1'){header('Location: verify-email.php');}else{header('Location: '.$redirecting);} 
		}
	}