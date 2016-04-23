<?php include('auth/db-connect.php');
$vkey = filter_input(INPUT_GET, 'v', FILTER_SANITIZE_STRING);
$encoded_email = filter_input(INPUT_GET, 'e', FILTER_SANITIZE_STRING);
$check_email = urldecode($encoded_email);


if($vkey!='' && $check_email!=''){
  //VALIDATE CODE
  $get_key = mysqli_fetch_assoc(mysqli_query($mysqli, "SELECT * FROM ".$prefix."members WHERE email='".$check_email."'"));
  $email_key = $get_key['email_key'];
  $db_email = $get_key['email'];
  $db_id = $get_key['id'];

  if($email_key == $vkey && $check_email == $db_email){
    $sql = "UPDATE ".$prefix."members SET email_confirmed =1 WHERE id=" . $db_id; 
    if (mysqli_query($mysqli, $sql)) {
      header('Location: login.php?v=1');
    }
  }
}