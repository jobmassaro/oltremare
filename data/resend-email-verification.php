<?php include('../auth/db-connect.php');
include("../email/class.phpmailer.php");


$input_email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);


$get_key = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * FROM ".$prefix."members WHERE email='".$input_email."'"));
$email_key = $get_key['email_key'];


if($email_key!=''){
  //CONFIRM EMAIL ADDRESS - SEND VALIDATION EMAIL	
  $get_settings = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT site_title, site_email FROM ".$prefix."settings WHERE id=1"));
  $site_title = $get_settings['site_title'];
  $site_email = $get_settings['site_email'];
  $encoded_email = urlencode($input_email);
  /*$to = $input_email;
  $subject = 'Email Verification for '.$site_title;

  $headers = "From: ".$site_email." \r\n";
  $headers .= "Reply-To: ".$site_email." \r\n";
  $headers .= "MIME-Version: 1.0\r\n";
  $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

  $message = '<html><body>';
  $message .= "<h4>Hello ".ucwords($fullname).",</h4>";
  $message .= "<p>Thank you for joining ".$site_title.".  Please take a minute to verify your email address by simply clicking on the link below:<br><br>";
  $message .= '<a href="http://'.substr($_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']), 0, -5).'/verify-email?v='.$email_key.'&e='.$encoded_email.'">http://'.substr($_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']), 0, -5).'/verify_email?v='.$email_key.'&e='.$encoded_email.'</a>';
  $message .= '<h4>Thank you!<br>'.$site_title.'</h4>';
  $message .= "</body></html>";


  mail($to, $subject, $message, $headers);
  */

          var_dump($input_email);
          $to = $input_email;
          $email = "oltremare@triosoft.it";
          $message = '<html><body>';
          $message .= "<h4>Ciao ". ucwords($fullname).",</h4>";
          $message .= "<p>Thank you for joining ".$site_title.".  Please take a minute to verify your email address by simply clicking on the link below:<br><br>";
          $message .= '<a href="http://'.substr($_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']), 0, -5).'/verify-email.php?v='.$email_key.'&e='.$encoded_email.'">http://'.substr($_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']), 0, -5).'/verify_email.php?v='.$email_key.'&e='.$encoded_email.'</a>';
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

            

}