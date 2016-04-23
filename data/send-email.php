<?php include_once '../auth/db-connect.php';

$email_from = filter_input(INPUT_POST, 'email_from', FILTER_SANITIZE_STRING);
$email_to = $_POST['email_to'];
$email_subject = filter_input(INPUT_POST, 'email_subject', FILTER_SANITIZE_STRING);
$email_message = $_POST['email_message'];
$datetime = date('Y-m-d H:i:s');
$emails ='';

	/*$to = $email_to;
	$subject = $email_subject;

	$headers = "From: ".$email_from." \r\n";
	$headers .= "Reply-To: ".$email_from." \r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

	$message = '<html><body>';
	$message .= $email_message;
	$message .= "</body></html>";
	mail($to, $subject, $message, $headers);*/
					$headers = "From: ".$email_from." \r\n";
	$headers .= "Reply-To: ".$email_from." \r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
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

$_SESSION['action_saved'] = '1';
header('Location: ../send-email.php');
?>