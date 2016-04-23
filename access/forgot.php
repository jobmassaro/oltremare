<?php 
include_once '../auth/db-connect.php';
include '../auth/password.php';
include("../email/class.phpmailer.php");
function rs($length = 60) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

	//DATA REQURED
	$search_email = filter_input(INPUT_POST, 'se', FILTER_SANITIZE_STRING);

  //SEARCH FOR ACCOUNT MATCHING INPUT EMAIL
  $query = "SELECT email, id, name, surname, username FROM `".$prefix."members` WHERE email=?";
  if($stmt = $mysqli->prepare($query)){
      $stmt->bind_param("s", $search_email);
      if($stmt->execute()){
          $stmt->store_result();
            $email_check= "";         
            $stmt->bind_result($email_check, $account_id, $name, $surname, $username);
            $stmt->fetch();
            if ($stmt->num_rows == 1){
              //ACCOUNT EXISTS SENT RESET PIN AND EMAIL INSTRUCTIONS
              $pin = mt_rand(100000, 999999);
              $key = rs();
              $hashed_pin = password_hash($pin, PASSWORD_DEFAULT, array("cost" => 10));
              $set_pin = $mysqli->prepare("UPDATE ".$prefix."members SET forgot_pin = ?, forgot_key = ? WHERE id=$account_id"); 
              $set_pin->bind_param('ss', $hashed_pin, $key);
              $set_pin->execute();
              $set_pin->close();
              //SUCCESSFUL RESET
              $get_settings = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT site_title, site_email FROM ".$prefix."settings WHERE id=1"));
              $site_title = $get_settings['site_title'];
              $site_email = $get_settings['site_email'];
							//EMAIL CONTENT
							$get_ec = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * FROM ".$prefix."email_content WHERE id=1"));
							$email_content = $get_ec['forgot_password'];
							//LINK
							$link = '<a href="http://'.substr($_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']),0,-7).'/reset.php?k='.$key.'">http://'.substr($_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']),0,-7).'/reset.php?k='.$key.'</a>';
							$string_processed = preg_replace_callback(
							'~\{\$(.*?)\}~si',
							function($match) use ($fullname, $username, $pin, $link)
							{
									return eval('return $' . $match[1] . ';');
							},
							$email_content);
          /*    $to = $email_check;	
              $subject = $site_title.' Password Reset Request';

              $headers = "From: ".$site_email." \r\n";
              $headers .= "Reply-To: ".$site_email." \r\n";
              $headers .= "MIME-Version: 1.0\r\n";
              $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

              $message = '<html><body>';
              $message .= $string_processed;
              $message .= "</body></html>";*/
              //mail($to, $subject, $message, $headers);


              /**/
            $to = $email_check; 
            $email = "oltremare@triosoft.it";
            $message = '<html><body>';
            $message .= $string_processed;
            $message .= "</body></html>";
            //$to = $email;
            // When we unzipped PHPMailer, it unzipped to
            // public_html/PHPMailer_5.2.0


            $mail = new PHPMailer();

            // set mailer to use SMTP
            $mail->IsSMTP();
                                      // set mailer to use SMTP
            $mail->Host = "mail.triosoft.it";  // specify main and backup server
            $mail->SMTPAuth = true;     // turn on SMTP authentication
            $mail->Username = "oltremare@triosoft.it";  // SMTP username
            $mail->Password = "OlTrE2016?"; // SMTP password
            // As this email.php script lives on the same server as our email server
            // we are setting the HOST to localhost
            //$mail->Host = "localhost";  // specify main and backup server

            $mail->SMTPAuth = true;     // turn on SMTP authentication

            // When sending email using PHPMailer, you need to send from a valid email address
            // In this case, we setup a test email account with the following credentials:
            // email: send_from_PHPMailer@bradm.inmotiontesting.com
            // pass: password
            $mail->Username = "oltremare@triosoft.it";  // SMTP username
            $mail->Password = "OlTrE2016?"; // SMTP password

            // $email is the user's email address the specified
            // on our contact us page. We set this variable at
            // the top of this page with:
            // $email = $_REQUEST['email'] ;
            $mail->From = $email;

            // below we want to set the email address we will be sending our email to.
            $mail->AddAddress($to, "OLTREMARE");

            // set word wrap to 50 characters
            $mail->WordWrap = 50;
            // set email format to HTML
            $mail->IsHTML(true);

            $mail->Subject = "'Verifica la tua Email - '.$site_title;";

            // $message is the user's message they typed in
            // on our contact us page. We set this variable at
            // the top of this page with:
            // $message = $_REQUEST['message'] ;
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


































              header('Location: ../forgot.php?success=1');
            }else{
              //NO EMAIL ADDRESS FOUND
              header('Location: ../forgot.php?error=1');
            }
        }
    }