<?php 
include("../../email/class.phpmailer.php");
// Including database connections
 $servername = "localhost";
 $username = "root";
 $password = "developer";
 $dbname = "oltremare";
  

 $mysqli = new mysqli($servername, $username, $password, $dbname);
  

  if ($mysqli->connect_errno) {
      echo "Connessione fallita: ". $mysqli->connect_error . ".";
      exit();
  }
  
// Fetching the updated data & storin in new variables
$data = json_decode(file_get_contents("php://input")); 

$id = mysqli_real_escape_string($mysqli, $data->id);
$id_utente = mysqli_real_escape_string($mysqli, $data->id_utente);
$nome = mysqli_real_escape_string($mysqli, $data->nome);
$cognome = mysqli_real_escape_string($mysqli, $data->cognome);
$email = mysqli_real_escape_string($mysqli, $data->email);
$messaggio= mysqli_real_escape_string($mysqli, $data->messaggio);
$data_invio = date("Y-m-d H:i:s"); 


$sql = "INSERT INTO cv_email_send (id_utente,nome,cognome,email,messaggio,data_invio) VALUES (".$id_utente.",'" .$nome ."','".$cognome."','".$email."','".$messaggio."','".$data_invio."');";
$result = $mysqli->query($sql);




if($email)
{

  $to = $email;
  $email = "oltremare@triosoft.it";
  $message = $messaggio;
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
   echo "Messaggio non inviato. <p>";
   echo "Mailer Error: " . $mail->ErrorInfo;
   exit;
}
  echo true;
}// end4
echo false;


?>

