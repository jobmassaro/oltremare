<?php 
include_once '../auth/db-connect.php';
include('../auth/password.php');
include_once('../auth/access-functions.php');
include("../email/class.phpmailer.php");


	//DATA REQURED
	$input_name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
	$input_surname = filter_input(INPUT_POST, 'surname', FILTER_SANITIZE_STRING);
	$input_email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
	$input_username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
	$input_phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);

		
	$get_settings = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT require_email_activation FROM ".$prefix."rl_settings WHERE id = 1"));
	$require_email = $get_settings['require_email_activation'];

	
	//check for existing email
	if($input_email == ''|| count($input_email)== 0)
	{
		$input_email ="example@example.com";
		$check_email = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * FROM ".$prefix."members WHERE email='".$input_email."'"));
		$email_exists = $check_email['email'];

	}

		//check for existing username
	$check_email = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * FROM ".$prefix."members WHERE username='".$input_username."'"));
	$username_exists = $check_email['username'];



	if($username_exists=='' && $email_exists=='')
	{

		$get_level = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT default_user_level FROM ".$prefix."rl_settings WHERE id=1"));
		$default_user_level = $get_level['default_user_level'];
		$terms = '1';
		$reg_date = date("d-m-Y H:i:s");
		$pw = rand(9999999,99999999999);
		$hash = password_hash($pw, PASSWORD_DEFAULT, array("cost" => 10));

		if($require_email=='1')
		{
			$email_key = randomizer();
		}
		else
		{
			$email_key='0';
		}	

		$sql = "SELECT max(id_utente)+5 as max  FROM cv_members";
		$result = $mysqli->query($sql);
		while($row = mysqli_fetch_assoc($result)) 
        {
        	$id_utente = $row['max'];
        }

        $query = "INSERT INTO " . 
		 $prefix ."members ( id, id_utente, name, surname, username, email , password, terms, email_key, user_level, reg_date,
		 	status,
		 	plan_id,
 			cod_fiscale,
 			cod_piva,
 			data_nascita,
 			telefono,
 			mobile, 
 			certificatomedico,
 			profilo_pic,
 			certificato_pic) VALUES " .
			"(null ,". $id_utente.",'" . $input_name ."', '". $input_surname ."', '" . $input_username ."', '" . $input_email ."', '" . $hash ."','" .$terms ."','" 
		 	. $email_key ."','" . $default_user_level ."','" . $reg_date ."','" . $status ."','','','','','" . $input_phone ."','','','','');"; 

			
			if ($mysqli->query($query) === TRUE) //1
			{

				//Faccio una seconda query per cv_generale
				$sql = "INSERT INTO cv_generale (id_utente, name, surname,username) SELECT id_utente,name,surname,username FROM cv_members WHERE id_utente = " .$id_utente;
				if ($mysqli->query($sql) === TRUE) //2
				{
					$sql = "INSERT INTO cv_recapiti(id_utente, nome, cognome,email,telefono) SELECT id_utente,name as nome,surname as cognome, email ,numtelefono as telefono FROM cv_members WHERE id_utente = " .$id_utente;
					if ($mysqli->query($sql) === TRUE)//3
					{
						$get_settings = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT site_title, site_email FROM ".$prefix."settings WHERE id=1"));
						$site_title = $get_settings['site_title'];
						$site_email = $get_settings['site_email'];

						$fullname = $input_name . "-" . $input_surname;

						if($require_email == 1)//4
						{

								$to = $input_email;
								$email = "oltremare@triosoft.it";
								$message = '<html><body>';
								$message .= "<h4>Hello ".ucwords($fullname).",</h4>";
								$message .= "<p>We would like to welcome you to ".$site_title.".  Your temporary login information is located below:<br><br>";
								$message .= "Username: ".$input_username."<br>Password: ".$pw."<br>";
								$message .= '<a href="http://'.substr($_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']), 0, -4).'/login.php">http://'.substr($_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']), 0, -5).'/login.php</a>';
								$message .= '<h4>Thank you!<br>'.$site_title.'</h4>';
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

							header('Location: ../email/send_email.php');

							exit();

						}// end4
					}// end 3	

				}//end 2
			}// end 1
		}//end if($username_exists=='' && $email_exists=='')




		




	
?>