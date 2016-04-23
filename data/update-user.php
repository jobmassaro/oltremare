<?php include_once '../auth/protect.php';
$f = filter_input(INPUT_POST, 'f', FILTER_SANITIZE_STRING);
$e = filter_input(INPUT_POST, 'e', FILTER_SANITIZE_STRING);
//update the values
$update_one = $mysqli->prepare("UPDATE ".$prefix."members SET fullname = ?, email = ? WHERE id=$user_id"); 
$update_one->bind_param('ss', $f, $e);
$update_one->execute();
$update_one->close();
	
$mysqli->close();
header('Location: ../profile.php');
?>